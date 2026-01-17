@extends('layouts.dashboard.modern')

@section('title', isset($document) ? 'Edit Document' : 'Add Document')

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
    
    .document-card {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 2rem;
        max-width: 900px;
        margin: 0 auto;
    }
    
    .card-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: white;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
        margin-bottom: 2rem;
    }
    
    .form-group {
        margin-bottom: 1.5rem;
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
    }
    
    .form-control:focus,
    .custom-select:focus {
        outline: none;
        border-color: rgba(102, 126, 234, 0.5);
        background: rgba(255, 255, 255, 0.15);
    }
    
    .custom-select option {
        background: #1a1a2e;
        color: white;
    }
    
    .attachment-box {
        border: 2px dashed rgba(255, 255, 255, 0.2);
        border-radius: 12px;
        padding: 2rem;
        text-align: center;
        background: rgba(255, 255, 255, 0.05);
        transition: all 0.3s ease;
    }
    
    .attachment-box:hover {
        border-color: rgba(102, 126, 234, 0.5);
        background: rgba(255, 255, 255, 0.08);
    }
    
    .attachment-preview {
        margin-bottom: 1rem;
    }
    
    .attachment-preview img,
    .attachment-preview embed {
        border-radius: 12px;
        max-width: 100%;
        border: 1px solid var(--glass-border);
    }
    
    .form-control-file {
        color: rgba(255, 255, 255, 0.8);
        font-size: 0.875rem;
    }
    
    .form-control-file::file-selector-button {
        background: var(--primary-gradient);
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        margin-right: 1rem;
        transition: all 0.3s ease;
        font-family: 'Lato', sans-serif;
    }
    
    .form-control-file::file-selector-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
    }
    
    .card-footer {
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
        display: inline-block;
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
    
    .download-link {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: rgba(102, 126, 234, 0.2);
        color: #60a5fa;
        border: 1px solid rgba(102, 126, 234, 0.3);
        border-radius: 10px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .download-link:hover {
        background: rgba(102, 126, 234, 0.3);
        transform: translateY(-2px);
        color: #93c5fd;
    }
    
    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
            gap: 0;
        }
        
        .document-card {
            padding: 1.5rem;
        }
        
        .card-footer {
            flex-direction: column;
        }
        
        .btn {
            width: 100%;
            text-align: center;
        }
    }
</style>
@endsection

@php
    $currentType = old('type', $document->type ?? '');
@endphp

@section('content')

    <!-- Page Header -->
    <div class="page-header">
        <div class="page-header-left">
            <h1>{{ isset($document) ? 'Edit' : 'Add' }} Document</h1>
            <p>Manage account related documents</p>
        </div>
    </div>

    <!-- Document Form Card -->
    <div class="document-card">
        <h3 class="card-title">Document Information</h3>

    <form
        action="{{ isset($document) ? url('dashboard/documents/' . $document->id) : url('dashboard/documents') }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf
        <input type="hidden" name="_method" value="{{ isset($document) ? 'PUT' : 'POST' }}">
        <input type="hidden" name="account_id"
            value="{{ isset($document) ? $document->account->id : $account->id }}">

        <div class="form-row">

                <!-- Left Column -->
                <div>
                    <div class="form-group">
                        <label>Document Title</label>
                        <input type="text" name="title"
                            value="{{ old('title', $document->title ?? '') }}"
                            class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Document Type</label>
                        <select name="type" class="form-control custom-select" required>
                            <option disabled {{ $currentType == '' ? 'selected' : '' }}>Select type</option>
                            @foreach(['cv','certificate','license','transcript','other'] as $type)
                                <option value="{{ $type }}" {{ $currentType == $type ? 'selected' : '' }}>
                                    {{ ucfirst($type) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Right Column -->
                <div>
                    <label>Attachment</label>

                    <div class="attachment-box">

                        @if(isset($document) && $document->file_path)
                            @php $ext = strtolower(pathinfo($document->file_path, PATHINFO_EXTENSION)); @endphp

                            <div class="attachment-preview mb-3">
                                @if(in_array($ext, ['jpg','jpeg','png','gif']))
                                    <img src="{{ asset('uploads/documents/'.$document->file_path) }}">
                                @elseif($ext === 'pdf')
                                    <embed src="{{ asset('uploads/documents/'.$document->file_path) }}"
                                           type="application/pdf" height="220px">
                                @else
                                    <a href="{{ asset('uploads/documents/'.$document->file_path) }}"
                                       target="_blank"
                                       class="download-link">
                                        <i class="fas fa-download"></i>
                                        Download {{ strtoupper($ext) }}
                                    </a>
                                @endif
                            </div>
                        @endif

                        <input type="file"
                               name="file_path"
                               class="form-control-file"
                               accept=".pdf,.jpg,.jpeg,.png,.gif,.doc,.docx">
                    </div>
                </div>

        </div>

        <div class="card-footer">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Cancel
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                {{ isset($document) ? 'Update Document' : 'Save Document' }}
            </button>
        </div>

    </form>
    </div>
@endsection
