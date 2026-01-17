@foreach ($careers as $career)
    <div class="col-12 col-sm-6 col-md-4 flex-column">
        <div class="card shadow">

            <!-- Title -->
            <div class="card-header border-bottom-0">
                <h5 class="mb-1">{{ $career->title }}</h5>
            </div>

            <!-- Body -->
            <div class="card-body" style="padding-bottom: 1px;">

                <!-- Avatar + Name -->
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('/uploads/avatars/' . $career->account->avatar) }}" class="rounded-circle me-3"
                        style="width: 45px; height: 45px; object-fit: cover;" />

                    <div class="ml-2">
                        <h6 class="fw-bold mb-0">{{ $career->account->name }}</h6>
                        <small class="text-muted">{{ $career->city }} ({{ $career->country }})</small>
                    </div>
                </div>

                <!-- Summary - 2 lines only -->
                <p class="text-muted small mb-3 summary-line">
                    <span class="fw-bold">About:</span> {{ $career->summary }}
                </p>

                <!-- Salary -->
                <i class="fas fa-dollar-sign text-success"></i>
                <span class="fw-semibold">{{ $career->salary ?? '—' }}</span>

            </div>

            <!-- Footer -->
            <div class="card-footer bg-white" style="padding-top: 1px;">
                <div class="d-flex justify-content-between align-items-center">

                    <div class="text-success fw-bold">
                        100% Qualify
                    </div>

                    <div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-icon"
                                data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>

                            <div class="dropdown-menu" role="menu">

                                <a class="dropdown-item" href="{{ url('dashboard/careers/' . $career->id) . '/edit' }}">
                                    Edit
                                </a>

                                <!-- Delete Trigger -->
                                <a class="dropdown-item text-danger" href="#"
                                    onclick="confirmDelete({{ $career->id }}); return false;">
                                    Delete
                                </a>

                            </div>
                        </div>

                        <a href="{{ url('dashboard/careers/' . $career->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-user"></i> View Job
                        </a>

                        <!-- Apply/Unapply Button -->
                        <button
                            class="btn btn-sm {{ auth()->user()->account->appliedCareers->contains($career->id) ? 'btn-success' : 'btn-primary' }} apply-btn"
                            data-id="{{ $career->id }}">
                            {{ auth()->user()->account->appliedCareers->contains($career->id) ? 'Applied' : 'Apply' }}
                        </button>


                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Hidden Delete Form -->
    <form id="delete-career-{{ $career->id }}" action="{{ url('dashboard/careers/' . $career->id) }}" method="POST"
        style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endforeach
