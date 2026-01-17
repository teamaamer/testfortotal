<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Total Wellness</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/home/img/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        :root { --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%); --dark-bg: #0f0f23; }
        body { font-family: 'Outfit', sans-serif; overflow-x: hidden; background: var(--dark-bg); color: #ffffff; min-height: 100vh; }
        .animated-bg { position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; background: linear-gradient(135deg, #0f0f23 0%, #1a1a2e 50%, #16213e 100%); }
        .animated-bg::before { content: ''; position: absolute; width: 200%; height: 200%; background: radial-gradient(circle, rgba(102, 126, 234, 0.1) 1px, transparent 1px); background-size: 50px 50px; animation: moveBackground 20s linear infinite; }
        @keyframes moveBackground { 0% { transform: translate(0, 0); } 100% { transform: translate(50px, 50px); } }
        nav { position: fixed; top: 0; width: 100%; z-index: 1000; padding: 1rem 0; background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); border-bottom: 1px solid rgba(0, 0, 0, 0.05); box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05); transition: all 0.3s ease; }
        .nav-container { max-width: 1400px; margin: 0 auto; padding: 0 2rem; display: flex; justify-content: space-between; align-items: center; gap: 2rem; }
        .nav-center { position: absolute; left: 50%; transform: translateX(-50%); }
        .nav-right { display: flex; align-items: center; gap: 1rem; margin-left: auto; }
        .logo { height: 50px; width: auto; display: block; }
        .logo-link { display: flex; align-items: center; }
        .nav-links { display: flex; gap: 2rem; list-style: none; align-items: center; }
        .nav-links a { color: #333; text-decoration: none; font-weight: 500; transition: all 0.3s ease; position: relative; }
        .nav-links a::after { content: ''; position: absolute; bottom: -5px; left: 0; width: 0; height: 2px; background: var(--primary-gradient); transition: width 0.3s ease; }
        .nav-links a:hover::after { width: 100%; }
        .nav-cta { padding: 0.75rem 1.5rem; background: var(--primary-gradient); border-radius: 50px; color: white !important; font-weight: 600; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.3s ease; }
        .nav-cta:hover { transform: translateY(-2px); box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15); }
        .nav-cta::after { display: none; }
        .mobile-menu-btn { display: none; background: none; border: none; color: #333; font-size: 1.5rem; cursor: pointer; }
        .cart-widget { position: relative; margin-left: 1rem; }
        .cart-trigger { display: flex; align-items: center; gap: 0.5rem; color: #333; cursor: pointer; padding: 0.5rem 1rem; border-radius: 50px; background: rgba(102, 126, 234, 0.1); transition: all 0.3s ease; }
        .cart-trigger:hover { background: rgba(102, 126, 234, 0.2); }
        .cart-badge { background: var(--primary-gradient); color: white; border-radius: 50%; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; font-weight: 600; }
        .cart-dropdown { position: absolute; top: calc(100% + 1rem); right: 0; width: 320px; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(20px); border-radius: 16px; padding: 1.5rem; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15); opacity: 0; visibility: hidden; transform: translateY(-10px); transition: all 0.3s ease; }
        .cart-widget:hover .cart-dropdown { opacity: 1; visibility: visible; transform: translateY(0); }
        .cart-item { display: flex; gap: 1rem; padding: 0.75rem 0; border-bottom: 1px solid rgba(0, 0, 0, 0.05); }
        .cart-item:last-child { border-bottom: none; }
        .cart-item img { width: 60px; height: 60px; border-radius: 8px; object-fit: cover; }
        .cart-item-info { flex: 1; }
        .cart-item-title { font-weight: 600; color: #333; font-size: 0.9rem; }
        .cart-item-price { color: #667eea; font-weight: 600; margin-top: 0.25rem; }
        .cart-total { display: flex; justify-content: space-between; align-items: center; padding: 1rem 0 0.5rem; font-weight: 600; color: #333; }
        .cart-checkout { width: 100%; padding: 0.75rem; background: var(--primary-gradient); color: white; border: none; border-radius: 50px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; }
        .cart-checkout:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3); }
        .user-avatar { width: 40px; height: 40px; border-radius: 50%; object-fit: cover; border: 2px solid rgba(102, 126, 234, 0.3); cursor: pointer; transition: all 0.3s ease; }
        .user-avatar:hover { border-color: #667eea; transform: scale(1.05); }
        .user-icon { width: 40px; height: 40px; border-radius: 50%; background: rgba(102, 126, 234, 0.1); display: flex; align-items: center; justify-content: center; color: #667eea; text-decoration: none; transition: all 0.3s ease; }
        .user-icon:hover { background: rgba(102, 126, 234, 0.2); transform: scale(1.05); }
        .login-container { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 6rem 2rem 2rem; }
        .login-wrapper { max-width: 1100px; width: 100%; display: grid; grid-template-columns: 1fr 1fr; background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(20px); border-radius: 20px; overflow: hidden; margin: 0 1rem; }
        .login-form-side { padding: 1.5rem 2.5rem; }
        .login-logo { text-align: center; margin-bottom: 1.5rem; }
        .login-logo img { height: 45px; margin-bottom: 0.75rem; filter: brightness(0) invert(1); }
        .login-logo h2 { font-size: 1.5rem; background: var(--primary-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 0.5rem; }
        .login-logo p { font-size: 0.875rem; }
        .form-group { margin-bottom: 1rem; }
        .form-group label { display: block; margin-bottom: 0.5rem; color: rgba(255, 255, 255, 0.8); font-size: 0.9375rem; font-weight: 500; }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; }
        .form-row .form-group { margin-bottom: 0; }
        .input-wrapper { position: relative; }
        .input-icon { position: absolute; left: 1.25rem; top: 50%; transform: translateY(-50%); color: rgba(255, 255, 255, 0.4); font-size: 1.125rem; }
        .form-control { width: 100%; padding: 1rem 1rem 1rem 3.5rem; border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.1); background: rgba(255, 255, 255, 0.05); color: white; font-family: 'Outfit', sans-serif; font-size: 1rem; }
        select.form-control { appearance: none; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='rgba(255,255,255,0.4)' d='M6 9L1 4h10z'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 1.25rem center; }
        .btn-primary { width: 100%; padding: 1rem; background: var(--primary-gradient); border: none; border-radius: 12px; color: white; font-weight: 600; cursor: pointer; margin-top: 0.5rem; font-size: 1rem; font-family: 'Outfit', sans-serif; }
        .login-image-side { background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%); padding: 3rem 2.5rem; display: flex; align-items: center; }
        footer { padding: 2rem; background: rgba(0, 0, 0, 0.3); backdrop-filter: blur(10px); border-top: 1px solid rgba(255, 255, 255, 0.1); text-align: center; }
        .footer-text { color: rgba(255, 255, 255, 0.6); font-size: 0.875rem; }
        .social-links { display: flex; gap: 1rem; justify-content: center; margin-bottom: 1rem; }
        .social-links a { width: 40px; height: 40px; background: rgba(255, 255, 255, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: all 0.3s ease; }
        .social-links a:hover { background: var(--primary-gradient); transform: translateY(-3px); }
        @media (max-width: 1024px) { .nav-center { position: static; transform: none; } .nav-container { flex-wrap: wrap; justify-content: space-between; } }
        @media (max-width: 768px) { nav { padding: 0.75rem 0; } .nav-container { padding: 0 1rem; } .logo { height: 40px; } .nav-center { position: fixed; top: 0; right: -100%; width: 80%; max-width: 300px; height: 100vh; background: rgba(255, 255, 255, 0.98); backdrop-filter: blur(20px); padding: 6rem 2rem 2rem; transition: right 0.3s ease; box-shadow: -5px 0 20px rgba(0, 0, 0, 0.1); z-index: 1000; left: auto; transform: none; } .nav-center.active { right: 0; } .nav-links { flex-direction: column; gap: 0; } .nav-links a { padding: 1rem 0; width: 100%; border-bottom: 1px solid rgba(0, 0, 0, 0.05); } .nav-links a::after { display: none; } .nav-right { gap: 0.75rem; } .cart-widget { margin-left: 0; } .cart-trigger { padding: 0.5rem 0.75rem; } .mobile-menu-btn { display: block; z-index: 1001; order: 3; } .nav-right { order: 2; } .logo-link { order: 1; } }
        @media (max-width: 991px) { .login-wrapper { grid-template-columns: 1fr; margin: 0 1rem; max-width: 500px; } .login-image-side { display: none; } .login-form-side { padding: 1.75rem 2rem; } .login-container { padding: 5rem 1rem 2rem; } .form-row { grid-template-columns: 1fr; } .form-row .form-group { margin-bottom: 0.75rem; } }
        @media (max-width: 576px) { .login-wrapper { margin: 0 0.75rem; } .login-form-side { padding: 1.5rem 1.5rem; } .login-container { padding: 5rem 0.5rem 1.5rem; } .form-group { margin-bottom: 0.875rem; } .login-logo { margin-bottom: 1rem; } .login-logo img { height: 40px; margin-bottom: 0.5rem; } .login-logo h2 { font-size: 1.25rem; } }
    </style>
</head>
<body>
    <div class="animated-bg"></div>
    <nav id="navbar">
        <div class="nav-container">
            <a href="{{ url('/') }}" class="logo-link">
                <img src="{{ asset('assets/home/img/Logo-BG.png') }}" alt="Total Wellness" class="logo">
            </a>
            
            <!-- Centered Navigation Links -->
            <ul class="nav-links center-links nav-center" id="navLinks">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/') }}#services">Services</a></li>
                <li><a href="{{ url('/') }}#gallery">Gallery</a></li>
                <li><a href="{{ url('/') }}#team">Team</a></li>
                <li><a href="{{ url('/') }}#contact">Contact</a></li>
                <li><a href="{{ url('/blog') }}">Blog</a></li>
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

                <a href="{{ route('login') }}" class="nav-cta">Sign In</a>
            </div>

            <button class="mobile-menu-btn" id="mobileMenuBtn">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>
    <div class="login-container">
        <div class="login-wrapper">
            <div class="login-form-side">
                <div class="login-logo">
                    <img src="{{ asset('assets/home/img/Logo-BG.png') }}" alt="Total Wellness">
                    <h2>Join Total Wellness</h2>
                    <p style="color: rgba(255, 255, 255, 0.6);">Create your professional account</p>
                </div>
                @if ($errors->any())
                    <div style="padding: 1rem; background: rgba(239, 68, 68, 0.1); border-radius: 12px; margin-bottom: 1.5rem;">
                        <ul style="margin: 0; padding-left: 1.25rem; color: #fca5a5;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label>Account Type</label>
                            <div class="input-wrapper">
                                <i class="fas fa-user-tag input-icon"></i>
                                <select name="role" class="form-control" required>
                                    <option value="" disabled selected>Select account type</option>
                                    <option value="admin">Admin</option>
                                    <option value="student">Student</option>
                                    <option value="academy">Academy</option>
                                    <option value="center">Center</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Full Name</label>
                            <div class="input-wrapper">
                                <i class="fas fa-user input-icon"></i>
                                <input type="text" name="name" class="form-control" placeholder="Enter your full name" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <div class="input-wrapper">
                            <i class="fas fa-envelope input-icon"></i>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-wrapper">
                                <i class="fas fa-lock input-icon"></i>
                                <input type="password" name="password" class="form-control" placeholder="Create a password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <div class="input-wrapper">
                                <i class="fas fa-lock input-icon"></i>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm your password" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn-primary">Create Account</button>
                </form>
                <div style="margin-top: 1.5rem; text-align: center;">
                    <p style="color: rgba(255, 255, 255, 0.6);">Already have an account? <a href="{{ url('login') }}" style="color: #667eea;">Sign in here</a></p>
                </div>
            </div>
            <div class="login-image-side">
                <div>
                    <h3 style="font-size: 2rem; margin-bottom: 1rem;">Begin Your Professional Journey</h3>
                    <p style="font-size: 1.0625rem; line-height: 1.7;">Join thousands of aesthetic professionals advancing their careers with AI-powered learning and networking.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="social-links">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="https://www.linkedin.com/company/total-wellness-international"><i class="fab fa-linkedin-in"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
        <p class="footer-text">© 2026 TotalWellness. All rights reserved.</p>
    </footer>

    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const navCenter = document.querySelector('.nav-center');

        if (mobileMenuBtn && navCenter) {
            mobileMenuBtn.addEventListener('click', () => {
                navCenter.classList.toggle('active');
            });

            // Close menu when clicking outside
            document.addEventListener('click', (e) => {
                if (!navCenter.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                    navCenter.classList.remove('active');
                }
            });

            // Close menu when clicking on a link
            const navLinks = navCenter.querySelectorAll('a');
            navLinks.forEach(link => {
                link.addEventListener('click', () => {
                    navCenter.classList.remove('active');
                });
            });
        }
    </script>
</body>
</html>
