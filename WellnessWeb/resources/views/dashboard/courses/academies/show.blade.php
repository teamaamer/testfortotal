@extends('layouts.dashboard.app2')
@section('css')
<style>
.main-header.navbar {
    background-color: #3c3277 !important;
}

.main-header.navbar .nav-link,
.main-header.navbar .navbar-nav .nav-link {
    color: #ffffff !important;
}

.main-header.navbar .nav-link:hover {
    color: #e6ddff !important;
}

.main-header .navbar-brand,
.main-header .navbar-brand span {
    color: #ffffff !important;
}

.main-footer {
    background-color: #3c3277 !important;
    color: #ffffff !important;
    border-top: none;
}

.main-footer a {
    color: #e6ddff !important;
}

.main-footer a:hover {
    color: #ffffff !important;
}

.main-header i,
.main-footer i {
    color: #ffffff !important;
}
</style>
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $academy->name }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('dashboard/academies') }}">Academis</a></li>
                        <li class="breadcrumb-item active">{{ $academy->name }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">

            <!-- Academic Cover -->
            <div class="card card-primary card-outline">
                <div class="card-header p-0 border-0">
                    <!-- Cover Image -->
                    <div class="position-relative">
                        <img src="{{ asset('/uploads/avatars/' . $academy->avatar) }}" 
                             alt="Cover Image" 
                             class="img-fluid w-100" 
                             style="height: 300px; object-fit: cover;">
                        <!-- Title on top of cover -->
                    </div>
                </div>
            </div>

            <!-- Stats -->
            <div class="row text-center my-4">
                <div class="col-md-4">
                    <div class="info-box" style="background-color: #29193b; color:white;">
                        <span class="info-box-icon" ><i class="fas fa-user-graduate"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Students</span>
                            <span class="info-box-number">{{ $academy->students_count }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-box" style="background-color: #583788;color:white;">
                        <span class="info-box-icon" ><i class="fas fa-briefcase"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Jobs</span>
                            <span class="info-box-number">{{ $academy->careers->count() }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-box " style="background-color: #a38cc4; color:white;">
                        <span class="info-box-icon" ><i class="fas fa-book"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Courses</span>
                            <span class="info-box-number">{{ $academy->courses->count() }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- About Section -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $academy->name }}</h3>
                </div>
                <div class="card-body">
                    <p>{{ $academy->summary }}</p>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
    </section>
@endsection

@section('js')
@endsection
