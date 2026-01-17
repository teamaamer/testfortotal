@extends('layouts.dashboard.modern')

@section('title', isset($device) ? 'Edit Device' : 'Add New Device')

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
    
    .back-btn {
        padding: 0.625rem 1.5rem;
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
    
    .form-card {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 2rem;
        margin-bottom: 1.5rem;
    }
    
    .form-section-title {
        font-size: 1.125rem;
        font-weight: 700;
        color: white;
        margin-bottom: 1.5rem;
        padding-bottom: 0.75rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .form-section-title i {
        color: rgba(102, 126, 234, 0.8);
        font-size: 1rem;
    }
    
    .section-description {
        color: rgba(255, 255, 255, 0.6);
        font-size: 0.8125rem;
        margin-top: -1rem;
        margin-bottom: 1.5rem;
    }
    
    .image-upload-section {
        text-align: center;
        margin-bottom: 2rem;
    }
    
    .image-preview-container {
        position: relative;
        width: 100%;
        max-width: 400px;
        margin: 0 auto 1.5rem;
        border-radius: 12px;
        overflow: hidden;
        border: 2px dashed rgba(102, 126, 234, 0.3);
        background: rgba(255, 255, 255, 0.05);
    }
    
    #imagePreview {
        width: 100%;
        height: 300px;
        object-fit: cover;
        display: block;
    }
    
    .upload-btn-wrapper {
        position: relative;
        display: inline-block;
    }
    
    .upload-btn {
        padding: 0.75rem 2rem;
        background: var(--primary-gradient);
        color: white;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.875rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .upload-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
    }
    
    .upload-btn-wrapper input[type=file] {
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-group label {
        display: block;
        color: rgba(255, 255, 255, 0.9);
        font-weight: 600;
        font-size: 0.875rem;
        margin-bottom: 0.5rem;
    }
    
    .form-control,
    .form-control:focus,
    select.form-control,
    select.form-control:focus,
    textarea.form-control,
    textarea.form-control:focus {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid var(--glass-border);
        border-radius: 10px;
        padding: 0.75rem 1rem;
        color: white;
        font-size: 0.875rem;
        transition: all 0.3s ease;
        font-family: 'Lato', sans-serif;
        width: 100%;
    }
    
    .form-control:focus,
    select.form-control:focus,
    textarea.form-control:focus {
        outline: none;
        border-color: rgba(102, 126, 234, 0.5);
        background: rgba(255, 255, 255, 0.15);
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }
    
    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }
    
    select.form-control option {
        background: #2a2a3e;
        color: white;
    }
    
    .form-actions {
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
        padding-top: 1.5rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .btn-submit {
        padding: 0.75rem 2.5rem;
        background: var(--primary-gradient);
        color: white;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.875rem;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: 'Lato', sans-serif;
    }
    
    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
    }
    
    .btn-cancel {
        padding: 0.75rem 2rem;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid var(--glass-border);
        color: white;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.875rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        font-family: 'Lato', sans-serif;
    }
    
    .btn-cancel:hover {
        background: rgba(255, 255, 255, 0.15);
        color: white;
    }
    
    @media (max-width: 768px) {
        .form-card {
            padding: 1.5rem;
        }
        
        .form-actions {
            flex-direction: column;
        }
        
        .btn-submit,
        .btn-cancel {
            width: 100%;
        }
    }
</style>
@endsection

@php
    $statuses = ['active', 'new', 'inactive', 'blocked'];
    $currentStatus = old('status', $device->status ?? '');
@endphp

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="page-header-left">
            <h1>{{ isset($device) ? 'Edit Device' : 'Add New Device' }}</h1>
            <p>{{ isset($device) ? 'Update device information' : 'Create a new device for your catalog' }}</p>
        </div>
        <a href="{{ url('dashboard/devices') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i> Back to Devices
        </a>
    </div>

    <!-- Form -->
    <form action="{{ isset($device) ? url('dashboard/devices/' . $device->id) : url('dashboard/devices') }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="{{ isset($device) ? 'PUT' : 'POST' }}">
        <input type="hidden" name="device_id" value="{{ isset($device) ? $device->id : '' }}">

        <!-- Device Image -->
        <div class="form-card">
            <h3 class="form-section-title">
                <i class="fas fa-image"></i>
                Device Image
            </h3>
            <p class="section-description">Upload a clear product image (recommended: 800x800px)</p>
            <div class="image-upload-section">
                <div class="image-preview-container">
                    <img id="imagePreview"
                         src="{{ isset($device) && $device->avatar ? asset('uploads/products/' . $device->avatar) : asset('uploads/products/device1.webp') }}"
                         alt="Device Image">
                </div>
                <div class="upload-btn-wrapper">
                    <div class="upload-btn">
                        <i class="fas fa-cloud-upload-alt"></i>
                        Choose Image
                    </div>
                    <input type="file" name="avatar" accept="image/*" onchange="previewImage(event)">
                </div>
            </div>
        </div>

        <!-- Basic Information -->
        <div class="form-card">
            <h3 class="form-section-title">
                <i class="fas fa-info-circle"></i>
                Basic Information
            </h3>
            <p class="section-description">Provide the essential details about the device</p>
            
            <div class="form-group">
                <label for="name">Device Name *</label>
                <input type="text" id="name" name="name"
                       value="{{ old('name', $device->name ?? '') }}"
                       class="form-control" placeholder="e.g., GentleMax Pro" required>
                @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status *</label>
                <select id="status" name="status" class="form-control" required>
                    <option disabled {{ $currentStatus == '' ? 'selected' : '' }}>Select status</option>
                    @foreach ($statuses as $status)
                        <option value="{{ $status }}" {{ $currentStatus == $status ? 'selected' : '' }}>
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="summary">Description</label>
                <textarea id="summary" name="summary" class="form-control" rows="4"
                          placeholder="Brief description of the device and its features">{{ old('summary', $device->summary ?? '') }}</textarea>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="form-card">
            <div class="form-actions">
                <a href="{{ url('dashboard/devices') }}" class="btn-cancel">Cancel</a>
                <button type="submit" class="btn-submit">
                    <i class="fas fa-save"></i> {{ isset($device) ? 'Update Device' : 'Create Device' }}
                </button>
            </div>
        </div>
    </form>
@endsection

@section('js')
    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = () => {
                document.getElementById('imagePreview').src = reader.result;
            };
            reader.readAsDataURL(file);
        }
    </script>
@endsection
