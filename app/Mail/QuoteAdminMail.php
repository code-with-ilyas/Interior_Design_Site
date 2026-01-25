<?php

namespace App\Mail;

use App\Models\Quote;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuoteAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public Quote $quote)
    {
        //
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('New Quote Request: ' . $this->quote->name)
                    ->view('emails.quote-admin');
    }
}
