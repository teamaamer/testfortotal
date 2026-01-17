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
                                <a class="inner-link" href="#" data-scroll>
                                    Blog
                                </a>
                            </li>
 <li>
                                <a class="inner-link" href="{{ url('/goprofessional') }}" data-scroll>
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
    <style>
.login-layout {
    background: linear-gradient(
        180deg,
        #2b1f5c 0%,
        #3c3277 40%,
        #f4f1fb 100%
    );
    font-family: 'Lato', 'Open Sans', sans-serif;
}

.login-wrapper {
    min-height: calc(100vh - 140px); 
    display: flex;
}

.login-form-area {
    flex: 1;
    background: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 60px 30px;
}

.login-box {
    width: 100%;
    max-width: 420px;
}

.login-logo {
    text-align: center;
    margin-bottom: 30px;
}

.login-logo img {
    height: 44px;
    margin-bottom: 15px;
}

.login-logo h2 {
    font-size: 22px;
    font-weight: 500;
    color: #3c3277;
    margin-bottom: 6px;
}

.login-logo p {
    font-size: 14px;
    color: #777;
}

.login-box-msg {
    text-align: center;
    font-size: 15px;
    margin-bottom: 25px;
    color: #444;
}

.form-control {
    border-radius: 30px;
    padding: 12px 18px;
    font-size: 14px;
    border: 1px solid #ddd;
}

.form-control:focus {
    border-color: #3c3277;
    box-shadow: 0 0 0 0.15rem rgba(60,50,119,.2);
}

.btn-primary {
    background: #3c3277 !important;
    border-color: #3c3277 !important;
    border-radius: 30px;
    font-size: 15px;
    transition: .3s ease;
}

.btn-primary:hover {
    background: #2b1f5c !important;
    border-color: #2b1f5c !important;
    transform: translateY(-1px);
}

/* ===== LINKS ===== */
.login-links {
    margin-top: 25px;
    text-align: center;
    font-size: 14px;
}

.login-links a {
    color: #3c3277;
}

.login-links a:hover {
    text-decoration: underline;
}

.login-image-area {
    flex: 1;
    background:
        linear-gradient(rgba(43,31,92,.75), rgba(43,31,92,.75)),
        url("{{ asset('assets/home/img/18.jpg') }}") center/cover no-repeat;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 60px;
    color: #fff;
}

.login-image-content {
    max-width: 420px;
    text-align: center;
}

.login-image-content p {
    font-size: 16px;
    line-height: 1.7;
    opacity: .95;
}

@media (max-width: 991px) {
    .login-image-area {
        display: none;
    }

    .login-wrapper {
        min-height: auto;
    }
}
</style>
<style>
.input-group {
    width: 100%;
}

.input-group .form-control {
    border-radius: 30px !important;
    height: 48px;
}

.input-group-append {
    display: none; 
}

.btn-block {

    border-radius: 30px !important;
    font-weight: 500;
    letter-spacing: .3px;
}

.login-box .card,
.login-card-body {
    background: transparent;
    box-shadow: none;
    border: none;
}

.input-group.mb-3,
.input-group.mb-4 {
    margin-bottom: 18px !important;
}
</style>

</head>

    <div class="login-wrapper">

        <!-- FORM SIDE -->
        <div class="login-form-area">
            <div class="login-box">
                <div class="login-logo">
                    <a href="{{ route('register') }}">
                        <img src="{{ asset('assets/dashboard/dist/img/x.png') }}"
                            class="brand-image img-circle elevation-3" style="height:40px; margin-right:10px;opacity: .8"
                            alt="Logo">
                        <b>Go Professional</b>
                    </a>
                </div>

                <div class="card">
                    <div class="card-body login-card-body">

                        <p class="login-box-msg">Register a new membership</p>

                        @if ($errors->any())
    <div class="alert alert-danger" style="border-radius:12px; font-size:14px;">
        <ul style="margin:0; padding-left:18px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="input-group mb-3">
                                <select id="role" name="role" class="form-control custom-select" required>
                                    <option disabled selected>Select one</option>
                                    @foreach (['admin', 'student', 'academy', 'center'] as $role)
                                        <option value="{{ $role }}">{{ ucfirst($role) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <input id="name" name="name" type="text" class="form-control"
                                    placeholder="Full name" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input id="email" type="email" name="email" class="form-control" placeholder="Email"
                                    required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input id="password" type="password" name="password" class="form-control"
                                    placeholder="Password" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input id="password_confirmation" type="password" name="password_confirmation"
                                    class="form-control" placeholder="Confirm Password" required
                                    autocomplete="new-password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 text-center mb-3">
                                    <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                                </div>
                            </div>
                        </form>

                        <p class="mb-1">
                            <a href="{{ url('login') }}" class="text-center">I already have a membership</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="login-image-area">
            <p style="text-align: center;">
                Manage your professional journey, courses, and wellness tools
                from one secure platform designed for experts.
            </p>
        </div>

    </div>

    <!-- jQuery -->
    <script src="{{ asset('assets/dashboard/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/dist/js/adminlte.min.js') }}"></script>
</body>

</html>


    <!-- jQuery -->
    <script src="{{ asset('assets/dashboard/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dashboard/dist/js/adminlte.min.js') }}"></script>
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
</body>

</html>
