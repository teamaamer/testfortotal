@extends('layouts.dashboard.modern')

@section('title', 'Contact Requests')

@section('css')
<link href='https://fonts.googleapis.com/css?family=Lato:300,400,600,700' rel='stylesheet' type='text/css'>
<style>
    * {
        font-family: 'Lato', sans-serif;
    }
    
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 1.5rem;
        gap: 1rem;
        flex-wrap: wrap;
    }
    
    .page-header-left h1 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.25rem;
    }
    
    .page-header-left p {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.875rem;
    }
    
    .controls-bar {
        display: flex;
        gap: 1rem;
        margin-bottom: 1.5rem;
        flex-wrap: wrap;
        align-items: center;
    }
    
    .search-box {
        flex: 1;
        min-width: 250px;
        max-width: 400px;
        position: relative;
    }
    
    .search-input {
        width: 100%;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid var(--glass-border);
        border-radius: 10px;
        padding: 0.625rem 1rem 0.625rem 2.5rem;
        color: white;
        font-size: 0.875rem;
        transition: all 0.3s ease;
    }
    
    .search-input:focus {
        outline: none;
        border-color: rgba(102, 126, 234, 0.5);
        background: rgba(255, 255, 255, 0.15);
    }
    
    .search-input::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }
    
    .search-icon {
        position: absolute;
        left: 0.875rem;
        top: 50%;
        transform: translateY(-50%);
        color: rgba(255, 255, 255, 0.5);
        pointer-events: none;
    }
    
    .filter-select {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid var(--glass-border);
        border-radius: 10px;
        padding: 0.625rem 2.5rem 0.625rem 1rem;
        color: white;
        font-size: 0.875rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        min-width: 180px;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23ffffff' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 12px;
    }
    
    .filter-select:hover {
        background: rgba(255, 255, 255, 0.15);
        border-color: rgba(102, 126, 234, 0.4);
    }
    
    .filter-select:focus {
        outline: none;
        border-color: rgba(102, 126, 234, 0.5);
        background: rgba(255, 255, 255, 0.15);
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }
    
    .filter-select option {
        background: #1e1e2e;
        color: white;
        padding: 0.75rem 1rem;
        font-weight: 500;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }
    
    .filter-select option:hover {
        background: rgba(102, 126, 234, 0.3);
    }
    
    .filter-select option:checked {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        font-weight: 600;
    }
    
    .filter-select option[value=""] {
        font-weight: 600;
    }
    
    /* Custom Dropdown */
    .custom-dropdown {
        position: relative;
        min-width: 180px;
    }
    
    .custom-dropdown-toggle {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid var(--glass-border);
        border-radius: 10px;
        padding: 0.625rem 2.5rem 0.625rem 1rem;
        color: white;
        font-size: 0.875rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        user-select: none;
    }
    
    .custom-dropdown-toggle:hover {
        background: rgba(255, 255, 255, 0.15);
        border-color: rgba(102, 126, 234, 0.4);
    }
    
    .custom-dropdown-toggle.active {
        border-color: rgba(102, 126, 234, 0.5);
        background: rgba(255, 255, 255, 0.15);
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }
    
    .custom-dropdown-arrow {
        width: 12px;
        height: 12px;
        transition: transform 0.3s ease;
    }
    
    .custom-dropdown-toggle.active .custom-dropdown-arrow {
        transform: rotate(180deg);
    }
    
    .custom-dropdown-menu {
        position: absolute;
        top: calc(100% + 0.5rem);
        left: 0;
        right: 0;
        background: rgba(30, 30, 46, 0.98);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(102, 126, 234, 0.3);
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
        padding: 0.5rem;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.3s ease;
        z-index: 1000;
        max-height: 300px;
        overflow-y: auto;
    }
    
    .custom-dropdown-menu.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }
    
    .custom-dropdown-item {
        padding: 0.75rem 1rem;
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.875rem;
        font-weight: 500;
        cursor: pointer;
        border-radius: 8px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .custom-dropdown-item:hover {
        background: rgba(102, 126, 234, 0.2);
        color: white;
    }
    
    .custom-dropdown-item.selected {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        font-weight: 600;
    }
    
    .custom-dropdown-item i {
        width: 16px;
        font-size: 0.875rem;
    }
    
    .custom-dropdown-item .checkmark {
        margin-left: auto;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .custom-dropdown-item.selected .checkmark {
        opacity: 1;
    }
    
    .requests-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 1.25rem;
    }
    
    .request-card {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 1.5rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .request-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .request-card.type-trade_in::before {
        background: linear-gradient(90deg, #ef4444, #dc2626);
    }
    
    .request-card.type-support::before {
        background: linear-gradient(90deg, #3b82f6, #2563eb);
    }
    
    .request-card.type-contact::before {
        background: linear-gradient(90deg, #06b6d4, #0891b2);
    }
    
    .request-card:hover {
        background: rgba(255, 255, 255, 0.08);
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
    }
    
    .request-card:hover::before {
        opacity: 1;
    }
    
    .request-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .request-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        overflow: hidden;
        border: 2px solid rgba(102, 126, 234, 0.3);
        flex-shrink: 0;
    }
    
    .request-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .request-info {
        flex: 1;
        min-width: 0;
    }
    
    .request-name {
        font-size: 1rem;
        font-weight: 600;
        color: white;
        margin-bottom: 0.25rem;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    
    .request-type {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 6px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
    }
    
    .type-trade_in {
        background: rgba(239, 68, 68, 0.2);
        color: #f87171;
        border: 1px solid rgba(239, 68, 68, 0.3);
    }
    
    .type-support {
        background: rgba(59, 130, 246, 0.2);
        color: #60a5fa;
        border: 1px solid rgba(59, 130, 246, 0.3);
    }
    
    .type-contact {
        background: rgba(6, 182, 212, 0.2);
        color: #22d3ee;
        border: 1px solid rgba(6, 182, 212, 0.3);
    }
    
    .request-message {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.875rem;
        line-height: 1.6;
        margin-bottom: 1rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .request-actions {
        display: flex;
        gap: 0.5rem;
    }
    
    .action-btn {
        flex: 1;
        padding: 0.625rem 1rem;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.875rem;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }
    
    .action-btn-view {
        background: var(--primary-gradient);
        color: white;
    }
    
    .action-btn-view:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        color: white;
    }
    
    .no-requests {
        text-align: center;
        padding: 4rem 1rem;
        color: rgba(255, 255, 255, 0.6);
    }
    
    .no-requests i {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }
    
    .no-requests p {
        font-size: 1.125rem;
    }
    
    @media (max-width: 768px) {
        .requests-grid {
            grid-template-columns: 1fr;
        }
        
        .controls-bar {
            flex-direction: column;
            align-items: stretch;
        }
        
        .search-box {
            max-width: 100%;
        }
    }
</style>
@endsection

@section('content')

    <!-- Page Header -->
    <div class="page-header">
        <div class="page-header-left">
            <h1>Contact & Inquiry Requests</h1>
            <p>View and manage incoming contact inquiries</p>
        </div>
    </div>

    <!-- Controls Bar -->
    <div class="controls-bar">
        <div class="search-box">
            <i class="fas fa-search search-icon"></i>
            <input type="text" id="request-search" class="search-input" placeholder="Search by name or message...">
        </div>
        <div class="custom-dropdown" id="type-filter-dropdown">
            <div class="custom-dropdown-toggle">
                <span id="selected-type">All Types</span>
                <svg class="custom-dropdown-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12">
                    <path fill="currentColor" d="M6 9L1 4h10z"/>
                </svg>
            </div>
            <div class="custom-dropdown-menu">
                <div class="custom-dropdown-item selected" data-value="">
                    <i class="fas fa-check-circle"></i>
                    <span>All Types</span>
                    <i class="fas fa-check checkmark"></i>
                </div>
                <div class="custom-dropdown-item" data-value="trade_in">
                    <i class="fas fa-exchange-alt"></i>
                    <span>Trade In</span>
                    <i class="fas fa-check checkmark"></i>
                </div>
                <div class="custom-dropdown-item" data-value="support">
                    <i class="fas fa-headset"></i>
                    <span>Support</span>
                    <i class="fas fa-check checkmark"></i>
                </div>
                <div class="custom-dropdown-item" data-value="contact">
                    <i class="fas fa-envelope"></i>
                    <span>Contact</span>
                    <i class="fas fa-check checkmark"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Requests Grid -->
    <div id="requests-container" class="requests-grid">
        <!-- Requests will be loaded here via JavaScript -->
    </div>
    
    <div id="no-requests" class="no-requests" style="display: none;">
        <i class="fas fa-inbox"></i>
        <p>No contact requests found</p>
    </div>
    
@endsection


@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script type="text/javascript">
        let allRequests = [];
        let currentTypeFilter = '';
        
        $(document).ready(function() {
            loadRequests();
            initCustomDropdown();
            
            // Search functionality
            $('#request-search').on('input', function() {
                filterRequests();
            });
        });
        
        // Custom Dropdown Functionality
        function initCustomDropdown() {
            const dropdown = $('#type-filter-dropdown');
            const toggle = dropdown.find('.custom-dropdown-toggle');
            const menu = dropdown.find('.custom-dropdown-menu');
            const items = dropdown.find('.custom-dropdown-item');
            const selectedText = $('#selected-type');
            
            // Toggle dropdown
            toggle.on('click', function(e) {
                e.stopPropagation();
                toggle.toggleClass('active');
                menu.toggleClass('show');
            });
            
            // Select item
            items.on('click', function() {
                const value = $(this).data('value');
                const text = $(this).find('span').text();
                
                // Update selected state
                items.removeClass('selected');
                $(this).addClass('selected');
                
                // Update toggle text
                selectedText.text(text);
                
                // Update filter value
                currentTypeFilter = value;
                
                // Close dropdown
                toggle.removeClass('active');
                menu.removeClass('show');
                
                // Apply filter
                filterRequests();
            });
            
            // Close dropdown when clicking outside
            $(document).on('click', function(e) {
                if (!dropdown.is(e.target) && dropdown.has(e.target).length === 0) {
                    toggle.removeClass('active');
                    menu.removeClass('show');
                }
            });
        }
        
        function loadRequests() {
            $.ajax({
                url: '{!! url('dashboard/datatables/getContactRequests') !!}',
                type: 'GET',
                data: {
                    start: 0,
                    length: 100
                },
                success: function(response) {
                    if (response.data && response.data.length > 0) {
                        allRequests = response.data;
                        displayRequests(allRequests);
                    } else {
                        allRequests = [];
                        showNoRequests();
                    }
                },
                error: function() {
                    console.error('Failed to load contact requests');
                }
            });
        }
        
        function filterRequests() {
            const searchTerm = $('#request-search').val().toLowerCase();
            
            let filtered = allRequests;
            
            // Filter by search term
            if (searchTerm) {
                filtered = filtered.filter(function(request) {
                    const name = extractText(request.name).toLowerCase();
                    const message = request.message.toLowerCase();
                    return name.includes(searchTerm) || message.includes(searchTerm);
                });
            }
            
            // Filter by type
            if (currentTypeFilter) {
                filtered = filtered.filter(function(request) {
                    return request.type.toLowerCase().includes(currentTypeFilter);
                });
            }
            
            displayRequests(filtered);
        }
        
        function extractText(html) {
            const temp = document.createElement('div');
            temp.innerHTML = html;
            return temp.textContent || temp.innerText || '';
        }
        
        function displayRequests(requests) {
            const container = $('#requests-container');
            const noRequests = $('#no-requests');
            
            if (requests.length > 0) {
                container.empty();
                noRequests.hide();
                
                requests.forEach(function(request) {
                    const card = createRequestCard(request);
                    container.append(card);
                });
            } else {
                showNoRequests();
            }
        }
        
        function showNoRequests() {
            $('#requests-container').empty();
            $('#no-requests').show();
        }
        
        function createRequestCard(request) {
            // Extract avatar URL from HTML
            let avatarHtml = request.avatar;
            let avatarUrl = '';
            
            if (avatarHtml.includes('<img')) {
                const match = avatarHtml.match(/src=["']([^"']+)["']/);
                if (match && match[1]) {
                    avatarUrl = match[1];
                }
            }
            
            // Extract name from HTML
            const name = extractText(request.name);
            
            // Extract type class
            let typeClass = 'contact';
            const typeHtml = request.type.toLowerCase();
            if (typeHtml.includes('trade')) {
                typeClass = 'trade_in';
            } else if (typeHtml.includes('support')) {
                typeClass = 'support';
            }
            
            // Extract type text
            const typeText = extractText(request.type);
            
            // Extract view URL from actions
            let viewUrl = '#';
            const actionsMatch = request.actions.match(/href=["']([^"']+)["']/);
            if (actionsMatch && actionsMatch[1]) {
                viewUrl = actionsMatch[1];
            }
            
            // Truncate message
            const message = request.message.length > 150 
                ? request.message.substring(0, 150) + '...' 
                : request.message;
            
            return `
                <div class="request-card type-${typeClass}">
                    <div class="request-header">
                        <div class="request-avatar">
                            ${avatarUrl ? `<img src="${avatarUrl}" alt="${name}">` : '<i class="fas fa-user"></i>'}
                        </div>
                        <div class="request-info">
                            <div class="request-name">${name}</div>
                            <span class="request-type type-${typeClass}">${typeText}</span>
                        </div>
                    </div>
                    <div class="request-message">${message}</div>
                    <div class="request-actions">
                        <a href="${viewUrl}" class="action-btn action-btn-view">
                            <i class="fas fa-eye"></i> View Details
                        </a>
                    </div>
                </div>
            `;
        }
    </script>

@endsection