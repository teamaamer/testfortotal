@extends('layouts.dashboard.modern')

@section('title', 'Account Profile')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<style>
    /* Profile Cover Section */
    .profile-cover {
        position: relative;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        padding: 3rem 2rem 2rem;
        margin-bottom: 2rem;
        overflow: hidden;
    }

    .profile-cover-gradient {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
        pointer-events: none;
    }

    .profile-cover-content {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        gap: 2rem;
        flex-wrap: wrap;
    }

    .profile-avatar-large {
        position: relative;
        flex-shrink: 0;
    }

    .profile-avatar-large img {
        width: 140px;
        height: 140px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
    }

    .avatar-status-indicator {
        position: absolute;
        bottom: 10px;
        right: 10px;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        border: 4px solid white;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }

    .avatar-status-indicator.status-active {
        background: #4ade80;
    }

    .avatar-status-indicator.status-inactive {
        background: #fb923c;
    }

    .avatar-status-indicator.status-blocked {
        background: #f87171;
    }

    .profile-header-info {
        flex: 1;
        min-width: 250px;
    }

    .profile-display-name {
        font-size: 2rem;
        font-weight: 700;
        color: white;
        margin-bottom: 0.5rem;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    .profile-subtitle {
        font-size: 1.125rem;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 1rem;
    }

    .profile-badges {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
    }

    .profile-actions {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
        margin-left: auto;
    }
    
    .profile-btn {
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        text-decoration: none;
        border: none;
        cursor: pointer;
        font-size: 0.9375rem;
    }
    
    .profile-btn-primary {
        background: var(--primary-gradient);
        color: white;
    }
    
    .profile-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        color: white;
    }
    
    .profile-btn-danger {
        background: rgba(239, 68, 68, 0.2);
        color: #f87171;
        border: 1px solid rgba(239, 68, 68, 0.3);
    }
    
    .profile-btn-danger:hover {
        background: rgba(239, 68, 68, 0.3);
        transform: translateY(-2px);
    }
    
    .profile-grid {
        display: grid;
        grid-template-columns: 380px 1fr;
        gap: 1.5rem;
        margin-bottom: 1rem;
    }
    
    .profile-sidebar {
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
    }
    
    .profile-card {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 1.5rem;
        position: relative;
        overflow: hidden;
    }
    
    .profile-card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 120px;
        height: 120px;
        background: var(--primary-gradient);
        opacity: 0.1;
        border-radius: 50%;
        transform: translate(50%, -50%);
    }
    
    .profile-avatar-section {
        display: flex;
        align-items: center;
        gap: 1.25rem;
        position: relative;
        z-index: 1;
        margin-bottom: 1.5rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .profile-avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid rgba(102, 126, 234, 0.3);
        flex-shrink: 0;
    }
    
    .profile-info-header {
        flex: 1;
    }
    
    .profile-name {
        font-size: 1.375rem;
        font-weight: 700;
        color: white;
        margin-bottom: 0.375rem;
    }
    
    .profile-job-title {
        color: rgba(255, 255, 255, 0.6);
        font-size: 0.875rem;
        margin-bottom: 0;
    }
    
    .profile-info-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .profile-info-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.75rem 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .profile-info-item:last-child {
        border-bottom: none;
    }
    
    .profile-info-label {
        font-weight: 600;
        color: rgba(255, 255, 255, 0.9);
    }
    
    .profile-info-value {
        color: rgba(255, 255, 255, 0.7);
        text-align: right;
    }
    
    .profile-card-title {
        font-size: 1rem;
        font-weight: 700;
        color: white;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .profile-card-title i {
        color: #667eea;
    }
    
    .about-item {
        margin-bottom: 1rem;
        position: relative;
        z-index: 1;
    }
    
    .about-item:last-child {
        margin-bottom: 0;
    }
    
    .about-label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 0.375rem;
        font-size: 0.875rem;
    }
    
    .about-label i {
        color: #667eea;
        width: 18px;
        font-size: 0.875rem;
    }
    
    .about-value {
        color: rgba(255, 255, 255, 0.7);
        line-height: 1.5;
        padding-left: 1.5rem;
        font-size: 0.875rem;
    }
    
    .documents-section {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 1.5rem;
    }
    
    .documents-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.25rem;
        flex-wrap: wrap;
        gap: 1rem;
    }
    
    .documents-title {
        font-size: 1.125rem;
        font-weight: 700;
        color: white;
    }
    
    .search-box {
        flex: 1;
        min-width: 250px;
        max-width: 400px;
        position: relative;
    }
    
    .search-input {
        width: 100%;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid var(--glass-border);
        border-radius: 10px;
        padding: 0.625rem 1rem 0.625rem 2.5rem;
        color: white;
        font-size: 0.875rem;
        transition: all 0.3s ease;
    }
    
    .search-input:focus {
        outline: none;
        border-color: rgba(102, 126, 234, 0.5);
        background: rgba(255, 255, 255, 0.15);
    }
    
    .search-input::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }
    
    .search-icon {
        position: absolute;
        left: 0.875rem;
        top: 50%;
        transform: translateY(-50%);
        color: rgba(255, 255, 255, 0.5);
        pointer-events: none;
    }
    
    .add-document-btn {
        background: var(--primary-gradient);
        color: white;
        padding: 0.625rem 1.25rem;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        font-size: 0.875rem;
    }
    
    .add-document-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        color: white;
    }
    
    /* Documents Grid */
    .documents-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1.25rem;
        margin-top: 1.5rem;
    }
    
    .document-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--glass-border);
        border-radius: 12px;
        padding: 1.5rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .document-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--primary-gradient);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .document-card:hover {
        background: rgba(255, 255, 255, 0.08);
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
    }
    
    .document-card:hover::before {
        opacity: 1;
    }
    
    .document-icon {
        width: 50px;
        height: 50px;
        background: var(--primary-gradient);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
        margin-bottom: 1rem;
    }
    
    .document-title {
        font-size: 1rem;
        font-weight: 600;
        color: white;
        margin-bottom: 0.5rem;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    
    .document-type {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        background: rgba(102, 126, 234, 0.2);
        color: #93c5fd;
        border-radius: 6px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 1rem;
    }
    
    .document-actions {
        display: flex;
        gap: 0.5rem;
        margin-top: 1rem;
        padding-top: 1rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .document-link {
        flex: 1;
        padding: 0.5rem 1rem;
        background: rgba(102, 126, 234, 0.2);
        color: #60a5fa;
        border: 1px solid rgba(102, 126, 234, 0.3);
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.875rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
    }
    
    .document-link:hover {
        background: rgba(102, 126, 234, 0.3);
        color: #93c5fd;
        transform: translateY(-2px);
    }
    
    .action-btn {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        font-size: 1rem;
    }
    
    .action-btn-delete {
        background: rgba(239, 68, 68, 0.2);
        color: #f87171;
        border: 1px solid rgba(239, 68, 68, 0.3);
    }
    
    .action-btn-delete:hover {
        background: rgba(239, 68, 68, 0.3);
        transform: translateY(-2px);
    }
    
    .no-documents {
        text-align: center;
        padding: 3rem 1rem;
        color: rgba(255, 255, 255, 0.6);
    }
    
    .no-documents i {
        font-size: 3rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }
    
    /* Role and Status Badges */
    .role-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        padding: 0.25rem 0.625rem;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.6875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .role-admin {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
    }
    
    .role-student {
        background: rgba(34, 197, 94, 0.2);
        color: #4ade80;
        border: 1px solid rgba(34, 197, 94, 0.3);
    }
    
    .role-academy {
        background: rgba(168, 85, 247, 0.2);
        color: #c084fc;
        border: 1px solid rgba(168, 85, 247, 0.3);
    }
    
    .role-center {
        background: rgba(236, 72, 153, 0.2);
        color: #f472b6;
        border: 1px solid rgba(236, 72, 153, 0.3);
    }
    
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.375rem 0.75rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.75rem;
        text-transform: uppercase;
    }
    
    .status-badge::before {
        content: '';
        width: 8px;
        height: 8px;
        border-radius: 50%;
        display: inline-block;
    }
    
    .status-active {
        background: rgba(34, 197, 94, 0.2);
        color: #4ade80;
        border: 1px solid rgba(34, 197, 94, 0.3);
    }
    
    .status-active::before {
        background: #4ade80;
        box-shadow: 0 0 8px rgba(34, 197, 94, 0.6);
    }
    
    .status-inactive {
        background: rgba(251, 146, 60, 0.2);
        color: #fb923c;
        border: 1px solid rgba(251, 146, 60, 0.3);
    }
    
    .status-inactive::before {
        background: #fb923c;
        box-shadow: 0 0 8px rgba(251, 146, 60, 0.6);
    }
    
    .status-blocked {
        background: rgba(239, 68, 68, 0.2);
        color: #f87171;
        border: 1px solid rgba(239, 68, 68, 0.3);
    }
    
    .status-blocked::before {
        background: #f87171;
        box-shadow: 0 0 8px rgba(239, 68, 68, 0.6);
    }
    
    /* Stats Cards */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 1.25rem;
        margin-bottom: 1.5rem;
    }

    .stat-card {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 1.5rem;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 1.25rem;
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        border-color: rgba(102, 126, 234, 0.5);
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100px;
        height: 100px;
        background: var(--primary-gradient);
        opacity: 0.05;
        border-radius: 50%;
        transform: translate(30%, -30%);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        background: var(--primary-gradient);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.75rem;
        color: white;
        position: relative;
        z-index: 1;
        flex-shrink: 0;
    }

    .stat-content {
        flex: 1;
        position: relative;
        z-index: 1;
    }

    .stat-label {
        font-size: 0.875rem;
        color: rgba(255, 255, 255, 0.7);
        margin-bottom: 0.375rem;
        font-weight: 500;
    }

    .stat-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: white;
    }

    /* Info Grid */
    .info-grid {
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
    }

    .info-item {
        display: flex;
        gap: 1rem;
        align-items: flex-start;
    }

    .info-icon {
        width: 45px;
        height: 45px;
        background: rgba(102, 126, 234, 0.15);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #667eea;
        font-size: 1.125rem;
        flex-shrink: 0;
    }

    .info-content {
        flex: 1;
    }

    .info-label {
        font-size: 0.8125rem;
        color: rgba(255, 255, 255, 0.6);
        margin-bottom: 0.25rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
    }

    .info-value {
        font-size: 0.9375rem;
        color: rgba(255, 255, 255, 0.95);
        line-height: 1.5;
        word-break: break-word;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .profile-grid {
            grid-template-columns: 1fr;
        }
        
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (max-width: 768px) {
        .profile-header {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .profile-actions {
            width: 100%;
        }
        
        .profile-btn {
            flex: 1;
            justify-content: center;
        }
        
        .profile-card {
            padding: 1.5rem;
        }
        
        .documents-section {
            padding: 1.5rem;
        }
        
        .documents-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }
        
        .add-document-btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endsection

@section('content')

    <!-- Profile Cover Section -->
    <div class="profile-cover">
        <div class="profile-cover-gradient"></div>
        <div class="profile-cover-content">
            <div class="profile-avatar-large">
                <img src="{{ asset('/uploads/avatars/' . $account->avatar) }}" alt="{{ $account->name }}">
                <div class="avatar-status-indicator status-{{ strtolower($account->status) }}"></div>
            </div>
            <div class="profile-header-info">
                <h1 class="profile-display-name">{{ $account->name }}</h1>
                <p class="profile-subtitle">{{ $account->job_title ?: 'Total Wellness Member' }}</p>
                <div class="profile-badges">
                    <span class="role-badge role-{{ strtolower($account->user->role) }}">
                        @if($account->user->role == 'admin')
                            <i class="fas fa-user-shield"></i>
                        @elseif($account->user->role == 'student')
                            <i class="fas fa-user-graduate"></i>
                        @elseif($account->user->role == 'academy')
                            <i class="fas fa-school"></i>
                        @elseif($account->user->role == 'center')
                            <i class="fas fa-building"></i>
                        @endif
                        {{ ucfirst($account->user->role) }}
                    </span>
                    <span class="status-badge status-{{ strtolower($account->status) }}">
                        {{ ucfirst($account->status) }}
                    </span>
                </div>
            </div>
            @if ($account->user->id == auth()->id())
            <div class="profile-actions">
                <a href="{{ url('dashboard/accounts/' . $account->id . '/edit') }}" class="profile-btn profile-btn-primary">
                    <i class="fas fa-edit"></i> Edit Profile
                </a>
                <form action="{{ url('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="profile-btn profile-btn-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
            @endif
        </div>
    </div>

    <!-- Stats Overview -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-user-circle"></i>
            </div>
            <div class="stat-content">
                <div class="stat-label">Account Type</div>
                <div class="stat-value">{{ ucfirst($account->user->role) }}</div>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-shield-alt"></i>
            </div>
            <div class="stat-content">
                <div class="stat-label">Account Status</div>
                <div class="stat-value">{{ ucfirst($account->status) }}</div>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="stat-content">
                <div class="stat-label">Member Since</div>
                <div class="stat-value" style="font-size: 1.125rem;">{{ $account->created_at->format('M d, Y') }}</div>
            </div>
        </div>
        
        @if ($account->user->isStudent())
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="stat-content">
                <div class="stat-label">Documents</div>
                <div class="stat-value" id="document-count">0</div>
            </div>
        </div>
        @endif
    </div>

    <!-- Profile Grid -->
    <div class="profile-grid">
        <!-- Sidebar -->
        <div class="profile-sidebar">
            <!-- Contact Information Card -->
            <div class="profile-card">
                <h3 class="profile-card-title">
                    <i class="fas fa-address-card"></i> Contact Information
                </h3>
                
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="info-content">
                            <div class="info-label">Email Address</div>
                            <div class="info-value">{{ $account->user->email }}</div>
                        </div>
                    </div>
                    
                    @if($account->phone)
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="info-content">
                            <div class="info-label">Phone Number</div>
                            <div class="info-value">{{ $account->phone }}</div>
                        </div>
                    </div>
                    @endif
                    
                    @if($account->address)
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info-content">
                            <div class="info-label">Location</div>
                            <div class="info-value">
                                {{ $account->address }}
                                @if($account->city), {{ $account->city }}@endif
                                @if($account->state), {{ $account->state }}@endif
                                @if($account->zip_code) {{ $account->zip_code }}@endif
                            </div>
                        </div>
                    </div>
                    @endif
                    
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="info-content">
                            <div class="info-label">Joined</div>
                            <div class="info-value">{{ $account->created_at->format('F d, Y') }}</div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($account->user->isStudent() && (auth()->user()->hasAnyRole(['admin', 'center']) || auth()->user()->account->id === $account->id))
            <!-- About Card -->
            <div class="profile-card">
                <h3 class="profile-card-title">
                    <i class="fas fa-info-circle"></i> About
                </h3>
                
                <div class="about-item">
                    <div class="about-label">
                        <i class="fas fa-book"></i> Education
                    </div>
                    <div class="about-value">
                        {{ $account->degree . ', ' . $account->specialty }}
                    </div>
                </div>
                
                <div class="about-item">
                    <div class="about-label">
                        <i class="fas fa-map-marker-alt"></i> Location
                    </div>
                    <div class="about-value">
                        {{ $account->address . ', ' . $account->city . ', ' . $account->state . ', ' . $account->country . ', (' . $account->zip_code . ')' }}
                    </div>
                </div>
                
                <div class="about-item">
                    <div class="about-label">
                        <i class="far fa-file-alt"></i> License
                    </div>
                    <div class="about-value">
                        {{ $account->certifying_board . ' (' . $account->state_of_license . ')' }}
                    </div>
                </div>
            </div>
            @endif
        </div>

        <!-- Main Content -->
        @if ($account->user->isStudent() && (auth()->user()->hasAnyRole(['admin', 'center']) || auth()->user()->account->id === $account->id))
        <div class="documents-section">
            <div class="documents-header">
                <h3 class="documents-title">Documents</h3>
                <div class="search-box">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" id="document-search" class="search-input" placeholder="Search documents...">
                </div>
                <a href="{{ url('dashboard/accounts/' . $account->id . '/documents/create') }}" class="add-document-btn">
                    <i class="fas fa-plus"></i> Add Document
                </a>
            </div>
            
            <div id="documents-container" class="documents-grid">
                <!-- Documents will be loaded here via JavaScript -->
            </div>
            <div id="no-documents" class="no-documents" style="display: none;">
                <i class="fas fa-folder-open"></i>
                <p>No documents found</p>
            </div>
        </div>
        @endif
    </div>

@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        let allDocuments = [];
        
        $(document).ready(function() {
            loadDocuments();
            
            // Search functionality
            $('#document-search').on('input', function() {
                const searchTerm = $(this).val().toLowerCase();
                filterDocuments(searchTerm);
            });
        });
        
        function loadDocuments() {
            $.ajax({
                url: '{!! url('dashboard/datatables/getAccountDocuments/' . $account->id) !!}',
                type: 'GET',
                data: {
                    start: 0,
                    length: 100
                },
                success: function(response) {
                    if (response.data && response.data.length > 0) {
                        allDocuments = response.data;
                        displayDocuments(allDocuments);
                        $('#document-count').text(allDocuments.length);
                    } else {
                        allDocuments = [];
                        showNoDocuments();
                        $('#document-count').text('0');
                    }
                },
                error: function() {
                    console.error('Failed to load documents');
                }
            });
        }
        
        function filterDocuments(searchTerm) {
            if (!searchTerm) {
                displayDocuments(allDocuments);
                return;
            }
            
            const filtered = allDocuments.filter(function(doc) {
                const title = doc.title.toLowerCase();
                const type = doc.type.toLowerCase();
                return title.includes(searchTerm) || type.includes(searchTerm);
            });
            
            displayDocuments(filtered);
        }
        
        function displayDocuments(documents) {
            const container = $('#documents-container');
            const noDocuments = $('#no-documents');
            
            if (documents.length > 0) {
                container.empty();
                noDocuments.hide();
                
                documents.forEach(function(doc) {
                    const card = createDocumentCard(doc);
                    container.append(card);
                });
            } else {
                showNoDocuments();
            }
        }
        
        function showNoDocuments() {
            $('#documents-container').empty();
            $('#no-documents').show();
        }
        
        function createDocumentCard(doc) {
            const typeIcons = {
                'cv': 'fa-file-alt',
                'certificate': 'fa-certificate',
                'license': 'fa-id-card',
                'transcript': 'fa-graduation-cap',
                'other': 'fa-file'
            };
            
            const icon = typeIcons[doc.type.toLowerCase()] || 'fa-file';
            const deleteFormId = 'delete-document-' + doc.id;
            
            // Extract actual filename from HTML or use raw path
            let filename = doc.file_path;
            
            // If file_path contains HTML, extract the actual URL
            if (typeof filename === 'string' && filename.includes('<a')) {
                const match = filename.match(/href=['"]([^'"]+)['"]/);
                if (match && match[1]) {
                    filename = match[1];
                }
            }
            
            // Construct URLs from document data
            const fileUrl = filename.startsWith('http') ? filename : '{{ url("uploads/documents") }}/' + filename;
            const deleteUrl = '{{ url("dashboard/documents") }}/' + doc.id;
            
            return `
                <div class="document-card">
                    <div class="document-icon">
                        <i class="fas ${icon}"></i>
                    </div>
                    <h4 class="document-title" title="${doc.title}">${doc.title}</h4>
                    <span class="document-type">${doc.type}</span>
                    <div class="document-actions">
                        <a href="${fileUrl}" target="_blank" class="document-link">
                            <i class="fas fa-eye"></i> View
                        </a>
                        <button onclick="confirmDelete(${doc.id})" class="action-btn action-btn-delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    <form id="${deleteFormId}" 
                          action="${deleteUrl}" 
                          method="POST" 
                          style="display: none;">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                    </form>
                </div>
            `;
        }

        function confirmDelete(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "This document will be permanently deleted!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "Cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-document-' + id).submit();
                }
            });
        }
    </script>
@endsection
