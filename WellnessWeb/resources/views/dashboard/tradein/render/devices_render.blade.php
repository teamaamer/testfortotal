<div class="devices-grid">
    @foreach ($devices as $device)
        <div class="device-card">
            <img class="device-image"
                src="{{ asset('/uploads/products/' . $device->avatar) }}" 
                alt="{{ $device->name }}">
            <div class="device-body">
                <h3 class="device-name">{{ $device->name }}</h3>
                <a href="{{ url('dashboard/devices/' . $device->id) }}" class="device-btn">
                    <i class="fas fa-arrow-right"></i> Learn More
                </a>
            </div>
        </div>
    @endforeach
</div>
