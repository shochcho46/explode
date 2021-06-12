 <!-- Sidebar navigation -->
 <div id="slide-out" class="side-nav elegant-color-dark fixed">
    <ul class="custom-scrollbar">
      <!-- Logo -->
      <li class="logo-sn waves-effect  text-center">

        <img src="{{ asset('logo/logo.png') }}">


    </li>

        <ul class="collapsible collapsible-accordion">




          <li>
              <a href="{{ route('admin.home') }}" class="collapsible-header waves-effect amber-text "><i class="mdi mdi-view-dashboard-variant-outline"></i>
            Dashboards</a>

        </li>


        <hr class="grey darken-3">

        <li><a class="collapsible-header waves-effect arrow-r amber-text"><i class="mdi mdi-gamepad-variant mr-1"></i><strong>Game</strong><i class="fas fa-angle-down rotate-icon"></i></a>

            <div class="collapsible-body">
              <ul>
                <li><a href="{{ route('game.create') }}" class="waves-effect amber-text">add game</a>
                </li>
                <li><a href="{{ route('game.index') }}" class="waves-effect amber-text">game list</a>
                </li>
                <li><a href="{{ route('game.disableindex') }}" class="waves-effect amber-text">disable list</a>
                </li>
              </ul>
            </div>

          </li>


        <li><a class="collapsible-header waves-effect arrow-r amber-text"><i class="mdi mdi-trophy mr-1"></i><strong>Tournament</strong><i class="fas fa-angle-down rotate-icon"></i></a>

            <div class="collapsible-body">
              <ul>
                <li>
                    <a href="{{ route('tournament.create') }}" class="waves-effect amber-text">add tournament</a>
                </li>
                <li>
                    <a href="{{ route('tournament.tournamentbygame') }}" class="waves-effect amber-text">tournament by game</a>
                </li>
                <li><a href="{{ route('tournament.index') }}" class="waves-effect amber-text">tournament list</a>
                </li>
                <li><a href="{{ route('tournament.disableindex') }}" class="waves-effect amber-text">disable list</a>
                </li>


              </ul>
            </div>

          </li>



        {{-- <li><a class="collapsible-header waves-effect arrow-r"><i class="mdi mdi-dots-horizontal-circle-outline mr-1"></i> Main Menu<i class="fas fa-angle-down rotate-icon"></i></a>

            <div class="collapsible-body">
              <ul>
                <li><a href="{{ route('mainmenu.create') }}" class="waves-effect">add menu</a>
                </li>
                <li><a href="{{ route('mainmenu.index') }}" class="waves-effect">menu list</a>
                </li>
                <li><a href="{{ route('mainmenu.disableindex') }}" class="waves-effect">disable list</a>
                </li>
              </ul>
            </div>

          </li>

        <li><a class="collapsible-header waves-effect arrow-r"><i class="mdi mdi-dots-vertical-circle-outline mr-1"></i> Sub Menu<i class="fas fa-angle-down rotate-icon"></i></a>

            <div class="collapsible-body">
              <ul>
                <li><a href="{{ route('submenu.create') }}" class="waves-effect">add submenu</a>
                </li>
                <li><a href="{{ route('submenu.index') }}" class="waves-effect">submenu list</a>
                </li>
                <li><a href="{{ route('submenu.disableindex') }}" class="waves-effect">disable list</a>
                </li>
              </ul>
            </div>

          </li> --}}

          @if((Auth::user()->type == "admin")||(Auth::user()->type == "superadmin")||(Auth::user()->type == "subadmin"))



        <li><a class="collapsible-header waves-effect arrow-r amber-text"><i class="mdi mdi-account-tie mr-1"></i><strong> User</strong><i class="fas fa-angle-down rotate-icon"></i></a>

            <div class="collapsible-body">
              <ul>


                @if((Auth::user()->type == "admin")||(Auth::user()->type == "superadmin"))

                <li>
                    <a href="{{ route('admin.usercreate') }}" class="waves-effect amber-text">add user</a>
                </li>
                @endif


                <li>
                    <a href="{{ route('admin.getnormaluserlist') }}" class="waves-effect amber-text">normal user list</a>
                </li>

                <li>
                    <a href="{{ route('admin.getnormaluserblacklist') }}" class="waves-effect amber-text">blacklist user</a>
                </li>

                @if((Auth::user()->type == "admin")||(Auth::user()->type == "superadmin"))

                <li>
                    <a href="{{ route('admin.getsubadminlist') }}" class="waves-effect amber-text">subadmin  list</a>
                </li>

                <li>
                    <a href="{{ route('admin.getsubadminblacklist') }}" class="waves-effect amber-text">blacklist subadmin</a>
                </li>

                @endif

                @if((Auth::user()->type == "superadmin"))

                <li>
                    <a href="{{ route('admin.getadminlist') }}" class="waves-effect amber-text">admin  list</a>
                </li>

                <li>
                    <a href="{{ route('admin.getadminblacklist') }}" class="waves-effect amber-text">blacklist admin</a>
                </li>


                @endif



              </ul>
            </div>

          </li>

          @endif


        </ul>
      </li>
      <!--/. Side navigation links -->
    </ul>
    {{-- <div class="sidenav-bg mask-strong" style=" background: #9933cc;"></div> --}}
  </div>
  <!--/. Sidebar navigation -->
