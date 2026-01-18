<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Total Wellness</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/home/img/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        :root { 
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --dark-bg: #0f0f23;
            --card-bg: rgba(255, 255, 255, 0.05);
            --glass-border: rgba(255, 255, 255, 0.1);
        }
        body { font-family: 'Outfit', sans-serif; background: var(--dark-bg); color: #ffffff; min-height: 100vh; overflow-x: hidden; }
        
        /* Global Input Font Styles */
        input, textarea, select, button {
            font-family: 'Outfit', sans-serif !important;
        }
        input::placeholder, textarea::placeholder {
            font-family: 'Outfit', sans-serif !important;
        }
        
        .animated-bg { position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; background: linear-gradient(135deg, #0f0f23 0%, #1a1a2e 50%, #16213e 100%); }
        .animated-bg::before { content: ''; position: absolute; width: 200%; height: 200%; background: radial-gradient(circle, rgba(102, 126, 234, 0.1) 1px, transparent 1px); background-size: 50px 50px; animation: moveBackground 20s linear infinite; }
        @keyframes moveBackground { 0% { transform: translate(0, 0); } 100% { transform: translate(50px, 50px); } }
        
        /* Navigation */
        nav { position: fixed; top: 0; width: 100%; z-index: 1000; padding: 1rem 0; background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(20px); border-bottom: 1px solid rgba(0, 0, 0, 0.05); }
        .nav-container { max-width: 1400px; margin: 0 auto; padding: 0 2rem; display: flex; justify-content: space-between; align-items: center; gap: 1rem; }
        .logo { height: 50px; }
        .nav-links { display: flex; align-items: center; gap: 2rem; }
        .nav-link { color: #333; text-decoration: none; font-weight: 500; transition: all 0.3s ease; position: relative; }
        .nav-link::after { content: ''; position: absolute; bottom: -5px; left: 0; width: 0; height: 2px; background: var(--primary-gradient); transition: width 0.3s ease; }
        .nav-link:hover::after { width: 100%; }
        .nav-right { display: flex; align-items: center; gap: 1.5rem; }
        .user-menu { position: relative; }
        .user-avatar { width: 45px; height: 45px; border-radius: 50%; object-fit: cover; border: 2px solid rgba(102, 126, 234, 0.3); cursor: pointer; transition: all 0.3s ease; }
        .user-avatar:hover { border-color: #667eea; transform: scale(1.05); }
        .user-dropdown { position: absolute; top: calc(100% + 1rem); right: 0; width: 250px; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(20px); border-radius: 16px; padding: 1rem; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15); opacity: 0; visibility: hidden; transform: translateY(-10px); transition: all 0.3s ease; }
        .user-menu:hover .user-dropdown { opacity: 1; visibility: visible; transform: translateY(0); }
        .user-info { padding: 1rem; border-bottom: 1px solid rgba(0, 0, 0, 0.1); margin-bottom: 0.5rem; }
        .user-name { font-weight: 600; color: #333; font-size: 1rem; }
        .user-role { font-size: 0.875rem; color: #666; }
        .dropdown-item { display: flex; align-items: center; gap: 0.75rem; padding: 0.75rem 1rem; color: #000 !important; text-decoration: none; border-radius: 8px; transition: all 0.3s ease; font-weight: 500; }
        .dropdown-item:hover { background: rgba(102, 126, 234, 0.1) !important; color: #000 !important; }
        .dropdown-item i { width: 20px; color: #000 !important; }
        .dropdown-item.logout-btn { color: #dc3545 !important; }
        .dropdown-item.logout-btn:hover { background: rgba(220, 53, 69, 0.1) !important; color: #dc3545 !important; }
        .dropdown-item.logout-btn i { color: #dc3545 !important; }
        
        /* Sidebar */
        .sidebar { position: fixed; left: 0; top: 80px; width: 280px; height: calc(100vh - 80px); background: linear-gradient(180deg, rgba(163, 140, 196, 0.15) 0%, rgba(123, 79, 214, 0.1) 100%); backdrop-filter: blur(20px); border-right: 1px solid var(--glass-border); padding: 1.5rem 0; overflow-y: auto; overflow-x: hidden; transition: width 0.4s cubic-bezier(0.4, 0, 0.2, 1), transform 0.3s ease; z-index: 999; }
        .sidebar-menu { list-style: none; padding: 0 1rem; }
        .sidebar-menu li { margin-bottom: 0.5rem; }
        .sidebar-menu a { display: flex; align-items: center; gap: 1rem; padding: 1rem 1.25rem; color: rgba(255, 255, 255, 0.8); text-decoration: none; border-radius: 12px; transition: all 0.3s ease; font-weight: 500; white-space: nowrap; }
        .sidebar-menu a:hover, .sidebar-menu a.active { background: var(--primary-gradient); color: white; }
        .sidebar-menu i { width: 24px; font-size: 1.125rem; transition: margin 0.4s cubic-bezier(0.4, 0, 0.2, 1); }
        .sidebar-menu a span { transition: opacity 0.3s ease, transform 0.3s ease; }
        
        /* Custom Dropdown Menus */
        .dropdown-menu {
            background: rgba(30, 30, 46, 0.95) !important;
            backdrop-filter: blur(20px);
            border: 1px solid rgba(102, 126, 234, 0.3) !important;
            border-radius: 12px !important;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5) !important;
            padding: 0.5rem !important;
            margin-top: 0.5rem !important;
        }

        .dropdown-item {
            color: rgba(255, 255, 255, 0.9) !important;
            padding: 0.75rem 1rem !important;
            border-radius: 8px !important;
            transition: all 0.3s ease !important;
            display: flex !important;
            align-items: center !important;
            gap: 0.5rem !important;
        }

        .dropdown-item:hover {
            background: rgba(102, 126, 234, 0.2) !important;
            color: white !important;
        }

        .dropdown-item.text-danger {
            color: #ff4757 !important;
        }

        .dropdown-item.text-danger:hover {
            background: rgba(255, 71, 87, 0.2) !important;
            color: #ff4757 !important;
        }

        .dropdown-divider {
            border-top: 1px solid rgba(255, 255, 255, 0.1) !important;
            margin: 0.5rem 0 !important;
        }

        /* Custom Select Dropdowns */
        select.form-control,
        select.custom-select,
        select {
            background: rgba(255, 255, 255, 0.1) !important;
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
            border-radius: 10px !important;
            color: white !important;
            padding: 0.75rem 1rem !important;
            transition: all 0.3s ease !important;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23ffffff' d='M6 9L1 4h10z'/%3E%3C/svg%3E") !important;
            background-repeat: no-repeat !important;
            background-position: right 1rem center !important;
            background-size: 12px !important;
            padding-right: 2.5rem !important;
        }

        select.form-control:focus,
        select.custom-select:focus,
        select:focus {
            outline: none !important;
            border-color: rgba(102, 126, 234, 0.5) !important;
            background: rgba(255, 255, 255, 0.15) !important;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1) !important;
        }

        select.form-control option,
        select.custom-select option,
        select option {
            background: #1a1a2e !important;
            color: white !important;
            padding: 0.75rem 1rem !important;
        }

        select.form-control option:hover,
        select.custom-select option:hover,
        select option:hover {
            background: rgba(102, 126, 234, 0.3) !important;
        }

        select.form-control option:checked,
        select.custom-select option:checked,
        select option:checked {
            background: rgba(102, 126, 234, 0.5) !important;
            color: white !important;
        }
        
        /* Custom Styled Dropdown Component */
        .custom-dropdown {
            position: relative;
            min-width: 180px;
        }
        
        .custom-dropdown-toggle {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid var(--glass-border);
            border-radius: 10px;
            padding: 0.75rem 2.5rem 0.75rem 1rem;
            color: white;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            user-select: none;
        }
        
        .custom-dropdown-toggle:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(102, 126, 234, 0.4);
        }
        
        .custom-dropdown-toggle.active {
            border-color: rgba(102, 126, 234, 0.5);
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        .custom-dropdown-arrow {
            width: 12px;
            height: 12px;
            transition: transform 0.3s ease;
        }
        
        .custom-dropdown-toggle.active .custom-dropdown-arrow {
            transform: rotate(180deg);
        }
        
        .custom-dropdown-menu {
            position: absolute;
            top: calc(100% + 0.5rem);
            left: 0;
            right: 0;
            background: rgba(30, 30, 46, 0.98);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(102, 126, 234, 0.3);
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
            padding: 0.5rem;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 1000;
            max-height: 300px;
            overflow-y: auto;
        }
        
        .custom-dropdown-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        .custom-dropdown-item {
            padding: 0.75rem 1rem;
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            border-radius: 8px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .custom-dropdown-item:hover {
            background: rgba(102, 126, 234, 0.2);
            color: white;
        }
        
        .custom-dropdown-item.selected {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-weight: 600;
        }
        
        .custom-dropdown-item i {
            width: 16px;
            font-size: 0.875rem;
        }
        
        .custom-dropdown-item .checkmark {
            margin-left: auto;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .custom-dropdown-item.selected .checkmark {
            opacity: 1;
        }
        
        /* Main Content */
        .main-content { 
            margin-left: 280px; 
            padding: 6.5rem 1.5rem 1.5rem; 
            min-height: 100vh; 
            transition: margin-left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            animation: fadeInUp 0.5s ease-out;
        }
        .dashboard-header { margin-bottom: 1.5rem; }
        .dashboard-header h1 { font-size: 1.75rem; font-weight: 700; margin-bottom: 0.5rem; }
        .dashboard-header p { color: rgba(255, 255, 255, 0.7); font-size: 1rem; }
        
        /* Page Transition Animations */
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
        
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        
        /* Animate cards and elements */
        .stat-card,
        .quote-section {
            animation: fadeInUp 0.6s ease-out backwards;
        }
        
        .stat-card:nth-child(1) { animation-delay: 0.1s; }
        .stat-card:nth-child(2) { animation-delay: 0.2s; }
        .stat-card:nth-child(3) { animation-delay: 0.3s; }
        .stat-card:nth-child(4) { animation-delay: 0.4s; }
        
        .quote-section { animation-delay: 0.5s; }
        
        /* Stats Grid */
        .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.25rem; margin-bottom: 1.5rem; }
        .stat-card { background: var(--card-bg); backdrop-filter: blur(20px); border: 1px solid var(--glass-border); border-radius: 16px; padding: 1.5rem; transition: all 0.3s ease; position: relative; overflow: hidden; }
        .stat-card::before { content: ''; position: absolute; top: 0; right: 0; width: 120px; height: 120px; background: var(--primary-gradient); opacity: 0.1; border-radius: 50%; transform: translate(50%, -50%); }
        .stat-card:hover { transform: translateY(-5px); box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3); }
        .stat-icon { width: 50px; height: 50px; background: var(--primary-gradient); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; margin-bottom: 1rem; }
        .stat-value { font-size: 2rem; font-weight: 700; margin-bottom: 0.5rem; }
        .stat-label { color: rgba(255, 255, 255, 0.7); font-size: 0.9375rem; margin-bottom: 0.75rem; }
        .stat-link { display: inline-flex; align-items: center; gap: 0.5rem; color: #667eea; text-decoration: none; font-weight: 500; font-size: 0.875rem; }
        .stat-link:hover { gap: 0.75rem; }
        
        /* Quote Section */
        .quote-section { background: var(--card-bg); backdrop-filter: blur(20px); border: 1px solid var(--glass-border); border-radius: 16px; padding: 2rem; text-align: center; margin-bottom: 1.5rem; }
        .quote-label { color: #667eea; font-size: 0.8125rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.75rem; }
        .quote-text { font-size: 1.25rem; font-weight: 600; line-height: 1.5; margin-bottom: 1rem; color: rgba(255, 255, 255, 0.95); }
        .quote-author { color: rgba(255, 255, 255, 0.6); font-size: 0.9375rem; font-style: italic; }
        
        /* Sidebar Toggle */
        .sidebar-toggle-btn { background: none; border: none; color: #333; font-size: 1.25rem; cursor: pointer; padding: 0.5rem; border-radius: 8px; transition: all 0.3s ease; }
        .sidebar-toggle-btn:hover { background: rgba(102, 126, 234, 0.1); transform: scale(1.05); }
        .sidebar.collapsed { width: 80px; }
        .sidebar.collapsed .sidebar-menu a { justify-content: center; padding: 1rem; }
        .sidebar.collapsed .sidebar-menu a span { opacity: 0; transform: translateX(-10px); pointer-events: none; position: absolute; }
        .sidebar.collapsed .sidebar-menu i { margin: 0; }
        .main-content.expanded { margin-left: 80px; }
        
        /* Responsive */
        @media (max-width: 1024px) {
            .sidebar { transform: translateX(-100%); width: 280px !important; }
            .sidebar.active { transform: translateX(0); }
            .main-content { margin-left: 0 !important; }
            .nav-links { gap: 1rem; }
            .nav-link { font-size: 0.9375rem; }
        }
        
        @media (max-width: 1200px) {
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
        }
        
        @media (max-width: 768px) {
            .nav-container { padding: 0 0.75rem; gap: 0.5rem; }
            .logo { height: 35px; }
            .nav-links { gap: 0.75rem; }
            .nav-link { font-size: 0.875rem; padding: 0.5rem 0.75rem; }
            .main-content { padding: 6.5rem 1rem 2rem; }
            .dashboard-header h1 { font-size: 1.5rem; }
            .stats-grid { grid-template-columns: repeat(2, 1fr); gap: 1rem; }
            .stat-card { padding: 1.25rem; }
            .stat-icon { width: 45px; height: 45px; font-size: 1.25rem; margin-bottom: 0.75rem; }
            .stat-value { font-size: 1.75rem; }
            .stat-label { font-size: 0.875rem; }
            .stat-link { font-size: 0.8125rem; }
            .quote-section { padding: 1.5rem; }
            .quote-text { font-size: 1.125rem; }
        }
        
        @yield('css')
    </style>
</head>
<body>
    <div class="animated-bg"></div>
    
    <!-- Navigation -->
    <nav>
        <div class="nav-container">
            <div style="display: flex; align-items: center; gap: 1rem; margin-left: -0.5rem;">
                <button class="sidebar-toggle-btn" id="sidebarToggleBtn">
                    <i class="fas fa-bars"></i>
                </button>
                <a href="{{ url('/') }}">
                    <img src="{{ asset('assets/home/img/Logo-BG.png') }}" alt="Total Wellness" class="logo">
                </a>
            </div>
            
            <div class="nav-links">
                <a href="{{ url('dashboard/') }}" class="nav-link">Home</a>
                <a href="{{ url('dashboard/contact_us') }}" class="nav-link">Contact</a>
            </div>
            
            <div class="nav-right">
                <div class="user-menu">
                    <img src="{{ asset('/uploads/avatars/' . Auth::user()->account->avatar) }}" 
                         alt="User Avatar" 
                         class="user-avatar">
                    <div class="user-dropdown">
                        <div class="user-info">
                            <div class="user-name">{{ Auth::user()->account->name }}</div>
                            <div class="user-role">{{ ucfirst(Auth::user()->role) }}</div>
                        </div>
                        <a href="{{ url('dashboard/accounts/' . Auth::user()->account->id) }}" class="dropdown-item" style="color: #000 !important;">
                            <i class="fas fa-user" style="color: #000 !important;"></i> My Profile
                        </a>
                        <a href="{{ url('dashboard/accounts/' . Auth::user()->account->id . '/edit') }}" class="dropdown-item" style="color: #000 !important;">
                            <i class="fas fa-cog" style="color: #000 !important;"></i> Settings
                        </a>
                        <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                            @csrf
                            <button type="submit" class="dropdown-item logout-btn" style="width: 100%; background: none; border: none; cursor: pointer; font-family: 'Outfit', sans-serif; font-size: 1rem;">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <ul class="sidebar-menu">
            <li><a href="{{ url('dashboard') }}" class="{{ request()->is('dashboard') && !request()->is('dashboard/*') ? 'active' : '' }}">
                <i class="fas fa-home"></i> <span>Dashboard</span>
            </a></li>
            
            @if(auth()->user()->isAdmin())
            <li><a href="{{ url('dashboard/accounts') }}" class="{{ request()->is('dashboard/accounts*') ? 'active' : '' }}">
                <i class="fas fa-user"></i> <span>Accounts Manager</span>
            </a></li>
            @endif
            
            @if(auth()->user()->isCenter())
            <li><a href="{{ url('dashboard/jobApplications') }}" class="{{ request()->is('dashboard/jobApplication*') ? 'active' : '' }}">
                <i class="fas fa-id-card"></i> <span>Manage Applicants</span>
            </a></li>
            @endif
            
            @if(auth()->user()->isAdmin())
            <li><a href="{{ url('dashboard/contactRequests') }}" class="{{ request()->is('dashboard/contactRequests*') ? 'active' : '' }}">
                <i class="fas fa-envelope"></i> <span>Contact Requests</span>
            </a></li>
            @endif
            
            @if(auth()->user()->isAdmin())
            <li><a href="{{ url('dashboard/subscribtions') }}" class="{{ request()->is('dashboard/subscribtions*') ? 'active' : '' }}">
                <i class="fas fa-wallet"></i> <span>Subscriptions</span>
            </a></li>
            @endif
            
            @if(auth()->user()->hasAnyRole(['admin', 'student', 'academy']))
            <li><a href="{{ url('dashboard/academies') }}" class="{{ request()->is('dashboard/academies*') ? 'active' : '' }}">
                <i class="fas fa-landmark"></i> <span>Affiliated Academies</span>
            </a></li>
            
            <li><a href="{{ url('dashboard/courses') }}" class="{{ request()->is('dashboard/courses*') ? 'active' : '' }}">
                <i class="fas fa-book"></i> <span>Courses Catalog</span>
            </a></li>
            @endif
            
            @if(auth()->user()->isCenter())
            <li><a href="{{ url('dashboard/maintenance') }}" class="{{ request()->is('dashboard/maintenance*') ? 'active' : '' }}">
                <i class="fas fa-tools"></i> <span>Maintenance Support</span>
            </a></li>
            
            <li><a href="{{ url('dashboard/tradein') }}" class="{{ request()->is('dashboard/tradein*') ? 'active' : '' }}">
                <i class="fas fa-sitemap"></i> <span>Trade-In Program</span>
            </a></li>
            @endif
            
            @if(auth()->user()->isAdmin())
            <li><a href="{{ url('dashboard/devices') }}" class="{{ request()->is('dashboard/devices*') ? 'active' : '' }}">
                <i class="fas fa-dice"></i> <span>Devices & Products</span>
            </a></li>
            @endif
            
            <li><a href="{{ url('dashboard/contact_us') }}" class="{{ request()->is('dashboard/contact_us*') ? 'active' : '' }}">
                <i class="fas fa-comments"></i> <span>Help & Support</span>
            </a></li>
            
            <li><a href="{{ url('/') }}">
                <i class="fas fa-globe"></i> <span>Visit Website</span>
            </a></li>
        </ul>
    </aside>
    
    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        // Sidebar Toggle
        const sidebarToggleBtn = document.getElementById('sidebarToggleBtn');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.querySelector('.main-content');
        
        if (sidebarToggleBtn && sidebar && mainContent) {
            sidebarToggleBtn.addEventListener('click', () => {
                if (window.innerWidth > 1024) {
                    // Desktop: collapse/expand sidebar
                    sidebar.classList.toggle('collapsed');
                    mainContent.classList.toggle('expanded');
                } else {
                    // Mobile: show/hide sidebar
                    sidebar.classList.toggle('active');
                }
            });
            
            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', (e) => {
                if (window.innerWidth <= 1024) {
                    if (!sidebar.contains(e.target) && !sidebarToggleBtn.contains(e.target)) {
                        sidebar.classList.remove('active');
                    }
                }
            });
        }
        
        // Toastr notifications
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif

        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif
        
        // Global Custom Dropdown Initialization
        window.initCustomDropdown = function(dropdownId, onChangeCallback) {
            const dropdown = $('#' + dropdownId);
            if (!dropdown.length) return;
            
            const toggle = dropdown.find('.custom-dropdown-toggle');
            const menu = dropdown.find('.custom-dropdown-menu');
            const items = dropdown.find('.custom-dropdown-item');
            const selectedText = toggle.find('span').first();
            
            // Toggle dropdown
            toggle.on('click', function(e) {
                e.stopPropagation();
                
                // Close other dropdowns
                $('.custom-dropdown-toggle').not(this).removeClass('active');
                $('.custom-dropdown-menu').not(menu).removeClass('show');
                
                toggle.toggleClass('active');
                menu.toggleClass('show');
            });
            
            // Select item
            items.on('click', function() {
                const value = $(this).data('value');
                const text = $(this).find('span').first().text();
                
                // Update selected state
                items.removeClass('selected');
                $(this).addClass('selected');
                
                // Update toggle text
                selectedText.text(text);
                
                // Store value
                dropdown.data('selected-value', value);
                
                // Close dropdown
                toggle.removeClass('active');
                menu.removeClass('show');
                
                // Callback
                if (typeof onChangeCallback === 'function') {
                    onChangeCallback(value, text);
                }
            });
            
            // Close dropdown when clicking outside
            $(document).on('click', function(e) {
                if (!dropdown.is(e.target) && dropdown.has(e.target).length === 0) {
                    toggle.removeClass('active');
                    menu.removeClass('show');
                }
            });
            
            return {
                getValue: function() {
                    return dropdown.data('selected-value') || '';
                },
                setValue: function(value) {
                    const item = items.filter('[data-value="' + value + '"]');
                    if (item.length) {
                        item.trigger('click');
                    }
                }
            };
        };
    </script>
    
    @yield('js')
</body>
</html>
