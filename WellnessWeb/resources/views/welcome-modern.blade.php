<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Wellness - Connect. Empower. Succeed</title>
    
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
        
        .nav-center {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
        
        .nav-right {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-left: auto;
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

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: #333;
            font-size: 1.5rem;
            cursor: pointer;
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
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        /* User Avatar */
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid rgba(102, 126, 234, 0.3);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .user-avatar:hover {
            border-color: #667eea;
            transform: scale(1.05);
        }

        .user-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(102, 126, 234, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #667eea;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .user-icon:hover {
            background: rgba(102, 126, 234, 0.2);
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 8rem 2rem 4rem;
            position: relative;
            overflow: hidden;
        }

        /* WebGL Background Canvases */
        .hero-webgl-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .hero-webgl-bg canvas {
            width: 100%;
            height: 100%;
            display: block;
        }

        #darkVeilCanvas {
            z-index: 1;
        }


        .hero-content {
            max-width: 1400px;
            margin: 0 auto;
            text-align: center;
            z-index: 2;
            position: relative;
        }

        .hero h1 {
            font-size: clamp(3rem, 8vw, 5.5rem);
            font-weight: 900;
            margin-bottom: 2rem;
            line-height: 1.05;
            letter-spacing: -0.03em;
            animation: fadeInUp 1s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .hero h1 .word {
            display: inline-block;
            margin: 0 0.15em;
            animation: wordReveal 0.8s cubic-bezier(0.16, 1, 0.3, 1) backwards;
        }

        .hero h1 .word-1 {
            animation-delay: 0.1s;
        }

        .hero h1 .word-2 {
            animation-delay: 0.2s;
        }

        .hero h1 .word-3 {
            animation-delay: 0.3s;
        }

        @keyframes wordReveal {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.9);
                filter: blur(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
                filter: blur(0);
            }
        }

        .hero h1 .word-1 {
            color: #ffffff;
            text-shadow: 0 0 60px rgba(255, 255, 255, 0.4), 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .hero h1 .word-2 {
            background: linear-gradient(135deg, #667eea 0%, #a78bfa 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            position: relative;
            filter: drop-shadow(0 0 20px rgba(102, 126, 234, 0.5));
        }

        .hero h1 .word-3 {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            position: relative;
            filter: drop-shadow(0 0 20px rgba(240, 147, 251, 0.5));
        }

        .hero p {
            font-size: clamp(1.125rem, 2vw, 1.375rem);
            color: rgba(255, 255, 255, 0.85);
            max-width: 800px;
            margin: 0 auto 3rem;
            line-height: 1.7;
            font-weight: 400;
            animation: fadeInUp 1s cubic-bezier(0.16, 1, 0.3, 1) 0.5s both;
        }

        .hero-subtitle {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(102, 126, 234, 0.15);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(167, 139, 250, 0.3);
            padding: 0.625rem 1.75rem;
            border-radius: 50px;
            font-size: 0.8125rem;
            font-weight: 600;
            color: #c4b5fd;
            margin-bottom: 2rem;
            animation: fadeInUp 1s cubic-bezier(0.16, 1, 0.3, 1) 0.2s both;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            box-shadow: 0 4px 20px rgba(102, 126, 234, 0.2), inset 0 1px 0 rgba(255, 255, 255, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hero-subtitle:hover {
            background: rgba(102, 126, 234, 0.25);
            border-color: rgba(167, 139, 250, 0.5);
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(102, 126, 234, 0.3), inset 0 1px 0 rgba(255, 255, 255, 0.15);
        }

        .hero-subtitle::before {
            content: '';
            width: 6px;
            height: 6px;
            background: linear-gradient(135deg, #667eea 0%, #a78bfa 100%);
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(102, 126, 234, 0.8);
            animation: pulse 2s ease-in-out infinite;
        }

        .hero-buttons {
            display: flex;
            gap: 1.25rem;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeInUp 1s cubic-bezier(0.16, 1, 0.3, 1) 0.8s both;
            margin-bottom: 3rem;
        }

        /* Feature Badges */
        .hero-features {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            margin: 0 0 3rem;
            animation: fadeInUp 1s cubic-bezier(0.16, 1, 0.3, 1) 0.6s both;
        }

        .feature-badge {
            display: flex;
            align-items: center;
            gap: 0.625rem;
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            color: rgba(255, 255, 255, 0.95);
            font-size: 0.9375rem;
            font-weight: 500;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1), inset 0 1px 0 rgba(255, 255, 255, 0.05);
        }

        .feature-badge:hover {
            background: rgba(255, 255, 255, 0.12);
            border-color: rgba(255, 255, 255, 0.25);
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15), inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }

        .feature-badge i {
            color: #a78bfa;
            font-size: 1.125rem;
        }

        .feature-badge .check-icon {
            width: 24px;
            height: 24px;
            background: linear-gradient(135deg, #667eea 0%, #a78bfa 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.625rem;
            color: white;
            flex-shrink: 0;
        }

        .feature-badge .check-icon i {
            color: white !important;
        }

        .btn {
            padding: 1.25rem 3rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            border: none;
            cursor: pointer;
            font-size: 1.0625rem;
            position: relative;
            overflow: hidden;
            letter-spacing: 0.01em;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 10px 40px rgba(102, 126, 234, 0.4), 0 0 0 1px rgba(255, 255, 255, 0.1) inset;
            border: 2px solid transparent;
        }

        .btn-primary:hover {
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 20px 60px rgba(102, 126, 234, 0.5), 0 0 0 1px rgba(255, 255, 255, 0.15) inset;
        }

        .btn-primary:active {
            transform: translateY(-3px) scale(0.98);
        }

        .btn-glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 2px solid rgba(255, 255, 255, 0.25);
            color: white;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15), inset 0 1px 0 rgba(255, 255, 255, 0.2);
        }

        .btn-glass:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.4);
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 20px 50px rgba(255, 255, 255, 0.25), inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }

        .btn-glass:active {
            transform: translateY(-3px) scale(0.98);
        }

        .btn i {
            transition: transform 0.3s ease;
        }

        .btn:hover i {
            transform: translateX(4px);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
                filter: blur(5px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
                filter: blur(0);
            }
        }

        /* Scroll Indicator */
        .scroll-indicator {
            position: absolute;
            bottom: 3rem;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
            animation: fadeInUp 1s cubic-bezier(0.16, 1, 0.3, 1) 1.2s both;
        }

        .scroll-indicator-inner {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.75rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .scroll-indicator-inner:hover {
            transform: translateY(5px);
        }

        .scroll-indicator-text {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.6);
            text-transform: uppercase;
            letter-spacing: 0.15em;
            font-weight: 500;
        }

        .scroll-indicator-mouse {
            width: 24px;
            height: 40px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 15px;
            position: relative;
            backdrop-filter: blur(10px);
        }

        .scroll-indicator-mouse::before {
            content: '';
            position: absolute;
            top: 8px;
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            height: 8px;
            background: rgba(255, 255, 255, 0.6);
            border-radius: 2px;
            animation: scrollWheel 2s ease-in-out infinite;
        }

        @keyframes scrollWheel {
            0%, 100% {
                opacity: 1;
                transform: translateX(-50%) translateY(0);
            }
            50% {
                opacity: 0.3;
                transform: translateX(-50%) translateY(12px);
            }
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero {
                padding: 6rem 1.5rem 3rem;
            }

            .hero h1 {
                margin-bottom: 1.5rem;
            }

            .hero p {
                margin-bottom: 2rem;
            }

            .hero-subtitle {
                margin-bottom: 1.5rem;
                padding: 0.5rem 1.25rem;
                font-size: 0.75rem;
            }

            .hero-buttons {
                gap: 0.75rem;
                margin-bottom: 2rem;
            }

            .btn {
                padding: 1rem 2rem;
                font-size: 1rem;
            }

            .feature-badge {
                padding: 0.625rem 1.125rem;
                font-size: 0.8125rem;
            }

            .scroll-indicator {
                bottom: 2rem;
            }
        }

        /* SVG Background Illustration */
        .hero-svg-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 1;
            opacity: 0.6;
        }

        .hero-svg-bg svg {
            width: 100%;
            height: 100%;
        }

        /* SVG Animations */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @keyframes pulse {
            0%, 100% { opacity: 0.4; transform: scale(1); }
            50% { opacity: 0.8; transform: scale(1.05); }
        }

        @keyframes dash {
            to { stroke-dashoffset: 0; }
        }

        .svg-circle-1 {
            animation: float 6s ease-in-out infinite;
        }

        .svg-circle-2 {
            animation: float 8s ease-in-out infinite 1s;
        }

        .svg-circle-3 {
            animation: pulse 4s ease-in-out infinite;
        }

        .svg-gradient-mesh {
            animation: rotate 30s linear infinite;
            transform-origin: center;
        }

        .svg-line {
            stroke-dasharray: 1000;
            stroke-dashoffset: 1000;
            animation: dash 3s ease-in-out forwards;
        }

        .svg-dot {
            animation: pulse 3s ease-in-out infinite;
        }

        /* Floating Elements (backup) */
        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            overflow: hidden;
            z-index: 0;
            display: none;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            filter: none;
            opacity: 0;
            animation: floatShape 20s infinite ease-in-out;
        }

        .shape-1 {
            width: 300px;
            height: 300px;
            background: var(--primary-gradient);
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape-2 {
            width: 400px;
            height: 400px;
            background: var(--secondary-gradient);
            bottom: 10%;
            right: 10%;
            animation-delay: 5s;
        }

        .shape-3 {
            width: 250px;
            height: 250px;
            background: var(--accent-gradient);
            top: 50%;
            right: 20%;
            animation-delay: 10s;
        }

        @keyframes floatShape {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(30px, -30px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
        }

        /* Services Section */
        .services {
            padding: 4rem 2rem;
            position: relative;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-header h2 {
            font-size: clamp(2rem, 5vw, 3rem);
            font-weight: 800;
            margin-bottom: 0.75rem;
            background: linear-gradient(135deg, #ffffff 0%, #667eea 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .section-header p {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.7);
            max-width: 600px;
            margin: 0 auto;
        }

        .services-grid {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        /* Flip Card Structure */
        .service-card {
            position: relative;
            height: 420px;
            perspective: 1000px;
            cursor: pointer;
        }

        .service-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            transform-style: preserve-3d;
        }

        .service-card.flipped .service-card-inner {
            transform: rotateY(180deg);
        }

        .service-card-front,
        .service-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 20px;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            overflow: hidden;
        }

        .service-card-front {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .service-card-back {
            transform: rotateY(180deg);
            padding: 1.75rem;
            display: flex;
            flex-direction: column;
        }

        /* Background Patterns */
        .service-card-front::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.05;
            z-index: 0;
        }

        .service-card:nth-child(1) .service-card-front::before {
            background: repeating-linear-gradient(45deg, #667eea 0px, #667eea 2px, transparent 2px, transparent 10px);
        }

        .service-card:nth-child(2) .service-card-front::before {
            background: radial-gradient(circle, #764ba2 1px, transparent 1px);
            background-size: 20px 20px;
        }

        .service-card:nth-child(3) .service-card-front::before {
            background: repeating-linear-gradient(90deg, #f093fb 0px, #f093fb 2px, transparent 2px, transparent 10px);
        }

        .service-card:nth-child(4) .service-card-front::before {
            background: conic-gradient(from 45deg, #4facfe 0deg, transparent 90deg, transparent 270deg, #4facfe 360deg);
            background-size: 30px 30px;
        }

        .service-card:hover .service-card-front {
            border-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 20px 60px rgba(102, 126, 234, 0.3);
        }

        /* Service Number Badge */
        .service-number {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            width: 50px;
            height: 50px;
            background: var(--primary-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 1.25rem;
            color: white;
            z-index: 1;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        /* Animated Icons */
        .service-icon {
            width: 80px;
            height: 80px;
            min-width: 80px;
            min-height: 80px;
            background: var(--primary-gradient);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.25rem;
            margin-bottom: 1.25rem;
            color: white;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
            transition: all 0.4s ease;
            position: relative;
            z-index: 1;
            animation: iconFloat 3s ease-in-out infinite;
            flex-shrink: 0;
        }

        .service-icon i {
            font-size: 2.25rem;
            line-height: 1;
            display: block;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
        }

        @keyframes iconFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .service-card:hover .service-icon {
            transform: scale(1.1) rotate(5deg) translateY(-10px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.5);
        }

        .service-card-front h3 {
            font-size: 1.5rem;
            margin-bottom: 0.75rem;
            color: white;
            position: relative;
            z-index: 1;
        }

        .service-card-front > p {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.6;
            margin-bottom: auto;
            position: relative;
            z-index: 1;
            flex: 1 1 auto;
            font-size: 0.9375rem;
        }

        /* Progress Indicator */
        .service-progress {
            width: 100%;
            margin: 1rem 0 0;
            position: relative;
            z-index: 1;
            flex-shrink: 0;
        }

        .service-progress-label {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
            color: rgba(255, 255, 255, 0.7);
        }

        .service-progress-bar {
            height: 6px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .service-progress-fill {
            height: 100%;
            background: var(--primary-gradient);
            border-radius: 10px;
            transition: width 1s ease;
            box-shadow: 0 0 10px rgba(102, 126, 234, 0.5);
        }

        /* Key Features List */
        .service-features {
            list-style: none;
            text-align: left;
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }

        .service-features li {
            color: rgba(255, 255, 255, 0.9);
            padding: 0.75rem 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.9375rem;
            opacity: 0;
            transform: translateX(-20px);
            transition: all 0.3s ease;
        }

        .service-card.flipped .service-features li {
            opacity: 1;
            transform: translateX(0);
        }

        .service-card.flipped .service-features li:nth-child(1) { transition-delay: 0.2s; }
        .service-card.flipped .service-features li:nth-child(2) { transition-delay: 0.3s; }
        .service-card.flipped .service-features li:nth-child(3) { transition-delay: 0.4s; }
        .service-card.flipped .service-features li:nth-child(4) { transition-delay: 0.5s; }

        .service-features li i {
            color: #667eea;
            font-size: 1rem;
        }

        .service-features li:last-child {
            border-bottom: none;
        }

        /* Back Card Header */
        .service-back-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .service-back-header h3 {
            color: white;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .service-back-header p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.875rem;
        }

        /* Flip Indicator */
        .flip-indicator {
            position: relative;
            left: auto;
            transform: none;
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.6875rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.375rem;
            z-index: 10;
            background: rgba(102, 126, 234, 0.2);
            padding: 0.3rem 0.75rem;
            border-radius: 50px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(102, 126, 234, 0.3);
            margin: 1.25rem auto 0;
            width: fit-content;
            flex-shrink: 0;
        }

        .service-card.flipped .flip-indicator {
            display: none;
        }

        .service-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            color: white;
            text-decoration: none;
            font-weight: 600;
            padding: 1rem 2rem;
            background: var(--primary-gradient);
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            width: 100%;
            margin-top: auto;
        }

        .service-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .service-link i {
            transition: transform 0.3s ease;
        }

        .service-link:hover i {
            transform: translateX(5px);
        }

        /* Stats Section */
        .stats-scroll-container {
            height: 200vh;
            position: relative;
            width: 100%;
        }

        .stats {
            position: sticky;
            top: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            overflow: hidden;
            transition: background 0.3s ease;
        }

        .stats-content {
            position: relative;
            z-index: 10;
            max-width: 1400px;
            width: 100%;
            padding: 0 2rem;
            opacity: 0;
            transform: translateY(50px) scale(0.95);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .stats-content.visible {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        .stats-header {
            text-align: center;
            margin-bottom: 3rem;
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease 0.2s, transform 0.6s ease 0.2s;
        }

        .stats-content.visible .stats-header {
            opacity: 1;
            transform: translateY(0);
        }

        .stats-header h2 {
            font-size: clamp(2.5rem, 5vw, 4rem);
            color: white;
            margin-bottom: 1rem;
            font-weight: 800;
        }

        .stats-subtitle {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.125rem;
        }

        .stats-subtitle::before,
        .stats-subtitle::after {
            content: '';
            width: 50px;
            height: 3px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 2px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .stat-item {
            text-align: center;
            padding: 2.5rem 2rem;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.4s ease;
            opacity: 0;
            transform: translateY(30px);
        }

        .stats-content.visible .stat-item:nth-child(1) {
            opacity: 1;
            transform: translateY(0);
            transition-delay: 0.3s;
        }

        .stats-content.visible .stat-item:nth-child(2) {
            opacity: 1;
            transform: translateY(0);
            transition-delay: 0.4s;
        }

        .stats-content.visible .stat-item:nth-child(3) {
            opacity: 1;
            transform: translateY(0);
            transition-delay: 0.5s;
        }

        .stats-content.visible .stat-item:nth-child(4) {
            opacity: 1;
            transform: translateY(0);
            transition-delay: 0.6s;
        }

        .stat-item:hover {
            transform: translateY(-10px) scale(1.05);
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.4);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .stat-item h3 {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 800;
            color: white;
            margin-bottom: 0.75rem;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .stat-item p {
            color: rgba(255, 255, 255, 0.95);
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .stat-item span {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9375rem;
            display: block;
        }

        /* Floating Icons Animation */
        .stats-floating-icons {
            position: absolute;
            inset: 0;
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.6s ease;
        }

        .stats-content.visible ~ .stats-floating-icons {
            opacity: 0.3;
        }

        .floating-icon {
            position: absolute;
            color: rgba(255, 255, 255, 0.3);
            font-size: 3rem;
            animation: floatIcon 20s infinite ease-in-out;
        }

        .floating-icon:nth-child(1) {
            left: 10%;
            top: 20%;
            animation-delay: 0s;
        }

        .floating-icon:nth-child(2) {
            right: 15%;
            top: 30%;
            animation-delay: 2s;
        }

        .floating-icon:nth-child(3) {
            left: 20%;
            bottom: 25%;
            animation-delay: 4s;
        }

        .floating-icon:nth-child(4) {
            right: 25%;
            bottom: 35%;
            animation-delay: 6s;
        }

        @keyframes floatIcon {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            25% {
                transform: translateY(-30px) rotate(90deg);
            }
            50% {
                transform: translateY(-60px) rotate(180deg);
            }
            75% {
                transform: translateY(-30px) rotate(270deg);
            }
        }

        /* Gallery Section */
        .gallery {
            padding: 6rem 2rem;
            background: #ffffff;
        }

        .gallery .section-header h2 {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .gallery .section-header p {
            color: #4a5568;
        }

        .gallery-grid {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .gallery-item {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            aspect-ratio: 1;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover {
            transform: scale(1.05);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(102, 126, 234, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-item {
            cursor: pointer;
        }

        .gallery-container {
            position: relative;
            max-width: 1400px;
            margin: 0 auto;
        }

        .gallery-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            background: rgba(102, 126, 234, 0.9);
            border: none;
            border-radius: 50%;
            color: white;
            font-size: 1.25rem;
            cursor: pointer;
            z-index: 10;
            transition: all 0.3s ease;
            display: none;
        }

        .gallery-nav:hover {
            background: rgba(102, 126, 234, 1);
            transform: translateY(-50%) scale(1.1);
        }

        .gallery-nav-prev {
            left: -25px;
        }

        .gallery-nav-next {
            right: -25px;
        }

        @media (max-width: 768px) {
            .gallery-nav {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .gallery-nav-prev {
                left: 10px;
            }

            .gallery-nav-next {
                right: 10px;
            }
        }

        /* Our Values Section */
        .values {
            padding: 6rem 2rem;
            background: rgba(255, 255, 255, 0.02);
            position: relative;
        }

        .values-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2.5rem;
        }

        .value-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            padding: 3rem 2.5rem;
            text-align: center;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .value-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--primary-gradient);
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: 0;
        }

        .value-card:hover::before {
            opacity: 0.1;
        }

        .value-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(102, 126, 234, 0.3);
            border-color: rgba(255, 255, 255, 0.3);
        }

        .value-card > * {
            position: relative;
            z-index: 1;
        }

        .value-icon {
            width: 80px;
            height: 80px;
            background: var(--primary-gradient);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            margin: 0 auto 2rem;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
            transition: all 0.3s ease;
        }

        .value-card:hover .value-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .value-card h3 {
            font-size: 1.75rem;
            margin-bottom: 1rem;
            color: white;
            font-weight: 700;
        }

        .value-card p {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.7;
            font-size: 1rem;
        }

        /* Team Section */
        .team {
            padding: 6rem 2rem;
            background: rgba(255, 255, 255, 0.02);
        }

        .team-grid {
            max-width: 1000px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 3rem;
        }

        .team-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
        }

        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(102, 126, 234, 0.3);
        }

        .team-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin: 0 auto 1.5rem;
            border: 4px solid rgba(102, 126, 234, 0.5);
            overflow: hidden;
        }

        .team-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .team-card h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: white;
        }

        .team-card p {
            color: rgba(255, 255, 255, 0.6);
        }

        /* Newsletter Section */
        .newsletter {
            padding: 6rem 2rem;
            background: var(--primary-gradient);
            position: relative;
            overflow: hidden;
        }

        .newsletter::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -250px;
            right: -250px;
        }

        .newsletter-content {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .newsletter h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: white;
        }

        .newsletter p {
            font-size: 1.125rem;
            margin-bottom: 2rem;
            color: rgba(255, 255, 255, 0.9);
        }

        .newsletter-form {
            display: flex;
            gap: 1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .newsletter-form input {
            flex: 1;
            padding: 1rem 1.5rem;
            border-radius: 50px;
            border: none;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            color: white;
            font-size: 1rem;
        }

        .newsletter-form input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .newsletter-form button {
            padding: 1rem 2.5rem;
            border-radius: 50px;
            border: none;
            background: white;
            color: #667eea;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .newsletter-form button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        /* Contact Section */
        .contact {
            padding: 6rem 2rem;
            background: #ffffff;
        }

        .contact .section-header h2 {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .contact .section-header p {
            color: #4a5568;
        }

        .contact-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .contact-info h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #1a202c;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            background: var(--primary-gradient);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            background: #ffffff;
            padding: 1.5rem;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .contact-item:hover {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        /* Location Card with Background Image */
        .contact-item.location-card {
            position: relative;
            background-image: url('{{ asset('assets/home/img/Sharjah.jpg') }}');
            background-size: cover;
            background-position: center;
            padding: 2.5rem;
            min-height: 200px;
            overflow: hidden;
            border: none;
        }

        .contact-item.location-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }

        .contact-item.location-card .contact-icon {
            display: none;
        }

        .contact-item.location-card > div {
            position: relative;
            z-index: 1;
        }

        .contact-item.location-card h4,
        .contact-item.location-card p,
        .contact-item.location-card a {
            color: #ffffff;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .contact-item.location-card h4 {
            font-size: 1.5rem;
            margin-bottom: 0.75rem;
        }

        .contact-item.location-card p {
            font-size: 1.125rem;
            line-height: 1.6;
        }

        .location-logo {
            height: 60px;
            width: auto;
            margin-bottom: 1rem;
            filter: brightness(0) invert(1);
        }

        .contact-item h4 {
            color: #000000;
            font-size: 1.125rem;
            margin-bottom: 0.25rem;
            font-weight: 600;
        }

        .contact-item p,
        .contact-item a {
            color: #000000;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .contact-item a:hover {
            color: #667eea;
        }

        .contact-form {
            background: #f7fafc;
            border: 1px solid #e2e8f0;
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #2d3748;
            font-weight: 600;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 1rem;
            border-radius: 12px;
            border: 1px solid #cbd5e0;
            background: #ffffff;
            color: #2d3748;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: #a0aec0;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #667eea;
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 150px;
        }

        /* Footer */
        footer {
            padding: 3rem 2rem;
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-content {
            max-width: 1400px;
            margin: 0 auto;
            text-align: center;
        }

        .footer-logo {
            font-size: 1.5rem;
            font-weight: 800;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin: 2rem 0;
        }

        .social-links a {
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: var(--primary-gradient);
            transform: translateY(-3px);
        }

        .footer-text {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.875rem;
        }

        /* Responsive - Tablet */
        @media (max-width: 1024px) {
            .nav-center {
                position: static;
                transform: none;
            }

            .nav-container {
                flex-wrap: wrap;
                justify-content: space-between;
            }

            .hero h1 {
                font-size: clamp(2rem, 6vw, 3.5rem);
            }

            .services-grid,
            .gallery-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            }
        }

        /* Responsive - Mobile */
        @media (max-width: 768px) {
            nav {
                padding: 0.75rem 0;
            }

            .nav-container {
                padding: 0 1rem;
            }

            .logo {
                height: 40px;
            }

            .nav-center {
                position: fixed;
                top: 0;
                right: -100%;
                width: 80%;
                max-width: 300px;
                height: 100vh;
                background: rgba(255, 255, 255, 0.98);
                backdrop-filter: blur(20px);
                padding: 6rem 2rem 2rem;
                transition: right 0.3s ease;
                box-shadow: -5px 0 20px rgba(0, 0, 0, 0.1);
                z-index: 1000;
                left: auto;
                transform: none;
            }

            .nav-center.active {
                right: 0;
            }

            .nav-links {
                flex-direction: column;
                gap: 0;
            }

            .nav-links a {
                padding: 1rem 0;
                width: 100%;
                border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            }

            .nav-links a::after {
                display: none;
            }

            .nav-right {
                gap: 0.75rem;
            }

            .cart-widget {
                margin-left: 0;
            }

            .cart-trigger {
                padding: 0.5rem 0.75rem;
            }

            .mobile-menu-btn {
                display: block;
                z-index: 1001;
                order: 3;
            }

            .nav-right {
                order: 2;
            }

            .logo-link {
                order: 1;
            }

            .hero {
                height: auto;
                min-height: 100vh;
                padding: 5rem 1rem 3rem;
            }

            .hero h1 {
                font-size: clamp(2.5rem, 12vw, 3.5rem);
                margin-bottom: 1rem;
            }

            .hero h1 .word {
                margin: 0 0.1em;
            }

            .hero-subtitle {
                font-size: 0.75rem;
                padding: 0.4rem 1rem;
                margin-bottom: 1rem;
            }

            .hero p {
                font-size: 0.875rem;
                margin: 0 auto 1.5rem;
                line-height: 1.5;
            }

            .hero-features {
                gap: 0.75rem;
                margin: 1rem 0;
            }

            .feature-badge {
                font-size: 0.8125rem;
                padding: 0.5rem 1rem;
            }

            .hero-buttons {
                flex-direction: column;
                gap: 0.75rem;
                width: 100%;
                padding: 0 1rem;
            }

            .btn {
                width: 100%;
                justify-content: center;
                padding: 1rem 2rem;
                font-size: 1rem;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 2rem;
            }

            .services-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .service-card {
                padding: 2rem;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .team-grid {
                grid-template-columns: 1fr;
            }

            .contact-container {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .newsletter-form {
                flex-direction: column;
            }

            .newsletter-form input,
            .newsletter-form button {
                width: 100%;
            }

            .section-header h2 {
                font-size: clamp(1.75rem, 8vw, 2.5rem);
            }

            .cart-dropdown {
                right: -1rem;
                width: calc(100vw - 2rem);
                max-width: 320px;
            }
        }

        /* Responsive - Small Mobile */
        @media (max-width: 480px) {
            .hero h1 {
                font-size: 2.25rem;
            }

            .hero p {
                font-size: 0.8125rem;
            }

            .hero-features {
                flex-direction: column;
                align-items: stretch;
            }

            .feature-badge {
                width: 100%;
                justify-content: center;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .stat-item h3 {
                font-size: 2.5rem;
            }

            .social-links {
                flex-wrap: wrap;
            }
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

        /* Active Navigation Link */
        .nav-links a.active {
            color: #667eea;
            font-weight: 600;
        }

        .nav-links a.active::after {
            width: 100%;
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
        }

        /* Lightbox Modal */
        .lightbox {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.95);
            z-index: 10000;
            display: none;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .lightbox.active {
            display: flex;
            opacity: 1;
        }

        .lightbox-content {
            position: relative;
            max-width: 90%;
            max-height: 90vh;
            animation: zoomIn 0.3s ease;
        }

        .lightbox-content img {
            max-width: 100%;
            max-height: 90vh;
            border-radius: 8px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        }

        .lightbox-close {
            position: absolute;
            top: -40px;
            right: 0;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: white;
            font-size: 1.5rem;
            transition: all 0.3s ease;
        }

        .lightbox-close:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: rotate(90deg);
        }

        .lightbox-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: white;
            font-size: 1.5rem;
            transition: all 0.3s ease;
        }

        .lightbox-nav:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .lightbox-prev {
            left: 20px;
        }

        .lightbox-next {
            right: 20px;
        }

        @keyframes zoomIn {
            from {
                transform: scale(0.8);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Testimonials Section */
        .testimonials {
            padding: 6rem 2rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
        }

        .testimonials-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        .testimonial-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 2.5rem;
            position: relative;
            transition: all 0.4s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            border-color: rgba(255, 255, 255, 0.3);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
            background: rgba(255, 255, 255, 0.15);
        }

        .testimonial-quote {
            font-size: 3rem;
            color: rgba(255, 255, 255, 0.4);
            opacity: 1;
            line-height: 1;
            margin-bottom: 1rem;
        }

        .testimonial-text {
            color: rgba(255, 255, 255, 0.95);
            line-height: 1.7;
            font-size: 1.0625rem;
            margin-bottom: 2rem;
            font-style: italic;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .testimonial-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.5rem;
        }

        .testimonial-avatar img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        .testimonial-info h4 {
            color: white;
            font-size: 1.125rem;
            margin-bottom: 0.25rem;
            font-weight: 600;
        }

        .testimonial-info p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9375rem;
        }

        .testimonial-stars {
            color: #fbbf24;
            margin-bottom: 1rem;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
        }

        /* Enhanced Service Cards */
        .service-card {
            position: relative;
            overflow: visible;
        }

        .service-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--primary-gradient);
            opacity: 0;
            border-radius: 24px;
            transition: opacity 0.4s ease;
            z-index: -1;
        }

        .service-card:hover::after {
            opacity: 0.1;
        }

        .service-card:hover .service-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .service-link {
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.3s ease;
        }

        .service-card:hover .service-link {
            opacity: 1;
            transform: translateY(0);
        }

        /* FAQ Section */
        .faq {
            padding: 6rem 2rem;
            background: rgba(255, 255, 255, 0.02);
        }

        .faq-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .faq-item {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            margin-bottom: 1rem;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .faq-item:hover {
            border-color: rgba(255, 255, 255, 0.2);
        }

        .faq-question {
            padding: 1.5rem 2rem;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            user-select: none;
            transition: all 0.3s ease;
        }

        .faq-question:hover {
            background: rgba(255, 255, 255, 0.05);
        }

        .faq-question h3 {
            font-size: 1.125rem;
            font-weight: 600;
            color: white;
            margin: 0;
        }

        .faq-icon {
            width: 30px;
            height: 30px;
            background: rgba(102, 126, 234, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #667eea;
            transition: all 0.3s ease;
        }

        .faq-item.active .faq-icon {
            transform: rotate(180deg);
            background: var(--primary-gradient);
            color: white;
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease, padding 0.4s ease;
            padding: 0 2rem;
        }

        .faq-item.active .faq-answer {
            max-height: 500px;
            padding: 0 2rem 1.5rem;
        }

        .faq-answer p {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.7;
            margin: 0;
        }

        /* Scroll Animations */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Mobile Responsive Styles for Gallery Carousel */
        @media (max-width: 768px) {
            .gallery-grid {
                display: flex;
                overflow-x: auto;
                scroll-snap-type: x mandatory;
                -webkit-overflow-scrolling: touch;
                gap: 1rem;
                padding: 1rem 0;
                scrollbar-width: none;
            }

            .gallery-grid::-webkit-scrollbar {
                display: none;
            }

            .gallery-item {
                flex: 0 0 85%;
                scroll-snap-align: center;
                min-height: 300px;
            }
        }

        @media (max-width: 480px) {
            .gallery-item {
                flex: 0 0 90%;
                min-height: 250px;
            }
        }

        /* Mobile Responsive Styles for Service Cards */
        @media (max-width: 768px) {
            .services {
                padding: 3rem 1.25rem;
                min-height: auto;
            }

            .section-header {
                margin-bottom: 2.5rem;
            }

            .section-header h2 {
                font-size: clamp(1.75rem, 6vw, 2.5rem);
                margin-bottom: 0.75rem;
            }

            .section-header p {
                font-size: 0.9375rem;
                padding: 0 0.5rem;
            }

            .services-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
                max-width: 100%;
                width: 100%;
            }

            .service-card {
                height: auto;
                min-height: 450px;
                width: 100%;
            }

            .service-card-front,
            .service-card-back {
                padding: 2.25rem 1.75rem;
                border-radius: 20px;
            }

            .service-card-back {
                padding: 2.25rem 1.75rem;
            }

            .service-icon {
                width: 75px;
                height: 75px;
                min-width: 75px;
                min-height: 75px;
                font-size: 2.125rem;
                margin-bottom: 1.25rem;
                border-radius: 18px;
                flex-shrink: 0;
            }

            .service-card-front h3 {
                font-size: 1.5rem;
                margin-bottom: 0.875rem;
                line-height: 1.3;
                word-wrap: break-word;
            }

            .service-card-front > p {
                font-size: 0.9375rem;
                line-height: 1.65;
                margin-bottom: 1rem;
                word-wrap: break-word;
            }

            .service-number {
                width: 45px;
                height: 45px;
                font-size: 1.125rem;
                top: 1.25rem;
                right: 1.25rem;
            }

            .flip-indicator {
                position: relative;
                left: auto;
                transform: none;
                margin: 1rem auto 0;
                font-size: 0.6875rem;
                padding: 0.35rem 0.75rem;
                gap: 0.375rem;
            }

            .service-progress {
                margin: 1.25rem 0;
            }

            .service-progress-label {
                font-size: 0.875rem;
            }

            .service-back-header h3 {
                font-size: 1.375rem;
            }

            .service-back-header p {
                font-size: 0.875rem;
            }

            .service-features li {
                font-size: 0.9375rem;
                padding: 0.75rem 0;
            }

            .service-link {
                padding: 0.875rem 1.75rem;
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .services {
                padding: 2.5rem 1rem;
            }

            .section-header {
                margin-bottom: 2rem;
                padding: 0 0.25rem;
            }

            .section-header h2 {
                font-size: clamp(1.5rem, 7vw, 2rem);
            }

            .section-header p {
                font-size: 0.875rem;
            }

            .services-grid {
                gap: 1.25rem;
                width: 100%;
            }

            .service-card {
                height: auto;
                min-height: 420px;
                width: 100%;
            }

            .service-card-front,
            .service-card-back {
                padding: 2rem 1.5rem;
            }

            .service-icon {
                width: 70px;
                height: 70px;
                min-width: 70px;
                min-height: 70px;
                font-size: 2rem;
                margin-bottom: 1.125rem;
                flex-shrink: 0;
            }

            .service-card-front h3 {
                font-size: 1.375rem;
                line-height: 1.3;
                word-wrap: break-word;
            }

            .service-card-front > p {
                font-size: 0.875rem;
                line-height: 1.6;
                word-wrap: break-word;
            }

            .service-number {
                width: 42px;
                height: 42px;
                font-size: 1.0625rem;
            }

            .flip-indicator {
                font-size: 0.625rem;
                padding: 0.3rem 0.625rem;
            }

            .service-link {
                padding: 0.8125rem 1.5rem;
                font-size: 0.9375rem;
            }
        }

        /* Mobile Responsive Styles for Stats Section */
        @media (max-width: 768px) {
            .stats {
                height: auto;
                min-height: 100vh;
                padding: 4rem 0;
            }

            .stats-content {
                padding: 0 1rem;
            }

            .stats-header {
                margin-bottom: 2rem;
            }

            .stats-header h2 {
                font-size: clamp(1.75rem, 8vw, 2.5rem);
            }

            .stats-subtitle {
                font-size: 0.9375rem;
                flex-wrap: wrap;
            }

            .stats-subtitle::before,
            .stats-subtitle::after {
                width: 30px;
                height: 2px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
                max-width: 100%;
            }

            .stat-item {
                padding: 2rem 1.5rem;
            }

            .stat-item h3 {
                font-size: clamp(2rem, 10vw, 3rem);
            }

            .stat-item p {
                font-size: 1rem;
            }

            .stat-item span {
                font-size: 0.875rem;
            }

            .stat-item:hover {
                transform: translateY(-5px) scale(1.02);
            }
        }

        @media (max-width: 480px) {
            .stats {
                padding: 3rem 0;
            }

            .stats-content {
                padding: 0 0.75rem;
            }

            .stats-header {
                margin-bottom: 1.5rem;
            }

            .stats-header h2 {
                font-size: clamp(1.5rem, 9vw, 2rem);
            }

            .stats-subtitle {
                font-size: 0.875rem;
                gap: 0.5rem;
            }

            .stats-subtitle::before,
            .stats-subtitle::after {
                width: 20px;
            }

            .stats-grid {
                gap: 1rem;
            }

            .stat-item {
                padding: 1.5rem 1rem;
                border-radius: 16px;
            }

            .stat-item h3 {
                font-size: clamp(1.75rem, 12vw, 2.5rem);
                margin-bottom: 0.5rem;
            }

            .stat-item p {
                font-size: 0.9375rem;
                margin-bottom: 0.25rem;
            }

            .stat-item span {
                font-size: 0.8125rem;
            }
        }

        /* Intro Loading Animation Styles */
        .intro-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a2e 50%, #16213e 100%);
            z-index: 10000;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 1;
            transition: opacity 0.8s ease, visibility 0.8s ease;
        }

        .intro-screen.hidden {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }

        .intro-content {
            position: relative;
            width: 100%;
            max-width: 1400px;
            padding: 2rem;
        }

        .intro-text {
            position: relative;
            z-index: 10;
        }

        .intro-logo-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 1.5rem;
            margin-bottom: 2rem;
            opacity: 0;
            animation: fadeInUp 0.8s ease forwards;
            position: relative;
            z-index: 10;
        }

        .intro-logo {
            height: 100px;
            width: auto;
            filter: drop-shadow(0 0 20px rgba(102, 126, 234, 0.5));
        }

        .intro-small {
            display: block;
            font-size: clamp(1rem, 2vw, 1.5rem);
            font-weight: 600;
            letter-spacing: 0.3em;
            color: rgba(255, 255, 255, 0.9);
            text-align: center;
        }

        .intro-title {
            font-size: clamp(4rem, 12vw, 10rem);
            font-weight: 900;
            line-height: 0.95;
            margin: 1rem 0;
            letter-spacing: -0.02em;
            text-align: center;
        }

        .intro-line {
            display: block;
            background: linear-gradient(135deg, #fff 0%, #667eea 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            opacity: 0;
            transform: translateY(100px);
            animation: slideUpFade 1s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
        }

        .intro-line:nth-child(1) {
            animation-delay: 0.4s;
        }

        .intro-line:nth-child(2) {
            animation-delay: 0.6s;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .intro-line:nth-child(3) {
            animation-delay: 0.8s;
        }

        .intro-small-right {
            text-align: center;
            animation-delay: 1s;
        }

        .intro-animated-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .intro-animated-bg::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(102, 126, 234, 0.1) 0%, transparent 50%);
            animation: rotate 20s linear infinite;
        }

        .sparkle-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            pointer-events: none;
            z-index: 3;
        }

        .sparkle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: #667eea;
            border-radius: 50%;
            opacity: 0;
            animation: sparkleAppear 0.6s ease forwards;
            box-shadow: 0 0 10px rgba(102, 126, 234, 0.8);
        }

        .sparkle.star {
            width: 0;
            height: 0;
            background: transparent;
        }

        .sparkle.star::before,
        .sparkle.star::after {
            content: '';
            position: absolute;
            background: #667eea;
        }

        .sparkle.star::before {
            width: 12px;
            height: 2px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .sparkle.star::after {
            width: 2px;
            height: 12px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        @keyframes sparkleAppear {
            0% {
                opacity: 0;
                transform: scale(0) rotate(0deg);
            }
            50% {
                opacity: 1;
                transform: scale(1.5) rotate(180deg);
            }
            100% {
                opacity: 0.8;
                transform: scale(1) rotate(360deg);
            }
        }

        /* Remove decorative elements styles - keeping only sparkles */

        @media (max-width: 768px) {
            .intro-title {
                font-size: clamp(3rem, 15vw, 6rem);
            }
            
            .intro-small {
                font-size: 0.8rem;
            }
            
            .intro-logo {
                height: 60px;
            }
            
            .intro-logo-container {
                flex-direction: column;
                gap: 1rem;
            }
            
            .decorative-element {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .intro-title {
                font-size: clamp(2.5rem, 18vw, 5rem);
            }
            
            .intro-logo {
                height: 50px;
            }
        }
    </style>
</head>
<body>
    <!-- Intro Loading Animation -->
    <div class="intro-screen active" id="introScreen">
        <div class="intro-animated-bg"></div>
        
        <div class="intro-content">
            <div class="intro-text">
                <div class="intro-logo-container">
                    <img src="{{ asset('assets/home/img/x-short.png') }}" alt="Total Wellness" class="intro-logo">
                    <span class="intro-small">AI-POWERED MARKETPLACE</span>
                </div>
            </div>
            
            <div class="sparkle-container" id="sparkleContainer"></div>
        </div>
    </div>

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
                <li><a href="#home">Home</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <li><a href="#team">Team</a></li>
                <li><a href="#contact">Contact</a></li>
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

                <a href="{{ route('register') }}" class="nav-cta">Join Us</a>
            </div>

            <button class="mobile-menu-btn" id="mobileMenuBtn">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <!-- WebGL Background Effects -->
        <div class="hero-webgl-bg">
            <canvas id="darkVeilCanvas"></canvas>
        </div>
        
        <!-- Animated SVG Background -->
        <div class="hero-svg-bg" style="display: none;">
            <svg viewBox="0 0 1920 1080" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice">
                <defs>
                    <!-- Gradient Definitions -->
                    <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#667eea;stop-opacity:0.6" />
                        <stop offset="100%" style="stop-color:#764ba2;stop-opacity:0.6" />
                    </linearGradient>
                    <linearGradient id="grad2" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" style="stop-color:#f093fb;stop-opacity:0.5" />
                        <stop offset="100%" style="stop-color:#f5576c;stop-opacity:0.5" />
                    </linearGradient>
                    <linearGradient id="grad3" x1="100%" y1="0%" x2="0%" y2="100%">
                        <stop offset="0%" style="stop-color:#4facfe;stop-opacity:0.5" />
                        <stop offset="100%" style="stop-color:#00f2fe;stop-opacity:0.5" />
                    </linearGradient>
                    <radialGradient id="radial1">
                        <stop offset="0%" style="stop-color:#667eea;stop-opacity:0.4" />
                        <stop offset="100%" style="stop-color:#667eea;stop-opacity:0" />
                    </radialGradient>
                </defs>

                <!-- Animated Circles -->
                <circle class="svg-circle-1" cx="200" cy="200" r="150" fill="url(#grad1)" opacity="0.3" />
                <circle class="svg-circle-2" cx="1700" cy="800" r="200" fill="url(#grad2)" opacity="0.3" />
                <circle class="svg-circle-3" cx="1500" cy="300" r="120" fill="url(#grad3)" opacity="0.4" />
                
                <!-- Gradient Mesh Background -->
                <g class="svg-gradient-mesh" opacity="0.15">
                    <ellipse cx="960" cy="540" rx="600" ry="400" fill="url(#radial1)" />
                </g>

                <!-- Connecting Lines -->
                <g opacity="0.2" stroke="url(#grad1)" stroke-width="2" fill="none">
                    <path class="svg-line" d="M 200,200 Q 600,100 1000,300" style="animation-delay: 0s;" />
                    <path class="svg-line" d="M 1700,800 Q 1200,600 800,700" style="animation-delay: 0.5s;" />
                    <path class="svg-line" d="M 1500,300 Q 1000,500 500,400" style="animation-delay: 1s;" />
                </g>

                <!-- Floating Dots -->
                <g fill="#667eea">
                    <circle class="svg-dot" cx="400" cy="150" r="8" opacity="0.6" style="animation-delay: 0s;" />
                    <circle class="svg-dot" cx="800" cy="250" r="6" opacity="0.5" style="animation-delay: 0.3s;" />
                    <circle class="svg-dot" cx="1200" cy="180" r="10" opacity="0.7" style="animation-delay: 0.6s;" />
                    <circle class="svg-dot" cx="1600" cy="400" r="7" opacity="0.5" style="animation-delay: 0.9s;" />
                    <circle class="svg-dot" cx="300" cy="600" r="9" opacity="0.6" style="animation-delay: 1.2s;" />
                    <circle class="svg-dot" cx="1400" cy="700" r="8" opacity="0.6" style="animation-delay: 1.5s;" />
                </g>

                <!-- Abstract Shapes -->
                <g opacity="0.15">
                    <rect class="svg-circle-1" x="100" y="500" width="150" height="150" rx="20" fill="url(#grad3)" transform="rotate(45 175 575)" />
                    <polygon class="svg-circle-2" points="1800,100 1850,200 1750,200" fill="url(#grad2)" />
                    <ellipse class="svg-circle-3" cx="600" cy="900" rx="100" ry="60" fill="url(#grad1)" />
                </g>

                <!-- Medical/Tech Icons (Abstract) -->
                <g opacity="0.1" stroke="#667eea" stroke-width="3" fill="none">
                    <circle class="svg-circle-1" cx="1100" cy="150" r="40" />
                    <path class="svg-circle-2" d="M 1100,130 L 1100,170 M 1080,150 L 1120,150" stroke-width="4" />
                    
                    <rect class="svg-circle-3" x="250" y="750" width="80" height="80" rx="10" />
                    <path class="svg-circle-1" d="M 270,790 L 310,790 M 290,770 L 290,810" stroke-width="3" />
                </g>
            </svg>
        </div>

        <!-- Backup Floating Shapes -->
        <div class="floating-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>

        <div class="hero-content">
            <div class="hero-subtitle">
                AI-Powered Aesthetic Marketplace
            </div>
            <h1>
                <span class="word word-1">Connect.</span>
                <span class="word word-2">Empower.</span>
                <span class="word word-3">Succeed</span>
            </h1>
            <div class="hero-features">
                <div class="feature-badge">
                    <div class="check-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <span>1000+ Professionals</span>
                </div>
                <div class="feature-badge">
                    <div class="check-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <span>500+ Courses Available</span>
                </div>
                <div class="feature-badge">
                    <div class="check-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <span>AI-Driven Solutions</span>
                </div>
            </div>
            <p>Transform your aesthetic practice with cutting-edge AI technology. Join a thriving community where innovation meets expertise, connecting professionals and clients through intelligent solutions designed for tomorrow's aesthetic industry.</p>
            <div class="hero-buttons">
                <a href="#services" class="btn btn-primary">
                    Start Exploring <i class="fas fa-arrow-right"></i>
                </a>
                <a href="{{ route('courses') }}" class="btn btn-glass">
                    <i class="fas fa-graduation-cap"></i> View Courses
                </a>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="scroll-indicator">
            <a href="#services" class="scroll-indicator-inner">
                <div class="scroll-indicator-mouse"></div>
            </a>
        </div>
    </section>

    <!-- Stats Section with Scroll Animation -->
    <div class="stats-scroll-container">
        <section class="stats">
            <div class="stats-content" id="statsContent">
                <div class="stats-header">
                    <h2>Our Numbers Speak</h2>
                    <div class="stats-subtitle">Proven Excellence</div>
                </div>
                <div class="stats-grid">
                    <div class="stat-item">
                        <h3 data-target="1000">0+</h3>
                        <p>Professionals</p>
                        <span>Trusted by industry leaders</span>
                    </div>
                    <div class="stat-item">
                        <h3 data-target="500">0+</h3>
                        <p>Courses</p>
                        <span>Comprehensive learning paths</span>
                    </div>
                    <div class="stat-item">
                        <h3 data-target="50">0+</h3>
                        <p>Partners</p>
                        <span>Global network connections</span>
                    </div>
                    <div class="stat-item">
                        <h3 data-target="98">0%</h3>
                        <p>Satisfaction</p>
                        <span>Consistently excellent service</span>
                    </div>
                </div>
            </div>
            
            <!-- Floating Icons -->
            <div class="stats-floating-icons">
                <i class="floating-icon fas fa-graduation-cap"></i>
                <i class="floating-icon fas fa-briefcase"></i>
                <i class="floating-icon fas fa-users"></i>
                <i class="floating-icon fas fa-star"></i>
            </div>
        </section>
    </div>

    <!-- Services Section -->
    <section class="services fade-in" id="services">
        <div class="section-header">
            <h2>Our Services</h2>
            <p>We offer a comprehensive and diverse range of services in the medical aesthetics field</p>
        </div>
        <div class="services-grid">
            <!-- Service Card 1: Educational Services -->
            <div class="service-card">
                <div class="service-card-inner">
                    <!-- Front of Card -->
                    <div class="service-card-front">
                        <div class="service-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h3>Educational Services</h3>
                        <p>AI-driven personalized training paths tailored to individual career goals in the aesthetic industry.</p>
                        <div class="flip-indicator">
                            <span>Click to see details</span>
                            <i class="fas fa-sync-alt"></i>
                        </div>
                        <div class="service-progress">
                            <div class="service-progress-label">
                                <span>Popularity</span>
                                <span>95%</span>
                            </div>
                            <div class="service-progress-bar">
                                <div class="service-progress-fill" style="width: 95%;"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Back of Card -->
                    <div class="service-card-back">
                        <div class="service-back-header">
                            <h3>Educational Services</h3>
                            <p>Comprehensive learning solutions</p>
                        </div>
                        <ul class="service-features">
                            <li><i class="fas fa-check-circle"></i> 500+ Certified Courses</li>
                            <li><i class="fas fa-check-circle"></i> AI-Powered Learning Paths</li>
                            <li><i class="fas fa-check-circle"></i> Expert Instructors</li>
                            <li><i class="fas fa-check-circle"></i> Industry Certifications</li>
                        </ul>
                        <a href="{{ route('courses') }}" class="service-link">
                            Explore Courses <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Service Card 2: Hiring Platform -->
            <div class="service-card">
                <div class="service-card-inner">
                    <div class="service-card-front">
                        <div class="service-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <h3>Hiring Platform</h3>
                        <p>AI-driven recruitment system connecting qualified candidates with top aesthetic clinics worldwide.</p>
                        <div class="flip-indicator">
                            <span>Click to see details</span>
                            <i class="fas fa-sync-alt"></i>
                        </div>
                        <div class="service-progress">
                            <div class="service-progress-label">
                                <span>Success Rate</span>
                                <span>88%</span>
                            </div>
                            <div class="service-progress-bar">
                                <div class="service-progress-fill" style="width: 88%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="service-card-back">
                        <div class="service-back-header">
                            <h3>Hiring Platform</h3>
                            <p>Smart recruitment solutions</p>
                        </div>
                        <ul class="service-features">
                            <li><i class="fas fa-check-circle"></i> AI Candidate Matching</li>
                            <li><i class="fas fa-check-circle"></i> Global Job Network</li>
                            <li><i class="fas fa-check-circle"></i> Skill Assessment Tools</li>
                            <li><i class="fas fa-check-circle"></i> Career Development Support</li>
                        </ul>
                        <a href="#" class="service-link">
                            Find Opportunities <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Service Card 3: Maintenance Support -->
            <div class="service-card">
                <div class="service-card-inner">
                    <div class="service-card-front">
                        <div class="service-icon">
                            <i class="fas fa-tools"></i>
                        </div>
                        <h3>Maintenance Support</h3>
                        <p>We offer maintaining aesthetic equipment, predicting maintenance needs, and scheduling services.</p>
                        <div class="flip-indicator">
                            <span>Click to see details</span>
                            <i class="fas fa-sync-alt"></i>
                        </div>
                        <div class="service-progress">
                            <div class="service-progress-label">
                                <span>Uptime</span>
                                <span>99%</span>
                            </div>
                            <div class="service-progress-bar">
                                <div class="service-progress-fill" style="width: 99%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="service-card-back">
                        <div class="service-back-header">
                            <h3>Maintenance Support</h3>
                            <p>Predictive equipment care</p>
                        </div>
                        <ul class="service-features">
                            <li><i class="fas fa-check-circle"></i> 24/7 Technical Support</li>
                            <li><i class="fas fa-check-circle"></i> Predictive Maintenance AI</li>
                            <li><i class="fas fa-check-circle"></i> Scheduled Service Plans</li>
                            <li><i class="fas fa-check-circle"></i> Emergency Response Team</li>
                        </ul>
                        <a href="{{ route('maintenance_request') }}" class="service-link">
                            Request Service <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Service Card 4: Trade-in Program -->
            <div class="service-card">
                <div class="service-card-inner">
                    <div class="service-card-front">
                        <div class="service-icon">
                            <i class="fas fa-exchange-alt"></i>
                        </div>
                        <h3>Trade-in Program</h3>
                        <p>A smart Trade-In Program to help aesthetic service providers easily upgrade their technology.</p>
                        <div class="flip-indicator">
                            <span>Click to see details</span>
                            <i class="fas fa-sync-alt"></i>
                        </div>
                        <div class="service-progress">
                            <div class="service-progress-label">
                                <span>Satisfaction</span>
                                <span>92%</span>
                            </div>
                            <div class="service-progress-bar">
                                <div class="service-progress-fill" style="width: 92%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="service-card-back">
                        <div class="service-back-header">
                            <h3>Trade-in Program</h3>
                            <p>Upgrade your equipment easily</p>
                        </div>
                        <ul class="service-features">
                            <li><i class="fas fa-check-circle"></i> Instant Valuation</li>
                            <li><i class="fas fa-check-circle"></i> Fair Market Pricing</li>
                            <li><i class="fas fa-check-circle"></i> Latest Technology Access</li>
                            <li><i class="fas fa-check-circle"></i> Flexible Payment Options</li>
                        </ul>
                        <a href="{{ route('tradein') }}" class="service-link">
                            Start Trade-in <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery fade-in" id="gallery">
        <div class="section-header">
            <h2>Our Impact</h2>
            <p>Shaping the future of the aesthetic industry through innovation and intelligence</p>
        </div>
        <div class="gallery-container">
            <button class="gallery-nav gallery-nav-prev" id="galleryPrev">
                <i class="fas fa-chevron-left"></i>
            </button>
            <div class="gallery-grid" id="galleryGrid">
            <div class="gallery-item">
                <img src="{{ asset('assets/home/img/4.jpg') }}" alt="Gallery Image">
                <div class="gallery-overlay">
                    <i class="fas fa-search-plus" style="font-size: 2rem; color: white;"></i>
                </div>
            </div>
            <div class="gallery-item">
                <img src="{{ asset('assets/home/img/5.jpg') }}" alt="Gallery Image">
                <div class="gallery-overlay">
                    <i class="fas fa-search-plus" style="font-size: 2rem; color: white;"></i>
                </div>
            </div>
            <div class="gallery-item">
                <img src="{{ asset('assets/home/img/6.jpg') }}" alt="Gallery Image">
                <div class="gallery-overlay">
                    <i class="fas fa-search-plus" style="font-size: 2rem; color: white;"></i>
                </div>
            </div>
            <div class="gallery-item">
                <img src="{{ asset('assets/home/img/7.jpg') }}" alt="Gallery Image">
                <div class="gallery-overlay">
                    <i class="fas fa-search-plus" style="font-size: 2rem; color: white;"></i>
                </div>
            </div>
            <div class="gallery-item">
                <img src="{{ asset('assets/home/img/8.jpg') }}" alt="Gallery Image">
                <div class="gallery-overlay">
                    <i class="fas fa-search-plus" style="font-size: 2rem; color: white;"></i>
                </div>
            </div>
            <div class="gallery-item">
                <img src="{{ asset('assets/home/img/9.jpg') }}" alt="Gallery Image">
                <div class="gallery-overlay">
                    <i class="fas fa-search-plus" style="font-size: 2rem; color: white;"></i>
                </div>
            </div>
            <div class="gallery-item">
                <img src="{{ asset('assets/home/img/10.png') }}" alt="Gallery Image">
                <div class="gallery-overlay">
                    <i class="fas fa-search-plus" style="font-size: 2rem; color: white;"></i>
                </div>
            </div>
            <div class="gallery-item">
                <img src="{{ asset('assets/home/img/11.png') }}" alt="Gallery Image">
                <div class="gallery-overlay">
                    <i class="fas fa-search-plus" style="font-size: 2rem; color: white;"></i>
                </div>
            </div>
        </div>
        <button class="gallery-nav gallery-nav-next" id="galleryNext">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
    </section>

    <!-- Our Values Section -->
    <section class="values fade-in" id="values">
        <div class="section-header">
            <h2>Our Values</h2>
            <p>The principles that guide everything we do</p>
        </div>
        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-rocket"></i>
                </div>
                <h3>Mission</h3>
                <p>To provide an AI-powered marketplace that connects aesthetic medical professionals, delivering customized solutions that transform the industry.</p>
            </div>
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-eye"></i>
                </div>
                <h3>Vision</h3>
                <p>To become the premier AI-powered aesthetic marketplace in the UAE and the Arab region for advanced aesthetic and medical solutions.</p>
            </div>
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h3>Excellence</h3>
                <p>We are committed to delivering the highest quality services, continuously innovating to exceed expectations and set new industry standards.</p>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials fade-in" id="testimonials">
        <div class="section-header">
            <h2>What Our Members Say</h2>
            <p>Real experiences from professionals in our community</p>
        </div>
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-quote">"</div>
                <div class="testimonial-stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text">Total Wellness has completely transformed how I approach professional development. The AI-driven course recommendations are spot-on, and I've connected with amazing professionals in the industry.</p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar">
                        <span>DM</span>
                    </div>
                    <div class="testimonial-info">
                        <h4>Dr. Maria Hassan</h4>
                        <p>Aesthetic Physician, Dubai</p>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-quote">"</div>
                <div class="testimonial-stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text">The hiring platform helped me find the perfect position at a leading clinic. The AI matching system understood exactly what I was looking for in my career.</p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar">
                        <span>SA</span>
                    </div>
                    <div class="testimonial-info">
                        <h4>Sarah Ahmed</h4>
                        <p>Aesthetic Nurse, Abu Dhabi</p>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-quote">"</div>
                <div class="testimonial-stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text">As an academy director, this platform has been invaluable. We've been able to reach more students and provide better, more personalized education through their AI tools.</p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar">
                        <span>KA</span>
                    </div>
                    <div class="testimonial-info">
                        <h4>Khalid Al-Mansoori</h4>
                        <p>Academy Director, Sharjah</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team fade-in" id="team">
        <div class="section-header">
            <h2>Meet Our Team</h2>
            <p>Dedicated professionals driving our vision</p>
        </div>
        <div class="team-grid">
            <div class="team-card">
                <div class="team-avatar">
                    <img src="{{ asset('assets/home/img/rasheed-updated.png') }}" alt="Rashid Azzouni">
                </div>
                <h3>Rashid Azzouni</h3>
                <p>Founder & CEO</p>
            </div>
            <div class="team-card">
                <div class="team-avatar">
                    <img src="{{ asset('assets/home/img/fadel-updated.png') }}" alt="Fadel Masoud">
                </div>
                <h3>Fadel Masoud</h3>
                <p>Project Manager</p>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter fade-in">
        <div class="newsletter-content">
            <h2>Newsletter Sign-up</h2>
            <p>Sign up with your email address to receive news and updates</p>
            <form class="newsletter-form" method="POST" action="{{ route('newsletter.subscribe') }}">
                @csrf
                <input type="email" name="email" placeholder="Enter your email address" required>
                <button type="submit">Subscribe</button>
            </form>
            <div id="subscribtionAlert" style="margin-top: 1rem;"></div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq fade-in" id="faq">
        <div class="section-header">
            <h2>Frequently Asked Questions</h2>
            <p>Find answers to common questions about our platform</p>
        </div>
        <div class="faq-container">
            <div class="faq-item">
                <div class="faq-question">
                    <h3>What is Total Wellness?</h3>
                    <div class="faq-icon">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
                <div class="faq-answer">
                    <p>Total Wellness is an AI-powered aesthetic marketplace that connects professionals, service providers, academics, and clients. We provide comprehensive solutions including educational services, hiring platforms, and smart technology solutions for the aesthetic industry.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h3>How do I get started?</h3>
                    <div class="faq-icon">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
                <div class="faq-answer">
                    <p>Simply click the "Join Us" button to create your account. Choose your role (professional, academy, center, or student) and complete your profile. You'll immediately gain access to our courses, networking opportunities, and AI-driven tools.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h3>What courses are available?</h3>
                    <div class="faq-icon">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
                <div class="faq-answer">
                    <p>We offer 500+ courses covering various aspects of aesthetic medicine, from beginner to advanced levels. Our AI-driven platform creates personalized learning paths tailored to your career goals and experience level.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h3>Is there a membership fee?</h3>
                    <div class="faq-icon">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
                <div class="faq-answer">
                    <p>We offer both free and premium membership options. Free members have access to basic features and select courses, while premium members enjoy unlimited access to all courses, advanced AI tools, and priority support.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h3>How does the AI-powered marketplace work?</h3>
                    <div class="faq-icon">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
                <div class="faq-answer">
                    <p>Our AI technology analyzes your profile, skills, and goals to provide personalized recommendations for courses, job opportunities, and networking connections. It continuously learns from your interactions to deliver increasingly relevant suggestions.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h3>Can I upgrade my equipment through the platform?</h3>
                    <div class="faq-icon">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
                <div class="faq-answer">
                    <p>Yes! Our Trade-In Program allows aesthetic service providers to easily upgrade their technology. Simply submit your current equipment details, receive a valuation, and apply the credit toward new, cutting-edge devices.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact fade-in" id="contact">
        <div class="section-header">
            <h2>Get In Touch</h2>
            <p>We're here to help and answer any questions</p>
        </div>
        <div class="contact-container">
            <div class="contact-info">
                <div class="contact-item location-card">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <img src="{{ asset('assets/home/img/Logo-BG.png') }}" alt="Total Wellness" class="location-logo">
                        <p>P7-ELOB Deluxe Office No.<br>Hamriyah Free Zone<br>Sharjah, UAE</p>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div>
                        <h4>Phone</h4>
                        <a href="tel:+971528704669">+971 52 870 4669</a>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h4>Email</h4>
                        <a href="mailto:info@totalwellness-international.com">info@totalwellness-international.com</a>
                    </div>
                </div>
            </div>
            <div class="contact-form">
                <form id="contactForm" action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Your Name</label>
                        <input type="text" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea name="message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">
                        Send Message <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
                <div id="contactAlert" style="margin-top: 1rem;"></div>
            </div>
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div class="lightbox" id="lightbox">
        <div class="lightbox-content">
            <div class="lightbox-close" id="lightboxClose">
                <i class="fas fa-times"></i>
            </div>
            <div class="lightbox-nav lightbox-prev" id="lightboxPrev">
                <i class="fas fa-chevron-left"></i>
            </div>
            <img src="" alt="Lightbox Image" id="lightboxImg">
            <div class="lightbox-nav lightbox-next" id="lightboxNext">
                <i class="fas fa-chevron-right"></i>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-logo">Total Wellness</div>
            <div class="social-links">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="https://www.linkedin.com/company/total-wellness-international"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
            <p class="footer-text">© 2026 TotalWellness. All rights reserved. Information provided is for educational purposes only and does not replace professional medical advice.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Intro Animation - Generate sparkles
        function createSparkles() {
            const sparkleContainer = document.getElementById('sparkleContainer');
            if (!sparkleContainer) return;
            
            const sparkleCount = 80; // Increased to fill entire viewport
            
            for (let i = 0; i < sparkleCount; i++) {
                const sparkle = document.createElement('div');
                const isStar = Math.random() > 0.3; // More stars/pluses
                
                sparkle.className = isStar ? 'sparkle star' : 'sparkle';
                sparkle.style.left = Math.random() * 100 + '%';
                sparkle.style.top = Math.random() * 100 + '%';
                sparkle.style.animationDelay = (Math.random() * 2 + 0.5) + 's';
                
                sparkleContainer.appendChild(sparkle);
            }
        }

        // Hide intro screen after animation
        function hideIntroScreen() {
            const introScreen = document.getElementById('introScreen');
            if (!introScreen) return;
            
            setTimeout(() => {
                introScreen.classList.add('hidden');
            }, 3500); // Show for 3.5 seconds
        }

        // Initialize intro animation
        document.addEventListener('DOMContentLoaded', () => {
            createSparkles();
            hideIntroScreen();
        });

        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const navCenter = document.querySelector('.nav-center');

        mobileMenuBtn.addEventListener('click', () => {
            navCenter.classList.toggle('active');
        });

        // Close mobile menu when clicking a link
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                navCenter.classList.remove('active');
            });
        });

        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Scroll Progress Bar
        const scrollProgress = document.getElementById('scrollProgress');
        window.addEventListener('scroll', () => {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrollPercentage = (scrollTop / scrollHeight) * 100;
            scrollProgress.style.width = scrollPercentage + '%';
        });

        // Sticky CTA Button
        const stickyCta = document.getElementById('stickyCta');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 800) {
                stickyCta.classList.add('visible');
            } else {
                stickyCta.classList.remove('visible');
            }
        });

        // Active Navigation Highlighting
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.nav-links a[href^="#"]');

        window.addEventListener('scroll', () => {
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (window.pageYOffset >= sectionTop - 200) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === '#' + current) {
                    link.classList.add('active');
                }
            });
        });

        // Scroll-based Stats Animation with Dynamic Counters
        const statsScrollContainer = document.querySelector('.stats-scroll-container');
        const statsContent = document.getElementById('statsContent');
        const statCounters = document.querySelectorAll('.stat-item h3');

        // Helper function to map scroll progress to counter value
        const mapScrollToValue = (scrollProgress, start, end, min, max) => {
            if (scrollProgress < start) return 0;
            if (scrollProgress > end) return max;
            
            const progress = (scrollProgress - start) / (end - start);
            return Math.round(progress * max);
        };

        const animateStatsOnScroll = () => {
            if (!statsScrollContainer) return;

            const containerRect = statsScrollContainer.getBoundingClientRect();
            const containerTop = containerRect.top;
            const containerHeight = containerRect.height;
            const viewportHeight = window.innerHeight;

            // Calculate scroll progress (0 to 1)
            const scrollProgress = Math.max(0, Math.min(1, 
                (viewportHeight - containerTop) / (viewportHeight + containerHeight / 2)
            ));

            // Show stats content when scroll progress is between 0.2 and 0.9
            if (scrollProgress > 0.15 && scrollProgress < 0.9) {
                statsContent.classList.add('visible');
            } else if (scrollProgress <= 0.1 || scrollProgress >= 0.95) {
                statsContent.classList.remove('visible');
            }

            // Update counter values based on scroll progress
            // Numbers reach max at 0.5, hold until 0.7, then can decrease if scrolling back
            statCounters.forEach((counter, index) => {
                const target = parseInt(counter.getAttribute('data-target'));
                const isPercentage = counter.innerText.includes('%');
                const suffix = isPercentage ? '%' : '+';
                
                // Different scroll ranges for each counter (staggered)
                const startProgress = 0.2 + (index * 0.05);
                const endProgress = 0.5;
                
                // Calculate current value based on scroll position
                const currentValue = mapScrollToValue(scrollProgress, startProgress, endProgress, 0, target);
                
                // Update the counter display
                counter.innerText = currentValue + suffix;
            });
        };

        // Add scroll listener for stats animation
        window.addEventListener('scroll', animateStatsOnScroll);
        animateStatsOnScroll(); // Initial check

        // FAQ Accordion
        const faqItems = document.querySelectorAll('.faq-item');
        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question');
            question.addEventListener('click', () => {
                const isActive = item.classList.contains('active');
                
                // Close all other items
                faqItems.forEach(otherItem => {
                    otherItem.classList.remove('active');
                });
                
                // Toggle current item
                if (!isActive) {
                    item.classList.add('active');
                }
            });
        });

        // Scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    
                    // Trigger counter animation when stats section is visible
                    if (entry.target.classList.contains('stats') && !counterAnimated) {
                        counterAnimated = true;
                        animateCounters();
                    }
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });
        
        // Observe stats section for counter animation
        const statsSection = document.querySelector('.stats');
        if (statsSection) {
            observer.observe(statsSection);
        }

        // Service Card Flip Interaction
        const serviceCards = document.querySelectorAll('.service-card');
        serviceCards.forEach(card => {
            card.addEventListener('click', function(e) {
                // Don't flip if clicking on a link
                if (e.target.tagName === 'A' || e.target.closest('a')) {
                    return;
                }
                this.classList.toggle('flipped');
            });
        });

        // Gallery Carousel Navigation
        const galleryGrid = document.getElementById('galleryGrid');
        const galleryPrevBtn = document.getElementById('galleryPrev');
        const galleryNextBtn = document.getElementById('galleryNext');

        if (galleryPrevBtn && galleryNextBtn && galleryGrid) {
            const galleryItemsForNav = document.querySelectorAll('.gallery-item');
            
            galleryPrevBtn.addEventListener('click', () => {
                const currentScroll = galleryGrid.scrollLeft;
                const itemWidth = galleryItemsForNav[0].offsetWidth + 16; // item width + gap
                
                // If at the beginning, jump to the end
                if (currentScroll <= 0) {
                    galleryGrid.scrollTo({ 
                        left: galleryGrid.scrollWidth - galleryGrid.offsetWidth, 
                        behavior: 'smooth' 
                    });
                } else {
                    galleryGrid.scrollBy({ left: -itemWidth, behavior: 'smooth' });
                }
            });

            galleryNextBtn.addEventListener('click', () => {
                const currentScroll = galleryGrid.scrollLeft;
                const maxScroll = galleryGrid.scrollWidth - galleryGrid.offsetWidth;
                const itemWidth = galleryItemsForNav[0].offsetWidth + 16; // item width + gap
                
                // If at the end, jump to the beginning
                if (currentScroll >= maxScroll - 10) { // -10 for tolerance
                    galleryGrid.scrollTo({ left: 0, behavior: 'smooth' });
                } else {
                    galleryGrid.scrollBy({ left: itemWidth, behavior: 'smooth' });
                }
            });
        }

        // Gallery Lightbox
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.getElementById('lightboxImg');
        const lightboxClose = document.getElementById('lightboxClose');
        const lightboxPrev = document.getElementById('lightboxPrev');
        const lightboxNext = document.getElementById('lightboxNext');
        const galleryItems = document.querySelectorAll('.gallery-item');
        let currentImageIndex = 0;
        const galleryImages = Array.from(galleryItems).map(item => item.querySelector('img').src);

        // Open lightbox when clicking gallery items
        galleryItems.forEach((item, index) => {
            item.addEventListener('click', () => {
                currentImageIndex = index;
                lightboxImg.src = galleryImages[currentImageIndex];
                lightbox.classList.add('active');
                document.body.style.overflow = 'hidden';
            });
        });

        // Close lightbox
        lightboxClose.addEventListener('click', closeLightbox);
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) {
                closeLightbox();
            }
        });

        function closeLightbox() {
            lightbox.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Navigate lightbox
        lightboxPrev.addEventListener('click', (e) => {
            e.stopPropagation();
            currentImageIndex = (currentImageIndex - 1 + galleryImages.length) % galleryImages.length;
            lightboxImg.src = galleryImages[currentImageIndex];
        });

        lightboxNext.addEventListener('click', (e) => {
            e.stopPropagation();
            currentImageIndex = (currentImageIndex + 1) % galleryImages.length;
            lightboxImg.src = galleryImages[currentImageIndex];
        });

        // Keyboard navigation for lightbox
        document.addEventListener('keydown', (e) => {
            if (!lightbox.classList.contains('active')) return;
            
            if (e.key === 'Escape') {
                closeLightbox();
            } else if (e.key === 'ArrowLeft') {
                currentImageIndex = (currentImageIndex - 1 + galleryImages.length) % galleryImages.length;
                lightboxImg.src = galleryImages[currentImageIndex];
            } else if (e.key === 'ArrowRight') {
                currentImageIndex = (currentImageIndex + 1) % galleryImages.length;
                lightboxImg.src = galleryImages[currentImageIndex];
            }
        });

        // Contact Form
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
                    alertBox.html('<div style="padding: 1rem; background: rgba(79, 172, 254, 0.2); border-radius: 12px; color: white;">Sending...</div>');
                },
                success: function(response) {
                    alertBox.html('<div style="padding: 1rem; background: rgba(76, 175, 80, 0.2); border-radius: 12px; color: white;">' + response.message + '</div>');
                    form.trigger('reset');
                },
                error: function(xhr) {
                    let msg = 'Something went wrong. Please try again.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        msg = xhr.responseJSON.message;
                    }
                    alertBox.html('<div style="padding: 1rem; background: rgba(244, 67, 54, 0.2); border-radius: 12px; color: white;">' + msg + '</div>');
                }
            });
        });

        // Newsletter Form
        $('.newsletter-form').on('submit', function(e) {
            e.preventDefault();
            let form = $(this);
            let messageBox = $('#subscribtionAlert');
            messageBox.html('');

            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: form.serialize(),
                success: function(res) {
                    messageBox.html(`<div style="padding: 1rem; background: rgba(76, 175, 80, 0.2); border-radius: 12px; color: white;">${res.message}</div>`);
                    form.trigger('reset');
                },
                error: function(xhr) {
                    let msg = 'Something went wrong.';
                    if (xhr.status === 422 && xhr.responseJSON?.errors?.email) {
                        msg = xhr.responseJSON.errors.email[0];
                    }
                    messageBox.html(`<div style="padding: 1rem; background: rgba(244, 67, 54, 0.2); border-radius: 12px; color: white;">${msg}</div>`);
                }
            });
        });
    </script>
</body>
</html>
