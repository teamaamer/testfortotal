<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> Careers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/home/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/home/css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/home/css/flexslider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/home/css/lightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/home/css/ytplayer.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/home/css/theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/home/css/custom.css') }}" />
    <link
        href='http://fonts.googleapis.com/css?family=Lato:300,400%7CRaleway:100,400,300,500,600,700%7COpen+Sans:400,500,600'
        rel='stylesheet' type='text/css'>

    <style>
        /* Disable active & focus color in navbar */
        .nav-bar .menu>li>a,
        .nav-bar .menu>li>a:hover,
        .nav-bar .menu>li>a:focus,
        .nav-bar .menu>li>a:active,
        .nav-bar .menu>li.active>a {
            color: #ffffff !important;
            /* or your exact color */
            background: transparent !important;
            outline: none !important;
        }

        .fade-1-4 a {
            color: #3C3277 !important;
        }

        .nav-avatar {
            width: 32px;
            height: 32px;
            object-fit: cover;
        }
    </style>

    <style>
        .container {
            max-width: 900px;
            margin: auto;
            padding: 40px 20px;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 40px;
        }

        /* Countries */
        .countries {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .country-box {
            border: 1px solid #ddd;
            padding: 20px;
            cursor: pointer;
            border-radius: 8px;
            min-width: 120px;
            text-align: center;
            transition: 0.3s;
        }

        .country-box:hover {
            background: #f5f5f5;
        }

        .hidden {
            display: none;
        }

        /* Filter bar */
        .filters {
            display: flex;
            gap: 16px;
            margin-bottom: 20px;
            align-items: center;
        }

        .filter {
            background: #f1f1f1;
            padding: 8px 12px;
            border-radius: 6px;
            font-weight: bold;
        }

        /* Jobs */
        .jobs li {
            list-style: none;
            padding: 12px;
            border-bottom: 1px solid #eee;
            cursor: pointer;
        }

        .jobs li:hover {
            background: #fafafa;
        }

        /* Career Path */
        .career-path {
            margin-top: 30px;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }

        .step {
            margin-bottom: 12px;
        }

        .tick {
            color: green;
            font-weight: bold;
        }

        .cta {
            margin-top: 20px;
        }

        .cta a {
            display: inline-block;
            padding: 10px 16px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        .filter {
    background: #f1f1f1;
    padding: 8px 12px;
    border-radius: 20px;
    font-weight: bold;
    display: inline-flex;
    align-items: center;
}

    </style>

</head>

<body class="scroll-assist">
    <div class="nav-container bg-dark" style="min-height: 55px;">
        <a id="top"></a>
        <nav class="bg-primary">
            <div class="nav-bar">
                <div class="module left">
                    <a href="{{ url('/') }}">
                        <img class="logo logo-light" alt="Total-Wellness"
                            src="{{ asset('assets/home/img/logo-light.png') }}" />
                        <img class="logo logo-dark" alt="Total-Wellness" src="{{ asset('assets/home/img/x.png') }}" />
                    </a>
                </div>
                <div class="module widget-handle mobile-toggle right visible-sm visible-xs">
                    <i class="ti-menu"></i>
                </div>
                <div class="module-group right">
                    <div class="module left">
                        <ul id="block-foundry-onepagemenu" class="clearfix menu nav navbar-nav">
                            <li>
                                <a href="{{ url('/#top') }}">
                                    Home
                                </a>
                            </li>

                            <li>
                                <a href="{{ url('/#services') }}">
                                    Services
                                </a>
                            </li>

                            <li>
                                <a href="{{ url('/#blog') }}">
                                    Blog
                                </a>
                            </li>

                            <li>
                                <a href="{{ url('/goprofessional') }}">
                                    Join Us
                                </a>
                            </li>


                        </ul>
                    </div>
                    <!--end of menu module-->
                    <div class="module widget-handle cart-widget-handle left">
                        <div class="cart">
                            <i class="ti-bag"></i>
                            <span class="label number">2</span>
                            <span class="title">Shopping Cart</span>
                        </div>
                        <div class="function">
                            <div class="widget">
                                <h6 class="title">Shopping Cart</h6>
                                <hr>
                                <ul class="cart-overview">
                                    <li>
                                        <a href="#">
                                            <img alt="Product" src="{{ asset('/uploads/products/device1.png') }}" />
                                            <div class="description">
                                                <span class="product-title">Device 1</span>
                                                <span class="price number">$39.90</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img alt="Product" src="{{ asset('/uploads/products/device1.png') }}" />
                                            <div class="description">
                                                <span class="product-title">Device 2</span>
                                                <span class="price number">$249.50</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <hr>
                                <div class="cart-controls">
                                    <a class="btn btn-sm btn-filled" href="#">Checkout</a>
                                    <div class="list-inline pull-right">
                                        <span class="cart-total">Total: </span>
                                        <span class="number">$289.40</span>
                                    </div>
                                </div>
                            </div>
                            <!--end of widget-->
                        </div>
                    </div>
                    <div class="module widget-handle language left">
                        <ul class="menu">
                            <li>

                                @auth

                                    <a href="{{ url('dashboard/accounts/' . Auth::user()->account->id) }}">
                                        <img src="{{ asset('/uploads/avatars/' . Auth::user()->account->avatar) }}"
                                            class="img-circle elevation-2 nav-avatar" alt="User Image"> </a>
                                @else
                                    <a href="{{ url('/dashboard') }}">
                                        <i class="ti-lock"></i> </a>

                                @endauth
                            </li>


                        </ul>
                    </div>
                </div>
                <!--end of module group-->
            </div>
        </nav>
    </div>
    <div class="main-container">

                <section class="page-title page-title-2 image-bg overlay parallax">
            <div class="background-image-holder">
                <img alt="Background Image" class="background-image" src="{{ asset('assets/home/img/15.png') }}" />
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="uppercase mb8">Jobs</h2>
                    </div>
                    <div class="col-md-6 text-right">
                        <ol class="breadcrumb breadcrumb-2">
                            <li>
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="active">Jobs</li>
                        </ol>
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </section>
        

        <section>
            <div class="container">


                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h4 class="uppercase mb16">Your dream job – help us find it</h4>
                        <p class="lead mb64">
                            Choose a country, explore job titles, and follow the career path
                        </p>
                    </div>
                </div>

                <!-- Countries -->
                <div id="countriesSection" class="countries">
                    <div class="country-box" onclick="selectCountry('UAE')">UAE</div>
                    <div class="country-box" onclick="selectCountry('Saudi Arabia')">Saudi Arabia</div>
                    <div class="country-box" onclick="selectCountry('Qatar')">Qatar</div>
                </div>

                <!-- Jobs Section -->
                <div id="jobsSection" class="hidden">
<div class="filters">
    <div class="filter" id="countryFilter">
        <span id="selectedCountry"></span>
        <span style="cursor:pointer;margin-left:8px;" onclick="clearCountry()">✕</span>
    </div>

    <div class="filter hidden" id="jobFilter">
        <span id="selectedJob"></span>
        <span style="cursor:pointer;margin-left:8px;" onclick="clearJob()">✕</span>
    </div>
</div>

                    <ul class="jobs">
                        <h4 class="uppercase mb16">Avaliable Jobs</h4>
                        <li onclick="selectJob('Laser technician')">Laser technician</li>
                        <li onclick="selectJob('Dermatology Doctors')">Dermatology Doctors</li>
                        <li onclick="selectJob('Laser Therapist')">Laser Therapist</li>
                        <li onclick="selectJob('Gynecology Doctors')">Gynecology Doctors</li>
                        <li onclick="selectJob('Dentist')">Dentist</li>
                        <li onclick="selectJob('General Practical')">General Practical</li>
                        <li onclick="selectJob('Registered Nurse')">Registered Nurse</li>
                    </ul>
                </div>

                <!-- Career Path -->
                <div id="careerSection" class="career-path hidden">
                    <h3>Career Path</h3>

                    <div class="step">1️⃣ Enroll in the required course
                              <span class="tick">✔ Required</span>
</div>
                    <div class="step">
                        2️⃣ DHA Accreditation <a href="www.google.com"> Install it here </a>
                        <span class="tick">✔ Required</span>
                    </div>
                    <div class="step">3️⃣ We help you apply for jobs</div>

                    <div class="cta">
                        <a href="{{url('/courses/19')}}">Enroll in Course</a>
                        <a href="{{ url('/#contact_us') }}" style="background:#28a745; margin-left:10px;">
                            Contact Us
                        </a>
                    </div>
                </div>

            </div>
        </section>



        <br><br>

        <footer class="footer-2 bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 text-center">

                        <img alt="Logo" class="image-xs mb32 fade-on-hover"
                            src="{{ asset('assets/home/img/x.png') }}" </a>
                        <h5 class="fade-1-4"> © 2026 TotalWellness. All rights reserved. Information provided is
                            for educational purposes only and does not replace professional medical advice.

                        </h5>
                        <ul class="list-inline social-list mb0">

                            <li>
                                <a href="#">
                                    <i class="ti-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="ti-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/company/total-wellness-international">
                                    <i class="ti-linkedin"></i>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </footer>
    </div>
    <script src="{{ asset('assets/home/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/flickr.js') }}"></script>
    <script src="{{ asset('assets/home/js/flexslider.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/masonry.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/twitterfetcher.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/spectragram.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/ytplayer.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/countdown.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/smooth-scroll.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/parallax.js') }}"></script>
    <script src="{{ asset('assets/home/js/scripts.js') }}"></script>

    <script>
      
 
     function selectCountry(country) {
        document.getElementById('countriesSection').classList.add('hidden');
        document.getElementById('jobsSection').classList.remove('hidden');
        document.getElementById('selectedCountry').innerText = country;
    }

    function selectJob(job) {
        document.getElementById('selectedJob').classList.remove('hidden');
        document.getElementById('selectedJob').innerText = job;
        document.getElementById('careerSection').classList.remove('hidden');
    }

     function selectCountry(country) {
        // Hide countries
        document.getElementById('countriesSection').classList.add('hidden');

        // Show jobs section
        document.getElementById('jobsSection').classList.remove('hidden');

        // Set country filter
        document.getElementById('selectedCountry').innerText = country;
    }

    function clearCountry() {
        // Reset everything
        document.getElementById('countriesSection').classList.remove('hidden');
        document.getElementById('jobsSection').classList.add('hidden');
        document.getElementById('careerSection').classList.add('hidden');

        // Clear filters
        document.getElementById('selectedCountry').innerText = '';
        document.getElementById('selectedJob').innerText = '';

        // Hide job filter
        document.getElementById('jobFilter').classList.add('hidden');
    }

    function selectJob(job) {
        // Show job filter
        document.getElementById('jobFilter').classList.remove('hidden');
        document.getElementById('selectedJob').innerText = job;

        // Show career path
        document.getElementById('careerSection').classList.remove('hidden');
    }

    function clearJob() {
        // Hide job filter
        document.getElementById('jobFilter').classList.add('hidden');

        // Hide career path
        document.getElementById('careerSection').classList.add('hidden');

        // Clear job text
        document.getElementById('selectedJob').innerText = '';
    }
 
</script>

</body>

</html>
