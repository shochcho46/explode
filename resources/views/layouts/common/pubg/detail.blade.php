<h3 class="m-3 text-center amber-text">{{ $tName }}</h3>

<!-- Grid row -->
<div class="row">
    <!-- Grid column -->
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">


        <ul class="nav md-pills nav-justified pills-amber elegant-color-dark white-text mb-4">

          <li class="nav-item pl-0">
            <a class="nav-link white-text active" data-toggle="tab" href="#rule" role="tab">Rules</a>
          </li>
          <li class="nav-item">
            <a class="nav-link white-text " data-toggle="tab" href="#fixture" role="tab">Fixture</a>
          </li>
          <li class="nav-item pr-0">
            <a class="nav-link white-text" data-toggle="tab" href="#result" role="tab">Results</a>
          </li>
        </ul>
        <!-- Tab panels -->
        <div class="tab-content card elegant-color-dark">
          <!--Panel 1-->

          <!--/.Panel 1-->
          <!--Panel 2-->
          @include('layouts.common.pubg.rules')
          <!--/.Panel 2-->
          <!--Panel 3-->
          @include('layouts.common.pubg.fixture')

          @include('layouts.common.pubg.result')
          <!--/.Panel 3-->
        </div>


      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->
