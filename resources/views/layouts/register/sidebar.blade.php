<div id="slide-out" class="side-nav elegant-color-dark fixed">
    <ul class="custom-scrollbar">
      <!-- Logo -->
      <li class="logo-sn waves-effect  text-center">

        <img src="{{ asset('logo/logo.png') }}">


    </li>

        <ul class="collapsible collapsible-accordion">

            @if ((Auth::user()->type == "admin")||(Auth::user()->type == "subadmin")||(Auth::user()->type == "superadmin"))

            <li>
                <a href="{{ route('admin.home') }}" class="collapsible-header waves-effect amber-text "><i class="mdi mdi-view-dashboard-variant-outline"></i>
              Dashboards</a>

          </li>

          @else

          <li>
            <a href="{{ route('register.dashboard') }}" class="collapsible-header waves-effect amber-text "><i class="mdi mdi-view-dashboard-variant-outline"></i>
          Dashboards</a>

      </li>


            @endif





        <hr class="grey darken-3">

        <li>
            <a href="{{ route('register.aboutload') }}" class="collapsible-header waves-effect amber-text"><i class="mdi mdi-information"></i>
          About</a>

      </li>

        <li><a class="collapsible-header waves-effect arrow-r amber-text"><i class="mdi mdi-trophy mr-1"></i>Tournament<i class="fas fa-angle-down rotate-icon"></i></a>

            <div class="collapsible-body">
              <ul>
                <li><a href="{{ route('register.tournamentload') }}" class="waves-effect amber-text">all tournament</a>
                </li>
                <li><a href="{{ route('register.regtournament') }}" class="waves-effect amber-text">my registered tournament</a>
                </li>

              </ul>
            </div>

          </li>




          <li>
            <a class="collapsible-header waves-effect arrow-r amber-text"><i class="mdi mdi-facebook-gaming mr-1"></i>Game<i class="fas fa-angle-down rotate-icon"></i></a>

            <div class="collapsible-body">
              <ul>
                @foreach($gamemenu as $key => $value)

                    <li>
                        <a href="{{ route('register.gametournamentlist',$value->id) }}" class="waves-effect amber-text">{{$value->game_name }}</a>
                    </li>



                    @endforeach

              </ul>
            </div>

          </li>


      <li>
        <a href="{{ route('register.documentload') }}" class="collapsible-header waves-effect amber-text"><i class="mdi mdi-text-box-outline"></i>
      Documentation</a>

  </li>


        </ul>
      </li>
      <!--/. Side navigation links -->
    </ul>
    <div class="sidenav-bg mask-strong didcolor" style=" background: #9933cc;"></div>
  </div>
  <!--/. Sidebar navigation -->
