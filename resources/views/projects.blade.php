@extends('layouts.master')

@section('content')
<section class="projects-section space">
    <div class="container">
        <div class="services-header text-center mb-5">
            <h5 class="title-heading">Our Projects</h5>
            <p class="text-custom text-light-green">Explore our completed projects and ongoing works</p>
        </div>

        <div class="row">
            @forelse($projects as $project)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="project-card h-100">
                        <div class="project-image">
                            @if($project->cover_image)
                                <img src="{{ Storage::url($project->cover_image) }}" alt="{{ $project->title }}" class="img-fluid">
                            @elseif($project->projectImages->first())
                                <img src="{{ Storage::url($project->projectImages->first()->image) }}" alt="{{ $project->title }}" class="img-fluid">
                            @else
                                <img src="{{ asset('assets/img/project/project_3_1.jpg') }}" alt="Project Placeholder" class="img-fluid">
                            @endif
                        </div>

                        <div class="project-content p-4">
                            <h3 class="project-title mb-2">
                                <a href="{{ route('projects.show', $project) }}" class="text-decoration-none text-dark">
                                    {{ $project->title }}
                                </a>
                            </h3>

                            <div class="project-meta mb-2">
                                @if($project->projectCategory)
                                    <span class="badge badge-secondary mr-2">{{ $project->projectCategory->name }}</span>
                                @endif

                                @if($project->location)
                                    <small class="text-muted"><i class="fas fa-map-marker-alt"></i> {{ $project->location }}</small>
                                @endif
                            </div>

                            <p class="project-excerpt text-muted">
                                {{ Str::limit(strip_tags($project->short_description), 100) }}
                            </p>

                            <a href="{{ route('projects.show', $project) }}" class="btn btn-primary mt-2">View Details</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <h3 class="text-xl text-gray-500">No projects available</h3>
                    <p class="text-gray-400 mt-2">Check back later for updates</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .projects-section {
        padding: 60px 0;
    }

    .project-card {
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: #fff;
    }

    .project-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    .project-image {
        height: 200px;
        overflow: hidden;
    }

    .project-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .project-card:hover .project-image img {
        transform: scale(1.05);
    }

    .project-title {
        font-size: 1.25rem;
        font-weight: 600;
    }

    .project-title a:hover {
        color: #003f3a !important;
    }

    .project-meta {
        font-size: 0.85rem;
    }

    .project-excerpt {
        font-size: 0.9rem;
        line-height: 1.5;
    }

    .badge {
        padding: 5px 10px;
        border-radius: 3px;
        font-size: 0.75rem;
    }

    .badge-secondary {
        background-color: #6c757d;
    }

    .btn-primary {
        background-color: #003f3a;
        border-color: #003f3a;
    }

    .btn-primary:hover {
        background-color: #002a26;
        border-color: #002a26;
    }

    .mr-2 {
        margin-right: 0.5rem;
    }
</style>
@endpush
