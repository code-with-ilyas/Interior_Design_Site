<!doctype html>
<html class="no-js" lang="zxx">

@php
    $siteSetting = \App\Models\SiteSetting::first();
@endphp
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $siteSetting->site_name ?? 'H24 Renovation' }}</title>
    <meta name="author" content="themeholy">
    <meta name="description" content="Faren   - Architecture & Interior Design Template">
    <meta name="keywords" content="Faren   - Architecture & Interior Design Template">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @if($siteSetting && $siteSetting->favicon)
        <link rel="shortcut icon" href="{{ Storage::url($siteSetting->favicon) }}" type="image/x-icon">
    @else
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/img/favicons/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/img/favicons/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/img/favicons/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/favicons/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/img/favicons/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/img/favicons/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/img/favicons/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/img/favicons/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/img/favicons/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/favicons/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/ms-icon-144x144.png') }}">
        <meta name="theme-color" content="#ffffff">
    @endif
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/gallery-fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="show-grid" id="show-grid">
    <div class="th-menu-wrapper">
        <div class="th-menu-area text-center"><button class="th-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo"><a href="{{ url('/') }}">
                @if($siteSetting && $siteSetting->mobile_logo)
                    <img src="{{ Storage::url($siteSetting->mobile_logo) }}" alt="{{ $siteSetting->site_name ?? 'H24 Renovation' }}">
                @else
                    <img src="{{ asset('assets/img/H24.svg') }}" alt="H24 Renovation">
                @endif
            </a></div>
            <div class="th-mobile-menu">
                <ul>
                    <li>
                        <a class="renovation-link" href="#home">Home</a>
                    </li>
                    <li><a class="renovation-link" href="#about-us">About Us</a></li>
                    <li><a class="renovation-link" href="#services">Services</a></li>
                    <li><a class="renovation-link" href="#projects">Projects</a></li>
                    <li><a class="renovation-link" href="#blog">Blog</a></li>
                    <li><a class="renovation-link" href="#experts">Experts</a></li>
                    {{-- <li><a href="#customers-sec" class="link-customers">Customers</a></li> --}}
                    {{-- <li><a href="#community-sec" class="link-community">Community</a></li> --}}
                    <li><a class="renovation-link" href="#contact-us">Contact Us</a></li>
                    {{-- <li><a href="#instagram-sec">Instagram</a></li>
                    <li><a class="renovation-link" href="#gallery">Gallery</a></li> --}}
                    @auth
                    <li class="menu-item-has-children"><a href="#">
                            <i class="fas fa-user" style="font-size: 18px;"></i>
                        </a>
                        <ul class="sub-menu">
                            @if(Auth::user()->hasRole('super-admin'))
                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            @else
                            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            @endif
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endauth
                </ul>
            </div>
        </div>
    </div>

    <header class="th-header header-layout3 onepage-nav">
        <div class="sticky-wrapper">
            <div class="container th-container4">
                <div class="menu-area">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <div class="header-logo"><a href="{{ url('/') }}">
                                @if($siteSetting && $siteSetting->logo)
                                    <img src="{{ Storage::url($siteSetting->logo) }}" alt="{{ $siteSetting->site_name ?? 'H24 Renovation' }}">
                                @else
                                    <img src="{{ asset('assets/img/H24.svg') }}" alt="H24 Renovation">
                                @endif
                            </a></div>
                        </div>
                        <div class="col-auto">
                            <nav class="main-menu d-none d-lg-inline-block">
                                <ul>
                                    <li>
                                        <a class="renovation-link" href="#home">Home</a>
                                    </li>
                                    <li><a class="renovation-link" href="#about-us">About Us</a></li>
                                    <li><a class="renovation-link" href="#services">Services</a></li>
                                    <li><a class="renovation-link" href="#projects">Projects</a></li>
                                    <li><a class="renovation-link" href="#blog">Blog</a></li>
                                    <li><a class="renovation-link" href="#experts">Experts</a></li>
                                    {{-- <li><a href="#customers-sec" class="link-customers renovation-link">Customers</a></li> --}}
                                    {{-- <li><a href="#community-sec" class="link-community renovation-link">Community</a></li> --}}
                                    <li><a class="renovation-link" href="#contact-us">Contact Us</a></li>
                                    {{-- <li><a href="#instagram-sec" class="renovation-link">Instagram</a></li>
                                    <li><a class="renovation-link" href="#gallery">Gallery</a></li> --}}
                                    @auth
                                    <li class="menu-item-has-children"><a href="#">
                                            <i class="fas fa-user" style="font-size: 18px;"></i>
                                        </a>
                                        <ul class="sub-menu">
                                            @if(Auth::user()->hasRole('super-admin'))
                                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                            @else
                                            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                            @endif
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    @endauth
                                </ul>
                            </nav>
                            <div class="col-auto">
                                <div class="header-button">
                                    <button type="button" class="th-menu-toggle d-inline-block d-lg-none">
                                        <i class="far fa-bars"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
    <footer class="footer-wrapper footer-layout3 bg-primary-500 mt-5">
        <div class="widget-area">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-7 col-xl-4">
                        <div class="widget footer-widget">
                            <div class="th-widget-about">
                                <div class="about-logo"><a href="{{ url('/') }}">
                                    @if($siteSetting && $siteSetting->logo)
                                        <img src="{{ Storage::url($siteSetting->logo) }}" alt="{{ $siteSetting->site_name ?? 'H24 Renovation' }}">
                                    @else
                                        <img src="{{ asset('assets/img/H24.svg') }}" alt="H24 Renovation">
                                    @endif
                                </a></div>
                                <p class="about-text">{{ $siteSetting->about_short_description ?? 'Welcome to Mes Bâtisseurs, your trusted partner for all your renovation and construction projects. We transform your ideas into reality with expertise and passion.' }}</p>
                                <div class="th-social">
                                    @if($siteSetting && $siteSetting->facebook)
                                        <a href="{{ $siteSetting->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    @endif
                                    @if($siteSetting && $siteSetting->instagram)
                                        <a href="{{ $siteSetting->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                                    @endif
                                    @if($siteSetting && $siteSetting->linkedin)
                                        <a href="{{ $siteSetting->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    @endif
                                    @if($siteSetting && $siteSetting->whatsapp)
                                        <a href="{{ $siteSetting->whatsapp }}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                    @endif
                                </div>
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu  footer-widget">
                            <h3 class="widget_title text-custom">Quick Links</h3>
                            <div class="menu-all-pages-container text-custom">
                                <ul class="menu">
                                    <li><a class="renovation-link" href="#home">Home</a></li>
                                    <li><a class="renovation-link" href="#about-us">About Us</a></li>
                                    <li><a class="renovation-link" href="#services">Services</a></li>
                                    <li><a class="renovation-link" href="#projects">Projects</a></li>
                                    <li><a class="renovation-link" href="#blog">Blog</a></li>
                                    <li><a class="renovation-link" href="#experts">Experts</a></li>
                                    <li><a class="renovation-link" href="#contact-us">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title text-custom">Latest Projects</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu text-custom">
                                    @if(isset($latestProjects) && $latestProjects->count() > 0)
                                        @foreach($latestProjects as $project)
                                            <li><a href="{{ route('projects.show', $project->slug) }}">{{ $project->title }}</a></li>
                                        @endforeach
                                    @else
                                        <li><a href="{{ route('projects.index') }}">View All Projects</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <h3 class="widget_title text-custom">Get In Touch</h3>
                            <div class="th-widget-about style2">
                                @if($siteSetting && $siteSetting->address)
                                    <p class="footer-info">{{ $siteSetting->address }}</p>
                                @endif
                                @if($siteSetting && $siteSetting->phone)
                                    <p class="footer-info"><span><a class="text-inherit d-block" href="tel:{{ preg_replace('/[^0-9]/', '', $siteSetting->phone) }}">{{ $siteSetting->phone }}</a></span></p>
                                @endif
                                @if($siteSetting && $siteSetting->email)
                                    <p class="footer-info"><span><a class="text-inherit" href="mailto:{{ $siteSetting->email }}">{{ $siteSetting->email }}</a></span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-9">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-lg-6">
                                <div class="copyright-wrap">
                                    <p>Copyright, {{ $siteSetting->site_name ?? 'H24 RENOVATION' }}. All Rights Reserved.</p>
                                </div>
                            </div>
                            <div class="col-lg-6 text-center text-lg-end">
                                <div class="footer-links">
                                    <ul>
                                        <li><a href="{{ route('terms-and-conditions') }}">Terms of service</a></li>
                                        <li><a href="{{ route('privacy-policy') }}">Privacy policy</a></li>
                                        <li><a href="{{ route('legal-notices') }}">Legal notices</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/circle-progress.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/threesixty.min.js') }}"></script>
    <script src="{{ asset('assets/js/panolens.min.js') }}"></script>
    <script src="{{ asset('assets/js/gsap.min.js') }}"></script>
    <script src="{{ asset('assets/js/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('assets/js/SplitText.js') }}"></script>
    <script src="{{ asset('assets/js/SplitType.js') }}"></script>
    <script src="{{ asset('assets/js/lenis.min.js') }}"></script>
    <script src="{{ asset('assets/js/CustomEase.min.js') }}"></script>
    <script src="{{ asset('assets/js/anchor-navigation.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Scroll Top Button -->
    <div class="scroll-top cursor-pointer" style="display: none;">
        <svg class="w-100 h-100" viewBox="0 0 500 500">
            <path d="M50,250 C50,100 450,100 450,250 C450,400 50,400 50,250 Z" stroke-width="2" fill="none"></path>
        </svg>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.h2-subtitle, .h2-title, .service-card');
            elements.forEach((el, index) => {

                el.style.opacity = '1';
            });
        });
        const demoBtn = document.getElementById('demoBtn');
        const demoFormOverlay = document.getElementById('demoFormOverlay');
        const demoFormContainer = document.getElementById('demoFormContainer');
        const closeForm = document.getElementById('closeForm');

        // Open Form - with null check
        if (demoBtn) {
            demoBtn.addEventListener('click', () => {
                if (demoFormOverlay && demoFormContainer) {
                    demoFormOverlay.classList.add('active');
                    demoFormContainer.classList.add('active');
                }
            });
        }

        // Close Form - with null check
        if (closeForm) {
            closeForm.addEventListener('click', () => {
                if (demoFormContainer && demoFormOverlay) {
                    demoFormContainer.classList.remove('active');
                    demoFormOverlay.classList.remove('active');
                }
            });
        }

        // Close when clicking outside the form - with null check
        if (demoFormOverlay) {
            demoFormOverlay.addEventListener('click', (e) => {
                if (e.target === demoFormOverlay && demoFormContainer) {
                    demoFormContainer.classList.remove('active');
                    demoFormOverlay.classList.remove('active');
                }
            });
        }



        const tabs = document.querySelectorAll('.tab-link');

        tabs.forEach(tab => {
            if (tab) {
                tab.addEventListener('click', () => {
                    tabs.forEach(t => {
                        if (t) t.classList.remove('active');
                    });
                    tab.classList.add('active');
                });
            }
        });

        function fadeInElements() {
            const elements = document.querySelectorAll('.fade-in');
            if (elements.length > 0) {
                const inViewport = (el) => el.getBoundingClientRect().top <= window.innerHeight * 0.8;
                const handleScroll = () => elements.forEach(el => {
                    if (el && inViewport(el)) el.classList.add('visible');
                });
                window.addEventListener('scroll', handleScroll);
                handleScroll();
            }
        }


        function scrollLogos() {
            const tracks = [{
                    id: 'track1',
                    speed: 25
                },
                {
                    id: 'track2',
                    speed: 30
                },
                {
                    id: 'track3',
                    speed: 35
                }
            ];

            tracks.forEach(track => {
                const el = document.getElementById(track.id);
                if (!el) return;
                const totalWidth = Array.from(el.children).reduce((sum, c) => sum + c.offsetWidth + 25, 0);
                const duration = totalWidth / track.speed;
                el.style.animation = `scroll ${duration}s linear infinite`;
                const mask = el.parentElement;
                if (mask) {
                    mask.addEventListener('mouseenter', () => {
                        if (el) el.style.animationPlayState = 'paused';
                    });
                    mask.addEventListener('mouseleave', () => {
                        if (el) el.style.animationPlayState = 'running';
                    });
                }
            });

            const style = document.createElement('style');
            style.innerHTML = `
      @keyframes scroll { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
    `;
            document.head.appendChild(style);
        }


        function rotateCompanyNames() {
            const companyLists = [{
                    id: 'companies1',
                    interval: 2000
                },
                {
                    id: 'companies2',
                    interval: 2500
                },
                {
                    id: 'companies3',
                    interval: 3000
                }
            ];

            companyLists.forEach(list => {
                const el = document.getElementById(list.id);
                if (!el || !el.children || el.children.length === 0) return;

                const companies = el.children;
                const firstCompany = companies[0];
                if (!firstCompany) return;

                const companyHeight = firstCompany.offsetHeight;
                let currentIndex = 0;

                el.style.transform = `translateY(0)`;

                setInterval(() => {
                    if (el && companies.length > 0) {
                        currentIndex = (currentIndex + 1) % companies.length;
                        el.style.transform = `translateY(-${currentIndex * companyHeight}px)`;
                    }
                }, list.interval);
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            fadeInElements();
            scrollLogos();
            rotateCompanyNames();
        });
        document.addEventListener('DOMContentLoaded', function() {
            const tabLinks = document.querySelectorAll('.tab-link');
            const tabPanes = document.querySelectorAll('.w-tab-pane');

            if (tabLinks.length > 0 && tabPanes.length > 0) {
                tabLinks.forEach(link => {
                    if (link) {
                        link.addEventListener('click', function(e) {
                            e.preventDefault();

                            tabLinks.forEach(tab => {
                                if (tab) tab.classList.remove('w--current');
                            });
                            tabPanes.forEach(pane => {
                                if (pane) pane.classList.remove('w--tab-active');
                            });

                            this.classList.add('w--current');

                            const tabId = this.getAttribute('data-w-tab');

                            tabPanes.forEach(pane => {
                                if (pane && pane.getAttribute('data-w-tab') === tabId) {
                                    pane.classList.add('w--tab-active');
                                }
                            });
                        });
                    }
                });
            }
        });


        document.addEventListener('DOMContentLoaded', function() {
            const anchors = document.querySelectorAll('a[href^="#"]');
            if (anchors.length > 0) {
                anchors.forEach(anchor => {
                    if (anchor) {
                        anchor.addEventListener('click', function(e) {
                            e.preventDefault();
                            const targetSelector = this.getAttribute('href');
                            if (targetSelector) {
                                const target = document.querySelector(targetSelector);
                                if (target) {
                                    target.scrollIntoView({
                                        behavior: 'smooth',
                                        block: 'start'
                                    });
                                }
                            }
                        });
                    }
                });
            }
        });
        const companies = ["Airbus", "Renault", "Accor", "Vinci", "Google", "Microsoft", "Tesla", "Amazon"];
        const boxes = document.querySelectorAll(".company-box");

        if (boxes.length > 0 && companies.length > 0) {
            let indices = [0, 1, 2, 3];

            function changeCompanies() {
                boxes.forEach((box, i) => {
                    if (box && companies[indices[i]]) {
                        indices[i] = (indices[i] + 1) % companies.length;
                        box.textContent = companies[indices[i]];
                    }
                });
            }
            setInterval(changeCompanies, 2000);
        }
        // Enable context menu (right-click) on all pages
        document.oncontextmenu = function(e) { return true; };
        window.oncontextmenu = function(e) { return true; };

        // Remove any existing contextmenu event listeners
        document.removeEventListener('contextmenu', function(e) { e.preventDefault(); });
        document.removeEventListener('contextmenu', function(e) { e.stopPropagation(); });
    </script>

    <script>
        function toggleDropdown() {
            var dropdownMenu = document.getElementById('user-dropdown-menu');
            if (dropdownMenu) {
                if (dropdownMenu.style.display === 'none') {
                    dropdownMenu.style.display = 'block';
                } else {
                    dropdownMenu.style.display = 'none';
                }
            }
        }
        document.addEventListener('click', function(event) {
            var dropdown = document.getElementById('user-dropdown');
            var dropdownMenu = document.getElementById('user-dropdown-menu');
            if (dropdown && dropdownMenu && !dropdown.contains(event.target)) {
                dropdownMenu.style.display = 'none';
            }
        });
    </script>
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        .icon-box {
            display: flex;
            gap: 12px;
        }

        .slider-btn {
            width: 90px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: 600;
            background: linear-gradient(65deg, #003f3a 0%, #000000 100%);
            color: #fff;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            transition: none !important;
            box-shadow: none;
            outline: none;
        }

        .slider-btn:hover,
        .slider-btn:focus,
        .slider-btn:active {
            background: linear-gradient(65deg, #003f3a 0%, #000000 100%);
            color: #fff;
            box-shadow: none;
            transform: none;
        }

        .th-btns {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 28px;
            border-radius: 100px;
            background: linear-gradient(65deg, #003f3a 0%, #000000 100%);
            color: #ffffff !important;
            font-weight: 500;
            text-decoration: none;
            border: none;
            outline: none;
            cursor: pointer;
        }

        .text-custom {
            font-family: 'Playfair Display', serif !important;
            font-style: italic !important;
            font-size: 18px;
        }

        /* Override text-custom for project titles to prevent wrapping */
        .gallery-row .project-item .box-title.text-custom {
            font-style: normal !important;
            white-space: nowrap !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
        }

        .bg-primary-500 {
            --tw-bg-opacity: 1;
            background-color: rgba(0, 63, 58, var(--tw-bg-opacity)) !important;
        }

        .footer-wrapper.bg-primary-500,
        .footer-wrapper.bg-primary-500 .widget-area {
            background: rgba(0, 63, 58, var(--tw-bg-opacity)) !important;
        }

        .footer-wrapper:not(.bg-primary-500),
        .footer-wrapper:not(.bg-primary-500) .widget-area {
            background: #ffffff !important;
        }

        .footer-wrapper:not(.bg-primary-500),
        .footer-wrapper:not(.bg-primary-500) p,
        .footer-wrapper:not(.bg-primary-500) span,
        .footer-wrapper:not(.bg-primary-500) li,
        .footer-wrapper:not(.bg-primary-500) a,
        .footer-wrapper:not(.bg-primary-500) h3 {
            color: #000000 !important;
        }

        .footer-wrapper:not(.bg-primary-500) .th-social i {
            color: #000000 !important;
        }

        .footer-wrapper:not(.bg-primary-500) .copyright-text {
            color: #000000 !important;
        }

        .footer-wrapper:not(.bg-primary-500) div[style*="border"] {
            border-color: #000000 !important;
        }

        .footer-wrapper.bg-primary-500,
        .footer-wrapper.bg-primary-500 .widget-area {
            background: rgba(0, 63, 58, var(--tw-bg-opacity)) !important;
        }

        .footer-wrapper.bg-primary-500,
        .footer-wrapper.bg-primary-500 p,
        .footer-wrapper.bg-primary-500 span,
        .footer-wrapper.bg-primary-500 li,
        .footer-wrapper.bg-primary-500 a,
        .footer-wrapper.bg-primary-500 h3 {
            color: #ffffff !important;
        }

        .footer-wrapper.bg-primary-500 .th-social i {
            color: #ffffff !important;
        }

        .footer-wrapper.bg-primary-500 .copyright-text {
            color: #ffffff !important;
        }

        .footer-wrapper.bg-primary-500 div[style*="border"] {
            border-color: #ffffff !important;
        }

        .footer-wrapper .text-custom {
            font-style: normal !important;
        }

        .th-header,
        .th-header .sticky-wrapper,
        .th-header .menu-area {
            background: #F7F5F2 !important;
        }

        /* .th-header .main-menu ul li a {
            color: rgba(0, 63, 58, var(--tw-text-opacity)) !important;
            font-family: 'Playfair Display', serif;
        } */

        .th-header i,
        .th-header svg {
            color: rgba(0, 63, 58, var(--tw-text-opacity)) !important;
        }

        #user-dropdown-menu {
            background: #ffffff !important;
            border: 1px solid #dddddd !important;
        }

        #user-dropdown-menu a {
            color: #000000 !important;
        }

        @keyframes floatUp {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0);
            }
        }

        .floating-logo {
            animation: floatUp 3s ease-in-out infinite;
        }

        .services-header {
            text-align: center;
            margin-bottom: 60px;
            width: 100%;
        }

        .our-services-section {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            color: #fff;
            padding: 80px 20px;
        }

        .services-row {
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
        }

        .service-column {
            flex: 1;
            min-width: 300px;
            display: flex;
        }

        .service-card {
            background: #ffffffff;
            border: 1px solid #c5bebeff;
            border-radius: 10px;
            padding: 15px 15px;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            transition: all 0.3s ease;
        }

        .service-card:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: #464646ff;
            transform: translateY(-8px);
            box-shadow: 0 8px 25px #464646ff;
        }

        .service-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
            color: rgba(0, 63, 58, var(--tw-text-opacity)) !important;
        }

        .service-description {
            font-size: 14px;
            line-height: 1.6;
            color: rgba(0, 63, 58, var(--tw-text-opacity)) !important;
        }

        .h2-title {
            font-size: 46px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .h2-subtitle {
            font-size: 16px;
            text-transform: uppercase;
            color: #4169e1;
            margin-bottom: 8px;
        }

        @media (max-width: 768px) {
            .h2-title {
                font-size: 34px;
            }

            .service-card {
                padding: 30px 22px;
            }
        }

        #user-dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            background: #ffffffff;
            border: 1px solid #333;
            border-radius: 4px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            min-width: 150px;
        }

        #user-dropdown-menu li {
            display: block;
            width: 100%;
        }

        #user-dropdown-menu li a {
            display: block;
            padding: 10px 15px;
            color: #000 !important;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        #user-dropdown-menu li a:hover {
            background: #333;
            color: #fff !important;
        }

        .service-grid {
            height: 200px;

            overflow: hidden;
        }

        .main-menu ul li a {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif !important;
            font-weight: 400;
            text-transform: none;
            letter-spacing: 0.5px;
            color: #000 !important;
            transition: color 0.3s ease;
            font-size: 16px;
            padding: 0px 15px;
        }

        .main-menu ul li a.renovation-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background-color: #000;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .main-menu ul li a:hover {
            color: #898b8fff;
        }

        /* Navigation menu styles matching littleworker.fr */
        /* Header and navigation alignment */
        .header-logo img {
            max-height: 50px;
            width: auto;
        }

        .header-logo {
            display: flex;
            align-items: center;
            height: 80px;
            padding: 10px 0;
        }

        .header-logo a {
            display: flex;
            align-items: center;
            height: 100%;
        }

        .sticky-wrapper {
            height: 80px;
        }

        /* Ensure proper alignment between logo and menu */
        .th-header.header-layout3 {
            height: 80px;
        }

        .header-logo img {
            vertical-align: middle;
        }

        /*  .main-menu ul {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 15px;
        } */

        .main-menu ul li {
            position: relative;
            margin: 0;
            padding: 0;
        }

        .main-menu ul li a:hover {
            color: #898b8fff !important;
        }


        .main-menu ul li a:hover::after {
            width: 100%;
        }


        @media (min-width: 992px) {
            .main-menu.d-lg-inline-block {
                display: flex !important;
            }
        }

        .sub-title,
        .h2-subtitle {
            font-weight: 500;
            text-transform: none;
            color: rgba(255, 255, 255, 0.7);
            font-size: 13.5px;
            margin-bottom: 10px;
        }

        .clients {
            padding: 50px 0;
            max-width: 1200px;
            margin: 0 auto;
        }

        .clients .hero {
            text-align: center;
            margin-bottom: 50px;
        }

        .clients .h2-subtitle {
            color: #ffffffff;
            font-size: 14px;
            font-weight: 600;
            text-transform: none;
            margin-bottom: 12px;
            letter-spacing: 1px;
        }

        .clients .h2 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 0;
        }

        .clients .h2 span {
            color: #ffffffff;
        }

        .columns {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .column {
            flex: 1 1 300px;
            max-width: 350px;
        }

        .card {
            background: #ffffffff;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(255, 255, 255, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            color: white;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .card h5 {
            font-size: 20px;
            margin-bottom: 12px;
            font-weight: 700;
        }

        .card h5 span {
            color: #ffffffff;
        }

        .card p {
            font-size: 14px;
            margin-bottom: 20px;
            line-height: 1.5;
            color: white;
        }


        .company-names {
            height: 60px;
            margin-bottom: 20px;
            position: relative;
            overflow: hidden;
        }

        .company-list {
            position: absolute;
            width: 100%;
            transition: transform 0.8s ease;
        }

        .company-name {
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: 600;
            text-align: center;
            color: white;
        }

        .logo-mask {
            overflow: hidden;
            position: relative;
            height: 50px;
        }

        .logo-track {
            display: flex;
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            align-items: center;
        }

        .logo-track img {
            height: 35px;
            margin-right: 25px;
            opacity: 0.8;
            transition: opacity 0.3s ease;
        }

        .logo-track img:hover {
            opacity: 1;
        }

        .fade-in {
            opacity: 0;
            transform: translateY(15px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }


        @media(max-width: 991px) {
            .clients .h2 {
                font-size: 28px;
            }
        }

        @media(max-width: 767px) {
            .clients .h2 {
                font-size: 24px;
            }
        }


        .community-section {
            padding: 100px 20px;
            background-color: #ffffffff;
            color: #fff;
            text-align: center;
        }

        .community-subtitle {
            font-size: 20px;
            font-weight: 500;
            margin-bottom: 50px;
            color: rgba(255, 255, 255, 0.7);
        }

        .community-companies {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .company-box {
            background: #ffffffff;
            padding: 56px 42px;
            border-radius: 16px;
            min-width: 280px;
            min-height: 168px;
            font-weight: 600;
            font-size: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .company-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px #898b8fff;
        }

        html::-webkit-scrollbar,
        body::-webkit-scrollbar,
        .lenis::-webkit-scrollbar {
            width: 0px;
            background: transparent;
        }


        html,
        body,
        .lenis {
            -ms-overflow-style: none;
        }


        html,
        body,
        .lenis {
            scrollbar-width: none;
        }

        .freelancer-hero-section {
            background: #F7F5F2 !important;
            /*  padding: 100px 0; */
            position: relative;
            overflow: hidden;
        }

        .freelancer-hero-content {
            padding-right: 30px;
        }

        .freelancer-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 30px;
        }

        .freelancer-tag {
            background-image: linear-gradient(65deg, #003f3a 0%, #222121ff 100%);
            padding: 5px 10px;
            border-radius: 6px;
            font-size: 10px;
            font-weight: 500;
            backdrop-filter: blur(8px);
            display: inline-block;
            color: #ffffff;
            /* text color for better contrast */
        }

        .freelancer-title {
            font-size: 3.5rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 40px;
            color: #024e48ff;

        }

        .freelancer-title .highlight {
            font-style: italic;
            color: #fff;
            position: relative;
        }

        .freelancer-features {
            margin-bottom: 50px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            gap: 15px;
        }

        .feature-icon {
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .feature-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .feature-text {
            font-size: 16px;
            color: #000000ff;
            line-height: 1.5;
        }

        .freelancer-buttons {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .freelancer-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 15px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .btn-icon {
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .freelancer-animation {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .animation-placeholder {
            width: 100%;
            max-width: 500px;
            height: 400px;
            background: rgba(61, 9, 9, 0.05);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
        }

        .lottie-animation {
            width: 100%;
            height: 100%;
        }


        @media (max-width: 991px) {
            .freelancer-hero-section {
                padding: 80px 0;
            }

            .freelancer-hero-content {
                padding-right: 0;
                text-align: center;
                margin-bottom: 50px;
            }

            .freelancer-title {
                font-size: 2.5rem;
            }

            .freelancer-buttons {
                justify-content: center;
            }

            .feature-item {
                justify-content: center;
            }
        }

        @media (max-width: 768px) {
            .freelancer-title {
                font-size: 2rem;
            }

            .freelancer-buttons {
                flex-direction: column;
                align-items: center;
            }

            .freelancer-btn {
                width: 100%;
                max-width: 300px;
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            .freelancer-hero-section {
                padding: 60px 0;
            }

            .freelancer-title {
                font-size: 1.8rem;
            }

            .freelancer-tags {
                justify-content: center;
            }
        }

        body,
        html {
            background: #ffffff !important;
            color: #000000 !important;
        }

        /* body {
            background-color: #ffffffff;
            color: #fff;
            line-height: 1.6;
        } */

        .expertise .hero {
            max-width: 1200px;
            margin: 0 auto;
        }

        .expertise .header {
            text-align: center;
            margin-bottom: 60px;
        }

        .h2.white {
            color: #fff;
            font-size: 48px;
            font-weight: 700;
            line-height: 1.2;
        }

        .h2-italicize {
            font-style: italic;
        }

        .freelances-group {
            margin-top: 40px;
        }

        .tabs-menu-freelance {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 40px;
        }

        .grid-4 {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 24px;
        }


        .profile-header {
            height: 200px;
            overflow: hidden;
        }

        .image-126 {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-body {
            padding: 24px;
        }

        .profiles-infos {
            margin-bottom: 24px;
        }

        .tag {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            margin-right: 8px;
            margin-bottom: 8px;
        }

        .sector_profile.white {
            color: #fff;
            font-size: 14px;
            font-weight: 500;
        }

        .skills-profil {
            display: flex;
            flex-wrap: wrap;
            margin-top: 12px;
        }

        .div_logo_profile {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .previously_profile.white {
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
            margin-bottom: 12px;
        }

        .box-logo-profile {
            height: 40px;
            display: flex;
            align-items: center;
        }

        .logo_profile {
            max-height: 30px;
            max-width: 120px;
            filter: brightness(0) invert(1);
        }

        .logo_profile_custom {
            max-height: 30px;
            max-width: 120px;
            display: block;
            margin: 5px 0;
            object-fit: contain;
        }


        .tabs-content-2 {
            position: relative;
        }

        .w-tab-pane {
            display: none;
        }

        .w-tab-pane.w--tab-active {
            display: block;
        }


        @media (max-width: 768px) {
            .h2.white {
                font-size: 36px;
            }

            .tabs-menu-freelance {
                gap: 8px;
            }

            .tab-link {
                padding: 10px 16px;
                font-size: 14px;
            }

            .grid-4 {
                grid-template-columns: 1fr;
            }
        }

        .client-references {
            padding: 20px 0;
            color: #fff;
        }

        .reference-heading {
            font-size: 15px;
            font-weight: 400;
        }

        .marquee-area {
            position: relative;
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
        }

        .marquee-track {
            display: flex;
            gap: 40px;
            animation: scrollMarquee 30s linear infinite;
        }

        .marquee-item {
            font-size: 14px;
            font-weight: 500;
            white-space: nowrap;
        }


        .marquee-area:hover .marquee-track {
            animation-play-state: paused;
        }

        @keyframes scrollMarquee {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .tabs-menu-freelance {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #ccc;
            padding: 0 10px;
            margin-bottom: 10px;
        }


        .w-tab-menu .w-tab-link {
            border: none !important;
            border-radius: 0 !important;
            background: none !important;
            padding: 10px 0;
            text-align: center;
            flex: 1;
            position: relative;
            font-size: 16px;
            color: #000;
        }


        .w-tab-link.w--current::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 2px;
            background: #000;
        }


        .w-tab-link.w--current div {
            font-style: italic;
            color: #000;
        }


        .playfair-display {
            font-family: "Playfair Display", serif;
            font-optical-sizing: auto;
            font-weight: weight;
            font-style: normal;
        }



        body {
            font-family: "Playfair Display", lato !important;
        }

        .playfair-display a {
            font-family: 'Playfair Display', serif;
        }

        .playfair-display,
        .playfair-display {
            font-family: "Playfair Display", lato;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: italic;
            font-size: 14px;
        }

        #demoFormOverlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(180, 175, 175, 0.5);
            backdrop-filter: blur(5px);
            display: none;
            z-index: 9998;
        }

        #demoFormContainer {
            position: fixed;
            top: 0;
            right: -50%;
            /*  width: 50%; */
            height: 100%;
            background: #fff;
            box-shadow: -3px 0 15px rgba(0, 0, 0, 0.3);
            transition: right 0.4s ease;
            z-index: 9999;
            padding: 40px 30px;
            overflow-y: auto;
        }

        #demoFormOverlay.active {
            display: block;
        }

        #demoFormContainer.active {
            right: 0;
        }

        #demoFormContainer h3 {
            margin-bottom: 20px;
            font-family: 'Playfair Display', serif;
        }

        #closeForm {
            font-size: 30px;
            cursor: pointer;
            align-self: flex-end;
            margin-bottom: 20px;
            color: #333;
            transition: transform 0.2s ease;
        }

        #closeForm:hover {
            transform: rotate(180deg);
        }



        .filter-menu.style2 .th-btn.th-border {
            background: linear-gradient(65deg, #003f3a 0%, #000000 100%) !important;
            color: #ffffff !important;
            border: 2px solid #003f3a !important;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            margin: 5px;
        }

        .filter-menu.style2 .th-btn.th-border:hover {
            background: linear-gradient(65deg, #4a6b66 0%, #000000 100%) !important;
            color: #ffffff !important;
            border-color: #4a6b66 !important;
            cursor: pointer;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 63, 58, 0.3);
        }

        .filter-menu.style2 .th-btn.th-border.active,
        .filter-menu.style2 .th-btns.th-border.active {
            background: linear-gradient(65deg, #ffffff 0%, #f0f0f0 100%) !important;
            color: #003f3a !important;
            border: 2px solid #003f3a !important;
            font-weight: 700 !important;
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(0, 63, 58, 0.4) !important;
        }

        .filter-menu.style2 .th-btn.th-border.active:hover,
        .filter-menu.style2 .th-btns.th-border.active:hover {
            background: linear-gradient(65deg, #f8f8f8 0%, #e8e8e8 100%) !important;
            color:rgb(255, 255, 255) !important;
            border-color: #003f3a !important;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 63, 58, 0.5) !important;
        }

        /* Blog & News Read More button styling */
        .blog-card .th-btns.black-border {
            background: linear-gradient(65deg, #003f3a 0%, #000000 100%) !important;
            color: #ffffff !important;
            border: 2px solid #003f3a !important;
            padding: 8px 20px !important;
            border-radius: 25px !important;
            text-decoration: none !important;
            font-weight: 500 !important;
            transition: all 0.3s ease !important;
            display: inline-block !important;
            white-space: nowrap !important;
        }

        .blog-card .th-btns.black-border:hover {
            background: linear-gradient(65deg, #4a6b66 0%, #000000 100%) !important;
            color: #ffffff !important;
            border-color: #4a6b66 !important;
            transform: translateY(-1px) !important;
            box-shadow: 0 4px 12px rgba(0, 63, 58, 0.3) !important;
        }

        /* Apply same styling to all buttons on home page */
        .th-btns.black-border {
            background: linear-gradient(65deg, #003f3a 0%, #000000 100%) !important;
            color: #ffffff !important;
            border: 2px solid #003f3a !important;
            padding: 8px 20px !important;
            border-radius: 25px !important;
            text-decoration: none !important;
            font-weight: 500 !important;
            transition: all 0.3s ease !important;
            display: inline-block !important;
            white-space: nowrap !important;
        }

        .th-btns.black-border:hover {
            background: linear-gradient(65deg, #4a6b66 0%, #000000 100%) !important;
            color: #ffffff !important;
            border-color: #4a6b66 !important;
            transform: translateY(-1px) !important;
            box-shadow: 0 4px 12px rgba(0, 63, 58, 0.3) !important;
        }

        /* Additional styling for box-wrapp layout */
        .blog-card .box-wrapp {
            display: flex !important;
            justify-content: space-between !important;
            align-items: center !important;
            flex-wrap: wrap !important;
            gap: 10px !important;
            margin-top: 15px !important;
        }

        /* Consistent spacing for all sections */
        /*  section,
        .text-custom[id] {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
            padding-top: 1rem !important;
            padding-bottom: 1rem !important;
        } */

        /* Heading styles for consistency */
        .title-area h2,
        .title-area h4,
        .title-area h5 {
            font-size: 22px !important;
            margin-bottom: 15px !important;
        }

        .title-area span {
            display: block;
            margin-bottom: 10px;
        }

        /* Service section spacing */
        #service-sec {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }

        /* Project section spacing */
        /*  #projects {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        } */

        /* Blog section spacing */
        #blog {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }

        /* Experts section spacing */
        #experts {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }

        /* Customers section spacing */
        #customers-sec {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }

        /* Community section spacing */
        #community {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }

        /* Contact section spacing */
        #contact-us {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }

        /* Testimonials section spacing */
        #testimonials {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }

        /* Instagram section spacing */
        #instagram {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }

        /* Gallery section spacing */
        #gallery {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }

        /* Freelancer tags styling for uniform rounded borders */
        .freelancer-tag {
            display: inline-block !important;
            padding: 8px 16px !important;
            background-color: #003f3a !important;
            color: white !important;
            border-radius: 25px !important;
            margin: 0 5px 10px 5px !important;
            font-size: 14px !important;
            text-align: center !important;
            border: 1px solid #003f3a !important;
            transition: all 0.3s ease !important;
        }

        .freelancer-tag:hover {
            background-color: #4a6b66 !important;
            border-color: #4a6b66 !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 4px 8px rgba(0, 63, 58, 0.2) !important;
        }

        /* Global spacing for all sections */
        .container,
        .th-container4 {
            padding-left: 16px !important;
            padding-right: 16px !important;
            max-width: 1320px !important;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        /* Vertical spacing for all sections */
        section,
        .text-custom[id] {
            padding-top: 48px !important;
            padding-bottom: 48px !important;
        }

        /* Responsive horizontal padding */
        @media (min-width: 768px) {

            .container,
            .th-container4 {
                padding-left: 24px !important;
                padding-right: 24px !important;
            }
        }

        /* @media (min-width: 1024px) {
            .container,
            .th-container4 {
                padding-left: 40px !important;
                padding-right: 40px !important;
            }
        } */

        /* Responsive vertical spacing */
        /* @media (min-width: 768px) {
            section,
            .text-custom[id] {
                padding-top: 64px !important;
                padding-bottom: 64px !important;
            }
        } */

        /* @media (min-width: 1024px) {
            section,
            .text-custom[id] {
                padding-top: 80px !important;
                padding-bottom: 80px !important;
            }
        } */
    </style>

    <script>
        // Fix for the getTotalLength error in main.js
        // Ensure SVG path exists before trying to manipulate it
        document.addEventListener('DOMContentLoaded', function() {
            // Safe way to handle the scroll-top functionality
            var scrollTopElement = document.querySelector('.scroll-top');
            if (scrollTopElement) {
                // Make sure element is visible after DOM loads
                scrollTopElement.style.display = 'block';

                var pathElement = scrollTopElement.querySelector('path');

                if (pathElement && typeof pathElement.getTotalLength === 'function') {
                    try {
                        var pathLength = pathElement.getTotalLength();
                        pathElement.style.strokeDasharray = pathLength + ' ' + pathLength;
                        pathElement.style.strokeDashoffset = pathLength;
                    } catch (e) {
                        console.warn('Could not calculate SVG path length:', e.message);
                    }
                }

                // Add scroll event listener with null checks
                window.addEventListener('scroll', function() {
                    var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                    if (scrollTopElement) {
                        if (scrollTop > 50) {
                            scrollTopElement.classList.add('show');
                        } else {
                            scrollTopElement.classList.remove('show');
                        }

                        // Update SVG path if it exists
                        var pathElement = scrollTopElement.querySelector('path');
                        if (pathElement && typeof pathElement.getTotalLength === 'function') {
                            try {
                                var docHeight = document.documentElement.scrollHeight - window.innerHeight;
                                var pathLength = pathElement.getTotalLength();
                                var offset = pathLength - (scrollTop * pathLength / docHeight);
                                pathElement.style.strokeDashoffset = offset;
                            } catch (e) {
                                console.warn('Could not update SVG path:', e.message);
                            }
                        }
                    }
                });

                // Add click handler for scroll to top with null check
                if (scrollTopElement) {
                    scrollTopElement.addEventListener('click', function(e) {
                        e.preventDefault();
                        window.scrollTo({
                            top: 0,
                            behavior: 'smooth'
                        });
                    });
                }
            }
        });
    </script>

    @stack('styles')
    @stack('scripts')

</body>

</html>
