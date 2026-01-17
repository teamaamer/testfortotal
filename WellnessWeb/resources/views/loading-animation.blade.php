<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading - Total Wellness</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Outfit', sans-serif;
            overflow: hidden;
        }

        /* Intro Animation Screen Styles */
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
            z-index: 2;
        }

        .intro-logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1.5rem;
            margin-bottom: 2rem;
            opacity: 0;
            animation: fadeInUp 0.8s ease forwards;
        }

        .intro-logo {
            height: 80px;
            width: auto;
            filter: drop-shadow(0 0 20px rgba(102, 126, 234, 0.5));
        }

        .intro-small {
            display: block;
            font-size: clamp(0.9rem, 1.5vw, 1.2rem);
            font-weight: 500;
            letter-spacing: 0.3em;
            color: rgba(255, 255, 255, 0.7);
            opacity: 0;
            animation: fadeInUp 0.8s ease forwards;
            animation-delay: 0.2s;
        }

        .intro-title {
            font-size: clamp(4rem, 12vw, 10rem);
            font-weight: 900;
            line-height: 0.95;
            margin: 1rem 0;
            letter-spacing: -0.02em;
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
            text-align: right;
            animation-delay: 1s;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideUpFade {
            from {
                opacity: 0;
                transform: translateY(100px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Sparkle Effects */
        .sparkle-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
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

        /* Decorative Elements */
        .decorative-element {
            position: absolute;
            opacity: 0;
            animation: floatIn 1.2s ease forwards;
        }

        .decorative-element svg {
            width: 100%;
            height: 100%;
        }

        .element-1 {
            width: 80px;
            height: 80px;
            top: 15%;
            left: 10%;
            animation-delay: 1.2s;
        }

        .element-2 {
            width: 100px;
            height: 100px;
            bottom: 20%;
            right: 15%;
            animation-delay: 1.4s;
        }

        .element-3 {
            width: 120px;
            height: 120px;
            top: 60%;
            left: 5%;
            animation-delay: 1.6s;
        }

        .element-4 {
            width: 90px;
            height: 90px;
            top: 25%;
            right: 8%;
            animation-delay: 1.8s;
        }

        @keyframes floatIn {
            from {
                opacity: 0;
                transform: scale(0) rotate(-180deg);
            }
            to {
                opacity: 1;
                transform: scale(1) rotate(0deg);
            }
        }

        /* Animated Background */
        .animated-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
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

        /* Responsive Adjustments */
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
    <!-- Intro Animation Screen -->
    <div class="intro-screen active" id="introScreen">
        <div class="animated-bg"></div>
        
        <div class="intro-content">
            <div class="intro-text">
                <!-- Logo and AI-Powered Marketplace -->
                <div class="intro-logo-container">
                    <img src="{{ asset('assets/home/img/x.png') }}" alt="Total Wellness" class="intro-logo">
                    <span class="intro-small">AI-POWERED MARKETPLACE</span>
                </div>
                
                <h1 class="intro-title">
                    <span class="intro-line">CONNECT.</span>
                    <span class="intro-line">EMPOWER.</span>
                    <span class="intro-line">SUCCEED</span>
                </h1>
                
                <span class="intro-small intro-small-right">TOTAL WELLNESS</span>
            </div>
            
            <!-- Sparkle Container -->
            <div class="sparkle-container" id="sparkleContainer">
                <!-- Sparkles will be generated by JavaScript -->
            </div>
            
            <!-- Decorative Elements -->
            <div class="decorative-element element-1">
                <svg viewBox="0 0 40 40" fill="none">
                    <circle cx="20" cy="20" r="15" fill="#667eea" opacity="0.6"/>
                    <circle cx="20" cy="20" r="8" fill="#764ba2"/>
                </svg>
            </div>
            <div class="decorative-element element-2">
                <svg viewBox="0 0 40 40" fill="none">
                    <circle cx="20" cy="20" r="15" fill="#764ba2" opacity="0.6"/>
                    <circle cx="20" cy="20" r="8" fill="#667eea"/>
                </svg>
            </div>
            <div class="decorative-element element-3">
                <svg viewBox="0 0 60 60" fill="none">
                    <path d="M30 10 L40 30 L30 50 L20 30 Z" fill="#667eea" opacity="0.5"/>
                </svg>
            </div>
            <div class="decorative-element element-4">
                <svg viewBox="0 0 60 60" fill="none">
                    <path d="M30 15 L45 30 L30 45 L15 30 Z" stroke="#764ba2" stroke-width="2" fill="none" opacity="0.6"/>
                </svg>
            </div>
        </div>
    </div>

    <script>
        // Generate sparkles
        function createSparkles() {
            const sparkleContainer = document.getElementById('sparkleContainer');
            const sparkleCount = 30;
            
            for (let i = 0; i < sparkleCount; i++) {
                const sparkle = document.createElement('div');
                const isStar = Math.random() > 0.5;
                
                sparkle.className = isStar ? 'sparkle star' : 'sparkle';
                sparkle.style.left = Math.random() * 100 + '%';
                sparkle.style.top = Math.random() * 100 + '%';
                sparkle.style.animationDelay = (Math.random() * 2 + 1) + 's';
                
                sparkleContainer.appendChild(sparkle);
            }
        }

        // Hide intro screen after animation
        function hideIntroScreen() {
            const introScreen = document.getElementById('introScreen');
            setTimeout(() => {
                introScreen.classList.add('hidden');
                // Redirect to main page after fade out
                setTimeout(() => {
                    window.location.href = '{{ url("/") }}';
                }, 800);
            }, 3500); // Show for 3.5 seconds
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', () => {
            createSparkles();
            hideIntroScreen();
        });
    </script>
</body>
</html>
