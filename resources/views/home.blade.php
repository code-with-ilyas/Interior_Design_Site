@extends('layouts.master')

@section('content')

<section class="freelancer-hero-section" id="home">
    <div class="container">
        <div class="row align-items-center" style="margin-top: 5px;">
            <div class="col-lg-6">
                <div class="freelancer-hero-content">
                    {{--
                    <div class="freelancer-tags">
                        <span class="freelancer-tag text-white">IA</span>
                        <span class="freelancer-tag text-white">Data</span>
                        <span class="freelancer-tag text-white">Cloud</span>
                        <span class="freelancer-tag text-white">Cyber</span>
                        <span class="freelancer-tag text-white">IT</span>
                        <span class="freelancer-tag text-white">Digital</span>
                    </div>
                    --}}
                    <h1 class="freelancer-title playfair-display" style="font-size: 38px!important;">Renovate your property, according to your desires!</h1>
                    <div class="freelancer-features">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-check-circle" style="font-size: 24px; color: #003f3a;"></i>
                            </div>
                            <span class="feature-text">A rigorous selection methodology.</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-th-large" style="font-size: 24px; color: #003f3a;"></i>
                            </div>
                            <span class="feature-text">A single platform to manage your business.</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-gift" style="font-size: 24px; color: #003f3a;"></i>
                            </div>
                            <span class="feature-text">Offers to suit all your needs.</span>
                        </div>
                    </div>
                    <div class="">
                        <a href="{{ route('renovate') }}"
                            class="th-btns black-border mb-2" style="display:inline-block; text-decoration:none;">
                            I Want to Renovate a Property
                        </a>
                        <a href="javascript:void(0);" id="demoBtn" class="th-btns black-border" style="display:inline-block; text-decoration:none;">
                            Request a Demo
                        </a>
                        @if(!empty($siteSetting->phone))
                        <a href="tel:{{ $siteSetting->phone }}" class="th-btns black-border" style="display:block; text-decoration:none; text-align: center; padding: 8px 16px !important; font-size: 14px; width: fit-content; max-width: 100%;" title="Book your slot">
                             <i class="fas fa-phone" style="margin: 0;">
                            </i> Call Us
                        </a>
                        @endif
                        <div id="demoFormOverlay">
                            <div id="demoFormContainer">
                                <span id="closeForm" class="close-arrow">&#x2192;</span>
                                <h3 class="text-dark">Request a demo</h3>

                                {{-- Success popup --}}
                                @if (session('success'))
                                <div id="successPopup" style="
                                    position: fixed;
                                    top: 20px;
                                    right: 20px;
                                    background: #28a745;
                                    color: white;
                                    padding: 15px 20px;
                                    border-radius: 6px;
                                    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
                                    z-index: 2000;
                                    font-size: 14px;
                                    opacity: 0;
                                    transform: translateY(-20px);
                                    transition: all 0.5s ease;
                                ">
                                    {{ session('success') }}
                                </div>
                                @endif

                                <form action="{{ route('quotes.store') }}" method="POST">
                                    @csrf
                                    <div class="form-row mb-3">
                                        <input class="text-dark" type="text" name="first_name" placeholder="First Name" required>
                                        <input class="text-dark" type="text" name="last_name" placeholder="Last Name" required>
                                    </div>

                                    <div class="form-row mb-3">
                                        <input class="text-dark" type="email" name="email" placeholder="Your Email" required>
                                        <input class="text-dark" type="tel" name="phone" placeholder="Your Phone">
                                    </div>

                                    <div class="form-row mb-3">
                                        <input class="text-dark" type="text" name="company" placeholder="Your Company">
                                        <input class="text-dark" type="text" name="cities" placeholder="Preferred Cities">
                                    </div>

                                    <div class="form-row mb-3">
                                        <input class="text-dark" type="text" name="address" placeholder="Street Address">
                                        <input class="text-dark" type="text" name="postal_code" placeholder="Postal/ZIP Code">
                                    </div>

                                    <div class="form-row mb-3">
                                        <input class="text-dark" type="text" name="city" placeholder="City">
                                        <input class="text-dark" type="text" name="country" placeholder="Country">
                                    </div>

                                    <div class="form-row mb-3">
                                        <textarea class="text-dark" name="mesage" placeholder="Your Message"></textarea>
                                    </div>

                                    <button class="th-btns black-border" style="display:block; margin:0 auto;">
                                        Submit Request
                                    </button>
                                </form>

                                <div id="successPopup" style="
                                    display: none;
                                    position: absolute;
                                    top: 10px;
                                    left: 50%;
                                    transform: translateX(-50%);
                                    background: #28a745;
                                    color: white;
                                    padding: 12px 20px;
                                    border-radius: 6px;
                                    font-size: 14px;
                                    z-index: 2000;
                                    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
                                    ">
                                    Your request has been submitted successfully!
                                </div>
                            </div>
                        </div>
                        <style>
                            .form-row:has(button) button {
                                flex: 0 0 25%;
                                max-width: 25%;
                                align-self: center;
                                margin: auto;
                            }

                            #demoFormOverlay {
                                display: none;
                                position: fixed;
                                top: 0;
                                left: 0;
                                right: 0;
                                bottom: 0;
                                background-color: rgba(0, 0, 0, 0.8);
                                z-index: 1000;
                                justify-content: center;
                                align-items: stretch;
                            }


                            #demoFormContainer {
                                width: 90%;
                                max-width: 700px;
                                height: 100%;
                                background: white;
                                padding: 40px 30px 30px;
                                margin: 0;
                                border-radius: 8px;
                                position: relative;
                                display: flex;
                                flex-direction: column;
                                justify-content: space-between;
                                overflow: hidden;
                            }

                            h3.text-dark {
                                margin: 0 0 20px 0;
                                text-align: center;
                            }

                            #closeForm {
                                position: absolute;
                                top: 15px;
                                right: 20px;
                                font-size: 24px;
                                cursor: pointer;
                                color: #000000ff;
                                z-index: 10;
                            }

                            .form-row {
                                display: flex;
                                gap: 15px;
                                flex-wrap: wrap;
                            }

                            .form-row input,
                            .form-row textarea {
                                flex: 1;
                                min-width: 100px;
                                padding: 10px;
                                font-family: inherit;
                                border-radius: 4px;
                                border: 1px solid #ddd;
                                box-sizing: border-box;
                            }

                            .form-row textarea {
                                flex: 1 1 100%;
                                height: auto;
                                min-height: 80px;
                            }

                            .form-row:has(button) button {
                                flex: 1 1 100%;
                            }

                            @media(max-width:768px) {
                                .form-row {
                                    flex-direction: column;
                                    gap: 10px;
                                }

                                .form-row input,
                                .form-row textarea {
                                    min-width: 100%;
                                }
                            }

                            .form-row input:focus,
                            .form-row textarea:focus {
                                outline: none;
                                border-color: #007bff;
                                box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.25);
                            }
                        </style>

                        <script>
                            document.getElementById('demoBtn').addEventListener('click', function() {
                                document.getElementById('demoFormOverlay').style.display = 'flex';
                            });


                            document.getElementById('closeForm').addEventListener('click', function() {
                                document.getElementById('demoFormOverlay').style.display = 'none';
                            });


                            document.getElementById('demoFormOverlay').addEventListener('click', function(e) {
                                if (e.target === this) this.style.display = 'none';
                            });


                            window.addEventListener('DOMContentLoaded', (event) => {
                                const popup = document.getElementById('successPopup');
                                if (popup) {
                                    // show popup
                                    popup.style.opacity = 1;
                                    popup.style.transform = 'translateY(0)';

                                    // hide after 3 seconds
                                    setTimeout(() => {
                                        popup.style.opacity = 0;
                                        popup.style.transform = 'translateY(-20px)';
                                    }, 3000);
                                }
                            });
                        </script>




                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div style="position: relative; width:100%; margin:auto;">
                    <img
                        src="{{ asset('admin/home/h24renovation-home-img.png')}}"
                        alt="home-image"
                        style="width:100%;border-radius:12px;animation: floatUpDown 4s ease-in-out infinite;">
                   {{--
                    <div
                        style="
                        position:absolute;
                        left: -60px;
                        top: 35%;
                        width:100px;
                        padding:10px;
                        background: linear-gradient(65deg, #003f3a 0%, #000000 100%);
                        border-radius:10px;
                        box-shadow:0 4px 12px rgba(0,0,0,0.15);
                        font-size:11px;
                        height:60px;          /* vertical shape */
                        display:flex;
                        flex-direction:column;
                        justify-content:center;
                        text-align:center;
                        ">
                        <h6 style="margin:0; font-size:12px;" class="text-white">Complete </h6>
                        <p style="margin:0;" class="text-white">Renovation</p>
                    </div>

                    <div
                        style="
                        position:absolute;
                        right: 110px;
                        top: -8%;
                        width:100px;
                        padding:10px;
                        background: linear-gradient(65deg, #003f3a 0%, #000000 100%);
                        border-radius:10px;
                        box-shadow:0 4px 12px rgba(0,0,0,0.15);
                        font-size:11px;
                        height:60px;
                        display:flex;
                        flex-direction:column;
                        justify-content:center;
                        text-align:center;
                        ">
                        <h6 style="margin:0; font-size:12px;" class="text-white">Interior </h6>
                        <p style="margin:0;" class="text-white">Remodeling</p>
                    </div>


                    <div
                        style="
                        position:absolute;
                        right: 410px;
                        bottom: 8%;
                        width:100px;
                        padding:10px;
                        background: linear-gradient(65deg, #003f3a 0%, #000000 100%);
                        border-radius:10px;
                        box-shadow:0 4px 12px rgba(0,0,0,0.15);
                        font-size:11px;
                        height:60px;
                        display:flex;
                        flex-direction:column;
                        justify-content:center;
                        text-align:center;
                        ">
                        <h6 style="margin:0; font-size:12px;" class="text-white">Custom</h6>
                        <p style="margin:0;" class="text-white">Fast</p>
                    </div>
                    --}}

                </div>
            </div>

            <style>
                @keyframes floatUpDown {
                    0% {
                        transform: translateY(0px);
                    }

                    50% {
                        transform: translateY(-15px);
                    }

                    100% {
                        transform: translateY(0px);
                    }
                }
            </style>


        </div>

    </div>
    </div>
    </div>
</section>

    {{-- <section class="client-reference" id="clients">
        <div class="reference-heading text-center mb-4">
            Referenced by most <span class="text-span-5 text-primary ">CAC40 </span> and <span class="text-span-6 text-primary">SBF120</span> companies </div>

        <div class="marquee-area overflow-hidden ">
            <div class="marquee-track flex marquee-group">
                @foreach($companies as $company)
                <div class="marquee-item-container">
                    @if($company->logo)
                    <div class="marquee-logo-wrapper">
                        <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }} Logo" class="customer-logo-img">
                    </div>
                    @endif
                    <div class="marquee-item">{{ $company->name }}</div>
                </div>
                @endforeach

                <!-- Repeat the same items for smooth looping -->
                @foreach($companies as $company)
                <div class="marquee-item-container">
                    @if($company->logo)
                    <div class="marquee-logo-wrapper">
                        <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }} Logo" class="customer-logo-img">
                    </div>
                    @endif
                    <div class="marquee-item">{{ $company->name }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section> --}}
    <div class="marquee-area2 overflow-hidden mt-3">
        <div class="marquee-content positive-relative overflow-hidden">
            <div class="marquee">
                <div class="marquee-group style2">
                    <div class="item">
                        {{-- <img src="assets/img/icon/star3.svg" alt=""> --}}
                        <a target="_blank" href="#" data-hover="Mission-Driven Company ◌ Mission-Driven Company ◌ H24 Renovation ◌ Eco-friendly renovation ◌">
                            Mission-Driven Company ◌ Mission-Driven Company ◌ H24 Renovation ◌ Eco-friendly renovation ◌
                        </a>
                    </div>
                   </div>
               {{--
               <div aria-hidden="true" class="marquee-group style2">
                    <div class="item"><img src="assets/img/icon/star3.svg" alt=""><a target="_blank" href="#" data-hover="Bright Halls">Bright Halls</a></div>
                    <div class="item"><img src="assets/img/icon/star3.svg" alt=""><a target="_blank" href="#" data-hover="Sustainable Architecture">Sustainable Architecture</a></div>
                    <div class="item"><img src="assets/img/icon/star3.svg" alt=""><a target="_blank" href="#" data-hover="Landscape Architecture">Landscape Architecture</a></div>
                    <div class="item"><img src="assets/img/icon/star3.svg" alt=""> <a target="_blank" href="#" data-hover="Commercial Spa">Commercial Spa</a></div>
                    <div class="item"><img src="assets/img/icon/star3.svg" alt=""><a target="_blank" href="#" data-hover="Bright Halls">Bright Halls</a></div>
                    <div class="item"><img src="assets/img/icon/star3.svg" alt=""><a target="_blank" href="#" data-hover="Sustainable Architecture">Sustainable Architecture</a></div>
                    <div class="item"><img src="assets/img/icon/star3.svg" alt=""><a target="_blank" href="#" data-hover="Landscape Architecture">Landscape Architecture</a></div>
                    <div class="item"><img src="assets/img/icon/star3.svg" alt=""> <a target="_blank" href="#" data-hover="Commercial Spa">Commercial Spa</a></div>
                    <div class="item"><img src="assets/img/icon/star3.svg" alt=""><a target="_blank" href="#" data-hover="Bright Halls">Bright Halls</a></div>
                    <div class="item"><img src="assets/img/icon/star3.svg" alt=""><a target="_blank" href="#" data-hover="Sustainable Architecture">Sustainable Architecture</a></div>
                    <div class="item"><img src="assets/img/icon/star3.svg" alt=""><a target="_blank" href="#" data-hover="Landscape Architecture">Landscape Architecture</a></div>
                    <div class="item"><img src="assets/img/icon/star3.svg" alt=""> <a target="_blank" href="#" data-hover="Commercial Spa">Commercial Spa</a></div>
                </div>
                --}}
            </div>
        </div>
    </div>

<style>
    .client-reference .marquee-track {
        display: flex !important;
        flex-wrap: nowrap !important;
        animation: marquee-scroll 20s linear infinite;
    }

    .client-reference .marquee-track:hover {
        animation-play-state: paused;
    }

    .client-reference .marquee-track .marquee-item-container {
        display: flex !important;
        flex-direction: row !important;
        align-items: center !important;
        justify-content: flex-start !important;
        text-align: left !important;
        padding: 8px 12px !important;
        min-width: 160px;
        gap: 8px !important;
    }

    .client-reference .marquee-track .marquee-logo-wrapper {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        flex-shrink: 0 !important;
        order: 0 !important;
    }

    .client-reference .marquee-track .customer-logo-img {
        max-width: 45px;
        max-height: 25px;
        object-fit: contain;
    }

    .client-reference .marquee-track .marquee-item {
        white-space: nowrap;
        font-size: 16px;
        margin: 0 !important;
        padding: 0 !important;
        align-self: center !important;
        flex-shrink: 0 !important;
        order: 1 !important;
    }

    /* Reduce gap between marquee items */
    .client-reference .marquee-track {
        gap: 20px !important;
    }

    /* Stop marquee on hover */
    .marquee:hover .marquee-track {
        animation-play-state: paused;
    }

    @keyframes marquee-scroll {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-100%);
        }
    }
</style>

<section id="about-us">
    <div class="services-header">
        <h5 id="about-us"
            class="title-heading"
            style="scroll-margin-top: 100px;">
            {{ $siteSetting->site_name ?? 'About Us' }}
        </h5>
        <p class="text-custom text-light-green">Minimalist luxury interiors rarely go out of fashion.</p>
    </div>
    <div style="display: flex; align-items: flex-start; justify-content: center; max-width: 1200px; margin: auto; gap: 40px; flex-wrap: wrap;padding: 10px;">

        <div style="flex: 1; min-width: 350px;">
            <img
                src="{{ $siteSetting->about_us_image ? asset('storage/' . $siteSetting->about_us_image) : 'https://mesbatisseurs.fr/wp-content/uploads/2024/08/WhatsApp-Image-2024-08-21-at-15.28.33.jpeg' }}"
                alt="{{ $siteSetting->site_name ?? 'About Image' }}"
                style="width: 100%; height: 500px; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.15);">
        </div>

        <div style="flex: 1; min-width: 350px; display: flex; flex-direction: column; justify-content: flex-start;">
            <p style="font-size: 16px; line-height: 1.7; color: #000000ff;">
                {!! $siteSetting->about_us ?? $siteSetting->about_short_description ?? 'At <strong>Mes Batisseurs</strong>, our passion lies in transforming spaces into true havens of peace...' !!}
            </p>
        </div>

    </div>
</section>

<section id="services" class="renovation-bg-color">
    <div>
        <div class="container">
            <div class="services-header">
                <h5 class="title-heading">Areas of Expertise</h5>
                <p class="text-custom text-light-green">Support for all your transformation challenges</p>
            </div>

            <div class="services-grid">
                 <div class="services-row mb-3">
                @foreach($services->chunk(3) as $row)
                    @foreach($row as $service)
                    <div class="service-column">
                        <div class="service-card home-service-card">
                            @if($service->image)
                            <div class="service-image mb-3" style="height: 200px; overflow: hidden; border-radius: 8px;">
                                <img src="{{ asset('storage/' . $service->image) }}"
                                     alt="{{ $service->title }}"
                                     class="img-fluid w-100"
                                     style="height: 100%; object-fit: cover; border-radius: 8px;">
                            </div>
                            @endif
                            <h5 class="service-title"><a href="{{ route('service.show', $service) }}" class="text-decoration-none">{{ $service->title }}</a></h5>
                            <div class="service-description">{{ $service->short_description }}</div>
                            <div class="btn-group mt-3">
                                <a href="{{ route('service.show', $service) }}" class="th-btns black-border">
                                    Learn More
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="project-area position-relative space-bottom" id="projects">
    <div class="container">

        <div class="row justify-content-between align-items-end">
            <div class="services-header">
                <h5 class="title-heading">Our Projects</h5>
                <p class="text-custom text-light-green">Complete Solutions for Your Outdoor Projects</p>
                <p class="text-custom text-light-green">
                    Discover how we can transform your outdoor space with our specialist landscaping and construction services.
                </p>
            </div>

            {{--
                <div class="col-xl-6">
                <div class="filter-menu style2 filter-menu-active">
                    <button data-filter="*" class="th-btn th-border active" type="button">
                        View All
                    </button>
                    @foreach($projectCategories as $category)
                    <button data-filter=".cat{{ $category->id }}"
                        class="th-btn th-border"
                        type="button">
                        {{ $category->name }}
                    </button>
                    @endforeach
                </div>
            </div>
            --}}
        </div>

        <div class="row gallery-row filter-active justify-content-between load-more-active align-items-center">

            @foreach($projectCategories as $category)
            @foreach($category->projects as $project)

            @php
            $projectImages = $project->projectImages->values();

            $firstImage = $project->cover_image
                ? Storage::url($project->cover_image)
                : ($projectImages->get(0)
                    ? Storage::url($projectImages->get(0)->image)
                    : asset('assets/img/project/default.jpg')
                );

            $secondImage = $projectImages->get(1)
                ? Storage::url($projectImages->get(1)->image)
                : ($projectImages->get(0)
                    ? Storage::url($projectImages->get(0)->image)
                    : asset('assets/img/project/default.jpg')
                );

            $plainText = trim(strip_tags($project->short_description));
            @endphp

            <div class="project-item col-12 filter-item cat{{ $category->id }}">

                <div class="project-item_wrapp">
                    <div class="box-img global-img">
                        <img src="{{ $firstImage }}" alt="project image">
                    </div>
                    <div class="box-img global-img">
                        <img src="{{ $secondImage }}" alt="project image">
                    </div>
                </div>

                <div class="project-content mt-2">
                    <h2 class="box-title">
                        <a href="{{ url('projects/' . $project->slug) }}">
                            {{ $project->title }}
                        </a>
                    </h2>

                    <p class="box-text service-description mt-4">
                        {{ mb_strlen($plainText) > 149
                                    ? mb_substr($plainText, 0, 149) . '...'
                                    : $plainText
                                }}
                    </p>

                    <div class="btn-group mt-45">
                        <a href="{{ url('projects/' . $project->slug) }}"
                            class="th-btns black-border">
                            View Details
                        </a>
                    </div>
                </div>

            </div>

            @endforeach
            @endforeach

        </div>
    </div>
</section>



<section class="renovation-bg-color positive-relative overflow-hidden space overflow-hidden" id="blog">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-xl-5">
                <div class="services-header">
                    <h5 class="title-heading">Blog & News</h5>
                    <p class="text-custom text-light-green">Browse Our Latest Articles & News</p>
                </div>
            </div>
        </div>
        <div class="row gx-24 gy-30">
            <div class="col-12">
                @forelse($blogPosts as $index => $post)
                @php
                $delay = '.' . (3 + ($index * 2)) . 's';
                @endphp
                <div class="blog-card style2 wow fadeInUp {{ $index > 0 ? 'mt-30' : '' }}" data-wow-delay="{{ $delay }}">
                    <div class="blog-img global-img" style="width: 100%; max-width: 730px; height: 315px; overflow: hidden;">
                        @if($post->image)
                        <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                        <img src="{{ asset('assets/img/blog/blog-placeholder.jpg') }}" alt="Blog placeholder" style="width: 100%; height: 100%; object-fit: cover;">
                        @endif
                    </div>
                    <div class="box-content">
                        <div>
                            <div class="blog-meta">
                                <a href="#" class="text-dark">By Admin</a>
                                <a href="#" class="text-dark">{{ $post->category?->name ?? 'General' }}</a>
                            </div>
                            <h2 class="box-title">
                                <a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a>
                            </h2>
                        </div>
                        <div class="box-wrapp" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
                            <span class="date">
                                {{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}
                            </span>
                            <a href="{{ route('blog.show', $post) }}" class="th-btns black-border mb-2">Read More</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-12">
                    <h3 class="text-xl text-gray-500">No blog posts available</h3>
                    <p class="text-gray-400 mt-2">Check back later for updates</p>
                </div>
                @endforelse
            </div>
        </div>
        <hr class="line">
    </div>
</section>

<style>
    /* Blog section styling */
    #blog .blog-img {
        width: 100%;
        max-width: 730px;
        height: 315px;
        overflow: hidden;
        border-radius: 8px;
    }

    #blog .blog-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Fix: Ensure blog section header is always visible */
    #blog .services-header {
        opacity: 1 !important;
        visibility: visible !important;
    }

    #blog .services-header .title-heading,
    #blog .services-header .text-light-green {
        opacity: 1 !important;
        visibility: visible !important;
        /*  color: inherit !important; */
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        #blog .blog-img {
            height: 200px;
            max-width: 100%;
        }
    }
</style>

<section id="experts" class="expertise">
    <div class="hero">
        <div class="services-header">
            <h5 class="title-heading">Our Experts</h5>
            <p class="text-custom text-light-green">The best experts in each field</p>
        </div>
        <div class="freelances-group">
            <div data-duration-in="500" data-duration-out="200" data-current="Tab 1" data-easing="ease" class="w-tabs">
                <div class="tabs-menu-freelance w-tab-menu">
                    @foreach($expertsByCategory as $index => $category)
                    <a data-w-tab="Tab {{ $index + 1 }}" class="tab-link w-inline-block w-tab-link {{ $index == 0 ? 'w--current' : '' }} playfair-display">
                        <div>{{ $category->name }}</div>
                    </a>
                    @endforeach
                </div>
                <div class="tabs-content-2 w-tab-content">
                    @foreach($expertsByCategory as $index => $category)
                    <div data-w-tab="Tab {{ $index + 1 }}" class="w-tab-pane {{ $index == 0 ? 'w--tab-active' : '' }}">
                        <div class="w-layout-grid grid-4">
                            @foreach($category->experts ?? [] as $expert)
                            <div class="profile grey">
                                <div class="profile-header">
                                    <img loading="lazy" src="{{ $expert->image ? asset('storage/' . $expert->image) : asset('assets/img/expert-placeholder.jpg') }}" alt="{{ $expert->designation }}" class="image-126">
                                </div>
                                <div class="profile-body">
                                    <div class="profiles-infos">
                                        <div class="tag blue">
                                            <div class="sector_profile white">{{ $expert->designation }}</div>
                                        </div>
                                        <div class="skills-profil">
                                            @foreach($expert->skills->take(2) as $skill)
                                            <div class="tag grey">
                                                <div class="sector_profile white">{{ $skill->name }}</div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="div_logo_profile">
                                        <div class="previously_profile white">Worked for</div>
                                        <div class="box-logo-profile">
                                            @if($expert->company_url)
                                            <a href="{{ $expert->company_url }}" target="_blank">
                                                <img src="{{ $expert->company_logo ? asset('storage/' . $expert->company_logo) : '' }}" alt="{{ $expert->company }}" loading="lazy" class="logo_profile_custom {{ strtolower(str_replace(' ', '-', $expert->company)) }} black">
                                            </a>
                                            @else
                                            <img src="{{ $expert->company_logo ? asset('storage/' . $expert->company_logo) : '' }}" alt="{{ $expert->company }}" loading="lazy" class="logo_profile_custom {{ strtolower(str_replace(' ', '-', $expert->company)) }} black">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Expert section styling */
    #experts .profile {
        background: #ffffff;
        border-radius: 12px;
        padding: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        color: #000000;
        display: flex;
        flex-direction: column;
    }

    #experts .profile:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    #experts .profile-header {
        border-radius: 10px;
        overflow: hidden;
        margin-bottom: 15px;
        width: 100%;
        height: 300px;
        /* Fixed height increased by ~35px */
        flex-shrink: 0;
        /* Prevents flex item from shrinking */
    }

    #experts .image-126 {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
        border: 3px solid #f0f0f0;
        transition: all 0.3s ease;
        display: block;
        /* Ensures no extra space from inline elements */
    }

    #experts .profile:hover .image-126 {
        border-color: #003f3a;
        transform: scale(1.02);
    }

    #experts .profile-body {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        padding: 0;
        /* Explicitly set padding to 0 */
    }

    #experts .sector_profile,
    #experts .previously_profile {
        color: #000000 !important;
    }

    #experts .tag {
        background-color: #f0f0f0;
        border-radius: 6px;
        padding: 4px 8px;
        margin: 2px;
    }

    #experts .tag.blue {
        background-color: #e6f0ef;
    }

    #experts .tag.grey {
        background-color: #f5f5f5;
    }

    /* Expert section tabs styling */
    #experts .tab-link {
        cursor: pointer;
        /* Pointer cursor on hover */
        font-style: normal !important;
        /* Normal font style by default */
    }

    #experts .tab-link.w--current {
        font-style: italic !important;
        /* Italic when selected */
    }

    #experts .tab-link:hover {
        font-style: normal !important;
        /* Normal font style on hover */
    }
</style>

    {{--
        <section id="customers" class="renovation-bg-color">
        <div class="services-header">
            <h5 class="title-heading">CUSTOMER</h5>
            <p class="text-custom text-light-green">Who are our customers and partners</p>
        </div>
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($customers as $customer)
                <div class="customer-card bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                    <h3 class="text-xl font-bold mb-3 text-gray-800">{{ $customer->name }}</h3>
                    <p class="text-gray-600 mb-4">{{ $customer->description }}</p>

                    <div class="customer-logo-container flex justify-center items-center min-h-[100px]" data-logos='{{ json_encode($logos ?? []) }}'>
                        @php
                        $logos = json_decode($customer->logo, true);
                        @endphp

                        <div class="logo-stack relative w-32 h-20 overflow-hidden">
                            @if($logos && count($logos) > 0)
                            @foreach($logos as $index => $logoPath)
                            @php
                            $cleanPath = str_replace('\\', '/', ltrim($logoPath, '/'));
                            // Check if the path is already a full URL or a local asset path
                            if (filter_var($logoPath, FILTER_VALIDATE_URL)) {
                            $imageUrl = $logoPath;
                            } elseif (str_starts_with($logoPath, 'assets/')) {
                            // Local asset path - use asset() without storage prefix
                            $imageUrl = asset($cleanPath);
                            } else {
                            // Assume it's a stored file path
                            $imageUrl = asset('storage/' . $cleanPath);
                            }
                            @endphp
                            <div class="logo-item absolute inset-0 flex items-center justify-center transition-all duration-500 ease-in-out transform {{ $index === 0 ? 'opacity-100 rotate-x-0' : 'opacity-0 rotate-x-90' }}"
                                data-index="{{ $index }}">
                                <img
                                    src="{{ $imageUrl }}"
                                    alt="{{ $customer->name }} Logo {{ $index + 1 }}"
                                    class="max-h-16 max-w-full object-contain"
                                    onerror="this.onerror=null; this.src='';">
                            </div>
                            @endforeach
                            @else
                            <div class="logo-item absolute inset-0 flex items-center justify-center opacity-100">
                                <div class="bg-gray-200 border-2 border-dashed rounded-lg w-20 h-20 flex items-center justify-center text-sm text-gray-500">
                                    No Logo
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <style>
            .customer-card {
                transition: all 0.3s ease;
            }

            .customer-card:hover {
                transform: translateY(-5px);
            }

            #customers-sec {
                background-color: white;
            }

            .title-heading {
                text-align: center;
                font-size: 1.3rem;
                line-height: 2rem;
                font-weight: 900;
                color: rgba(0, 15, 10, 1);
            }

            .text-light-green {
                color: #9ebdb4 !important;
                text-align: center !important;
            }

            /* Customer logo container */
            .customer-logo-container {
                min-height: 100px;
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: #f8f9fa;
                border-radius: 0.5rem;
                padding: 1rem;
                perspective: 1000px;
            }

            .logo-stack {
                position: relative;
                width: 8rem;
                height: 5rem;
                transform-style: preserve-3d;
            }

            .logo-item {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                backface-visibility: hidden;
            }

            .logo-item img {
                max-height: 4rem;
                max-width: 100%;
                object-fit: contain;
                display: block;
            }

            /* 3D Rotation keyframes */
            @keyframes verticalFlipIn {
                0% {
                    transform: rotateX(90deg);
                    opacity: 0;
                }

                100% {
                    transform: rotateX(0deg);
                    opacity: 1;
                }
            }

            @keyframes verticalFlipOut {
                0% {
                    transform: rotateX(0deg);
                    opacity: 1;
                }

                100% {
                    transform: rotateX(-90deg);
                    opacity: 0;
                }
            }

            .rotate-x-0 {
                transform: rotateX(0deg);
            }

            .rotate-x-90 {
                transform: rotateX(90deg);
            }

            .vertical-flip-enter {
                animation: verticalFlipIn 0.5s ease-in-out forwards;
            }

            .vertical-flip-exit {
                animation: verticalFlipOut 0.5s ease-in-out forwards;
            }
        </style>



        <style>
            /* Custom styles for home page services section */
            .home-service-card {
                background: white;
                padding: 8px;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                text-align: left;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
            }

            .home-service-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            }

            .home-service-card .service-title {
                font-weight: 600;
                color: #003f3a;
                margin-bottom: 15px;
                line-height: 1.4;
            }

            .home-service-card .service-description {
                font-size: 0.9rem;
                color: #666;
                line-height: 1.6;
                margin-bottom: 15px;
            }

            .home-service-card .btn-group {
                margin-top: auto !important;
                display: inline-block;
            }

            .home-service-card .th-btns.black-border {
                display: inline-block;
                margin: 0;
            }

            .services-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 30px;
                margin-top: 40px;
            }

            .services-row {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 30px;
            }

            .service-column {
                margin-bottom: 0 !important;
            }

            /* Responsive adjustments */
            @media (max-width: 768px) {
                .services-grid {
                    grid-template-columns: 1fr;
                    gap: 20px;
                }

                .services-row {
                    grid-template-columns: 1fr;
                }
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                console.log('Initializing customer logo rotation');

                // Initialize rotation for each customer logo stack
                const logoContainers = document.querySelectorAll('.customer-logo-container');

                logoContainers.forEach(container => {
                    const logoStack = container.querySelector('.logo-stack');
                    const logoItems = container.querySelectorAll('.logo-item');

                    if (logoItems.length > 1) {
                        let currentIndex = 0;
                        let interval;

                        function rotateLogos() {
                            // Hide current logo with exit animation
                            const currentLogo = logoItems[currentIndex];
                            currentLogo.classList.remove('opacity-100', 'rotate-x-0');
                            currentLogo.classList.add('vertical-flip-exit');

                            setTimeout(() => {
                                // Reset current logo
                                currentLogo.classList.remove('vertical-flip-exit');
                                currentLogo.classList.add('opacity-0', 'rotate-x-90');

                                // Move to next logo
                                currentIndex = (currentIndex + 1) % logoItems.length;

                                // Show next logo with enter animation
                                const nextLogo = logoItems[currentIndex];
                                nextLogo.classList.remove('opacity-0', 'rotate-x-90');
                                nextLogo.classList.add('vertical-flip-enter');

                                setTimeout(() => {
                                    nextLogo.classList.remove('vertical-flip-enter');
                                    nextLogo.classList.add('opacity-100', 'rotate-x-0');
                                }, 10);
                            }, 500); // Match CSS animation duration
                        }

                        // Start rotation
                        interval = setInterval(rotateLogos, 3000);

                        // Pause rotation on hover
                        container.addEventListener('mouseenter', () => {
                            if (interval) {
                                clearInterval(interval);
                            }
                        });

                        container.addEventListener('mouseleave', () => {
                            interval = setInterval(rotateLogos, 3000);
                        });
                    }
                });

                // Log logo loading status
                const logoImages = document.querySelectorAll('.logo-item img');
                logoImages.forEach((img, index) => {
                    img.addEventListener('load', function() {
                        console.log('✓ Customer logo loaded:', this.src);
                    });

                    img.addEventListener('error', function() {
                        console.error('✗ Customer logo failed to load:', this.src);
                    });
                });
            });
        </script>
    </section>
    --}}

    {{--
        <section id="community" class="clients">
        <div class="services-header">
            <h5 class="title-heading">Our Community</h5>
            <p class="text-custom text-light-green">Experts in the technologies you need for your projects</p>
        </div>
        <div class="services-row" style="display:grid; grid-template-columns:repeat(4, 1fr); gap:20px; text-align:center;padding:10px;">
            <div class="service-card" style="padding:20px; border:1px solid #ddd; border-radius:12px; height:180px; display:flex; justify-content:center; align-items:center; position:relative; overflow:hidden;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/93/Amazon_Web_Services_Logo.svg" class="floating-logo" style="width:50px;">
            </div>
            <div class="service-card" style="padding:20px; border:1px solid #ddd; border-radius:12px; height:180px; display:flex; justify-content:center; align-items:center; position:relative; overflow:hidden;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/59/SAP_2011_logo.svg" class="floating-logo" style="width:50px;">
            </div>
            <div class="service-card" style="padding:20px; border:1px solid #ddd; border-radius:12px; height:180px; display:flex; justify-content:center; align-items:center; position:relative; overflow:hidden;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/3/39/Kubernetes_logo_without_workmark.svg" class="floating-logo" style="width:50px;">
            </div>
            <div class="service-card" style="padding:20px; border:1px solid #ddd; border-radius:12px; height:180px; display:flex; justify-content:center; align-items:center; position:relative; overflow:hidden;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/59/SAP_2011_logo.svg" class="floating-logo" style="width:50px;">
            </div>
            <div class="service-card" style="padding:20px; border:1px solid #ddd; border-radius:12px; height:180px; display:flex; justify-content:center; align-items:center; position:relative; overflow:hidden;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/3/39/Kubernetes_logo_without_workmark.svg" class="floating-logo" style="width:50px;">
            </div>
            <div class="service-card" style="padding:20px; border:1px solid #ddd; border-radius:12px; height:180px; display:flex; justify-content:center; align-items:center; position:relative; overflow:hidden;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/59/SAP_2011_logo.svg" class="floating-logo" style="width:50px;">
            </div>
            <div class="service-card" style="padding:20px; border:1px solid #ddd; border-radius:12px; height:180px; display:flex; justify-content:center; align-items:center; position:relative; overflow:hidden;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/59/SAP_2011_logo.svg" class="floating-logo" style="width:50px;">
            </div>
            <div class="service-card" style="padding:20px; border:1px solid #ddd; border-radius:12px; height:180px; display:flex; justify-content:center; align-items:center; position:relative; overflow:hidden;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/93/Amazon_Web_Services_Logo.svg" class="floating-logo" style="width:50px;">
            </div>
        </div>
    </section>
    --}}

<section class="overflow-hidden space-top renovation-bg-color" id="contact-us">
    <div class="services-header">
        <h5 class="title-heading">Contact Us</h5>
        <p class="text-custom text-light-green">If you have any questions, suggestions, or would like to work with us, feel free to reach out. We're here to help and will get back to you as soon as possible.</p>
    </div>
    <div class="container">
        <div class="row gy-4 flex-row-reverse">
            <div class="col-xl-6">
                <div class="ps-xl-5">
                    <!-- Alert Messages -->
                    <div id="contact-alert" class="alert" role="alert" style="display: none;">
                        <span id="contact-alert-message"></span>
                    </div>

                    <form id="contactForm" action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Full Name*">
                                <i class="fa-solid fa-user"></i>
                                <div class="invalid-feedback" id="name-error"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address*">
                                <i class="fa-solid fa-envelope"></i>
                                <div class="invalid-feedback" id="email-error"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone Number*">
                                <i class="fa-solid fa-phone"></i>
                                <div class="invalid-feedback" id="phone-error"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject*" maxlength="150">
                                <i class="fa-solid fa-tag"></i>
                                <div class="invalid-feedback" id="subject-error"></div>
                                <small class="form-text text-muted">Maximum 150 characters</small>
                            </div>
                            <div class="form-group col-12">
                                <textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Your Message*"></textarea>
                                <i class="fa-solid fa-pencil"></i>
                                <div class="invalid-feedback" id="message-error"></div>
                            </div>
                            <div class="form-btn col-12">
                                <button type="submit" class="th-btns black-border" id="submitBtn">
                                    <span class="btn-text">Submit Now</span>
                                    <span class="btn-loading" style="display: none;"><i class="fa-solid fa-spinner fa-spin"></i> Sending...</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="contact-image2">
                    <div class="img1 img-anim-left">
                        <img style="height:500px!important;" src="assets/img/normal/contact-3-1.jpg" alt="">
                    </div>
                    <div class="contact-shape">
                        <img style="height:500px!important;" src="assets/img/normal/contact-3-1.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@php
// Collect all gallery images from random categories
$randomGalleryImages = collect();

if(isset($galleryCategories) && $galleryCategories->count()) {
$randomGalleryImages = $galleryCategories
->shuffle() // random categories
->flatMap(function ($cat) { // merge galleries
return $cat->galleries;
})
->shuffle()
->take(2)
->values();
}

// Fallback images
$fallbackImages = [
asset('assets/img/testimonial/testi-img1.jpg'),
asset('assets/img/testimonial/testi-img2.jpg'),
];

$image1 = Storage::url($randomGalleryImages[0]->image) ?? $fallbackImages[0];
$image2 = Storage::url($randomGalleryImages[1]->image) ?? $fallbackImages[1];
$imageOneTitle = $randomGalleryImages[0]->title ?? 'Excellence Residence';
$imageTwoTitle = $randomGalleryImages[1]->title ?? 'Interior Decoration';
@endphp

<section class="overflow-hidden space overflow-hidden mb-5" id="testimonials">
    <div class="container">

        <div class="services-header">
            <h5 class="title-heading">Testimonials</h5>
            <p class="text-custom text-light-green">
                What our clients have to say about our services.
            </p>
        </div>

        <div class="row gy-24 align-items-center">

            {{-- LEFT STATIC IMAGE BLOCK (kept same) --}}
            <div class="col-xl-5">
                <div class="testi-image_wrapp">
                    <div class="testi-review">
                        <div class="testi-img1 global-img">
                            <img src="{{ $image1 }}" alt="image">
                        </div>
                        <div class="box-content">
                            <h3 class="box-title">{{ $imageOneTitle }}</h3>
                            <p class="box-text">{{ $imageTwoTitle }}</p>
                        </div>
                    </div>
                    <div class="testi-img2 global-img">
                        <img src="{{ $image2 }}" alt="image">
                    </div>
                </div>
            </div>

            {{-- RIGHT SLIDER --}}
            <div class="col-xl-7">
                <div class="slider-wrap">
                    <div class="swiper th-slider testiSlide1 has-shadow"
                        id="testiSlide1"
                        data-slider-options='{"effect":"slide","loop":true}'>

                        <div class="swiper-wrapper">

                            @foreach($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <div class="testi-card style1">

                                    <div class="box-wrapp">
                                        <div class="box-quote">
                                            <img src="{{ asset('assets/img/icon/quote2.svg') }}" alt="">
                                        </div>

                                        {{-- STATIC RATING (kept same) --}}
                                        <div class="box-rating">
                                            <span class="rating">5.0/5.0</span>
                                            <span class="review">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <p class="mb-20">
                                        “{{ $testimonial->testimonial_text }}”
                                    </p>

                                    <div class="box-profile">
                                        <div class="box-author">
                                            <img src="{{ Storage::url($testimonial->client_image) }}"
                                                alt="{{ $testimonial->client_name }}">
                                        </div>
                                        <div class="box-info">
                                            <h3 class="box-title">
                                                {{ $testimonial->client_name }}
                                            </h3>
                                            <span class="box-desig">
                                                {{ $testimonial->designation }}
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @endforeach

                        </div>

                        {{-- Slider Arrows (unchanged) --}}
                        <div class="icon-box">
                            <button data-slider-prev="#testiSlide1"
                                class="slider-arrow style4 default slider-prev">
                                <img src="{{ asset('assets/img/icon/right-arrow4.svg') }}"
                                    style="display: unset!important;" alt="arrow-previous">
                            </button>
                            <button data-slider-next="#testiSlide1"
                                class="slider-arrow style4 default slider-next">
                                <img src="{{ asset('assets/img/icon/left-arrow4.svg') }}"
                                    style="display: unset!important;" alt="arrow-next">
                            </button>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="shape-mockup d-none d-xxl-block"
        data-bottom="0%"
        data-left="0%">
        <img src="{{ asset('assets/img/shape/element-4.png') }}" alt="">
    </div>
</section>


{{--
    <section class="overflow-hidden space-bottom overflow-hidden playfair-display renovation-bg-color" id="instagram">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7">
                    <div class="title-area text-center">
                        <h4 class="text-anime text-dark">Instagram</h4>
                        <h3 class="text-dark">Our Instagram Gallery</h3>
                    </div>
                </div>
            </div>
            <!-- SnapWidget -->
            <iframe src="https://snapwidget.com/embed/1117406" class="snapwidget-widget" allowtransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden;  width:1020px; height:510px" title="Posts from Instagram"></iframe>


            <div class="row justify-content-center align-items-center">
                <div class="col-10">
                    <div class="row gallery-row filter-active justify-content-between">

                        @forelse($instagrams as $insta)
                        <div class="col-xl-auto col-md-6 filter-item">
                            <div class="gallery-box">
                                <div class="box-img global-img">
                                    <img src="{{ asset($insta->image) }}" alt="Instagram Image">
                                </div>
                            </div>
                        </div>
                        @empty
                        <p class="text-center text-dark">No Instagram Images Available</p>
                        @endforelse

                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="overflow-hidden space" id="gallery">
        <div class="overflow-hidden">
            <div class="container">
                <div class="services-header">
                    <h5 class="title-heading">Gallery</h5>
                    <p class="text-custom text-light-green">Our recent gallery of projects.</p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-7">
                        <div class="filter-menu indicator-active filter-menu-active">

                            <button data-filter="*" class="tab-btn active" type="button">
                                View All
                            </button>
                            @foreach($galleryCategories as $index => $category)
                            <button
                                data-filter=".cat{{ $category->id }}"
                                class="tab-btn"
                                type="button">
                                {{ $category->name }}
                            </button>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="row gy-4 gallery-row filter-active">
                    @foreach($galleryCategories as $category)
                    @foreach($category->galleries as $gallery)
                    <div class="col-lg-6 col-xl-4 col-xxl-auto filter-item cat{{ $category->id }}">

                        <div class="gallery-card">
                            <div class="box-img global-img">
                                <img
                                    class="wow clippy-img"
                                    src="{{ Storage::url($gallery->image) }}"
                                    alt="gallery image">

                                <a href="{{ Storage::url($gallery->image) }}"
                                    class="icon-btn th-popup-image">
                                    <i class="far fa-plus"></i>
                                </a>

                                <div class="shape">
                                    <div class="dot"></div>
                                </div>
                            </div>

                            <div class="gallery-content">
                                <h2 class="box-title">
                                    {{ $gallery->title }}
                                </h2>
                            </div>
                        </div>

                    </div>
                    @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </section>
 --}}
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Contact form submission with AJAX
        $('#contactForm').on('submit', function(e) {
            e.preventDefault();

            // Prevent multiple submissions
            var submitBtn = $('#submitBtn');
            if (submitBtn.prop('disabled') || submitBtn.hasClass('disabled')) {
                return false;
            }

            // Clear previous errors
            $('.invalid-feedback').text('').hide();
            $('.form-control, .form-select').removeClass('is-invalid');
            hideAlert();

            // Get form data
            var formData = {
                _token: $('input[name=_token]').val(),
                name: $('#name').val().trim(),
                email: $('#email').val().trim(),
                phone: $('#phone').val().trim(),
                subject: $('#subject').val(),
                message: $('#message').val().trim()
            };

            // Client-side validation
            var isValid = true;
            var errors = {};

            // Validate name
            if (!formData.name) {
                errors.name = 'Name is required.';
                isValid = false;
            } else if (formData.name.length < 2) {
                errors.name = 'Name must be at least 2 characters long.';
                isValid = false;
            }

            // Validate email
            if (!formData.email) {
                errors.email = 'Email is required.';
                isValid = false;
            } else if (!isValidEmail(formData.email)) {
                errors.email = 'Please enter a valid email address.';
                isValid = false;
            }

            // Validate phone
            if (!formData.phone) {
                errors.phone = 'Phone number is required.';
                isValid = false;
            } else if (!isValidPhone(formData.phone)) {
                errors.phone = 'Please enter a valid phone number.';
                isValid = false;
            }

            // Validate subject
            if (!formData.subject) {
                errors.subject = 'Subject is required.';
                isValid = false;
            } else if (formData.subject.length > 150) {
                errors.subject = 'Subject must be no more than 150 characters.';
                isValid = false;
            }

            // Validate message
            if (!formData.message) {
                errors.message = 'Message is required.';
                isValid = false;
            } else if (formData.message.length < 10) {
                errors.message = 'Message must be at least 10 characters long.';
                isValid = false;
            }

            // Display validation errors
            if (!isValid) {
                $.each(errors, function(field, message) {
                    $('#' + field + '-error').text(message).show();
                    $('#' + field).addClass('is-invalid');
                });
                showAlert('Please correct the errors below.', 'danger');
                return;
            }

            // Disable submit button and show loading
            var submitBtn = $('#submitBtn');
            var btnText = $('.btn-text');
            var btnLoading = $('.btn-loading');

            // Prevent multiple clicks by adding multiple disable methods
            submitBtn.prop('disabled', true);
            submitBtn.attr('disabled', 'disabled');
            submitBtn.addClass('disabled');
            submitBtn.css('pointer-events', 'none');
            btnText.hide();
            btnLoading.show();

            // Submit form via AJAX
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Show success message
                        showAlert(response.message, 'success');

                        // Reset form
                        $('#contactForm')[0].reset();

                        // Reset nice-select if used
                        if ($.fn.niceSelect) {
                            $('#subject').niceSelect('update');
                        }
                    } else {
                        showAlert(response.message || 'Something went wrong. Please try again.', 'danger');
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        // Validation errors
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(field, messages) {
                            $('#' + field + '-error').text(messages[0]).show();
                            $('#' + field).addClass('is-invalid');
                        });
                        showAlert('Please correct the errors below.', 'danger');
                    } else {
                        // Other errors
                        showAlert('Something went wrong. Please try again.', 'danger');
                    }
                },
                complete: function() {
                    // Re-enable submit button with multiple methods
                    submitBtn.prop('disabled', false);
                    submitBtn.removeAttr('disabled');
                    submitBtn.removeClass('disabled');
                    submitBtn.css('pointer-events', 'auto');
                    btnText.show();
                    btnLoading.hide();
                }
            });
        });

        // Email validation function
        function isValidEmail(email) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        // Phone validation function
        function isValidPhone(phone) {
            var phoneRegex = /^[+]?[0-9\s\-\(\)]{10,20}$/;
            return phoneRegex.test(phone);
        }

        // Show alert message
        function showAlert(message, type) {
            var alertDiv = $('#contact-alert');
            var alertMessage = $('#contact-alert-message');

            alertDiv.removeClass('alert-success alert-danger alert-warning alert-info')
                .addClass('alert-' + type);
            alertMessage.text(message);
            alertDiv.show();

            // Scroll to alert
            $('html, body').animate({
                scrollTop: $('#contact-us').offset().top - 100
            }, 500);

            // Auto hide success messages after 5 seconds
            if (type === 'success') {
                setTimeout(function() {
                    hideAlert();
                }, 5000);
            }
        }

        // Hide alert message
        function hideAlert() {
            $('#contact-alert').hide();
        }

        // Real-time validation on input blur
        $('#name, #email, #phone, #subject, #message').on('blur', function() {
            var field = $(this);
            var fieldName = field.attr('id');
            var errorDiv = $('#' + fieldName + '-error');

            // Clear error when user starts typing
            field.removeClass('is-invalid');
            errorDiv.hide();

            // Validate on blur
            var value = field.val().trim();
            var error = '';

            switch (fieldName) {
                case 'name':
                    if (!value) error = 'Name is required.';
                    else if (value.length < 2) error = 'Name must be at least 2 characters.';
                    break;
                case 'email':
                    if (!value) error = 'Email is required.';
                    else if (!isValidEmail(value)) error = 'Please enter a valid email.';
                    break;
                case 'phone':
                    if (!value) error = 'Phone number is required.';
                    else if (!isValidPhone(value)) error = 'Please enter a valid phone number.';
                    break;
                case 'subject':
                    if (!value) error = 'Subject is required.';
                    else if (value.length > 150) error = 'Subject must be no more than 150 characters.';
                    break;
                case 'message':
                    if (!value) error = 'Message is required.';
                    else if (value.length < 10) error = 'Message must be at least 10 characters.';
                    break;
            }

            if (error) {
                errorDiv.text(error).show();
                field.addClass('is-invalid');
            }
        });

        // Clear validation on input focus
        $('#name, #email, #phone, #subject, #message').on('focus', function() {
            $(this).removeClass('is-invalid');
            $('#' + $(this).attr('id') + '-error').hide();
        });
    });
</script>
    <script>
        $(function () {

            const $form = $('#demoFormContainer form');
            const $btn  = $form.find('button'); // ✅ FIXED
            const originalBtnHtml = $btn.html();

            const $msg = $('<div/>', {
                id: 'formMessages',
                css: {
                    display: 'none',
                    marginBottom: '15px',
                    padding: '12px 15px',
                    borderRadius: '6px',
                    fontSize: '14px'
                }
            }).prependTo($form);

            $form.on('submit', function (e) {
                e.preventDefault();

                $msg.hide().empty();
                $form.find('.is-invalid').removeClass('is-invalid');

                setLoading(true);

                $.post($form.attr('action'), $form.serialize())
                    .done(res => {
                        if (res.status === 'success') {
                            $form[0].reset();
                            showMsg(res.message, 'success');
                        }
                    })
                    .fail(xhr => {
                        if (xhr.status === 422) {
                            const errors = xhr.responseJSON.errors;
                            showMsg(
                                Object.values(errors).map(e => `<li>${e[0]}</li>`).join(''),
                                'error'
                            );
                            Object.keys(errors).forEach(f =>
                                $form.find(`[name="${f}"]`).addClass('is-invalid')
                            );
                        } else {
                            showMsg('Something went wrong. Please try again.', 'error');
                        }
                    })
                    .always(() => {
                        setLoading(false);
                    });
            });

            function setLoading(loading) {
                if (loading) {
                    $btn
                        .prop('disabled', true)
                        .html('<i class="fa fa-spinner fa-spin"></i> Sending<span class="dots"></span>');
                } else {
                    $btn
                        .prop('disabled', false)
                        .html(originalBtnHtml);
                }
            }

            function showMsg(content, type) {
                $msg
                    .css(type === 'success' ? successStyle() : errorStyle())
                    .html(type === 'success'
                        ? content
                        : `<ul style="margin:0;padding-left:18px">${content}</ul>`
                    )
                    .fadeIn();

                if (type === 'success') {
                    setTimeout(() => $msg.fadeOut(), 4000);
                }
            }

            function successStyle() {
                return {
                    background: '#d4edda',
                    color: '#155724',
                    border: '1px solid #c3e6cb'
                };
            }

            function errorStyle() {
                return {
                    background: '#f8d7da',
                    color: '#721c24',
                    border: '1px solid #f5c6cb'
                };
            }

        });
    </script>
@endpush

@push('styles')
<style>
    /* Contact Form Validation Styles */
    .form-control.is-invalid,
    .form-select.is-invalid {
        border-color: #dc3545;
        padding-right: calc(1.5em + 0.75rem);
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right calc(0.375em + 0.1875rem) center;
        background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
    }

    .invalid-feedback {
        display: none;
        width: 100%;
        margin-top: 0.25rem;
        font-size: 0.875em;
        color: #dc3545;
    }

    .form-control.is-invalid:focus,
    .form-select.is-invalid:focus {
        border-color: #dc3545;
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
    }

    /* Alert Styles */
    .alert {
        position: relative;
        padding: 1rem 1.25rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: 0.375rem;
        font-weight: 500;
    }

    .alert-success {
        color: #0f5132;
        background-color: #d1e7dd;
        border-color: #badbcc;
    }

    .alert-danger {
        color: #842029;
        background-color: #f8d7da;
        border-color: #f5c2c7;
    }

    .alert-warning {
        color: #664d03;
        background-color: #fff3cd;
        border-color: #ffecb5;
    }

    .alert-info {
        color: #055160;
        background-color: #cff4fc;
        border-color: #b6effb;
    }

    /* Loading Button Styles */
    .btn-loading {
        display: inline-block;
    }

    /* Disabled button styles */
    #submitBtn.disabled,
    #submitBtn:disabled {
        opacity: 0.6;
        cursor: not-allowed !important;
        pointer-events: none !important;
    }

    #submitBtn.disabled:hover,
    #submitBtn:disabled:hover {
        opacity: 0.6;
        cursor: not-allowed !important;
        pointer-events: none !important;
        background-color: inherit;
        border-color: inherit;
        color: inherit;
    }

    /* Form Icon Positioning */
    .form-group {
        position: relative;
    }

    .form-group i {
        transform: translateY(-50%);
    }

    .form-control,
    .form-select {
        padding-right: 40px;
    }

    /* Character counter styling */
    .form-text {
        font-size: 0.875em;
        color: #6c757d;
        margin-top: 0.25rem;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .alert {
            padding: 0.75rem 1rem;
            font-size: 0.9rem;
        }
    }
</style>
@endpush
