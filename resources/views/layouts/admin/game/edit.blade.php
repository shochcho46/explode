@extends('layouts.admin.main')


@section('content')
 <div class="container">

    <div class="row mb-3">


    <div class="col-xs-0 col-sm-0 col-md-3 col-lg-3 col-xl-3">
    </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

            @include('layouts.common.message.message')

            <form method="POST" action="{{ route('game.update',$data->id) }}" enctype="multipart/form-data">

                @csrf

                @method('PUT')

            <!-- Material form subscription -->
                        <div class="card elegant-color-dark">

                            <h5 class="card-header elegant-color amber-text text-center py-4">
                                <strong>EDIT GAME</strong>
                            </h5>

                            <!--Card content-->
                            <div class="card-body px-lg-5">

                                <!-- Form -->

                                    <div class="md-form mt-3">
                                        <input type="text" id="game_name" name="game_name"  placeholder="Full Game Name" value="{{ old('game_name') ?? $data->game_name }}"required class="form-control white-text">
                                        <label for="game_name" class="white-text">Game Name</label>
                                    </div>
                                    @if($errors->has('game_name'))
                                        <div class="error text-danger m-2">{{ $errors->first('game_name') }}</div>
                                    @endif

                                    <!-- E-mai -->
                                    <div class="md-form">
                                        <input type="number" id="serial" name="serial" placeholder="Serial" value="{{ old('serial') ?? $data->serial }}" required min="1" class="form-control white-text">
                                        <label for="serial" class="white-text">Serial</label>
                                    </div>
                                    @if($errors->has('serial'))
                                    <div class="error text-danger m-2">{{ $errors->first('serial') }}</div>
                                    @endif

                                    <input type="hidden"  name="status"  value="{{ old('status') ?? $data->status}}" required  class="form-control">




                                    @include('layouts.common.pagepart.picupload')



                                    <!-- Sign in button -->
                                    <button class="btn btn-outline-amber btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">UPDATE</button>

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

