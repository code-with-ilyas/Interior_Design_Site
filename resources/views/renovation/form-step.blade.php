@extends('layouts.master')

@section('content')
<section class="renovation-section" style="padding: 80px 0; background-color: #f9f9f9; min-height: 80vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Progress Header -->
                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h2 class="playfair-display" style="font-size: 28px; color: #003f3a; margin: 0;">
                            {{ $category->label() }}
                        </h2>
                        <span style="font-size: 16px; color: #666; font-weight: 500;">
                            Step {{ $stepNumber }} of {{ $totalSteps }}
                        </span>
                    </div>

                    <!-- Progress Bar -->
                    <div class="progress" style="height: 8px; border-radius: 10px; background-color: #e0e0e0;">
                        <div class="progress-bar" role="progressbar"
                             style="width: {{ ($stepNumber / $totalSteps) * 100 }}%; background: linear-gradient(135deg, #003f3a 0%, #005a55 100%); border-radius: 10px;"
                             aria-valuenow="{{ $stepNumber }}"
                             aria-valuemin="0"
                             aria-valuemax="{{ $totalSteps }}">
                        </div>
                    </div>
                </div>

                <!-- Form Card -->
                <div class="form-card" style="
                    background: #fff;
                    border-radius: 12px;
                    padding: 40px;
                    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
                ">
                    <!-- Step Title and Description -->
                    <div class="mb-4">
                        <h3 class="playfair-display" style="font-size: 24px; color: #003f3a; margin-bottom: 10px;">
                            {{ $step['title'] }}
                        </h3>
                        @if(!empty($step['description']))
                        <p style="font-size: 16px; color: #666; margin: 0;">
                            {{ $step['description'] }}
                        </p>
                        @endif
                    </div>

                    <!-- Form -->
                    <form action="{{ route('renovation.process-step', ['categorySlug' => $category->value, 'stepNumber' => $stepNumber]) }}" method="POST">
                        @csrf

                        <!-- Dynamic Input Rendering -->
                        @if($step['input_type'] === 'radio')
                            <x-renovation.radio-group
                                name="response"
                                label="Please select an option"
                                :options="$step['options']"
                                :required="$step['required']"
                                :value="$previousResponse"
                            />
                        @elseif($step['input_type'] === 'checkbox')
                            <x-renovation.checkbox-group
                                name="response"
                                label="Please select one or more options"
                                :options="$step['options']"
                                :required="$step['required']"
                                :value="$previousResponse"
                            />
                        @elseif($step['input_type'] === 'select')
                            <x-renovation.select-input
                                name="response"
                                label="Please select an option"
                                :options="$step['options']"
                                :required="$step['required']"
                                :value="$previousResponse"
                                placeholder="Choose an option..."
                            />
                        @elseif($step['input_type'] === 'textarea')
                            <x-renovation.textarea-input
                                name="response"
                                label="Your response"
                                :required="$step['required']"
                                :value="$previousResponse"
                                placeholder="Please provide details..."
                            />
                        @elseif($step['input_type'] === 'text')
                            <x-renovation.text-input
                                name="response"
                                label="Your response"
                                :required="$step['required']"
                                :value="$previousResponse"
                                placeholder="Enter your response..."
                            />
                        @endif

                        <!-- Error Message -->
                        @error('response')
                        <div class="alert alert-danger mt-3" style="border-radius: 8px;">
                            {{ $message }}
                        </div>
                        @enderror

                        <!-- Navigation Buttons -->
                        <div class="d-flex justify-content-between align-items-center mt-4 pt-3" style="border-top: 1px solid #e0e0e0;">
                            @if($stepNumber > 1)
                            <a href="{{ route('renovation.previous-step', ['categorySlug' => $category->value, 'stepNumber' => $stepNumber]) }}"
                               class="btn-nav btn-prev" style="
                                padding: 12px 30px;
                                border-radius: 50px;
                                background: transparent;
                                color: #003f3a;
                                border: 2px solid #003f3a;
                                text-decoration: none;
                                font-size: 16px;
                                font-weight: 500;
                                transition: all 0.3s ease;
                                display: inline-block;
                            ">
                                <i class="fas fa-arrow-left me-2"></i>
                                Previous
                            </a>
                            @else
                            <a href="{{ route('renovation.category-selection') }}"
                               class="btn-nav btn-prev" style="
                                padding: 12px 30px;
                                border-radius: 50px;
                                background: transparent;
                                color: #003f3a;
                                border: 2px solid #003f3a;
                                text-decoration: none;
                                font-size: 16px;
                                font-weight: 500;
                                transition: all 0.3s ease;
                                display: inline-block;
                            ">
                                <i class="fas fa-arrow-left me-2"></i>
                                Back to Categories
                            </a>
                            @endif

                            <button type="submit" class="btn-nav btn-next" style="
                                padding: 12px 30px;
                                border-radius: 50px;
                                background: #003f3a;
                                color: #fff;
                                border: 2px solid #003f3a;
                                font-size: 16px;
                                font-weight: 500;
                                cursor: pointer;
                                transition: all 0.3s ease;
                            ">
                                @if($isLastStep)
                                    Continue to Contact Info
                                @else
                                    Next
                                @endif
                                <i class="fas fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .btn-nav:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 63, 58, 0.3);
    }

    .btn-prev:hover {
        background: #003f3a !important;
        color: #fff !important;
    }

    .btn-next:hover {
        background: #005a55 !important;
        border-color: #005a55 !important;
    }
</style>
@endsection
