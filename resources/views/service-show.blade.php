@extends('layouts.master')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Service Detail Content -->
            <article class="service-post">
                @if($service->image)
                    <div class="post-image mb-4">
                        <img src="{{ asset('storage/' . $service->image) }}"
                             alt="{{ $service->title }}"
                             class="img-fluid rounded"
                             style="width: 100%; height: 400px; object-fit: cover;">
                    </div>
                @endif

                <div class="post-header mb-4">
                    <div class="post-meta d-flex d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            Last Updated: {{ $service->updated_at->format('M d, Y') }}
                        </small>
                         <span class="text-muted">
                            @if($service->category)
                                {{ $service->category->name }}
                            @else
                                Uncategorized
                            @endif
                        </span>
                    </div>

                    <h1 class="post-title">{{ $service->title }}</h1>

                    @if($service->short_description)
                        <p class="post-excerpt lead">{{ $service->short_description }}</p>
                    @endif
                </div>

                <!-- Service Content -->
                <div class="post-content">
                    @if($service->long_description)
                        {!! nl2br(e($service->long_description)) !!}
                    @else
                        <p>No detailed description available for this service.</p>
                    @endif
                </div>

                <!-- Service Icon -->
                @if($service->icon)
                    <div class="service-icon mt-4">
                        <i class="{{ $service->icon }} text-primary" style="font-size: 2rem;"></i>
                    </div>
                @endif

                <!-- Service Images Gallery -->
                @if($service->images->count() > 0)
                    <div class="post-gallery mt-5">
                        <h3 class="mb-4">Service Gallery</h3>
                        <div class="row g-3">
                            @foreach($service->images as $image)
                                <div class="col-md-6 col-lg-4">
                                    <div class="gallery-item">
                                        <img src="{{ asset('storage/' . $image->image) }}"
                                             alt="{{ $image->alt_text ?? $service->title }}"
                                             class="img-fluid rounded"
                                             style="width: 100%; height: 200px; object-fit: cover;">
                                        @if($image->alt_text)
                                            <small class="text-muted d-block mt-2">{{ $image->alt_text }}</small>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </article>

            <!-- Back to Services Link -->
            <div class="mt-5">
                <a href="#services" class="th-btns black-border">
                    ← Back to Services
                </a>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="sidebar">
                <!-- Related Services -->
                @if($relatedServices->count() > 0)
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Related Services</h5>
                        </div>
                        <div class="card-body">
                            @foreach($relatedServices as $relatedService)
                                <div class="related-post mb-3 pb-3 border-bottom">
                                    @if($relatedService->image)
                                        <div class="related-post-image mb-2">
                                            <img src="{{ asset('storage/' . $relatedService->image) }}"
                                                 alt="{{ $relatedService->title }}"
                                                 class="img-fluid rounded"
                                                 style="width: 100%; height: 120px; object-fit: cover;">
                                        </div>
                                    @endif
                                    <h6 class="related-post-title">
                                        <a href="{{ route('service.show', $relatedService) }}"
                                           class="text-decoration-none">
                                            {{ $relatedService->title }}
                                        </a>
                                    </h6>
                                    <small class="text-muted">
                                        {{ $relatedService->updated_at->format('M d, Y') }}
                                    </small>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Service Categories -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Service Categories</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            @foreach(\App\Models\ServiceCategory::withCount('services')->get() as $category)
                                @if($category->services_count > 0)
                                    <li class="mb-2">
                                        <a href="{{ route('services.by.category', $category) }}"
                                           class="text-decoration-none">
                                            {{ $category->name }}
                                            {{-- <span class="badge bg-secondary float-end">{{ $category->services_count }}</span> --}}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- View All Services Link -->
    <div class="row mt-5">
        <div class="col-12 text-center">
            <a href="{{ route('services.index') }}" class="th-btns black-border" style="display: inline-block; padding: 12px 32px; font-size: 16px;">
                <i class="fas fa-arrow-left me-2"></i>
                View All Services
            </a>
        </div>
    </div>
</div>

<style>
.post-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #333;
    line-height: 1.2;
}

.post-content {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #555;
}

.post-content p {
    margin-bottom: 1.5rem;
}

.related-post-title a {
    color: #333;
    transition: color 0.3s ease;
}

.related-post-title a:hover {
    color: #003f3a;
}

.sidebar .card {
    border: 1px solid #eee;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.badge.bg-secondary {
    background-color: #6c757d !important;
}

/* Ensure sidebar categories are visible */
.sidebar .card ul.list-unstyled {
    margin: 0;
    padding: 0;
}

.sidebar .card ul.list-unstyled li {
    padding: 8px 0;
    border-bottom: 1px solid #eee;
}

.sidebar .card ul.list-unstyled li:last-child {
    border-bottom: none;
}

.sidebar .card ul.list-unstyled li a {
    color: #333;
    text-decoration: none;
    display: block;
    transition: color 0.3s ease;
}

.sidebar .card ul.list-unstyled li a:hover {
    color: #003f3a;
}

.sidebar .card ul.list-unstyled li .badge {
    background-color: #003f3a !important;
    color: white;
}
</style>
@endsection
