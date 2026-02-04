@extends('layouts.master')

@section('content')
<div class="container py-5">
    <div class="services-header text-center mb-5">
        <h5 class="title-heading">{{ $category->name }} Services</h5>
        <p class="text-custom text-light-green">Browse services in the {{ $category->name }} category</p>
    </div>

    @if($services->count() > 0)
        <div class="services-grid">
            <div class="services-row">
                @foreach($services->chunk(3) as $row)
                    @foreach($row as $service)
                        <div class="service-column">
                            <div class="service-card home-service-card">
                                <h5 class="service-title">
                                    <a href="{{ route('service.show', $service) }}" class="text-decoration-none">
                                        {{ $service->title }}
                                    </a>
                                </h5>
                                <div class="service-description">{{ $service->short_description }}</div>
                                <a href="{{ route('service.show', $service) }}" class="th-btns black-border mt-3">Learn More</a>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
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
@endsection