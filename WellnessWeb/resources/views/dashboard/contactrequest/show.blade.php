@extends('layouts.dashboard.modern')

@section('title', ucfirst($contactRequest->type) . ' Request')

@section('css')
<style>
    /* Request Header Section */
    .request-header {
        position: relative;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        padding: 2.5rem 2rem;
        margin-bottom: 2.5rem;
        overflow: hidden;
    }

    .request-header-gradient {
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

    .request-header-content {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        gap: 2rem;
        flex-wrap: wrap;
    }

    .request-avatar-section {
        position: relative;
        flex-shrink: 0;
    }

    .request-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
    }

    .request-avatar-anonymous {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        border: 4px solid rgba(255, 255, 255, 0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: white;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
    }

    .request-info {
        flex: 1;
        min-width: 250px;
    }

    .request-type-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 10px;
        color: white;
        font-size: 0.875rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 1rem;
    }

    .request-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: white;
        margin-bottom: 0.5rem;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    .request-subtitle {
        font-size: 1rem;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 0;
    }

    .request-actions {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
        margin-left: auto;
    }

    .request-btn {
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

    .request-btn-primary {
        background: rgba(255, 255, 255, 0.2);
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .request-btn-primary:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateY(-2px);
        color: white;
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
        font-size: 1.125rem;
        font-weight: 700;
        color: white;
    }

    /* Request Grid */
    .request-grid {
        display: grid;
        grid-template-columns: 380px 1fr;
        gap: 1.5rem;
        margin-bottom: 1rem;
    }

    .request-sidebar {
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
    }

    .request-card {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 1.5rem;
        position: relative;
        overflow: hidden;
    }

    .request-card::before {
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

    .request-card-title {
        font-size: 1rem;
        font-weight: 700;
        color: white;
        margin-bottom: 1.25rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        position: relative;
        z-index: 1;
    }

    .request-card-title i {
        color: #667eea;
    }

    /* Info Grid */
    .info-grid {
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
        position: relative;
        z-index: 1;
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

    /* Message Card */
    .message-card {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 2rem;
    }

    .message-content {
        color: rgba(255, 255, 255, 0.9);
        line-height: 1.8;
        font-size: 0.9375rem;
        white-space: pre-wrap;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .request-grid {
            grid-template-columns: 1fr;
        }
        
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 640px) {
        .request-header {
            padding: 2rem 1.5rem;
        }

        .request-header-content {
            flex-direction: column;
            text-align: center;
        }

        .request-info {
            text-align: center;
        }

        .request-actions {
            width: 100%;
            margin-left: 0;
        }

        .request-btn {
            flex: 1;
            justify-content: center;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')

    <!-- Request Header -->
    <div class="request-header">
        <div class="request-header-gradient"></div>
        <div class="request-header-content">
            <div class="request-avatar-section">
                @if (isset($contactRequest->account))
                    <img src="{{ asset('/uploads/avatars/' . $contactRequest->account->avatar) }}" 
                         alt="{{ $contactRequest->account->name }}" 
                         class="request-avatar">
                @else
                    <div class="request-avatar-anonymous">
                        <i class="fas fa-user-secret"></i>
                    </div>
                @endif
            </div>
            
            <div class="request-info">
                <div class="request-type-badge">
                    <i class="fas fa-{{ $contactRequest->type == 'maintenance' ? 'tools' : ($contactRequest->type == 'tradein' ? 'exchange-alt' : 'envelope') }}"></i>
                    {{ ucfirst($contactRequest->type) }} Request
                </div>
                <h1 class="request-title">
                    @if (isset($contactRequest->account))
                        {{ $contactRequest->account->name }}
                    @else
                        Anonymous User
                    @endif
                </h1>
                <p class="request-subtitle">
                    @if (isset($contactRequest->account))
                        {{ $contactRequest->account->user->email }}
                    @else
                        No account associated
                    @endif
                </p>
            </div>
            
            <div class="request-actions">
                <a href="{{ url('dashboard/contactRequests') }}" class="request-btn request-btn-primary">
                    <i class="fas fa-arrow-left"></i> Back to Requests
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Overview -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <div class="stat-content">
                <div class="stat-label">Submitted</div>
                <div class="stat-value">{{ $contactRequest->created_at->format('M d, Y') }}</div>
            </div>
        </div>
        
        @if (isset($contactRequest->problem_type))
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="stat-content">
                <div class="stat-label">Problem Type</div>
                <div class="stat-value">{{ $contactRequest->problem_type }}</div>
            </div>
        </div>
        @endif
        
        @if (isset($contactRequest->device))
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-mobile-alt"></i>
            </div>
            <div class="stat-content">
                <div class="stat-label">Current Device</div>
                <div class="stat-value">{{ $contactRequest->device->name }}</div>
            </div>
        </div>
        @endif
        
        @if (isset($contactRequest->targetDevice))
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-exchange-alt"></i>
            </div>
            <div class="stat-content">
                <div class="stat-label">Target Device</div>
                <div class="stat-value">{{ $contactRequest->targetDevice->name }}</div>
            </div>
        </div>
        @endif
        
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-content">
                <div class="stat-label">Time</div>
                <div class="stat-value">{{ $contactRequest->created_at->format('h:i A') }}</div>
            </div>
        </div>
        
        @if (isset($contactRequest->city))
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="stat-content">
                <div class="stat-label">Location</div>
                <div class="stat-value">{{ $contactRequest->city }}</div>
            </div>
        </div>
        @endif
    </div>

    <!-- Request Grid -->
    <div class="request-grid">
        <!-- Sidebar -->
        <div class="request-sidebar">
            <!-- Contact Information Card -->
            <div class="request-card">
                <h3 class="request-card-title">
                    <i class="fas fa-address-card"></i> Contact Information
                </h3>
                
                <div class="info-grid">
                    @if (isset($contactRequest->account))
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="info-content">
                            <div class="info-label">Email Address</div>
                            <div class="info-value">{{ $contactRequest->account->user->email }}</div>
                        </div>
                    </div>
                    @endif
                    
                    @if (isset($contactRequest->phone))
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="info-content">
                            <div class="info-label">Phone Number</div>
                            <div class="info-value">{{ $contactRequest->phone }}</div>
                        </div>
                    </div>
                    @endif
                    
                    @if (isset($contactRequest->city) && isset($contactRequest->country))
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <div class="info-content">
                            <div class="info-label">Location</div>
                            <div class="info-value">{{ $contactRequest->city }}, {{ $contactRequest->country }}</div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="request-main">
            <!-- Subject Card -->
            <div class="request-card" style="margin-bottom: 1.5rem;">
                <h3 class="request-card-title">
                    <i class="fas fa-heading"></i> Subject
                </h3>
                <div class="info-grid">
                    <div class="info-value" style="font-size: 1.125rem; font-weight: 600;">
                        {{ $contactRequest->subject }}
                    </div>
                </div>
            </div>

            <!-- Message Card -->
            <div class="request-card">
                <h3 class="request-card-title">
                    <i class="fas fa-comment-alt"></i> Message
                </h3>
                <div class="message-content">
                    {{ $contactRequest->message }}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
@endsection
