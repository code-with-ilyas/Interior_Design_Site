@extends('layouts.master')

@section('content')
<section style="min-height: 100vh; background-color: white;">
    <div class="container">
        <div class="services-header">
            <h5 class="title-heading">Legal Notices</h5>
            <p class="text-custom text-light-green">Important legal information</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="legal-content">
                    @if($siteSetting && $siteSetting->legal_notices)
                        <div class="content-wrapper">
                            {!! $siteSetting->legal_notices !!}
                        </div>
                    @else
                        <div class="alert alert-info">
                            <h4 class="text-center">Legal Notices Content</h4>
                            <p class="text-center">Please add legal notices content in the site settings panel.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .legal-content {
        line-height: 1.8;
        font-size: 16px;
        color: #333;
    }

    .legal-content h1,
    .legal-content h2,
    .legal-content h3,
    .legal-content h4,
    .legal-content h5,
    .legal-content h6 {
        margin-top: 1.5rem;
        margin-bottom: 1rem;
        color: #003f3a;
    }

    .legal-content p {
        margin-bottom: 1rem;
    }

    .legal-content ul,
    .legal-content ol {
        margin-bottom: 1rem;
        padding-left: 1.5rem;
    }

    .legal-content li {
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
