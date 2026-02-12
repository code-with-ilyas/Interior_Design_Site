@extends('layouts.master')

@section('content')
<section class="renovation-section" style="padding: 80px 0; background-color: #f9f9f9; min-height: 80vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Header -->
                <div class="text-center mb-5">
                    <h1 class="playfair-display" style="font-size: 24px; color: #003f3a; margin-bottom: 15px;">
                        What brings you here today?
                    </h1>
                    <p style="font-size: 14px; color: #666; max-width: 600px; margin: 0 auto;">
                        Select your primary intent to help us better understand your renovation needs
                    </p>
                </div>

                <!-- Intent Selection Form -->
                <form action="{{ route('renovation.store-intent') }}" method="POST" id="intentForm">
                    @csrf
                    <div class="row g-4 align-items-stretch">
                        @foreach($intents as $intent)
                        <div class="col-md-6 col-lg-4">
                            <label class="intent-card-wrapper" style="cursor: pointer; display: block; height: 100%;">
                                <input type="radio" name="intent" value="{{ $intent->value }}" required style="display: none;">
                                <div class="intent-card" style="
                                    background: #fff;
                                    border: 2px solid #e0e0e0;
                                    border-radius: 12px;
                                    padding: 15px 10px;
                                    text-align: center;
                                    transition: all 0.3s ease;
                                    height: 100%;
                                    display: flex;
                                    flex-direction: column;
                                    align-items: center;
                                    justify-content: center;
                                    position: relative;
                                ">
                                    <div class="icon-wrapper" style="
                                        width: 55px;
                                        height: 55px;
                                        background: #f0f8f7;
                                        border-radius: 50%;
                                        display: flex;
                                        align-items: center;
                                        justify-content: center;
                                        margin-bottom: 15px;
                                        transition: all 0.3s ease;
                                    ">
                                        <i class="fas {{ $intent->icon() }}" style="font-size: 22px; color: #003f3a;"></i>
                                    </div>
                                    <h3 style="font-size: 14px!important; color: #003f3a; margin-bottom: 8px; font-weight: 600;">
                                        {{ $intent->label() }}
                                    </h3>
                                    @if($intent->description())
                                    <p style="font-size: 12px; color: #666; margin: 0; line-height: 1.5;">
                                        {{ $intent->description() }}
                                    </p>
                                    @endif
                                    <div class="checkmark" style="
                                        position: absolute;
                                        top: 12px;
                                        right: 12px;
                                        width: 24px;
                                        height: 24px;
                                        background: #003f3a;
                                        border-radius: 50%;
                                        display: none;
                                        align-items: center;
                                        justify-content: center;
                                    ">
                                        <i class="fas fa-check" style="font-size: 12px; color: #fff;"></i>
                                    </div>
                                </div>
                            </label>
                        </div>
                        @endforeach

                        <!-- Continue Button as a Card -->
                        <div class="col-md-6 col-lg-12">
                            <div class="continue-button-wrapper" style="height: 100%;text-align:center;">
                                <button type="submit" class="th-btns black-border continue-btn" style="
                                    padding: 14px 45px;
                                    font-size: 16px;
                                    border-radius: 50px;
                                    background: #003f3a;
                                    color: #fff;
                                    border: 2px solid #003f3a;
                                    cursor: pointer;
                                    transition: all 0.3s ease;
                                    white-space: nowrap;
                                ">
                                    Continue
                                    <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    @error('intent')
                    <div class="alert alert-danger mt-4 text-center" style="border-radius: 8px;">
                        {{ $message }}
                    </div>
                    @enderror
                </form>
            </div>
        </div>
    </div>
</section>

<style>
    .intent-card:hover {
        border-color: #003f3a;
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 63, 58, 0.15);
    }

    .intent-card:hover .icon-wrapper {
        background: #003f3a;
    }

    .intent-card:hover .icon-wrapper i {
        color: #fff;
    }

    .intent-card-wrapper input:checked + .intent-card {
        border-color: #003f3a;
        background: linear-gradient(135deg, #f0f8f7 0%, #e6f4f3 100%);
        box-shadow: 0 8px 20px rgba(0, 63, 58, 0.2);
        transform: translateY(-3px);
    }

    .intent-card-wrapper input:checked + .intent-card .icon-wrapper {
        background: #003f3a;
    }

    .intent-card-wrapper input:checked + .intent-card .icon-wrapper i {
        color: #fff;
    }

    .intent-card-wrapper input:checked + .intent-card .checkmark {
        display: flex !important;
    }

    .continue-btn:hover {
        background: #005a55 !important;
        border-color: #005a55 !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 63, 58, 0.3);
    }

    /* Responsive: Stack button below cards on mobile */
    @media (max-width: 991px) {
        .continue-button-wrapper {
            margin-top: 20px;
        }
    }
</style>
@endsection
