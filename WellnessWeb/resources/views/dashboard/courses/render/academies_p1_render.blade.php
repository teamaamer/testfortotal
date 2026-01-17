@foreach ($academies as $academy)
    <div class="col-md-3 col-sm-6 col-12 flex-shrink-0">
        <div class="info-box">
            <span class="info-box-icon">  
<img src="{{ asset('/uploads/avatars/' . $academy->avatar) }}" 
     alt="User Avatar" 
     style="width:60px; height:60px; border-radius:50%; object-fit:cover;">

    </span>
            <div class="info-box-content">
                <span class="info-box-text">{{$academy->name}}</span>
                <span class="info-box-number">{{$academy->id}}</span>
            </div>
        </div>
    </div>
@endforeach

