<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>H24 Renovation</title>
    <meta name="author" content="themeholy">
    <meta name="description" content="Faren   - Architecture & Interior Design Template">
    <meta name="keywords" content="Faren   - Architecture & Interior Design Template">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/img/favicons/') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/img/favicons/') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/img/favicons/') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/favicons/') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/img/favicons/') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/img/favicons/') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/img/favicons/') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/img/favicons/') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/img/favicons/') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/favicons/') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/H24.svg') }}">
    <link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/') }}">
    <meta name="theme-color" content="#ffffff">
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

<body class="body-dark show-grid" id="show-grid">


    <header class="th-header header-layout3 onepage-nav text-dark">
        <div class="sticky-wrapper">
            <div class="container th-container4">
                <div class="menu-area">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <div class="header-logo"><a href="{{ url('/') }}"><img src="{{ asset('assets/img/H24.svg') }}" alt="H24 Renovation"></a></div>
                        </div>
                        <div class="col-auto">
                            <nav class="main-menu d-none d-lg-inline-block">
                                <ul>
                                    <li>
                                        <a href="#hero-sec" style="font-size: 16px;">Home</a>
                                    </li>

                                    <li><a href="#about-title">About Us</a></li>
                                    <li><a href="#service-sec">Services</a></li>
                                    <li><a href="#project-sec">Projects</a></li>
                                    <li><a href="#blog-sec">Blog</a></li>
                                    <li><a href="#experts-sec" class="link-experts">Experts</a></li>
                                    <li><a href="#customers-sec" class="link-customers">Customers</a></li>
                                    <li><a href="#community-sec" class="link-community">Community</a></li>
                                    <li><a href="#contact-sec">Contact Us</a></li>
                                    <li><a href="#instagram-sec">Instagram</a></li>
                                    <li><a href="#gallery-sec">Gallery</a></li>
                                    @auth
                                    <li class="menu-item-has-children" id="user-dropdown">
                                        <a href="javascript:void(0)" style="display: flex; align-items: center; padding: 10px;" onclick="toggleDropdown()">
                                            <i class="fas fa-user" style="font-size: 18px;"></i>
                                        </a>
                                        <ul class="sub-menu" id="user-dropdown-menu" style="display: none;">
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
                        </div>
                        <div class="col-auto">
                            <!-- Empty column to balance layout -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <main>
        @yield('content')
    </main>


    <footer class="footer-wrapper footer-layout3 playfair-display">
        <div class="widget-area">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-xl-3">
                        <div class="widget footer-widget">
                            <div class="th-widget-about">
                                <div class="about-logo"><a href="{{ url('/') }}"><img src="{{ asset('assets/img/H24.svg') }}" alt="Faren  "></a></div>
                                <p class="about-text text-custom">Welcome to Mes Bâtisseurs, your trusted partner for all your renovation and construction projects. We transform your ideas into reality with expertise and passion.</p>
                                <div class="th-social">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fab fa-youtube"></i></a>
                                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                                </div>
                                <br>
                                <br>
                                <div style="max-width:1200px; margin:0 auto; display:flex; flex-wrap:wrap; justify-content:space-between; gap:20px;">

                                    <div style="display:flex; flex-direction:column; gap:10px; border:1px solid #fff; padding:15px 20px; border-radius:8px; transition:0.3s;"
                                        onmouseover="this.style.background='#fafafaff'; this.style.transform='translateY(-2px)';"
                                        onmouseout="this.style.background='transparent'; this.style.transform='translateY(0)';">

                                        <a href="https://mesbatisseurs.fr/politiques/"
                                            style="color:#fff; text-decoration:none; font-size:14px;">Privacy Policy</a>

                                        <a href="https://mesbatisseurs.fr/conditions-2/"
                                            style="color:#fff; text-decoration:none; font-size:14px;">General Terms and Conditions</a>

                                        <a href="https://mesbatisseurs.fr/legales/"
                                            style="color:#fff; text-decoration:none; font-size:14px;">Legal Notices</a>

                                        <a href="#"
                                            style="color:#fff; text-decoration:none; font-size:14px;">FAQ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu  footer-widget">
                            <h3 class="widget_title text-custom">About Us</h3>
                            <div class="menu-all-pages-container text-custom">
                                <ul class="menu">
                                    <li><a href="about.html" class="text-custom">About Us</a></li>
                                    <li><a href="service.html" class="text-custom">All Services</a></li>
                                    <li><a href="team.html" class="text-custom">Our Team Leaders</a></li>
                                    <li><a href="contact.html" class="text-custom">Rquest a Visit</a></li>
                                    <li><a href="pricing.html" class="text-custom">Our Pricing Plan</a></li>
                                    <li><a href="faq.html" class="text-custom">FAQ</a></li>
                                    <li><a href="contact.html" class="text-custom">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title text-custom">Our Projects</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu text-custom">
                                    <li><a href="project.html" class="text-custom">All Projects</a></li>
                                    <li><a href="contact.html" class="text-custom">Residential Space</a></li>
                                    <li><a href="contact.html" class="text-custom">Multipurpose</a></li>
                                    <li><a href="contact.html" class="text-custom">Commercial Space</a></li>
                                    <li><a href="contact.html" class="text-custom">Minimalism</a></li>
                                    <li><a href="contact.html" class="text-custom">Urbanism</a></li>
                                    <li><a href="contact.html" class="text-custom">Villa Cabin</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <h3 class="widget_title text-custom">Get In Touch</h3>
                            <div class="th-widget-about style2">
                                <p class="footer-info text-custom">221 Rue LaFayette, 75010 Paris</p>
                                <p class="footer-info"><span><a class="text-inherit d-block" href="tel:+01234567890">01 80 20 92 78</a></span></p>
                                <p class="footer-info"><span><a class="text-inherit" href="mailto:contact@mesbatisseurs.fr">contact@mesbatisseurs.fr</a></span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-9">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-lg-6">
                                <div class="copyright-wrap">
                                    <p class="text-custom">Copyright, H24 RENOVATION. All Rights Reserved.</p>
                                </div>
                            </div>
                            <div class="col-lg-6 text-center text-lg-end">
                                <div class="footer-links">
                                    <ul>
                                        <li><a href="about.html">Terms of service</a></li>
                                        <li><a href="about.html">Privacy policy</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </footer>


    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

    <script src="assets/js/vendor/jquery-3.7.1.min.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/circle-progress.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/nice-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/threesixty.min.js"></script>
    <script src="assets/js/panolens.min.js"></script>
    <script src="assets/js/gsap.min.js"></script>
    <script src="assets/js/ScrollTrigger.min.js"></script>
    <script src="assets/js/SplitText.js"></script>
    <script src="assets/js/SplitType.js"></script>
    <script src="assets/js/lenis.min.js"></script>
    <script src="assets/js/CustomEase.min.js"></script>
    <script src="assets/js/main.js"></script>

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

        // Open Form
        demoBtn.addEventListener('click', () => {
            demoFormOverlay.classList.add('active');
            demoFormContainer.classList.add('active');
        });

        // Close Form
        closeForm.addEventListener('click', () => {
            demoFormContainer.classList.remove('active');
            demoFormOverlay.classList.remove('active');
        });

        // Close when clicking outside the form
        demoFormOverlay.addEventListener('click', (e) => {
            if (e.target === demoFormOverlay) {
                demoFormContainer.classList.remove('active');
                demoFormOverlay.classList.remove('active');
            }
        });



        const tabs = document.querySelectorAll('.tab-link');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
            });
        });

        function fadeInElements() {
            const elements = document.querySelectorAll('.fade-in');
            const inViewport = (el) => el.getBoundingClientRect().top <= window.innerHeight * 0.8;
            const handleScroll = () => elements.forEach(el => {
                if (inViewport(el)) el.classList.add('visible');
            });
            window.addEventListener('scroll', handleScroll);
            handleScroll();
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
                mask.addEventListener('mouseenter', () => el.style.animationPlayState = 'paused');
                mask.addEventListener('mouseleave', () => el.style.animationPlayState = 'running');
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
                if (!el) return;

                const companies = el.children;
                const companyHeight = companies[0].offsetHeight;
                let currentIndex = 0;

                el.style.transform = `translateY(0)`;


                setInterval(() => {
                    currentIndex = (currentIndex + 1) % companies.length;
                    el.style.transform = `translateY(-${currentIndex * companyHeight}px)`;
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

            tabLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();


                    tabLinks.forEach(tab => tab.classList.remove('w--current'));
                    tabPanes.forEach(pane => pane.classList.remove('w--tab-active'));


                    this.classList.add('w--current');


                    const tabId = this.getAttribute('data-w-tab');


                    tabPanes.forEach(pane => {
                        if (pane.getAttribute('data-w-tab') === tabId) {
                            pane.classList.add('w--tab-active');
                        }
                    });
                });
            });
        });


        document.addEventListener('DOMContentLoaded', function() {

            console.log('Freelancer section loaded');


            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });


        const companies = ["Airbus", "Renault", "Accor", "Vinci", "Google", "Microsoft", "Tesla", "Amazon"];


        const boxes = document.querySelectorAll(".company-box");

        let indices = [0, 1, 2, 3];

        function changeCompanies() {
            boxes.forEach((box, i) => {
                indices[i] = (indices[i] + 1) % companies.length;
                box.textContent = companies[indices[i]];
            });
        }


        setInterval(changeCompanies, 2000);




        document.addEventListener("contextmenu", function(e) {
            e.stopPropagation();

        }, true);


        document.oncontextmenu = null;
        window.oncontextmenu = null;
    </script>

    <script>
        function toggleDropdown() {
            var dropdownMenu = document.getElementById('user-dropdown-menu');
            if (dropdownMenu.style.display === 'none') {
                dropdownMenu.style.display = 'block';
            } else {
                dropdownMenu.style.display = 'none';
            }
        }


        document.addEventListener('click', function(event) {
            var dropdown = document.getElementById('user-dropdown');
            if (dropdown && !dropdown.contains(event.target)) {
                document.getElementById('user-dropdown-menu').style.display = 'none';
            }
        });
    </script>




    <style>
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
            color: rgba(0, 63, 58, var(--tw-text-opacity)) !important;
            font-family: 'Playfair Display', serif !important;
            font-style: italic !important;
        }

        /* Override text-custom for project titles to prevent wrapping */
        .gallery-row .project-item .box-title.text-custom {
            font-style: normal !important;
            white-space: nowrap !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
        }

        .footer-wrapper,
        .footer-wrapper .widget-area {
            background: #ffffff !important;
        }

        .footer-wrapper,
        .footer-wrapper p,
        .footer-wrapper span,
        .footer-wrapper li,
        .footer-wrapper a,
        .footer-wrapper h3 {
            color: #000000 !important;
        }

        .footer-wrapper .th-social i {
            color: #000000 !important;
        }

        .footer-wrapper .copyright-text {
            color: #000000 !important;
        }

        .footer-wrapper div[style*="border"] {
            border-color: #000000 !important;
        }

        .th-header,
        .th-header .sticky-wrapper,
        .th-header .menu-area {
            background: #ffffff !important;
        }

        .th-header .main-menu ul li a {
            color: rgba(0, 63, 58, var(--tw-text-opacity)) !important;
            font-family: 'Playfair Display', serif;
        }

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
            padding: 40px 30px;
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
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 15px;
            color: rgba(0, 63, 58, var(--tw-text-opacity)) !important;
        }

        .service-description {
            font-size: 17px;
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
            padding: 10px 15px;
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

        .menu-area .row {
            display: flex;
            align-items: center;
            min-height: 80px;
            height: 80px;
        }

        .header-logo {
            display: flex;
            align-items: center;
            height: 80px;
            padding: 10px 0;
        }

        .main-menu {
            display: flex;
            align-items: center;
            height: 80px;
        }

        .th-header .container {
            display: flex;
            align-items: center;
            height: 80px;
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

        .main-menu ul {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 15px;
        }

        .main-menu ul li {
            position: relative;
            margin: 0;
            padding: 0;
        }

        .main-menu ul li a {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif !important;
            font-weight: 400;
            text-transform: none;
            letter-spacing: 0.5px;
            color: #000 !important;
            transition: color 0.3s ease;
            font-size: 16px;
            text-decoration: none;
            padding: 10px 8px;
            position: relative;
            display: block;
        }

        .main-menu ul li a:hover {
            color: #898b8fff !important;
        }

        /* Underline effect on hover */
        .main-menu ul li a::after {
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

        .main-menu ul li a:hover::after {
            width: 100%;
        }

        /* Mobile menu styles */
        .main-menu.d-lg-inline-block {
            display: block !important;
        }

        @media (min-width: 992px) {
            .main-menu.d-lg-inline-block {
                display: flex !important;
            }
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Playfair Display", serif;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #fff;
            margin-bottom: 20px;
            font-size: 13.5px;
        }

        .sub-title,
        .h2-subtitle {
            font-weight: 500;
            text-transform: none;
            color: rgba(255, 255, 255, 0.7);
            font-size: 13.5px;
            margin-bottom: 10px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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
            background: #ffffff !important;
            padding: 100px 0;
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


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: #ffffffff;
            color: #fff;
            line-height: 1.6;
        }

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
            font-size: 16px;
            font-weight: 600;
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
            width: 50%;
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

        #demoFormContainer input,
        #demoFormContainer textarea {
            width: 100%;
            margin-bottom: 15px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        #demoFormContainer textarea {
            resize: vertical;
            min-height: 100px;
        }

        #demoFormContainer button {
            width: 100%;
            padding: 12px;
            border: none;
            background: #114135ff;
            color: #fff;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        #demoFormContainer button:hover {
            background: #484d4aff;
        }

        @media (max-width: 768px) {
            #demoFormContainer {
                width: 100%;
                right: -100%;
            }
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
            color: #003f3a !important;
            border-color: #003f3a !important;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 63, 58, 0.5) !important;
        }

        /* Project filter styles */
        .filter-active {
            transition: all 0.6s ease;
        }

        .filter-item {
            transition: all 0.6s ease;
            opacity: 1;
            transform: scale(1);
        }

        .filter-item.isotope-hidden {
            opacity: 0;
            transform: scale(0.8);
            pointer-events: none;
        }

        /* Project item title alignment and layout - Enhanced specificity */
        .gallery-row .project-item {
            margin-bottom: 30px !important;
            width: 100% !important;
            display: flex !important;
            flex-direction: column !important;
            border: 1px solid transparent; /* For debugging */
        }

        .gallery-row .project-item .project-item_wrapp {
            display: flex !important;
            gap: 15px !important;
            margin-bottom: 20px !important;
            flex-wrap: wrap !important;
        }

        .gallery-row .project-item .project-content {
            padding: 20px 0 !important;
            flex: 1 !important;
            width: 100% !important;
        }

        .gallery-row .project-item .box-title,
        .gallery-row .project-item h2.box-title,
        .gallery-row .project-item .box-title.text-custom {
            white-space: nowrap !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
            margin-bottom: 15px !important;
            font-size: 24px !important;
            font-weight: 600 !important;
            line-height: 1.2 !important;
            display: block !important;
            width: 100% !important;
            max-width: 100% !important;
            word-wrap: normal !important;
            word-break: normal !important;
            font-style: normal !important;
            text-align: left !important;
        }

        .gallery-row .project-item .box-text {
            margin-bottom: 20px !important;
            line-height: 1.6 !important;
        }

        /* Responsive adjustments for project titles */
        @media (max-width: 768px) {
            .gallery-row .project-item .box-title,
            .gallery-row .project-item h2.box-title,
            .gallery-row .project-item .box-title.text-custom {
                font-size: 20px !important;
                white-space: normal !important;
                overflow: visible !important;
                text-overflow: unset !important;
            }
        }

        @media (max-width: 480px) {
            .gallery-row .project-item .box-title,
            .gallery-row .project-item h2.box-title,
            .gallery-row .project-item .box-title.text-custom {
                font-size: 18px !important;
            }
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
        section,
        .text-custom[id] {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
            padding-top: 1rem !important;
            padding-bottom: 1rem !important;
        }

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
        #project-sec {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }

        /* Blog section spacing */
        #blog-sec {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }

        /* Experts section spacing */
        #experts-sec {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }

        /* Customers section spacing */
        #customers-sec {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }

        /* Community section spacing */
        #community-sec {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }

        /* Contact section spacing */
        #contact-sec {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }

        /* Testimonials section spacing */
        #testi-sec {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }

        /* Instagram section spacing */
        #instagram-sec {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }

        /* Gallery section spacing */
        #gallery-sec {
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

        @media (min-width: 1024px) {
            .container,
            .th-container4 {
                padding-left: 40px !important;
                padding-right: 40px !important;
            }
        }

        /* Responsive vertical spacing */
        @media (min-width: 768px) {
            section,
            .text-custom[id] {
                padding-top: 64px !important;
                padding-bottom: 64px !important;
            }
        }

        @media (min-width: 1024px) {
            section,
            .text-custom[id] {
                padding-top: 80px !important;
                padding-bottom: 80px !important;
            }
        }
    </style>

</body>

</html>
