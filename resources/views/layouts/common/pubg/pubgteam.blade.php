<form class="text-center" style="color: #757575;" method="POST" id="signup" action="{{ route('teamupdate.update',$data->id) }}"
    enctype="multipart/form-data">
    @csrf


<div class="card elegant-color-dark white-text">
<div class="card card-body elegant-color-dark white-text">



    <small for="" class="white-text text-muted">Team Info</small>

            <div class="md-form">
                <input type="text" name="team_name" id="team_name" value="{{ old('team_name') ?? $data->team_name }}"  class="form-control  white-text" required>
                <label for="team_name" class=" white-text"><small>Team Name : </small></label>
            </div>

            @if($errors->has('team_name'))
            <div class="error text-danger m-2">{{ $errors->first('team_name') }}</div>
            @endif


            <small for="" class="white-text text-muted">Team logo</small>
            @include('layouts.common.pagepart.picupload')






        <!-- Phone number -->
        <div class="md-form">
            <input type="number" name="rzs" id="rzs" class="form-control  white-text" value="{{ old('rzs') ?? $data->rzs }}"  required min="1"
                aria-describedby="rzsbatch">
            <label for="rzs" class=" white-text"><small>Rzs Batch/Class</small></label>


        </div>
        @if($errors->has('rzs'))
        <div class="error text-danger m-2">{{ $errors->first('rzs') }}</div>
        @endif





<button class="btn btn-outline-amber btn-rounded btn-sm my-4 waves-effect z-depth-0"
    type="submit">UPDATE</button>


</div>

</div>
</form>
