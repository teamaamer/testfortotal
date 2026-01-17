<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Total Wellness</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/home/img/logo.png') }}">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
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

        /* Animated Background */
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

        /* Glass Morphism Navigation - Light/White */
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

        .nav-links.center-links {
            gap: 2rem;
        }

        .nav-links.right-links {
            gap: 1rem;
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

        .nav-links a.active {
            color: #667eea;
            font-weight: 600;
        }

        .nav-links a.active::after {
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

        /* Shopping Cart Widget */
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

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: #333;
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Scroll Progress Bar */
        .scroll-progress {
            position: fixed;
            top: 0;
            left: 0;
            width: 0;
            height: 4px;
            background: var(--primary-gradient);
            z-index: 9999;
            transition: width 0.1s ease;
        }

        /* Sticky CTA Button */
        .sticky-cta {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            padding: 1rem 2rem;
            background: var(--primary-gradient);
            color: white;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            box-shadow: 0 10px 40px rgba(102, 126, 234, 0.4);
            z-index: 999;
            opacity: 0;
            transform: translateY(100px);
            transition: all 0.4s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .sticky-cta.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .sticky-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 50px rgba(102, 126, 234, 0.5);
            color: white;
        }

        /* Hero Section */
        .hero-section {
            padding: 150px 2rem 100px;
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
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #fff 0%, #667eea 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.2;
        }

        .hero-content p {
            font-size: 1.25rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 2rem;
            line-height: 1.8;
        }

        /* Featured Article */
        .featured-section {
            max-width: 1400px;
            margin: 0 auto 100px;
            padding: 0 2rem;
        }

        .featured-card {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 30px;
            overflow: hidden;
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 0;
            box-shadow: var(--shadow-lg);
            transition: all 0.4s ease;
        }

        .featured-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 30px 60px rgba(102, 126, 234, 0.3);
        }

        .featured-image {
            position: relative;
            overflow: hidden;
        }

        .featured-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .featured-card:hover .featured-image img {
            transform: scale(1.05);
        }

        .featured-badge {
            position: absolute;
            top: 2rem;
            left: 2rem;
            padding: 0.5rem 1.5rem;
            background: var(--primary-gradient);
            border-radius: 50px;
            color: white;
            font-weight: 600;
            font-size: 0.875rem;
            box-shadow: var(--shadow-md);
        }

        .featured-content {
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .featured-content h2 {
            font-size: 2.25rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: white;
            line-height: 1.3;
        }

        .featured-content p {
            font-size: 1.125rem;
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.8;
            margin-bottom: 2rem;
        }

        .read-more-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 1rem 2rem;
            background: var(--primary-gradient);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            width: fit-content;
        }

        .read-more-btn:hover {
            transform: translateX(5px);
            box-shadow: var(--shadow-md);
        }

        /* Blog Grid */
        .blog-grid {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem 100px;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 3rem;
            background: linear-gradient(135deg, #fff 0%, #667eea 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .articles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
        }

        .article-card {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s ease;
            box-shadow: var(--shadow-md);
        }

        .article-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(102, 126, 234, 0.25);
            border-color: rgba(102, 126, 234, 0.4);
        }

        .article-image {
            position: relative;
            height: 220px;
            overflow: hidden;
        }

        .article-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .article-card:hover .article-image img {
            transform: scale(1.1);
        }

        .article-content {
            padding: 1.75rem;
        }

        .article-date {
            display: inline-block;
            padding: 0.375rem 1rem;
            background: rgba(102, 126, 234, 0.2);
            color: #667eea;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .article-content h3 {
            font-size: 1.375rem;
            font-weight: 700;
            color: white;
            margin-bottom: 0.75rem;
            line-height: 1.4;
        }

        .article-content p {
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.7;
            font-size: 0.9375rem;
        }

        /* Footer */
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

        /* Responsive */
        @media (max-width: 968px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }

            .featured-card {
                grid-template-columns: 1fr;
            }

            .featured-content {
                padding: 2rem;
            }

            .articles-grid {
                grid-template-columns: 1fr;
            }

            .nav-links {
                display: none;
            }
        }
    </style>
</head>

<body>

    <!-- Animated Background -->
    <div class="animated-bg"></div>
    
    <!-- Scroll Progress Bar -->
    <div class="scroll-progress" id="scrollProgress"></div>
    
    <!-- Sticky CTA Button -->
    <a href="{{ route('register') }}" class="sticky-cta" id="stickyCta">
        <i class="fas fa-rocket"></i>
        <span>Get Started</span>
    </a>

    <!-- Navigation -->
    <nav id="navbar">
        <div class="nav-container">
            <a href="{{ url('/') }}" class="logo-link">
                <img src="{{ asset('assets/home/img/Logo-BG.png') }}" alt="Total Wellness" class="logo">
            </a>
            
            <!-- Centered Navigation Links -->
            <ul class="nav-links center-links nav-center" id="navLinks">
                <li><a href="{{ url('/') }}#home">Home</a></li>
                <li><a href="{{ url('/') }}#services">Services</a></li>
                <li><a href="{{ url('/') }}#gallery">Gallery</a></li>
                <li><a href="{{ url('/') }}#team">Team</a></li>
                <li><a href="{{ url('/') }}#contact">Contact</a></li>
                <li><a href="{{ url('/blog') }}" class="active">Blog</a></li>
            </ul>

            <!-- Right Side Elements -->
            <div class="nav-right">
                <!-- Shopping Cart -->
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

                <!-- User Account -->
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

            <button class="mobile-menu-btn" id="mobileMenuBtn">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1>Latest News & Updates</h1>
            <p>Discover the latest wellness insights, company updates and health innovations</p>
        </div>
    </section>

    <!-- Featured Article -->
    <section class="featured-section">
        <div class="featured-card">
            <div class="featured-image">
                <span class="featured-badge">Featured</span>
                <img src="https://picsum.photos/1200/600?10" alt="Featured Article">
            </div>
            <div class="featured-content">
                <h2>Revolutionizing Wellness with AI Technology</h2>
                <p>Our platform introduces a powerful AI system that helps users find the best healthcare and wellness services tailored to their needs.</p>
                <a href="#" class="read-more-btn">
                    Read More <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Blog Grid -->
    <section class="blog-grid">
        <h2 class="section-title">Recent Articles</h2>
        
        <div class="articles-grid">
            <article class="article-card">
                <div class="article-image">
                    <img src="https://picsum.photos/600/400?1" alt="Article">
                </div>
                <div class="article-content">
                    <span class="article-date">Jan 2026</span>
                    <h3>New Wellness Center Opened</h3>
                    <p>We opened a new center that provides premium healthcare services to our growing community.</p>
                </div>
            </article>

            <article class="article-card">
                <div class="article-image">
                    <img src="https://picsum.photos/600/400?2" alt="Article">
                </div>
                <div class="article-content">
                    <span class="article-date">Dec 2025</span>
                    <h3>AI System Launched</h3>
                    <p>Our new AI powered platform is now live for all clients, offering personalized recommendations.</p>
                </div>
            </article>

            <article class="article-card">
                <div class="article-image">
                    <img src="https://picsum.photos/600/400?3" alt="Article">
                </div>
                <div class="article-content">
                    <span class="article-date">Nov 2025</span>
                    <h3>Partnership With Clinics</h3>
                    <p>We partnered with 50+ professional clinics worldwide to expand our wellness network.</p>
                </div>
            </article>

            <article class="article-card">
                <div class="article-image">
                    <img src="https://picsum.photos/600/400?4" alt="Article">
                </div>
                <div class="article-content">
                    <span class="article-date">Oct 2025</span>
                    <h3>Mobile App Released</h3>
                    <p>Our new app makes booking wellness services easier than ever with intuitive design.</p>
                </div>
            </article>

            <article class="article-card">
                <div class="article-image">
                    <img src="https://picsum.photos/600/400?5" alt="Article">
                </div>
                <div class="article-content">
                    <span class="article-date">Sep 2025</span>
                    <h3>International Expansion</h3>
                    <p>We expanded our services to multiple international markets, bringing wellness to more people.</p>
                </div>
            </article>

            <article class="article-card">
                <div class="article-image">
                    <img src="https://picsum.photos/600/400?6" alt="Article">
                </div>
                <div class="article-content">
                    <span class="article-date">Aug 2025</span>
                    <h3>New Medical Partners</h3>
                    <p>Leading healthcare providers joined our growing wellness network for better service.</p>
                </div>
            </article>

            <article class="article-card">
                <div class="article-image">
                    <img src="https://picsum.photos/600/400?7" alt="Article">
                </div>
                <div class="article-content">
                    <span class="article-date">Jul 2025</span>
                    <h3>Smart Booking System</h3>
                    <p>We introduced smart scheduling powered by artificial intelligence for seamless appointments.</p>
                </div>
            </article>

            <article class="article-card">
                <div class="article-image">
                    <img src="https://picsum.photos/600/400?8" alt="Article">
                </div>
                <div class="article-content">
                    <span class="article-date">Jun 2025</span>
                    <h3>Wellness App Update</h3>
                    <p>Major update released with better performance and new features for enhanced user experience.</p>
                </div>
            </article>
        </div>
    </section>

    <!-- Footer -->
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
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            const scrollProgress = document.getElementById('scrollProgress');
            const stickyCta = document.getElementById('stickyCta');
            
            // Navbar background change
            if (window.scrollY > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }

            // Scroll progress bar
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            scrollProgress.style.width = scrolled + '%';

            // Sticky CTA button
            if (window.scrollY > 500) {
                stickyCta.classList.add('visible');
            } else {
                stickyCta.classList.remove('visible');
            }
        });

        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const navLinks = document.getElementById('navLinks');
        
        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', function() {
                navLinks.classList.toggle('active');
                const icon = this.querySelector('i');
                if (navLinks.classList.contains('active')) {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                } else {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            });
        }
    </script>
</body>
</html>
