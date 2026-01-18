@extends('layouts.dashboard.modern')

@section('title', $career->title)

@section('css')
<style>
    /* Cover Section */
    .career-cover {
        position: relative;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        overflow: hidden;
        margin-bottom: 2.5rem;
        height: 350px;
    }

    .career-cover-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0.3;
    }

    .career-cover-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0.7) 100%);
    }

    .career-cover-content {
        position: relative;
        z-index: 1;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 2.5rem 2rem;
    }

    .career-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 10px;
        color: white;
        font-size: 0.875rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 1rem;
        width: fit-content;
    }

    .career-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: white;
        margin-bottom: 0.5rem;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    }

    .career-actions {
        position: absolute;
        top: 2rem;
        right: 2rem;
        z-index: 2;
    }

    .career-btn {
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        text-decoration: none;
        background: rgba(255, 255, 255, 0.25);
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.4);
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .career-btn:hover {
        background: rgba(255, 255, 255, 0.35);
        transform: translateY(-2px);
        color: white;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
    }

    /* Tabs */
    .content-card {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 2rem;
        margin-bottom: 2rem;
    }

    .tabs-header {
        display: flex;
        gap: 1rem;
        margin-bottom: 2rem;
        border-bottom: 2px solid rgba(255, 255, 255, 0.1);
        padding-bottom: 0;
    }

    .tab-btn {
        padding: 1rem 1.5rem;
        background: transparent;
        border: none;
        color: rgba(255, 255, 255, 0.6);
        font-weight: 600;
        font-size: 0.9375rem;
        cursor: pointer;
        transition: all 0.3s ease;
        border-bottom: 3px solid transparent;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        position: relative;
        bottom: -2px;
    }

    .tab-btn:hover {
        color: rgba(255, 255, 255, 0.9);
    }

    .tab-btn.active {
        color: white;
        border-bottom-color: #667eea;
    }

    .tab-content {
        display: none;
        padding: 1.5rem 0;
        animation: fadeIn 0.3s ease;
    }

    .tab-content.active {
        display: block !important;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .content-text {
        color: rgba(255, 255, 255, 0.9);
        line-height: 1.8;
        font-size: 0.9375rem;
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

    /* Responsive */
    @media (max-width: 768px) {
        .career-cover {
            height: 300px;
        }

        .career-title {
            font-size: 1.75rem;
        }

        .career-actions {
            position: static;
            margin-bottom: 1rem;
        }

        .content-card {
            padding: 1.5rem;
        }

        .tabs-header {
            gap: 0.5rem;
            overflow-x: auto;
        }

        .tab-btn {
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
            white-space: nowrap;
        }
    }

    @media (max-width: 480px) {
        .career-cover {
            height: 250px;
        }

        .career-title {
            font-size: 1.5rem;
        }

        .tab-btn i {
            display: none;
        }
    }
</style>
@endsection

@section('content')
    <!-- Career Cover Section -->
    <div class="career-cover">
        <img src="{{ asset('/uploads/avatars/' . $career->account->avatar) }}" 
             alt="{{ $career->title }}" 
             class="career-cover-image">
        <div class="career-cover-overlay"></div>
        
        <div class="career-actions">
            <a href="{{ url('dashboard/careers') }}" class="career-btn">
                <i class="fas fa-arrow-left"></i> Back to Careers
            </a>
        </div>

        <div class="career-cover-content">
            <div class="career-badge">
                <i class="fas fa-briefcase"></i>
                Career Opportunity
            </div>
            <h1 class="career-title">{{ $career->title }}</h1>
        </div>
    </div>

    <!-- Tabs Section -->
    <div class="content-card">
        <div class="tabs-header">
            <button class="tab-btn active" data-tab="description">
                <i class="fas fa-info-circle"></i> Description
            </button>
            <button class="tab-btn" data-tab="applicants">
                <i class="fas fa-users"></i> Applied Students
            </button>
        </div>

        <!-- Description Tab -->
        <div class="tab-content active" id="description-tab">
            <div class="content-text">
                <p>{{ $career->summary }}</p>
            </div>
        </div>

        <!-- Applicants Tab -->
        <div class="tab-content" id="applicants-tab">
            <table id="data_table_applied_students" class="table table-hover">
                <thead>
                    <tr>
                        <th width="50px">Avatar</th>
                        <th>Name</th>
                        <th>Summary</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


     <script type="text/javascript">
        // Tab switching
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tab-btn');
            
            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const tabName = this.getAttribute('data-tab');
                    
                    // Remove active class from all tabs and content
                    document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
                    document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));
                    
                    // Add active class to clicked tab and corresponding content
                    this.classList.add('active');
                    document.getElementById(tabName + '-tab').classList.add('active');
                });
            });
        });

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
