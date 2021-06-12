 <!-- Sidebar navigation -->
 <div id="slide-out" class="side-nav elegant-color-dark fixed">
    <ul class="custom-scrollbar">
      <!-- Logo -->
      <li class="logo-sn waves-effect  text-center">

              <img src="{{ asset('logo/logo.png') }}">


      </li>
      <!--/. Logo -->

      <!--Search Form-->
      <li class="">
        <hr>

      </li>
      <!--/.Search Form-->
      <!-- Side navigation links -->
      <li>
        <ul class="collapsible collapsible-accordion">







          <li>
              <a href="{{ route('normal.aboutload') }}" class="collapsible-header waves-effect amber-text"><i class="mdi mdi-information"></i>
            About</a>

        </li>

          <li>
              <a href="{{ route('normal.tournamentload') }}" class="collapsible-header waves-effect amber-text"><i class="mdi mdi-trophy"></i>
            Tournament</a>

        </li>






        <li>
            <a class="collapsible-header waves-effect arrow-r amber-text"><i class="mdi mdi-facebook-gaming mr-1"></i>Game<i class="fas fa-angle-down rotate-icon"></i></a>

            <div class="collapsible-body">
              <ul>
                @foreach($gamemenu as $key => $value)

                    <li>
                        <a href="{{ route('normal.gametournamentlist',$value->id) }}" class="waves-effect amber-text">{{$value->game_name }}</a>
                    </li>



                    @endforeach

              </ul>
            </div>

          </li>

          <li>
            <a href="{{ route('normal.documentload') }}" class="collapsible-header waves-effect amber-text"><i class="mdi mdi-text-box-outline"></i>
          Documentation</a>

      </li>



        </ul>
      </li>
      <!--/. Side navigation links -->
    </ul>

    {{-- <div class="sidenav-bg mask-strong didcolor" style=" background: #9933cc;"></div> --}}

  </div>
  <!--/. Sidebar navigation -->
