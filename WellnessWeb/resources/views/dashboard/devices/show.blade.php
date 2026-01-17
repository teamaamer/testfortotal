@extends('layouts.dashboard.modern')

@section('title', $device->name)

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

    .back-btn {
        padding: 0.75rem 1.5rem;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid var(--glass-border);
        color: white;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.875rem;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
    }

    .back-btn:hover {
        background: rgba(255, 255, 255, 0.15);
        color: white;
    }

    .device-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
        margin-bottom: 2rem;
    }

    .device-image-section {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 2rem;
    }

    .main-image {
        width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: 12px;
        margin-bottom: 1.5rem;
        background: rgba(255, 255, 255, 0.05);
    }

    .device-info-section {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 2rem;
    }

    .device-title {
        font-size: 2rem;
        font-weight: 700;
        color: white;
        margin-bottom: 1rem;
    }

    .device-status {
        display: inline-block;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
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

    .info-section {
        margin-bottom: 2rem;
    }

    .info-label {
        font-size: 0.875rem;
        color: rgba(255, 255, 255, 0.6);
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
    }

    .info-value {
        font-size: 1rem;
        color: rgba(255, 255, 255, 0.9);
        line-height: 1.6;
    }

    .action-buttons {
        display: flex;
        gap: 1rem;
        padding-top: 2rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .btn-edit {
        flex: 1;
        padding: 0.875rem 1.5rem;
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
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-edit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        color: white;
    }

    .btn-delete {
        flex: 1;
        padding: 0.875rem 1.5rem;
        background: rgba(255, 71, 87, 0.2);
        color: #ff4757;
        border: 1px solid rgba(255, 71, 87, 0.3);
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.875rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-delete:hover {
        background: rgba(255, 71, 87, 0.3);
        transform: translateY(-2px);
    }

    @media (max-width: 968px) {
        .device-container {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <h1>{{ $device->name }}</h1>
        <a href="{{ url('dashboard/devices') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i> Back to Devices
        </a>
    </div>

    <!-- Device Container -->
    <div class="device-container">
        <!-- Image Section -->
        <div class="device-image-section">
            <img src="{{ asset('/uploads/products/' . $device->avatar) }}" alt="{{ $device->name }}" class="main-image">
        </div>

        <!-- Info Section -->
        <div class="device-info-section">
            <h1 class="device-title">{{ $device->name }}</h1>
            
            <span class="device-status {{ $device->status === 'active' ? 'status-active' : 'status-inactive' }}">
                {{ ucfirst($device->status) }}
            </span>

            <div class="info-section">
                <div class="info-label">Description</div>
                <div class="info-value">{{ $device->summary }}</div>
            </div>

            <div class="action-buttons">
                <a href="{{ url('dashboard/devices/' . $device->id . '/edit') }}" class="btn-edit">
                    <i class="fas fa-edit"></i> Edit Device
                </a>
                <button onclick="confirmDelete()" class="btn-delete">
                    <i class="fas fa-trash"></i> Delete Device
                </button>
            </div>

            <form id="delete-form" action="{{ url('dashboard/devices/' . $device->id) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDelete() {
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
            document.getElementById('delete-form').submit();
        }
    });
}
</script>
@endsection
