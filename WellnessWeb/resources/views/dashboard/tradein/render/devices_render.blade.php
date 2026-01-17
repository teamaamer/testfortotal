@foreach ($devices as $device)
    <div class="col-md-3">
        <div class="card">
            <img class="card-img-top"
                src="{{ asset('/uploads/products/' . $device->avatar) }}" alt="Device">
            <div class="card-body">
                <h5 class="card-title">{{$device->name}}</h5>
                <a href="{{ url('dashboard/devices/' . $device->id ) }}" class="btn btn-primary btn-sm mt-2 w-100">Learn More</a>
            </div>
        </div>
    </div>
@endforeach
