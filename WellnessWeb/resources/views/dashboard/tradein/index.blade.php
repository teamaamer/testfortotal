@extends('layouts.dashboard.modern')

@section('title', 'Trade-In Program')

@section('css')
<style>
    /* Hero Section */
    .hero-section {
        position: relative;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        overflow: hidden;
        margin-bottom: 2.5rem;
        padding: 4rem 2.5rem;
        text-align: center;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('{{ asset('assets/dashboard/dist/img/p.jpg') }}') center/cover;
        opacity: 0.15;
        z-index: 0;
    }

    .hero-content {
        position: relative;
        z-index: 1;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 10px;
        color: white;
        font-size: 0.875rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 1.5rem;
    }

    .hero-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: white;
        margin-bottom: 1rem;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    .hero-subtitle {
        font-size: 1.125rem;
        color: rgba(255, 255, 255, 0.9);
        max-width: 700px;
        margin: 0 auto;
    }

    /* Info Card */
    .info-card {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 2rem;
        margin-bottom: 2rem;
    }

    .info-card-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: white;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .info-card-title i {
        color: #667eea;
    }

    .info-card-text {
        color: rgba(255, 255, 255, 0.9);
        line-height: 1.8;
        font-size: 0.9375rem;
    }

    /* Devices Section */
    .devices-section {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 2.5rem 2rem;
        margin-bottom: 2rem;
    }

    .devices-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: white;
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .devices-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 1.5rem;
    }

    .device-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
    }

    .device-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(102, 126, 234, 0.3);
        border-color: rgba(102, 126, 234, 0.5);
    }

    .device-image {
        width: 100%;
        height: 200px;
        object-fit: contain;
        background: rgba(255, 255, 255, 0.95);
        padding: 1.5rem;
    }

    .device-body {
        padding: 1.5rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .device-name {
        font-size: 1.125rem;
        font-weight: 600;
        color: white;
        margin-bottom: 1rem;
    }

    .device-btn {
        padding: 0.75rem 1.5rem;
        background: var(--primary-gradient);
        color: white;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.875rem;
        text-decoration: none;
        text-align: center;
        transition: all 0.3s ease;
        display: inline-block;
        margin-top: auto;
    }

    .device-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(102, 126, 234, 0.4);
        color: white;
    }

    /* Form Section */
    .form-section {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 2.5rem;
        max-width: 800px;
        margin: 0 auto 2rem;
    }

    .form-section-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: white;
        text-align: center;
        margin-bottom: 2rem;
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: rgba(102, 126, 234, 0.1);
        border: 1px solid rgba(102, 126, 234, 0.2);
        border-radius: 12px;
        margin-bottom: 2rem;
    }

    .user-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid rgba(102, 126, 234, 0.5);
    }

    .user-name {
        color: white;
        font-weight: 600;
        font-size: 1rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        color: rgba(255, 255, 255, 0.9);
        font-weight: 600;
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

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }

    select.custom-select option {
        background: #1a1a2e;
        color: white;
    }

    .btn-submit {
        width: 100%;
        padding: 0.875rem 2rem;
        background: var(--primary-gradient);
        color: white;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
    }

    .alert {
        padding: 1rem;
        border-radius: 10px;
        margin-bottom: 1rem;
        font-size: 0.9375rem;
    }

    .alert-success {
        background: rgba(34, 197, 94, 0.2);
        border: 1px solid rgba(34, 197, 94, 0.3);
        color: #86efac;
    }

    .alert-danger {
        background: rgba(239, 68, 68, 0.2);
        border: 1px solid rgba(239, 68, 68, 0.3);
        color: #fca5a5;
    }

    .alert-info {
        background: rgba(59, 130, 246, 0.2);
        border: 1px solid rgba(59, 130, 246, 0.3);
        color: #93c5fd;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-section {
            padding: 3rem 1.5rem;
        }

        .hero-title {
            font-size: 1.75rem;
        }

        .hero-subtitle {
            font-size: 1rem;
        }

        .info-card,
        .form-section,
        .devices-section {
            padding: 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .hero-title {
            font-size: 1.5rem;
        }
    }
</style>
@endsection


@section('content')

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-content">
            <div class="hero-badge">
                <i class="fas fa-exchange-alt"></i>
                Trade-In Program
            </div>
            <h1 class="hero-title">Upgrade Your Equipment Effortlessly</h1>
            <p class="hero-subtitle">Exchange your old devices for credit toward the latest technology with our hassle-free trade-in program</p>
        </div>
    </div>

    <!-- What We Offer Section -->
    <div class="info-card">
        <h2 class="info-card-title">
            <i class="fas fa-star"></i>
            What We Offer?
        </h2>
        <p class="info-card-text">
            Upgrade your equipment seamlessly with our trade-in program.
            Exchange your old devices for credit toward the latest technology.
            Our transparent process ensures maximum value, reduced costs,
            and smooth upgrades without hassle.
        </p>
    </div>

    <!-- Available Devices Section -->
    <div class="devices-section">
        <h2 class="devices-title">Available Devices</h2>
        @include('dashboard.tradein.render.devices_render', ['devices' => $devices])
    </div>

    <!-- Trade-In Request Form -->
    <div class="form-section">
        <h2 class="form-section-title">Trade-In Request</h2>

        @if (auth()->check())
        <div class="user-info">
            <img src="{{ asset('/uploads/avatars/' . Auth::user()->account->avatar) }}" 
                 class="user-avatar" 
                 alt="{{ Auth::user()->name }}">
            <span class="user-name">{{ Auth::user()->name }}</span>
        </div>
        @endif

        <form id="contactForm" action="{{ route('contact.tradein') }}" method="POST">
            @csrf
            <input type="hidden" name="account_id" value="{{ Auth::user()->account->id }}">

            <div class="form-group">
                <label for="phone_no">Phone Number *</label>
                <input id="phone_no" name="phone_no" type="text" class="form-control" 
                       placeholder="Enter your phone number" required>
            </div>

            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.5rem; margin-bottom: 1.5rem;">
                <div class="form-group" style="margin-bottom: 0;">
                    <label for="city">City *</label>
                    <input type="text" name="city" id="city" class="form-control" 
                           placeholder="Enter your city" required>
                </div>

                <div class="form-group" style="margin-bottom: 0;">
                    <label for="country">Country *</label>
                    <input type="text" name="country" id="country" class="form-control" 
                           placeholder="Enter your country" required>
                </div>
            </div>

            <div class="form-group">
                <label for="device_id">Your Current Device *</label>
                <div class="custom-dropdown" id="device-dropdown">
                    <div class="custom-dropdown-toggle">
                        <span>Select your current device</span>
                        <svg class="custom-dropdown-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12">
                            <path fill="currentColor" d="M6 9L1 4h10z"/>
                        </svg>
                    </div>
                    <div class="custom-dropdown-menu">
                        @foreach ($devices as $device)
                        <div class="custom-dropdown-item" data-value="{{ $device->id }}">
                            <i class="fas fa-mobile-alt"></i>
                            <span>{{ $device->name }}</span>
                            <i class="fas fa-check checkmark"></i>
                        </div>
                        @endforeach
                    </div>
                </div>
                <input type="hidden" id="device_id" name="device_id" required>
            </div>

            <div class="form-group">
                <label for="target_device_id">Target Device (What You Want) *</label>
                <div class="custom-dropdown" id="target-device-dropdown">
                    <div class="custom-dropdown-toggle">
                        <span>Select target device</span>
                        <svg class="custom-dropdown-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12">
                            <path fill="currentColor" d="M6 9L1 4h10z"/>
                        </svg>
                    </div>
                    <div class="custom-dropdown-menu">
                        @foreach ($devices as $device)
                        <div class="custom-dropdown-item" data-value="{{ $device->id }}">
                            <i class="fas fa-mobile-alt"></i>
                            <span>{{ $device->name }}</span>
                            <i class="fas fa-check checkmark"></i>
                        </div>
                        @endforeach
                    </div>
                </div>
                <input type="hidden" id="target_device_id" name="target_device_id" required>
            </div>

            <div class="form-group">
                <label for="subject">Subject *</label>
                <input type="text" id="subject" name="subject" class="form-control" 
                       placeholder="Brief description of your trade-in request" required>
            </div>

            <div class="form-group">
                <label for="message">Message *</label>
                <textarea id="message" name="message" class="form-control" rows="5" 
                          placeholder="Provide details about your device condition and trade-in expectations" required></textarea>
            </div>

            <div id="contactAlert"></div>

            <button type="submit" class="btn-submit">
                <i class="fas fa-paper-plane"></i> Submit Trade-In Request
            </button>
        </form>
    </div>

@endsection

  @section('js')
      <script>
          $(document).ready(function() {
              // Initialize custom dropdowns
              initCustomDropdown('device-dropdown', function(value) {
                  $('#device_id').val(value);
              });
              
              initCustomDropdown('target-device-dropdown', function(value) {
                  $('#target_device_id').val(value);
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
