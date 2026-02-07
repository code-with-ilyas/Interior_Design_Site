@extends('layouts.master')

@section('content')
<section class="project-detail-section space">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <article class="project-article">
                    <header class="project-header">
                        <h1 class="project-title">{{ $project->title }}</h1>

                        <div class="project-meta mb-4">
                            @if($project->projectCategory)
                                <span class="badge badge-secondary">{{ $project->projectCategory->name }}</span>
                            @endif
                            @if($project->location)
                                <span class="ml-2"><i class="fas fa-map-marker-alt"></i> {{ $project->location }}</span>
                            @endif
                            @if($project->completion_year)
                                <span class="ml-2"><i class="fas fa-calendar"></i> {{ $project->completion_year }}</span>
                            @endif
                        </div>
                    </header>

                    <!-- Project Cover Image -->
                    @if($project->cover_image)
                        <div class="project-cover mb-4">
                            <img src="{{ Storage::url($project->cover_image) }}" alt="{{ $project->title }}" class="img-fluid rounded">
                        </div>
                    @else
                        <div class="project-cover mb-4">
                            <img src="{{ asset('assets/img/project/project_details.jpg') }}" alt="{{ $project->title }}" class="img-fluid rounded">
                        </div>
                    @endif

                    <!-- Project Gallery -->
                    @if($project->projectImages->count() > 0)
                        <div class="project-gallery mb-4">
                            <h3 class="section-title">Project Gallery</h3>
                            <div class="row">
                                @foreach($project->projectImages as $image)
                                    <div class="col-md-4 mb-3">
                                        <div class="project-image">
                                            <img src="{{ Storage::url($image->image) }}" alt="{{ $image->caption ?: $project->title }}" class="img-fluid rounded">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Project Details -->
                    <div class="project-details">
                        @if($project->long_description)
                            <h3 class="section-title">Project Overview</h3>
                            <div class="project-description">
                                {!! $project->long_description !!}
                            </div>
                        @endif

                        @if($project->short_description)
                            <div class="project-short-description mt-3">
                                <p>{{ $project->short_description }}</p>
                            </div>
                        @endif

                        <!-- Project Specifications -->
                        <div class="project-specifications mt-4">
                            <h3 class="section-title">Project Specifications</h3>
                            <div class="row">
                                @if($project->property_type)
                                    <div class="col-md-6">
                                        <p><strong>Property Type:</strong> {{ $project->property_type }}</p>
                                    </div>
                                @endif

                                @if($project->project_type)
                                    <div class="col-md-6">
                                        <p><strong>Project Type:</strong> {{ $project->project_type }}</p>
                                    </div>
                                @endif

                                @if($project->surface_area)
                                    <div class="col-md-6">
                                        <p><strong>Surface Area:</strong> {{ $project->surface_area }}</p>
                                    </div>
                                @endif

                                @if($project->budget)
                                    <div class="col-md-6">
                                        <p><strong>Budget:</strong> {{ $project->cost_currency }} {{ number_format($project->budget, 2) }}</p>
                                    </div>
                                @endif

                                @if($project->duration_weeks)
                                    <div class="col-md-6">
                                        <p><strong>Duration:</strong> {{ $project->duration_weeks }} weeks</p>
                                    </div>
                                @endif

                                @if($project->completion_year)
                                    <div class="col-md-6">
                                        <p><strong>Completion Year:</strong> {{ $project->completion_year }}</p>
                                    </div>
                                @endif

                                @if($project->client_name)
                                    <div class="col-md-6">
                                        <p><strong>Client:</strong> {{ $project->client_name }}</p>
                                    </div>
                                @endif

                                @if($project->architect_name)
                                    <div class="col-md-6">
                                        <p><strong>Architect:</strong> {{ $project->architect_name }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Materials Used -->
                        @if($project->materials_used)
                            <div class="project-materials mt-4">
                                <h3 class="section-title">Materials Used</h3>
                                <div class="materials-content">
                                    {!! $project->materials_used !!}
                                </div>
                            </div>
                        @endif

                        <!-- Challenges & Results -->
                        <div class="row mt-4">
                            @if($project->challenges)
                                <div class="col-md-6">
                                    <h4>Challenges</h4>
                                    <div class="challenges-content">
                                        {!! $project->challenges !!}
                                    </div>
                                </div>
                            @endif

                            @if($project->result_highlights)
                                <div class="col-md-6">
                                    <h4>Results & Highlights</h4>
                                    <div class="results-content">
                                        {!! $project->result_highlights !!}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </article>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <aside class="project-sidebar">
                    <!-- Experts Involved -->
                    @if($project->experts->count() > 0)
                        <div class="sidebar-widget mb-4">
                            <h4 class="widget-title">Experts Involved</h4>
                            <div class="experts-list">
                                @foreach($project->experts as $expert)
                                    <div class="expert-item d-flex align-items-center mb-3">
                                        @if($expert->image)
                                            <img src="{{ Storage::url($expert->image) }}" alt="{{ $expert->designation }}" class="expert-avatar mr-3" width="50" height="50">
                                        @else
                                            <div class="expert-avatar-placeholder mr-3" style="width: 50px; height: 50px; background-color: #eee; border-radius: 50%;"></div>
                                        @endif
                                        <div>
                                            <h5 class="mb-0">{{ $expert->designation }}</h5>
                                            @if(isset($expert->pivot->role))
                                                <small class="text-muted">{{ $expert->pivot->role }}</small>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Contact Options -->
                    <div class="sidebar-widget mb-4">
                        <h4 class="widget-title">Contact Us</h4>
                        <div class="contact-options d-flex flex-column" style="gap: 10px;">
                            <a href="javascript:void(0);" id="demoBtnProject" class="th-btns black-border" style="display:block; text-decoration:none; text-align: center; width: fit-content; max-width: 100%; padding: 8px 16px !important;">
                                Request a Demo
                            </a>
                            @if(!empty($siteSetting->phone))
                            <a href="tel:{{ $siteSetting->phone }}" class="th-btns black-border" style="display:block; text-decoration:none; text-align: center; padding: 8px 16px !important; font-size: 14px; width: fit-content; max-width: 100%;" title="Book your slot">
                                <i class="fas fa-phone" style="margin: 0;"></i> Call Us
                            </a>
                            @endif
                        </div>
                    </div>

                    <!-- Related Projects -->
                    @if($relatedProjects->count() > 0)
                        <div class="sidebar-widget mb-4">
                            <h4 class="widget-title">Related Projects</h4>
                            <div class="related-projects">
                                @foreach($relatedProjects as $relatedProject)
                                    <div class="related-project-item mb-3">
                                        <a href="{{ route('projects.show', $relatedProject) }}">
                                            @if($relatedProject->cover_image)
                                                <img src="{{ Storage::url($relatedProject->cover_image) }}" alt="{{ $relatedProject->title }}" class="img-fluid mb-2" style="height: 100px; object-fit: cover;">
                                            @endif
                                            <h5 class="h6">{{ Str::limit($relatedProject->title, 40) }}</h5>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </aside>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .project-detail-section {
        padding: 40px 0;
    }

    .project-title {
        font-size: 2.5rem;
        margin-bottom: 15px;
        color: #333;
    }

    .section-title {
        font-size: 1.5rem;
        margin-bottom: 20px;
        color: #003f3a;
        position: relative;
        padding-bottom: 10px;
    }

    .section-title:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 3px;
        background: #003f3a;
    }

    .project-cover img {
        max-height: 500px;
        object-fit: cover;
    }

    .project-image img {
        height: 200px;
        object-fit: cover;
    }

    .expert-avatar {
        border-radius: 50%;
        object-fit: cover;
    }

    .widget-title {
        font-size: 1.2rem;
        color: #003f3a;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 2px solid #003f3a;
    }

    .related-project-item img {
        width: 100%;
        border-radius: 5px;
    }

    .badge {
        padding: 5px 10px;
        border-radius: 3px;
        font-size: 0.85em;
    }

    .badge-secondary {
        background-color: #6c757d;
    }

    .ml-2 {
        margin-left: 0.5rem;
    }

    .mr-3 {
        margin-right: 1rem;
    }
</style>
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Project page demo button functionality
    $(document).ready(function() {
        // Check if demo button exists on project page
        $(document).on('click', '#demoBtnProject', function() {
            // Create overlay if it doesn't exist
            let $overlay = $('#demoFormOverlayProject');
            if ($overlay.length === 0) {
                createDemoFormOverlay();
                $overlay = $('#demoFormOverlayProject');
            }

            $overlay.css('display', 'flex');
        });

        // Close button functionality for project overlay
        $(document).on('click', '#closeFormProject', function() {
            const $overlay = $('#demoFormOverlayProject');
            if ($overlay.length) {
                $overlay.css('display', 'none');
            }
        });

        // Click outside to close form
        $(document).on('click', function(e) {
            const $overlay = $('#demoFormOverlayProject');
            if ($overlay.length && e.target === $overlay[0]) {
                $overlay.css('display', 'none');
            }
        });

        // Form submission handler for demo form on project page
        $(document).on('submit', '#demoFormContainerProject form', function(e) {
            e.preventDefault();

            const $form = $(this);
            const $msg = $form.find('#formMessagesProject');
            const $btn = $form.find('button[type="submit"]');
            const originalBtnText = $btn.html();

            $msg.hide().empty();
            $form.find('.is-invalid').removeClass('is-invalid');

            // Set loading state
            setLoadingProject(true, $btn, originalBtnText);

            $.post($form.attr('action'), $form.serialize())
                .done(function(res) {
                    if (res.status === 'success' || res.success) {
                        $form[0].reset();
                        showMsgProject(res.message || 'Request submitted successfully!', 'success', $msg);

                        // Close form after success
                        setTimeout(function() {
                            $('#demoFormOverlayProject').css('display', 'none');
                        }, 2000);
                    } else {
                        showMsgProject(res.message || 'Submission failed. Please try again.', 'error', $msg);
                    }
                })
                .fail(function(xhr) {
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        let errorMsg = '';
                        $.each(errors, function(field, messages) {
                            errorMsg += '<li>' + messages[0] + '</li>';

                            // Highlight the field with error
                            $form.find('[name="' + field + '"]').addClass('is-invalid');
                        });

                        showMsgProject(errorMsg, 'error', $msg);
                    } else {
                        showMsgProject('Something went wrong. Please try again.', 'error', $msg);
                    }
                })
                .always(function() {
                    setLoadingProject(false, $btn, originalBtnText);
                });
        });
    });

    function createDemoFormOverlay() {
        // Create overlay container
        const overlayHTML = `
            <div id="demoFormOverlayProject" style="
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0, 0, 0, 0.8);
                z-index: 10000;
                justify-content: center;
                align-items: center;
            ">
                <div id="demoFormContainerProject" style="
                    width: 90%;
                    max-width: 700px;
                    background: white;
                    padding: 40px 30px 30px;
                    margin: 0;
                    border-radius: 8px;
                    position: relative;
                    overflow: hidden;
                ">
                    <span id="closeFormProject" style="
                        position: absolute;
                        top: 15px;
                        right: 20px;
                        font-size: 24px;
                        cursor: pointer;
                        color: #000000ff;
                        z-index: 10;
                    ">&#x2192;</span>
                    <h3 class="text-dark" style="margin: 0 0 20px 0; text-align: center;">Request a demo</h3>
                    <form method="POST" action="{{ route("quotes.store") }}">
                        {{ csrf_field() }}
                        <div id="formMessagesProject" style="
                            display: none;
                            margin-bottom: 15px;
                            padding: 12px 15px;
                            border-radius: 6px;
                            font-size: 14px;
                        "></div>
                        <div class="form-row mb-3">
                            <input class="text-dark form-control" type="text" name="first_name" placeholder="First Name" required style="flex: 1; min-width: 100px; padding: 10px; font-family: inherit; border-radius: 4px; border: 1px solid #ddd; box-sizing: border-box;">
                            <input class="text-dark form-control" type="text" name="last_name" placeholder="Last Name" required style="flex: 1; min-width: 100px; padding: 10px; font-family: inherit; border-radius: 4px; border: 1px solid #ddd; box-sizing: border-box;">
                        </div>

                        <div class="form-row mb-3">
                            <input class="text-dark form-control" type="email" name="email" placeholder="Your Email" required style="flex: 1; min-width: 100px; padding: 10px; font-family: inherit; border-radius: 4px; border: 1px solid #ddd; box-sizing: border-box;">
                            <input class="text-dark form-control" type="tel" name="phone" placeholder="Your Phone" style="flex: 1; min-width: 100px; padding: 10px; font-family: inherit; border-radius: 4px; border: 1px solid #ddd; box-sizing: border-box;">
                        </div>

                        <div class="form-row mb-3">
                            <input class="text-dark form-control" type="text" name="company" placeholder="Your Company" style="flex: 1; min-width: 100px; padding: 10px; font-family: inherit; border-radius: 4px; border: 1px solid #ddd; box-sizing: border-box;">
                            <input class="text-dark form-control" type="text" name="cities" placeholder="Preferred Cities" style="flex: 1; min-width: 100px; padding: 10px; font-family: inherit; border-radius: 4px; border: 1px solid #ddd; box-sizing: border-box;">
                        </div>

                        <div class="form-row mb-3">
                            <input class="text-dark form-control" type="text" name="address" placeholder="Street Address" style="flex: 1; min-width: 100px; padding: 10px; font-family: inherit; border-radius: 4px; border: 1px solid #ddd; box-sizing: border-box;">
                            <input class="text-dark form-control" type="text" name="postal_code" placeholder="Postal/ZIP Code" style="flex: 1; min-width: 100px; padding: 10px; font-family: inherit; border-radius: 4px; border: 1px solid #ddd; box-sizing: border-box;">
                        </div>

                        <div class="form-row mb-3">
                            <input class="text-dark form-control" type="text" name="city" placeholder="City" style="flex: 1; min-width: 100px; padding: 10px; font-family: inherit; border-radius: 4px; border: 1px solid #ddd; box-sizing: border-box;">
                            <input class="text-dark form-control" type="text" name="country" placeholder="Country" style="flex: 1; min-width: 100px; padding: 10px; font-family: inherit; border-radius: 4px; border: 1px solid #ddd; box-sizing: border-box;">
                        </div>

                        <div class="form-row mb-3">
                            <textarea class="text-dark form-control" name="mesage" placeholder="Your Message" style="flex: 1 1 100%; height: auto; padding: 10px; font-family: inherit; border-radius: 4px; border: 1px solid #ddd; box-sizing: border-box;"></textarea>
                        </div>

                        <button type="submit" class="th-btns black-border" style="display: block; margin: 0 auto;">
                            Submit Request
                        </button>
                    </form>
                </div>
            </div>
        `;

        $('body').append(overlayHTML);

        // Add form row styling
        if ($('#formRowStyleProject').length === 0) {
            $('head').append(`
                <style id="formRowStyleProject">
                    .form-row {
                        display: flex !important;
                        gap: 15px !important;
                        flex-wrap: wrap !important;
                    }
                    .form-control.is-invalid {
                        border-color: #dc3545 !important;
                    }
                </style>
            `);
        }
    }

    function setLoadingProject(loading, $btn, originalText) {
        if (loading) {
            $btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Sending...');
        } else {
            $btn.prop('disabled', false).html(originalText);
        }
    }

    function showMsgProject(content, type, $msg) {
        const styles = type === 'success' ?
            { background: '#d4edda', color: '#155724', border: '1px solid #c3e6cb' } :
            { background: '#f8d7da', color: '#721c24', border: '1px solid #f5c6cb' };

        $msg.css(styles)
            .html(type === 'success' ? content : '<ul style="margin:0;padding-left:18px">' + content + '</ul>')
            .fadeIn();

        if (type === 'success') {
            setTimeout(() => $msg.fadeOut(), 4000);
        }
    }
</script>
@endpush
