@extends('layouts.dashboard.modern')

@section('title', 'Help & Support')

@section('css')
<link href='https://fonts.googleapis.com/css?family=Lato:300,400,600,700' rel='stylesheet' type='text/css'>
<style>
    * {
        font-family: 'Lato', sans-serif;
    }

    .page-header {
        margin-bottom: 2rem;
    }

    .page-header h1 {
        font-size: 1.75rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .page-header p {
        color: rgba(255, 255, 255, 0.7);
        font-size: 1rem;
    }

    .contact-container {
        display: grid;
        grid-template-columns: 2fr 3fr;
        gap: 2rem;
        margin-bottom: 2rem;
    }

    .contact-info-card {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 2.5rem;
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .brand-section {
        text-align: center;
        padding-bottom: 2rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .brand-title {
        font-size: 2rem;
        font-weight: 700;
        color: white;
        margin-bottom: 1rem;
    }

    .brand-highlight {
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .brand-description {
        color: rgba(255, 255, 255, 0.8);
        line-height: 1.7;
        font-size: 0.9375rem;
    }

    .contact-info-item {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        padding: 1rem;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .contact-info-item:hover {
        background: rgba(255, 255, 255, 0.08);
        transform: translateX(5px);
    }

    .contact-icon {
        width: 40px;
        height: 40px;
        background: var(--primary-gradient);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.125rem;
        flex-shrink: 0;
    }

    .contact-details {
        flex: 1;
    }

    .contact-label {
        font-size: 0.75rem;
        color: rgba(255, 255, 255, 0.6);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.25rem;
    }

    .contact-value {
        color: white;
        font-size: 0.9375rem;
        font-weight: 500;
    }

    .contact-value a {
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .contact-value a:hover {
        color: #667eea;
    }

    .contact-form-card {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 2.5rem;
    }

    .form-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: white;
        margin-bottom: 0.5rem;
    }

    .form-subtitle {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.875rem;
        margin-bottom: 2rem;
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
    select.form-control,
    textarea.form-control {
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

    textarea.form-control {
        resize: vertical;
        min-height: 120px;
    }

    .btn-submit {
        width: 100%;
        padding: 0.875rem 2rem;
        background: var(--primary-gradient);
        color: white;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.875rem;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: 'Lato', sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
    }

    .alert {
        padding: 1rem;
        border-radius: 10px;
        margin-bottom: 1rem;
        font-size: 0.875rem;
    }

    .alert-success {
        background: rgba(46, 213, 115, 0.2);
        color: #2ed573;
        border: 1px solid rgba(46, 213, 115, 0.3);
    }

    .alert-danger {
        background: rgba(255, 71, 87, 0.2);
        color: #ff4757;
        border: 1px solid rgba(255, 71, 87, 0.3);
    }

    .alert-info {
        background: rgba(52, 172, 224, 0.2);
        color: #34ace0;
        border: 1px solid rgba(52, 172, 224, 0.3);
    }

    @media (max-width: 968px) {
        .contact-container {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@php
    if (auth()->user()->hasRole('admin')) {
        $types = ['Customer Services', 'Market Research', 'Others'];
    } elseif (auth()->user()->hasRole('center')) {
        $types = ['Customer Services', 'Others'];
    } elseif (auth()->user()->hasRole('student')) {
        $types = ['Customer Services', 'Custom-made Courses', 'Others'];
    } else {
        $types = ['Customer Services', 'Market Research', 'Custom-made Courses', 'Others'];
    }
@endphp

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <h1>Help & Support</h1>
        <p>Get in touch with our team - we're here to help</p>
    </div>

    <!-- Contact Container -->
    <div class="contact-container">
        <!-- Contact Info -->
        <div class="contact-info-card">
            <div class="brand-section">
                <h2 class="brand-title">Total<span class="brand-highlight">Wellness</span></h2>
                <p class="brand-description">
                    We are here to help you. Feel free to contact us anytime and our team will respond as soon as possible.
                </p>
            </div>

            <div class="contact-info-item">
                <div class="contact-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="contact-details">
                    <div class="contact-label">Address</div>
                    <div class="contact-value">Hamriyah Free Zone, Sharjah, UAE</div>
                </div>
            </div>

            <div class="contact-info-item">
                <div class="contact-icon">
                    <i class="fas fa-phone"></i>
                </div>
                <div class="contact-details">
                    <div class="contact-label">Phone</div>
                    <div class="contact-value">
                        <a href="tel:+971528704669">+971 52 870 4669</a>
                    </div>
                </div>
            </div>

            <div class="contact-info-item">
                <div class="contact-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="contact-details">
                    <div class="contact-label">Email</div>
                    <div class="contact-value">
                        <a href="mailto:info@totalwellness-international.com">info@totalwellness-international.com</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="contact-form-card">
            <h2 class="form-title">Send us a Message</h2>
            <p class="form-subtitle">Fill out the form below and we'll get back to you shortly</p>

            <form id="contactForm" action="{{ route('contact.send') }}" method="POST">
                @csrf

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;">
                    <div class="form-group" style="margin-bottom: 0;">
                        <label for="name">Name *</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Your full name" required>
                    </div>

                    <div class="form-group" style="margin-bottom: 0;">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="your.email@example.com" required>
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;">
                    <div class="form-group" style="margin-bottom: 0;">
                        <label for="type">Problem Type *</label>
                        <div class="custom-dropdown" id="type-dropdown">
                            <div class="custom-dropdown-toggle">
                                <span>Select a category</span>
                                <svg class="custom-dropdown-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12">
                                    <path fill="currentColor" d="M6 9L1 4h10z"/>
                                </svg>
                            </div>
                            <div class="custom-dropdown-menu">
                                @foreach ($types as $type)
                                <div class="custom-dropdown-item" data-value="{{ $type }}">
                                    <i class="fas fa-{{ $type == 'support' ? 'headset' : ($type == 'contact' ? 'envelope' : 'question-circle') }}"></i>
                                    <span>{{ ucfirst($type) }}</span>
                                    <i class="fas fa-check checkmark"></i>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <input type="hidden" id="type" name="type" required>
                    </div>

                    <div class="form-group" style="margin-bottom: 0;">
                        <label for="subject">Subject *</label>
                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Brief subject of your message" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="message">Message *</label>
                    <textarea id="message" name="message" class="form-control" placeholder="Describe your issue or question in detail..." required></textarea>
                </div>

                <div id="contactAlert"></div>

                <button type="submit" class="btn-submit">
                    <i class="fas fa-paper-plane"></i> Send Message
                </button>
            </form>
        </div>
    </div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Initialize custom dropdown
        initCustomDropdown('type-dropdown', function(value) {
            $('#type').val(value);
        });
    });
    
    $('#contactForm').on('submit', function(e) {
              e.preventDefault();
              let form = $(this);
              let alertBox = $('#contactAlert');
              alertBox.html('');

              $.ajax({
                  url: form.attr('action'),
                  method: 'POST',
                  data: form.serialize(),
                  beforeSend: function() {
                      alertBox.html('<div class="alert alert-info">Sending...</div>');
                  },
                  success: function(response) {
                      alertBox.html('<div class="alert alert-success">' + response.message + '</div>');
                      form.trigger('reset');
                  },
                  error: function(xhr) {
                      let msg = 'Something went wrong. Please try again.';
                      if (xhr.responseJSON && xhr.responseJSON.message) {
                          msg = xhr.responseJSON.message;
                      }
                      alertBox.html('<div class="alert alert-danger">' + msg + '</div>');
                  }
              });
          });
      </script>
  @endsection
