@foreach ($courses as $course)
    <div class="col-md-12 col-lg-6 col-xl-4">
        <div class="card mb-3 shadow border-0 bg-white">
            {{-- Course Image --}}
            <img class="card-img-top rounded-top" src="{{ asset('/uploads/courses/' . $course->image) }}"
                alt="{{ $course->title }}" style="height: 200px; object-fit: cover;">

                 <div class="card-header border-bottom-0">
                <h5 class="mb-1">{{ $course->title }}</h5>
                 </div>

            <div class="card-body" style="padding-top: 0px">
                {{-- Academy Avatar + Title --}}
                <div class="d-flex align-items-center mb-3">
                    @if (isset($course->academy) && $course->academy->avatar)
                        <img src="{{ asset('/uploads/avatars/' . $course->academy->avatar) }}"
                            alt="{{ $course->academy->name ?? 'Academy' }}" class="rounded-circle border me-2"
                            style="width: 48px; height: 48px; object-fit: cover;">
                    @endif
                    <h5 class="card-title mb-0 fw-semibold text-dark  ml-2">
                        {{ $course->academy->name ?? 'Academy Name' }}
                    </h5>
                </div>

                {{-- Start Date --}}
                <p class="text-muted small mb-2">{{ $course->start_on }}</p>

                {{-- Description (limited to 2 lines) --}}
                <p class="text-muted mb-2 summary"
                    style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                    {{ $course->summary ?? 'No description available.' }}
                </p>
            </div>


            <!-- Footer -->
            <div class="card-footer bg-white">
                <div class="d-flex justify-content-between align-items-center">

                    <div class="d-flex align-items-center" style="gap: 16px;">

                        {{-- ❤️ Likes --}}
                        <span class="d-flex align-items-center" style="padding:2px;">
                            <i class="fas fa-heart like-btn" data-id="{{ $course->id }}"
                                style="cursor:pointer; font-size:18px; color:
                {{ auth()->check() && $course->likedByUsers->contains(auth()->id()) ? 'red' : '#ccc' }};">
                            </i>

                            <span class="ms-1 like-count-{{ $course->id }}" style="padding:2px;">
                                {{ $course->likedByUsers->count() }}
                            </span>
                        </span>

                        {{-- 💬 Comments --}}
                        <span class="d-flex align-items-center" style="padding:2px;">
                            <i class="fas fa-comment text-secondary" style="font-size:18px; cursor:default;">
                            </i>

                            <span class="ms-1 comment-count-{{ $course->id }}" style="padding:2px;">
                                {{ $course->comments_count ?? $course->comments->count() }}
                            </span>
                        </span>

                    </div>



                    {{-- Actions --}}
                    <div>

                        @if(auth()->user()->hasRole('admin') || (auth()->user()->account->id ?? null) == $course->account_id)


                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-icon"
                                data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>

                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item"
                                    href="{{ url('dashboard/courses/' . $course->id) . '/edit' }}">
                                    Edit
                                </a>

                                <a class="dropdown-item text-danger" href="#"
                                    onclick="confirmDelete({{ $course->id }}); return false;">
                                    Delete
                                </a>
                            </div>
                        </div>

                        @endif

                        <a href="{{ url('dashboard/courses/' . $course->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-user"></i> View Course
                        </a>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <!-- Hidden Delete Form -->
    <form id="delete-career-{{ $course->id }}" action="{{ url('dashboard/courses/' . $course->id) }}" method="POST"
        style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endforeach
