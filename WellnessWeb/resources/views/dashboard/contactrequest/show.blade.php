@extends('layouts.dashboard.app2')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ ucfirst($contactRequest->type) }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('dashboard/contactRequets') }}">Requests</a></li>
                        <li class="breadcrumb-item active">{{ $contactRequest->type }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">

                                @if (isset($contactRequest->account))
                                    {{-- Account exists --}}
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ asset('/uploads/avatars/' . $contactRequest->account->avatar) }}"
                                        alt="User profile picture">
                                @else
                                    {{-- Anonymous --}}
                                    <div class="profile-user-img img-fluid img-circle d-flex align-items-center justify-content-center"
                                        style="width:100px;height:100px;background:#e5e7eb;">
                                        <span class="text-muted fw-bold">Anonymous</span>
                                    </div>
                                @endif

                            </div>

                            <h3 class="profile-username text-center">
                                @if (isset($contactRequest->account))
                                    {{ $contactRequest->account->name }}
                                @else
                                    Anonymous
                                @endif
                            </h3>

                            <p class="text-muted text-center">
                                @if (isset($contactRequest->account))
                                    {{ $contactRequest->account->user->email }}
                                @else
                                    —
                                @endif
                            </p>



                            <ul class="list-group list-group-unbordered mb-3">

                                @if (isset($contactRequest->city))
                                    <li class="list-group-item">


                                        <b>Location</b> <a
                                            class="float-right">{{ $contactRequest->city . ', (' . $contactRequest->country . ')' }}</a>
                                    </li>
                                @endif

                                @if (isset($contactRequest->phone))
                                    <li class="list-group-item">
                                        <b>Phone#</b> <a class="float-right">{{ ucfirst($contactRequest->phone) }}</a>
                                    </li>
                                @endif

                            </ul>


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>

                <div class="col-md-9">
                    <div class="card">

                        <div class="card-body">


                            <div class="row">

                                <!-- /.col -->
                                <div class="col-12">
                                    <p class="lead">{{ ucfirst($contactRequest->type) }} Request</p>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>

                                                @if (isset($contactRequest->problem_type))
                                                    <tr>
                                                        <th>Problem Type:</th>
                                                        <td>{{ $contactRequest->problem_type }}</td>
                                                    </tr>
                                                @endif
                                                @if (isset($contactRequest->device))
                                                    <tr>
                                                        <th>Current Device Type:</th>
                                                        <td>{{ $contactRequest->device->name }}</td>
                                                    </tr>
                                                @endif

                                                @if (isset($contactRequest->targetDevice))
                                                    <tr>
                                                        <th>Target Device Type:</th>
                                                        <td>{{ $contactRequest->targetDevice->name }}</td>
                                                    </tr>
                                                @endif

                                                <tr>
                                                    <th>Subject:</th>
                                                    <td>{{ $contactRequest->subject }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Message:</th>
                                                    <td>{{ $contactRequest->message }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>

                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->


            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->
    </section>
@endsection

@section('js')
@endsection
