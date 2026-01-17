<!-- Brand Logo -->
<style>
.main-sidebar {
    background-color: #ffffff !important;
}

.brand-link {
    background: linear-gradient(135deg, #5e2ca5, #7b4fd6);
    color: #fff !important;
    border-bottom: none;
}
.brand-link .brand-text {
    color: #fff !important;
    font-weight: 600;
}
.brand-link img {
    background: white;
    padding: 4px;
    border-radius: 50%;
}

.user-panel {
    border-bottom: 1px solid #eee;
}
.user-panel .info a {
    color: #5e2ca5 !important;
    font-weight: 600;
}

.nav-sidebar .nav-link {
    color: #444 !important;
    border-radius: 8px;
    margin: 4px 8px;
    transition: all 0.2s ease-in-out;
}

.nav-sidebar .nav-icon {
    color: #7b4fd6 !important; 
    font-size: 16px;
}

.nav-sidebar .nav-link:hover {
    background-color: rgba(123, 79, 214, 0.12) !important;
    color: #5e2ca5 !important;
}
.nav-sidebar .nav-link:hover .nav-icon {
    color: #5e2ca5 !important;
}

.nav-sidebar .nav-link.active {
    background: linear-gradient(135deg, #5e2ca5, #7b4fd6) !important;
    color: #fff !important;
    box-shadow: 0 4px 10px rgba(94, 44, 165, 0.35);
}
.nav-sidebar .nav-link.active .nav-icon {
    color: #fff !important;
}

.nav-treeview .nav-icon {
    font-size: 10px;
    color: #7b4fd6 !important;
}

.badge-danger {
    background-color: #7b4fd6 !important;
}


</style>
<a href="{{ url('dashboard/') }}" class="brand-link">
    <img src="{{ asset('assets/dashboard/dist/img/logo.png') }}" class="brand-image img-circle elevation-3 "
        style="opacity: .8">
    <span class="brand-text font-weight-dark">TotalWellness</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('/uploads/avatars/' . Auth::user()->account->avatar) }}" class="img-circle elevation-2"
                alt="User Image">
        </div>
        <div class="info accent-purple">
            <a href="{{ url('dashboard/accounts/' . Auth::user()->account->id) }}" class="d-block">
                {{ Auth::user()->account->name }} </a>
        </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            @if (auth()->user()->isAdmin())
                <li class="nav-item">
                    <a href="{{ url('dashboard/accounts') }}"
                        class="nav-link {{ Request::is('dashboard/accounts*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Accounts Manager
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
            @endif

              @if (auth()->user()->isCenter())
                <li class="nav-item">
                    <a href="{{ url('dashboard/jobApplications') }}"
                        class="nav-link {{ Request::is('dashboard/jobApplication*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-regular fa-id-card"></i>
                        <p>
                           Manage Applicants 
                         </p>
                    </a>
                </li>
            @endif


              @if (auth()->user()->isAdmin())
                <li class="nav-item">
                    <a href="{{ url('dashboard/contactRequests') }}"
                        class="nav-link {{ Request::is('dashboard/contactRequests*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Contact Requests
                         </p>
                    </a>
                </li>
            @endif


             @if (auth()->user()->isAdmin())
                <li class="nav-item">
                    <a href="{{ url('dashboard/subscribtions') }}"
                        class="nav-link {{ Request::is('dashboard/subscribtions*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-solid fa-wallet"></i>
                        <p>
                            Subscribtions
                         </p>
                    </a>
                </li>
            @endif


            @if (auth()->user()->hasAnyRole(['admin', 'student', 'academy']))


            <li
                class="nav-item {{ Request::is('dashboard/courses*') || Request::is('dashboard/academies*') ? 'menu-is-opening menu-open' : '' }}">
                <a href="#"
                    class="nav-link {{ Request::is('dashboard/courses*') || Request::is('dashboard/academies*') ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-solid fa-certificate"></i>
                    <p> Educational Services
                        <i class="fas fa-angle-left right"></i>
                    </p>                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('dashboard/academies') }}"
                            class="nav-link {{ Request::is('dashboard/academies*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-landmark"></i>
                            <p>Affiliated Academies</p>
                        </a>


                    </li>
                    <li class="nav-item">
                        <a href="{{ url('dashboard/courses') }}"
                            class="nav-link {{ Request::is('dashboard/courses*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Courses Catalog
                            </p>
                        </a>
                    </li>
                </ul>
            </li>

                        @endif


       {{-- @if (auth()->user()->hasAnyRole(['admin', 'student', 'center']))

            <li class="nav-item">
                <a href="{{ url('dashboard/careers') }}"
                    class="nav-link {{ Request::is('dashboard/careers*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-briefcase"></i>
                    <p>
                        Hiring Platform
                    </p>
                </a>
            </li>
            @endif --}}


            @if (auth()->user()->isCenter())
                <li class="nav-item">
                    <a href="{{ url('dashboard/maintenance') }}"
                        class="nav-link {{ Request::is('dashboard/maintenance*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tools"></i>
                        Maintenance Support
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ url('dashboard/tradein') }}"
                        class="nav-link {{ Request::is('dashboard/tradein*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-solid fa-sitemap"></i>
                        <p>
                            Tade - In Program
                        </p>
                    </a>
                </li>
            @endif

            @if (auth()->user()->isAdmin())
                <li class="nav-item">
                    <a href="{{ url('dashboard/devices') }}"
                        class="nav-link {{ Request::is('dashboard/devices*') ? 'active' : '' }}">
                        <i class=" nav-icon fas fa-solid fa-dice"></i>
                        <p>
                            Devices & Products
                        </p>
                    </a>
                </li>
            @endif

            <li class="nav-item">
                <a href="{{ url('dashboard/contact_us') }}"
                    class="nav-link {{ Request::is('dashboard/contact_us*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-comments"></i>
                    <p>
                       Help & Support
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
