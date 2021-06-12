<!-- Navbar -->

<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar double-nav elegant-color-dark">



    <!-- SideNav slide-out button -->

    <div class=" clearfix d-xxl-none float-left">
      <a href="#" data-activates="slide-out" class="button-collapse amber-text"><i class="mdi mdi-menu"></i></a>
    </div>



    <a class="navbar-brand ml-2 mr-auto amber-text" href="{{ route('admin.home') }}"><b>EXPLODE</b></a>



    <!-- Breadcrumb-->




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
            <a class="dropdown-item" href="{{ route('register.home') }}" target="_blank"><i class="mdi mdi-web mdi-spin" aria-hidden="true"></i> EXPLODE </a>
            <a class="dropdown-item" href="{{ route('logout') }}"><i class="mdi mdi-logout" aria-hidden="true"></i> Log Out</a>
        </div>
      </li>

    </ul>
    <!--/Navbar links-->
  </nav>
  <!-- /.Navbar -->
