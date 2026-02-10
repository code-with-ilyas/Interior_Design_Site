@extends('layouts.master')

@section('content')
<section class="services-section space">
    <div class="container">
        <div class="services-header text-center mb-5">
            <h5 class="title-heading">Our Services</h5>
            <p class="text-custom text-light-green">Explore our comprehensive range of services</p>
        </div>

        <div class="row">
            @forelse($services as $service)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card h-100">
                        <div class="service-image">
                            @if($service->image)
                                <img src="{{ Storage::url($service->image) }}" alt="{{ $service->name }}" class="img-fluid">
                            @elseif($service->images->first())
                                <img src="{{ Storage::url($service->images->first()->image) }}" alt="{{ $service->name }}" class="img-fluid">
                            @else
                                <img src="{{ asset('assets/img/service/service-placeholder.jpg') }}" alt="Service Placeholder" class="img-fluid">
                            @endif
                        </div>

                        <div class="service-content p-4">
                            <h3 class="service-title mb-2">
                                <a href="{{ route('service.show', $service) }}" class="text-decoration-none text-dark">
                                    {{ $service->name }}
                                </a>
                            </h3>

                            <div class="service-meta mb-2">
                                @if($service->category)
                                    <span class="badge badge-secondary">{{ $service->category->name }}</span>
                                @endif
                            </div>

                            <p class="service-excerpt text-muted">
                                {{ Str::limit(strip_tags($service->short_description), 100) }}
                            </p>

                            <a href="{{ route('service.show', $service) }}" class="th-btns black-border mt-2">Learn More</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <h3 class="text-xl text-gray-500">No services available</h3>
                    <p class="text-gray-400 mt-2">Check back later for updates</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($services->hasPages())
        <div class="row mt-5">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    {{ $services->links() }}
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection

@push('styles')
<style>
    .services-section {
        padding: 60px 0;
    }

    .service-card {
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: #fff;
    }

    .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    .service-image {
        height: 200px;
        overflow: hidden;
    }

    .service-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .service-card:hover .service-image img {
        transform: scale(1.05);
    }

    .service-title {
        font-size: 1.25rem;
        font-weight: 600;
    }

    .service-title a:hover {
        color: #003f3a !important;
    }

    .service-meta {
        font-size: 0.85rem;
    }

    .service-excerpt {
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
        color: white;
    }
</style>
@endpush
