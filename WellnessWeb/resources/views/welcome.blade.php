<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> Go Professional</title>
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
                        <img class="logo logo-dark" alt="Total-Wellness"
                            src="{{ asset('assets/home/img/x.png') }}" />
                    </a>
                </div>
                <div class="module widget-handle mobile-toggle right visible-sm visible-xs">
                    <i class="ti-menu"></i>
                </div>
                <div class="module-group right">
                    <div class="module left">
                        <ul id="block-foundry-onepagemenu" class="clearfix menu nav navbar-nav">
                            <li>
                                <a class="back-to-top inner-link" href="#top">
                                    Home
                                </a>
                            </li>


                            <li>
                                <a href="#services">
                                    Services
                                </a>

                            </li>
                        
                           
                            <li>
                                <a class="inner-link" href="{{ url('/blog') }}" data-scroll>
                                    Blog
                                </a>
                            </li>
 <li>

                                <a class="inner-link" href="{{ route('register') }}" data-scroll>
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

        <section class="cover fullscreen image-slider slider-all-controls controls-inside parallax"
            style="height: 903px;">
            <ul class="slides">
                <li class="overlay image-bg bg-dark"
                    style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;">

                    <div class="background-image-holder fadeIn"
                        style="background: url(&quot;assets/home/img/1.png&quot;); top: -55px; transform: translate3d(0px, 0px, 0px);">
                        <img alt="background-image" src="{{ asset('assets/home/img/1.png') }}" draggable="false"
                            style="display: none;">
                    </div>

                    <div class="container v-align-transform">
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1 text-center">
                                <h1 class="mb40 mb-xs-16 large">Go Professional Web Portal
                                </h1>
                                <p class="lead mb40">
                                    An AI-powered aesthetic marketplace delivering smart,
                                    <br>comprehensive solutions for the future of aesthetics
                                </p>
                                <a class="btn btn-lg btn-filled inner-link" href="#services">Start Exploring</a>
                            </div>
                        </div>
                        <!--end of row-->
                    </div>
                    <!--end of container-->
                </li>
                <li class="overlay image-bg flex-active-slide"
                    style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
                    <div class="background-image-holder fadeIn"
                        style="background: url(&quot;assets/home/img/2.png&quot;); top: -55px; transform: translate3d(0px, 0px, 0px);">
                        <img alt="background-image" src="{{ asset('assets/home/img/2.png') }}"
                            draggable="false" style="display: none;">
                    </div>
                    <div class="container v-align-transform">
                        <div class="row">
                            <div class="col-sm-offset-1 text-center col-sm-10">
                                <h1 class="mb40 mb-xs-16 large">Connect. Empower. Succeed
                                </h1>
                                <p class="lead mb40">
                                    Uniting professionals, service providers, academics, and clients<br>
                                    through certified memberships, advanced technologies, and data-driven tools
                                </p>
                                <a class="btn btn-lg btn-white inner-link" href="#projects">Start Exploring</a>

                                <!--end of row-->

                            </div>
                        </div>
                        <!--end of row-->
                    </div>
                    <!--end of container-->
                </li>
            </ul>

            <ul class="flex-direction-nav">
                <li><a class="flex-prev" href="#">Previous</a></li>
                <li><a class="flex-next" href="#">Next</a></li>
            </ul>
        </section>

        <a id="services"></a>
        <section class="paragraph paragraph--type--paragraph-block paragraph--view-mode--default">
            <div class="container  ">

                <div class="col-sm-12 mb48 mb-xs-32 text-center">
                    <h3 class="uppercase mb8"> Our Services</h3>
                    <p class="lead mb20">
                            We offer a comprehensive and diverse range of services in the medical aesthetics field.
                        </p>
                </div>

                <div class="row">

                    <div class="col-sm-6">
                        <div class="feature feature-1 boxed text-center">
                            <div class="text-center"><i class="ti-book icon">‌</i>
                                <h4>Educational Services</h4>
                            </div>

                            <p class="text-center">AI-driven personalized training paths tailored to individual career
                                goals in the aesthetic industry.</p>

                            <a class="btn btn-sm" href="{{ route('courses') }}">
                                Learn More
                            </a>
                        </div>

                        <!--end of feature-->
                    </div>

                    <div class="col-sm-6">
                        <div class="feature feature-1 boxed text-center">
                            <div class="text-center"><i class="ti-pencil-alt icon">‌</i>

                                <h4>Hiring Platform</h4>
                            </div>

                            <p class="text-center">AI-driven recruitment system Connect qualified candidates with top
                                aesthetic clinics and companies worldwide. </p>
                            <a class="btn btn-sm" href="#">Learn More</a>
                        </div>
                        <!--end of feature-->
                    </div>

                    <div class="col-sm-6">
                        <div class="feature feature-1 boxed text-center">
                            <div><i class="ti-blackboard icon">‌</i>

                                <h4>Maintinance Support</h4>
                            </div>

                            <p>We offer maintaining aesthetic equipment. Predicting maintenance needs, scheduling
                                services.</p>
                            <a class="btn btn-sm" href="{{ route('maintenance_request') }}">Learn More</a>
                        </div>
                        <!--end of feature-->
                    </div>

                    <div class="col-sm-6">
                        <div class="feature feature-1 boxed text-center">
                            <div class="text-center"><i class="ti-medall icon">‌</i>

                                <h4>Trade-in Program</h4>
                            </div>

                            <p>A smart Trade-In Program to help aesthetic service providers easily upgrade their
                                technology.</p>
                            <a class="btn btn-sm" href="{{ route('tradein') }}">Learn More</a>
                        </div>
                        <!--end of feature-->
                    </div>
                </div>



            </div>
        </section>

        <a id="projects"></a>
        <section class="bg-secondary">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h4 class="uppercase mb16">Our Impact</h4>
                        <p class="lead mb64">
                            Shaping the future of the aesthetic industry through innovation and intelligence
                        </p>
                    </div>
                </div>
                <!--end of row-->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="lightbox-grid square-thumbs" data-gallery-title="Gallery">
                            <ul>
                                <li>
                                    <a href="{{ asset('assets/home/img/4.jpg') }}" data-lightbox="Gallery">
                                        <div class="background-image-holder fadeIn"
                                            style="background-image: url('{{ asset('assets/home/img/4.jpg') }}');">
                                            <img alt="image" class="background-image"
                                                src="{{ asset('assets/home/img/4.jpg') }}"
                                                style="display: none;">
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ asset('assets/home/img/5.jpg') }}"
                                        data-lightbox="Gallery">
                                        <div class="background-image-holder fadeIn"
                                            style="background-image: url('{{ asset('assets/home/img/5.jpg') }}');">
                                            <img alt="image" class="background-image"
                                                src="{{ asset('assets/home/img/5.jpg') }}"
                                                style="display: none;">
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ asset('assets/home/img/6.jpg') }}" data-lightbox="Gallery">
                                        <div class="background-image-holder fadeIn"
                                            style="background-image: url('{{ asset('assets/home/img/6.jpg') }}');">
                                            <img alt="image" class="background-image"
                                                src="{{ asset('assets/home/img/6.jpg') }}"
                                                style="display: none;">
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ asset('assets/home/img/7.jpg') }}"
                                        data-lightbox="Gallery">
                                        <div class="background-image-holder fadeIn"
                                            style="background-image: url('{{ asset('assets/home/img/7.jpg') }}');">
                                            <img alt="image" class="background-image"
                                                src="{{ asset('assets/home/img/7.jpg') }}"
                                                style="display: none;">
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ asset('assets/home/img/8.jpg') }}" data-lightbox="Gallery">
                                        <div class="background-image-holder fadeIn"
                                            style="background-image: url('{{ asset('assets/home/img/8.jpg') }}');">
                                            <img alt="image" class="background-image"
                                                src="{{ asset('assets/home/img/8.jpg') }}"
                                                style="display: none;">
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ asset('assets/home/img/9.jpg') }}" data-lightbox="Gallery">
                                        <div class="background-image-holder fadeIn"
                                            style="background-image: url('{{ asset('assets/home/img/9.jpg') }}');">
                                            <img alt="image" class="background-image"
                                                src="{{ asset('assets/home/img/9.jpg') }}"
                                                style="display: none;">
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ asset('assets/home/img/10.png') }}" data-lightbox="Gallery">
                                        <div class="background-image-holder fadeIn"
                                            style="background-image: url('{{ asset('assets/home/img/10.png') }}');">
                                            <img alt="image" class="background-image"
                                                src="{{ asset('assets/home/img/10.png') }}"
                                                style="display: none;">
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ asset('assets/home/img/11.png') }}" data-lightbox="Gallery">
                                        <div class="background-image-holder fadeIn"
                                            style="background-image: url('{{ asset('assets/home/img/11.png') }}');">
                                            <img alt="image" class="background-image"
                                                src="{{ asset('assets/home/img/11.png') }}"
                                                style="display: none;">
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!--end of lightbox gallery-->
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </section>

        <a id="vision"></a>
        <section class="image-bg overlay parallax">
            <div class="background-image-holder fadeIn" style="transform: translate3d(0px, 416.5px, 0px);"
                style="background-image: url('{{ asset('assets/home/img/12.png') }}');">
                <img alt="Background Image" class="background-image" src="{{ asset('assets/home/img/12.png') }}"
                    style="display: none;">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h3 class="uppercase mb64 mb-xs-32">Our Value</h3>
                    </div>
                </div>
                <!--end of row-->
                <div class="row"> 
    <div class="col-md-4 col-md-offset-2 col-sm-6 p3">
        <div class="feature feature-1 boxed"
             style="background-color:lightgrey; color:#000000;">
             
            <div class="text-center">
                <i class="ti-rocket icon" style="color:#4b2e83;"></i>
                <h5 class="uppercase mb16" style="color:#4b2e83;">
                    Mission
                </h5>
            </div>

            <p class="text-center" style="color:#000000;">
                To provide an AI-Powered marketplace that connects aesthetic medical professionals delivering customized solutions.
            </p>
        </div>
        <!--end of feature-->
    </div>

    <div class="col-md-4 col-sm-6 p0">
        <div class="feature feature-1 boxed"
             style="background-color:lightgrey; color:#000000;">
             
            <div class="text-center">
                <i class="ti-target icon" style="color:#4b2e83;"></i>
                <h5 class="uppercase mb16" style="color:#4b2e83;">
                    Vision
                </h5>
            </div>

            <p class="text-center" style="color:#000000;">
                To become the premier AI-powered aesthetic marketplace in the UAE and the Arab region for advanced aesthetic and medical solutions.
            </p>
        </div>
        <!--end of feature-->
    </div>
</div>

        </section>

<br>
        <section class="info-section">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
        }

        .info-section {
            padding: 80px 20px;
background: #f9fafb;
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #fff;
        }

        .section-title {
            font-size: 32px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 50px;
            color: #29193b;
        }

        .info-container {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            max-width: 1200px;
            justify-content: center;
        }

        .info-card {
            background: #fff;
            color: #2b2e34; 
            width: 320px;
            height: 420px;
            border-radius: 50% / 25%; 
            padding: 70px 25px 25px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            position: relative;
            overflow: visible;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.2);
        }

        .card-image {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            overflow: hidden;
            border: 4px solid #fff;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
            position: absolute;
            top: -65px;
            background: #eee;
        }

        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover; 
        }

        .info-card h3 {
            margin: 80px 0 15px; 
            font-size: 20px;
            font-weight: 700;
        }

        .info-card p {
            font-size: 15px;
            line-height: 1.6;
            color: #555;
        }

        @media (max-width: 768px) {
            .info-card {
                width: 90%;
                height: auto;
                border-radius: 30px;
                padding: 70px 25px 25px;
            }

            .card-image {
                width: 110px;
                height: 110px;
                top: -55px;
            }

            .section-title {
                font-size: 28px;
                margin-bottom: 35px;
            }
        }
    </style>

    <h2 class="section-title">Empowering Aesthetic & Medical Excellence</h2>
<br><br>
    <div class="info-container">

        <div class="info-card">
            <div class="card-image">
                <img src="{{ asset('assets/home/img/14.png') }}" alt="AI Marketplace">
            </div>
            <h3>AI-Powered Aesthetic Marketplace</h3>
            <p>
                Go Professional is an AI-powered marketplace delivering intelligent solutions
                for the aesthetic and medical industry. We connect experts, providers, and clients
                through data-driven tools.
            </p>
        </div>

        <div class="info-card">
            <div class="card-image">
                <img src="{{ asset('assets/home/img/13.png') }}" alt="Medical Solutions">
            </div>
            <h3>Aesthetic & Medical Solutions</h3>
            <p>
                With over a decade of experience, our team enhances patient care
                through advanced technology and evidence-based methods,
                ensuring safe and personalized outcomes.
            </p>
        </div>

    </div>
</section>

<br>

        <section class="bg-primary">
            <div class="container">
                <div class="row mb64 mb-xs-24">
                    <div class="col-sm-12 text-center">
                        <h2 class="uppercase color-secondary">Newsletter Sign-up
</h2>
                        <p class="lead">
                           Sign up with your email address to receive news and updates.

                        </p>
                    </div>
                </div>
                <!--end of row-->
                <div class="row mb24">
                    <div class="col-sm-6 col-sm-offset-3">

                        <form class="halves newsletter" method="POST" action="{{ route('newsletter.subscribe') }}">
                            @csrf
                            <input type="text" name="email" id="name"
                                class="mb0 validate-email validate-required signup-email-field"
                                placeholder="Email Address">
                            <button type="submit" class="btn-white mb0">Register</button>

                        </form>

                    </div>
                </div>
                <!--end of row-->
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <div id="subscribtionAlert"></div>
                        <p class="fade-half">We respect your privacy.

</p>
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </section>

        <a id="team"></a>
        <section class="team-section">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
        }

        .team-section {
            background-color: #f5f5f5;
            padding: 100px 20px;
            color: #333;
        }

        .team-section h4 {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 15px;
            text-transform: uppercase;
            color: #4b0082; 
        }

        .team-section .lead {
            font-size: 16px;
            margin-bottom: 60px;
            color: #555;
        }

        .team-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
        }

        .team-card {
            position: relative;
            width: 260px;
            border-radius: 20px;
            overflow: hidden;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            background-color: #fff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .team-card img {
            width: 100%;
            height: 260px;
            object-fit: cover;
        }

        .team-card .title {
            padding: 20px 15px;
        }

        .team-card h5 {
            margin: 0 0 5px;
            font-size: 18px;
            font-weight: 700;
            color: #4b0082;
        }

        .team-card span {
            font-size: 14px;
            color: #777;
        }

        /* Hover effect */
        .team-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .team-row {
                flex-direction: column;
                align-items: center;
            }

            .team-card {
                width: 80%;
                margin-bottom: 30px;
            }
        }
    </style>

    <div class="container">
        <div class="row text-center mb64">
            <div class="col-sm-12">
                <h4 class="uppercase">Meet our team</h4>
                <p class="lead">
                    Dedicated professionals driving our vision
                </p>
            </div>
        </div>

        <div class="team-row">
            <div class="team-card">
                <img src="{{ asset('assets/home/img/rasheed.png') }}" alt="Rashid Azzouni">
                <div class="title">
                    <h5>Rashid Azzouni</h5>
                    <span>Founder & CEO</span>
                </div>
            </div>

            <div class="team-card">
                <img src="{{ asset('assets/home/img/Fadel.png') }}" alt="Fadel Masoud">
                <div class="title">
                    <h5>Fadel Masoud</h5>
                    <span>Project Manager</span>
                </div>
            </div>
        </div>
    </div>
</section>


        <a id="contact_us"></a>
      <section class="contact-section-enhanced">

<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
    }

    .contact-section-enhanced {
        background-color: #fff;
        padding: 100px 20px;
        color: #333;
    }

    .contact-section-enhanced h4 {
        font-size: 26px;
        font-weight: 400;
        margin-bottom: 15px;
        text-transform: uppercase;
        color: #4b0082; 
    }

    .contact-section-enhanced p {
        font-size: 15px;
        margin-bottom: 15px;
        line-height: 1.6;
        color: #555;
    }

    .contact-section-enhanced hr {
        border: none;
        border-top: 1px solid #ddd;
        margin: 15px 0;
    }

    .contact-line {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 12px;
    }

    .icon-circle {
        width: 28px;
        height: 28px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        background-color: #ddd;
        color: #4b0082;
        font-size: 14px;
        flex-shrink: 0;
    }

    .contact-line a {
        color: #555;
        text-decoration: none;
        border-bottom: 1px solid #ccc;
        padding-bottom: 2px;
        transition: all 0.3s ease;
    }

    .contact-line a:hover {
        color: #4b0082;
        border-color: #4b0082;
    }

    /* نموذج الاتصال */
    #contactForm {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        align-items: flex-start;
    }

    #contactForm input[type="text"],
    #contactForm input[type="email"] {
        flex: 1 1 calc(50% - 6px);
        padding: 12px 20px;
        border-radius: 20px; 
        border: 1px solid #ccc;
        font-size: 15px;
        transition: all 0.3s ease;
    }

    #contactForm textarea {
        flex: 1 1 100%;
        padding: 12px 20px;
        border-radius: 20px;
        border: 1px solid #ccc;
        font-size: 15px;
        resize: vertical;
        min-height: 120px;
    }

    #contactForm input:focus,
    #contactForm textarea:focus {
        outline: none;
        border-color: #4b0082;
        box-shadow: 0 0 8px rgba(75,0,130,0.3);
        background-color: #fff;
    }

   #contactForm button {
    border-radius: 50px;      
    font-size: 15px;                 
    color: #fff;
    background-color: #4b0082;
    

#contactForm button:hover {
    background-color: #3a006e;
    transform: translateY(-2px);
}


    .privacy-text {
        flex-basis: 100%;
        font-size: 12px;
        color: #888;
        margin-top: 8px;
    }

    @media (max-width: 768px) {
        #contactForm {
            flex-direction: column;
        }

        #contactForm input,
        #contactForm textarea
        {
            flex: 1 1 100%;
            margin-left: 0;
        }
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-5 contact-info">
            <h3 style="color:#4b0082; ">Get In Touch</h3>
            <p>We’re here to help and answer any questions. Connect with us and let's build something amazing together!</p>
            <br>

            <div class="contact-line">
                <span class="icon-circle">📍</span>
                <a href="https://www.google.com/maps/place/Hamriya+Free+Zone+-+Sharjah+-+United+Arab+Emirates/@25.4542306,55.3895356,12z/data=!3m1!4b1!4m6!3m5!1s0x3ef5f846749cfe5d:0xce367ed9dcffbc24!8m2!3d25.4597221!4d55.4925864!16s%2Fg%2F1ptvwdvxv?entry=ttu&g_ep=EgoyMDI1MTIwOS4wIKXMDSoKLDEwMDc5MjA2OUgBUAM%3D">P7-ELOB Deluxe Office No., Hamriyah Free Zone, Sharjah, UAE</a>
            </div>

            <div class="contact-line">
                <span class="icon-circle">☎️</span>
                <a href="tel:+971528704669">+971 52 870 4669</a>
            </div>

            <div class="contact-line">
                <span class="icon-circle">📩</span>
                <a href="mailto:info@totalwellness-international.com">info@totalwellness-international.com</a>
            </div>
        </div>
        <div class="col-sm-6 col-md-5 col-md-offset-1">
            <form id="contactForm" action="{{ route('contact.send') }}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="text" name="email" placeholder="Email Address" required>
                <textarea name="message" placeholder="Message" required></textarea>
                <button type="submit">Send</button>
                <p class="privacy-text">We respect your privacy. We won't share your email.</p>
            </form>
        </div>
    </div>
</div>

</section>



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
        $(function() {

            $('.nav-container a[href^="#"]').on('click', function(e) {
                var targetId = $(this).attr('href');

                // Ignore empty or invalid hashes
                if (targetId.length <= 1) return;

                var $target = $(targetId);
                if (!$target.length) return;

                e.preventDefault();
                e.stopImmediatePropagation(); // ⬅️ VERY important for Foundry

                var navHeight = $('.nav-bar').outerHeight() || 0;

                $('html, body')
                    .stop(true)
                    .animate({
                            scrollTop: $target.offset().top + 1
                        },
                        500,
                        'swing'
                    );
            });

        });
    </script>

    @section('js')
        <script>
            $('#contactForm').on('submit', function(e) {
                e.preventDefault();
                let form = $(this);
                let alertBox = $('#contactAlert');
                alertBox.html('');

                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    data: form.serialize(),
                    beforeSend: function() {
                        alertBox.html('<div class="alert alert-info">Sending...</div>');
                    },
                    success: function(response) {
                        alertBox.html('<div class="alert alert-success">' + response.message + '</div>');
                        form.trigger('reset');
                    },
                    error: function(xhr) {
                        let msg = 'Something went wrong. Please try again.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            msg = xhr.responseJSON.message;
                        }
                        alertBox.html('<div class="alert alert-danger">' + msg + '</div>');
                    }
                });
            });
        </script>

        <script>
            $('.newsletter').on('submit', function(e) {
                e.preventDefault();

                let form = $(this);
                let messageBox = $('#subscribtionAlert'); // ✅ correct selector

                messageBox.html('');

                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    data: form.serialize(),
                    success: function(res) {
                        messageBox.html(
                            `<div class="alert alert-success">${res.message}</div>`
                        );
                        form.trigger('reset');
                    },
                    error: function(xhr) {
                        let msg = 'Something went wrong.';

                        if (xhr.status === 422 && xhr.responseJSON?.errors?.email) {
                            msg = xhr.responseJSON.errors.email[0];
                        }

                        messageBox.html(
                            `<div class="alert alert-danger">${msg}</div>`
                        );
                    }
                });
            });
        </script>



    </body>

    </html>
