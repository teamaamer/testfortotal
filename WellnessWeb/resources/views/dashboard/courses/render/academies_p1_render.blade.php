@foreach ($academies as $academy)
    <div class="col-md-3 col-sm-6 col-12">
        <div class="academy-info-box">
            <div class="academy-info-icon">
                <img src="{{ asset('/uploads/avatars/' . $academy->avatar) }}" 
                     alt="{{ $academy->name }}">
            </div>
            <div class="academy-info-content">
                <div class="academy-info-name">{{ $academy->name }}</div>
                <div class="academy-info-id">#{{ $academy->id }}</div>
            </div>
        </div>
    </div>
@endforeach

