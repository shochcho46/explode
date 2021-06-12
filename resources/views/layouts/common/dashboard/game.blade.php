<div class="card elegant-color-dark">

    <h5 class="card-header elegant-color white-text text-center py-4">
        <strong>GAME DETAIL </strong>
        </h5>
    <div class="card-body ">


        <hr>

        <h5 class="white-text"> Active Game : <span class="white-text">{{ $game->where('status','active')->count() }}</span></h5>
        <h5 class="white-text"> Disbale Game : <span class="white-text">{{ $game->where('status','disable')->count() }} </span></h5>

        <hr>
        <h6 class="white-text text-center"> Total: {{ $game->count() }}</h6>


    </div>

</div>


