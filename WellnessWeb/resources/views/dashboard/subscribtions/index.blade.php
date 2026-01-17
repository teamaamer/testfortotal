@extends('layouts.dashboard.modern')

@section('title', 'Newsletter Subscriptions')

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
    
    .stats-bar {
        display: flex;
        gap: 1rem;
        margin-bottom: 1.5rem;
        flex-wrap: wrap;
    }
    
    .stat-card {
        flex: 1;
        min-width: 200px;
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }
    
    .stat-icon {
        width: 50px;
        height: 50px;
        background: var(--primary-gradient);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
    }
    
    .stat-info h3 {
        font-size: 1.75rem;
        font-weight: 700;
        color: white;
        margin: 0 0 0.25rem 0;
    }
    
    .stat-info p {
        font-size: 0.875rem;
        color: rgba(255, 255, 255, 0.7);
        margin: 0;
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
    
    .subscriptions-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1.25rem;
    }
    
    .subscription-card {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 1.5rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .subscription-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--primary-gradient);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .subscription-card:hover {
        background: rgba(255, 255, 255, 0.08);
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
    }
    
    .subscription-card:hover::before {
        opacity: 1;
    }
    
    .subscription-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.2), rgba(118, 75, 162, 0.2));
        border: 1px solid rgba(102, 126, 234, 0.3);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: #667eea;
        margin-bottom: 1rem;
    }
    
    .subscription-email {
        font-size: 1rem;
        font-weight: 600;
        color: white;
        margin-bottom: 0.5rem;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    
    .subscription-date {
        font-size: 0.8125rem;
        color: rgba(255, 255, 255, 0.6);
        display: flex;
        align-items: center;
        gap: 0.375rem;
    }
    
    .no-subscriptions {
        text-align: center;
        padding: 4rem 1rem;
        color: rgba(255, 255, 255, 0.6);
    }
    
    .no-subscriptions i {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }
    
    .no-subscriptions p {
        font-size: 1.125rem;
    }
    
    @media (max-width: 768px) {
        .subscriptions-grid {
            grid-template-columns: 1fr;
        }
        
        .stats-bar {
            flex-direction: column;
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
            <h1>Newsletter Subscriptions</h1>
            <p>Manage newsletter subscriber emails</p>
        </div>
    </div>

    <!-- Stats Bar -->
    <div class="stats-bar">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-envelope"></i>
            </div>
            <div class="stat-info">
                <h3 id="total-count">0</h3>
                <p>Total Subscribers</p>
            </div>
        </div>
    </div>

    <!-- Controls Bar -->
    <div class="controls-bar">
        <div class="search-box">
            <i class="fas fa-search search-icon"></i>
            <input type="text" id="subscription-search" class="search-input" placeholder="Search by email...">
        </div>
    </div>

    <!-- Subscriptions Grid -->
    <div id="subscriptions-container" class="subscriptions-grid">
        <!-- Subscriptions will be loaded here via JavaScript -->
    </div>
    
    <div id="no-subscriptions" class="no-subscriptions" style="display: none;">
        <i class="fas fa-envelope-open"></i>
        <p>No newsletter subscriptions found</p>
    </div>
    
@endsection


@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script type="text/javascript">
        let allSubscriptions = [];
        
        $(document).ready(function() {
            loadSubscriptions();
            
            // Search functionality
            $('#subscription-search').on('input', function() {
                filterSubscriptions();
            });
        });
        
        function loadSubscriptions() {
            $.ajax({
                url: '{!! url('dashboard/datatables/getSubscribtions') !!}',
                type: 'GET',
                data: {
                    start: 0,
                    length: 1000
                },
                success: function(response) {
                    if (response.data && response.data.length > 0) {
                        allSubscriptions = response.data;
                        displaySubscriptions(allSubscriptions);
                        updateStats(allSubscriptions.length);
                    } else {
                        allSubscriptions = [];
                        showNoSubscriptions();
                        updateStats(0);
                    }
                },
                error: function() {
                    console.error('Failed to load subscriptions');
                    updateStats(0);
                }
            });
        }
        
        function filterSubscriptions() {
            const searchTerm = $('#subscription-search').val().toLowerCase();
            
            if (!searchTerm) {
                displaySubscriptions(allSubscriptions);
                return;
            }
            
            const filtered = allSubscriptions.filter(function(sub) {
                return sub.email.toLowerCase().includes(searchTerm);
            });
            
            displaySubscriptions(filtered);
        }
        
        function displaySubscriptions(subscriptions) {
            const container = $('#subscriptions-container');
            const noSubscriptions = $('#no-subscriptions');
            
            if (subscriptions.length > 0) {
                container.empty();
                noSubscriptions.hide();
                
                subscriptions.forEach(function(sub) {
                    const card = createSubscriptionCard(sub);
                    container.append(card);
                });
            } else {
                showNoSubscriptions();
            }
        }
        
        function showNoSubscriptions() {
            $('#subscriptions-container').empty();
            $('#no-subscriptions').show();
        }
        
        function updateStats(count) {
            $('#total-count').text(count);
        }
        
        function createSubscriptionCard(subscription) {
            // Format date if available
            let dateInfo = '';
            if (subscription.created_at) {
                const date = new Date(subscription.created_at);
                dateInfo = `
                    <div class="subscription-date">
                        <i class="far fa-calendar"></i>
                        ${date.toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' })}
                    </div>
                `;
            }
            
            return `
                <div class="subscription-card">
                    <div class="subscription-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="subscription-email" title="${subscription.email}">${subscription.email}</div>
                    ${dateInfo}
                </div>
            `;
        }
    </script>
@endsection
