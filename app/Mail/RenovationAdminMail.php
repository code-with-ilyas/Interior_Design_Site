<?php

namespace App\Mail;

use App\Models\RenovationSubmission;
use App\Enums\RenovationIntent;
use App\Enums\RenovationCategory;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RenovationAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public RenovationIntent $intent;
    public RenovationCategory $category;
    public array $formData;

    /**
     * Create a new message instance.
     */
    public function __construct(public RenovationSubmission $submission)
    {
        $this->intent = RenovationIntent::from($submission->intent);
        $this->category = RenovationCategory::fromSlug($submission->category_slug);
        $this->formData = $submission->getFormData();
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('New Renovation Request: ' . $this->submission->full_name)
                    ->view('emails.renovation-admin')
                    ->with([
                        'submission' => $this->submission,
                        'intent' => $this->intent,
                        'category' => $this->category,
                        'formData' => $this->formData,
                    ]);
    }
}
