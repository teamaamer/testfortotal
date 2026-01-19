<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $device->name }} - Total Wellness</title>
    
    <link rel="icon" type="image/png" href="{{ asset('assets/home/img/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    @vite(['resources/js/app.js'])
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --dark-bg: #0f0f23;
            --glass-bg: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.2);
            --text-light: #ffffff;
            --shadow-md: 0 10px 25px rgba(0, 0, 0, 0.15);
            --shadow-lg: 0 20px 40px rgba(0, 0, 0, 0.2);
        }
        body { font-family: 'Outfit', sans-serif; overflow-x: hidden; background: var(--dark-bg); color: var(--text-light); }
        .animated-bg { position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; background: linear-gradient(135deg, #0f0f23 0%, #1a1a2e 50%, #16213e 100%); }
        .animated-bg::before { content: ''; position: absolute; width: 200%; height: 200%; background: radial-gradient(circle, rgba(102, 126, 234, 0.1) 0%, transparent 50%); animation: rotate 20s linear infinite; }
        @keyframes rotate { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
        nav { position: fixed; top: 0; width: 100%; z-index: 1000; padding: 1rem 0; background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(20px); border-bottom: 1px solid rgba(0, 0, 0, 0.05); box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05); transition: all 0.3s ease; }
        nav.scrolled { background: rgba(255, 255, 255, 0.95); box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1); }
        .nav-container { max-width: 1400px; margin: 0 auto; padding: 0 2rem; display: flex; justify-content: space-between; align-items: center; gap: 2rem; }
        .logo { height: 50px; width: auto; display: block; }
        .nav-links { display: flex; gap: 2rem; list-style: none; align-items: center; }
        .nav-links a { color: #333; text-decoration: none; font-weight: 500; transition: all 0.3s ease; position: relative; }
        .nav-links a::after { content: ''; position: absolute; bottom: -5px; left: 0; width: 0; height: 2px; background: var(--primary-gradient); transition: width 0.3s ease; }
        .nav-links a:hover::after { width: 100%; }
        .nav-cta { padding: 0.75rem 1.5rem; background: var(--primary-gradient); border-radius: 50px; color: white !important; font-weight: 600; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.3s ease; }
        .nav-cta:hover { transform: translateY(-2px); box-shadow: var(--shadow-md); }
        .nav-cta::after { display: none; }
        .nav-right { display: flex; align-items: center; gap: 1rem; margin-left: auto; }
        .user-avatar { width: 40px; height: 40px; border-radius: 50%; object-fit: cover; border: 2px solid rgba(102, 126, 234, 0.5); transition: all 0.3s ease; }
        .user-icon { width: 40px; height: 40px; background: rgba(102, 126, 234, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #667eea; transition: all 0.3s ease; }
        .nav-center { position: absolute; left: 50%; transform: translateX(-50%); }
        .cart-widget { position: relative; margin-left: 1rem; }
        .cart-trigger { display: flex; align-items: center; gap: 0.5rem; color: #333; cursor: pointer; padding: 0.5rem 1rem; border-radius: 50px; background: rgba(102, 126, 234, 0.1); transition: all 0.3s ease; }
        .cart-badge { background: var(--primary-gradient); color: white; border-radius: 50%; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; font-weight: 600; }
        .cart-dropdown { position: absolute; top: calc(100% + 1rem); right: 0; width: 320px; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(20px); border-radius: 16px; padding: 1.5rem; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15); opacity: 0; visibility: hidden; transform: translateY(-10px); transition: all 0.3s ease; }
        .cart-widget:hover .cart-dropdown { opacity: 1; visibility: visible; transform: translateY(0); }
        .cart-item { display: flex; gap: 1rem; padding: 0.75rem 0; border-bottom: 1px solid rgba(0, 0, 0, 0.05); }
        .cart-item img { width: 60px; height: 60px; border-radius: 8px; object-fit: cover; }
        .cart-item-info { flex: 1; }
        .cart-item-title { font-weight: 600; color: #333; font-size: 0.9rem; }
        .cart-item-price { color: #667eea; font-weight: 600; margin-top: 0.25rem; }
        .cart-total { display: flex; justify-content: space-between; align-items: center; padding: 1rem 0 0.5rem; font-weight: 600; color: #333; }
        .cart-checkout { width: 100%; padding: 0.75rem; background: var(--primary-gradient); color: white; border: none; border-radius: 50px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; }
        .hero-section { padding: 150px 2rem 80px; text-align: center; position: relative; overflow: hidden; }
        .hero-section::before { content: ''; position: absolute; top: 0; left: 50%; transform: translateX(-50%); width: 800px; height: 800px; background: radial-gradient(circle, rgba(102, 126, 234, 0.15) 0%, transparent 70%); border-radius: 50%; animation: pulse 4s ease-in-out infinite; }
        @keyframes pulse { 0%, 100% { transform: translateX(-50%) scale(1); opacity: 0.5; } 50% { transform: translateX(-50%) scale(1.1); opacity: 0.8; } }
        .hero-content { position: relative; z-index: 1; max-width: 900px; margin: 0 auto; }
        .hero-content h1 { font-size: 3rem; font-weight: 800; margin-bottom: 1rem; background: linear-gradient(135deg, #fff 0%, #667eea 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; line-height: 1.2; }
        .breadcrumb { display: flex; gap: 0.5rem; justify-content: center; align-items: center; color: rgba(255, 255, 255, 0.6); font-size: 0.9rem; }
        .breadcrumb a { color: rgba(255, 255, 255, 0.8); text-decoration: none; transition: color 0.3s ease; }
        .breadcrumb a:hover { color: #667eea; }
        .device-detail-section { max-width: 1200px; margin: 0 auto; padding: 0 2rem 100px; }
        .device-detail-card { background: var(--glass-bg); backdrop-filter: blur(20px); border: 1px solid var(--glass-border); border-radius: 30px; overflow: hidden; box-shadow: var(--shadow-lg); }
        .device-detail-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 0; }
        .device-image-section { position: relative; overflow: hidden; }
        .device-image-section img { width: 100%; height: 100%; object-fit: cover; min-height: 500px; }
        .device-info-section { padding: 3rem; display: flex; flex-direction: column; justify-content: center; }
        .device-info-section h2 { font-size: 2rem; font-weight: 700; color: white; margin-bottom: 1.5rem; }
        .device-summary { color: rgba(255, 255, 255, 0.8); line-height: 1.8; font-size: 1.125rem; margin-bottom: 2rem; }
        .back-btn { display: inline-flex; align-items: center; gap: 0.75rem; padding: 1rem 2.5rem; background: var(--primary-gradient); color: white; text-decoration: none; border-radius: 50px; font-weight: 600; font-size: 1.125rem; transition: all 0.3s ease; box-shadow: var(--shadow-md); }
        .back-btn:hover { transform: translateY(-3px); box-shadow: 0 15px 40px rgba(102, 126, 234, 0.4); color: white; }
        footer { background: rgba(15, 15, 35, 0.95); backdrop-filter: blur(20px); border-top: 1px solid var(--glass-border); padding: 4rem 2rem 2rem; text-align: center; }
        .footer-logo { height: 60px; margin-bottom: 2rem; }
        .footer-text { max-width: 600px; margin: 0 auto 2rem; color: rgba(255, 255, 255, 0.6); line-height: 1.8; }
        .social-links { display: flex; gap: 1.5rem; justify-content: center; list-style: none; margin-bottom: 2rem; }
        .social-links a { width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; background: var(--glass-bg); border: 1px solid var(--glass-border); border-radius: 50%; color: white; font-size: 1.25rem; transition: all 0.3s ease; }
        .social-links a:hover { background: var(--primary-gradient); transform: translateY(-5px); box-shadow: var(--shadow-md); }
        .copyright { color: rgba(255, 255, 255, 0.5); font-size: 0.875rem; }
        @media (max-width: 968px) { .hero-content h1 { font-size: 2rem; } .device-detail-grid { grid-template-columns: 1fr; } .device-info-section { padding: 2rem; } .nav-links { display: none; } }
    </style>
</head>
<body>
    <div class="animated-bg"></div>

    <nav id="navbar">
        <div class="nav-container">
            <a href="{{ url('/') }}" class="logo-link">
                <img src="{{ asset('assets/home/img/Logo-BG.png') }}" alt="Total Wellness" class="logo">
            </a>
            
            <ul class="nav-links center-links nav-center">
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
                        <img src="{{ asset('/uploads/avatars/' . Auth::user()->account->avatar) }}" alt="User Avatar" class="user-avatar">
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
            <h1>{{ $device->name }}</h1>
            <div class="breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <span>/</span>
                <a href="{{ url('/tradein') }}">Devices</a>
                <span>/</span>
                <span>{{ $device->name }}</span>
            </div>
        </div>
    </section>

    <section class="device-detail-section">
        <div class="device-detail-card">
            <div class="device-detail-grid">
                <div class="device-image-section">
                    <img src="{{ asset('/uploads/products/' . $device->avatar) }}" alt="{{ $device->name }}">
                </div>
                <div class="device-info-section">
                    <h2>{{ $device->name }}</h2>
                    <p class="device-summary">{{ $device->summary }}</p>
                    <a href="{{ url('/tradein') }}" class="back-btn">
                        <i class="fas fa-arrow-left"></i>
                        Back to Devices
                    </a>
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
    </script>
</body>
</html>
