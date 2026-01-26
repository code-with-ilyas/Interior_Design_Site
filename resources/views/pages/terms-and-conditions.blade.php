@extends('layouts.master')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white text-center py-4" style="background: linear-gradient(135deg, #003f3a 0%, #003f3a 100%) !important;">
                    <h1 class="mb-0 fw-bold">Terms and Conditions</h1>
                </div>
                <div class="card-body px-4 py-5">
                    <div class="terms-content">
                        @if($siteSetting && $siteSetting->terms_and_conditions)
                            <div class="content-wrapper">
                                {!! $siteSetting->terms_and_conditions !!}
                            </div>
                        @else
                            <div class="alert alert-info">
                                <h4 class="text-center">Terms and Conditions Content</h4>
                                <p class="text-center">Please add terms and conditions content in the site settings panel.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .terms-content {
        line-height: 1.8;
        font-size: 16px;
        color: #333;
    }

    .terms-content h1,
    .terms-content h2,
    .terms-content h3,
    .terms-content h4,
    .terms-content h5,
    .terms-content h6 {
        margin-top: 1.5rem;
        margin-bottom: 1rem;
        color: #003f3a;
    }

    .terms-content p {
        margin-bottom: 1rem;
    }

    .terms-content ul,
    .terms-content ol {
        margin-bottom: 1rem;
        padding-left: 1.5rem;
    }

    .terms-content li {
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
