@extends('layouts.dashboard.app2')

@section('css')
<style>
.jobs-card {
    border-radius: 14px;
    border: none;
    box-shadow: 0 10px 25px rgba(0,0,0,.05);
}

.jobs-card .card-header {
    background: #fff;
    border-bottom: 1px solid #eee;
}

.page-title {
    font-weight: 700;
}

.table td, .table th {
    vertical-align: middle;
}

.table-avatar img {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    object-fit: cover;
}
</style>
@endsection

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-sm-6">
                <h1 class="page-title">Job Applications</h1>
                <p class="text-muted mb-0">Manage and review job applicants</p>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Job Applications</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
<div class="container-fluid">

<div class="row">
<div class="col-12">

<div class="card jobs-card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0">
            Centralized listing of job Applications
        </h3>
    </div>

    <div class="card-body">
        <table id="data_table" class="table table-hover table-striped">
            <thead>
                <tr>
                    <th width="60">Avatar</th>
                    <th>Applicant Name</th>
                    <th>Job</th>
                    <th width="140">Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

</div>
</div>

</div>
</section>

@endsection

@section('js')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function() {
    $('#data_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! url('dashboard/datatables/getJobApplications') !!}',
        columns: [
            { data: 'avatar', name: 'avatar' },
            { data: 'name', name: 'name' },
            { data: 'career_name', name: 'career_name' },
            { data: 'actions', name: 'actions' }
        ],
        responsive: true,
        autoWidth: false
    });
});
</script>

@endsection
