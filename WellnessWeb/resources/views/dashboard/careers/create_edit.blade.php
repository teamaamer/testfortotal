@extends('layouts.dashboard.modern')

@section('title', isset($career) ? 'Edit Career' : 'Post New Job')

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
    $currentStatus = old('status', $career->status ?? '');
@endphp

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="page-header-left">
            <h1>{{ isset($career) ? 'Edit Career' : 'Post New Job' }}</h1>
            <p>{{ isset($career) ? 'Update job posting information' : 'Create a new career opportunity' }}</p>
        </div>
        <a href="{{ url('dashboard/careers') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i> Back to Careers
        </a>
    </div>

    <!-- Form -->
    <form action="{{ isset($career) ? url('dashboard/careers/' . $career->id) : url('dashboard/careers') }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="{{ isset($career) ? 'PUT' : 'POST' }}">
        <input type="hidden" name="career_id" value="{{ isset($career) ? $career->id : '' }}">

        <!-- Job Information -->
        <div class="form-card">
            <h3 class="form-section-title">
                <i class="fas fa-briefcase"></i>
                Job Information
            </h3>
            <p class="section-description">Provide the essential details about this position</p>
            
            <div class="form-group">
                <label for="title">Job Title *</label>
                <input type="text" id="title" name="title"
                       value="{{ old('title', isset($career) ? $career->title : null) }}"
                       class="form-control" placeholder="e.g., Senior Software Engineer" required>
                @error('title')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="summary">Job Description *</label>
                <textarea id="summary" name="summary" class="form-control" rows="5"
                          placeholder="Describe the role, responsibilities, and requirements..." required>{{ old('summary', $career->summary ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label for="salary_range">Salary Range *</label>
                <input type="number" id="salary_range" name="salary_range" class="form-control"
                       value="{{ old('salary', isset($career) ? $career->salary : null) }}"
                       placeholder="e.g., 50000" min="0" required>
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
                <label for="account_id">Academy *</label>
                <select name="account_id" id="account_id" class="form-control" required>
                    <option disabled value="">Select academy</option>
                    @foreach ($centers as $id => $name)
                        <option value="{{ $id }}"
                                {{ old('account_id', isset($career) ? $career->account_id : null) == $id ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Location Information -->
        <div class="form-card">
            <h3 class="form-section-title">
                <i class="fas fa-map-marker-alt"></i>
                Location Information
            </h3>
            <p class="section-description">Specify where this position is located</p>
            
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" name="city" id="city" class="form-control"
                       value="{{ old('city', $career->city ?? '') }}" placeholder="e.g., Dubai">
            </div>

            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" name="country" id="country" class="form-control"
                       value="{{ old('country', $career->country ?? '') }}" placeholder="e.g., United Arab Emirates">
            </div>
        </div>

        <!-- Form Actions -->
        <div class="form-card">
            <div class="form-actions">
                <a href="{{ url('dashboard/careers') }}" class="btn-cancel">Cancel</a>
                <button type="submit" class="btn-submit">
                    <i class="fas fa-save"></i> {{ isset($career) ? 'Update Job' : 'Post Job' }}
                </button>
            </div>
        </div>
    </form>
@endsection

@section('js')
@endsection
