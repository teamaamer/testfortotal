@extends('layouts.dashboard.modern')

@section('title', 'Devices & Products')

@section('css')
<link href='https://fonts.googleapis.com/css?family=Lato:300,400,600,700' rel='stylesheet' type='text/css'>
<style>
    * {
        font-family: 'Lato', sans-serif;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .page-header h1 {
        font-size: 1.75rem;
        font-weight: 700;
        margin: 0;
    }

    .page-header p {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.875rem;
        margin: 0.25rem 0 0 0;
    }

    .header-actions {
        display: flex;
        gap: 1rem;
        align-items: center;
    }

    .add-device-btn {
        padding: 0.75rem 1.5rem;
        background: var(--primary-gradient);
        color: white;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.875rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .add-device-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        color: white;
    }

    .search-container {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .search-input {
        width: 100%;
        padding: 0.75rem 1rem 0.75rem 2.75rem;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid var(--glass-border);
        border-radius: 10px;
        color: white;
        font-size: 0.875rem;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        outline: none;
        border-color: rgba(102, 126, 234, 0.5);
        background: rgba(255, 255, 255, 0.15);
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .search-input::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }

    .search-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: rgba(255, 255, 255, 0.5);
    }

    .devices-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .device-card {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 1.5rem;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .device-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 40px rgba(102, 126, 234, 0.2);
        border-color: rgba(102, 126, 234, 0.3);
    }

    .device-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 12px;
        margin-bottom: 1rem;
        background: rgba(255, 255, 255, 0.05);
    }

    .device-name {
        font-size: 1.125rem;
        font-weight: 700;
        color: white;
        margin-bottom: 0.5rem;
    }

    .device-description {
        font-size: 0.875rem;
        color: rgba(255, 255, 255, 0.7);
        margin-bottom: 1rem;
        line-height: 1.5;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .device-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 1rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .device-status {
        padding: 0.375rem 0.875rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .status-active {
        background: rgba(46, 213, 115, 0.2);
        color: #2ed573;
        border: 1px solid rgba(46, 213, 115, 0.3);
    }

    .status-inactive {
        background: rgba(255, 71, 87, 0.2);
        color: #ff4757;
        border: 1px solid rgba(255, 71, 87, 0.3);
    }

    .device-actions {
        display: flex;
        gap: 0.5rem;
    }

    .action-btn {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.875rem;
    }

    .btn-view {
        background: rgba(102, 126, 234, 0.2);
        color: #667eea;
    }

    .btn-view:hover {
        background: rgba(102, 126, 234, 0.3);
    }

    .btn-edit {
        background: rgba(52, 172, 224, 0.2);
        color: #34ace0;
    }

    .btn-edit:hover {
        background: rgba(52, 172, 224, 0.3);
    }

    .btn-delete {
        background: rgba(255, 71, 87, 0.2);
        color: #ff4757;
    }

    .btn-delete:hover {
        background: rgba(255, 71, 87, 0.3);
    }

    .no-results {
        text-align: center;
        padding: 3rem;
        color: rgba(255, 255, 255, 0.6);
    }

    .no-results i {
        font-size: 3rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    @media (max-width: 768px) {
        .devices-grid {
            grid-template-columns: 1fr;
        }

        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>
@endsection

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h1>Devices & Products</h1>
            <p>Manage your device and product catalog</p>
        </div>
        <div class="header-actions">
            <a href="{{ url('dashboard/devices/create') }}" class="add-device-btn">
                <i class="fas fa-plus"></i> Add Device
            </a>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="search-container">
        <div style="position: relative;">
            <i class="fas fa-search search-icon"></i>
            <input type="text" id="searchInput" class="search-input" placeholder="Search devices by name or description...">
        </div>
    </div>

    <!-- Devices Grid -->
    <div class="devices-grid" id="devicesGrid">
        <!-- Devices will be loaded here -->
    </div>

    <div id="noResults" class="no-results" style="display: none;">
        <i class="fas fa-inbox"></i>
        <p>No devices found</p>
    </div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
let allDevices = [];

$(function () {
    loadDevices();
    
    // Search functionality
    $('#searchInput').on('keyup', function() {
        const searchTerm = $(this).val().toLowerCase();
        filterDevices(searchTerm);
    });
});

function loadDevices() {
    $.ajax({
        url: '{!! url('dashboard/datatables/getDevices') !!}',
        type: 'GET',
        data: {
            start: 0,
            length: 100
        },
        success: function(response) {
            console.log('Response:', response);
            if (response.data && response.data.length > 0) {
                allDevices = response.data;
                displayDevices(allDevices);
            } else {
                console.log('No devices found in response');
                $('#devicesGrid').hide();
                $('#noResults').show();
            }
        },
        error: function(xhr, status, error) {
            console.error('Error loading devices:', error);
            console.log('XHR:', xhr);
            $('#devicesGrid').hide();
            $('#noResults').show();
        }
    });
}

function displayDevices(devices) {
    const grid = $('#devicesGrid');
    grid.empty();
    
    console.log('Displaying devices:', devices.length);
    
    if (devices.length === 0) {
        grid.hide();
        $('#noResults').show();
        return;
    }
    
    grid.show();
    $('#noResults').hide();
    
    devices.forEach((device, index) => {
        console.log(`Device ${index}:`, device);
        
        const imageUrl = extractImageUrl(device.avatar);
        const deviceName = extractText(device.name);
        const deviceDescription = extractText(device.summary);
        const deviceStatus = extractStatus(device.status);
        const deviceId = extractId(device.actions);
        
        console.log(`Extracted - ID: ${deviceId}, Name: ${deviceName}, Image: ${imageUrl}, Status: ${deviceStatus}`);
        
        const card = `
            <div class="device-card" data-name="${deviceName.toLowerCase()}" data-description="${deviceDescription.toLowerCase()}">
                <img src="${imageUrl}" alt="${deviceName}" class="device-image" onerror="this.src='${baseUrl}/uploads/products/device1.webp'">
                <h3 class="device-name">${deviceName}</h3>
                <p class="device-description">${deviceDescription}</p>
                <div class="device-footer">
                    <span class="device-status ${deviceStatus === 'active' ? 'status-active' : 'status-inactive'}">
                        ${deviceStatus.charAt(0).toUpperCase() + deviceStatus.slice(1)}
                    </span>
                    <div class="device-actions">
                        <a href="${baseUrl}/dashboard/devices/${deviceId}" class="action-btn btn-view" title="View">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="${baseUrl}/dashboard/devices/${deviceId}/edit" class="action-btn btn-edit" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button onclick="confirmDelete(${deviceId})" class="action-btn btn-delete" title="Delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
                <form id="delete-device-${deviceId}" action="${baseUrl}/dashboard/devices/${deviceId}" method="POST" style="display: none;">
                    <input type="hidden" name="_token" value="${csrfToken}">
                    <input type="hidden" name="_method" value="DELETE">
                </form>
            </div>
        `;
        
        grid.append(card);
    });
    
    console.log('Cards appended to grid');
}

function filterDevices(searchTerm) {
    if (!searchTerm) {
        displayDevices(allDevices);
        return;
    }
    
    const filtered = allDevices.filter(device => {
        const name = extractText(device.name).toLowerCase();
        const description = extractText(device.summary).toLowerCase();
        return name.includes(searchTerm) || description.includes(searchTerm);
    });
    
    displayDevices(filtered);
}

function extractImageUrl(html) {
    const match = html.match(/src="([^"]+)"/);
    return match ? match[1] : '/uploads/products/device1.webp';
}

function extractText(html) {
    const temp = document.createElement('div');
    temp.innerHTML = html;
    return temp.textContent || temp.innerText || '';
}

function extractStatus(html) {
    const temp = document.createElement('div');
    temp.innerHTML = html;
    return (temp.textContent || temp.innerText || '').toLowerCase().trim();
}

function extractId(html) {
    const match = html.match(/devices\/(\d+)/);
    return match ? match[1] : '';
}

function confirmDelete(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "This device will be permanently deleted",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ff4757",
        cancelButtonColor: "#667eea",
        confirmButtonText: "Delete",
        cancelButtonText: "Cancel",
        background: 'rgba(42, 42, 62, 0.95)',
        color: '#fff',
        backdrop: 'rgba(0, 0, 0, 0.8)'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-device-' + id).submit();
        }
    });
}

const baseUrl = '{{ url('') }}';
const csrfToken = '{{ csrf_token() }}';
</script>
@endsection
