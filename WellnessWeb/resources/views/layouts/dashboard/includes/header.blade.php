    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('dashboard/') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('dashboard/contact_us') }}" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

<li class="nav-item dropdown user-menu">
  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
    <img
      src="{{ asset('/uploads/avatars/' . Auth::user()->account->avatar) }}" 
      class="user-image img-circle elevation-2"
      alt="User Image"
      style="width: 30px; height: 30px;"
    >
  </a>

  <ul class="dropdown-menu dropdown-menu-right">
    <!-- User image -->
    <li class="user-header" style="background-color: #797792">
      <img
       src="{{ asset('/uploads/avatars/' . Auth::user()->account->avatar) }}" 
        class="img-circle elevation-2"
        alt="User Image"
      >
      <p style="color: white">
        {{  Auth::user()->account->name }}
        <small>Member since {{  Auth::user()->account->created_at->diffForHumans() }}</small>
      </p>
    </li>

    <!-- Menu Body (optional) -->
    <!--
    <li class="user-body">
      <div class="row">
        <div class="col-12 text-center">
          <a href="#">Followers</a>
        </div>
      </div>
    </li>
    -->

    <!-- Menu Footer-->
    <li class="user-footer">
      <a href="{{ url('dashboard/accounts/' . Auth::user()->account->id) }}" class="btn btn-default btn-flat">Profile</a>
      <a href="/logout" class="btn btn-default btn-flat float-right"
         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
      </a>

      <!-- Logout form (for Laravel / secure logout) -->
      <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>

    </li>
  </ul>
</li>



    
    </ul>

    <style>
      .main-header {
    background-color: #5e2ca5 !important; 
}
.main-header .nav-link {
    color: #ffffff !important; 
}
.main-header .nav-link:hover {
    color: #f1eaff !important; 
  }

    </style>