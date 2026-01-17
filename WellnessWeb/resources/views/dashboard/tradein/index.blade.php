  @extends('layouts.dashboard.app')

  @php
      $headerImage = asset('assets/dashboard/dist/img/p.jpg');
  @endphp

  @section('css')
<style>
.tradein-hero {
    position: relative;
    height: 75vh;
    background: url("{{ $headerImage }}") center/cover no-repeat;
    display: flex;
    align-items: flex-end;
    padding: 70px;
    color: #ffffff;
}

.tradein-hero::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to top,
        rgba(0,0,0,.7),
        rgba(0,0,0,.25)
    );
}
/*
.tradein-hero h1 {
    position: relative;
    font-size: 44px;
    font-weight: 700;
    max-width: 750px;
    line-height: 1.25;
    color:white;
}
*/
.section {
    padding: 70px 0;
}

.section-title {
    font-size: 34px;
    font-weight: 700;
    margin-bottom: 20px;
}

.section-text {
    font-size: 17px;
    line-height: 1.8;
    color: #555;
}

.clean-card {
    border-radius: 16px;
    border: none;
    box-shadow: 0 15px 40px rgba(0,0,0,.06);
}

.devices-section {
    background: #f9fafb;
}

.device-card {
    border-radius: 14px;
    overflow: hidden;
    transition: all .3s ease;
}

.device-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 25px rgba(0,0,0,.12);
}

.device-card img {
    width: 100%;
    height: 200px;
    object-fit: contain;
    background: #fff;
    padding: 20px;
}

.tradein-form {
    max-width: 820px;
    margin: auto;
}

.form-control,
.custom-select {
    border-radius: 10px;
}

.tradein-form h3 {
    font-weight: 700;
}

.btn-primary {
    padding: 12px 35px;
    border-radius: 30px;
    font-weight: 600;
}
</style>
@endsection


  @section('content')
      <div class="container-fluid">

          <!-- Header Section -->
          <div class="tradein-hero">
    <h1 style="color:purple;">
        Upgrade your equipment effortlessly<br>
        with our hassle-free trade-in program
    </h1>
</div>


          <!-- Content Section -->
   <div class="section">
    <div class="container">
        <div class="card clean-card">
            <div class="card-body px-5 py-4">
                <h3 class="section-title">What we offer?</h3>
                <p class="section-text">
                    Upgrade your equipment seamlessly with our trade-in program.
                    Exchange your old devices for credit toward the latest technology.
                    Our transparent process ensures maximum value, reduced costs,
                    and smooth upgrades without hassle.
                </p>
            </div>
        </div>
    </div>
</div>



          <div class="section devices-section">
    <div class="container">
        <h3 class="section-title text-center mb-5">Available Devices</h3>

        <div id="deviceCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        @include('dashboard.tradein.render.devices_render', [
                            'devices' => $devices,
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


          <div class="section">
    <div class="container">
        <div class="card clean-card">
            <div class="card-body tradein-form">

                <h3 class="mb-4 text-center">Trade-In Request</h3>

                @if (auth()->check())
                <div class="d-flex align-items-center mb-4">
                    <img src="{{ asset('/uploads/avatars/' . Auth::user()->account->avatar) }}"
                         class="rounded-circle"
                         style="width:60px;height:60px;object-fit:cover">
                    <strong class="ml-3">{{ auth()->user()->name }}</strong>
                </div>
                @endif



                      <form id="contactForm" action="{{ route('contact.tradein') }}" method="POST">
                          @csrf

                          <input type="hidden" name="account_id" value="{{ Auth::user()->account->id }}">

                          <div class="form-group">
                              <label> Phone #</label>

                              <div class="input-group">
                                  <input id="phone_no" name="phone_no" type="text" class="form-control" inputmode="text"
                                      required>
                              </div>
                              <!-- /.input group -->
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="city" class="form-label">City</label>
                                      <input type="text" name="city" id="city" class="form-control" required>
                                  </div>
                              </div>

                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="country" class="form-label">Country</label>
                                      <input type="text" name="country" id="country" class="form-control" required>
                                  </div>
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="device">Your Device Type</label>
                              <select id="device_id" name="device_id" class="form-control custom-select" required>
                                  <option value="" disabled {{ old('device_id') == '' ? 'selected' : '' }}>
                                      Select device
                                  </option>
                                  @foreach ($devices as $device)
                                      {{-- Change the value to $device->id --}}
                                      <option value="{{ $device->id }}" {{-- Update the old() check to use the correct input name 'device_id' and compare against $device->id --}}
                                          {{ (string) old('device_id') === (string) $device->id ? 'selected' : '' }}>
                                          {{ $device->name }}
                                      </option>
                                  @endforeach
                              </select>
                          </div>

                                                    <div class="form-group">
                              <label for="target_device_id">Target Device Type</label>
                              <select id="target_device_id" name="target_device_id" class="form-control custom-select" required>
                                  <option value="" disabled {{ old('target_device_id') == '' ? 'selected' : '' }}>
                                      Select device
                                  </option>
                                  @foreach ($devices as $device)
                                      {{-- Change the value to $device->id --}}
                                      <option value="{{ $device->id }}" {{-- Update the old() check to use the correct input name 'device_id' and compare against $device->id --}}
                                          {{ (string) old('target_device_id') === (string) $device->id ? 'selected' : '' }}>
                                          {{ $device->name }}
                                      </option>
                                  @endforeach
                              </select>
                          </div>

                          <div class="form-group">
                              <label for="inputSubject">Subject</label>
                              <input type="text" id="subject" name="subject" class="form-control" required />
                          </div>

                          <div class="form-group">
                              <label for="inputMessage">Message</label>
                              <textarea id="message" name="message" class="form-control" rows="4" required></textarea>
                          </div>

                          <div id="contactAlert"></div>

                          <div class="form-group">
                              <input type="submit" class="btn btn-primary" value="Send message">
                          </div>
                      </form>
                  </div>

              </div>
          </div>

      </div>

      </section>
      <!-- /.content -->



      </section>
  @endsection

  @section('js')
      <script>
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
