<!-- Navbar -->

<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar double-nav elegant-color-dark">



    <!-- SideNav slide-out button -->

    <div class=" clearfix d-xxl-none float-left">
      <a href="#" data-activates="slide-out" class="button-collapse amber-text"><i class="mdi mdi-menu"></i></a>
    </div>



    <a class="navbar-brand ml-2 mr-auto amber-text" href="{{ route('register.home') }}"><b>EXPLODE</b></a>



    <ul class="nav navbar-nav nav-flex-icons ml-auto ">


        <li class="clearfix nav-item  d-none d-lg-block">
            <a href="{{ route('register.aboutload') }}" class="amber-text nav-link waves-effect"><span class="clearfix d-none d-sm-inline-block"><b>About</b></span></a>
        </li>

        <li class="clearfix nav-item   d-none d-lg-block ">
            <a href="{{ route('register.tournamentload') }}" class="black-text nav-link waves-effect btn btn-amber  btn-rounded btn-sm"><i class="mdi mdi-trophy "></i><b> Tournament</b></a>
        </li>

        <li class="clearfix nav-item  d-none d-lg-block">
            <a href="{{ route('register.gameload') }}" class=" amber-text nav-link waves-effect"><span class="clearfix d-none d-sm-inline-block"><b>Games</b></span></a>
        </li>
        <li class="clearfix nav-item  d-none d-lg-block">
            <a href="{{ route('register.documentload') }}" class=" amber-text nav-link waves-effect"><span class="clearfix d-none d-sm-inline-block"><b>Documentation</b></span></a>
        </li>



    </ul>

    <ul class="nav navbar-nav nav-flex-icons ml-auto">


    </ul>



    <!--Navbar links-->
    <ul class="nav navbar-nav nav-flex-icons ml-auto">

        <!-- Dropdown -->

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle waves-effect amber-text" href="#" id="userDropdown" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">

            <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block amber-text">Profile</span></a>
          </a>
          <div class="dropdown-menu dropdown-dark dropdown-menu-right" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="{{ route('profile.index') }}"><i class="mdi mdi-cogs" aria-hidden="true"></i> Profile Setting</a>
              @if ((Auth::user()->type == "admin")||(Auth::user()->type == "subadmin")||(Auth::user()->type == "superadmin"))
                 <a class="dropdown-item" href="{{ route('admin.home') }}"><i class="mdi mdi-view-dashboard-variant" aria-hidden="true"></i> Website</a>

              @endif

              <a class="dropdown-item" href="{{ route('logout') }}"><i class="mdi mdi-logout" aria-hidden="true"></i> Log Out</a>
          </div>
        </li>

      </ul>
    <!--/Navbar links-->
  </nav>
  <!-- /.Navbar -->
