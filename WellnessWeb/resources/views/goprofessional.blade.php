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
      

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 text-center">
                        <h2 class=" color-primary mb40 mb-xs-20">Become Part of Our Professional Network</h2>
                        <p class="lead">
                            Whether you are an, academy, or professional, our platform is built to support your goals.
                        </p>
                    </solutionsdiv>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </section>

        <section class="image-square left bg-secondary">
            <div class="col-md-6 image">
                <div class="background-image-holder fadeIn"
                    style="background: url(&quot;assets/home/img/18.jpg&quot;);">
                    <img alt="image" class="background-image" src="{{ asset('assets/home/img/18.jpg') }}"
                        style="display: none;">
                </div>
            </div>
            <div class="col-md-6 col-md-offset-1 content">
                <h3 class="color-primary">Enroll as a Professional</h3>

                <div class="feature bordered text-center">
                    <form class="text-left ajax-register-form" method="POST" action="{{ route('ajax.register') }}">
                        @csrf

                        <input type="text" name="name" placeholder="Username" required>
                        <input type="text" name="email" placeholder="Email Address" required>


                        <!-- Role select -->
                        <div class="select-option">
                            <i class="ti-angle-down"></i>
                            <select name="role" required>
                                <option value="" disabled selected>Select Role</option>
                                 <option value="student">Student</option>
                                 <option value="academy">Academy</option>
                                <option value="center">Center</option>
                            </select>
                        </div>
                        <input type="password" name="password" placeholder="Password" required>
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>


                        <input type="submit" value="Sign Up">

                        <!-- Success / Error Messages -->
                        <div class="ajax-register-message mt-2"></div>
                    </form>

                    <p class="mb0">Already have a membership
                        <a href="{{ url('login') }}">Login</a>
                    </p>
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
$(document).ready(function() {
    $('.ajax-register-form').on('submit', function(e) {
        e.preventDefault();

        let form = $(this);
        let messageBox = form.find('.ajax-register-message');
        messageBox.html(''); // Clear previous messages

        $.ajax({
            url: form.attr('action'),
            method: 'POST',
            data: form.serialize(),
            success: function(res) {
                messageBox.html(`<div class="alert alert-success">${res.message}</div>`);
                form.trigger('reset'); // clear form
            },
            error: function(xhr) {
                let errors = xhr.responseJSON?.errors;
                let msg = 'Something went wrong.';

                if (errors) {
                    msg = '<ul>';
                    $.each(errors, function(key, value) {
                        msg += '<li>' + value[0] + '</li>';
                    });
                    msg += '</ul>';
                }

                messageBox.html(`<div class="alert alert-danger">${msg}</div>`);
            }
        });
    });
});
</script>

</body>

</html>
