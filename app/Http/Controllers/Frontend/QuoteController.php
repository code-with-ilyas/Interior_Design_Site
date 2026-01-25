<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\StoreQuoteRequest;
use App\Mail\QuoteAdminMail;
use App\Mail\QuoteUserMail;
use App\Models\Quote;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class QuoteController extends Controller
{
    /**
     * Handle the incoming frontend quote request.
     */
    public function __invoke(StoreQuoteRequest $request): JsonResponse
    {
        $quote = Quote::create($request->validated());

        try {
            // Send email to admin
            Mail::to(config('mail.from.address'))->send(new QuoteAdminMail($quote));

            // Send confirmation email to user
            Mail::to($quote->email)->send(new QuoteUserMail($quote));
        } catch (\Exception $e) {
            // Log the error but still return success to avoid form failure
            Log::error('Failed to send quote request emails: ' . $e->getMessage());
        }

        return response()->json([
            'status'  => 'success',
            'message' => 'Your request has been submitted successfully.',
        ]);
    }
}
