@extends('layouts.dashboard.modern')

@section('title', $course->title)

@section('css')
<style>
    /* Course Cover Section */
    .course-cover {
        position: relative;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        overflow: hidden;
        margin-bottom: 2.5rem;
        height: 400px;
    }

    .course-cover-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0.4;
    }

    .course-cover-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.8) 100%);
    }

    .course-cover-content {
        position: relative;
        z-index: 1;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 2.5rem 2rem;
    }

    .course-badge {
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

    .course-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: white;
        margin-bottom: 0.75rem;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    }

    .course-meta {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        flex-wrap: wrap;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.9375rem;
    }

    .course-actions {
        position: absolute;
        top: 8rem;
        right: 2rem;
        z-index: 2;
    }

    .course-btn {
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
        background: rgba(255, 255, 255, 0.25);
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.4);
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .course-btn:hover {
        background: rgba(255, 255, 255, 0.35);
        transform: translateY(-2px);
        color: white;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
    }

    /* Stats Cards */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
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
        font-size: 1.5rem;
        font-weight: 700;
        color: white;
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
        font-size: 1.25rem;
        font-weight: 700;
        color: white;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .content-card-title i {
        color: #667eea;
    }

    .content-text {
        color: rgba(255, 255, 255, 0.9);
        line-height: 1.8;
        font-size: 0.9375rem;
    }

    /* Comments Section */
    .comments-section {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 2rem;
        margin-bottom: 2rem;
    }

    .comment-form {
        margin-bottom: 2rem;
        padding-bottom: 2rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .comment-textarea {
        width: 100%;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid var(--glass-border);
        border-radius: 12px;
        padding: 1rem;
        color: white;
        font-size: 0.9375rem;
        resize: vertical;
        min-height: 100px;
        margin-bottom: 1rem;
    }

    .comment-textarea:focus {
        outline: none;
        border-color: rgba(102, 126, 234, 0.5);
        background: rgba(255, 255, 255, 0.15);
    }

    .comment-textarea::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }

    .comment-btn {
        padding: 0.75rem 2rem;
        background: var(--primary-gradient);
        color: white;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.875rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .comment-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
    }

    .load-more-btn {
        padding: 0.75rem 2rem;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid var(--glass-border);
        color: white;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.875rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: block;
        margin: 2rem auto 0;
    }

    .load-more-btn:hover {
        background: rgba(255, 255, 255, 0.15);
    }

    /* Tabs */
    .tabs-header {
        display: flex;
        gap: 1rem;
        margin-bottom: 2rem;
        border-bottom: 2px solid rgba(255, 255, 255, 0.1);
        padding-bottom: 0;
    }

    .tab-btn {
        padding: 1rem 1.5rem;
        background: transparent;
        border: none;
        color: rgba(255, 255, 255, 0.6);
        font-weight: 600;
        font-size: 0.9375rem;
        cursor: pointer;
        transition: all 0.3s ease;
        border-bottom: 3px solid transparent;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        position: relative;
        bottom: -2px;
    }

    .tab-btn:hover {
        color: rgba(255, 255, 255, 0.9);
    }

    .tab-btn.active {
        color: white;
        border-bottom-color: #667eea;
    }

    .tab-content {
        display: none;
        padding: 1.5rem 0;
        animation: fadeIn 0.3s ease;
    }

    .tab-content.active {
        display: block !important;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Comments Display */
    #comments-list {
        margin-top: 1.5rem;
    }

    .comment {
        padding: 1.25rem;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
    }

    .comment:hover {
        background: rgba(255, 255, 255, 0.08);
        border-color: rgba(102, 126, 234, 0.3);
    }

    .comment strong {
        color: white;
        font-size: 0.9375rem;
        font-weight: 600;
    }

    .comment small {
        color: rgba(255, 255, 255, 0.5);
        font-size: 0.8125rem;
        margin-left: 0.5rem;
    }

    .comment p {
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.9375rem;
        line-height: 1.6;
        margin-top: 0.75rem;
        margin-bottom: 0;
    }

    /* Students Section */
    .students-list {
        padding: 1rem 0;
    }

    .info-text {
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.9375rem;
        line-height: 1.6;
        margin-bottom: 2rem;
    }

    .student-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
    }

    .stat-box {
        background: rgba(102, 126, 234, 0.1);
        border: 1px solid rgba(102, 126, 234, 0.2);
        border-radius: 12px;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1.25rem;
        transition: all 0.3s ease;
    }

    .stat-box:hover {
        background: rgba(102, 126, 234, 0.15);
        transform: translateY(-2px);
    }

    .stat-box i {
        font-size: 2.5rem;
        color: #667eea;
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 700;
        color: white;
        line-height: 1;
        margin-bottom: 0.5rem;
    }

    .stat-text {
        font-size: 0.875rem;
        color: rgba(255, 255, 255, 0.7);
        font-weight: 500;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .course-cover {
            height: 300px;
            border-radius: 16px;
        }

        .course-cover-content {
            padding: 2rem 1.5rem;
        }

        .course-title {
            font-size: 1.75rem;
        }

        .course-badge {
            font-size: 0.75rem;
            padding: 0.375rem 0.75rem;
        }

        .course-meta {
            gap: 1rem;
        }

        .meta-item {
            font-size: 0.875rem;
        }

        .course-actions {
            position: static;
            width: 100%;
            padding: 0 1.5rem;
            margin-top: 1rem;
        }

        .course-btn {
            width: 100%;
            justify-content: center;
        }

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
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
            font-size: 1.25rem;
        }

        .content-card {
            padding: 1.5rem;
            border-radius: 12px;
        }

        .tabs-header {
            gap: 0.5rem;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
        }

        .tabs-header::-webkit-scrollbar {
            display: none;
        }

        .tab-btn {
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
            white-space: nowrap;
        }

        .content-card-title {
            font-size: 1.125rem;
        }

        .student-stats {
            grid-template-columns: 1fr;
        }

        .comment-form {
            padding: 1.5rem;
        }

        .comment-textarea {
            min-height: 80px;
            font-size: 0.875rem;
        }

        .comment-btn {
            width: 100%;
            justify-content: center;
        }

        .comment {
            padding: 1rem;
        }
    }

    @media (max-width: 640px) {
        .course-cover {
            height: auto;
            min-height: 200px;
            border-radius: 12px;
        }

        .course-cover-content {
            padding: 1.5rem 1rem;
            justify-content: center;
        }

        .course-badge {
            margin-bottom: 0.75rem;
        }

        .course-title {
            font-size: 1.5rem;
            line-height: 1.2;
            margin-bottom: 1rem;
        }

        .course-meta {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }

        .stat-card {
            padding: 1rem;
        }

        .stat-icon {
            width: 45px;
            height: 45px;
            font-size: 1.25rem;
        }

        .stat-label {
            font-size: 0.8125rem;
        }

        .stat-value {
            font-size: 1.125rem;
        }

        .content-card {
            padding: 1.25rem;
        }

        .tab-btn {
            padding: 0.625rem 0.875rem;
            font-size: 0.8125rem;
        }

        .tab-btn i {
            display: none;
        }

        .content-text {
            font-size: 0.875rem;
        }

        .stat-box {
            padding: 1.25rem;
        }

        .stat-box i {
            font-size: 2rem;
        }

        .stat-number {
            font-size: 1.75rem;
        }

        .stat-text {
            font-size: 0.8125rem;
        }

        .comment strong {
            font-size: 0.875rem;
        }

        .comment small {
            font-size: 0.75rem;
            display: block;
            margin-left: 0;
            margin-top: 0.25rem;
        }

        .comment p {
            font-size: 0.875rem;
        }

        .load-more-btn {
            width: 100%;
            font-size: 0.8125rem;
        }
    }

    @media (max-width: 480px) {
        .course-cover {
            height: 220px;
        }

        .course-title {
            font-size: 1.25rem;
        }

        .stat-value {
            font-size: 1rem;
        }

        .content-card {
            padding: 1rem;
        }
    }
</style>
@endsection

@section('content')

    <!-- Course Cover Section -->
    <div class="course-cover">
        @php
            // Clean up the image path - remove ../ prefix if present
            $imagePath = $course->image ? str_replace('../', '', $course->image) : null;
            // If path doesn't start with 'uploads/', prepend it
            if ($imagePath && !str_starts_with($imagePath, 'uploads/')) {
                $imagePath = 'uploads/courses/' . $imagePath;
            }
        @endphp
        @if($imagePath && file_exists(public_path($imagePath)))
            <img src="{{ asset($imagePath) }}" alt="{{ $course->title }}" class="course-cover-image">
        @else
            <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=1200&h=800&fit=crop" alt="{{ $course->title }}" class="course-cover-image">
        @endif
        <div class="course-cover-overlay"></div>
        
        <div class="course-actions">
            <a href="{{ url('dashboard/courses') }}" class="course-btn">
                <i class="fas fa-arrow-left"></i> Back to Courses
            </a>
        </div>

        <div class="course-cover-content">
            <div class="course-badge">
                <i class="fas fa-graduation-cap"></i>
                Course Details
            </div>
            <h1 class="course-title">{{ $course->title }}</h1>
            <div class="course-meta">
                <div class="meta-item">
                    <i class="fas fa-school"></i>
                    <span>{{ $course->academy->name ?? 'Academy' }}</span>
                </div>
                <div class="meta-item">
                    <i class="fas fa-calendar"></i>
                    <span>{{ $course->start_on }}</span>
                </div>
                <div class="meta-item">
                    <i class="fas fa-dollar-sign"></i>
                    <span>${{ number_format($course->price, 2) }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Overview -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-heart"></i>
            </div>
            <div class="stat-content">
                <div class="stat-label">Likes</div>
                <div class="stat-value" id="likes-count">{{ $course->likedByUsers->count() }}</div>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-comments"></i>
            </div>
            <div class="stat-content">
                <div class="stat-label">Comments</div>
                <div class="stat-value" id="comments-count">{{ $course->comments->count() }}</div>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-user-graduate"></i>
            </div>
            <div class="stat-content">
                <div class="stat-label">Students</div>
                <div class="stat-value">{{ $course->academy->students_count ?? 0 }}</div>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-content">
                <div class="stat-label">Status</div>
                <div class="stat-value" style="font-size: 1.125rem;">{{ ucfirst($course->status) }}</div>
            </div>
        </div>
    </div>

    <!-- Tabs Section -->
    <div class="content-card">
        <div class="tabs-header">
            <button class="tab-btn active" data-tab="description">
                <i class="fas fa-info-circle"></i> Description
            </button>
            <button class="tab-btn" data-tab="students">
                <i class="fas fa-user-graduate"></i> Students
            </button>
            <button class="tab-btn" data-tab="comments">
                <i class="fas fa-comments"></i> Comments
            </button>
        </div>

        <!-- Description Tab -->
        <div class="tab-content active" id="description-tab">
            <div class="content-text">
                <p><strong>Summary:</strong></p>
                <p>{{ $course->summary }}</p>
                
                @if($course->full_summary)
                <p style="margin-top: 1.5rem;"><strong>Full Description:</strong></p>
                <p>{{ $course->full_summary }}</p>
                @endif
                
                @if($course->requirements)
                <p style="margin-top: 1.5rem;"><strong>Requirements:</strong></p>
                <p>{{ $course->requirements }}</p>
                @endif
            </div>
        </div>

        <!-- Students Tab -->
        <div class="tab-content" id="students-tab">
            <div class="students-list">
                @if($course->academy && $course->academy->students_count > 0)
                    <p class="info-text">This course is offered by <strong>{{ $course->academy->name }}</strong> which has <strong>{{ $course->academy->students_count }}</strong> enrolled students.</p>
                    <div class="student-stats">
                        <div class="stat-box">
                            <i class="fas fa-users"></i>
                            <div>
                                <div class="stat-number">{{ $course->academy->students_count }}</div>
                                <div class="stat-text">Total Students</div>
                            </div>
                        </div>
                        <div class="stat-box">
                            <i class="fas fa-graduation-cap"></i>
                            <div>
                                <div class="stat-number">{{ $course->academy->courses->count() }}</div>
                                <div class="stat-text">Total Courses</div>
                            </div>
                        </div>
                    </div>
                @else
                    <p class="info-text">No student information available for this course.</p>
                @endif
            </div>
        </div>

        <!-- Comments Tab -->
        <div class="tab-content" id="comments-tab">
            @auth
            <form id="comment-form" class="comment-form">
                @csrf
                <input type="hidden" name="render" id="render" value="dashboard">
                <textarea id="comment-text" class="comment-textarea" placeholder="Write a comment..."></textarea>
                <button type="submit" class="comment-btn">
                    <i class="fas fa-paper-plane"></i> Post Comment
                </button>
            </form>
            @endauth

            <div id="comments-list"></div>

            @if ($comments->hasMorePages())
            <button id="load-more-comments" class="load-more-btn" data-next="{{ $comments->nextPageUrl() }}">
                Load More Comments
            </button>
            @endif
        </div>
    </div>

@endsection

@section('js')
    <script>
        // Tab switching with vanilla JavaScript
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tab-btn');
            
            console.log('Tab buttons found:', tabButtons.length);
            
            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const tabName = this.getAttribute('data-tab');
                    console.log('Tab clicked:', tabName);
                    
                    // Remove active class from all tabs and content
                    document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
                    document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));
                    
                    // Add active class to clicked tab and corresponding content
                    this.classList.add('active');
                    const targetTab = document.getElementById(tabName + '-tab');
                    if (targetTab) {
                        targetTab.classList.add('active');
                        console.log('Tab activated:', tabName);
                    } else {
                        console.error('Tab not found:', tabName + '-tab');
                    }
                });
            });
        });

        $(document).ready(function() {

            let nextUrl = "{{ route('courses.comments.load', $course->id) }}";

            // Load initial comments
            loadComments();

            function loadComments() {
                if (!nextUrl) return;

                $.get(nextUrl, function(res) {
                    console.log('Comments loaded:', res);
                    $("#comments-list").append(res.html);

                    if (res.next) {
                        nextUrl = res.next;
                        $("#load-more-comments").show();
                    } else {
                        $("#load-more-comments").hide();
                    }
                }).fail(function(error) {
                    console.error('Error loading comments:', error);
                });
            }

            $("#load-more-comments").click(function() {
                loadComments();
            });

            // Add comment
            $("#comment-form").submit(function(e) {
                e.preventDefault();

                let commentText = $("#comment-text").val();
                let render = $("#render").val();
                let courseId = "{{ $course->id }}";

                $.ajax({
                    url: "{{ route('courses.comments.store', $course->id) }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        comment: commentText,
                        render: render
                    },
                    success: function(res) {
                        // Add new comment HTML
                        $("#comments-list").prepend(res.html);

                        // Clear input
                        $("#comment-text").val("");

                        // Update count
                        let count = Number($("#comments-count").text()) + 1;
                        $("#comments-count").text(count);

                        toastr.success("Comment added successfully!");
                    },
                    error: function(xhr) {
                        // Handle different error cases
                        toastr.error("Something went wrong. Please try again.");

                    }
                });
            });


        });
    </script>
@endsection
