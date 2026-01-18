@extends('layouts.dashboard.modern')

@section('title', 'Job Applications')

@section('css')
<style>
    /* Header Section */
    .page-header {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 2rem;
        margin-bottom: 2rem;
    }

    .page-header-title {
        font-size: 2rem;
        font-weight: 700;
        color: white;
        margin-bottom: 0.5rem;
    }

    .page-header-subtitle {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.9375rem;
    }

    /* Table Card */
    .table-card {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 2rem;
        overflow: hidden;
    }

    .table-card-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: white;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .table-card-title i {
        color: #667eea;
    }

    /* DataTable Styling */
    .dataTables_wrapper {
        color: rgba(255, 255, 255, 0.9);
    }

    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter,
    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_processing,
    .dataTables_wrapper .dataTables_paginate {
        color: rgba(255, 255, 255, 0.9);
    }

    .dataTables_wrapper .dataTables_filter input,
    .dataTables_wrapper .dataTables_length select {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid var(--glass-border);
        border-radius: 8px;
        padding: 0.5rem 0.75rem;
        color: white;
    }

    table.dataTable {
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
    }

    table.dataTable thead th {
        background: rgba(102, 126, 234, 0.1);
        border: 1px solid rgba(102, 126, 234, 0.2);
        color: white;
        font-weight: 600;
        padding: 1rem;
        border-bottom: 2px solid rgba(102, 126, 234, 0.3);
    }

    table.dataTable tbody td {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.05);
        color: rgba(255, 255, 255, 0.9);
        padding: 1rem;
    }

    table.dataTable tbody tr:hover td {
        background: rgba(102, 126, 234, 0.1);
    }

    .table-avatar img {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid rgba(102, 126, 234, 0.5);
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid var(--glass-border);
        color: white !important;
        border-radius: 8px;
        padding: 0.5rem 1rem;
        margin: 0 0.25rem;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: rgba(102, 126, 234, 0.3) !important;
        border-color: rgba(102, 126, 234, 0.5) !important;
        color: white !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: var(--primary-gradient) !important;
        border-color: rgba(102, 126, 234, 0.5) !important;
        color: white !important;
    }

    /* Action Buttons */
    .action-btn {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.8125rem;
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .view-btn {
        background: rgba(102, 126, 234, 0.2);
        color: #60a5fa;
        border: 1px solid rgba(102, 126, 234, 0.3);
    }

    .view-btn:hover {
        background: rgba(102, 126, 234, 0.3);
        color: #93c5fd;
        transform: translateY(-2px);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .page-header,
        .table-card {
            padding: 1.5rem;
        }

        .page-header-title {
            font-size: 1.5rem;
        }

        table.dataTable thead th,
        table.dataTable tbody td {
            padding: 0.75rem 0.5rem;
            font-size: 0.875rem;
        }
    }
</style>
@endsection

@section('content')

    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-header-title">
            <i class="fas fa-user-tie"></i> Job Applications
        </h1>
        <p class="page-header-subtitle">Manage and review job applicants</p>
    </div>

    <!-- Applications Table -->
    <div class="table-card">
        <h2 class="table-card-title">
            <i class="fas fa-list"></i>
            All Applications
        </h2>
        
        <table id="data_table" class="table table-hover">
            <thead>
                <tr>
                    <th width="60">Avatar</th>
                    <th>Applicant Name</th>
                    <th>Job Position</th>
                    <th width="140">Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

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
