<?php

namespace App\Services;

use App\Enums\RenovationCategory;
use App\Enums\RenovationIntent;
use App\Mail\RenovationAdminMail;
use App\Mail\RenovationUserMail;
use App\Models\RenovationSubmission;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RenovationSubmissionService
{
    /**
     * Create a new submission
     *
     * @param RenovationCategory $category
     * @param array $userInfo
     * @param array $stepResponses
     * @return RenovationSubmission
     */
    public function createSubmission(
        RenovationCategory $category,
        array $userInfo,
        array $stepResponses
    ): RenovationSubmission {
        // Get intent from session
        $intent = session('renovation.intent');

        // Log for debugging
        Log::info('Creating renovation submission', [
            'intent' => $intent,
            'category' => $category->value,
            'step_responses_count' => count($stepResponses),
            'step_responses' => $stepResponses,
            'full_session' => session()->all(),
        ]);

        // Validate intent exists
        if (!$intent) {
            Log::error('Intent is missing from session', [
                'session_data' => session()->all(),
            ]);
            throw new \Exception('Intent is required but not found in session. Please start from the beginning.');
        }

        // Prepare form data with step details
        $formData = $this->prepareFormData($category, $stepResponses);

        Log::info('Prepared form data', [
            'form_data' => $formData,
            'form_data_json' => json_encode($formData),
        ]);

        // Create submission
        $submission = RenovationSubmission::create([
            'intent' => $intent,
            'category_slug' => $category->value,
            'first_name' => $userInfo['first_name'],
            'last_name' => $userInfo['last_name'],
            'email' => $userInfo['email'],
            'phone' => $userInfo['phone'] ?? null,
            'address' => $userInfo['address'] ?? null,
            'city' => $userInfo['city'] ?? null,
            'postal_code' => $userInfo['postal_code'] ?? null,
            'form_data_json' => $formData,
            'status' => 'pending',
            'ip_address' => request()->ip(),
        ]);

        Log::info('Submission created', [
            'submission_id' => $submission->id,
            'form_data_json_saved' => $submission->form_data_json,
        ]);

        // Queue email notifications
        $this->sendNotifications($submission);

        return $submission;
    }

    /**
     * Prepare form data with step details
     *
     * @param RenovationCategory $category
     * @param array $stepResponses
     * @return array
     */
    public function prepareFormData(RenovationCategory $category, array $stepResponses): array
    {
        $formData = [];

        foreach ($stepResponses as $stepNumber => $response) {
            $step = $category->getStep($stepNumber);
            if ($step) {
                $formData[] = [
                    'step_number' => $stepNumber,
                    'title' => $step['title'],
                    'description' => $step['description'],
                    'response' => $response,
                    'input_type' => $step['input_type'],
                ];
            }
        }

        return $formData;
    }

    /**
     * Send email notifications
     *
     * @param RenovationSubmission $submission
     * @return void
     */
    public function sendNotifications(RenovationSubmission $submission): void
    {
        try {
            // Send emails directly (synchronously)
            Mail::to(config('mail.from.address'))
                ->send(new RenovationAdminMail($submission));

            Mail::to($submission->email)
                ->send(new RenovationUserMail($submission));

            Log::info('Renovation notification emails sent successfully', [
                'submission_id' => $submission->id,
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to send renovation notification emails: ' . $e->getMessage(), [
                'submission_id' => $submission->id,
                'exception' => $e,
            ]);
        }
    }

    /**
     * Update submission status
     *
     * @param RenovationSubmission $submission
     * @param string $status
     * @return bool
     */
    public function updateStatus(RenovationSubmission $submission, string $status): bool
    {
        if (!in_array($status, ['pending', 'reviewed', 'completed'])) {
            return false;
        }

        $submission->status = $status;
        return $submission->save();
    }

    /**
     * Export submissions to CSV
     *
     * @param \Illuminate\Support\Collection $submissions
     * @return string
     */
    public function exportToCsv($submissions): string
    {
        $csv = "ID,Intent,Category,Name,Email,Phone,Status,Submitted At\n";

        foreach ($submissions as $submission) {
            $intent = RenovationIntent::tryFrom($submission->intent);
            $category = RenovationCategory::fromSlug($submission->category_slug);

            $csv .= sprintf(
                "%d,%s,%s,%s %s,%s,%s,%s,%s\n",
                $submission->id,
                $this->escapeCsv($intent ? $intent->label() : $submission->intent),
                $this->escapeCsv($category ? $category->label() : $submission->category_slug),
                $this->escapeCsv($submission->first_name),
                $this->escapeCsv($submission->last_name),
                $this->escapeCsv($submission->email),
                $this->escapeCsv($submission->phone ?? ''),
                $this->escapeCsv($submission->status),
                $submission->created_at->format('Y-m-d H:i:s')
            );
        }

        return $csv;
    }

    /**
     * Escape CSV field value
     *
     * @param string $value
     * @return string
     */
    private function escapeCsv(string $value): string
    {
        // If value contains comma, quote, or newline, wrap in quotes and escape quotes
        if (strpos($value, ',') !== false || strpos($value, '"') !== false || strpos($value, "\n") !== false) {
            return '"' . str_replace('"', '""', $value) . '"';
        }
        return $value;
    }
}
