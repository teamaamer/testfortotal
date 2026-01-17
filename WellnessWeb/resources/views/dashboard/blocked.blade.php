<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Pending - Total Wellness</title>
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
        nav { position: fixed; top: 0; width: 100%; z-index: 1000; padding: 1rem 0; background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(20px); border-bottom: 1px solid rgba(0, 0, 0, 0.05); }
        .nav-container { max-width: 1400px; margin: 0 auto; padding: 0 2rem; display: flex; justify-content: space-between; align-items: center; }
        .logo { height: 50px; }
        .blocked-container { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 6rem 2rem 2rem; }
        .blocked-card { max-width: 600px; width: 100%; background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(20px); border-radius: 20px; padding: 3rem 2.5rem; text-align: center; margin: 0 1rem; border: 1px solid rgba(255, 255, 255, 0.1); }
        .icon-wrapper { width: 120px; height: 120px; margin: 0 auto 2rem; background: rgba(255, 126, 95, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; }
        .icon-wrapper i { font-size: 4rem; color: #ff7e5f; }
        h1 { font-size: 2rem; font-weight: 700; background: var(--primary-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 1rem; }
        p { font-size: 1.125rem; color: rgba(255, 255, 255, 0.8); line-height: 1.7; margin-bottom: 2rem; }
        .info-box { background: rgba(255, 255, 255, 0.05); border-radius: 12px; padding: 1.5rem; margin-bottom: 2rem; border: 1px solid rgba(255, 255, 255, 0.1); }
        .info-box h3 { font-size: 1.125rem; color: rgba(255, 255, 255, 0.9); margin-bottom: 0.75rem; font-weight: 600; }
        .info-box ul { list-style: none; text-align: left; }
        .info-box li { padding: 0.5rem 0; color: rgba(255, 255, 255, 0.7); display: flex; align-items: center; gap: 0.75rem; }
        .info-box li i { color: #667eea; font-size: 1rem; }
        .btn-home { display: inline-flex; align-items: center; gap: 0.5rem; padding: 1rem 2rem; background: var(--primary-gradient); border: none; border-radius: 12px; color: white; font-size: 1rem; font-weight: 600; text-decoration: none; transition: all 0.3s ease; }
        .btn-home:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4); }
        .btn-logout { display: inline-flex; align-items: center; gap: 0.5rem; padding: 1rem 2rem; background: rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255, 255, 0.2); border-radius: 12px; color: white; font-size: 1rem; font-weight: 600; text-decoration: none; transition: all 0.3s ease; margin-left: 1rem; }
        .btn-logout:hover { background: rgba(255, 255, 255, 0.15); }
        footer { padding: 2rem; background: rgba(0, 0, 0, 0.3); backdrop-filter: blur(10px); border-top: 1px solid rgba(255, 255, 255, 0.1); text-align: center; }
        .footer-text { color: rgba(255, 255, 255, 0.6); font-size: 0.875rem; }
        @media (max-width: 768px) { .blocked-container { padding: 5rem 1rem 2rem; } .blocked-card { padding: 2rem 1.5rem; } h1 { font-size: 1.5rem; } p { font-size: 1rem; } .icon-wrapper { width: 100px; height: 100px; } .icon-wrapper i { font-size: 3rem; } .btn-home, .btn-logout { padding: 0.875rem 1.5rem; font-size: 0.9375rem; } .btn-logout { margin-left: 0; margin-top: 0.75rem; } }
    </style>
</head>
<body>
    <div class="animated-bg"></div>
    <nav>
        <div class="nav-container">
            <a href="{{ url('/') }}">
                <img src="{{ asset('assets/home/img/Logo-BG.png') }}" alt="Total Wellness" class="logo">
            </a>
        </div>
    </nav>
    <div class="blocked-container">
        <div class="blocked-card">
            <div class="icon-wrapper">
                <i class="fas fa-clock"></i>
            </div>
            <h1>Account Pending Approval</h1>
            <p>Your account is currently under review. Please wait while our admin team verifies your information.</p>
            
            <div class="info-box">
                <h3>What happens next?</h3>
                <ul>
                    <li><i class="fas fa-check-circle"></i> Our team will review your account details</li>
                    <li><i class="fas fa-check-circle"></i> You'll receive an email notification once approved</li>
                    <li><i class="fas fa-check-circle"></i> Full access will be granted immediately after approval</li>
                </ul>
            </div>

            <div style="margin-top: 2rem;">
                <a href="{{ url('/') }}" class="btn-home">
                    <i class="fas fa-home"></i> Return to Home
                </a>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-logout">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <p class="footer-text">© 2026 TotalWellness. All rights reserved.</p>
    </footer>
</body>
</html>
