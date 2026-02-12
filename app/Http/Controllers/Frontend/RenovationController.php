<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\RenovationCategory;
use App\Enums\RenovationIntent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\RenovationStepRequest;
use App\Http\Requests\Frontend\RenovationUserInfoRequest;
use App\Services\RenovationFormService;
use App\Services\RenovationSubmissionService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class RenovationController extends Controller
{
    public function __construct(
        private RenovationFormService $formService,
        private RenovationSubmissionService $submissionService
    ) {}

    /**
     * Display intent selection page
     */
    public function showIntentSelection(): View
    {
        return view('renovation.intent-selection', [
            'intents' => RenovationIntent::cases(),
        ]);
    }

    /**
     * Store selected intent and redirect to category selection
     */
    public function storeIntent(Request $request): RedirectResponse
    {
        $request->validate([
            'intent' => 'required|string|in:' . implode(',', array_column(RenovationIntent::cases(), 'value')),
        ]);

        $intent = RenovationIntent::from($request->input('intent'));
        session(['renovation.intent' => $intent->value]);

        return redirect()->route('renovation.category-selection');
    }

    /**
     * Display category selection page
     */
    public function showCategorySelection(): View|RedirectResponse
    {
        // Ensure intent is selected
        if (!session()->has('renovation.intent')) {
            return redirect()->route('renovation.intent-selection');
        }

        return view('renovation.category-selection', [
            'categories' => RenovationCategory::allOrdered(),
            'intent' => RenovationIntent::from(session('renovation.intent')),
        ]);
    }

    /**
     * Display form step for a category
     */
    public function showStep(string $categorySlug, int $stepNumber = 1): View|RedirectResponse
    {
        $category = RenovationCategory::fromSlug($categorySlug);

        if (!$category) {
            abort(404, 'Category not found');
        }

        // Ensure intent is selected
        if (!session()->has('renovation.intent')) {
            return redirect()->route('renovation.intent-selection');
        }

        // Store category in session
        session(['renovation.category' => $category->value]);

        $step = $category->getStep($stepNumber);

        if (!$step) {
            abort(404, 'Step not found');
        }

        // Check if this is the last step
        $isLastStep = $stepNumber === $category->totalSteps();

        // Get previous response if exists
        $previousResponse = $this->formService->getStepResponse($categorySlug, $stepNumber);

        return view('renovation.form-step', [
            'category' => $category,
            'step' => $step,
            'stepNumber' => $stepNumber,
            'totalSteps' => $category->totalSteps(),
            'isLastStep' => $isLastStep,
            'previousResponse' => $previousResponse,
        ]);
    }

    /**
     * Process step submission
     */
    public function processStep(
        RenovationStepRequest $request,
        string $categorySlug,
        int $stepNumber
    ): RedirectResponse {
        $category = RenovationCategory::fromSlug($categorySlug);

        if (!$category) {
            abort(404, 'Category not found');
        }

        $step = $category->getStep($stepNumber);

        if (!$step) {
            abort(404, 'Step not found');
        }

        // Store step response in session
        $this->formService->storeStepResponse(
            $categorySlug,
            $stepNumber,
            $request->input('response')
        );

        // Determine next action
        if ($stepNumber < $category->totalSteps()) {
            // Go to next step
            return redirect()->route('renovation.step', [
                'categorySlug' => $categorySlug,
                'stepNumber' => $stepNumber + 1,
            ]);
        } else {
            // Go to user info collection
            return redirect()->route('renovation.user-info', ['categorySlug' => $categorySlug]);
        }
    }

    /**
     * Show user information collection form
     */
    public function showUserInfo(string $categorySlug): View|RedirectResponse
    {
        $category = RenovationCategory::fromSlug($categorySlug);

        if (!$category) {
            abort(404, 'Category not found');
        }

        // Ensure intent is selected
        if (!session()->has('renovation.intent')) {
            Log::warning('User tried to access user-info without intent', [
                'category_slug' => $categorySlug,
                'session_data' => session()->all(),
            ]);
            return redirect()->route('renovation.intent-selection')
                ->with('error', 'Please start from the beginning by selecting your intent.');
        }

        // Ensure all steps are completed
        if (!$this->formService->areAllStepsCompleted($categorySlug, $category->totalSteps())) {
            return redirect()->route('renovation.step', [
                'categorySlug' => $categorySlug,
                'stepNumber' => 1,
            ]);
        }

        return view('renovation.user-info', [
            'category' => $category,
        ]);
    }

    /**
     * Process final submission
     */
    public function submitForm(
        RenovationUserInfoRequest $request,
        string $categorySlug
    ): RedirectResponse|JsonResponse {
        $category = RenovationCategory::fromSlug($categorySlug);

        if (!$category) {
            if ($request->wantsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Category not found'
                ], 404);
            }
            abort(404, 'Category not found');
        }

        try {
            // Get step responses BEFORE creating submission
            $stepResponses = $this->formService->getAllStepResponses($categorySlug);

            // Log step responses for debugging
            Log::info('Step responses retrieved', [
                'category_slug' => $categorySlug,
                'step_responses' => $stepResponses,
                'session_data' => session()->all(),
            ]);

            // Create submission
            $submission = $this->submissionService->createSubmission(
                $category,
                $request->validated(),
                $stepResponses
            );

            // Clear session data AFTER creating submission
            $this->formService->clearSessionData($categorySlug);

            Log::info('Redirecting to success page', [
                'submission_id' => $submission->id,
            ]);

            // Store submission_id in session for success page
            session(['submission_id' => $submission->id]);

            // Return JSON response for AJAX requests
            if ($request->wantsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Your renovation request has been submitted successfully.',
                    'submission_id' => $submission->id,
                    'redirect' => route('renovation.success')
                ]);
            }

            // Regular redirect for non-AJAX requests
            return redirect()->route('renovation.success')->with('submission_id', $submission->id);

        } catch (\Exception $e) {
            Log::error('Error submitting renovation form', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            if ($request->wantsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage()
                ], 500);
            }

            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Show success page
     */
    public function showSuccess(): View|RedirectResponse
    {
        Log::info('Success page accessed', [
            'has_submission_id' => session('submission_id') !== null,
            'submission_id' => session('submission_id'),
            'session_data' => session()->all(),
        ]);

        // Check if submission_id exists in flash data
        if (!session('submission_id')) {
            Log::warning('No submission_id in session, redirecting to intent selection');
            return redirect()->route('renovation.intent-selection');
        }

        return view('renovation.success');
    }

    /**
     * Navigate to previous step
     */
    public function previousStep(string $categorySlug, int $stepNumber): RedirectResponse
    {
        if ($stepNumber <= 1) {
            return redirect()->route('renovation.category-selection');
        }

        return redirect()->route('renovation.step', [
            'categorySlug' => $categorySlug,
            'stepNumber' => $stepNumber - 1,
        ]);
    }
}
