@extends('layouts.dashboard.modern')

@section('title', isset($course) ? 'Edit Course' : 'Add New Course')

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
        max-width: 600px;
        margin: 0 auto 1.5rem;
        border-radius: 12px;
        overflow: hidden;
        border: 2px dashed rgba(102, 126, 234, 0.3);
        background: rgba(255, 255, 255, 0.05);
    }
    
    #coverPreview {
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
    
    .form-group.compact {
        margin-bottom: 1rem;
    }
    
    .form-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }
    
    .form-row.two-col {
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
    }
    
    .form-row.four-col {
        grid-template-columns: repeat(4, 1fr);
    }
    
    @media (max-width: 991px) {
        .form-row.four-col {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (max-width: 576px) {
        .form-row,
        .form-row.two-col,
        .form-row.four-col {
            grid-template-columns: 1fr;
        }
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
    textarea.form-control:focus,
    input[type="text"].form-control,
    input[type="number"].form-control,
    input[type="date"].form-control {
        width: 100%;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid var(--glass-border);
        border-radius: 10px;
        padding: 0.75rem 1rem;
        color: white;
        font-size: 0.875rem;
        transition: all 0.3s ease;
        font-family: 'Lato', sans-serif;
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
    
    input[type="date"]::-webkit-calendar-picker-indicator {
        filter: invert(1);
        cursor: pointer;
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
    
    .form-card .row {
        display: flex;
        flex-wrap: wrap;
        margin-left: -0.75rem;
        margin-right: -0.75rem;
    }
    
    .form-card .row > [class*='col-'] {
        padding-left: 0.75rem;
        padding-right: 0.75rem;
    }
    
    @media (max-width: 991px) {
        .form-card .row.course-details-row {
            flex-wrap: wrap;
        }
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
      $currentStatus = old('status', $course->status ?? '');
  @endphp


@section('content')

    <!-- Page Header -->
    <div class="page-header">
        <div class="page-header-left">
            <h1>{{ isset($course) ? 'Edit Course' : 'Add New Course' }}</h1>
            <p>{{ isset($course) ? 'Update course information and details' : 'Create a new course for your academy' }}</p>
        </div>
        <a href="{{ url('dashboard/courses') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i> Back to Courses
        </a>
    </div>

    <!-- Form -->
    <form action="{{ isset($course) ? url('dashboard/courses/' . $course->id) : url('dashboard/courses') }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="{{ isset($course) ? 'PUT' : 'POST' }}">
        <input type="hidden" name="course_id" value="{{ isset($course) ? $course->id : '' }}">

        <!-- Course Image -->
        <div class="form-card">
            <h3 class="form-section-title">
                <i class="fas fa-image"></i>
                Course Cover Image
            </h3>
            <p class="section-description">Upload an eye-catching cover image (recommended: 1200x600px)</p>
            <div class="image-upload-section">
                <div class="image-preview-container">
                    <img id="coverPreview"
                         src="{{ isset($course) && $course->image ? asset('/uploads/courses/' . $course->image) : asset('/uploads/courses/photo1.png') }}"
                         alt="Course Cover">
                </div>
                <div class="upload-btn-wrapper">
                    <div class="upload-btn">
                        <i class="fas fa-cloud-upload-alt"></i>
                        Choose Cover Image
                    </div>
                    <input type="file" name="coverPreview" accept="image/*" onchange="previewCover(event)">
                </div>
            </div>
        </div>

        <!-- Basic Information -->
        <div class="form-card">
            <h3 class="form-section-title">
                <i class="fas fa-info-circle"></i>
                Basic Information
            </h3>
            <p class="section-description">Provide the essential details about your course</p>
            
            <!-- Course Title -->
            <div class="form-group">
                <label for="title">Course Title *</label>
                <input type="text" id="title" name="title"
                       value="{{ old('title', isset($course) ? $course->title : null) }}"
                       class="form-control" placeholder="e.g., Advanced Web Development Bootcamp" required>
                @error('title')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Short Description -->
            <div class="form-group">
                <label for="summary">Short Description</label>
                <textarea id="summary" name="summary" class="form-control" rows="3"
                          placeholder="A brief, compelling summary of what students will learn (2-3 sentences)">{{ old('summary', $course->summary ?? '') }}</textarea>
            </div>

            <!-- Full Description -->
            <div class="form-group">
                <label for="full_summary">Full Description</label>
                <textarea name="full_summary" id="full_summary" class="form-control" rows="8"
                          placeholder="Provide a detailed description of the course content, learning objectives, and what students will achieve">{{ old('full_summary', $course->full_summary ?? '') }}</textarea>
            </div>

            <!-- Course Requirements -->
            <div class="form-group">
                <label for="requirements">Course Requirements</label>
                <textarea id="requirements" name="requirements" class="form-control" rows="3"
                          placeholder="List any prerequisites, required skills, or materials needed">{{ old('requirements', $course->requirements ?? '') }}</textarea>
            </div>
        </div>

        <!-- Course Details -->
        <div class="form-card">
            <h3 class="form-section-title">
                <i class="fas fa-cog"></i>
                Course Details
            </h3>
            <p class="section-description">Set pricing, scheduling, and administrative information</p>
            
            <div class="form-row two-col">
                <div class="form-group">
                    <label for="price">Price *</label>
                    <input type="number" id="price" name="price" class="form-control"
                           value="{{ old('price', isset($course) ? $course->price : null) }}"
                           placeholder="0.00" step="0.01" min="0" required>
                </div>
                
                <div class="form-group">
                    <label for="start_on">Start Date *</label>
                    <input id="start_on" name="start_on" type="date" class="form-control"
                           value="{{ old('start_on', isset($course) ? $course->start_on : null) }}" required>
                </div>
            </div>
            
            <div class="form-row two-col">
                <div class="form-group">
                    <label for="status">Status *</label>
                    <div class="custom-dropdown" id="status-dropdown">
                        <div class="custom-dropdown-toggle">
                            <span>{{ $currentStatus ? ucfirst($currentStatus) : 'Select status' }}</span>
                            <svg class="custom-dropdown-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12">
                                <path fill="currentColor" d="M6 9L1 4h10z"/>
                            </svg>
                        </div>
                        <div class="custom-dropdown-menu">
                            @foreach ($statuses as $status)
                            <div class="custom-dropdown-item {{ $currentStatus == $status ? 'selected' : '' }}" data-value="{{ $status }}">
                                <i class="fas fa-{{ $status == 'active' ? 'check-circle' : 'pause-circle' }}"></i>
                                <span>{{ ucfirst($status) }}</span>
                                <i class="fas fa-check checkmark"></i>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <input type="hidden" id="status" name="status" value="{{ $currentStatus }}" required>
                </div>
                
                <div class="form-group">
                    <label for="account_id">Academy *</label>
                    <div class="custom-dropdown" id="academy-dropdown">
                        <div class="custom-dropdown-toggle">
                            <span>{{ old('account_id', isset($course) ? $academies[$course->account_id] ?? 'Select academy' : 'Select academy') }}</span>
                            <svg class="custom-dropdown-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12">
                                <path fill="currentColor" d="M6 9L1 4h10z"/>
                            </svg>
                        </div>
                        <div class="custom-dropdown-menu">
                            @foreach ($academies as $id => $name)
                            <div class="custom-dropdown-item {{ old('account_id', isset($course) ? $course->account_id : null) == $id ? 'selected' : '' }}" data-value="{{ $id }}">
                                <i class="fas fa-school"></i>
                                <span>{{ $name }}</span>
                                <i class="fas fa-check checkmark"></i>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <input type="hidden" id="account_id" name="account_id" value="{{ old('account_id', isset($course) ? $course->account_id : '') }}" required>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="form-card">
            <div class="form-actions">
                <a href="{{ url('dashboard/courses') }}" class="btn-cancel">Cancel</a>
                <button type="submit" class="btn-submit">
                    <i class="fas fa-save"></i> {{ isset($course) ? 'Update Course' : 'Create Course' }}
                </button>
            </div>
        </div>
    </form>

@endsection

@section('js')
<script>
    $(document).ready(function() {
        // Initialize custom dropdowns
        initCustomDropdown('status-dropdown', function(value) {
            $('#status').val(value);
        });
        
        initCustomDropdown('academy-dropdown', function(value) {
            $('#account_id').val(value);
        });
    });
</script>
@endsection

@section('js')
    <script>
        function previewCover(event) {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = () => {
                document.getElementById('coverPreview').src = reader.result;
            };
            reader.readAsDataURL(file);
        }
    </script>
@endsection
