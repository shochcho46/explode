@if (empty($data)||count($data)<=0)
<div class=" m-4 amber-text">
    <h1 class="m-3 text-center">
        SORRY CURRENTLY THERE IS NO TOURNAMENT FOR THIS GAME !!!
    </h1>

</div>
@else

@include('layouts.common.message.message')
<div class=" m-4 amber-text">
    <h3 class="m-3 text-center">
        TOURNAMENTS

    </h3>

</div>


@foreach ($data as $value)
<div class="m-3 d-none d-md-block">


<div class="row ">

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 elegant-color">
        <div class="card-body">
            <img src="{{ $value->location }}" class="card-img-top ">
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 elegant-color">
        <div class="card-body">
            <h4 class="text-center amber-text m-1 card-title">{{ $value->tournament_name }}</h4>
            <h6 class="white-text"> Ragistration Status : {{ $value->registration }}</h6>
            <h6 class="white-text"> Register :{{ $value->teams->count() }} </h6>
            <h6 class="white-text"> Total Slots : {{ $value->total }}</h6>
            <h6 class="white-text"> Ragistration Ends : {{  \Carbon\Carbon::parse($value->enddate)->diffForhumans()  }}</h6>

            @guest
                @if ($value->registration == "disable")
                <a href="{{ route('gamereg.tournamentdetail', $value->id) }}" class="btn btn-amber waves-effect btn-rounded btn-sm ">Details</a>
                @else
                <a href="{{ route('gamereg.loadform', $value->id) }}" class="btn btn-amber waves-effect btn-rounded btn-sm">Ragister Now</a>
                @endif
            @endguest

            {{-- not done yeat --}}


            @auth
                @if ($value->registration == "disable")
                <a href="{{ route('gamereg.tournamentdetail', $value->id) }}" class="btn btn-amber waves-effect btn-rounded btn-sm">Details</a>
                @else
                <a href="{{ route('register.loadform', $value->id) }}" class="btn btn-amber waves-effect btn-rounded btn-sm">Ragister Now</a>
                @endif
            @endauth


        </div>
    </div>



    </div>








</div>


<div class="m-3 d-md-none ">
    <div class="card card-cascade wider black">

        <!-- Card image -->
        <div class="view view-cascade overlay">
          <img class="card-img-top" src="{{ $value->location }}" alt="{{ $value->tournament_name }}">
          <a href="#!">
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>

        <!-- Card content -->
        <div class="card-body card-body-cascade text-left elegant-color pb-0">

          <!-- Title -->
          <h6 class="card-title amber-text"><strong>{{ $value->tournament_name }}</strong></h6>

            <small class="white-text"> Ragistration Status : {{ $value->registration }}</small><br>
            <small class="white-text"> Register :{{ $value->teams->count() }} </small><br>
            <small class="white-text"> Total Slots : {{ $value->total }}</small><br>
            <small class="white-text"> Ragistration Ends : {{  \Carbon\Carbon::parse($value->enddate)->diffForhumans()  }}<br>



          <!-- Card footer -->
          <div class="card-footer  text-center mt-4">
            @guest
                @if ($value->registration == "disable")
                <a href="{{ route('gamereg.tournamentdetail', $value->id) }}" class="btn btn-amber waves-effect btn-rounded btn-sm ">Details</a>
                @else
                <a href="{{ route('gamereg.loadform', $value->id) }}" class="btn btn-amber waves-effect btn-rounded btn-sm">Ragister Now</a>
                @endif
            @endguest




        @auth
            @if ($value->registration == "disable")
            <a href="{{ route('gamereg.tournamentdetail', $value->id) }}" class="btn btn-amber waves-effect btn-rounded btn-sm">Details</a>
            @else
            <a href="{{ route('register.loadform', $value->id) }}" class="btn btn-amber waves-effect btn-rounded btn-sm">Ragister Now</a>
            @endif
        @endauth
          </div>

        </div>

      </div>
</div>
@endforeach

@endif



