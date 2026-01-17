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
</head>

<style>
body {
    background: #f4f1fb;
    font-family: 'Lato', 'Open Sans', sans-serif;
}

.login-box {
    width: 100%;
    max-width: 420px;
    margin: 60px auto;
}

.login-logo {
    text-align: center;
    margin-bottom: 25px;
}

.login-logo img {
    height: 44px;
    margin-bottom: 10px;
}

.login-logo b {
    color: #3c3277;
}

.card {
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    border: none;
}

.login-card-body {
    padding: 30px;
}

.login-box-msg {
    font-size: 16px;
    margin-bottom: 25px;
    color: #444;
    text-align: center;
    font-weight: 500;
}

.input-group {
    width: 100%;
}

.input-group .form-control {
    width: 100%;
    display: block;
    box-sizing: border-box;
}

input, select {
    width: 100% !important;
}

.input-group .form-control, .input-group select {
    border-radius: 30px;
    padding: 12px 18px;
    font-size: 14px;
    border: 1px solid #ddd;
    transition: all 0.3s ease;
}

.input-group .form-control:focus, .input-group select:focus {
    border-color: #3c3277;
    box-shadow: 0 0 0 0.15rem rgba(60,50,119,0.15);
}

.input-group-append .input-group-text {
    background: transparent;
    border: none;
    color: #777;
}

.btn-primary {
    background: #3c3277 !important;
    border-color: #3c3277 !important;
    border-radius: 30px;
    font-size: 16px;
    font-weight: 500;
    transition: all 0.3s ease;
   
}

.btn-primary:hover {
    background: #2b1f5c !important;
    border-color: #2b1f5c !important;
    transform: translateY(-1px);
}

.input-group {
    margin-bottom: 18px; 
}

.login-card-body p a {
    color: #3c3277;
    transition: 0.3s;
}

.login-card-body p a:hover {
    text-decoration: underline;
}

.alert {
    border-radius: 12px;
    padding: 10px 15px;
}

@media (max-width: 575px) {
    .login-box {
        margin: 30px 15px;
    }
}
</style>


<div class="login-box">
    <div class="login-logo">
        <a href="{{ route('login') }}">
            <img src="{{ asset('assets/dashboard/dist/img/x.png') }}" class="brand-image img-circle elevation-3"
                style="height:40px; margin-right:10px;opacity: .8" alt="Logo">
            <b>Go Professional</b>
        </a>
    </div>

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="input-group mb-3">
    <input id="email" type="email" name="email" class="form-control" placeholder="Email" required>
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-envelope"></span>
        </div>
    </div>
</div>


                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

               <div class="row">
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Request new password</button>
    </div>
</div>

            </form>

            <p class="mt-3 mb-1">
                <a href="{{ url('login') }}" class="text-center">Login</a>
            </p>
            <p class="mb-0">
                <a href="{{ url('register') }}" class="text-center">Register a new membership</a>
            </p>
        </div>
    </div>
</div>

<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('assets/dashboard/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dashboard/dist/js/adminlte.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>
    @if ($errors->any())    
    @foreach ($errors->all() as $error)
        toastr.error("{{ $error }}");
    @endforeach
    @endif

    @if (session('success'))
    toastr.success("{{ session('success') }}");
    @endif
</script>
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
