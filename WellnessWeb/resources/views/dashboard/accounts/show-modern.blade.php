@extends('layouts.dashboard.modern')

@section('title', 'Account Profile')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<style>
    .profile-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 2rem;
        gap: 1.5rem;
        flex-wrap: wrap;
    }
    
    .profile-header-left h1 {
        font-size: 1.75rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }
    
    .profile-header-left p {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.9375rem;
    }
    
    .profile-actions {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
    }
    
    .profile-btn {
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        text-decoration: none;
        border: none;
        cursor: pointer;
        font-size: 0.9375rem;
    }
    
    .profile-btn-primary {
        background: var(--primary-gradient);
        color: white;
    }
    
    .profile-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        color: white;
    }
    
    .profile-btn-danger {
        background: rgba(239, 68, 68, 0.2);
        color: #f87171;
        border: 1px solid rgba(239, 68, 68, 0.3);
    }
    
    .profile-btn-danger:hover {
        background: rgba(239, 68, 68, 0.3);
        transform: translateY(-2px);
    }
    
    .profile-grid {
        display: grid;
        grid-template-columns: 350px 1fr;
        gap: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .profile-sidebar {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }
    
    .profile-card {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 2rem;
        position: relative;
        overflow: hidden;
    }
    
    .profile-card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 120px;
        height: 120px;
        background: var(--primary-gradient);
        opacity: 0.1;
        border-radius: 50%;
        transform: translate(50%, -50%);
    }
    
    .profile-avatar-section {
        text-align: center;
        position: relative;
        z-index: 1;
    }
    
    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid rgba(102, 126, 234, 0.3);
        margin-bottom: 1rem;
    }
    
    .profile-name {
        font-size: 1.5rem;
        font-weight: 700;
        color: white;
        margin-bottom: 0.5rem;
    }
    
    .profile-job-title {
        color: rgba(255, 255, 255, 0.6);
        font-size: 0.9375rem;
        margin-bottom: 1.5rem;
    }
    
    .profile-info-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .profile-info-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .profile-info-item:last-child {
        border-bottom: none;
    }
    
    .profile-info-label {
        font-weight: 600;
        color: rgba(255, 255, 255, 0.9);
    }
    
    .profile-info-value {
        color: rgba(255, 255, 255, 0.7);
        text-align: right;
    }
    
    .profile-card-title {
        font-size: 1.125rem;
        font-weight: 700;
        color: white;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .profile-card-title i {
        color: #667eea;
    }
    
    .about-item {
        margin-bottom: 1.5rem;
        position: relative;
        z-index: 1;
    }
    
    .about-item:last-child {
        margin-bottom: 0;
    }
    
    .about-label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 0.5rem;
    }
    
    .about-label i {
        color: #667eea;
        width: 20px;
    }
    
    .about-value {
        color: rgba(255, 255, 255, 0.7);
        line-height: 1.6;
        padding-left: 1.75rem;
    }
    
    .documents-section {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 2rem;
    }
    
    .documents-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }
    
    .documents-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: white;
    }
    
    .add-document-btn {
        background: var(--primary-gradient);
        color: white;
        padding: 0.625rem 1.25rem;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        font-size: 0.875rem;
    }
    
    .add-document-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        color: white;
    }
    
    /* DataTables Styling */
    .dataTables_wrapper {
        color: rgba(255, 255, 255, 0.9);
    }
    
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter,
    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_paginate {
        color: rgba(255, 255, 255, 0.8);
    }
    
    .dataTables_wrapper .dataTables_filter input,
    .dataTables_wrapper .dataTables_length select {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid var(--glass-border);
        border-radius: 8px;
        padding: 0.5rem 1rem;
        color: white;
        margin-left: 0.5rem;
    }
    
    #data_table_documents {
        width: 100% !important;
        border-collapse: separate;
        border-spacing: 0;
        margin: 0 !important;
    }
    
    #data_table_documents thead th {
        background: rgba(102, 126, 234, 0.2) !important;
        color: white !important;
        font-weight: 600;
        padding: 1rem;
        border: none !important;
        text-align: left;
        border-bottom: 2px solid rgba(102, 126, 234, 0.3) !important;
    }
    
    #data_table_documents tbody td {
        padding: 1rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        color: rgba(255, 255, 255, 0.9);
    }
    
    #data_table_documents tbody tr {
        transition: all 0.3s ease;
    }
    
    #data_table_documents tbody tr:hover {
        background: rgba(102, 126, 234, 0.1);
    }
    
    .document-link {
        color: #60a5fa;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
    }
    
    .document-link:hover {
        color: #93c5fd;
    }
    
    .action-btn {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        margin: 0 0.25rem;
    }
    
    .action-btn-delete {
        background: rgba(239, 68, 68, 0.2);
        color: #f87171;
    }
    
    .action-btn-delete:hover {
        background: rgba(239, 68, 68, 0.3);
        transform: scale(1.1);
    }
    
    /* Role and Status Badges */
    .role-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        padding: 0.25rem 0.625rem;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.6875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .role-admin {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
    }
    
    .role-student {
        background: rgba(34, 197, 94, 0.2);
        color: #4ade80;
        border: 1px solid rgba(34, 197, 94, 0.3);
    }
    
    .role-academy {
        background: rgba(168, 85, 247, 0.2);
        color: #c084fc;
        border: 1px solid rgba(168, 85, 247, 0.3);
    }
    
    .role-center {
        background: rgba(236, 72, 153, 0.2);
        color: #f472b6;
        border: 1px solid rgba(236, 72, 153, 0.3);
    }
    
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.375rem 0.75rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.75rem;
        text-transform: uppercase;
    }
    
    .status-badge::before {
        content: '';
        width: 8px;
        height: 8px;
        border-radius: 50%;
        display: inline-block;
    }
    
    .status-active {
        background: rgba(34, 197, 94, 0.2);
        color: #4ade80;
        border: 1px solid rgba(34, 197, 94, 0.3);
    }
    
    .status-active::before {
        background: #4ade80;
        box-shadow: 0 0 8px rgba(34, 197, 94, 0.6);
    }
    
    .status-inactive {
        background: rgba(251, 146, 60, 0.2);
        color: #fb923c;
        border: 1px solid rgba(251, 146, 60, 0.3);
    }
    
    .status-inactive::before {
        background: #fb923c;
        box-shadow: 0 0 8px rgba(251, 146, 60, 0.6);
    }
    
    .status-blocked {
        background: rgba(239, 68, 68, 0.2);
        color: #f87171;
        border: 1px solid rgba(239, 68, 68, 0.3);
    }
    
    .status-blocked::before {
        background: #f87171;
        box-shadow: 0 0 8px rgba(239, 68, 68, 0.6);
    }
    
    /* Responsive */
    @media (max-width: 1024px) {
        .profile-grid {
            grid-template-columns: 1fr;
        }
    }
    
    @media (max-width: 768px) {
        .profile-header {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .profile-actions {
            width: 100%;
        }
        
        .profile-btn {
            flex: 1;
            justify-content: center;
        }
        
        .profile-card {
            padding: 1.5rem;
        }
        
        .documents-section {
            padding: 1.5rem;
        }
        
        .documents-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }
        
        .add-document-btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endsection

@section('content')

    <!-- Profile Header -->
    <div class="profile-header">
        <div class="profile-header-left">
            <h1>Welcome back, {{ $account->name }}!</h1>
            <p>View and manage account information</p>
        </div>
        @if ($account->user->id == auth()->id())
        <div class="profile-actions">
            <a href="{{ url('dashboard/accounts/' . $account->id . '/edit') }}" class="profile-btn profile-btn-primary">
                <i class="fas fa-edit"></i> Edit Profile
            </a>
            <form action="{{ url('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="profile-btn profile-btn-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
        @endif
    </div>

    <!-- Profile Grid -->
    <div class="profile-grid">
        <!-- Sidebar -->
        <div class="profile-sidebar">
            <!-- Profile Card -->
            <div class="profile-card">
                <div class="profile-avatar-section">
                    <img src="{{ asset('/uploads/avatars/' . $account->avatar) }}" alt="{{ $account->name }}" class="profile-avatar">
                    <h2 class="profile-name">{{ $account->name }}</h2>
                    <p class="profile-job-title">{{ $account->job_title }}</p>
                </div>
                
                <ul class="profile-info-list">
                    <li class="profile-info-item">
                        <span class="profile-info-label">Email</span>
                        <span class="profile-info-value">{{ $account->user->email }}</span>
                    </li>
                    <li class="profile-info-item">
                        <span class="profile-info-label">Status</span>
                        <span class="profile-info-value">
                            <span class="status-badge status-{{ strtolower($account->status) }}">
                                {{ ucfirst($account->status) }}
                            </span>
                        </span>
                    </li>
                    <li class="profile-info-item">
                        <span class="profile-info-label">Role</span>
                        <span class="profile-info-value">
                            <span class="role-badge role-{{ strtolower($account->user->role) }}">
                                @if($account->user->role == 'admin')
                                    <i class="fas fa-user-shield"></i>
                                @elseif($account->user->role == 'student')
                                    <i class="fas fa-user-graduate"></i>
                                @elseif($account->user->role == 'academy')
                                    <i class="fas fa-school"></i>
                                @elseif($account->user->role == 'center')
                                    <i class="fas fa-building"></i>
                                @endif
                                {{ ucfirst($account->user->role) }}
                            </span>
                        </span>
                    </li>
                </ul>
            </div>

            @if ($account->user->isStudent() && (auth()->user()->hasAnyRole(['admin', 'center']) || auth()->user()->account->id === $account->id))
            <!-- About Card -->
            <div class="profile-card">
                <h3 class="profile-card-title">
                    <i class="fas fa-info-circle"></i> About
                </h3>
                
                <div class="about-item">
                    <div class="about-label">
                        <i class="fas fa-book"></i> Education
                    </div>
                    <div class="about-value">
                        {{ $account->degree . ', ' . $account->specialty }}
                    </div>
                </div>
                
                <div class="about-item">
                    <div class="about-label">
                        <i class="fas fa-map-marker-alt"></i> Location
                    </div>
                    <div class="about-value">
                        {{ $account->address . ', ' . $account->city . ', ' . $account->state . ', ' . $account->country . ', (' . $account->zip_code . ')' }}
                    </div>
                </div>
                
                <div class="about-item">
                    <div class="about-label">
                        <i class="far fa-file-alt"></i> License
                    </div>
                    <div class="about-value">
                        {{ $account->certifying_board . ' (' . $account->state_of_license . ')' }}
                    </div>
                </div>
            </div>
            @endif
        </div>

        <!-- Main Content -->
        @if ($account->user->isStudent() && (auth()->user()->hasAnyRole(['admin', 'center']) || auth()->user()->account->id === $account->id))
        <div class="documents-section">
            <div class="documents-header">
                <h3 class="documents-title">Documents</h3>
                <a href="{{ url('dashboard/accounts/' . $account->id . '/documents/create') }}" class="add-document-btn">
                    <i class="fas fa-plus"></i> Add Document
                </a>
            </div>
            
            <div class="table-container">
                <table id="data_table_documents" class="display">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Document</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>

@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var table = $("#data_table_documents").DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! url('dashboard/datatables/getAccountDocuments/' . $account->id) !!}',
                columns: [{
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'type',
                        name: 'type'
                    },
                    {
                        data: 'file_path',
                        name: 'file_path'
                    },
                    {
                        data: 'actions',
                        name: 'actions'
                    }
                ]
            });
        });

        function confirmDelete(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "This document will be permanently deleted!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "Cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-document-' + id).submit();
                }
            });
        }
    </script>
@endsection
