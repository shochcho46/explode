@extends('layouts.admin.main')

@section('content')
 <div class="container">

    <div class="row">


    <div class="col-xs-0 col-sm-0 col-md-3 col-lg-3 col-xl-3">
    </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

            @include('layouts.common.message.message')



                 <form method="POST" action="{{ route('tournament.update',$data->id) }}"enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

            <!-- Material form subscription -->
                        <div class="card elegant-color-dark">

                            <h5 class="card-header elegant-color amber-text text-center py-4">
                                <strong>EDIT TOURNAMENT</strong>
                            </h5>

                            <!--Card content-->
                            <div class="card-body px-lg-5">

                                    <div class="md-form white-text">
                                    <select name ="game_id" class="mdb-select colorful-select dropdown-dark white-text" searchable="Search here.." required>
                                        <option value="" disabled selected>Game Name</option>


                                        @foreach($gamedata as  $value)
                                            @if($value->id == $data->game_id)

                                            <option class="p-2" selected value="{{ $value->id }}">
                                            {{ $value->game_name }}
                                            </option>
                                            @else
                                            <option class="p-2" value="{{ $value->id }}">
                                                {{ $value->game_name }}
                                            </option>
                                            @endif

                                        @endforeach


                                    </select>
                                    <label class="mdb-main-label white-text">Game name select</label>
                                    </div>

                                    <div class="md-form mt-3">
                                        <input type="text" id="tournament_name" name="tournament_name"  placeholder="Tournament Name" value="{{ old('tournament_name') ?? $data->tournament_name }}"required class="form-control white-text">
                                        <label for="tournament_name" class="white-text">Tournament name</label>
                                    </div>
                                    @if($errors->has('tournament_name'))
                                        <div class="error text-danger m-2">{{ $errors->first('tournament_name') }}</div>
                                    @endif

                                    <!-- E-mai -->
                                    <div class="md-form">
                                        <input type="number" id="serial" name="serial" placeholder="Serial" value="{{ old('serial') ?? $data->serial}}" required min="1" class="form-control white-text">
                                        <label for="serial" class="white-text">Serial</label>
                                    </div>
                                    @if($errors->has('serial'))
                                    <div class="error text-danger m-2">{{ $errors->first('serial') }}</div>
                                    @endif

                                    <div class="md-form">
                                        <input type="number" id="total" name="total" placeholder="Total team/player" value="{{ old('total') ?? $data->total }}" required min="1" class="form-control white-text">
                                        <label for="total" class="white-text">Total Team/Player</label>
                                    </div>
                                    @if($errors->has('total'))
                                    <div class="error text-danger m-2">{{ $errors->first('total') }}</div>
                                    @endif


                                    @include('layouts.common.pagepart.datetime')

                                    @include('layouts.common.pagepart.picupload')




                                    <input type="hidden"  name="status"  value="{{ $data->status }}" required  class="form-control">
                                    <input type="hidden"  name="user_id"  value="{{ Auth::user()->id }}" required  class="form-control">

                                    <!-- Sign in button -->
                                    <button class="btn btn-outline-amber btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">SUBMIT</button>

                                </form>
                                <!-- Form -->

                            </div>

                        </div>
                        <!-- Material form subscription -->


        </div>


    <div class="col-xs-0 col-sm-0 col-md-3 col-lg-3 col-xl-3">
    </div>


</div>


 </div>





@endsection

{{-- @section('script') --}}
<script type="text/javascript">

</script>
{{-- @endsection --}}

