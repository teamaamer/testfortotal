@extends('layouts.dashboard.modern')

@section('title', 'Dashboard')

@section('css')
@endsection

@section('content')

    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <h1>Welcome back, {{ Auth::user()->account->name }}!</h1>
        <p>My Dashboard</p>
    </div>

    <!-- Stats Grid -->
    <div class="stats-grid">

        @if (auth()->user()->isAdmin())
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-value">{{ $accountsNo }}</div>
            <div class="stat-label">Accounts</div>
            <a href="{{ url('dashboard/accounts') }}" class="stat-link">
                More info <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        @endif

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-school"></i>
            </div>
            <div class="stat-value">{{ $academiesNo }}</div>
            <div class="stat-label">Academies</div>
            <a href="{{ url('dashboard/academies') }}" class="stat-link">
                More info <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-book"></i>
            </div>
            <div class="stat-value">{{ $coursesNo }}</div>
            <div class="stat-label">Courses</div>
            <a href="{{ url('dashboard/courses') }}" class="stat-link">
                More info <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-briefcase"></i>
            </div>
            <div class="stat-value">{{ $careersNo }}</div>
            <div class="stat-label">Jobs</div>
            <a href="{{ url('dashboard/careers') }}" class="stat-link">
                More info <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>

    <!-- Quote Section -->
    <div class="quote-section">
        <div class="quote-label">Quote of the Day</div>
        <div class="quote-text">
            "Great management is not about control, but about empowering people to do their best work."
        </div>
        <div class="quote-author">
            — Professional Leadership Insight
        </div>
    </div>
    <!-- /.content -->

@endsection


@section('js')
@endsection

