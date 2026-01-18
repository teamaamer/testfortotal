@extends('layouts.dashboard.modern')

@section('title', 'Career Opportunities')

@section('css')
<link href='https://fonts.googleapis.com/css?family=Lato:300,400,600,700' rel='stylesheet' type='text/css'>
<style>
    * {
        font-family: 'Lato', sans-serif;
    }

    .page-header {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 2rem;
        margin-bottom: 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .page-header h1 {
        font-size: 2rem;
        font-weight: 700;
        margin: 0;
        color: white;
    }

    .page-header p {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.9375rem;
        margin: 0.5rem 0 0 0;
    }

    .header-actions {
        display: flex;
        gap: 1rem;
        align-items: center;
    }

    .add-career-btn {
        padding: 0.75rem 1.5rem;
        background: var(--primary-gradient);
        color: white;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.875rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .add-career-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        color: white;
    }

    .search-container {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .search-input {
        width: 100%;
        padding: 0.75rem 1rem 0.75rem 2.75rem;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid var(--glass-border);
        border-radius: 10px;
        color: white;
        font-size: 0.875rem;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        outline: none;
        border-color: rgba(102, 126, 234, 0.5);
        background: rgba(255, 255, 255, 0.15);
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .search-input::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }

    .search-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: rgba(255, 255, 255, 0.5);
    }

    .careers-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .career-card {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 1.5rem;
        transition: all 0.3s ease;
    }

    .career-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 40px rgba(102, 126, 234, 0.2);
        border-color: rgba(102, 126, 234, 0.3);
    }

    .career-header {
        margin-bottom: 1rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .career-title {
        font-size: 1.125rem;
        font-weight: 700;
        color: white;
        margin-bottom: 0.5rem;
    }

    .career-company {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 0.5rem;
    }

    .company-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid rgba(102, 126, 234, 0.3);
    }

    .company-info h6 {
        font-size: 0.875rem;
        font-weight: 600;
        color: white;
        margin: 0;
    }

    .company-location {
        font-size: 0.75rem;
        color: rgba(255, 255, 255, 0.6);
    }

    .career-description {
        font-size: 0.875rem;
        color: rgba(255, 255, 255, 0.7);
        line-height: 1.6;
        margin-bottom: 1rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .career-salary {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.375rem 0.875rem;
        background: rgba(46, 213, 115, 0.2);
        color: #2ed573;
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .career-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 0.5rem;
        padding-top: 1rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .career-actions {
        display: flex;
        gap: 0.5rem;
    }

    .action-btn {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.875rem;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
    }

    .btn-view {
        background: rgba(102, 126, 234, 0.2);
        color: #667eea;
    }

    .btn-view:hover {
        background: rgba(102, 126, 234, 0.3);
        color: #667eea;
    }

    .btn-apply {
        background: var(--primary-gradient);
        color: white;
    }

    .btn-apply:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        color: white;
    }

    .btn-applied {
        background: rgba(46, 213, 115, 0.2);
        color: #2ed573;
        border: 1px solid rgba(46, 213, 115, 0.3);
    }

    .dropdown-menu-custom {
        position: relative;
        display: inline-block;
    }

    .dropdown-toggle-btn {
        width: 32px;
        height: 32px;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid var(--glass-border);
        border-radius: 8px;
        color: white;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .dropdown-toggle-btn:hover {
        background: rgba(255, 255, 255, 0.15);
    }

    @media (max-width: 768px) {
        .careers-grid {
            grid-template-columns: 1fr;
        }

        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>
@endsection

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h1>Career Opportunities</h1>
            <p>Explore available job positions</p>
        </div>
        <div class="header-actions">
            @if(auth()->user()->hasAnyRole(['admin', 'center']))
                <a href="{{ url('dashboard/careers/create') }}" class="add-career-btn">
                    <i class="fas fa-plus"></i> Post New Job
                </a>
            @endif
        </div>
    </div>

    <!-- Search Bar -->
    <div class="search-container">
        <form action="{{ route('careers.index') }}" method="GET">
            <div style="position: relative;">
                <i class="fas fa-search search-icon"></i>
                <input type="search" id="careerSearchInput" name="q" value="{{ request('q') }}" 
                       class="search-input" placeholder="Search careers by title, company, or location...">
            </div>
        </form>
    </div>

    <!-- Careers Grid -->
    <div class="careers-grid">
        @foreach ($careers as $career)
            <div class="career-card">
                <div class="career-header">
                    <h3 class="career-title">{{ $career->title }}</h3>
                    <div class="career-company">
                        <img src="{{ asset('/uploads/avatars/' . $career->account->avatar) }}" 
                             alt="{{ $career->account->name }}" class="company-avatar">
                        <div class="company-info">
                            <h6>{{ $career->account->name }}</h6>
                            <span class="company-location">{{ $career->city }} ({{ $career->country }})</span>
                        </div>
                    </div>
                </div>

                <p class="career-description">{{ $career->summary }}</p>

                @if($career->salary)
                    <div class="career-salary">
                        <i class="fas fa-dollar-sign"></i>
                        {{ $career->salary }}
                    </div>
                @endif

                <div class="career-footer">
                    <a href="{{ url('dashboard/careers/' . $career->id) }}" class="action-btn btn-view">
                        <i class="fas fa-eye"></i> View Details
                    </a>
                    <div class="career-actions">
                        @if(auth()->user()->hasAnyRole(['admin', 'center']))
                            <a href="{{ url('dashboard/careers/' . $career->id . '/edit') }}" 
                               class="action-btn btn-view">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button onclick="confirmDelete({{ $career->id }})" 
                                    class="action-btn" style="background: rgba(255, 71, 87, 0.2); color: #ff4757;">
                                <i class="fas fa-trash"></i>
                            </button>
                        @endif
                        <button class="action-btn {{ auth()->user()->account->appliedCareers->contains($career->id) ? 'btn-applied' : 'btn-apply' }} apply-btn"
                                data-id="{{ $career->id }}">
                            {{ auth()->user()->account->appliedCareers->contains($career->id) ? 'Applied' : 'Apply' }}
                        </button>
                    </div>
                </div>

                <form id="delete-career-{{ $career->id }}" action="{{ url('dashboard/careers/' . $career->id) }}" 
                      method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        @endforeach
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Search functionality
        function debounce(func, delay) {
            let timer;
            return function() {
                clearTimeout(timer);
                timer = setTimeout(func, delay);
            };
        }

        const searchInput = document.getElementById('careerSearchInput');
        if (searchInput) {
            const form = searchInput.closest('form');
            searchInput.addEventListener('keyup', function() {
                if (this.value.trim() === "") {
                    form.submit();
                    return;
                }
                debounce(function() {
                    form.submit();
                }, 3000)();
            });
        }

        // Apply button functionality
        $(".apply-btn").click(function() {
            let careerId = $(this).data('id');
            let button = $(this);

            $.ajax({
                url: "careers/" + careerId + "/apply",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(res) {
                    if (res.status === "applied") {
                        button.text("Applied")
                            .removeClass('btn-apply')
                            .addClass("btn-applied");
                    } else {
                        button.text("Apply")
                            .removeClass("btn-applied")
                            .addClass("btn-apply");
                    }
                },
                error: function() {
                    alert("Something went wrong.");
                }
            });
        });

        // Delete confirmation
        function confirmDelete(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "This job will be permanently deleted!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#ff4757",
                cancelButtonColor: "#667eea",
                confirmButtonText: "Delete",
                cancelButtonText: "Cancel",
                background: 'rgba(42, 42, 62, 0.95)',
                color: '#fff',
                backdrop: 'rgba(0, 0, 0, 0.8)'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-career-' + id).submit();
                }
            });
        }
    </script>
@endsection
