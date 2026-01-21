@extends('layouts.master')

@section('content')

<section class="freelancer-hero-section" id="hero-sec">
    <div class="container">
        <div class="row align-items-center" style="margin-top: 5px;">
            <div class="col-lg-6">
                <div class="freelancer-hero-content">
                    <div class="freelancer-tags">
                        <span class="freelancer-tag text-white">IA</span>
                        <span class="freelancer-tag text-white">Data</span>
                        <span class="freelancer-tag text-white">Cloud</span>
                        <span class="freelancer-tag text-white">Cyber</span>
                        <span class="freelancer-tag text-white">IT</span>
                        <span class="freelancer-tag text-white">Digital</span>
                    </div>
                    <h1 class="freelancer-title playfair-display" style="font-size: 36px;">Renovate your property, according to your desires!</h1>
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
                            class="th-btns black-border" style="display:inline-block; text-decoration:none;">
                            I Want to Renovate a Property
                        </a>



                        <a href="javascript:void(0);" id="demoBtn" class="th-btns black-border" style="display:inline-block; text-decoration:none;">
                            Request a Demo
                        </a>


                        <div id="demoFormOverlay">
                            <div id="demoFormContainer">
                                <span id="closeForm" class="close-arrow">&#x2192;</span>
                                <h3 class="text-dark">REQUEST A DEMO</h3>

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

                                <form action="{{ route('admin.quotes.store') }}" method="POST">
                                    @csrf

                                    <div class="form-row">
                                        <input class="text-dark" type="text" name="name" placeholder="Your Name" required>
                                        <input class="text-dark" type="text" name="first_name" placeholder="First Name" required>
                                    </div>

                                    <div class="form-row">
                                        <input class="text-dark" type="email" name="email" placeholder="Your Email" required>
                                        <input class="text-dark" type="tel" name="phone" placeholder="Your Phone">
                                    </div>

                                    <div class="form-row">
                                        <input class="text-dark" type="text" name="company" placeholder="Your Company">
                                        <input class="text-dark" type="text" name="cities" placeholder="Preferred Cities">
                                    </div>

                                    <div class="form-row">
                                        <input class="text-dark" type="text" name="address" placeholder="Street Address">
                                        <input class="text-dark" type="text" name="postal_code" placeholder="Postal/ZIP Code">
                                    </div>

                                    <div class="form-row">
                                        <input class="text-dark" type="text" name="city" placeholder="City">
                                        <input class="text-dark" type="text" name="country" placeholder="Country">
                                    </div>

                                    <div class="form-row">
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
                <div style="position: relative; width:100%; max-width:200px; margin:auto;">


                    <img
                        src="https://images.pexels.com/photos/775358/pexels-photo-775358.jpeg"
                        alt="Man wearing glasses in 3-piece suit"
                        style="
          width:100%;
          border-radius:12px;
          animation: floatUpDown 4s ease-in-out infinite;
        ">


                    <div
                        style="
          position:absolute;
          left:-60px;
          top:35%;
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
          right:-60px;
          top:5%;
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
          right:-60px;
          bottom:5%;
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

<section class="client-reference" id="clients-sec">
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
</section>

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

<section id="about-sec">
    <div class="services-header">
        <h5 id="about-title"
            class="title-heading"
            style="scroll-margin-top: 100px;">
            {{ $about?->name ?? 'About Us' }}
        </h5>
        <p class="text-custom text-light-green">Minimalist luxury interiors rarely go out of fashion.</p>
    </div>
    <div style="display: flex; align-items: flex-start; justify-content: center; max-width: 1200px; margin: auto; gap: 40px; flex-wrap: wrap;">

        <div style="flex: 1; min-width: 350px;">
            <img
                src="{{ $about?->image ? Storage::url($about->image) : 'https://mesbatisseurs.fr/wp-content/uploads/2024/08/WhatsApp-Image-2024-08-21-at-15.28.33.jpeg' }}"
                alt="{{ $about?->name ?? 'About Image' }}"
                style="width: 100%; height: 500px; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.15);">
        </div>

        <div style="flex: 1; min-width: 350px; display: flex; flex-direction: column; justify-content: flex-start;">
            <p style="font-size: 16px; line-height: 1.7; color: #000000ff;">
                {!! $about?->description ?? 'At <strong>Mes Batisseurs</strong>, our passion lies in transforming spaces into true havens of peace...' !!}
            </p>
        </div>

    </div>
</section>


<section id="services-sec">
    <div>
        <div class="container">
            <div class="services-header">
                <h5 class="title-heading">Our services</h5>
                <p class="text-custom text-light-green">Support for all your transformation challenges</p>
            </div>

            <div class="services-grid">
                @php
                // Fetch all services from DB
                $dbServices = $services ?? collect();

                // Default services (shown if DB is empty)
                $defaultServices = [
                ['service_title' => 'Project management', 'service_description' => "From PMO to experienced interim manager, to bring your company's major projects to fruition."],
                ['service_title' => 'Technical Assistance', 'service_description' => "More than 100K experts available for contract work throughout France"],
                ['service_title' => 'Tech Factories', 'service_description' => "Build up your centers of excellence and teams in record time (Digital Factory, IA Factory)"],
                ['service_title' => 'Consulting', 'service_description' => "Industry experts to meet your operational and strategic challenges."],
                ['service_title' => 'Training', 'service_description' => "Call on freelance experts to train your teams on the latest technological topics."],
                ['service_title' => 'Portage', 'service_description' => "Wear all your consultants in minutes thanks to our automated platform."],
                ];

                // Display DB services if exists, else default services
                $displayServices = $dbServices->isEmpty() ? collect($defaultServices) : $dbServices;
                @endphp

                @foreach($displayServices->chunk(3) as $row)
                <div class="services-row mb-3">
                    @foreach($row as $service)
                    <div class="service-column">
                        <div class="service-card">
                            <h5 class="service-title">{{ $service->service_title ?? $service['service_title'] }}</h5>
                            <div class="service-description">{{ $service->service_description ?? $service['service_description'] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


<section class="project-area position-relative space-bottom overflow-hidden" id="project-sec">
    <div class="container">
        <div class="services-header">
            <h5 class="title-heading">Our Projects</h5>
            <p class="text-custom text-light-green">Complete Solutions for Your Outdoor Projects</p>
            <p class="text-custom text-light-green">Discover how we can transform your outdoor space with our specialist landscaping and construction services.</p>
        </div>
        <div class="row justify-content-center align-items-end">
            <div class="col-xl-6">
                <div class="filter-menu style2 light filter-menu-active">
                    <button data-filter="*" class="th-btns black-border active" type="button">View All</button>
                    @foreach($projectCategories as $index => $category)
                        <button data-filter=".cat{{ $index + 1 }}" class="th-btns black-border" type="button">{{ $category->name }}</button>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="gallery-row filter-active row">
            @foreach($projects as $project)
                @php
                    // Get the filter class for this project based on its category
                    $filterClass = 'cat-none'; // default
                    if($project->projectCategory) {
                        // Find the category index
                        $categoryIndex = $projectCategories->search(function($item) use ($project) {
                            return $item->id === $project->project_category_id;
                        });
                        if($categoryIndex !== false) {
                            $filterClass = 'cat' . ($categoryIndex + 1);
                        }
                    }
                @endphp
                <div class="project-item col-12 filter-item {{ $filterClass }}">
                    <div class="project-item-container d-flex" style="align-items: center; gap: 30px; flex-wrap: nowrap; width: 100%;">
                        <div class="project-item_wrapp d-flex" style="flex: 1; gap: 30px; align-items: center; flex-wrap: nowrap;">
                            @foreach($project->projectImages->take(2) as $index => $image)
                                <div class="box-img global-img {{ $index === 0 ? 'project-img-first' : 'project-img-second' }}">
                                    <img src="{{ Storage::url($image->image) }}" alt="{{ $project->title }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                                </div>
                            @endforeach
                        </div>
                        <div class="project-content" style="flex: 0 0 300px;">
                            <h2 class="box-title">{{ $project->title }}</h2>
                            @if($project->short_description)
                                <p class="box-text">{{ $project->short_description }}</p>
                            @endif
                            <div class="btn-group mt-45">
                                <a href="{{ route('projects.show', $project) }}" class="th-btns black-border" style="display:inline-block; text-decoration:none;">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="positive-relative overflow-hidden space overflow-hidden" id="blog-sec">
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
                            <div class="blog-meta text-custom">
                                <a href="#" class="text-dark">By Admin</a>
                                <a href="#" class="text-dark">{{ $post->category->name ?? 'General' }}</a>
                            </div>
                            <h3 class="box-title text-custom">
                                <a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a>
                            </h3>
                        </div>
                        <div class="box-wrapp" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
                            <span class="date text-custom">
                                {{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}
                            </span>
                            <a href="{{ route('blog.show', $post) }}" class="th-btns black-border">Read More</a>
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
    #blog-sec .blog-img {
        width: 100%;
        max-width: 730px;
        height: 315px;
        overflow: hidden;
        border-radius: 8px;
    }

    #blog-sec .blog-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Fix: Ensure blog section header is always visible */
    #blog-sec .services-header {
        opacity: 1 !important;
        visibility: visible !important;
    }

    #blog-sec .services-header .title-heading,
    #blog-sec .services-header .text-light-green {
        opacity: 1 !important;
        visibility: visible !important;
        color: inherit !important;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        #blog-sec .blog-img {
            height: 200px;
            max-width: 100%;
        }
    }
</style>

<section id="experts-sec" class="expertise">
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
                                    <img loading="lazy" src="{{ $expert->image ? asset('storage/' . $expert->image) : 'https://via.placeholder.com/300' }}" alt="{{ $expert->designation }}" class="image-126">
                                </div>
                                <div class="profile-body">
                                    <div class="profiles-infos">
                                        <div class="tag blue">
                                            <div class="sector_profile white playfair-display">{{ $expert->designation }}</div>
                                        </div>
                                        <div class="skills-profil">
                                            @foreach($expert->skills->take(2) as $skill)
                                            <div class="tag grey">
                                                <div class="sector_profile white playfair-display">{{ $skill->name }}</div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="div_logo_profile">
                                        <div class="previously_profile white playfair-display">Worked for</div>
                                        <div class="box-logo-profile">
                                            @if($expert->company_url)
                                            <a href="{{ $expert->company_url }}" target="_blank">
                                                <img src="{{ $expert->company_logo ? asset('storage/' . $expert->company_logo) : 'https://via.placeholder.com/100x50?text=Company' }}" alt="{{ $expert->company }}" loading="lazy" class="logo_profile_custom {{ strtolower(str_replace(' ', '-', $expert->company)) }} black">
                                            </a>
                                            @else
                                            <img src="{{ $expert->company_logo ? asset('storage/' . $expert->company_logo) : 'https://via.placeholder.com/100x50?text=Company' }}" alt="{{ $expert->company }}" loading="lazy" class="logo_profile_custom {{ strtolower(str_replace(' ', '-', $expert->company)) }} black">
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
    #experts-sec .profile {
        background: #ffffff;
        border-radius: 12px;
        padding: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        color: #000000;
        display: flex;
        flex-direction: column;
    }

    #experts-sec .profile:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    #experts-sec .profile-header {
        border-radius: 10px;
        overflow: hidden;
        margin-bottom: 15px;
        width: 100%;
        height: 300px;
        /* Fixed height increased by ~35px */
        flex-shrink: 0;
        /* Prevents flex item from shrinking */
    }

    #experts-sec .image-126 {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
        border: 3px solid #f0f0f0;
        transition: all 0.3s ease;
        display: block;
        /* Ensures no extra space from inline elements */
    }

    #experts-sec .profile:hover .image-126 {
        border-color: #003f3a;
        transform: scale(1.02);
    }

    #experts-sec .profile-body {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        padding: 0;
        /* Explicitly set padding to 0 */
    }

    #experts-sec .sector_profile,
    #experts-sec .previously_profile {
        color: #000000 !important;
    }

    #experts-sec .tag {
        background-color: #f0f0f0;
        border-radius: 6px;
        padding: 4px 8px;
        margin: 2px;
    }

    #experts-sec .tag.blue {
        background-color: #e6f0ef;
    }

    #experts-sec .tag.grey {
        background-color: #f5f5f5;
    }

    /* Expert section tabs styling */
    #experts-sec .tab-link {
        cursor: pointer;
        /* Pointer cursor on hover */
        font-style: normal !important;
        /* Normal font style by default */
    }

    #experts-sec .tab-link.w--current {
        font-style: italic !important;
        /* Italic when selected */
    }

    #experts-sec .tab-link:hover {
        font-style: normal !important;
        /* Normal font style on hover */
    }
</style>

<section id="customers-sec" class="clients bg-white">
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
                        $imageUrl = url('storage/' . $cleanPath);
                        @endphp
                        <div class="logo-item absolute inset-0 flex items-center justify-center transition-all duration-500 ease-in-out transform {{ $index === 0 ? 'opacity-100 rotate-x-0' : 'opacity-0 rotate-x-90' }}"
                            data-index="{{ $index }}">
                            <img
                                src="{{ $imageUrl }}"
                                alt="{{ $customer->name }} Logo {{ $index + 1 }}"
                                class="max-h-16 max-w-full object-contain"
                                onerror="this.onerror=null; this.src='https://via.placeholder.com/120x80?text=Logo+Error';">
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
            color: #9ebdb4!important;
            text-align: center!important;
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

<section id="community-sec" class="clients">
    <div class="services-header">
        <h5 class="title-heading">Our Community</h5>
        <p class="text-custom text-light-green">Experts in the technologies you need for your projects</p>
    </div>
    <div class="services-row" style="display:grid; grid-template-columns:repeat(4, 1fr); gap:20px; text-align:center;">
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

<section class="overflow-hidden space-top playfair-display" id="contact-sec">
    <div class="services-header">
        <h5 class="title-heading">Contact Us</h5>
        <p class="text-custom text-light-green">If you have any questions, suggestions, or would like to work with us, feel free to reach out. We're here to help and will get back to you as soon as possible.</p>
    </div>
    <div class="container">
        <div class="row gy-4 flex-row-reverse">
            <div class="col-xl-6">
                <div class="ps-xl-5">
                    <form action="">
                        <div class="row">
                            <div class="form-group col-md-6"><input type="text" class="form-control" name="name" id="name" placeholder="Full Name"> <i class="fa-solid fa-user"></i></div>
                            <div class="form-group col-md-6"><input type="email" class="form-control" name="email" id="email" placeholder="Email Address"> <i class="fa-solid fa-envelope"></i></div>
                            <div class="form-group col-md-6"><input type="tel" class="form-control" name="number" id="number" placeholder="Phone Number"> <i class="fa-solid fa-phone"></i></div>
                            <div class="form-group col-md-6"><select name="subject" id="subject" class="form-select nice-select">
                                    <option value="" disabled="disabled" selected="selected" hidden>Inquire Services</option>
                                    <option value="General Medicinet">General Medicine</option>
                                    <option value="Heart Specialists">Heart Specialists</option>
                                    <option value="Skin & Hair Specialists">Skin & Hair Specialists</option>
                                    <option value="Child Specialists">Child Specialists</option>
                                </select></div>
                            <div class="form-group col-12">
                                <textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Message"></textarea> <i class="fa-solid fa-pencil"></i></div>
                            <div class="col-12 form-group text-custom"><input type="checkbox" id="html"> <label for="html" class="text-custom">I agree with the privacy policy</label></div>
                            <div class="form-btn mt-20 col-12  text-custom"><button class="th-btns black-border text-custom">Submit Now</button></div>
                        </div>
                        <p class="form-messages mb-0 mt-3"></p>
                    </form>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="contact-image2" data-mask-src="assets/img/normal/contact-shape.png">
                    <div class="img1 img-anim-left"><img style="height:500px!important;" src="assets/img/normal/contact-1-1.jpg" alt=""></div>
                    <div class="contact-shape"><img style="height:500px!important;" src="assets/img/normal/contact-shape2.png" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="overflow-hidden overflow-hidden playfair-display" id="testi-sec">
    <div class="container">
        <div class="row gy-24 justify-content-center">
            <div class="col-xl-8">

                <h4 class="text-center text-dark">TESTIMONIALS</h4>

                <h2 class="style2 split-text text-custom">Client Feedback & <span class="fs-160"></span><span class="title3">Success Stories</span></h2>
            </div>
        </div>
    </div>
    <div class="row gy-5 justify-content-between align-items-center">
        <div class="col-xl-8">
            <div class="testi-area">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="testi-box-tab" data-slider-tab="#testiSlide3">
                            <div class="tab-btn active"><img src="assets/img/testimonial/testi-1-1.jpg" alt="avater"></div>
                            <div class="tab-btn"><img src="assets/img/testimonial/testi-1-2.jpg" alt="avater"></div>
                            <div class="tab-btn"><img src="assets/img/testimonial/testi-1-3.jpg" alt="avater"></div>
                            <div class="tab-btn"><img src="assets/img/testimonial/testi-1-4.jpg" alt="avater"></div>
                        </div>
                    </div>
                    <div class="col-lg-5">

                    </div>
                </div>
                <div class="icon-box"><button data-slider-prev="#testiSlide3" class="slider-arrow default slider-prev"><img src="assets/img/icon/left-arrow2.svg" alt=""></button> <button data-slider-next="#testiSlide3" class="slider-arrow default slider-next"><img src="assets/img/icon/right-arrow3.svg" alt=""></button></div><span class="testi-line"></span>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="slider-wrap">
                <div class="swiper th-slider testiSlide3 has-shadow" id="testiSlide3" data-slider-options='{"effect":"slide","loop":true}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="testi-box">
                                <div class="box-quote"><img src="assets/img/icon/quote3.svg" alt=""></div>
                                <p class="box-text text-custom">"John was wonderful to work with and more than capable in all aspects. I found him and his employees to be very creative, organized and professional…. I see John as an architect who truly loves his work. John has a true passion in the creative."</p>
                                <div class="box-profile">
                                    <div class="box-author"><img src="assets/img/testimonial/testi_3_1.jpg" alt="Avater"></div>
                                    <div class="box-info">
                                        <h3 class="box-title text-custom">Alex James</h3><span class="box-desig text-custom   ">Company Owner</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testi-box">
                                <div class="box-quote"><img src="assets/img/icon/quote3.svg" alt=""></div>
                                <p class="box-text text-custom">"John was wonderful to work with and more than capable in all aspects. I found him and his employees to be very creative, organized and professional…. I see John as an architect who truly loves his work. John has a true passion in the creative."</p>
                                <div class="box-profile">
                                    <div class="box-author"><img src="assets/img/testimonial/testi_3_2.jpg" alt="Avater"></div>
                                    <div class="box-info">
                                        <h3 class="box-title text-custom">James Thompson</h3><span class="box-desig text-custom">Company Owner</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testi-box">
                                <div class="box-quote"><img src="assets/img/icon/quote3.svg" alt=""></div>
                                <p class="box-text text-custom">"John was wonderful to work with and more than capable in all aspects. I found him and his employees to be very creative, organized and professional…. I see John as an architect who truly loves his work. John has a true passion in the creative."</p>
                                <div class="box-profile">
                                    <div class="box-author"><img src="assets/img/testimonial/testi_3_3.jpg" alt="Avater"></div>
                                    <div class="box-info">
                                        <h3 class="box-title text-custom">Aditi Banerjee</h3><span class="box-desig text-custom">Company Owner</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<section class="overflow-hidden space-bottom overflow-hidden playfair-display" id="instagram-sec">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7">
                <div class="title-area text-center">
                    <h4 class="text-anime text-dark">Instagram</h4>
                    <h3 class="text-dark">Our Instagram Gallery</h3>
                </div>
            </div>
        </div>

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

<section class="space playfair-display" id="gallery-sec">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="title-area text-center">
                    <h4 class="text-anime text-dark">OUR GALLERY</h4>
                    <h4 class="text-dark">Through a Unique Combination of Engineering</h4>
                </div>
            </div>
        </div>

        <div class="slider-wrap text-center">
            <div class="swiper th-slider gallery-slider4" id="gallerySlider4"
                data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":1.3},"991":{"slidesPerView":1.5},"1200":{"slidesPerView":2},"1600":{"slidesPerView":3.3}},"effect":"coverflow","coverflowEffect":{"rotate":17,"stretch":190,"depth":190,"modifier":1},"centeredSlides":true,"initialSlide":0}'>

                <div class="swiper-wrapper">
                    @forelse($galleries as $gallery)
                    <div class="swiper-slide">
                        <div class="gallery-item2">
                            <div class="box-img">
                                <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->title ?? 'Gallery Image' }}">
                                <a href="{{ asset($gallery->image) }}" class="icon-btn th-popup-image">
                                    <i class="far fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty

                    @endforelse
                </div>

                <div class="icon-box">
                    <!-- Prev -->
                    <button data-slider-prev="#gallerySlider4"
                        class="slider-btn slider-prev"
                        aria-label="Previous">
                        &#8592;
                    </button>

                    <!-- Next -->
                    <button data-slider-next="#gallerySlider4"
                        class="slider-btn slider-next"
                        aria-label="Next">
                        &#8594;
                    </button>
                </div>


            </div>
        </div>
    </div>
</section>

<style>
    /* Project section styling */
    .project-img-first {
        width: 300px;
        height: 300px;
        flex-shrink: 0;
    }

    .project-img-second {
        width: 565px;
        height: 300px;
        flex-shrink: 0;
    }

    /* Ensure project content stays inline and visible */
    .project-content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        background-color: transparent !important;
        color: #000000 !important;
        min-height: auto;
        flex: 0 0 250px;
    }

    .project-content .box-title {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin: 0 0 10px 0;
        color: #000000 !important;
        font-weight: bold;
    }

    .project-content .box-text {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin: 0 0 15px 0;
        line-height: 1.4;
        color: #000000 !important;
    }

    /* Align content in one line */
    .project-item-container {
        flex-wrap: nowrap;
    }

    /* Detail button styling to match homepage buttons */
    .project-content .th-btn.white-border.th-icon {
        background: transparent;
        border: 2px solid #003f3a;
        color: #003f3a;
        padding: 10px 25px;
        border-radius: 100px;
        text-decoration: none;
        display: inline-block;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .project-content .th-btn.white-border.th-icon:hover {
        background: #003f3a;
        color: white;
    }

    /* Project item container flex layout */
    .project-item-container {
        display: flex;
        align-items: flex-start;
        gap: 30px;
        flex-wrap: nowrap;
        width: 100%;
    }

    .project-item_wrapp {
        display: flex;
        gap: 30px;
        align-items: flex-start;
        flex: 1;
        flex-wrap: nowrap;
    }

    /* Ensure images are properly aligned in a row */
    .project-item_wrapp .box-img {
        margin: 0;
        flex-shrink: 0;
    }

    /* Ensure content stays in one line */
    .project-content {
        flex: 0 0 250px;
        min-width: 250px;
        flex-shrink: 0;
    }

    /* Force images to stay inline */
    .box-img.global-img {
        display: block;
        float: left;
    }

    /* Filter button active state */
    .filter-menu .th-btns.black-border {
        display: inline-block;
        text-decoration: none;
        background: transparent;
        border: 2px solid #000000;
        color: #000000;
        padding: 12px 28px;
        border-radius: 100px;
        font-weight: 500;
        transition: all 0.3s ease;
        margin-right: 10px;
    }

    .filter-menu .th-btns.black-border:hover {
        background: #000000;
        color: #ffffff;
    }

    .filter-menu .th-btns.black-border.active {
        background: #000000;
        color: #ffffff;
    }

    /* Project filtering styles */
    .project-item {
        transition: all 0.6s ease;
    }

    .gallery-row .project-item {
        margin-bottom: 30px;
        opacity: 1;
    }

    /* Isotope filtering */
    .gallery-row.isotope .project-item {
        opacity: 1;
        transform: translateY(0);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }

    .gallery-row.isotope .project-item.is-hidden {
        opacity: 0;
        transform: scale(0.001);
        pointer-events: none;
        display: none;
    }

    /* Ensure project items visibility */
    .filter-item {
        display: block;
    }

    /* Fix layout for few items */

    .project-item {
        margin-bottom: 0;
    }

    /* Ensure content alignment */
    .project-content {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    /* Remove Bootstrap row gutters when filtering */
    @media (min-width: 768px) {
        .gallery-row {
            margin-right: 0;
            margin-left: 0;
        }

        .project-item {
            padding-right: 0;
            padding-left: 0;
        }
    }

    /* Detail button styling to match homepage buttons */
    .project-content .th-btns.black-border {
        display: inline-block;
        text-decoration: none;
        background: transparent;
        border: 2px solid #000000;
        color: #000000;
        padding: 12px 28px;
        border-radius: 100px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .project-content .th-btns.black-border:hover {
        background: #000000;
        color: #ffffff;
    }

    /* Better vertical alignment */
    .project-item-container {
        align-items: self-start!important;
    }

    .project-item_wrapp {
        align-items: center !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Update selector to match new button class
        const filterButtons = document.querySelectorAll('.filter-menu .th-btns');
        const projectItems = document.querySelectorAll('.project-item');

        // Initialize all projects as visible
        projectItems.forEach(item => {
            item.style.display = 'block';
            item.style.opacity = '1';
        });

        // Add click event listeners to filter buttons
        filterButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const filterValue = this.getAttribute('data-filter');

                // Update active button - remove active class from all and add to current
                filterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');

                console.log('Filter clicked:', filterValue);

                // Apply filtering
                projectItems.forEach(item => {
                    if (filterValue === '*') {
                        // Show all projects
                        item.style.display = 'block';
                        item.style.opacity = '1';
                        item.style.position = 'relative';
                        item.style.visibility = 'visible';
                    } else {
                        // Check if project has the filter class
                        const filterClass = filterValue.replace('.', '');

                        if (item.classList.contains(filterClass)) {
                            item.style.display = 'block';
                            item.style.opacity = '1';
                            item.style.position = 'relative';
                            item.style.visibility = 'visible';
                        } else {
                            item.style.display = 'none';
                            item.style.opacity = '0';
                            item.style.position = 'absolute';
                            item.style.visibility = 'hidden';
                        }
                    }
                });
            });
        });
    });
</script>

@endsection
