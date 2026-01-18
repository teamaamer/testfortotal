@extends('layouts.dashboard.modern')

@section('title', $academy->name)

@section('css')
<style>
    /* Academy Cover Section */
    .academy-cover {
        position: relative;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        overflow: hidden;
        margin-bottom: 2.5rem;
        height: 350px;
    }

    .academy-cover-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0.3;
    }

    .academy-cover-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.7) 100%);
    }

    .academy-cover-content {
        position: relative;
        z-index: 1;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 2.5rem 2rem;
    }

    .academy-badge {
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

    .academy-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: white;
        margin-bottom: 0.5rem;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    }

    .academy-actions {
        position: absolute;
        top: 2rem;
        right: 2rem;
        z-index: 2;
    }

    .academy-btn {
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
        background: rgba(255, 255, 255, 0.2);
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .academy-btn:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateY(-2px);
        color: white;
    }

    /* Stats Cards */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 1.25rem;
        margin-bottom: 2rem;
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
        font-size: 1.75rem;
        font-weight: 700;
        color: white;
    }

    /* About Card */
    .about-card {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 2rem;
        position: relative;
        overflow: hidden;
        margin-bottom: 2rem;
    }

    .about-card::before {
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

    .about-card-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: white;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        position: relative;
        z-index: 1;
    }

    .about-card-title i {
        color: #667eea;
    }

    .about-content {
        color: rgba(255, 255, 255, 0.9);
        line-height: 1.8;
        font-size: 0.9375rem;
        position: relative;
        z-index: 1;
    }

    /* Courses Section */
    .courses-section {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 2rem;
        margin-bottom: 2rem;
    }

    .courses-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .courses-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: white;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .courses-title i {
        color: #667eea;
    }

    .courses-count {
        padding: 0.5rem 1rem;
        background: rgba(102, 126, 234, 0.2);
        border: 1px solid rgba(102, 126, 234, 0.3);
        border-radius: 10px;
        color: #93c5fd;
        font-size: 0.875rem;
        font-weight: 600;
    }

    /* Course Item Styles */
    .course-item {
        padding: 1rem 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .course-item-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
    }

    .course-item-info {
        flex: 1;
        min-width: 0;
    }

    .course-item-title {
        color: white;
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 0.25rem;
    }

    .course-item-description {
        color: rgba(255, 255, 255, 0.6);
        font-size: 0.875rem;
        margin: 0;
    }

    .course-item-btn {
        padding: 0.5rem 1rem;
        background: rgba(102, 126, 234, 0.2);
        color: #60a5fa;
        border: 1px solid rgba(102, 126, 234, 0.3);
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.875rem;
        white-space: nowrap;
        transition: all 0.3s ease;
    }

    .course-item-btn:hover {
        background: rgba(102, 126, 234, 0.3);
        color: #93c5fd;
        transform: translateY(-2px);
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .academy-cover {
            height: 300px;
            border-radius: 16px;
        }

        .academy-cover-content {
            padding: 2rem 1.5rem;
        }

        .academy-title {
            font-size: 2rem;
        }

        .academy-badge {
            font-size: 0.75rem;
            padding: 0.375rem 0.75rem;
        }

        .about-card,
        .courses-section {
            padding: 1.5rem;
        }

        .about-card-title,
        .courses-title {
            font-size: 1.125rem;
        }

        .courses-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.75rem;
        }
    }

    @media (max-width: 640px) {
        .academy-cover {
            height: 180px;
            border-radius: 12px;
            margin-bottom: 2rem;
        }

        .academy-cover-content {
            padding: 1rem;
            justify-content: center;
        }

        .academy-badge {
            margin-bottom: 0.5rem;
        }

        .academy-title {
            font-size: 1.5rem;
            line-height: 1.2;
        }

        .academy-actions {
            position: static;
            width: 100%;
            padding: 0 1rem;
            margin-top: 1rem;
        }

        .academy-btn {
            width: 100%;
            justify-content: center;
            font-size: 0.875rem;
            padding: 0.625rem 1rem;
        }

        .stats-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .stat-card {
            padding: 1.25rem;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            font-size: 1.5rem;
        }

        .stat-value {
            font-size: 1.5rem;
        }

        .about-card,
        .courses-section {
            padding: 1.25rem;
            border-radius: 12px;
        }

        .about-card-title,
        .courses-title {
            font-size: 1rem;
        }

        .about-content {
            font-size: 0.875rem;
            line-height: 1.6;
        }

        .courses-count {
            font-size: 0.75rem;
            padding: 0.375rem 0.75rem;
        }

        .course-item {
            padding: 0.875rem 0;
        }

        .course-item-content {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.75rem;
        }

        .course-item-title {
            font-size: 0.9375rem;
        }

        .course-item-description {
            font-size: 0.8125rem;
        }

        .course-item-btn {
            width: 100%;
            text-align: center;
            justify-content: center;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
    }

    @media (max-width: 480px) {
        .academy-cover {
            height: 160px;
        }

        .academy-cover-content {
            padding: 0.75rem;
        }

        .academy-title {
            font-size: 1.25rem;
        }

        .stat-value {
            font-size: 1.25rem;
        }

        .stat-label {
            font-size: 0.8125rem;
        }
    }
</style>
@endsection

@section('content')

    <!-- Academy Cover Section -->
    <div class="academy-cover">
        <img src="{{ asset('/uploads/avatars/' . $academy->avatar) }}" 
             alt="{{ $academy->name }}" 
             class="academy-cover-image">
        <div class="academy-cover-overlay"></div>
        
        <div class="academy-actions">
            <a href="{{ url('dashboard/academies') }}" class="academy-btn">
                <i class="fas fa-arrow-left"></i> Back to Academies
            </a>
        </div>

        <div class="academy-cover-content">
            <div class="academy-badge">
                <i class="fas fa-school"></i>
                Academy Profile
            </div>
            <h1 class="academy-title">{{ $academy->name }}</h1>
        </div>
    </div>

    <!-- Stats Overview -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-user-graduate"></i>
            </div>
            <div class="stat-content">
                <div class="stat-label">Students</div>
                <div class="stat-value">{{ number_format($academy->students_count) }}</div>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-book"></i>
            </div>
            <div class="stat-content">
                <div class="stat-label">Courses</div>
                <div class="stat-value">{{ $academy->courses->count() }}</div>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-briefcase"></i>
            </div>
            <div class="stat-content">
                <div class="stat-label">Job Openings</div>
                <div class="stat-value">{{ $academy->careers->count() }}</div>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div class="about-card">
        <h2 class="about-card-title">
            <i class="fas fa-info-circle"></i> About {{ $academy->name }}
        </h2>
        <div class="about-content">
            {{ $academy->summary }}
        </div>
    </div>

    <!-- Courses Section -->
    @if($academy->courses->count() > 0)
    <div class="courses-section">
        <div class="courses-header">
            <h2 class="courses-title">
                <i class="fas fa-graduation-cap"></i> Available Courses
            </h2>
            <span class="courses-count">{{ $academy->courses->count() }} Courses</span>
        </div>
        
        <div class="courses-list">
            @foreach($academy->courses as $course)
                <div class="course-item">
                    <div class="course-item-content">
                        <div class="course-item-info">
                            <h3 class="course-item-title">
                                {{ $course->title }}
                            </h3>
                            <p class="course-item-description">
                                {{ Str::limit($course->summary, 100) }}
                            </p>
                        </div>
                        <a href="{{ url('dashboard/courses/' . $course->id) }}" class="course-item-btn">
                            <i class="fas fa-arrow-right"></i> View Course
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif

@endsection

@section('js')
@endsection
