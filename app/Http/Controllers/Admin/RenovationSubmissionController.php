<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RenovationCategory;
use App\Enums\RenovationIntent;
use App\Http\Controllers\Controller;
use App\Models\RenovationSubmission;
use App\Services\RenovationSubmissionService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class RenovationSubmissionController extends Controller
{
    public function __construct(
        private RenovationSubmissionService $submissionService
    ) {}

    /**
     * Display a listing of renovation submissions with filtering
     */
    public function index(Request $request): View
    {
        $query = RenovationSubmission::query();

        // Apply filters
        if ($request->filled('intent')) {
            $query->byIntent($request->input('intent'));
        }

        if ($request->filled('category')) {
            $query->byCategory($request->input('category'));
        }

        if ($request->filled('status')) {
            $query->byStatus($request->input('status'));
        }

        if ($request->filled('date_from') || $request->filled('date_to')) {
            $query->dateRange(
                $request->input('date_from'),
                $request->input('date_to')
            );
        }

        $submissions = $query->latest()->paginate(20);

        return view('admin.renovation-submissions.index', [
            'submissions' => $submissions,
            'intents' => RenovationIntent::cases(),
            'categories' => RenovationCategory::cases(),
            'filters' => $request->only(['intent', 'category', 'status', 'date_from', 'date_to']),
        ]);
    }

    /**
     * Display the specified renovation submission
     */
    public function show(RenovationSubmission $renovationSubmission): View
    {
        $intent = RenovationIntent::tryFrom($renovationSubmission->intent);
        $category = RenovationCategory::fromSlug($renovationSubmission->category_slug);
        $formData = $renovationSubmission->getFormData();

        return view('admin.renovation-submissions.show', [
            'submission' => $renovationSubmission,
            'intent' => $intent,
            'category' => $category,
            'formData' => $formData,
        ]);
    }

    /**
     * Update the status of the specified renovation submission
     */
    public function update(Request $request, RenovationSubmission $renovationSubmission): RedirectResponse
    {
        $request->validate([
            'status' => 'required|in:pending,reviewed,completed',
        ]);

        $success = $this->submissionService->updateStatus(
            $renovationSubmission,
            $request->input('status')
        );

        if ($success) {
            return redirect()->back()->with('success', 'Submission status updated successfully.');
        }

        return redirect()->back()->with('error', 'Failed to update submission status.');
    }

    /**
     * Export filtered submissions to CSV
     */
    public function export(Request $request): Response
    {
        $query = RenovationSubmission::query();

        // Apply same filters as index
        if ($request->filled('intent')) {
            $query->byIntent($request->input('intent'));
        }

        if ($request->filled('category')) {
            $query->byCategory($request->input('category'));
        }

        if ($request->filled('status')) {
            $query->byStatus($request->input('status'));
        }

        if ($request->filled('date_from') || $request->filled('date_to')) {
            $query->dateRange(
                $request->input('date_from'),
                $request->input('date_to')
            );
        }

        $submissions = $query->latest()->get();
        $csv = $this->submissionService->exportToCsv($submissions);

        return response($csv)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="renovation-submissions-' . date('Y-m-d') . '.csv"');
    }
}
