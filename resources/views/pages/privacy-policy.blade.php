@extends('layouts.master')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white text-center py-4" style="background: linear-gradient(135deg, #003f3a 0%, #006400 100%) !important;">
                    <h1 class="mb-0 fw-bold">Privacy Policy</h1>
                </div>
                <div class="card-body px-4 py-5">
                    <div class="privacy-content">
                        @if($siteSetting && $siteSetting->privacy_policy)
                            <div class="content-wrapper">
                                {!! $siteSetting->privacy_policy !!}
                            </div>
                        @else
                            <div class="alert alert-info">
                                <h4 class="text-center">Privacy Policy Content</h4>
                                <p class="text-center">Please add privacy policy content in the site settings panel.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .privacy-content {
        line-height: 1.8;
        font-size: 16px;
        color: #333;
    }

    .privacy-content h1,
    .privacy-content h2,
    .privacy-content h3,
    .privacy-content h4,
    .privacy-content h5,
    .privacy-content h6 {
        margin-top: 1.5rem;
        margin-bottom: 1rem;
        color: #003f3a;
    }

    .privacy-content p {
        margin-bottom: 1rem;
    }

    .privacy-content ul,
    .privacy-content ol {
        margin-bottom: 1rem;
        padding-left: 1.5rem;
    }

    .privacy-content li {
        margin-bottom: 0.5rem;
    }

    .content-wrapper {
        max-width: 100%;
    }

    .card {
        border-radius: 10px;
        overflow: hidden;
    }

    .card-header h1 {
        font-size: 2.2rem;
        font-weight: 600;
    }

    .card-body {
        background-color: #f8f9fa;
    }
</style>
@endsection
