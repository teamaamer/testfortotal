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
                        <li class="breadcrumb-item"><a href="{{ url('dashboard/careers') }}">Careers</a></li>
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
               <div class="row">
                <div class="col-12">
                    <!-- Custom Tabs -->
                    <div class="card">
                        <div class="card-header card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">
                                        {{ $career->title }} </a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Applied Students</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                   {{ $career->summary }}
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2">
                                   

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                <table id="data_table_applied_students" class="table table-bordered table-striped" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                             <th width="50px">Avatar</th>
                                                             <th>Name</th>
                                                             <th>Summary</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                        <tfoot>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- ./card -->
                </div>
                <!-- /.col -->
            </div> 

        </div>
        <!-- /.container-fluid -->
    </section>
@endsection

@section('js')

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


     <script type="text/javascript">
        $(document).ready(function() {

            var table = $("#data_table_applied_students").DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! url("dashboard/datatables/getCareerAppliedStudents/" . $career->id) !!}',

                columns: [
                   {
                        data: 'avatar',
                        name: 'avatar'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'summary',
                        name: 'summary'
                    }
                ]
            });

        });
    </script>

@endsection
