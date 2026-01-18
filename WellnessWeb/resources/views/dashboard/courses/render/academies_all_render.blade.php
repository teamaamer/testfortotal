@foreach ($academies as $academy)
    <div class="col-md-6 col-lg-4 col-xl-3">
        <div class="academy-card">
            <!-- Cover Image -->
            <div class="academy-card-cover">
                <img src="{{ asset('assets/dashboard/dist/img/photo1.png') }}" alt="Cover">
                <div class="academy-overlay"></div>
            </div>

            <!-- Avatar -->
            <div class="academy-avatar-wrapper">
                <img src="{{ asset('/uploads/avatars/' . $academy->avatar) }}" 
                     alt="{{ $academy->name }}" 
                     class="academy-avatar">
            </div>

            <!-- Body -->
            <div class="academy-card-body">
                <h3 class="academy-name">{{ $academy->name }}</h3>
                <p class="academy-summary">{{ Str::limit($academy->summary, 80) }}</p>
            </div>

            <!-- Footer -->
            <div class="academy-card-footer">
                <a href="{{ url('dashboard/academies/' . $academy->id) }}" class="academy-btn">
                    <span>View Academy</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
@endforeach
