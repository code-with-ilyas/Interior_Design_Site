<?php

namespace App\Mail;

use App\Models\Quote;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuoteUserMail extends Mailable
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
        return $this->subject('Thank you for your quote request!')
                    ->view('emails.quote-user');
    }
}
