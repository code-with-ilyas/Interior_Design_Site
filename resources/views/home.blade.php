@extends('layouts.master')

@section('content')

<section class="freelancer-hero-section" id="hero-sec">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="freelancer-hero-content">
          <div class="freelancer-tags">
            <span class="freelancer-tag playfair-display">IA</span>
            <span class="freelancer-tag playfair-display">Data</span>
            <span class="freelancer-tag playfair-display">Cloud</span>
            <span class="freelancer-tag playfair-display">Cyber</span>
            <span class="freelancer-tag playfair-display">IT</span>
            <span class="freelancer-tag playfair-display">Digital</span>
          </div>
          <h1 class="freelancer-title playfair-display" style="font-size: 45px;">H24 RENOVATION</h1>
          <div class="freelancer-features">
            <div class="feature-item">
              <div class="feature-icon">
                <img src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/66e18f7269802b9bae5f221d_Selection.png" alt="Selection">
              </div>
              <span class="feature-text playfair-display">A rigorous selection methodology.</span>
            </div>
            <div class="feature-item">
              <div class="feature-icon">
                <img src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/66e19056705c5d35241fec5d_e%CC%81cran.png" alt="Platform">
              </div>
              <span class="feature-text playfair-display">A single platform to manage your business.</span>
            </div>
            <div class="feature-item">
              <div class="feature-icon">
                <img src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/66e18f91deb42b7fa54ce51a_offres.png" alt="Offers">
              </div>
              <span class="feature-text playfair-display">Offers to suit all your needs.</span>
            </div>
          </div>
          <div class="freelancer-buttons playfair-display">
            <!-- <a href="https://project-submission.client.cremedelacreme.io" class="th-btn freelancer-btn primary">
              <span class="btn-icon">
                <img src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/66d6caf319433c5d77180915_EllipsePurple.svg" alt="">
              </span>
              Find a freelancer
            </a> -->


            <a href="javascript:void(0);" id="demoBtn" class="playfair-display"
              style="display:inline-block; font-family:'Playfair Display', serif; font-size:16px; font-weight:500; padding:10px 25px; border:2px solid #003f3a; background-color:transparent; color:#003f3a; border-radius:100px; text-align:center; cursor:pointer; text-decoration:none; transition:all 0.3s ease;"
              onmouseover="this.style.backgroundColor='#003f3a'; this.style.color='#fff';"
              onmouseout="this.style.backgroundColor='transparent'; this.style.color='#003f3a';">Request a Demo</a>

            <div id="demoFormOverlay" class="playfair-display">
              <div id="demoFormContainer">
                <span id="closeForm" class="close-arrow">&#x2192;</span>
                <h3 class="text-dark">Request a Demo</h3>

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

                  <div class="form-row">
                    <button type="submit" class="th-btn">Submit</button>
                  </div>
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
                color: #333;
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

              .th-btn {
                padding: 11px 30px;
                background-color: #007bff;
                color: #fff;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
                transition: 0.3s;
              }

              .th-btn:hover {
                background-color: #0056b3;
              }

              /* Responsive */
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
          width:90px;
          padding:10px;
          background: #1d1c1cff;
          border-radius:10px;
          box-shadow:0 4px 12px rgba(0,0,0,0.15);
          font-size:11px;
          height:80px;          /* vertical shape */
          display:flex;
          flex-direction:column;
          justify-content:center;
          text-align:center;
        ">
            <h6 style="margin:0; font-size:12px;" class="text-white">Stitching</h6>
            <p style="margin:0;" class="text-white">Premium</p>
          </div>

          <div
            style="
          position:absolute;
          right:-60px;
          top:5%;
          width:90px;
          padding:10px;
          background: #1d1c1cff;
          border-radius:10px;
          box-shadow:0 4px 12px rgba(0,0,0,0.15);
          font-size:11px;
          height:60px;
          display:flex;
          flex-direction:column;
          justify-content:center;
          text-align:center;
        ">
            <h6 style="margin:0; font-size:12px;" class="text-white">Perfect</h6>
            <p style="margin:0;" class="text-white">Measurement</p>
          </div>


          <div
            style="
          position:absolute;
          right:-60px;
          bottom:5%;
          width:90px;
          padding:10px;
         background: #1d1c1cff;
          border-radius:10px;
          box-shadow:0 4px 12px rgba(0,0,0,0.15);
          font-size:11px;
          height:60px;
          display:flex;
          flex-direction:column;
          justify-content:center;
          text-align:center;
        ">
            <h6 style="margin:0; font-size:12px;" class="text-white">Delivery</h6>
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

@php
$about = $aboutSections->first();
@endphp

<section style="padding: 80px 0;">
  <h5 id="about-title" style="text-align: center; scroll-margin-top: 100px; font-size: 14px;">About Us</h5>
  <br>
  <div style="display: flex; align-items: flex-start; justify-content: center; max-width: 1200px; margin: auto; gap: 40px; flex-wrap: wrap;">
    <div style="flex: 1; min-width: 350px;">
      @if($about && $about->image)
      <img src="{{ Storage::url($about->image) }}" alt="{{ $about->name }}" style="width: 100%; height: 500px; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.15);">
      @else
      <img src="https://mesbatisseurs.fr/wp-content/uploads/2024/08/WhatsApp-Image-2024-08-21-at-15.28.33.jpeg" alt="About Default" style="width: 100%; height: 500px; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.15);">
      @endif
    </div>

    <div style="flex: 1; min-width: 350px; display: flex; flex-direction: column; justify-content: flex-start;">
      <p style="font-size: 16px; line-height: 1.7; color: #444;" class="text-white">
        @if($about && $about->description)
        {!! $about->description !!}
        @else
        At <strong>Mes Batisseurs</strong>, our passion lies in transforming spaces into
        true havens of peace. We offer a range of services, from adding innovative
        extensions to revitalizing your interiors, not to mention designing enchanting
        outdoor spaces. Our goal is to create bespoke solutions that perfectly harmonize
        with each client's unique aspirations.
        @endif
      </p>
    </div>
  </div>
</section>




<div class="our-services-section playfair-display" id="service-sec">
  <div class="services-header">
    <h5 class="text-primary">Our services</h5>
    <h4 style="font-size: 20px;">Support for all your transformation challenges</h4>
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
          <h5 class="service-title">{{ $service->service_title ?? $service['service_title'] }}</h5>
          <div class="service-description">{{ $service->service_description ?? $service['service_description'] }}</div>
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

    <h5 style="font-size: 14px; margin-bottom: 14px;">Our Projects</h5>


    <p class="text-white" style="font-size: 20px; line-height: 1.4; margin-bottom: 10px;">Complete Solutions for Your Outdoor Projects</p>


    <p class="text-white" style="font-size: 20px; line-height: 1.6; margin-bottom: 20px;">Discover how we can transform your outdoor space with our specialist landscaping and construction services.</p>


    <div class="col-xl-6 mx-auto">
      <div class="filter-menu style2 filter-menu-active">
        <button data-filter="*" class="th-btn th-border active" type="button">View All</button>
        <button data-filter=".cat1" class="th-btn th-border" type="button">Residential</button>
        <button data-filter=".cat2" class="th-btn th-border" type="button">Commercial</button>
        <button data-filter=".cat3" class="th-btn th-border" type="button">Multipurpose</button>
      </div>
    </div>
  </div>


  <div class="row gallery-row filter-active justify-content-between load-more-active align-items-center mt-4">
    <div class="project-item col-12 filter-item cat2 cat3">
      <div class="project-item_wrapp">
        <div class="box-img global-img"><img src="assets/img/project/project_3_1.jpg" alt="project image"></div>
        <div class="box-img global-img"><img src="assets/img/project/project_3_2.jpg" alt="project image"></div>
      </div>
      <div class="project-content">
        <h2 class="box-title text-size: 1px;">Minimalist Interior Design</h2>
        <p class="box-text">Minimalist & Luxury Interiors combine the clean simplicity of minimalism with the refined elegance of luxury design. This style is perfect for those.</p>
        <a href="{{ route('project1') }}" class="th-btn white-border th-icon">View Details</a>
      </div>
    </div>

    <div class="project-item col-12 filter-item cat2 cat1">
      <div class="project-item_wrapp">
        <div class="box-img global-img"><img src="assets/img/project/project_3_3.jpg" alt="project image"></div>
        <div class="box-img global-img"><img src="assets/img/project/project_3_4.jpg" alt="project image"></div>
      </div>
      <div class="project-content">
        <h2 class="box-title">Modern Dining Tables</h2>
        <p class="box-text">Minimalist & Luxury Interiors combine the clean simplicity of minimalism with the refined elegance of luxury design. This style is perfect for those.</p>
        <a href="{{ route('project2') }}" class="th-btn white-border th-icon">View Details</a>
      </div>
    </div>

    <div class="project-item col-12 filter-item cat1 cat3">
      <div class="project-item_wrapp">
        <div class="box-img global-img"><img src="assets/img/project/project_3_5.jpg" alt="project image"></div>
        <div class="box-img global-img"><img src="assets/img/project/project_3_6.jpg" alt="project image"></div>
      </div>
      <div class="project-content">
        <h2 class="box-title">Minimalist Bedroom Design</h2>
        <p class="box-text">Minimalist & Luxury Interiors combine the clean simplicity of minimalism with the refined elegance of luxury design. This style is perfect for those.</p>
        <a href="{{ route('project3') }}" class="th-btn white-border th-icon">View Details</a>
      </div>
    </div>
  </div>

</section>



<section class="positive-relative overflow-hidden space overflow-hidden" id="blog-sec">
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-xl-5">
        <div class="title-area text-center"><span class=" style2 text-anime">Blog & News</span>
          <br>
          <h2>Browse Our Latest Articles & News</h2>
        </div>
      </div>
    </div>
    <div class="row gx-24 gy-30">
      <div class="col-12">
        <div class="blog-card style2 wow fadeInUp" data-wow-delay=".3s">
          <div class="blog-img global-img"><img src=" {{ asset( 'assets/img/blog/blog_4_1.jpg') }}" alt="blog image"></div>
          <div class="box-content">
            <div>
              <div class="blog-meta text-white"><a href="blog.html" class="text-white">By Alex John</a> <a href="blog.html" class="text-white">Architecture</a></div>
              <h3 class="box-title text-white"><a href="blog-details.html">Six Inspiring New Young Architects You Should be Following</a></h3>
            </div>
            <div class="box-wrapp"><span class="date text-white">Aug 25, 2025</span> <a href="blog-details.html" class="th-btn black-border text-white ">Read More</a></div>
          </div>
        </div>
        <div class="blog-card style2 mt-30 wow fadeInUp" data-wow-delay=".5s">
          <div class="blog-img global-img"><img src=" {{ asset( 'assets/img/blog/blog_4_2.jpg') }}" alt="blog image"></div>
          <div class="box-content">
            <div>
              <div class="blog-meta"><a href="blog.html" class="text-white">By Michel Bruis</a> <a href="blog.html" class="text-white">Architecture</a></div>
              <h3 class="box-title"><a href="blog-details.html">Maximizing Space Smart Architecture Solutions for Small Homes</a></h3>
            </div>
            <div class="box-wrapp"><span class="date text-white">Aug 26, 2025</span> <a href="blog-details.html" class="th-btn black-border text-white">Read More</a></div>
          </div>
        </div>
        <div class="blog-card style2 mt-30 wow fadeInUp" data-wow-delay=".6s">
          <div class="blog-img global-img"><img src=" {{ asset( 'assets/img/blog/blog_4_3.jpg') }}" alt="blog image"></div>
          <div class="box-content">
            <div>
              <div class="blog-meta"><a href="blog.html" class="text-white">By Michel Bruis</a> <a href="blog.html" class="text-white">Architecture</a></div>
              <h3 class="box-title"><a href="blog-details.html">The Intersection of Art and Architecture to Creating Sculptural Buildings</a></h3>
            </div>
            <div class="box-wrapp"><span class="date text-white">Aug 27, 2025</span> <a href="blog-details.html" class="th-btn black-border text-white">Read More</a></div>
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

      <h3>our experts</h3>
      <h1 class=" playfair-display">The best experts in each field</h1>
    </div>
    <div class="freelances-group">
      <div data-duration-in="500" data-duration-out="200" data-current="Tab 1" data-easing="ease" class="w-tabs">
        <div class="tabs-menu-freelance w-tab-menu">
          <a data-w-tab="Tab 1" class="tab-link w-inline-block w-tab-link w--current playfair-display">
            <div>IA</div>
          </a>
          <a data-w-tab="Tab 2" class="tab-link w-inline-block w-tab-link">
            <div>Data</div>
          </a>
          <a data-w-tab="Tab 3" class="tab-link w-inline-block w-tab-link">
            <div>Cloud</div>
          </a>
          <a data-w-tab="Tab 4" class="tab-link w-inline-block w-tab-link">
            <div>Cybersecurity</div>
          </a>
          <a data-w-tab="Tab 5" class="tab-link w-inline-block w-tab-link">
            <div>IT Products</div>
          </a>
          <a data-w-tab="Tab 6" class="tab-link w-inline-block w-tab-link">
            <div>Digital</div>
          </a>

        </div>
        <div class="tabs-content-2 w-tab-content">
          <br>
          <br>
          <br>
          <div data-w-tab="Tab 1" class="w-tab-pane w--tab-active">
            <div class="w-layout-grid grid-4">
              <div class="profile grey">
                <div class="profile-header">
                  <img loading="lazy" src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/677d33f400c77c6150993f97_4-min.png" alt="ML Engineer" class="image-126">
                </div>
                <div class="profile-body">
                  <div class="profiles-infos">
                    <div class="tag blue">
                      <div class="sector_profile white playfair-display">ML Engineer</div>
                    </div>
                    <div class="skills-profil">
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Python</div>
                      </div>
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Tensorflow</div>
                      </div>
                    </div>
                  </div>
                  <div class="div_logo_profile">
                    <div class="previously_profile white playfair-display">Worked for</div>
                    <div class="box-logo-profile">
                      <img src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/672cd5f7dd6acbdf474e86c0_Kering-logo.svg.png" alt="Kering" loading="lazy" class="logo_profile kering black">
                    </div>
                  </div>
                </div>
              </div>
              <div class="profile grey">
                <div class="profile-header">
                  <img loading="lazy" src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/677d33f44982b8b1c0237559_3-min.png" alt="AI Engineer" class="image-126">
                </div>
                <div class="profile-body">
                  <div class="profiles-infos">
                    <div class="tag blue">
                      <div class="sector_profile white playfair-display">AI Engineer</div>
                    </div>
                    <div class="skills-profil">
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">R</div>
                      </div>
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">PyTorch</div>
                      </div>
                    </div>
                  </div>
                  <div class="div_logo_profile">
                    <div class="previously_profile white playfair-display">Worked for</div>
                    <div class="box-logo-profile">
                      <img src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/66d6caf319433c5d771807c1_lvmh.png" alt="LVMH" loading="lazy" class="logo_profile a-travailler-pour black">
                    </div>
                  </div>
                </div>
              </div>
              <div class="profile grey">
                <div class="profile-header">
                  <img loading="lazy" src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/677d33f4fe114dbb82196ea1_2-min.png" alt="NLP Engineer" class="image-126">
                </div>
                <div class="profile-body">
                  <div class="profiles-infos">
                    <div class="tag blue">
                      <div class="sector_profile white playfair-display">NLP Engineer</div>
                    </div>
                    <div class="skills-profil">
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Transformers</div>
                      </div>
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">spaCy</div>
                      </div>
                    </div>
                  </div>
                  <div class="div_logo_profile">
                    <div class="previously_profile white playfair-display">Worked for</div>
                    <div class="box-logo-profile">
                      <img src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/672cd706fdec00948192e4b1_66deb6a77dd63621b97606b0_bnpp%20white.png" alt="BNP Paribas" loading="lazy" class="logo_profile bnp black">
                    </div>
                  </div>
                </div>
              </div>
              <div class="profile grey">
                <div class="profile-header">
                  <img loading="lazy" src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/677d33f4f14eb1bfda463727_1-min.png" alt="ML Ops" class="image-126">
                </div>
                <div class="profile-body">
                  <div class="profiles-infos">
                    <div class="tag blue">
                      <div class="sector_profile white playfair-display">ML Ops</div>
                    </div>
                    <div class="skills-profil">
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Docker</div>
                      </div>
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Kubernetes</div>
                      </div>
                    </div>
                  </div>
                  <div class="div_logo_profile">
                    <div class="previously_profile white playfair-display">Worked for</div>
                    <div class="box-logo-profile">
                      <img src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/672cd74a73103a60399c06e8_1683000993orange-logo-black.webp" alt="Orange" loading="lazy" class="logo_profile a-travailler-pour orange">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div data-w-tab="Tab 2" class="w-tab-pane ">
            <div class="w-layout-grid grid-4">
              <div class="profile grey">
                <div class="profile-header">
                  <img loading="lazy" src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/677d33f5c2e76b0c7f600638_5-min.png" alt="Data Director" class="image-126">
                </div>
                <div class="profile-body">
                  <div class="profiles-infos">
                    <div class="tag blue">
                      <div class="sector_profile white playfair-display">Data Director</div>
                    </div>
                    <div class="skills-profil">
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Data Governance</div>
                      </div>
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">GCP</div>
                      </div>
                    </div>
                  </div>
                  <div class="div_logo_profile">
                    <div class="previously_profile white playfair-display">Worked for</div>
                    <div class="box-logo-profile">
                      <img src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/673dc43ee0fa7aafe4dfb0e0_Edenred_Logo_(depuis_2017).png" alt="Edenred" loading="lazy" class="logo_profile kering black">
                    </div>
                  </div>
                </div>
              </div>
              <div class="profile grey">
                <div class="profile-header">
                  <img loading="lazy" src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/677d33f66f57caac6cfea1dd_6-min.png" alt="Data Engineer" class="image-126">
                </div>
                <div class="profile-body">
                  <div class="profiles-infos">
                    <div class="tag blue">
                      <div class="sector_profile white playfair-display">Data Engineer</div>
                    </div>
                    <div class="skills-profil">
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Apache Spark</div>
                      </div>
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Databricks</div>
                      </div>
                    </div>
                  </div>
                  <div class="div_logo_profile">
                    <div class="previously_profile white playfair-display">Worked for</div>
                    <div class="box-logo-profile">
                      <img src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/673dc5a529d7799df319ebea_thales.png" alt="Thales" loading="lazy" class="logo_profile a-travailler-pour black thales">
                    </div>
                  </div>
                </div>
              </div>
              <div class="profile grey">
                <div class="profile-header">
                  <img loading="lazy" src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/677d33f5a96d2eb7be9b310d_7-min.png" alt="Data Scientist" class="image-126">
                </div>
                <div class="profile-body">
                  <div class="profiles-infos">
                    <div class="tag blue">
                      <div class="sector_profile white playfair-display">Data Scientist</div>
                    </div>
                    <div class="skills-profil">
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Python</div>
                      </div>
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Tensorflow</div>
                      </div>
                    </div>
                  </div>
                  <div class="div_logo_profile">
                    <div class="previously_profile white playfair-display">Worked for</div>
                    <div class="box-logo-profile">
                      <img src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/673dc6d84da46403097f3180_sanofi.png" alt="Sanofi" loading="lazy" class="logo_profile sanofi black">
                    </div>
                  </div>
                </div>
              </div>
              <div class="profile grey">
                <div class="profile-header">
                  <img loading="lazy" src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/677d33f5d336fdb20559273f_8-min.png" alt="Data Steward" class="image-126">
                </div>
                <div class="profile-body">
                  <div class="profiles-infos">
                    <div class="tag blue">
                      <div class="sector_profile white playfair-display">Data Steward</div>
                    </div>
                    <div class="skills-profil">
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Colibra</div>
                      </div>
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Snowflake</div>
                      </div>
                    </div>
                  </div>
                  <div class="div_logo_profile">
                    <div class="previously_profile white playfair-display">Worked for</div>
                    <div class="box-logo-profile">
                      <img src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/673dc8cfb23caa30509d16ac_Vinci.png" alt="Vinci" loading="lazy" class="logo_profile a-travailler-pour vinci">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div data-w-tab="Tab 3" class="w-tab-pane">
            <div class="w-layout-grid grid-4">
              <div class="profile grey">
                <div class="profile-header">
                  <img loading="lazy" src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/672b81bc68d3ed56a4f69d7d_Portrait%20of%20Happy%20Young%20Woman%20Wearing%20Spectacles%20(1200%20x%201200%20px).zip%20-%2025.png" alt="Cloud Architect" class="image-126">
                </div>
                <div class="profile-body">
                  <div class="profiles-infos">
                    <div class="tag blue">
                      <div class="sector_profile white playfair-display">Cloud Architect</div>
                    </div>
                    <div class="skills-profil">
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Terraform</div>
                      </div>
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">AWS</div>
                      </div>
                    </div>
                  </div>
                  <div class="div_logo_profile">
                    <div class="previously_profile white playfair-display">Worked for</div>
                    <div class="box-logo-profile">
                      <img src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/673efd5a2fc3340bc911cf4f_logo-credit-agricole.png" alt="Credit Agricole" loading="lazy" class="logo_profile creditagricole black">
                    </div>
                  </div>
                </div>
              </div>
              <div class="profile grey">
                <div class="profile-header">
                  <img loading="lazy" src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/672b8950e846247f157fc9be_sq.png" alt="Cloud Engineer" class="image-126">
                </div>
                <div class="profile-body">
                  <div class="profiles-infos">
                    <div class="tag blue">
                      <div class="sector_profile white playfair-display">Cloud Engineer</div>
                    </div>
                    <div class="skills-profil">
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">AWS</div>
                      </div>
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Ansible</div>
                      </div>
                    </div>
                  </div>
                  <div class="div_logo_profile">
                    <div class="previously_profile white playfair-display">Worked for</div>
                    <div class="box-logo-profile">
                      <img src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/673efdf2370e383fc489dbba_Safran.png" alt="Safran" loading="lazy" class="logo_profile a-travailler-pour black safran">
                    </div>
                  </div>
                </div>
              </div>
              <div class="profile grey">
                <div class="profile-header">
                  <img loading="lazy" src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/6756f45155ac757433e2c479_PhotoFree.png" alt="Cloud security Expert" class="image-126">
                </div>
                <div class="profile-body">
                  <div class="profiles-infos">
                    <div class="tag blue">
                      <div class="sector_profile white playfair-display">Cloud security Expert</div>
                    </div>
                    <div class="skills-profil">
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">CCSP</div>
                      </div>
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">SOC 2</div>
                      </div>
                    </div>
                  </div>
                  <div class="div_logo_profile">
                    <div class="previously_profile white playfair-display">Worked for</div>
                    <div class="box-logo-profile">
                      <img src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/673efeb98a1c6f3693636bb3_Bouygues_Te%CC%81le%CC%81com.png" alt="Bouygues Telecom" loading="lazy" class="logo_profile bouygues black">
                    </div>
                  </div>
                </div>
              </div>
              <div class="profile grey">
                <div class="profile-header">
                  <img loading="lazy" src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/672b82721d1bfa9f738e4bed_sfbd.png" alt="DevOps" class="image-126">
                </div>
                <div class="profile-body">
                  <div class="profiles-infos">
                    <div class="tag blue">
                      <div class="sector_profile white playfair-display">DevOps</div>
                    </div>
                    <div class="skills-profil">
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Jenkins</div>
                      </div>
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">GitLab CI/CD</div>
                      </div>
                    </div>
                  </div>
                  <div class="div_logo_profile">
                    <div class="previously_profile white playfair-display">Worked for</div>
                    <div class="box-logo-profile">
                      <img src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/673eff8a37c6f9da9bed706b_schneider-electric-logo.png" alt="Schneider Electric" loading="lazy" class="logo_profile a-travailler-pour vinci">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div data-w-tab="Tab 4" class="w-tab-pane">
            <div class="w-layout-grid grid-4">
              <div class="profile grey">
                <div class="profile-header">
                  <img loading="lazy" src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/6756ec8f3b380a12688fb17a_PhotoFree3.png" alt="Cybersecurity Engineer" class="image-126">
                </div>
                <div class="profile-body">
                  <div class="profiles-infos">
                    <div class="tag blue">
                      <div class="sector_profile white playfair-display">Cybersecurity Engineer</div>
                    </div>
                    <div class="skills-profil">
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Wireshark</div>
                      </div>
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Nmap</div>
                      </div>
                    </div>
                  </div>
                  <div class="div_logo_profile">
                    <div class="previously_profile white playfair-display">Worked for</div>
                    <div class="box-logo-profile">
                      <img src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/673f001958f20aea0a9d501c_airbus.png" alt="Airbus" loading="lazy" class="logo_profile airbus black">
                    </div>
                  </div>
                </div>
              </div>
              <div class="profile grey">
                <div class="profile-header">
                  <img loading="lazy" src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/672b8d56d34bd591248ba112_dfghj.png" alt="Cybersecurity Architect" class="image-126">
                </div>
                <div class="profile-body">
                  <div class="profiles-infos">
                    <div class="tag blue">
                      <div class="sector_profile white playfair-display">Cybersecurity Architect</div>
                    </div>
                    <div class="skills-profil">
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Nist</div>
                      </div>
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Iso 27001</div>
                      </div>
                    </div>
                  </div>
                  <div class="div_logo_profile">
                    <div class="previously_profile white playfair-display">Worked for</div>
                    <div class="box-logo-profile">
                      <img src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/66d6caf319433c5d771804c2_Renault.png" alt="Renault" loading="lazy" class="logo_profile a-travailler-pour black renault">
                    </div>
                  </div>
                </div>
              </div>
              <div class="profile grey">
                <div class="profile-header">
                  <img loading="lazy" src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/672b8b94596fab5bc81ceda7_qsdqsd.png" alt="Cybersecurity Analyst" class="image-126">
                </div>
                <div class="profile-body">
                  <div class="profiles-infos">
                    <div class="tag blue">
                      <div class="sector_profile white playfair-display">Cybersecurity Analyst</div>
                    </div>
                    <div class="skills-profil">
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Splunk</div>
                      </div>
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Bash</div>
                      </div>
                    </div>
                  </div>
                  <div class="div_logo_profile">
                    <div class="previously_profile white playfair-display">Worked for</div>
                    <div class="box-logo-profile">
                      <img src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/66d6caf319433c5d77180846_accor.png" alt="Accor" loading="lazy" class="logo_profile accor black">
                    </div>
                  </div>
                </div>
              </div>
              <div class="profile grey">
                <div class="profile-header">
                  <img loading="lazy" src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/672c77d0781bfc906f44576b_new%20profil.png" alt="Pen Tester" class="image-126">
                </div>
                <div class="profile-body">
                  <div class="profiles-infos">
                    <div class="tag blue">
                      <div class="sector_profile white playfair-display">Pen Tester</div>
                    </div>
                    <div class="skills-profil">
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Metasploit</div>
                      </div>
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Burp</div>
                      </div>
                    </div>
                  </div>
                  <div class="div_logo_profile">
                    <div class="previously_profile white playfair-display">Worked for</div>
                    <div class="box-logo-profile">
                      <img src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/673dc8cfb23caa30509d16ac_Vinci.png" alt="Vinci" loading="lazy" class="logo_profile a-travailler-pour vinci">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div data-w-tab="Tab 5" class="w-tab-pane">
            <div class="w-layout-grid grid-4">
              <div class="profile grey">
                <div class="profile-header">
                  <img loading="lazy" src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/673335c917fa15caba13e9d1_672b96a545e97217fe17905d_%2Chgnfdbfsvqcxq.png" alt="Tech Lead" class="image-126">
                </div>
                <div class="profile-body">
                  <div class="profiles-infos">
                    <div class="tag blue">
                      <div class="sector_profile white playfair-display">Tech Lead</div>
                    </div>
                    <div class="skills-profil">
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">AWS</div>
                      </div>
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Circle CI</div>
                      </div>
                    </div>
                  </div>
                  <div class="div_logo_profile">
                    <div class="previously_profile white playfair-display">Worked for</div>
                    <div class="box-logo-profile">
                      <img src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/673dc43ee0fa7aafe4dfb0e0_Edenred_Logo_(depuis_2017).png" alt="Edenred" loading="lazy" class="logo_profile kering black">
                    </div>
                  </div>
                </div>
              </div>
              <div class="profile grey">
                <div class="profile-header">
                  <img loading="lazy" src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/672b9634286e055fab0966ee_sqerhtgrfqzertjhrgefgrhtjtgefehtrjhgf.png" alt="Software Engineer" class="image-126">
                </div>
                <div class="profile-body">
                  <div class="profiles-infos">
                    <div class="tag blue">
                      <div class="sector_profile white playfair-display">Software Engineer</div>
                    </div>
                    <div class="skills-profil">
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">GCP</div>
                      </div>
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Node JS</div>
                      </div>
                    </div>
                  </div>
                  <div class="div_logo_profile">
                    <div class="previously_profile white playfair-display">Worked for</div>
                    <div class="box-logo-profile">
                      <img src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/673dc5a529d7799df319ebea_thales.png" alt="Thales" loading="lazy" class="logo_profile a-travailler-pour black thales">
                    </div>
                  </div>
                </div>
              </div>
              <div class="profile grey">
                <div class="profile-header">
                  <img loading="lazy" src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/6756ba191d5f5d708bbb1778_Profil%20num2.png" alt="Product Manager" class="image-126">
                </div>
                <div class="profile-body">
                  <div class="profiles-infos">
                    <div class="tag blue">
                      <div class="sector_profile white playfair-display">Product Manager</div>
                    </div>
                    <div class="skills-profil">
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Jira</div>
                      </div>
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Figma</div>
                      </div>
                    </div>
                  </div>
                  <div class="div_logo_profile">
                    <div class="previously_profile white playfair-display">Worked for</div>
                    <div class="box-logo-profile">
                      <img src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/673dc6d84da46403097f3180_sanofi.png" alt="Sanofi" loading="lazy" class="logo_profile sanofi black">
                    </div>
                  </div>
                </div>
              </div>
              <div class="profile grey">
                <div class="profile-header">
                  <img loading="lazy" src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/671fac73c9998229e365a41a_20.jpg" alt="QA Engineer" class="image-126">
                </div>
                <div class="profile-body">
                  <div class="profiles-infos">
                    <div class="tag blue">
                      <div class="sector_profile white playfair-display">QA Engineer</div>
                    </div>
                    <div class="skills-profil">
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Cypress</div>
                      </div>
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Javascript</div>
                      </div>
                    </div>
                  </div>
                  <div class="div_logo_profile">
                    <div class="previously_profile white playfair-display">Worked for</div>
                    <div class="box-logo-profile">
                      <img src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/674dd71a33a958b10431377d_axa-logo-blanc-1024x1024.png" alt="AXA" loading="lazy" class="logo_profile a-travailler-pour axa">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div data-w-tab="Tab 6" class="w-tab-pane">
            <div class="w-layout-grid grid-4">
              <div class="profile grey">
                <div class="profile-header">
                  <img loading="lazy" src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/672b9afc90e5410635015e1e_hnfgbdfvscvf.png" alt="Digital Marketing Manager" class="image-126">
                </div>
                <div class="profile-body">
                  <div class="profiles-infos">
                    <div class="tag blue">
                      <div class="sector_profile white playfair-display">Digital Marketing Manager</div>
                    </div>
                    <div class="skills-profil">
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Power BI</div>
                      </div>
                      <div class="tag grey">
                        <div class="sector_profile white  playfair-display">Google Analytics</div>
                      </div>
                    </div>
                  </div>
                  <div class="div_logo_profile">
                    <div class="previously_profile white playfair-display">Worked for</div>
                    <div class="box-logo-profile">
                      <img src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/674dd78c3797fbe2cd0aa0ca_Legrand%20Logo.png" alt="Legrand" loading="lazy" class="logo_profile legrand black">
                    </div>
                  </div>
                </div>
              </div>
              <div class="profile grey">
                <div class="profile-header">
                  <img loading="lazy" src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/6756b8aa869f5b3f3f3c1933_free1.png" alt="CRM Manager" class="image-126">
                </div>
                <div class="profile-body">
                  <div class="profiles-infos">
                    <div class="tag blue">
                      <div class="sector_profile white playfair-display">CRM Manager</div>
                    </div>
                    <div class="skills-profil">
                      <div class="tag grey">
                        <div class="sector_profile white biggest playfair-display">Hubspot</div>
                      </div>
                      <div class="tag grey">
                        <div class="sector_profile white biggest playfair-display">Microsoft Dynamics 365</div>
                      </div>
                    </div>
                  </div>
                  <div class="div_logo_profile">
                    <div class="previously_profile white playfair-display">Worked for</div>
                    <div class="box-logo-profile">
                      <img src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/674dd851cbeaf29d745c7a30_VivendiLogo.png" alt="Vivendi" loading="lazy" class="logo_profile a-travailler-pour black vivendi">
                    </div>
                  </div>
                </div>
              </div>
              <div class="profile grey">
                <div class="profile-header">
                  <img loading="lazy" src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/672b9c008f6c5e999bf9fcfb_lukjyhtgrfd.png" alt="UI/UX Designer" class="image-126">
                </div>
                <div class="profile-body">
                  <div class="profiles-infos">
                    <div class="tag blue">
                      <div class="sector_profile white playfair-display">UI/UX Designer</div>
                    </div>
                    <div class="skills-profil">
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Adobe XD</div>
                      </div>
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Sketch</div>
                      </div>
                    </div>
                  </div>
                  <div class="div_logo_profile">
                    <div class="previously_profile white playfair-display">Worked for</div>
                    <div class="box-logo-profile">
                      <img src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/674dd99ec8e31fa53f174e7d_Carrefour.png" alt="Carrefour" loading="lazy" class="logo_profile carrefour black">
                    </div>
                  </div>
                </div>
              </div>
              <div class="profile grey">
                <div class="profile-header">
                  <img loading="lazy" src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/67a0cb38474db23ccc3a75b8_profil-min.png" alt="Motion Designer" class="image-126">
                </div>
                <div class="profile-body">
                  <div class="profiles-infos">
                    <div class="tag blue">
                      <div class="sector_profile white playfair-display">Motion Designer</div>
                    </div>
                    <div class="skills-profil">
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">After Effects</div>
                      </div>
                      <div class="tag grey">
                        <div class="sector_profile white playfair-display">Cinema 4D</div>
                      </div>
                    </div>
                  </div>
                  <div class="div_logo_profile">
                    <div class="previously_profile white playfair-display">Worked for</div>
                    <div class="box-logo-profile">
                      <img src="https://cdn.prod.website-files.com/66d6caf319433c5d7718043c/674dda51db816bca36b4d956_Hermes%20Logo.png" alt="Hermes" loading="lazy" class="logo_profile a-travailler-pour hermes">
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
</div>

<br>
<br>



<section id="customers-sec" class="clients">

  <div class="hero">
    <div class="h2-subtitle fade-in playfair-display"></div>
    <h4 class="playfair-display text-white">Customers</h4>
    <h3 class="playfair-display text-white">Who are our customers and partners</h3>
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

    <h4 class="subtitle blue">Our Community</h4>
    <h3>Experts in the technologies you need for your projects</h3>
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
  <h5 style="text-align: center;">Contact Us</h5>
  <p style="text-align: center;" class="text-white">If you have any questions, suggestions, or would like to work with us, feel free to reach out. We’re here to help and will get back to you as soon as possible.</p>

  <br>
  <br>
  <div class="container">
    <div class="row gy-4 flex-row-reverse">
      <div class="col-xl-6">
        <div class="ps-xl-5">
          <form action="https://html.themehour.net/faren/demo/mail.php" method="POST" class="contact-form2 ajax-contact">
            <div class="title-area">
              <h2 class="sec-title style2 split-text text-white">Let’s <span class="title1">Work</span><span class="title4">Together</span></h2>
              <p class="contact-text text-white mt-30">Minimalist & Luxury Interiors combine the clean simplicity of minimalism with the refined elegance of luxury design. This style is perfect for those who appreciate both functionality.</p>
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
              <div class="col-12 form-group"><input type="checkbox" id="html"> <label for="html">I agree with the privacy policy</label></div>
              <div class="form-btn mt-20 col-12  text-white"><button class="th-btn th-border">Submit Now</button></div>
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

        <h4 class="text-center">TESTIMONIALS</h4>

        <h2 class="style2 split-text text-white">Client Feedback & <span class="fs-160"></span><span class="title3">Success Stories</span></h2>
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
                <p class="box-text">“John was wonderful to work with and more than capable in all aspects. I found him and his employees to be very creative, organized and professional…. I see John as an architect who truly loves his work. John has a true passion in the creative.”</p>
                <div class="box-profile">
                  <div class="box-author"><img src="assets/img/testimonial/testi_3_1.jpg" alt="Avater"></div>
                  <div class="box-info">
                    <h3 class="box-title">Alex James</h3><span class="box-desig">Company Owner</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="testi-box">
                <div class="box-quote"><img src="assets/img/icon/quote3.svg" alt=""></div>
                <p class="box-text">“John was wonderful to work with and more than capable in all aspects. I found him and his employees to be very creative, organized and professional…. I see John as an architect who truly loves his work. John has a true passion in the creative.”</p>
                <div class="box-profile">
                  <div class="box-author"><img src="assets/img/testimonial/testi_3_2.jpg" alt="Avater"></div>
                  <div class="box-info">
                    <h3 class="box-title">James Thompson</h3><span class="box-desig">Company Owner</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="testi-box">
                <div class="box-quote"><img src="assets/img/icon/quote3.svg" alt=""></div>
                <p class="box-text">“John was wonderful to work with and more than capable in all aspects. I found him and his employees to be very creative, organized and professional…. I see John as an architect who truly loves his work. John has a true passion in the creative.”</p>
                <div class="box-profile">
                  <div class="box-author"><img src="assets/img/testimonial/testi_3_3.jpg" alt="Avater"></div>
                  <div class="box-info">
                    <h3 class="box-title">Aditi Banerjee</h3><span class="box-desig">Company Owner</span>
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
          <h4 class="text-anime text-white">Instagram</h4>
          <h3>Our Instagram Gallery</h3>
        </div>
      </div>
    </div>

    <div class="row justify-content-center align-items-center">
      <div class="col-10">
        <div class="row gallery-row filter-active justify-content-between">

          @forelse($instagramImages as $insta)
          <div class="col-xl-auto col-md-6 filter-item">
            <div class="gallery-box">
              <div class="box-img global-img">
                <img src="{{ asset($insta->image) }}" alt="Instagram Image">
              </div>
            </div>
          </div>
          @empty
              <p class="text-center text-white">No Instagram Images Available</p>
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
          <h4 class="text-anime text-white">OUR GALLERY</h4>
          <h4>Through a Unique Combination of Engineering</h4>
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
          <button data-slider-prev="#gallerySlider4" class="slider-arrow style2 default slider-prev">
            <img src="{{ asset('assets/img/icon/right-arrow3.svg') }}" alt="">
          </button>



          <button data-slider-next="#gallerySlider4" class="slider-arrow style2 default slider-next">
            <img src="{{ asset('assets/img/icon/left-arrow2.svg') }}" alt="">
          </button>
        </div>

      </div>
    </div>
  </div>
</section>


@endsection