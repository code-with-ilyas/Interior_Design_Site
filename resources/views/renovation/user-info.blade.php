@extends('layouts.master')

@section('content')
<section class="renovation-section" style="padding: 80px 0; background-color: #f9f9f9; min-height: 80vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Header -->
                <div class="text-center mb-5">
                    <h1 class="playfair-display" style="font-size: 42px; color: #003f3a; margin-bottom: 15px;">
                        Almost Done!
                    </h1>
                    <p style="font-size: 18px; color: #666; max-width: 700px; margin: 0 auto;">
                        Please provide your contact information so we can get back to you with your {{ $category->label() }} request.
                    </p>
                </div>

                <!-- Form Card -->
                <div class="form-card" style="
                    background: #fff;
                    border-radius: 12px;
                    padding: 40px;
                    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
                ">
                    <form action="{{ route('renovation.submit', ['categorySlug' => $category->value]) }}" method="POST">
                        @csrf

                        <!-- Name Fields -->
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="first_name" style="font-weight: 600; color: #003f3a; margin-bottom: 8px; display: block;">
                                    First Name <span style="color: #dc3545;">*</span>
                                </label>
                                <input type="text"
                                       class="form-control @error('first_name') is-invalid @enderror"
                                       id="first_name"
                                       name="first_name"
                                       value="{{ old('first_name') }}"
                                       required
                                       style="
                                           padding: 12px 15px;
                                           border: 2px solid #e0e0e0;
                                           border-radius: 8px;
                                           font-size: 16px;
                                           transition: all 0.3s ease;
                                       ">
                                @error('first_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="last_name" style="font-weight: 600; color: #003f3a; margin-bottom: 8px; display: block;">
                                    Last Name <span style="color: #dc3545;">*</span>
                                </label>
                                <input type="text"
                                       class="form-control @error('last_name') is-invalid @enderror"
                                       id="last_name"
                                       name="last_name"
                                       value="{{ old('last_name') }}"
                                       required
                                       style="
                                           padding: 12px 15px;
                                           border: 2px solid #e0e0e0;
                                           border-radius: 8px;
                                           font-size: 16px;
                                           transition: all 0.3s ease;
                                       ">
                                @error('last_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Email and Phone -->
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="email" style="font-weight: 600; color: #003f3a; margin-bottom: 8px; display: block;">
                                    Email Address <span style="color: #dc3545;">*</span>
                                </label>
                                <input type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       id="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required
                                       style="
                                           padding: 12px 15px;
                                           border: 2px solid #e0e0e0;
                                           border-radius: 8px;
                                           font-size: 16px;
                                           transition: all 0.3s ease;
                                       ">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="phone" style="font-weight: 600; color: #003f3a; margin-bottom: 8px; display: block;">
                                    Phone Number
                                </label>
                                <input type="tel"
                                       class="form-control @error('phone') is-invalid @enderror"
                                       id="phone"
                                       name="phone"
                                       value="{{ old('phone') }}"
                                       style="
                                           padding: 12px 15px;
                                           border: 2px solid #e0e0e0;
                                           border-radius: 8px;
                                           font-size: 16px;
                                           transition: all 0.3s ease;
                                       ">
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label for="address" style="font-weight: 600; color: #003f3a; margin-bottom: 8px; display: block;">
                                Street Address
                            </label>
                            <input type="text"
                                   class="form-control @error('address') is-invalid @enderror"
                                   id="address"
                                   name="address"
                                   value="{{ old('address') }}"
                                   style="
                                       padding: 12px 15px;
                                       border: 2px solid #e0e0e0;
                                       border-radius: 8px;
                                       font-size: 16px;
                                       transition: all 0.3s ease;
                                   ">
                            @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- City and Postal Code -->
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="city" style="font-weight: 600; color: #003f3a; margin-bottom: 8px; display: block;">
                                    City
                                </label>
                                <input type="text"
                                       class="form-control @error('city') is-invalid @enderror"
                                       id="city"
                                       name="city"
                                       value="{{ old('city') }}"
                                       style="
                                           padding: 12px 15px;
                                           border: 2px solid #e0e0e0;
                                           border-radius: 8px;
                                           font-size: 16px;
                                           transition: all 0.3s ease;
                                       ">
                                @error('city')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="postal_code" style="font-weight: 600; color: #003f3a; margin-bottom: 8px; display: block;">
                                    Postal Code
                                </label>
                                <input type="text"
                                       class="form-control @error('postal_code') is-invalid @enderror"
                                       id="postal_code"
                                       name="postal_code"
                                       value="{{ old('postal_code') }}"
                                       style="
                                           padding: 12px 15px;
                                           border: 2px solid #e0e0e0;
                                           border-radius: 8px;
                                           font-size: 16px;
                                           transition: all 0.3s ease;
                                       ">
                                @error('postal_code')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Navigation Buttons -->
                        <div class="d-flex justify-content-between align-items-center mt-4 pt-3" style="border-top: 1px solid #e0e0e0;">
                            <a href="{{ route('renovation.step', ['categorySlug' => $category->value, 'stepNumber' => $category->totalSteps()]) }}"
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

                            <button type="submit" id="submitBtn" class="btn-nav btn-submit" style="
                                padding: 12px 40px;
                                border-radius: 50px;
                                background: #003f3a;
                                color: #fff;
                                border: 2px solid #003f3a;
                                font-size: 16px;
                                font-weight: 500;
                                cursor: pointer;
                                transition: all 0.3s ease;
                                position: relative;
                            ">
                                <span class="btn-text">
                                    Submit Request
                                    <i class="fas fa-check ms-2"></i>
                                </span>
                                <span class="btn-loading" style="display: none;">
                                    <i class="fas fa-spinner fa-spin me-2"></i>
                                    Submitting...
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .form-control:focus {
        border-color: #003f3a;
        box-shadow: 0 0 0 0.2rem rgba(0, 63, 58, 0.15);
        outline: none;
    }

    .btn-nav:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 63, 58, 0.3);
    }

    .btn-prev:hover {
        background: #003f3a !important;
        color: #fff !important;
    }

    .btn-submit:hover:not(:disabled) {
        background: #005a55 !important;
        border-color: #005a55 !important;
    }

    .btn-submit:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }
</style>

@endsection

@push('scripts')
<script>
(function() {
    'use strict';

    // Wait for DOM to be fully loaded
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initFormSubmit);
    } else {
        initFormSubmit();
    }

    function initFormSubmit() {
        const form = document.querySelector('form[action*="submit"]');
        const submitBtn = document.getElementById('submitBtn');

        if (!form) {
            // console.error('Renovation form not found');
            return;
        }

        if (!submitBtn) {
            // console.error('Submit button not found');
            return;
        }

        const btnText = submitBtn.querySelector('.btn-text');
        const btnLoading = submitBtn.querySelector('.btn-loading');

        if (!btnText || !btnLoading) {
            // console.error('Button text or loading span not found');
            return;
        }

        // console.log('Form submit handler initialized');

        form.addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent default form submission
            // console.log('Form submit triggered via AJAX');

            // Prevent multiple submissions
            if (submitBtn.disabled || submitBtn.hasAttribute('data-submitting')) {
                // console.log('Form already submitting, preventing duplicate');
                return false;
            }

            // console.log('Disabling button and showing spinner');

            // Mark as submitting
            submitBtn.setAttribute('data-submitting', 'true');

            // Disable submit button
            submitBtn.disabled = true;
            submitBtn.setAttribute('disabled', 'disabled');
            submitBtn.classList.add('disabled');
            submitBtn.style.pointerEvents = 'none';
            submitBtn.style.opacity = '0.7';
            submitBtn.style.cursor = 'not-allowed';

            // Hide normal text and show loading
            btnText.style.display = 'none';
            btnLoading.style.display = 'inline-block';

            // Get form data
            const formData = new FormData(form);
            const actionUrl = form.action;

            // Submit via AJAX
            fetch(actionUrl, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },
                credentials: 'same-origin'
            })
            .then(response => {
                // console.log('Response status:', response.status);

                if (response.redirected) {
                    // If server sent a redirect, follow it
                    // console.log('Server redirected to:', response.url);
                    window.location.href = response.url;
                    return;
                }

                return response.json().then(data => {
                    if (!response.ok) {
                        throw { status: response.status, data: data };
                    }
                    return data;
                });
            })
            .then(data => {
                if (!data) return; // Already redirected

                // console.log('AJAX response:', data);

                if (data.success && data.redirect) {
                    // Redirect to success page
                    // console.log('Redirecting to:', data.redirect);
                    window.location.href = data.redirect;
                } else if (data.errors) {
                    // Handle validation errors
                    // console.error('Validation errors:', data.errors);
                    displayErrors(data.errors);
                    resetButton();
                } else {
                    // console.error('Unexpected response format:', data);
                    alert('An unexpected error occurred. Please try again.');
                    resetButton();
                }
            })
            .catch(error => {
                // console.error('AJAX error:', error);

                if (error.status === 422 && error.data && error.data.errors) {
                    // Validation errors
                    displayErrors(error.data.errors);
                } else if (error.status === 419) {
                    // CSRF token mismatch
                    alert('Your session has expired. Please refresh the page and try again.');
                } else if (error.status === 500 && error.data && error.data.message) {
                    // Server error with message
                    if (error.data.message.includes('Intent is required')) {
                        alert('Your session has expired. Please start from the beginning by selecting your intent.');
                        window.location.href = '{{ route("renovation.intent-selection") }}';
                    } else {
                        alert('Error: ' + error.data.message);
                    }
                } else {
                    alert('An error occurred while submitting your request. Please try again.');
                }

                resetButton();
            });
        });

        function displayErrors(errors) {
            // Clear previous errors
            document.querySelectorAll('.invalid-feedback').forEach(el => {
                el.style.display = 'none';
            });
            document.querySelectorAll('.is-invalid').forEach(el => {
                el.classList.remove('is-invalid');
            });

            // Display new errors
            Object.keys(errors).forEach(fieldName => {
                const input = document.querySelector(`[name="${fieldName}"]`);
                if (input) {
                    input.classList.add('is-invalid');
                    const errorDiv = input.parentElement.querySelector('.invalid-feedback');
                    if (errorDiv) {
                        errorDiv.textContent = errors[fieldName][0];
                        errorDiv.style.display = 'block';
                    } else {
                        // Create error div if it doesn't exist
                        const newErrorDiv = document.createElement('div');
                        newErrorDiv.className = 'invalid-feedback';
                        newErrorDiv.style.display = 'block';
                        newErrorDiv.textContent = errors[fieldName][0];
                        input.parentElement.appendChild(newErrorDiv);
                    }
                }
            });

            // Scroll to first error
            const firstError = document.querySelector('.is-invalid');
            if (firstError) {
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                firstError.focus();
            }
        }

        function resetButton() {
            submitBtn.removeAttribute('data-submitting');
            submitBtn.disabled = false;
            submitBtn.removeAttribute('disabled');
            submitBtn.classList.remove('disabled');
            submitBtn.style.pointerEvents = '';
            submitBtn.style.opacity = '';
            submitBtn.style.cursor = '';
            btnText.style.display = '';
            btnLoading.style.display = 'none';
        }
    }
})();
</script>
@endpush
