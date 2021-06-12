<form class="text-center" style="color: #757575;" method="POST" id="signup" action="{{ route('pubgplayer.update',$data->id) }}"
    enctype="multipart/form-data">
    @csrf


<div class="card elegant-color-dark white-text">
    <h6 class="card-header-pills p-2 amber-text"> {{ $data->tournament->tournament_name }}</h6>
<div class="card card-body elegant-color-dark white-text">



    <small for="" class="white-text text-muted">Team Name : {{ $data->team->team_name }}</small>
    <small for="" class="white-text text-muted">Player Type : {{ $data->playertype }}</small>
    <small for="" class="white-text text-muted">Player Serial : {{ $data->playerserial }}</small>



        <div class="md-form">
            <input type="text" name="pubg_id_name" id="pubg_id_name" value="{{ old('pubg_id_name') ?? $data->pubg_id_name }}"  class="form-control  white-text">
            <label for="pubg_id_name" class=" white-text"><small>PubgId Name  : </small></label>
        </div>

        @if($errors->has('pubg_id_name'))
        <div class="error text-danger m-2">{{ $errors->first('pubg_id_name') }}</div>
        @endif



        <div class="md-form">
            <input type="number" name="pubg_id_number" id="pubg_id_number" value="{{ old('pubg_id_number') ?? $data->pubg_id_number }}"  class="form-control  white-text"  min="1">
            <label for="pubg_id_number" class=" white-text"><small> PubgId Number :</small></label>
        </div>

        @if($errors->has('pubg_id_number'))
        <div class="error text-danger m-2">{{ $errors->first('pubg_id_number') }}</div>
        @endif







<button class="btn btn-outline-amber btn-rounded btn-sm my-4 waves-effect z-depth-0"
    type="submit">UPDATE</button>


</div>

</div>
</form>
