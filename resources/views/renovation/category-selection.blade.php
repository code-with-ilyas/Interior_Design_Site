@extends('layouts.master')

@section('content')
<section class="renovation-section" style="padding: 80px 0; background-color: #f9f9f9; min-height: 80vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Header -->
                <div class="text-center mb-5">
                    <h1 class="playfair-display" style="font-size: 24px; color: #003f3a; margin-bottom: 15px;">
                        Choose Your Renovation Type
                    </h1>
                    <p style="font-size: 14px; color: #666; max-width: 600px; margin: 0 auto;">
                        Select the category that best matches your renovation project
                    </p>
                </div>

                <!-- Category Cards Grid -->
                <div class="row g-4">
                    @foreach($categories as $category)
                    <div class="col-md-6 col-lg-4">
                        <a href="{{ route('renovation.step', ['categorySlug' => $category->value, 'stepNumber' => 1]) }}"
                           class="category-card-link" style="text-decoration: none; display: block;">
                            <div class="category-card" style="
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
                                    <i class="fas {{ $category->icon() }}" style="font-size: 22px; color: #003f3a;"></i>
                                </div>
                                <h3 style="font-size: 14px!important; color: #003f3a; margin-bottom: 8px; font-weight: 600;">
                                    {{ $category->label() }}
                                </h3>
                                <p style="font-size: 12pximportant; color: #666; margin: 0 0 10px 0; line-height: 1.5;">
                                    {{ $category->description() }}
                                </p>
                                <span style="font-size: 12px; color: #999; font-style: italic;">
                                    {{ $category->totalSteps() }} steps
                                </span>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>

                <!-- Back Button -->
                <div class="text-center mt-5">
                    <a href="{{ route('renovation.intent-selection') }}" class="btn-back" style="
                        padding: 12px 35px;
                        font-size: 16px;
                        border-radius: 50px;
                        background: transparent;
                        color: #003f3a;
                        border: 2px solid #003f3a;
                        text-decoration: none;
                        display: inline-block;
                        transition: all 0.3s ease;
                    ">
                        <i class="fas fa-arrow-left me-2"></i>
                        Back to Intent Selection
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .category-card:hover {
        border-color: #003f3a;
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 63, 58, 0.15);
    }

    .category-card:hover .icon-wrapper {
        background: #003f3a;
    }

    .category-card:hover .icon-wrapper i {
        color: #fff;
    }

    .category-card-link:active .category-card,
    .category-card-link:focus .category-card {
        border-color: #003f3a;
        background: linear-gradient(135deg, #f0f8f7 0%, #e6f4f3 100%);
        box-shadow: 0 8px 20px rgba(0, 63, 58, 0.2);
    }

    .btn-back:hover {
        background: #003f3a;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 63, 58, 0.3);
    }
</style>
@endsection
