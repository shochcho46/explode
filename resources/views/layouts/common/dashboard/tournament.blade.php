<div class="card elegant-color-dark">

    <h5 class="card-header elegant-color white-text text-center py-4">
        <strong>TOURNAMENT DETAIL </strong>
        </h5>
    <div class="card-body ">


        <hr>

        <h5 class="white-text"> Active Tournament : <span class="white-text">{{ $tournamet->where('registration','active')->count() }}</span></h5>
        <h5 class="white-text"> Finish Tournament  : <span class="white-text">{{ $tournamet->where('registration','disable')->count() }} </span></h5>

        <hr>
        <h6 class="white-text text-center"> Total: {{ $tournamet->count() }}</h6>


    </div>

</div>


