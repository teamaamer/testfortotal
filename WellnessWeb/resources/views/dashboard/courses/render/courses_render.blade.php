@foreach ($courses as $course)
    <div class="col-md-12 col-lg-6 col-xl-4">
        <div class="course-card">
            <!-- Course Image -->
            <div class="course-card-image">
                <img src="{{ asset('/uploads/courses/' . $course->image) }}" 
                     alt="{{ $course->title }}">
                <div class="course-overlay"></div>
            </div>

            <!-- Header -->
            <div class="course-card-header">
                <h3 class="course-card-title">{{ $course->title }}</h3>
            </div>

            <!-- Body -->
            <div class="course-card-body">
                <!-- Academy Info -->
                <div class="course-academy">
                    @if (isset($course->academy) && $course->academy->avatar)
                        <img src="{{ asset('/uploads/avatars/' . $course->academy->avatar) }}"
                            alt="{{ $course->academy->name ?? 'Academy' }}" 
                            class="course-academy-avatar">
                    @endif
                    <div class="course-academy-info">
                        <div class="course-academy-name">{{ $course->academy->name ?? 'Academy Name' }}</div>
                        <div class="course-date">
                            <i class="fas fa-calendar"></i>
                            {{ $course->start_on }}
                        </div>
                    </div>
                </div>

                <!-- Summary -->
                <p class="course-summary">{{ Str::limit($course->summary ?? 'No description available.', 100) }}</p>

                <!-- Stats -->
                <div class="course-stats">
                    <div class="course-stat">
                        <i class="fas fa-heart like-btn" data-id="{{ $course->id }}"
                           style="cursor:pointer; color: {{ auth()->check() && $course->likedByUsers->contains(auth()->id()) ? '#ef4444' : 'rgba(255,255,255,0.5)' }};">
                        </i>
                        <span class="like-count-{{ $course->id }}">{{ $course->likedByUsers->count() }}</span>
                    </div>
                    <div class="course-stat">
                        <i class="fas fa-comment"></i>
                        <span class="comment-count-{{ $course->id }}">{{ $course->comments_count ?? $course->comments->count() }}</span>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="course-card-footer">
                <div class="course-actions">
                    @if(auth()->user()->hasRole('admin') || (auth()->user()->account->id ?? null) == $course->account_id)
                    <div class="dropdown">
                        <button class="action-btn dropdown-btn" data-toggle="dropdown">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ url('dashboard/courses/' . $course->id . '/edit') }}">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a class="dropdown-item text-danger" href="#" onclick="confirmDelete({{ $course->id }}); return false;">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                        </div>
                    </div>
                    @endif

                    <a href="{{ url('dashboard/courses/' . $course->id) }}" class="action-btn view-btn">
                        <i class="fas fa-eye"></i> View Course
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden Delete Form -->
    <form id="delete-career-{{ $course->id }}" action="{{ url('dashboard/courses/' . $course->id) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endforeach
