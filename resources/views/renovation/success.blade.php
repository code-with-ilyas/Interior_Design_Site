@extends('layouts.master')

@section('content')
<section class="renovation-section" style="padding: 100px 0; background-color: #f9f9f9; min-height: 80vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Success Card -->
                <div class="success-card" style="
                    background: #fff;
                    border-radius: 12px;
                    padding: 60px 40px;
                    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
                    text-align: center;
                ">
                    <!-- Success Icon -->
                    <div class="success-icon mb-4" style="
                        width: 100px;
                        height: 100px;
                        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: 0 auto;
                        animation: scaleIn 0.5s ease-out;
                    ">
                        <i class="fas fa-check" style="font-size: 50px; color: #fff;"></i>
                    </div>

                    <!-- Success Message -->
                    <h1 class="playfair-display mb-3" style="font-size: 42px; color: #003f3a;">
                        Thank You!
                    </h1>
                    <p style="font-size: 20px; color: #666; margin-bottom: 30px; line-height: 1.6;">
                        Your renovation request has been successfully submitted.
                    </p>

                    <!-- Info Box -->
                    <div class="info-box" style="
                        background: #e6f0ef;
                        border-left: 4px solid #003f3a;
                        padding: 20px;
                        border-radius: 8px;
                        margin-bottom: 30px;
                        text-align: left;
                    ">
                        <h5 style="color: #003f3a; margin-bottom: 10px; font-weight: 600;">
                            What happens next?
                        </h5>
                        <ul style="margin: 0; padding-left: 20px; color: #666; line-height: 1.8;">
                            <li>You will receive a confirmation email shortly</li>
                            <li>Our team will review your request within 24-48 hours</li>
                            <li>We'll contact you to discuss your project in detail</li>
                            <li>You'll receive a personalized quote based on your requirements</li>
                        </ul>
                    </div>

                    <!-- Reference Number -->
                    @if(session('submission_id'))
                    <div class="reference-box mb-4" style="
                        background: #f8f9fa;
                        padding: 15px;
                        border-radius: 8px;
                        display: inline-block;
                    ">
                        <span style="color: #666; font-size: 14px;">Reference Number:</span>
                        <strong style="color: #003f3a; font-size: 18px; margin-left: 10px;">
                            #{{ str_pad(session('submission_id'), 6, '0', STR_PAD_LEFT) }}
                        </strong>
                    </div>
                    @endif

                    <!-- Action Buttons -->
                    <div class="action-buttons mt-4">
                        <a href="{{ url('/') }}" class="btn-action btn-primary" style="
                            padding: 15px 40px;
                            border-radius: 50px;
                            background: #003f3a;
                            color: #fff;
                            border: 2px solid #003f3a;
                            text-decoration: none;
                            font-size: 16px;
                            font-weight: 500;
                            display: inline-block;
                            margin: 0 10px 10px;
                            transition: all 0.3s ease;
                        ">
                            <i class="fas fa-home me-2"></i>
                            Return to Home
                        </a>
                        <a href="{{ route('renovation.intent-selection') }}" class="btn-action btn-secondary" style="
                            padding: 15px 40px;
                            border-radius: 50px;
                            background: transparent;
                            color: #003f3a;
                            border: 2px solid #003f3a;
                            text-decoration: none;
                            font-size: 16px;
                            font-weight: 500;
                            display: inline-block;
                            margin: 0 10px 10px;
                            transition: all 0.3s ease;
                        ">
                            <i class="fas fa-plus me-2"></i>
                            Submit Another Request
                        </a>
                    </div>

                    <!-- Contact Info -->
                    @php
                        $siteSetting = \App\Models\SiteSetting::first();
                    @endphp
                    @if($siteSetting)
                    <div class="contact-info mt-5 pt-4" style="border-top: 1px solid #e0e0e0;">
                        <p style="color: #666; font-size: 14px; margin-bottom: 10px;">
                            Need immediate assistance?
                        </p>
                        <div style="font-size: 16px; color: #003f3a;">
                            @if($siteSetting->phone)
                            <a href="tel:{{ preg_replace('/[^0-9]/', '', $siteSetting->phone) }}" style="color: #003f3a; text-decoration: none; margin: 0 15px;">
                                <i class="fas fa-phone me-2"></i>{{ $siteSetting->phone }}
                            </a>
                            @endif
                            @if($siteSetting->email)
                            <a href="mailto:{{ $siteSetting->email }}" style="color: #003f3a; text-decoration: none; margin: 0 15px;">
                                <i class="fas fa-envelope me-2"></i>{{ $siteSetting->email }}
                            </a>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    @keyframes scaleIn {
        0% {
            transform: scale(0);
            opacity: 0;
        }
        50% {
            transform: scale(1.1);
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    .btn-action:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 63, 58, 0.3);
    }

    .btn-primary:hover {
        background: #005a55 !important;
        border-color: #005a55 !important;
    }

    .btn-secondary:hover {
        background: #003f3a !important;
        color: #fff !important;
    }

    .contact-info a:hover {
        text-decoration: underline !important;
    }
</style>
@endsection
