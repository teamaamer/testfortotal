@foreach ($devices as $device)
    <div class="col-sm-6 col-xs-12">
        <div class="image-tile outer-title text-center">
            <a href="{{ url('devices/' . $device->id) }}">
                <img alt="Pic" class="product-thumb" src="{{ asset('/uploads/products/' . $device->avatar) }}">
            </a>
            <div class="title">
                {{ $device->name }}
            </div>
        </div>
    </div>
@endforeach
