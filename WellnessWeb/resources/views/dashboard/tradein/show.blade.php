@extends('layouts.dashboard.app2')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $career->title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('dashboard/careers') }}">Products</a></li>
                        <li class="breadcrumb-item active">{{ $career->title }}</li>
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
                        <img src="{{ asset('/uploads/avatars/' . $career->account->avatar) }}" 
                             alt="Cover Image" 
                             class="img-fluid w-100" 
                             style="height: 300px; object-fit: cover;">
                        <!-- Title on top of cover -->
                    </div>
                </div>
            </div>

            <!-- About Section -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $career->title }}</h3>
                </div>
                <div class="card-body">
                    <p>{{ $career->summary }}</p>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
    </section>
@endsection

@section('js')
@endsection
