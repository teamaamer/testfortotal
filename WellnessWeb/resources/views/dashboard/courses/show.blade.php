@extends('layouts.dashboard.app2')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $course->title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('dashboard/courses') }}">Courses</a></li>
                        <li class="breadcrumb-item active">{{ $course->title }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">

            <!-- Academic Cover -->
            <div class="card card-primary card-outline">
                <div class="card-header p-0 border-0">
                    <!-- Cover Image -->
                    <div class="position-relative">
                        <img src="{{ asset('/uploads/courses/' . $course->image) }}" alt="Cover Image"
                            class="img-fluid w-100" style="height: 300px; object-fit: cover;">
                        <!-- Title on top of cover -->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Custom Tabs -->
                    <div class="card">
                        <div class="card-header card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">
                                        Description </a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Students</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    {{ $course->summary }}
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2">
                                    Student List here
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- ./card -->
                </div>
                <!-- /.col -->
            </div>

            <!-- COMMENTS SECTION -->
            <div class="card mt-4">
                <div class="card-header">
                    <h3 class="card-title">Comments</h3>
                </div>

                <div class="card-body">

                    {{-- Add Comment Box --}}
                    <form id="comment-form">
                        @csrf

                        <input type="hidden" name="render" value="dashboard">

                        @auth
                            <div class="mb-3">

                                <input type="hidden" name="render" id="render" value="dashboard">
                                <textarea id="comment-text" class="form-control" rows="3" placeholder="Write a comment..."></textarea>

                                <button id="add-comment-btn" class="btn btn-primary btn-sm mt-2"
                                    data-course="{{ $course->id }}">
                                    Comment
                                </button>
                            </div>
                        @endauth

                    </form>

                    <hr>

                    {{-- Comments list container --}}
                    <div id="comments-list">

                    </div>

                    {{-- Load More Button --}}
                    @if ($comments->hasMorePages())
                        <div class="text-center mt-3">
                            <button id="load-more-comments" class="btn btn-outline-secondary btn-sm"
                                data-next="{{ $comments->nextPageUrl() }}">
                                Load More
                            </button>
                        </div>
                    @endif

                </div>
            </div>



            {{-- Load More --}}
            <div class="text-center mt-3">
                <button id="load-more-comments" class="btn btn-light btn-sm d-none">Load more</button>
            </div>


        </div>
        <!-- /.container-fluid -->
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            let nextUrl = "{{ route('courses.comments.load', $course->id) }}";

            // Load initial comments
            loadComments();

            function loadComments() {
                if (!nextUrl) return;

                $.get(nextUrl, function(res) {
                    $("#comments-list").append(res.html);

                    if (res.next) {
                        nextUrl = res.next;
                        $("#load-more-comments").removeClass('d-none');
                    } else {
                        $("#load-more-comments").addClass('d-none');
                    }
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
