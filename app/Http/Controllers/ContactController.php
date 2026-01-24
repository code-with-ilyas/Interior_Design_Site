<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    /**
     * Store a newly created contact message in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:150',
            'message' => 'required|string'
        ], [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'phone.required' => 'Phone number is required.',
            'subject.required' => 'Subject is required.',
            'message.required' => 'Message is required.'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Store in database
            $contact = Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'message' => $request->message
            ]);

            // Send email notification
            $this->sendContactEmail($contact);

            return response()->json([
                'success' => true,
                'message' => 'Thank you for contacting us! We will get back to you soon.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, there was an error processing your request. Please try again.'
            ], 500);
        }
    }

    /**
     * Send contact email notification
     *
     * @param Contact $contact
     * @return void
     */
    private function sendContactEmail(Contact $contact)
    {
        try {
            // Send email to admin
            Mail::send('emails.contact-admin', ['contact' => $contact], function ($message) use ($contact) {
                $message->to(config('mail.from.address'))
                        ->subject('New Contact Form Submission - ' . $contact->subject)
                        ->from(config('mail.from.address'), config('mail.from.name'));
            });

            // Send confirmation email to user
            Mail::send('emails.contact-user', ['contact' => $contact], function ($message) use ($contact) {
                $message->to($contact->email, $contact->name)
                        ->subject('Thank you for contacting us!')
                        ->from(config('mail.from.address'), config('mail.from.name'));
            });
        } catch (\Exception $e) {
            // Log the error but don't fail the request
            Log::error('Contact email sending failed: ' . $e->getMessage());
        }
    }
}
