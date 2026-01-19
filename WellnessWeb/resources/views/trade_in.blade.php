<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trade-In Services - Total Wellness</title>
    
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
        .hero-section { padding: 150px 2rem 100px; text-align: center; position: relative; overflow: hidden; }
        .hero-section::before { content: ''; position: absolute; top: 0; left: 50%; transform: translateX(-50%); width: 800px; height: 800px; background: radial-gradient(circle, rgba(102, 126, 234, 0.15) 0%, transparent 70%); border-radius: 50%; animation: pulse 4s ease-in-out infinite; }
        @keyframes pulse { 0%, 100% { transform: translateX(-50%) scale(1); opacity: 0.5; } 50% { transform: translateX(-50%) scale(1.1); opacity: 0.8; } }
        .hero-content { position: relative; z-index: 1; max-width: 900px; margin: 0 auto; }
        .hero-content h1 { font-size: 4rem; font-weight: 800; margin-bottom: 1.5rem; background: linear-gradient(135deg, #fff 0%, #667eea 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; line-height: 1.2; }
        .hero-content p { font-size: 1.25rem; color: rgba(255, 255, 255, 0.8); margin-bottom: 2rem; line-height: 1.8; }
        .info-section { max-width: 1200px; margin: 0 auto 80px; padding: 0 2rem; }
        .info-card { background: var(--glass-bg); backdrop-filter: blur(20px); border: 1px solid var(--glass-border); border-radius: 30px; padding: 3rem; text-align: center; box-shadow: var(--shadow-lg); }
        .info-card h2 { font-size: 2rem; font-weight: 700; color: white; margin-bottom: 1.5rem; }
        .info-card p { font-size: 1.125rem; color: rgba(255, 255, 255, 0.8); line-height: 1.8; }
        .devices-section { max-width: 1400px; margin: 0 auto 80px; padding: 0 2rem; }
        .section-title { text-align: center; font-size: 2.5rem; font-weight: 700; margin-bottom: 3rem; background: linear-gradient(135deg, #fff 0%, #667eea 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
        .devices-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 2rem; }
        .device-card { background: var(--glass-bg); backdrop-filter: blur(20px); border: 1px solid var(--glass-border); border-radius: 20px; overflow: hidden; transition: all 0.4s ease; box-shadow: var(--shadow-md); }
        .device-card:hover { transform: translateY(-8px); box-shadow: 0 20px 40px rgba(102, 126, 234, 0.25); border-color: rgba(102, 126, 234, 0.4); }
        .device-image { position: relative; height: 220px; overflow: hidden; }
        .device-image img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease; }
        .device-card:hover .device-image img { transform: scale(1.1); }
        .device-content { padding: 1.75rem; }
        .device-content h3 { font-size: 1.375rem; font-weight: 700; color: white; margin-bottom: 0.75rem; line-height: 1.4; }
        .device-content p { color: rgba(255, 255, 255, 0.7); line-height: 1.7; font-size: 0.9375rem; margin-bottom: 1rem; }
        .device-link { display: inline-flex; align-items: center; gap: 0.5rem; color: #667eea; text-decoration: none; font-weight: 600; transition: all 0.3s ease; }
        .device-link:hover { gap: 0.75rem; }
        .form-section { max-width: 800px; margin: 0 auto 100px; padding: 0 2rem; }
        .form-card { background: var(--glass-bg); backdrop-filter: blur(20px); border: 1px solid var(--glass-border); border-radius: 30px; padding: 3rem; box-shadow: var(--shadow-lg); }
        .form-card h3 { font-size: 2rem; font-weight: 700; color: white; margin-bottom: 2rem; text-align: center; }
        .form-group { margin-bottom: 1.5rem; }
        .form-group input, .form-group select { width: 100%; padding: 1rem 1.5rem; background: rgba(255, 255, 255, 0.05); border: 1px solid var(--glass-border); border-radius: 16px; color: white; font-family: 'Outfit', sans-serif; font-size: 1rem; transition: all 0.3s ease; }
        .form-group input:focus, .form-group select:focus { outline: none; border-color: #667eea; background: rgba(255, 255, 255, 0.08); }
        .form-group input::placeholder { color: rgba(255, 255, 255, 0.4); }
        .form-group select { appearance: none; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23ffffff' d='M6 9L1 4h10z'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 1.5rem center; }
        .form-group select option { background: #1a1a2e; color: white; }
        .submit-btn { width: 100%; padding: 1rem 2rem; background: var(--primary-gradient); color: white; border: none; border-radius: 50px; font-weight: 600; font-size: 1.125rem; cursor: pointer; transition: all 0.3s ease; box-shadow: var(--shadow-md); }
        .submit-btn:hover { transform: translateY(-3px); box-shadow: 0 15px 40px rgba(102, 126, 234, 0.4); }
        .alert { padding: 1rem 1.5rem; border-radius: 16px; margin-bottom: 1.5rem; font-weight: 500; }
        .alert-success { background: rgba(76, 175, 80, 0.2); border: 1px solid rgba(76, 175, 80, 0.4); color: #81c784; }
        .alert-danger { background: rgba(244, 67, 54, 0.2); border: 1px solid rgba(244, 67, 54, 0.4); color: #e57373; }
        .alert-info { background: rgba(33, 150, 243, 0.2); border: 1px solid rgba(33, 150, 243, 0.4); color: #64b5f6; }
        .pagination { display: flex; justify-content: center; gap: 0.5rem; margin-top: 3rem; }
        .pagination a, .pagination span { padding: 0.75rem 1.25rem; background: var(--glass-bg); border: 1px solid var(--glass-border); border-radius: 12px; color: white; text-decoration: none; transition: all 0.3s ease; }
        .pagination a:hover { background: var(--primary-gradient); transform: translateY(-2px); }
        .pagination .active { background: var(--primary-gradient); }
        footer { background: rgba(15, 15, 35, 0.95); backdrop-filter: blur(20px); border-top: 1px solid var(--glass-border); padding: 4rem 2rem 2rem; text-align: center; }
        .footer-logo { height: 60px; margin-bottom: 2rem; }
        .footer-text { max-width: 600px; margin: 0 auto 2rem; color: rgba(255, 255, 255, 0.6); line-height: 1.8; }
        .social-links { display: flex; gap: 1.5rem; justify-content: center; list-style: none; margin-bottom: 2rem; }
        .social-links a { width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; background: var(--glass-bg); border: 1px solid var(--glass-border); border-radius: 50%; color: white; font-size: 1.25rem; transition: all 0.3s ease; }
        .social-links a:hover { background: var(--primary-gradient); transform: translateY(-5px); box-shadow: var(--shadow-md); }
        .copyright { color: rgba(255, 255, 255, 0.5); font-size: 0.875rem; }
        @media (max-width: 968px) { .hero-content h1 { font-size: 2.5rem; } .nav-links { display: none; } .devices-grid { grid-template-columns: 1fr; } .form-card { padding: 2rem; } }
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
            <h1>Trade-In Services</h1>
            <p>Upgrade your equipment effortlessly with our hassle-free trade-in program</p>
        </div>
    </section>

    <section class="info-section">
        <div class="info-card">
            <h2>Upgrade Your Equipment Seamlessly</h2>
            <p>Upgrade your equipment seamlessly with our trade-in program. Bring in your old devices and receive credit toward the latest models, ensuring you always have access to cutting-edge technology. Our process is simple, transparent, and designed to maximize the value of your current equipment. Whether you're looking to enhance performance, reduce costs, or stay ahead with the newest features, our trade-in program makes upgrading easy and rewarding.</p>
        </div>
    </section>

    <section class="devices-section">
        <h2 class="section-title">Our Devices</h2>
        
        <div class="devices-grid">
            @foreach($devices as $device)
            <article class="device-card">
                <div class="device-image">
                    <img src="{{ asset('/uploads/products/' . $device->avatar) }}" alt="{{ $device->name }}">
                </div>
                <div class="device-content">
                    <h3>{{ $device->name }}</h3>
                    <p>{{ Str::limit($device->summary, 120) }}</p>
                    <a href="{{ url('/devices/' . $device->id) }}" class="device-link">
                        Learn More <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>
            @endforeach
        </div>

        @if ($devices->hasPages())
        <div class="pagination">
            {{ $devices->links('pagination::bootstrap-4') }}
        </div>
        @endif
    </section>

    <section class="form-section">
        <div class="form-card">
            <h3>Submit Your Trade-In Request</h3>
            
            <div id="contactAlert"></div>
            
            <form class="contactForm" method="POST" action="{{ route('contact.tradein') }}">
                @csrf
                <div class="form-group">
                    <input type="text" name="phone_no" placeholder="Phone Number" required>
                </div>
                
                <div class="form-group">
                    <select id="target_device_id" name="target_device_id" required>
                        <option value="" disabled selected>Select Target Device Type</option>
                        @foreach ($devices as $device)
                            <option value="{{ $device->id }}" {{ (string) old('target_device_id') === (string) $device->id ? 'selected' : '' }}>
                                {{ $device->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <button type="submit" class="submit-btn">
                    <i class="fas fa-paper-plane"></i>
                    Submit Request
                </button>
            </form>
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

        $('.contactForm').on('submit', function(e) {
            e.preventDefault();
            let form = $(this);
            let alertBox = $('#contactAlert');
            alertBox.html('');

            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: form.serialize(),
                beforeSend: function() {
                    alertBox.html('<div class="alert alert-info"><i class="fas fa-spinner fa-spin"></i> Sending...</div>');
                },
                success: function(response) {
                    alertBox.html('<div class="alert alert-success"><i class="fas fa-check-circle"></i> ' + response.message + '</div>');
                    form.trigger('reset');
                },
                error: function(xhr) {
                    let msg = 'Something went wrong. Please try again.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        msg = xhr.responseJSON.message;
                    }
                    alertBox.html('<div class="alert alert-danger"><i class="fas fa-exclamation-circle"></i> ' + msg + '</div>');
                }
            });
        });
    </script>
</body>
</html>
