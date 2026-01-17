@foreach ($academies as $academy)
    <div class="col-md-3">
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header text-white" style="background: url('{{ asset('assets/dashboard/dist/img/photo1.png') }}') center center / cover no-repeat;">

            </div>
            <div class="widget-user-image">
                <img class="img-circle elevation-2" src="{{ asset('/uploads/avatars/' . $academy->avatar) }}">

            </div>
            <div class="card-footer">
                <span class="widget-user-username">
                      {{ $academy->name }}
                    </span>

 

                <row class="widget-user-desc">
                    {{ $academy->summary }}
                </row>

                <a href="{{ url('dashboard/academies/' . $academy->id ) }}" class="small-box-footer float-right">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- /.widget-user -->
    </div>
@endforeach
