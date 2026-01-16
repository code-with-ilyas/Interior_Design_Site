@extends('layouts.master')

@section('content')

<section class="freelancer-hero-section" id="hero-sec">
  <div class="container">
    <div class="row align-items-center" style="margin-top: 5px;">
      <div class="col-lg-6">
        <div class="freelancer-hero-content">
          <div class="freelancer-tags">
            <span class="freelancer-tag playfair-display text-white">IA</span>
            <span class="freelancer-tag playfair-display text-white">Data</span>
            <span class="freelancer-tag playfair-display text-white">Cloud</span>
            <span class="freelancer-tag playfair-display text-white">Cyber</span>
            <span class="freelancer-tag playfair-display text-white">IT</span>
            <span class="freelancer-tag playfair-display text-white">Digital</span>
          </div>
          <h1 class="freelancer-title playfair-display" style="font-size: 45px;">H24 RENOVATION</h1>
          <div class="freelancer-features">
            <div class="feature-item">
              <div class="feature-icon">
                <i class="fas fa-check-circle" style="font-size: 24px; color: #003f3a;"></i>
              </div>
              <span class="feature-text playfair-display">A rigorous selection methodology.</span>
            </div>
            <div class="feature-item">
              <div class="feature-icon">
                <i class="fas fa-th-large" style="font-size: 24px; color: #003f3a;"></i>
              </div>
              <span class="feature-text playfair-display">A single platform to manage your business.</span>
            </div>
            <div class="feature-item">
              <div class="feature-icon">
                <i class="fas fa-gift" style="font-size: 24px; color: #003f3a;"></i>
              </div>
              <span class="feature-text playfair-display">Offers to suit all your needs.</span>
            </div>
          </div>
          <div class="">


            <a href="{{ route('renovate') }}"
              class="th-btns black-border playfair-display" style="display:inline-block; text-decoration:none;">
              I Want to Renovate a Property
            </a>



            <a href="javascript:void(0);" id="demoBtn" class="th-btns black-border playfair-display" style="display:inline-block; text-decoration:none;">
              Request a Demo
            </a>


            <div id="demoFormOverlay" class="playfair-display">
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
             font-style: italic;
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
            font-style: italic;
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
             font-style: italic;
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


<section class="client-reference">
  <div class="reference-heading text-center mb-20 playfair-display">
    Referenced by most <span class="text-span-5 playfair-display text-primary ">CAC40 </span> and <span class="text-span-6 playfair-display text-primary">SBF120</span> companies </div>

  <div class="marquee-area overflow-hidden ">
    <div class="marquee-track flex ">
      <div class="marquee-item playfair-display">L'Oréal</div>
      <div class="marquee-item playfair-display">Etam</div>
      <div class="marquee-item playfair-display">Sodexo</div>
      <div class="marquee-item playfair-display">Renault</div>
      <div class="marquee-item playfair-display">LVMH</div>
      <div class="marquee-item playfair-display">Chanel</div>
      <div class="marquee-item playfair-display">BNP Paribas</div>
      <div class="marquee-item playfair-display">Air Liquide</div>
      <div class="marquee-item playfair-display">Estee Lauder</div>
      <div class="marquee-item playfair-display">La Poste</div>
      <div class="marquee-item playfair-display">Credit Agricole</div>
      <div class="marquee-item playfair-display">BPCE</div>
      <div class="marquee-item playfair-display">Kering</div>
      <div class="marquee-item playfair-display">Engie</div>
      <div class="marquee-item playfair-display">Leroy Merlin</div>
      <div class="marquee-item playfair-display">L'Oréal</div>
      <div class="marquee-item playfair-display">Etam</div>
      <div class="marquee-item playfair-display">Sodexo</div>
      <div class="marquee-item playfair-display">Renault</div>
      <div class="marquee-item playfair-display">LVMH</div>
      <div class="marquee-item playfair-display">Chanel</div>
      <div class="marquee-item playfair-display">BNP Paribas</div>
      <div class="marquee-item playfair-display">Air Liquide</div>



    </div>
  </div>
</section>

<br>
<br>
<br>

<h5 id="about-title" class="text-custom" style="text-align: center; scroll-margin-top: 100px; font-size: 14px; color:#000000;">
  {{ $about?->name ?? 'About Us' }}
</h5>
<br>
<div style="display: flex; align-items: flex-start; justify-content: center; max-width: 1200px; margin: auto; gap: 40px; flex-wrap: wrap;">


  <div style="flex: 1; min-width: 350px;">
    <img
      src="{{ $about?->image ? Storage::url($about->image) : 'https://mesbatisseurs.fr/wp-content/uploads/2024/08/WhatsApp-Image-2024-08-21-at-15.28.33.jpeg' }}"
      alt="{{ $about?->name ?? 'About Image' }}"
      style="width: 100%; height: 500px; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.15);">
  </div>

  <div style="flex: 1; min-width: 350px; display: flex; flex-direction: column; justify-content: flex-start;">
    <p style="font-size: 16px; line-height: 1.7; color: #000000ff;" class="text-custom">
      {!! $about?->description ?? 'At <strong>Mes Batisseurs</strong>, our passion lies in transforming spaces into true havens of peace...' !!}
    </p>
  </div>

</div>
</section>

<br>
<br>
<br>


<div class="text-custom" id="service-sec">
  <div class="services-header">
    <h5 class="text-primary">Our services</h5>
    <h4 class="text-custom" style="font-size: 20px;">Support for all your transformation challenges</h4>
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
    <div class="services-row">
      @foreach($row as $service)
      <div class="service-column">
        <div class="service-card">
          <h5 class="service-title text-custom">{{ $service->service_title ?? $service['service_title'] }}</h5>
          <div class="service-description text-custom">{{ $service->service_description ?? $service['service_description'] }}</div>
        </div>
      </div>
      @endforeach
    </div>
    <br><br>
    @endforeach
  </div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<section class="project-area position-relative space-bottom playfair-display" id="project-sec">
  <div class="container text-center">

    <h5 style="font-size: 22px; margin-bottom: 14px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px;" class="text-custom">Our Projects</h5>


    <p class="text-custom" style="font-size: 20px; line-height: 1.4; margin-bottom: 10px; font-weight: normal;">Complete Solutions for Your Outdoor Projects</p>


    <p class="text-custom" style="font-size: 16px; line-height: 1.6; margin-bottom: 20px; font-weight: normal; opacity: 0.8;">Discover how we can transform your outdoor space with our specialist landscaping and construction services.</p>


    <div class="col-xl-6 mx-auto">
      <div class="filter-menu style2 filter-menu-active">
        <button data-filter="*" class="th-btns th-border active text-white" type="button">View All</button>
        <button data-filter=".cat1" class="th-btns th-border text-white" type="button">Residential</button>
        <button data-filter=".cat2" class="th-btns th-border text-white" type="button">Commercial</button>
        <button data-filter=".cat3" class="th-btns th-border text-white" type="button">Multipurpose</button>
      </div>
    </div>
  </div>


  <div class="container">
    <div class="row gallery-row filter-active mt-4">

      <div class="col-12 project-item filter-item cat2 cat3">
        <div class="project-item-container d-flex" style="gap: 30px; align-items: center;">
          <div class="project-item_wrapp d-flex" style="flex: 1; gap: 30px; align-items: center;">
            <div class="box-img global-img" style="flex: 1; max-width: 48%;">
              <img src="assets/img/project/project_3_1.jpg" alt="project image" style="width: 100%; height: auto; border-radius: 8px;">
            </div>
            <div class="box-img global-img" style="flex: 1; max-width: 48%;">
              <img src="assets/img/project/project_3_2.jpg" alt="project image" style="width: 100%; height: auto; border-radius: 8px;">
            </div>
          </div>
          <div class="project-content" style="flex: 0 0 300px;">
            <h2 class="box-title text-custom" style="font-size: 28px; font-weight: 600; margin: 0 0 15px; color: #000;">Minimalist Interior Design</h2>
            <p class="box-text text-custom" style="font-size: 16px; line-height: 1.6; margin-bottom: 20px;">Minimalist & Luxury Interiors combine the clean simplicity of minimalism with the refined elegance of luxury design. This style is perfect for those.</p>
            <a href="{{ route('project1') }}" class="th-btns black-border" style="display: inline-block; text-decoration: none;">
              Read More
            </a>
          </div>
        </div>
      </div>

      <div class="col-12 project-item filter-item cat2 cat1">
        <div class="project-item-container d-flex" style="gap: 30px; align-items: center;">
          <div class="project-item_wrapp d-flex" style="flex: 1; gap: 30px; align-items: center;">
            <div class="box-img global-img" style="flex: 1; max-width: 48%;">
              <img src="assets/img/project/project_3_3.jpg" alt="project image" style="width: 100%; height: auto; border-radius: 8px;">
            </div>
            <div class="box-img global-img" style="flex: 1; max-width: 48%;">
              <img src="assets/img/project/project_3_4.jpg" alt="project image" style="width: 100%; height: auto; border-radius: 8px;">
            </div>
          </div>
          <div class="project-content" style="flex: 0 0 300px;">
            <h2 class="box-title text-custom" style="font-size: 28px; font-weight: 600; margin: 0 0 15px; color: #000;">Modern Dining Tables</h2>
            <p class="box-text text-custom" style="font-size: 16px; line-height: 1.6; margin-bottom: 20px;">Minimalist & Luxury Interiors combine the clean simplicity of minimalism with the refined elegance of luxury design. This style is perfect for those.</p>
            <a href="{{ route('project2') }}" class="th-btns black-border" style="display: inline-block; text-decoration: none;">
              Read More
            </a>
          </div>
        </div>
      </div>

      <div class="col-12 project-item filter-item cat1 cat3">
        <div class="project-item-container d-flex" style="gap: 30px; align-items: center;">
          <div class="project-item_wrapp d-flex" style="flex: 1; gap: 30px; align-items: center;">
            <div class="box-img global-img" style="flex: 1; max-width: 48%;">
              <img src="assets/img/project/project_3_5.jpg" alt="project image" style="width: 100%; height: auto; border-radius: 8px;">
            </div>
            <div class="box-img global-img" style="flex: 1; max-width: 48%;">
              <img src="assets/img/project/project_3_6.jpg" alt="project image" style="width: 100%; height: auto; border-radius: 8px;">
            </div>
          </div>
          <div class="project-content" style="flex: 0 0 300px;">
            <h2 class="box-title text-custom" style="font-size: 28px; font-weight: 600; margin: 0 0 15px; color: #000;">Minimalist Bedroom Design</h2>
            <p class="box-text text-custom" style="font-size: 16px; line-height: 1.6; margin-bottom: 20px;">Minimalist & Luxury Interiors combine the clean simplicity of minimalism with the refined elegance of luxury design. This style is perfect for those.</p>
            <a href="{{ route('project3') }}" class="th-btns black-border" style="display: inline-block; text-decoration: none;">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Wait for Isotope to be available
      function initializeFilters() {
        var grid = document.querySelector('.filter-active');
        if (!grid) {
          console.error('Filter grid not found');
          return;
        }

        if (typeof Isotope === 'undefined') {
          console.error('Isotope library not loaded');
          return;
        }

        // Initialize Isotope
        var iso = new Isotope(grid, {
          itemSelector: '.filter-item',
          layoutMode: 'fitRows',
          transitionDuration: '0.6s'
        });

        // Add click event listeners to filter buttons
        var filterButtons = document.querySelectorAll('.filter-menu button[data-filter]');
        filterButtons.forEach(function(btn) {
          btn.addEventListener('click', function(e) {
            e.preventDefault();

            // Remove active class from all buttons
            filterButtons.forEach(function(button) {
              button.classList.remove('active');
            });

            // Add active class to clicked button
            this.classList.add('active');

            // Get filter value
            var filterValue = this.getAttribute('data-filter');

            // Apply filter
            iso.arrange({
              filter: filterValue
            });

            console.log('Filter applied:', filterValue);
          });
        });

        console.log('Project filters initialized successfully');
      }

      // Try to initialize immediately
      initializeFilters();

      // Also try after window load as backup
      window.addEventListener('load', initializeFilters);
    });
  </script>

  <style>
    /* Project Section Alignment - Reference Site Match */

    /* Main project item layout to match reference site */
    .project-item {
        display: flex !important;
        flex-direction: column !important;
        align-items: flex-start !important;
        gap: 20px !important;
        margin-bottom: 60px !important;
        padding: 0 !important;
    }

    /* Image wrapper styling to match reference */
    .project-item_wrapp {
        display: flex !important;
        gap: 30px !important;
        align-items: center !important;
        width: 100% !important;
    }

    /* Individual image styling */
    .project-item .box-img {
        width: 100% !important;
        max-width: calc(50% - 15px) !important;
        border-radius: 8px !important;
        overflow: hidden !important;
    }

    .project-item .box-img img {
        width: 100% !important;
        height: auto !important;
        object-fit: cover !important;
    }

    /* Project content alignment to match reference */
    .project-item .project-content {
        width: 100% !important;
        display: flex !important;
        flex-direction: column !important;
        align-items: flex-start !important;
        margin-top: 20px !important;
    }

    /* Title styling to match reference site */
    .project-item .box-title {
        font-size: 28px !important;
        font-weight: 600 !important;
        margin: 15px 0 !important;
        color: #000 !important;
    }

    /* Description styling */
    .project-item .box-text {
        font-size: 16px !important;
        line-height: 1.6 !important;
        color: #666 !important;
        margin-bottom: 20px !important;
    }

    /* Button styling to match reference */
    .project-item .th-btns {
        background: #2d5550 !important;
        color: white !important;
        padding: 10px 20px !important;
        border-radius: 4px !important;
        text-decoration: none !important;
        display: inline-block !important;
        transition: all 0.3s ease !important;
    }

    .project-item .th-btns:hover {
        background: #4a6b66 !important;
        color: white !important;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .project-item_wrapp {
            flex-direction: column !important;
            gap: 15px !important;
        }

        .project-item .box-img {
            max-width: 100% !important;
        }
    }

    /* Override any conflicting Bootstrap classes */
    .project-item.col-12 {
        padding-left: 0 !important;
        padding-right: 0 !important;
    }

    /* Ensure proper spacing in the gallery row */
    .gallery-row {
        margin-left: 0 !important;
        margin-right: 0 !important;
    }
  </style>



</section>



<section class="positive-relative overflow-hidden space overflow-hidden" id="blog-sec">
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-xl-5">
        <div class="title-area text-center"><span class=" style2 text-custom">Blog & News</span>
          <br>
          <br>

          <h2 class="text-custom">Browse Our Latest Articles & News</h2>
        </div>
      </div>
    </div>
    <div class="row gx-24 gy-30">
      <div class="col-12">
        <div class="blog-card style2 wow fadeInUp" data-wow-delay=".3s">
          <div class="blog-img global-img"><img src=" {{ asset( 'assets/img/blog/blog_4_1.jpg') }}" alt="blog image"></div>
          <div class="box-content">
            <div>
              <div class="blog-meta text-custom"><a href="blog.html" class="text-dark">By Alex John</a> <a href="blog.html" class="text-dark">Architecture</a></div>
              <h3 class="box-title text-custom"><a href="blog-details.html">Six Inspiring New Young Architects You Should be Following</a></h3>
            </div>
            <div class="box-wrapp" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;"><span class="date text-custom">Aug 25, 2025</span> <a href="blog-details.html" class="th-btns black-border">Read More</a></div>
          </div>
        </div>
        <div class="blog-card style2 mt-30 wow fadeInUp" data-wow-delay=".5s">
          <div class="blog-img global-img"><img src=" {{ asset( 'assets/img/blog/blog_4_2.jpg') }}" alt="blog image"></div>
          <div class="box-content">
            <div>
              <div class="blog-meta"><a href="blog.html" class="text-custom">By Michel Bruis</a> <a href="blog.html" class="text-dark">Architecture</a></div>
              <h3 class="box-title text-custom"><a href="blog-details.html">Maximizing Space Smart Architecture Solutions for Small Homes</a></h3>
            </div>
            <div class="box-wrapp" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;"><span class="date text-custom">Aug 26, 2025</span> <a href="blog-details.html" class="th-btns black-border">Read More</a></div>
          </div>
        </div>
        <div class="blog-card style2 mt-30 wow fadeInUp" data-wow-delay=".6s">
          <div class="blog-img global-img"><img src=" {{ asset( 'assets/img/blog/blog_4_3.jpg') }}" alt="blog image"></div>
          <div class="box-content">
            <div>
              <div class="blog-meta"><a href="blog.html" class="text-custom">By Michel Bruis</a> <a href="blog.html" class="text-dark">Architecture</a></div>
              <h3 class="box-title text-custom"><a href="blog-details.html">The Intersection of Art and Architecture to Creating Sculptural Buildings</a></h3>
            </div>
            <div class="box-wrapp" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;"><span class="date text-custom">Aug 27, 2025</span> <a href="blog-details.html" class="th-btns black-border">Read More</a></div>
          </div>
        </div>
      </div>
    </div>
    <hr class="line">
  </div>
</section>



<div id="experts-sec" class="expertise">
  <div class="hero">
    <div class="header">

      <h3 class="text-dark">our experts</h3>
      <h1 class=" playfair-display text-dark">The best experts in each field</h1>
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
          <br>
          <br>
          <br>
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
</div>

<br>
<br>

<section id="customers-sec" class="clients">

  <div class="hero">
    <div class="h2-subtitle fade-in playfair-display"></div>
    <h4 class="playfair-display text-dark">Customers</h4>
    <h3 class="playfair-display text-dark">Who are our customers and partners</h3>
  </div>

  <div class="columns">
    @php
    $customers = \App\Models\Customer::all();
    @endphp

    @foreach($customers as $customer)
    <div class="column fade-in">
      <div class="card">


        <div class="company-names">
          <div class="company-list playfair-display">
            <div class="company-name playfair-display">{{ $customer->name }}</div>
          </div>
        </div>

        <div>
          <h5 class="playfair-display text-white">{{ $customer->category }}</h5>
          <p class="playfair-display">{{ $customer->description }}</p>
        </div>



        <div class="logo-mask">
          <div class="logo-track">
            @if($customer->logo)
            <!-- <img src="{{ asset('storage/'.$customer->logo) }}" class="customer-logo"> -->
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</section>



<section id="community-sec" class="clients">
  <div class="header" style="text-align:center; margin-bottom:40px;">

    <h4 class="subtitle blue text-custom">Our Community</h4>
    <h3 class="text-custom">Experts in the technologies you need for your projects</h3>
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
      <img src="https://upload.wikimedia.org/wikipedia/commons/5/59/SAP_2011_logo.svg" class="floating-logo" style="width:50px;">
    </div>


    <div class="service-card" style="padding:20px; border:1px solid #ddd; border-radius:12px; height:180px; display:flex; justify-content:center; align-items:center; position:relative; overflow:hidden;">
      <img src="https://upload.wikimedia.org/wikipedia/commons/3/39/Kubernetes_logo_without_workmark.svg" class="floating-logo" style="width:50px;">
    </div>


    <div class="service-card" style="padding:20px; border:1px solid #ddd; border-radius:12px; height:180px; display:flex; justify-content:center; align-items:center; position:relative; overflow:hidden;">
      <img src="https://upload.wikimedia.org/wikipedia/commons/5/59/SAP_2011_logo.svg" class="floating-logo" style="width:50px;">
    </div>


    <div class="service-card" style="padding:20px; border:1px solid #ddd; border-radius:12px; height:180px; display:flex; justify-content:center; align-items:center; position:relative; overflow:hidden;">
      <img src="https://upload.wikimedia.org/wikipedia/commons/9/93/Amazon_Web_Services_Logo.svg" class="floating-logo" style="width:50px;">
    </div>

  </div>
</section>


<div class="overflow-hidden space-top playfair-display" id="contact-sec">
  <h5 style="text-align: center;" class="text-dark">Contact Us</h5>
  <p style="text-align: center;" class="text-custom">If you have any questions, suggestions, or would like to work with us, feel free to reach out. We’re here to help and will get back to you as soon as possible.</p>

  <br>
  <br>
  <div class="container">
    <div class="row gy-4 flex-row-reverse">
      <div class="col-xl-6">
        <div class="ps-xl-5">
          <form action="">
            <div class="title-area">
              <h2 class="sec-title style2 split-text text-custom">
                Let’s
                <span class="title1 text-custom">Work</span>
                <span class="title4 text-custom">Together</span>
              </h2>

              <p class="contact-text text-custom mt-30">Minimalist & Luxury Interiors combine the clean simplicity of minimalism with the refined elegance of luxury design. This style is perfect for those who appreciate both functionality.</p>
            </div>
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
              <div class="form-group col-12"><textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Message"></textarea> <i class="fa-solid fa-pencil"></i></div>
              <div class="col-12 form-group text-custom"><input type="checkbox" id="html"> <label for="html" class="text-custom">I agree with the privacy policy</label></div>
              <div class="form-btn mt-20 col-12  text-custom"><button class="th-btns black-border text-custom">Submit Now</button></div>
            </div>
            <p class="form-messages mb-0 mt-3"></p>
          </form>
        </div>
      </div>
      <div class="col-xl-6">
        <div class="contact-image2" data-mask-src="assets/img/normal/contact-shape.png">
          <div class="img1 img-anim-left"><img src="assets/img/normal/contact-1-1.jpg" alt=""></div>
          <div class="contact-shape"><img src="assets/img/normal/contact-shape2.png" alt=""></div>
        </div>
      </div>
    </div>
  </div>
</div>

<br>
<br>
<br>



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
                <p class="box-text text-custom">“John was wonderful to work with and more than capable in all aspects. I found him and his employees to be very creative, organized and professional…. I see John as an architect who truly loves his work. John has a true passion in the creative.”</p>
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
                <p class="box-text text-custom">“John was wonderful to work with and more than capable in all aspects. I found him and his employees to be very creative, organized and professional…. I see John as an architect who truly loves his work. John has a true passion in the creative.”</p>
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
                <p class="box-text text-custom">“John was wonderful to work with and more than capable in all aspects. I found him and his employees to be very creative, organized and professional…. I see John as an architect who truly loves his work. John has a true passion in the creative.”</p>
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


<br>
<br>


<div class="overflow-hidden space-bottom overflow-hidden playfair-display" id="instagram-sec">
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
</div>

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


@endsection
