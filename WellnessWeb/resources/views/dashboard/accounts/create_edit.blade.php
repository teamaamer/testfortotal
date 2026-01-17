@extends('layouts.dashboard.modern')

@section('title', isset($account) ? 'Edit Account' : 'Add Account')

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
    
    .form-container {
        max-width: 1200px;
        margin: 0 auto;
    }
    
    .form-card {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 2rem;
        margin-bottom: 1.5rem;
    }
    
    .card-title {
        font-size: 1.125rem;
        font-weight: 700;
        color: white;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .card-title i {
        color: #667eea;
    }
    
    .avatar-section {
        text-align: center;
        margin-bottom: 2rem;
    }
    
    .avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        overflow: hidden;
        margin: 0 auto 1rem;
        border: 4px solid rgba(102, 126, 234, 0.3);
        position: relative;
    }
    
    .avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .upload-container {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
        flex-wrap: wrap;
    }
    
    .upload-btn {
        background: var(--primary-gradient);
        color: white;
        padding: 0.625rem 1.5rem;
        border-radius: 10px;
        border: none;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.875rem;
    }
    
    .upload-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
    }
    
    #avatar-filename {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.875rem;
        max-width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    
    .form-row {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }
    
    .form-group {
        margin-bottom: 0;
    }
    
    .form-group.full-width {
        grid-column: 1 / -1;
    }
    
    .form-group label {
        display: block;
        font-weight: 600;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
    }
    
    .form-control,
    .custom-select {
        width: 100%;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid var(--glass-border);
        border-radius: 10px;
        padding: 0.75rem 1rem;
        color: white;
        font-size: 0.9375rem;
        transition: all 0.3s ease;
        font-family: 'Lato', sans-serif;
    }
    
    .form-control:focus,
    .custom-select:focus {
        outline: none;
        border-color: rgba(102, 126, 234, 0.5);
        background: rgba(255, 255, 255, 0.15);
    }
    
    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }
    
    .custom-select option {
        background: #1a1a2e;
        color: white;
    }
    
    textarea.form-control {
        resize: vertical;
        min-height: 100px;
    }
    
    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        padding-top: 1.5rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        margin-top: 1.5rem;
    }
    
    .btn {
        padding: 0.75rem 2rem;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.9375rem;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-family: 'Lato', sans-serif;
    }
    
    .btn-primary {
        background: var(--primary-gradient);
        color: white;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
    }
    
    .btn-secondary {
        background: rgba(255, 255, 255, 0.1);
        color: rgba(255, 255, 255, 0.9);
        border: 1px solid var(--glass-border);
    }
    
    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.15);
    }
    
    .hidden {
        display: none !important;
    }
    
    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        
        .form-card {
            padding: 1.5rem;
        }
        
        .form-actions {
            flex-direction: column;
        }
        
        .btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endsection

@php
    $statuses = ['active', 'new', 'inactive', 'blocked'];
    $currentStatus = old('status', $account->status ?? '');
@endphp

@section('content')

    <!-- Page Header -->
    <div class="page-header">
        <div class="page-header-left">
            <h1>{{ isset($account) ? 'Edit' : 'Add' }} User Account</h1>
            <p>Manage user account information and settings</p>
        </div>
    </div>

    <div class="form-container">
        <form id="accountForm"
            action="{{ isset($account) ? url('dashboard/accounts/' . $account->id) : url('dashboard/accounts') }}"
            method="POST" enctype="multipart/form-data">

            @csrf
            <input type="hidden" name="_method" value="{{ isset($account) ? 'PUT' : 'POST' }}">
            <input type="hidden" name="account_id" value="{{ isset($account) ? $account->id : '' }}">

            <!-- Basic Information Card -->
            <div class="form-card">
                <h3 class="card-title">
                    <i class="fas fa-user"></i> Basic Information
                </h3>

                <!-- Avatar Section -->
                <div class="avatar-section">
                    <div class="avatar">
                        <img src="{{ isset($account) && $account->avatar ? asset('uploads/avatars/' . $account->avatar) : asset('uploads/avatars/avatar.png') }}"
                            alt="User Avatar" id="avatar-preview">
                    </div>
                    <div class="upload-container">
                        <label class="upload-btn">
                            <i class="fas fa-upload"></i> Choose Photo
                            <input type="file" name="avatar" id="avatar-input" hidden accept="image/*">
                        </label>
                        <span id="avatar-filename"></span>
                    </div>
                </div>

                <!-- Form Fields -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name"
                            value="{{ old('name', $account->name ?? '') }}" 
                            class="form-control"
                            placeholder="Enter full name"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email"
                            value="{{ old('email', $account->user->email ?? '') }}" 
                            class="form-control"
                            placeholder="Enter email address"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" 
                            class="form-control"
                            placeholder="{{ isset($account) ? 'Leave blank to keep current password' : 'Enter password' }}">
                    </div>

                    <div class="form-group">
                        <label for="role">Role</label>
                        <select id="role" name="role" class="form-control custom-select"
                            {{ auth()->user()->isAdmin() ? '' : 'disabled' }} required>
                            <option disabled {{ old('role', $account->user->role ?? '') == '' ? 'selected' : '' }}>
                                Select role</option>
                            @foreach (['admin', 'student', 'academy', 'center'] as $role)
                                <option value="{{ $role }}"
                                    {{ old('role', $account->user->role ?? '') == $role ? 'selected' : '' }}>
                                    {{ ucfirst($role) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" class="form-control custom-select"
                            {{ auth()->user()->isAdmin() ? '' : 'disabled' }} required>
                            <option disabled {{ $currentStatus == '' ? 'selected' : '' }}>Select status</option>
                            @foreach ($statuses as $status)
                                <option value="{{ $status }}"
                                    {{ $currentStatus == $status ? 'selected' : '' }}>
                                    {{ ucfirst($status) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    @unless (auth()->user()->isAdmin())
                        <input type="hidden" name="role" value="{{ old('role', $account->user->role ?? '') }}">
                        <input type="hidden" name="status" value="{{ old('status', $account->status ?? '') }}">
                    @endunless
                </div>

                <div class="form-row">
                    <div class="form-group full-width">
                        <label for="summary">Summary</label>
                        <textarea id="summary" name="summary" class="form-control" placeholder="Enter a brief summary">{{ old('summary', $account->summary ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Address Card -->
            <div class="form-card" id="student-card-2">
                <h3 class="card-title">
                    <i class="fas fa-map-marker-alt"></i> Address Information
                </h3>
                <div class="form-row">
                    <div class="form-group">
                        <label for="address">Street Address</label>
                                    <input type="text" name="address" id="address" class="form-control student-required"
                                        value="{{ old('address', $account->address ?? '') }}" placeholder="Enter address">
                    </div>

                    <div class="form-group">
                        <label for="city">City</label>
                                    <input type="text" name="city" id="city" class="form-control student-required"
                                        value="{{ old('city', $account->city ?? '') }}" placeholder="Enter city">
                    </div>

                    <div class="form-group">
                        <label for="state">State/Province</label>
                                    <input type="text" name="state" id="state" class="form-control student-required"
                                        value="{{ old('state', $account->state ?? '') }}" placeholder="Enter state">
                    </div>

                    <div class="form-group">
                        <label for="country">Country</label>
                                    <input type="text" name="country" id="country" class="form-control student-required"
                                        value="{{ old('country', $account->country ?? '') }}"
                                        placeholder="Enter country">
                    </div>

                    <div class="form-group">
                        <label for="zip_code">ZIP/Postal Code</label>
                                    <input type="text" name="zip_code" id="zip_code" class="form-control student-required"
                                        value="{{ old('zip_code', $account->zip_code ?? '') }}"
                                        placeholder="Enter ZIP code">
                    </div>
                </div>
            </div>


            <!-- Education & Employment Card -->
            <div class="form-card" id="student-card-3">
                <h3 class="card-title">
                    <i class="fas fa-graduation-cap"></i> Education & Employment
                </h3>
                <div class="form-row">

                    <div class="form-group">
                        <label for="department">Department</label>
                                    <input type="text" name="department" id="department" class="form-control student-required"
                                        value="{{ old('department', $account->department ?? '') }}"
                                        placeholder="Enter department">
                    </div>

                    <div class="form-group">
                        <label for="job_title">Job Title</label>
                                    <select name="job_title" id="job_title" class="form-control student-required">
                                        <option value="">Select Job Title</option>
                                        @foreach (['Specialist', 'Consultant', 'Assistant Professor', 'Associate Professor', 'Professor', 'Head of department', 'Registrar', 'Senior Registrar', 'Senior', 'Lecturar', 'Assistant Lecturer', 'Resident', 'Senior Specialist', 'Senior Consultant', 'Other'] as $title)
                                            <option value="{{ $title }}"
                                                {{ old('job_title', $account->job_title ?? '') == $title ? 'selected' : '' }}>
                                                {{ $title }}
                                            </option>
                                        @endforeach
                                    </select>
                    </div>

                    <div class="form-group">
                        <label for="degree">Degree</label>
                                    <select name="degree" id="degree" class="form-control student-required">
                                        <option value="">Select Degree</option>
                                        @foreach (['Board', 'Doctorate', 'Master', 'Fellowship', 'MBChB', 'PhD', 'Diploma', 'High Diploma', 'MDOption 1', 'Other'] as $degree)
                                            <option value="{{ $degree }}"
                                                {{ old('degree', $account->degree ?? '') == $degree ? 'selected' : '' }}>
                                                {{ $degree }}
                                            </option>
                                        @endforeach
                                    </select>
                    </div>

                    <div class="form-group">
                        <label for="specialty">Specialty</label>
                                    <select name="specialty" id="specialty" class="form-control student-required">
                                        <option value="">Select Specialty</option>
                                        @foreach (['Dermatology', 'Plastic Surgery', 'ENT', 'GP', 'Dentistry', 'General Surgery', 'Family Medicine', 'Other'] as $spec)
                                            <option value="{{ $spec }}"
                                                {{ old('specialty', $account->specialty ?? '') == $spec ? 'selected' : '' }}>
                                                {{ $spec }}
                                            </option>
                                        @endforeach
                                    </select>
                    </div>

                    <div class="form-group">
                        <label for="state_of_license">License Status</label>
                                    <select name="state_of_license" id="state_of_license" class="form-control student-required">
                                        <option value="">Select State of License</option>
                                        @foreach (['Active', 'General Surgery', 'Expired'] as $state)
                                            <option value="{{ $state }}"
                                                {{ old('state_of_license', $account->state_of_license ?? '') == $state ? 'selected' : '' }}>
                                                {{ $state }}
                                            </option>
                                        @endforeach
                                    </select>
                    </div>

                    <div class="form-group">
                        <label for="certifying_board">Certifying Board</label>
                                    <select name="certifying_board" id="certifying_board" class="form-control student-required">
                                        <option value="">Select Certifying Board</option>
                                        @foreach (['American Board', 'Arab Board', 'Jordanian Board', 'Libyan Board', 'Saudi Board', 'Syrian Board', 'German Board', 'Sudanian Board', 'Iraqi Board', 'None of the above', 'Other'] as $board)
                                            <option value="{{ $board }}"
                                                {{ old('certifying_board', $account->certifying_board ?? '') == $board ? 'selected' : '' }}>
                                                {{ $board }}
                                            </option>
                                        @endforeach
                                    </select>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="form-card">
                <div class="form-actions">
                    <a href="{{ url('dashboard/accounts') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        {{ isset($account) ? 'Update Account' : 'Create Account' }}
                    </button>
                </div>
            </div>

        </form>
    </div>
@endsection

@section('js')
    <script>
        document.getElementById('avatar-input').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                document.getElementById('avatar-filename').textContent = file.name;
                
                // Preview image
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('avatar-preview').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

     function toggleStudentCards() {
        let role = document.getElementById('role').value;
        let studentFields = document.querySelectorAll('.student-required');

        if (role === 'student') {
            document.getElementById('student-card-2').classList.remove('hidden');
            document.getElementById('student-card-3').classList.remove('hidden');

               studentFields.forEach(field => {
                field.setAttribute('required', 'required');
            });

        } else {
            document.getElementById('student-card-2').classList.add('hidden');
            document.getElementById('student-card-3').classList.add('hidden');

                // remove required
            studentFields.forEach(field => {
                field.removeAttribute('required');
            });
        }
    }

    // Run on load (when editing an account)
    toggleStudentCards();

    // Run on role change
    document.getElementById('role').addEventListener('change', toggleStudentCards);
</script>

    </script>
@endsection
