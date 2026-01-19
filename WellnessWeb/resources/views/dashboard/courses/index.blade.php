@extends('layouts.dashboard.modern')

@section('title', 'Course Catalog')

@section('css')
<link href='https://fonts.googleapis.com/css?family=Lato:300,400,600,700' rel='stylesheet' type='text/css'>
<style>
    * {
        font-family: 'Lato', sans-serif;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 1.5rem;
        gap: 1rem;
        flex-wrap: wrap;
    }
    
    .page-header-left h1 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.25rem;
    }
    
    .page-header-left p {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.875rem;
    }
    
    .add-course-btn {
        padding: 0.625rem 1.5rem;
        background: var(--primary-gradient);
        color: white;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.875rem;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
    }
    
    .add-course-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        color: white;
    }
    
    .search-section {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 2rem;
        margin-bottom: 1.5rem;
    }
    
    .search-box {
        position: relative;
        max-width: 600px;
        margin: 0 auto;
    }
    
    .search-input {
        width: 100%;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid var(--glass-border);
        border-radius: 50px;
        padding: 0.875rem 3.5rem 0.875rem 1.5rem;
        color: white;
        font-size: 1rem;
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
    
    .search-btn {
        position: absolute;
        right: 0.5rem;
        top: 50%;
        transform: translateY(-50%);
        background: var(--primary-gradient);
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .search-btn:hover {
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    }
    
    .courses-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .course-card {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
    }
    
    .course-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.3);
    }
    
    .course-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    
    .course-header {
        padding: 1.25rem 1.5rem 0.75rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .course-title {
        font-size: 1.125rem;
        font-weight: 700;
        color: white;
        margin-bottom: 0.75rem;
        min-height: 2.5em;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .academy-info {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .academy-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 2px solid rgba(102, 126, 234, 0.3);
        object-fit: cover;
    }
    
    .academy-name {
        font-size: 0.875rem;
        font-weight: 600;
        color: rgba(255, 255, 255, 0.9);
    }
    
    .course-body {
        padding: 1.25rem 1.5rem;
        flex: 1;
    }
    
    .course-date {
        font-size: 0.8125rem;
        color: rgba(255, 255, 255, 0.6);
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.375rem;
    }
    
    .course-summary {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.875rem;
        line-height: 1.6;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 2.8em;
    }
    
    .course-footer {
        padding: 1rem 1.5rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }
    
    .course-stats {
        display: flex;
        gap: 1rem;
        align-items: center;
        padding-bottom: 0.75rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }
    
    .stat-item {
        display: flex;
        align-items: center;
        gap: 0.375rem;
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.875rem;
    }
    
    .like-btn {
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .like-btn:hover {
        transform: scale(1.2);
    }
    
    .course-actions {
        display: flex;
        gap: 0.5rem;
        align-items: center;
        flex-wrap: wrap;
    }
    
    .action-btn {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.8125rem;
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }
    
    .edit-btn {
        background: rgba(102, 126, 234, 0.2);
        color: #60a5fa;
        border: 1px solid rgba(102, 126, 234, 0.3);
    }
    
    .edit-btn:hover {
        background: rgba(102, 126, 234, 0.3);
        color: #93c5fd;
        transform: translateY(-2px);
    }
    
    .delete-btn {
        background: rgba(239, 68, 68, 0.2);
        color: #f87171;
        border: 1px solid rgba(239, 68, 68, 0.3);
    }
    
    .delete-btn:hover {
        background: rgba(239, 68, 68, 0.3);
        color: #fca5a5;
        transform: translateY(-2px);
    }
    
    .view-btn {
        padding: 0.5rem 1.25rem;
        background: var(--primary-gradient);
        color: white;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.8125rem;
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        transition: all 0.3s ease;
    }
    
    .view-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(102, 126, 234, 0.4);
        color: white;
    }
    
    @media (max-width: 768px) {
        .courses-grid {
            grid-template-columns: 1fr;
        }
        
        .search-section {
            padding: 1.5rem;
        }
    }


</style>
@endsection


@section('content')

    <!-- Page Header -->
    <div class="page-header">
        <div class="page-header-left">
            <h1>Accredited Courses</h1>
            <p>Certified courses delivered by approved partners</p>
        </div>
        @if(auth()->user()->hasAnyRole(['admin', 'academy']))
            <a href="{{ url('dashboard/courses/create') }}" class="add-course-btn">
                <i class="fas fa-plus"></i> Add New Course
            </a>
        @endif
    </div>

    <!-- Search Section -->
    <div class="search-section">
        <form action="{{ route('dashboard.courses.index') }}" method="GET">
            <div class="search-box">
                <input type="search" name="q" value="{{ request('q') }}" class="search-input" placeholder="Search courses by title or description...">
                <button type="submit" class="search-btn">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
    </div>

    <!-- Courses Grid -->
    <div class="courses-grid">
        @foreach ($courses as $course)
            <div class="course-card">
                @php
                    // Clean up the image path - remove ../ prefix if present
                    $imagePath = $course->image ? str_replace('../', '', $course->image) : null;
                    // If path doesn't start with 'uploads/', prepend it
                    if ($imagePath && !str_starts_with($imagePath, 'uploads/')) {
                        $imagePath = 'uploads/courses/' . $imagePath;
                    }
                @endphp
                @if($imagePath && file_exists(public_path($imagePath)))
                    <img class="course-image" src="{{ asset($imagePath) }}" alt="{{ $course->title }}">
                @else
                    <img class="course-image" src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=800&h=600&fit=crop" alt="{{ $course->title }}">
                @endif
                
                <div class="course-header">
                    <h3 class="course-title">{{ $course->title }}</h3>
                    <div class="academy-info">
                        @if (isset($course->academy) && $course->academy->avatar)
                            <img src="{{ asset('/uploads/avatars/' . $course->academy->avatar) }}" alt="{{ $course->academy->name ?? 'Academy' }}" class="academy-avatar">
                        @endif
                        <span class="academy-name">{{ $course->academy->name ?? 'Academy Name' }}</span>
                    </div>
                </div>
                
                <div class="course-body">
                    <div class="course-date">
                        <i class="far fa-calendar"></i>
                        {{ $course->start_on }}
                    </div>
                    <p class="course-summary">{{ $course->summary ?? 'No description available.' }}</p>
                </div>
                
                <div class="course-footer">
                    <div class="course-stats">
                        <span class="stat-item">
                            <i class="fas fa-heart like-btn" data-id="{{ $course->id }}" style="color: {{ auth()->check() && $course->likedByUsers->contains(auth()->id()) ? 'red' : 'rgba(255, 255, 255, 0.5)' }};"></i>
                            <span class="like-count-{{ $course->id }}">{{ $course->likedByUsers->count() }}</span>
                        </span>
                        <span class="stat-item">
                            <i class="fas fa-comment"></i>
                            <span class="comment-count-{{ $course->id }}">{{ $course->comments_count ?? $course->comments->count() }}</span>
                        </span>
                    </div>
                    
                    <div class="course-actions">
                        @if(auth()->user()->hasRole('admin') || (auth()->user()->account->id ?? null) == $course->account_id)
                            <a href="{{ url('dashboard/courses/' . $course->id) . '/edit' }}" class="action-btn edit-btn">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <button type="button" class="action-btn delete-btn" onclick="confirmDelete({{ $course->id }})">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        @endif
                        <a href="{{ url('dashboard/courses/' . $course->id) }}" class="view-btn">
                            <i class="fas fa-arrow-right"></i> View
                        </a>
                    </div>
                </div>
            </div>
            
            <form id="delete-career-{{ $course->id }}" action="{{ url('dashboard/courses/' . $course->id) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $courses->links('pagination::bootstrap-4') }}
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/dashboard/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(function() {
            $('.select2').select2()
        });
    </script>


    <script>
        $(function() {
            $('.select2').select2()
        });
    </script>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "This Course will be permanently deleted!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "Cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-career-' + id).submit();
                }
            });
        }

        $(document).on('click', '.like-btn', function() {
            let heart = $(this);
            let courseId = heart.data('id');

            $.ajax({
                url: "{{ url('dashboard/courses') }}/" + courseId + "/like",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {

                    // Update button style
                    // Change heart color
                    if (response.liked) {
                        heart.css('color', 'red');
                    } else {
                        heart.css('color', '#ccc');
                    }

                    // Update likes count
                    $(".like-count-" + courseId).text(response.count);
                },
                error: function() {
                    toastr.error("unauthorized Action");
                }
            });
        });
    </script>
@endsection
