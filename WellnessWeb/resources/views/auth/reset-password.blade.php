<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Wellness | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/fontawesome-free/css/all.min.css') }}" />
  <!-- icheck bootstrap -->
<link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" />
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dashboard/dist/css/adminlte.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

       <style>
        .nav-link.active {
            background-color: #6f42c1 !important;
            /* purple */
            color: #fff !important;
        }

        .btn-primary {
            background-color: #6f42c1 !important;
            /* purple */
            border-color: #6f42c1 !important;
        }

        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active {
            background-color: #5a32a1 !important;
            /* darker purple */
            border-color: #5a32a1 !important;
        }
    </style>

</head>
<body class="hold-transition login-page">
<div class="login-box">
        <div class="login-logo ">
            <a href="{{ route('register') }}">
                <img src="{{ asset('assets/dashboard/dist/img/logo.png') }}" class="brand-image img-circle elevation-3"
                    style="height:40px; margin-right:10px;opacity: .8" alt="Logo"
                    style="height:40px; margin-right:10px;">
                <b>TotalWellness</b>
            </a>
        </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Reset Password</p>

    <form method="POST" action="{{ route('password.store') }}">
       @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="input-group mb-3">
          <input id="email" type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email', $request->email) }}" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

          @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror

        <div class="input-group mb-3">
          <input id="password" type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

            @error('password')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror


               <div class="input-group mb-3">
                 <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required autocomplete="new-password">
                 <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                 </div>
               </div>

             @error('password_confirmation')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        <div class="row">
          <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('assets/dashboard/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dashboard/dist/js/adminlte.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>
    @if ($errors->any())    
    @foreach ($errors->all() as $error)
        toastr.error("{{ $error }}");
    @endforeach
    @endif

    @if (session('success'))
    toastr.success("{{ session('success') }}");
    @endif
</script>

</body>
</html>
