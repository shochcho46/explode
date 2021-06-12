

<div class=" m-4 amber-text">
    <h3 class="m-3 text-center">
        GAMES
    </h3>

</div>

<div class="row">

    @foreach ($data as $value)



    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">

        <div class="p-2 m-2">
            @auth
            <a href="{{ route('register.gametournamentlist',$value->id) }}" class="waves-effect">
            @endauth

            @guest
                <a href="{{ route('normal.gametournamentlist',$value->id) }}" class="waves-effect">
            @endguest



            <div class="card">
                <img src="{{ $value->location }}" class=" card-img-top img-fluid">
            </div>
            <h4 class="text-center amber-text m-1">{{ $value->game_name }}</h4>


            </a>

        </div>

    </div>

    @endforeach

</div>
