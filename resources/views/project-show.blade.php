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
                                            @if($image->caption)
                                                <p class="text-muted small mt-1">{{ $image->caption }}</p>
                                            @endif
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
@endpush
