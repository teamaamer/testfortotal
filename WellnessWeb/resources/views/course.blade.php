<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->title }} - Total Wellness</title>
    
    <link rel="icon" type="image/png" href="{{ asset('assets/home/img/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    @vite(['resources/js/app.js'])
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --dark-bg: #0f0f23;
            --glass-bg: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.2);
            --text-light: #ffffff;
            --text-dark: #1a1a2e;
            --shadow-sm: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 10px 25px rgba(0, 0, 0, 0.15);
            --shadow-lg: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        body {
            font-family: 'Outfit', sans-serif;
            overflow-x: hidden;
            background: var(--dark-bg);
            color: var(--text-light);
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Outfit', sans-serif;
        }

        .animated-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a2e 50%, #16213e 100%);
        }

        .animated-bg::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(102, 126, 234, 0.1) 0%, transparent 50%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        nav {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            padding: 1rem 0;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        nav.scrolled {
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 2rem;
        }

        .logo {
            height: 50px;
            width: auto;
            display: block;
        }

        .logo-link {
            display: flex;
            align-items: center;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
            align-items: center;
        }

        .nav-links a {
            color: #333;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary-gradient);
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-cta {
            padding: 0.75rem 1.5rem;
            background: var(--primary-gradient);
            border-radius: 50px;
            color: white !important;
            font-weight: 600;
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
        }

        .nav-cta:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .nav-cta::after {
            display: none;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-left: auto;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid rgba(102, 126, 234, 0.5);
            transition: all 0.3s ease;
        }

        .user-avatar:hover {
            border-color: rgba(102, 126, 234, 1);
            transform: scale(1.05);
        }

        .user-icon {
            width: 40px;
            height: 40px;
            background: rgba(102, 126, 234, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #667eea;
            transition: all 0.3s ease;
        }

        .user-icon:hover {
            background: rgba(102, 126, 234, 0.2);
            transform: scale(1.05);
        }

        .nav-center {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .cart-widget {
            position: relative;
            margin-left: 1rem;
        }

        .cart-trigger {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #333;
            cursor: pointer;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            background: rgba(102, 126, 234, 0.1);
            transition: all 0.3s ease;
        }

        .cart-trigger:hover {
            background: rgba(102, 126, 234, 0.2);
        }

        .cart-badge {
            background: var(--primary-gradient);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .cart-dropdown {
            position: absolute;
            top: calc(100% + 1rem);
            right: 0;
            width: 320px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }

        .cart-widget:hover .cart-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .cart-item {
            display: flex;
            gap: 1rem;
            padding: 0.75rem 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-item img {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            object-fit: cover;
        }

        .cart-item-info {
            flex: 1;
        }

        .cart-item-title {
            font-weight: 600;
            color: #333;
            font-size: 0.9rem;
        }

        .cart-item-price {
            color: #667eea;
            font-weight: 600;
            margin-top: 0.25rem;
        }

        .cart-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0 0.5rem;
            font-weight: 600;
            color: #333;
        }

        .cart-checkout {
            width: 100%;
            padding: 0.75rem;
            background: var(--primary-gradient);
            color: white;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .cart-checkout:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .hero-section {
            padding: 150px 2rem 80px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(102, 126, 234, 0.15) 0%, transparent 70%);
            border-radius: 50%;
            animation: pulse 4s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: translateX(-50%) scale(1); opacity: 0.5; }
            50% { transform: translateX(-50%) scale(1.1); opacity: 0.8; }
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 900px;
            margin: 0 auto;
        }

        .hero-content h1 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #fff 0%, #667eea 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.2;
        }

        .breadcrumb {
            display: flex;
            gap: 0.5rem;
            justify-content: center;
            align-items: center;
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
        }

        .breadcrumb a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb a:hover {
            color: #667eea;
        }

        .course-detail-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem 100px;
        }

        .course-detail-card {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 30px;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
        }

        .course-detail-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
        }

        .course-image-section {
            position: relative;
            overflow: hidden;
        }

        .course-image-section img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            min-height: 500px;
        }

        .course-info-section {
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .course-info-section h2 {
            font-size: 2rem;
            font-weight: 700;
            color: white;
            margin-bottom: 1.5rem;
        }

        .course-price-tag {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background: var(--primary-gradient);
            border-radius: 50px;
            color: white;
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow-md);
        }

        .course-summary {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.8;
            font-size: 1.125rem;
            margin-bottom: 2rem;
        }

        .add-to-cart-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem 2.5rem;
            background: var(--primary-gradient);
            color: white;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.125rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-md);
        }

        .add-to-cart-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.4);
        }

        .tabs-section {
            padding: 3rem;
            border-top: 1px solid var(--glass-border);
        }

        .tabs-nav {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            border-bottom: 2px solid var(--glass-border);
        }

        .tab-button {
            padding: 1rem 2rem;
            background: transparent;
            border: none;
            color: rgba(255, 255, 255, 0.6);
            font-weight: 600;
            font-size: 1.125rem;
            cursor: pointer;
            transition: all 0.3s ease;
            border-bottom: 3px solid transparent;
            margin-bottom: -2px;
        }

        .tab-button.active {
            color: white;
            border-bottom-color: #667eea;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .course-description {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.8;
            font-size: 1.0625rem;
        }

        .course-description h3 {
            color: white;
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
        }

        .course-description ul {
            padding-left: 1.5rem;
            margin: 1rem 0;
        }

        .course-description li {
            margin-bottom: 0.5rem;
        }

        .comments-list {
            list-style: none;
        }

        .comment-item {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 1rem;
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.75rem;
        }

        .comment-user {
            font-weight: 600;
            color: white;
        }

        .comment-date {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.875rem;
        }

        .comment-text {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.6;
        }

        .load-more-btn {
            display: inline-block;
            padding: 0.75rem 2rem;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid var(--glass-border);
            border-radius: 50px;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin: 1rem auto;
        }

        .load-more-btn:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
        }

        .comment-form {
            margin-top: 2rem;
        }

        .comment-form h6 {
            color: white;
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .comment-form textarea {
            width: 100%;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            color: white;
            font-family: 'Outfit', sans-serif;
            font-size: 1rem;
            resize: vertical;
            min-height: 120px;
            margin-bottom: 1rem;
        }

        .comment-form textarea:focus {
            outline: none;
            border-color: #667eea;
        }

        .comment-form textarea::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .comment-form button {
            padding: 0.75rem 2rem;
            background: var(--primary-gradient);
            border: none;
            border-radius: 50px;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .comment-form button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        footer {
            background: rgba(15, 15, 35, 0.95);
            backdrop-filter: blur(20px);
            border-top: 1px solid var(--glass-border);
            padding: 4rem 2rem 2rem;
            text-align: center;
        }

        .footer-logo {
            height: 60px;
            margin-bottom: 2rem;
        }

        .footer-text {
            max-width: 600px;
            margin: 0 auto 2rem;
            color: rgba(255, 255, 255, 0.6);
            line-height: 1.8;
        }

        .social-links {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            list-style: none;
            margin-bottom: 2rem;
        }

        .social-links a {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            border-radius: 50%;
            color: white;
            font-size: 1.25rem;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: var(--primary-gradient);
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .copyright {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.875rem;
        }

        @media (max-width: 968px) {
            .hero-content h1 {
                font-size: 2rem;
            }

            .course-detail-grid {
                grid-template-columns: 1fr;
            }

            .course-info-section {
                padding: 2rem;
            }

            .tabs-section {
                padding: 2rem;
            }

            .nav-links {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="animated-bg"></div>

    <nav id="navbar">
        <div class="nav-container">
            <a href="{{ url('/') }}" class="logo-link">
                <img src="{{ asset('assets/home/img/Logo-BG.png') }}" alt="Total Wellness" class="logo">
            </a>
            
            <ul class="nav-links center-links nav-center" id="navLinks">
                <li><a href="{{ url('/') }}#home">Home</a></li>
                <li><a href="{{ url('/') }}#services">Services</a></li>
                <li><a href="{{ url('/') }}#gallery">Gallery</a></li>
                <li><a href="{{ url('/') }}#team">Team</a></li>
                <li><a href="{{ url('/') }}#contact">Contact</a></li>
                <li><a href="{{ url('/blog') }}">Blog</a></li>
            </ul>

            <div class="nav-right">
                <div class="cart-widget">
                    <div class="cart-trigger">
                        <i class="fas fa-shopping-bag"></i>
                        <span class="cart-badge">2</span>
                    </div>
                    <div class="cart-dropdown">
                        <h6 style="color: #333; margin-bottom: 1rem; font-weight: 600;">Shopping Cart</h6>
                        <div class="cart-item">
                            <img src="{{ asset('/uploads/products/device1.png') }}" alt="Device 1">
                            <div class="cart-item-info">
                                <div class="cart-item-title">Device 1</div>
                                <div class="cart-item-price">$39.90</div>
                            </div>
                        </div>
                        <div class="cart-item">
                            <img src="{{ asset('/uploads/products/device1.png') }}" alt="Device 2">
                            <div class="cart-item-info">
                                <div class="cart-item-title">Device 2</div>
                                <div class="cart-item-price">$249.50</div>
                            </div>
                        </div>
                        <div class="cart-total">
                            <span>Total:</span>
                            <span>$289.40</span>
                        </div>
                        <button class="cart-checkout">Checkout</button>
                    </div>
                </div>

                @auth
                    <a href="{{ url('dashboard/accounts/' . Auth::user()->account->id) }}">
                        <img src="{{ asset('/uploads/avatars/' . Auth::user()->account->avatar) }}" 
                             alt="User Avatar" 
                             class="user-avatar">
                    </a>
                @else
                    <a href="{{ url('/dashboard') }}" class="user-icon">
                        <i class="fas fa-user"></i>
                    </a>
                @endauth

                <a href="{{ route('register') }}" class="nav-cta">Join Us</a>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="hero-content">
            <h1>{{ $course->title }}</h1>
            <div class="breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <span>/</span>
                <a href="{{ url('/courses') }}">Courses</a>
                <span>/</span>
                <span>{{ $course->title }}</span>
            </div>
        </div>
    </section>

    <section class="course-detail-section">
        <div class="course-detail-card">
            <div class="course-detail-grid">
                <div class="course-image-section">
                    @php
                        // Clean up the image path - remove ../ prefix if present
                        $imagePath = $course->image ? str_replace('../', '', $course->image) : null;
                        // If path doesn't start with 'uploads/', prepend it
                        if ($imagePath && !str_starts_with($imagePath, 'uploads/')) {
                            $imagePath = 'uploads/courses/' . $imagePath;
                        }
                    @endphp
                    @if($imagePath && file_exists(public_path($imagePath)))
                        <img src="{{ asset($imagePath) }}" alt="{{ $course->title }}">
                    @else
                        <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=1200&h=800&fit=crop" alt="{{ $course->title }}">
                    @endif
                </div>
                <div class="course-info-section">
                    <h2>{{ $course->title }}</h2>
                    <div class="course-price-tag">${{ number_format($course->price, 2) }}</div>
                    <p class="course-summary">{{ $course->summary }}</p>
                    <button class="add-to-cart-btn">
                        <i class="fas fa-shopping-cart"></i>
                        Add To Cart
                    </button>
                </div>
            </div>

            <div class="tabs-section">
                <div class="tabs-nav">
                    <button class="tab-button active" data-tab="description">Description</button>
                    <button class="tab-button" data-tab="comments">Comments</button>
                </div>

                <div class="tab-content active" id="description">
                    <div class="course-description">
                        {!! $course->full_summary !!}
                    </div>
                </div>

                <div class="tab-content" id="comments">
                    <ul class="comments-list" id="comments-list">
                        <!-- Comments will be loaded here -->
                    </ul>

                    <div style="text-align: center; margin-top: 1.5rem;">
                        <button id="load-more-comments" class="load-more-btn" style="display:none">
                            Load More Comments
                        </button>
                    </div>

                    <form class="comment-form">
                        @csrf
                        <input type="hidden" name="render" id="render" value="public">
                        <h6>Leave A Comment</h6>
                        <textarea id="comment-text" placeholder="Share your thoughts about this course..." rows="4"></textarea>
                        <button type="submit">
                            <i class="fas fa-paper-plane"></i>
                            Post Comment
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <img src="{{ asset('assets/home/img/x.png') }}" alt="Total Wellness" class="footer-logo">
        <p class="footer-text">
            © 2026 TotalWellness. All rights reserved. Information provided is for educational purposes only and does not replace professional medical advice.
        </p>
        <ul class="social-links">
            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a href="https://www.linkedin.com/company/total-wellness-international"><i class="fab fa-linkedin-in"></i></a></li>
        </ul>
        <p class="copyright">Designed with care for your wellness journey</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        });

        // Tabs functionality
        document.querySelectorAll('.tab-button').forEach(button => {
            button.addEventListener('click', function() {
                const tabName = this.getAttribute('data-tab');
                
                document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));
                
                this.classList.add('active');
                document.getElementById(tabName).classList.add('active');
            });
        });

        // Comments functionality
        $(document).ready(function() {
            let nextUrl = "{{ route('courses.comments.publicload', $course->id) }}";

            function loadComments() {
                if (!nextUrl) return;

                $.get(nextUrl, function(res) {
                    $("#comments-list").append(res.html);

                    if (res.next) {
                        nextUrl = res.next;
                        $("#load-more-comments").show();
                    } else {
                        $("#load-more-comments").hide();
                    }
                });
            }

            loadComments();

            $("#load-more-comments").on("click", loadComments);

            $(".comment-form").on("submit", function(e) {
                e.preventDefault();

                let commentText = $("#comment-text").val();
                let render = $("#render").val();

                $.ajax({
                    url: "{{ route('courses.comments.store', $course->id) }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        comment: commentText,
                        render: render
                    },
                    success: function(res) {
                        $("#comments-list").prepend(res.html);
                        $("#comment-text").val("");
                        
                        if (typeof toastr !== 'undefined') {
                            toastr.success("Comment added successfully!");
                        }
                    },
                    error: function(xhr) {
                        if (typeof toastr !== 'undefined') {
                            toastr.error("Something went wrong. Please try again.");
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
