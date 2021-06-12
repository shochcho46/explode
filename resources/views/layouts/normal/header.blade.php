<!-- Navbar -->

<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar double-nav elegant-color-dark ">



    <!-- SideNav slide-out button -->

    <div class=" clearfix d-xxl-none float-left">
      <a href="#" data-activates="slide-out" class="button-collapse amber-text"><i class="mdi mdi-menu"></i></a>
    </div>



    <a class="navbar-brand ml-2 mr-auto amber-text" href="{{ route('normal.home') }}"><b>EXPLODE</b></a>



    <!-- Breadcrumb-->


    <ul class="nav navbar-nav nav-flex-icons ml-auto ">


        <li class="clearfix nav-item  d-none d-lg-block">
            <a href="{{ route('normal.aboutload') }}" class="amber-text nav-link waves-effect"><span class="clearfix d-none d-sm-inline-block"><b>About</b></span></a>
        </li>

        <li class="clearfix nav-item   d-none d-lg-block ">
            <a href="{{ route('normal.tournamentload') }}" class="black-text nav-link waves-effect btn btn-amber  btn-rounded btn-sm"><i class="mdi mdi-trophy "></i><b> Tournament</b></a>
        </li>

        <li class="clearfix nav-item  d-none d-lg-block">
            <a href="{{ route('normal.gameload') }}" class=" amber-text nav-link waves-effect"><span class="clearfix d-none d-sm-inline-block"><b>Games</b></span></a>
        </li>
        <li class="clearfix nav-item  d-none d-lg-block">
            <a href="{{ route('normal.documentload') }}" class=" amber-text nav-link waves-effect"><span class="clearfix d-none d-sm-inline-block"><b>Documentation</b></span></a>
        </li>



    </ul>

    <ul class="nav navbar-nav nav-flex-icons ml-auto">


    </ul>


    <!--Navbar links-->
    <ul class="nav navbar-nav nav-flex-icons ml-auto">

      <!-- Dropdown -->

      <li class=" clearfix nav-item">
        <a class="nav-link waves-effect amber-text" href ="{{ route('normal.signup') }}"><i class="mdi mdi-18px mdi-account-plus"></i> <span class="clearfix d-none d-sm-inline-block">Sign Up</span></a>
      </li>
      <li class="clearfix nav-item">
        <a class="nav-link waves-effect amber-text" href = "{{ route('normal.login') }}"><i class="mdi mdi-18px mdi-login "></i> <span class="clearfix d-none d-sm-inline-block">Login</span></a>
      </li>



    </ul>
    <!--/Navbar links-->
  </nav>
  <!-- /.Navbar -->
