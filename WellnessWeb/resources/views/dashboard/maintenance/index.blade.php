  @extends('layouts.dashboard.app')

  @php
      $headerImage = asset('assets/dashboard/dist/img/mm.jpg');
  @endphp

  @section('css')
<style>
.landing-header {
    position: relative;
    height: 75vh;
    background: url("{{ $headerImage }}") center/cover no-repeat;
    display: flex;
    align-items: flex-end;
    padding: 60px;
    color: #fff;
}

.landing-header::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to top,
        rgba(0,0,0,.65),
        rgba(0,0,0,.2)
    );
}

.landing-header-title {
    position: relative;
    font-size: 42px;
    font-weight: 700;
    line-height: 1.3;
    max-width: 600px;
}

.content-card {
    border-radius: 14px;
    box-shadow: 0 10px 30px rgba(0,0,0,.05);
    border: none;
}

.landing-text-section h3 {
    font-weight: 700;
    margin-bottom: 15px;
}

.landing-text-section p {
    font-size: 17px;
    color: #555;
    line-height: 1.8;
}

.follow-container {
    text-align: center;
    padding: 80px 0;
}

.follow-container h1 {
    font-size: 34px;
    font-weight: 700;
    margin-bottom: 50px;
}

.logos {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 50px;
}

.logo {
    width: 180px;
    height: auto;
    opacity: 0.35;
    transition: all .3s ease;
}

.logo:hover {
    opacity: 1;
    transform: scale(1.08);
}

.form-card {
    max-width: 800px;
    margin: auto;
}

.form-control,
.custom-select {
    border-radius: 8px;
}

.btn-primary {
    padding: 10px 30px;
    border-radius: 30px;
    font-weight: 600;
}
</style>
@endsection



  @section('content')
      <div class="container-fluid">

          <!-- Header Section -->
         <div class="landing-header">
    <h1  style="color:black;">
        Smart Solutions for <br> Smooth Operations
    </h1>
</div>

          <!-- Content Section -->
          <div class="card content-card mt-4">
    <div class="card-body landing-text-section px-5 py-4">
        <h3>What We Offer?</h3>
        <p>
            With years of hands-on experience in servicing and maintaining laser devices,
            we ensure your equipment operates at peak performance. Our technicians
            specialize in preventive maintenance, calibration, and timely repairs —
            reducing downtime and extending equipment lifespan.
        </p>
    </div>
</div>


         <div class="follow-container">
    <h1>Brands Love Us!</h1>

    <div class="logos">
        <img src="{{ asset('assets/dashboard/dist/img/reprojectmaterialsupdated/1.png') }}" class="logo">
        <img src="{{ asset('assets/dashboard/dist/img/reprojectmaterialsupdated/2.png') }}" class="logo">
        <img src="{{ asset('assets/dashboard/dist/img/reprojectmaterialsupdated/3.png') }}" class="logo">
        <img src="{{ asset('assets/dashboard/dist/img/reprojectmaterialsupdated/4.png') }}" class="logo">
    </div>
</div>

          <div class="card">

              <div class="card content-card mb-5">
    <div class="card-body form-card">

        <h3 class="mb-4 text-center">Submit your question</h3>

        {{-- user block --}}
        @if (auth()->check())
        <div class="d-flex align-items-center mb-4">
            <img src="{{ asset('/uploads/avatars/' . Auth::user()->account->avatar) }}"
                 class="rounded-circle"
                 style="width:60px;height:60px;object-fit:cover">
            <strong class="ml-3">{{ auth()->user()->name }}</strong>
        </div>
        @endif

        
                      <form id="contactForm" action="{{ route('contact.maintenance') }}" method="POST">
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
                              <label for="device">Device Type</label>
                              <select id="device" name="device_id" class="form-control custom-select" required>
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
