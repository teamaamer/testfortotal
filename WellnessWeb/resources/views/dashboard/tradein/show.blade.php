@extends('layouts.dashboard.modern')

@section('title', $career->title)

@section('css')
<style>
    /* Cover Section */
    .career-cover {
        position: relative;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        overflow: hidden;
        margin-bottom: 2.5rem;
        height: 350px;
    }

    .career-cover-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0.3;
    }

    .career-cover-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0.7) 100%);
    }

    .career-cover-content {
        position: relative;
        z-index: 1;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 2.5rem 2rem;
    }

    .career-badge {
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
        width: fit-content;
    }

    .career-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: white;
        margin-bottom: 0.5rem;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    }

    .career-actions {
        position: absolute;
        top: 2rem;
        right: 2rem;
        z-index: 2;
    }

    .career-btn {
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        text-decoration: none;
        background: rgba(255, 255, 255, 0.25);
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.4);
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .career-btn:hover {
        background: rgba(255, 255, 255, 0.35);
        transform: translateY(-2px);
        color: white;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
    }

    /* Content Card */
    .content-card {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 2rem;
        margin-bottom: 2rem;
    }

    .content-card-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: white;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .content-card-title i {
        color: #667eea;
    }

    .content-text {
        color: rgba(255, 255, 255, 0.9);
        line-height: 1.8;
        font-size: 0.9375rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .career-cover {
            height: 300px;
        }

        .career-title {
            font-size: 1.75rem;
        }

        .career-actions {
            position: static;
            margin-bottom: 1rem;
        }

        .content-card {
            padding: 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .career-cover {
            height: 250px;
        }

        .career-title {
            font-size: 1.5rem;
        }
    }
</style>
@endsection

@section('content')
    <!-- Career Cover Section -->
    <div class="career-cover">
        <img src="{{ asset('/uploads/avatars/' . $career->account->avatar) }}" 
             alt="{{ $career->title }}" 
             class="career-cover-image">
        <div class="career-cover-overlay"></div>
        
        <div class="career-actions">
            <a href="{{ url('dashboard/careers') }}" class="career-btn">
                <i class="fas fa-arrow-left"></i> Back to Careers
            </a>
        </div>

        <div class="career-cover-content">
            <div class="career-badge">
                <i class="fas fa-briefcase"></i>
                Career Opportunity
            </div>
            <h1 class="career-title">{{ $career->title }}</h1>
        </div>
    </div>

    <!-- Career Details -->
    <div class="content-card">
        <h2 class="content-card-title">
            <i class="fas fa-info-circle"></i>
            About This Position
        </h2>
        <div class="content-text">
            <p>{{ $career->summary }}</p>
        </div>
    </div>
@endsection

@section('js')
@endsection
