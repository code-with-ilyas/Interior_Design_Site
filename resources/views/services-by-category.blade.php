@extends('layouts.master')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Page Header -->
            <div class="mb-5">
                <h1 class="display-4 mb-3">
                    {{ $category->name }} Services
                </h1>
                <p class="lead text-muted">Browse services in the {{ $category->name }} category</p>
            </div>

            <!-- Services -->
            @if($services->count() > 0)
                <div class="row g-4">
                    @foreach($services as $service)
                        <div class="col-md-6">
                            <article class="service-post h-100">
                                @if($service->image)
                                    <div class="service-image mb-3">
                                        <img src="{{ asset('storage/' . $service->image) }}"
                                             alt="{{ $service->title }}"
                                             class="img-fluid rounded"
                                             style="width: 100%; height: 250px; object-fit: cover;">
                                    </div>
                                @endif

                                <div class="service-content">
                                    <div class="service-meta mb-3 d-flex justify-content-between align-items-center">
                                        <small class="text-muted">
                                            Last Updated: {{ $service->updated_at->format('M d, Y') }}
                                        </small>
                                        <small class="text-muted">
                                            {{ $service->category->name ?? 'Uncategorized' }}
                                        </small>
                                    </div>

                                    <h3 class="service-title h5 mb-3">
                                        <a href="{{ route('service.show', $service) }}"
                                           class="text-decoration-none text-dark">
                                            {{ $service->title }}
                                        </a>
                                    </h3>

                                    @if($service->short_description)
                                        <p class="service-excerpt">{{ Str::limit($service->short_description, 150) }}</p>
                                    @endif

                                    <a href="{{ route('service.show', $service) }}"
                                       class="th-btns black-border mt-3 mb-2">
                                        Learn More
                                    </a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <h3 class="mb-3">No services found</h3>
                    <p class="text-muted">There are no services available in this category yet.</p>
                    <a href="{{ route('home') }}" class="th-btns black-border">
                        Browse All Services
                    </a>
                </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="sidebar">
                <!-- Categories -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Service Categories</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="{{ route('home') }}"
                                   class="text-decoration-none text-dark">
                                    All Services
                                </a>
                            </li>
                            @foreach(App\Models\ServiceCategory::withCount('services')->has('services')->get() as $cat)
                                @if($cat->services_count > 0)
                                    <li class="mb-2">
                                        <a href="{{ route('services.by.category', $cat) }}"
                                           class="text-decoration-none text-dark">
                                            {{ $cat->name }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Recent Services -->
                @php
                    $recentServices = \App\Models\Service::with('category')
                        ->orderBy('updated_at', 'desc')
                        ->limit(5)
                        ->get();
                @endphp

                @if($recentServices->count() > 0)
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Recent Services</h5>
                        </div>
                        <div class="card-body">
                            @foreach($recentServices as $recentService)
                                <div class="recent-service mb-3 pb-3 border-bottom">
                                    @if($recentService->image)
                                        <div class="recent-service-image mb-2">
                                            <img src="{{ asset('storage/' . $recentService->image) }}"
                                                 alt="{{ $recentService->title }}"
                                                 class="img-fluid rounded"
                                                 style="width: 100%; height: 80px; object-fit: cover;">
                                        </div>
                                    @endif
                                    <h6 class="recent-service-title mb-1">
                                        <a href="{{ route('service.show', $recentService) }}"
                                           class="text-decoration-none text-dark">
                                            {{ Str::limit($recentService->title, 60) }}
                                        </a>
                                    </h6>
                                    <small class="text-muted">
                                        {{ $recentService->updated_at->format('M d, Y') }}
                                    </small>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
.service-title a {
    transition: color 0.3s ease;
}

.service-title a:hover {
    color: #003f3a !important;
}

.recent-service-title a {
    color: #333;
    transition: color 0.3s ease;
}

.recent-service-title a:hover {
    color: #003f3a;
}

.sidebar .card {
    border: 1px solid #eee;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.sidebar .card ul li a {
    display: block;
    padding: 8px 0;
    transition: all 0.3s ease;
}

.sidebar .card ul li a:hover {
    color: #003f3a !important;
}

.sidebar .card ul li:not(:last-child) {
    border-bottom: 1px solid #f0f0f0;
}
</style>
@endsection
