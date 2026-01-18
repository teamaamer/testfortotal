@foreach ($careers as $career)
    <div class="col-12 col-sm-6 col-md-4">
        <div class="career-card">
            <!-- Header -->
            <div class="career-card-header">
                <div class="career-badge">
                    <i class="fas fa-briefcase"></i>
                </div>
                <h3 class="career-card-title">{{ $career->title }}</h3>
            </div>

            <!-- Body -->
            <div class="career-card-body">
                <!-- Company Info -->
                <div class="career-company">
                    <img src="{{ asset('/uploads/avatars/' . $career->account->avatar) }}" 
                         class="career-avatar" 
                         alt="{{ $career->account->name }}">
                    <div class="career-company-info">
                        <div class="career-company-name">{{ $career->account->name }}</div>
                        <div class="career-location">
                            <i class="fas fa-map-marker-alt"></i>
                            {{ $career->city }}, {{ $career->country }}
                        </div>
                    </div>
                </div>

                <!-- Summary -->
                <p class="career-summary">{{ Str::limit($career->summary, 100) }}</p>

                <!-- Salary -->
                <div class="career-salary">
                    <i class="fas fa-dollar-sign"></i>
                    <span>{{ $career->salary ?? 'Competitive' }}</span>
                </div>
            </div>

            <!-- Footer -->
            <div class="career-card-footer">
                <div class="career-actions">
                    @if(auth()->user()->hasRole('admin') || (auth()->user()->account->id ?? null) == $career->account_id)
                    <div class="dropdown">
                        <button class="action-btn dropdown-btn" data-toggle="dropdown">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ url('dashboard/careers/' . $career->id . '/edit') }}">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a class="dropdown-item text-danger" href="#" onclick="confirmDelete({{ $career->id }}); return false;">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                        </div>
                    </div>
                    @endif

                    <a href="{{ url('dashboard/careers/' . $career->id) }}" class="action-btn view-btn">
                        <i class="fas fa-eye"></i> View
                    </a>

                    <button class="action-btn {{ auth()->user()->account->appliedCareers->contains($career->id) ? 'applied-btn' : 'apply-btn' }}" 
                            data-id="{{ $career->id }}">
                        <i class="fas fa-{{ auth()->user()->account->appliedCareers->contains($career->id) ? 'check' : 'paper-plane' }}"></i>
                        {{ auth()->user()->account->appliedCareers->contains($career->id) ? 'Applied' : 'Apply' }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden Delete Form -->
    <form id="delete-career-{{ $career->id }}" action="{{ url('dashboard/careers/' . $career->id) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endforeach
