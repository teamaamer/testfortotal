@extends('layouts.dashboard.modern')

@section('title', 'Account Manager')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<style>
    .modern-card {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 2rem;
        margin-bottom: 1.5rem;
    }
    
    .controls-bar {
        display: flex;
        gap: 1rem;
        margin-bottom: 2rem;
        flex-wrap: wrap;
    }
    
    .search-box {
        flex: 1;
        min-width: 250px;
        position: relative;
    }
    
    .search-box i {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: rgba(255, 255, 255, 0.5);
    }
    
    .search-box input {
        width: 100%;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid var(--glass-border);
        border-radius: 12px;
        padding: 0.875rem 1rem 0.875rem 3rem;
        color: white;
        font-size: 0.9375rem;
        transition: all 0.3s ease;
    }
    
    .search-box input:focus {
        outline: none;
        border-color: rgba(102, 126, 234, 0.5);
        background: rgba(255, 255, 255, 0.15);
    }
    
    .search-box input::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }
    
    .filter-box select {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid var(--glass-border);
        border-radius: 12px;
        padding: 0.875rem 1rem;
        color: white;
        font-size: 0.9375rem;
        min-width: 150px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .filter-box select:focus {
        outline: none;
        border-color: rgba(102, 126, 234, 0.5);
        background: rgba(255, 255, 255, 0.15);
    }
    
    .filter-box select option {
        background: #1a1a2e;
        color: white;
    }
    
    .accounts-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .user-card {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 1.5rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .user-card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100px;
        height: 100px;
        background: var(--primary-gradient);
        opacity: 0.1;
        border-radius: 50%;
        transform: translate(50%, -50%);
    }
    
    .user-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        border-color: rgba(102, 126, 234, 0.3);
    }
    
    .user-card-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1rem;
        position: relative;
        z-index: 1;
    }
    
    .user-card-avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid rgba(102, 126, 234, 0.3);
    }
    
    .user-card-info {
        flex: 1;
    }
    
    .user-card-name {
        font-size: 1.125rem;
        font-weight: 600;
        color: white;
        margin-bottom: 0.25rem;
    }
    
    .user-card-role {
        display: inline-block;
    }
    
    .user-card-body {
        margin-bottom: 1rem;
        position: relative;
        z-index: 1;
    }
    
    .user-card-about {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.875rem;
        line-height: 1.5;
        margin-bottom: 0.75rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .user-card-meta {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .user-card-status {
        display: inline-block;
    }
    
    .user-card-actions {
        display: flex;
        gap: 0.5rem;
        justify-content: flex-end;
        position: relative;
        z-index: 1;
    }
    
    .pagination-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.5rem;
        margin-top: 2rem;
    }
    
    .pagination-btn {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid var(--glass-border);
        border-radius: 8px;
        color: white;
        padding: 0.5rem 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 500;
    }
    
    .pagination-btn:hover:not(:disabled) {
        background: var(--primary-gradient);
        border-color: transparent;
    }
    
    .pagination-btn.active {
        background: var(--primary-gradient);
        border-color: transparent;
    }
    
    .pagination-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }
    
    .pagination-info {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.875rem;
        padding: 0 1rem;
    }
    
    .no-results {
        text-align: center;
        padding: 3rem;
        color: rgba(255, 255, 255, 0.6);
        font-size: 1rem;
    }
    
    .loading {
        text-align: center;
        padding: 3rem;
        color: rgba(255, 255, 255, 0.7);
    }
    
    .loading i {
        font-size: 2rem;
        animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        flex-wrap: wrap;
        gap: 1rem;
    }
    
    .page-title {
        font-size: 1.75rem;
        font-weight: 700;
        margin: 0;
    }
    
    .page-subtitle {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.9375rem;
        margin-top: 0.5rem;
    }
    
    .add-user-btn {
        background: var(--primary-gradient);
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }
    
    .add-user-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        color: white;
    }
    
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
    
    #data_table {
        width: 100% !important;
        border-collapse: separate;
        border-spacing: 0;
        margin: 0 !important;
    }
    
    #data_table thead th {
        background: rgba(102, 126, 234, 0.2) !important;
        color: white !important;
        font-weight: 600;
        padding: 1rem;
        border: none !important;
        text-align: left;
        border-bottom: 2px solid rgba(102, 126, 234, 0.3) !important;
    }
    
    #data_table thead th:first-child {
        border-radius: 12px 0 0 0;
    }
    
    #data_table thead th:last-child {
        border-radius: 0 12px 0 0;
    }
    
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter {
        margin-bottom: 1rem;
    }
    
    .dataTables_wrapper .dataTables_filter {
        text-align: right;
    }
    
    .dataTables_wrapper > div:first-child {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 1rem;
    }
    
    .dataTables_wrapper .dataTables_length {
        margin-bottom: 0;
    }
    
    .dataTables_wrapper .dataTables_filter {
        margin-bottom: 0;
        text-align: left;
    }
    
    .dataTables_wrapper > div:last-child {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
        margin-top: 1rem;
    }
    
    table.dataTable.no-footer {
        border-bottom: none !important;
    }
    
    .dataTables_wrapper .dataTables_processing {
        background: rgba(102, 126, 234, 0.2);
        color: white;
        border: 1px solid var(--glass-border);
        border-radius: 12px;
    }
    
    #data_table tbody td {
        padding: 1rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        color: rgba(255, 255, 255, 0.9);
    }
    
    #data_table tbody tr {
        transition: all 0.3s ease;
    }
    
    #data_table tbody tr:hover {
        background: rgba(102, 126, 234, 0.1);
    }
    
    .avatar-cell img {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid rgba(102, 126, 234, 0.3);
    }
    
    .badge {
        padding: 0.375rem 0.75rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.75rem;
        text-transform: uppercase;
    }
    
    .badge-admin {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
    
    /* Role Badges */
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
    
    .role-badge i {
        font-size: 0.75rem;
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
    
    .badge-active {
        background: rgba(34, 197, 94, 0.2);
        color: #4ade80;
        border: 1px solid rgba(34, 197, 94, 0.3);
    }
    
    .badge-new {
        background: rgba(59, 130, 246, 0.2);
        color: #60a5fa;
        border: 1px solid rgba(59, 130, 246, 0.3);
    }
    
    .badge-inactive {
        background: rgba(251, 146, 60, 0.2);
        color: #fb923c;
        border: 1px solid rgba(251, 146, 60, 0.3);
    }
    
    .badge-blocked {
        background: rgba(239, 68, 68, 0.2);
        color: #f87171;
        border: 1px solid rgba(239, 68, 68, 0.3);
    }
    
    /* Status indicator dots */
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
    
    .status-new {
        background: rgba(59, 130, 246, 0.2);
        color: #60a5fa;
        border: 1px solid rgba(59, 130, 246, 0.3);
    }
    
    .status-new::before {
        background: #60a5fa;
        box-shadow: 0 0 8px rgba(59, 130, 246, 0.6);
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
    
    .action-btn-view {
        background: rgba(59, 130, 246, 0.2);
        color: #60a5fa;
    }
    
    .action-btn-view:hover {
        background: rgba(59, 130, 246, 0.3);
        transform: scale(1.1);
    }
    
    .action-btn-edit {
        background: rgba(234, 179, 8, 0.2);
        color: #fbbf24;
    }
    
    .action-btn-edit:hover {
        background: rgba(234, 179, 8, 0.3);
        transform: scale(1.1);
    }
    
    .action-btn-delete {
        background: rgba(239, 68, 68, 0.2);
        color: #f87171;
    }
    
    .action-btn-delete:hover {
        background: rgba(239, 68, 68, 0.3);
        transform: scale(1.1);
    }
    
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid var(--glass-border);
        border-radius: 8px;
        color: white !important;
        padding: 0.5rem 1rem;
        margin: 0 0.25rem;
    }
    
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: var(--primary-gradient) !important;
        border-color: transparent !important;
        color: white !important;
    }
    
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: var(--primary-gradient) !important;
        border-color: transparent !important;
        color: white !important;
    }
    
    .dataTables_wrapper .dataTables_length label,
    .dataTables_wrapper .dataTables_filter label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 500;
    }
    
    .dataTables_wrapper .dataTables_info {
        padding-top: 1rem;
    }
    
    .dataTables_wrapper .dataTables_paginate {
        padding-top: 1rem;
    }
    
    table.dataTable {
        border-collapse: separate !important;
        border-spacing: 0 !important;
    }
    
    table.dataTable tbody tr {
        background: transparent;
    }
    
    .dataTables_wrapper .dataTables_length select:focus,
    .dataTables_wrapper .dataTables_filter input:focus {
        outline: none;
        border-color: rgba(102, 126, 234, 0.5);
    }
    
    @media (max-width: 1024px) {
        .accounts-grid {
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.25rem;
        }
        
        .user-card {
            padding: 1.25rem;
        }
    }
    
    @media (max-width: 768px) {
        .controls-bar {
            flex-direction: column;
        }
        
        .search-box,
        .filter-box select {
            width: 100%;
            min-width: 100%;
        }
        
        .accounts-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }
        
        .user-card {
            padding: 1.25rem;
        }
        
        .user-card-avatar {
            width: 55px;
            height: 55px;
        }
        
        .user-card-name {
            font-size: 1.0625rem;
        }
        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .page-title {
            font-size: 1.5rem;
        }
        
        .page-subtitle {
            font-size: 0.875rem;
        }
        
        .add-user-btn {
            width: 100%;
            justify-content: center;
            padding: 0.875rem 1.5rem;
        }
        
        .modern-card {
            padding: 1rem;
            border-radius: 12px;
        }
        
        .table-container {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        
        #data_table {
            min-width: 600px;
        }
        
        #data_table thead th,
        #data_table tbody td {
            padding: 0.75rem 0.5rem;
            font-size: 0.875rem;
        }
        
        .action-btn {
            width: 32px;
            height: 32px;
            font-size: 0.875rem;
        }
        
        .badge {
            font-size: 0.6875rem;
            padding: 0.25rem 0.5rem;
        }
        
        .avatar-cell img {
            width: 40px;
            height: 40px;
        }
        
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter {
            font-size: 0.875rem;
        }
        
        .dataTables_wrapper .dataTables_filter input,
        .dataTables_wrapper .dataTables_length select {
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
        }
        
        .dataTables_wrapper > div:first-child {
            flex-direction: column;
            align-items: stretch;
        }
        
        .dataTables_wrapper .dataTables_filter {
            text-align: left;
        }
        
        .dataTables_wrapper > div:last-child {
            flex-direction: column;
            align-items: center;
            gap: 0.75rem;
        }
        
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_paginate {
            font-size: 0.875rem;
        }
        
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
        }
    }
    
    @media (max-width: 480px) {
        .page-title {
            font-size: 1.25rem;
        }
        
        .page-subtitle {
            font-size: 0.8125rem;
        }
        
        .modern-card {
            padding: 0.75rem;
            border-radius: 12px;
        }
        
        #data_table {
            min-width: 550px;
        }
        
        #data_table thead th,
        #data_table tbody td {
            padding: 0.625rem 0.375rem;
            font-size: 0.8125rem;
        }
        
        .action-btn {
            width: 30px;
            height: 30px;
            font-size: 0.8125rem;
            margin: 0 0.125rem;
        }
        
        .badge {
            font-size: 0.625rem;
            padding: 0.25rem 0.375rem;
        }
        
        .avatar-cell img {
            width: 35px;
            height: 35px;
        }
        
        .add-user-btn {
            font-size: 0.9375rem;
            padding: 0.75rem 1.25rem;
        }
        
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.25rem 0.5rem;
            font-size: 0.8125rem;
            margin: 0 0.125rem;
        }
    }
</style>
@endsection

@section('content')

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Account Manager</h1>
            <p class="page-subtitle">Manage your client accounts from an administrative and operational perspective</p>
        </div>
        <a href="{{ url('dashboard/accounts/create') }}" class="add-user-btn">
            <i class="fas fa-plus"></i> Add New User
        </a>
    </div>

    <!-- Search and Filter Controls -->
    <div class="controls-bar">
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" id="searchInput" placeholder="Search accounts...">
        </div>
        <div class="filter-box">
            <select id="filterType">
                <option value="">All Types</option>
                <option value="admin">Admin</option>
                <option value="student">Student</option>
                <option value="academy">Academy</option>
                <option value="center">Center</option>
            </select>
        </div>
        <div class="filter-box">
            <select id="filterStatus">
                <option value="">All Status</option>
                <option value="active">Active</option>
                <option value="new">New</option>
                <option value="inactive">Inactive</option>
                <option value="blocked">Blocked</option>
            </select>
        </div>
    </div>

    <!-- User Cards Grid -->
    <div id="accountsGrid" class="accounts-grid">
        <!-- Cards will be loaded here via JavaScript -->
    </div>

    <!-- Pagination -->
    <div class="pagination-container" id="paginationContainer">
        <!-- Pagination will be loaded here -->
    </div>
    
  @endsection


  @section('js')
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      <script type="text/javascript">
        let allAccounts = [];
        let currentPage = 1;
        let itemsPerPage = 12;
        
        $(document).ready(function() {
            loadAccounts();
            
            // Search functionality
            $('#searchInput').on('input', function() {
                currentPage = 1;
                filterAndRenderAccounts();
            });
            
            // Filter functionality
            $('#filterType, #filterStatus').on('change', function() {
                currentPage = 1;
                filterAndRenderAccounts();
            });
        });
        
        function loadAccounts() {
            $('#accountsGrid').html('<div class="loading"><i class="fas fa-spinner"></i><p>Loading accounts...</p></div>');
            
            $.ajax({
                url: '{!! url('dashboard/datatables/getAccounts') !!}',
                type: 'GET',
                data: {
                    length: 1000, // Get all accounts
                    start: 0
                },
                success: function(response) {
                    allAccounts = response.data || [];
                    filterAndRenderAccounts();
                },
                error: function() {
                    $('#accountsGrid').html('<div class="no-results"><i class="fas fa-exclamation-circle"></i><p>Failed to load accounts</p></div>');
                }
            });
        }
        
        function filterAndRenderAccounts() {
            const searchTerm = $('#searchInput').val().toLowerCase();
            const filterType = $('#filterType').val().toLowerCase();
            const filterStatus = $('#filterStatus').val().toLowerCase();
            
            let filtered = allAccounts.filter(account => {
                const matchesSearch = !searchTerm || 
                    (account.name && account.name.toLowerCase().includes(searchTerm)) ||
                    (account.summary && account.summary.toLowerCase().includes(searchTerm));
                
                const matchesType = !filterType || 
                    (account.role && account.role.toLowerCase().includes(filterType));
                
                const matchesStatus = !filterStatus || 
                    (account.status && account.status.toLowerCase().includes(filterStatus));
                
                return matchesSearch && matchesType && matchesStatus;
            });
            
            renderAccounts(filtered);
            renderPagination(filtered.length);
        }
        
        function renderAccounts(accounts) {
            const grid = $('#accountsGrid');
            
            if (accounts.length === 0) {
                grid.html('<div class="no-results"><i class="fas fa-users-slash"></i><p>No accounts found</p></div>');
                return;
            }
            
            const start = (currentPage - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            const pageAccounts = accounts.slice(start, end);
            
            let html = '';
            pageAccounts.forEach(account => {
                html += createAccountCard(account);
            });
            
            grid.html(html);
        }
        
        function createAccountCard(account) {
            // Extract data from account object
            const avatarMatch = account.avatar ? account.avatar.match(/src="([^"]+)"/) : null;
            const avatarUrl = avatarMatch ? avatarMatch[1] : '';
            
            const name = account.name || 'Unknown';
            const roleHtml = account.role || '';
            const statusHtml = account.status || '';
            const summary = account.summary || 'No description available';
            
            // Extract role text and determine role class
            const roleText = roleHtml.replace(/<[^>]*>/g, '').trim().toLowerCase();
            let roleClass = 'role-student';
            let roleLabel = 'Student';
            let roleIcon = 'fa-user-graduate';
            
            if (roleText.includes('admin')) {
                roleClass = 'role-admin';
                roleLabel = 'Admin';
                roleIcon = 'fa-user-shield';
            } else if (roleText.includes('student')) {
                roleClass = 'role-student';
                roleLabel = 'Student';
                roleIcon = 'fa-user-graduate';
            } else if (roleText.includes('academy')) {
                roleClass = 'role-academy';
                roleLabel = 'Academy';
                roleIcon = 'fa-school';
            } else if (roleText.includes('center')) {
                roleClass = 'role-center';
                roleLabel = 'Center';
                roleIcon = 'fa-building';
            }
            
            // Extract status text and determine status class
            const statusText = statusHtml.replace(/<[^>]*>/g, '').trim().toLowerCase();
            let statusClass = 'status-active';
            let statusLabel = 'Active';
            
            if (statusText.includes('new')) {
                statusClass = 'status-new';
                statusLabel = 'New';
            } else if (statusText.includes('inactive')) {
                statusClass = 'status-inactive';
                statusLabel = 'Inactive';
            } else if (statusText.includes('blocked')) {
                statusClass = 'status-blocked';
                statusLabel = 'Blocked';
            } else if (statusText.includes('active')) {
                statusClass = 'status-active';
                statusLabel = 'Active';
            }
            
            // Extract action URLs
            const actionsHtml = account.actions || '';
            const viewMatch = actionsHtml.match(/href="([^"]*accounts\/\d+)"/);
            const editMatch = actionsHtml.match(/href="([^"]*accounts\/\d+\/edit)"/);
            const deleteMatch = actionsHtml.match(/delete-account-(\d+)/);
            
            const viewUrl = viewMatch ? viewMatch[1] : '#';
            const editUrl = editMatch ? editMatch[1] : '#';
            const accountId = deleteMatch ? deleteMatch[1] : '';
            
            return `
                <div class="user-card">
                    <div class="user-card-header">
                        <img src="${avatarUrl}" alt="${name}" class="user-card-avatar">
                        <div class="user-card-info">
                            <div class="user-card-name">${name}</div>
                            <span class="role-badge ${roleClass}">
                                <i class="fas ${roleIcon}"></i>
                                ${roleLabel}
                            </span>
                        </div>
                    </div>
                    <div class="user-card-body">
                        <div class="user-card-about">${summary.replace(/<[^>]*>/g, '')}</div>
                        <div class="user-card-meta">
                            <span class="status-badge ${statusClass}">${statusLabel}</span>
                        </div>
                    </div>
                    <div class="user-card-actions">
                        <a href="${viewUrl}" class="action-btn action-btn-view" title="View">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="${editUrl}" class="action-btn action-btn-edit" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        ${accountId ? `
                        <button onclick="confirmDelete(${accountId})" class="action-btn action-btn-delete" title="Delete">
                            <i class="fas fa-trash"></i>
                        </button>
                        ` : ''}
                    </div>
                </div>
            `;
        }
        
        function renderPagination(totalItems) {
            const totalPages = Math.ceil(totalItems / itemsPerPage);
            const container = $('#paginationContainer');
            
            if (totalPages <= 1) {
                container.html('');
                return;
            }
            
            let html = `
                <button class="pagination-btn" onclick="changePage(${currentPage - 1})" ${currentPage === 1 ? 'disabled' : ''}>
                    <i class="fas fa-chevron-left"></i>
                </button>
            `;
            
            // Show page numbers
            for (let i = 1; i <= totalPages; i++) {
                if (i === 1 || i === totalPages || (i >= currentPage - 1 && i <= currentPage + 1)) {
                    html += `
                        <button class="pagination-btn ${i === currentPage ? 'active' : ''}" onclick="changePage(${i})">
                            ${i}
                        </button>
                    `;
                } else if (i === currentPage - 2 || i === currentPage + 2) {
                    html += '<span class="pagination-info">...</span>';
                }
            }
            
            html += `
                <button class="pagination-btn" onclick="changePage(${currentPage + 1})" ${currentPage === totalPages ? 'disabled' : ''}>
                    <i class="fas fa-chevron-right"></i>
                </button>
            `;
            
            container.html(html);
        }
        
        function changePage(page) {
            const totalPages = Math.ceil(allAccounts.length / itemsPerPage);
            if (page < 1 || page > totalPages) return;
            
            currentPage = page;
            filterAndRenderAccounts();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

           
 function confirmDelete(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "This Account will be permanently deleted!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "Cancel"
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-account-' + id).submit();
        }
    });
}

     </script>

  @endsection