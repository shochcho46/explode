@include('layouts.common.message.message')

<div class="tab-pane fade in show active" id="registration" role="tabpanel">


    <div class="card elegant-color-dark white-text">


        <!--Card content-->
        <div class="card-body px-lg-5 pt-0">

            <!-- Form -->

            @auth
                <form class="text-center" style="color: #757575;" method="POST" id="signup" action="{{ route('pubg.reguserregister') }}"
                enctype="multipart/form-data">
                @csrf
            @endauth

            @guest
                <form class="text-center" style="color: #757575;" method="POST" id="signup" action="{{ route('pubg.register') }}"
                enctype="multipart/form-data">
                @csrf
            @endguest






                <!-- First name -->
                <small for="" class="white-text text-muted">Personal Info</small>





                <div class="row">
                    @guest
                    <div class="col-md-3">

                        <div class="md-form">
                            <input type="text" name="name" id="materialRegisterFormFirstName" value="{{ old('name') }}"  class="form-control  white-text" required>
                            <label for="materialRegisterFormFirstName" class=" white-text"><small>Name</small></label>
                        </div>

                        @if($errors->has('name'))
                        <div class="error text-danger m-2">{{ $errors->first('name') }}</div>
                        @endif

                    </div>

                    <div class="col-md-3">
                        <!-- E-mail -->
                        <div class="md-form ">
                            <input type="email" name="email" id="materialRegisterFormEmail" value="{{ old('email') }}" class="form-control  white-text" required>
                            <label for="materialRegisterFormEmail" class=" white-text"><small>E-mail</small></label>
                        </div>

                        @if($errors->has('email'))
                        <div class="error text-danger m-2">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    <div class="col-md-3">
                        <!-- Phone number -->
                        <div class="md-form">
                            <input type="number" name="mobile" id="materialRegisterFormPhone" class="form-control  white-text" value="{{ old('mobile') }}"  required min="1"
                                aria-describedby="materialRegisterFormPhoneHelpBlock">
                            <label for="materialRegisterFormPhone" class=" white-text"><small>Phone number</small></label>


                        </div>
                        @if($errors->has('mobile'))
                        <div class="error text-danger m-2">{{ $errors->first('mobile') }}</div>
                        @endif
                    </div>


                    <div class="col-md-3">
                        <!-- Phone number -->
                        <div class="md-form">
                            <input type="number" name="rzs" id="rzsbatch" class="form-control  white-text" value="{{ old('rzs') }}"  required min="1"
                                aria-describedby="rzsbatch">
                            <label for="rzsbatch" class=" white-text"><small>Rzs Batch/Class</small></label>


                        </div>
                        @if($errors->has('rzs'))
                        <div class="error text-danger m-2">{{ $errors->first('rzs') }}</div>
                        @endif
                    </div>

                 @endguest


                @auth

                    <div class="col-md-12">
                        <!-- Phone number -->
                        <div class="md-form">
                            <input type="number" name="rzs" id="rzsbatch" class="form-control  white-text" value="{{ old('rzs') }}"  required min="1"
                                aria-describedby="rzsbatch">
                            <label for="rzsbatch" class=" white-text"><small>Rzs Batch/Class</small></label>


                        </div>
                        @if($errors->has('rzs'))
                        <div class="error text-danger m-2">{{ $errors->first('rzs') }}</div>
                        @endif
                    </div>



                 @endauth


            </div>

            <hr class="amber lighten-2">


            <small for="" class="white-text text-muted">Player Info</small>

            <div class="row">
                <div class="col-md-3">

                    <div class="md-form">
                        <input type="text" name="onename" id="onename" value="{{ old('onename') }}"  class="form-control  white-text" required>
                        <label for="onename" class=" white-text"><small>P1 PubgId Name (Leader) : </small></label>
                    </div>

                    @if($errors->has('onename'))
                    <div class="error text-danger m-2">{{ $errors->first('onename') }}</div>
                    @endif

                </div>
                <div class="col-md-3">

                    <div class="md-form">
                        <input type="number" name="onenumber" id="onenumber" value="{{ old('onenumber') }}"  class="form-control  white-text" required min="1">
                        <label for="onenumber" class=" white-text"><small> P1 PubgId Number</small></label>
                    </div>

                    @if($errors->has('onenumber'))
                    <div class="error text-danger m-2">{{ $errors->first('onenumber') }}</div>
                    @endif

                </div>



                <div class="col-md-3">

                    <div class="md-form">
                        <input type="text" name="twoname" id="twoname" value="{{ old('twoname') }}"  class="form-control  white-text" required>
                        <label for="twoname" class=" white-text"><small>P2 PubgId Name  : </small></label>
                    </div>

                    @if($errors->has('twoname'))
                    <div class="error text-danger m-2">{{ $errors->first('twoname') }}</div>
                    @endif

                </div>
                <div class="col-md-3">

                    <div class="md-form">
                        <input type="number" name="twonumber" id="twonumber" value="{{ old('twonumber') }}"  class="form-control  white-text" required min="1">
                        <label for="twonumber" class=" white-text"><small> P2 PubgId Number</small></label>
                    </div>

                    @if($errors->has('twonumber'))
                    <div class="error text-danger m-2">{{ $errors->first('twonumber') }}</div>
                    @endif

                </div>



            </div>


            <div class="row">
                <div class="col-md-3">

                    <div class="md-form">
                        <input type="text" name="threename" id="threename" value="{{ old('threename') }}"  class="form-control  white-text" required>
                        <label for="threename" class=" white-text"><small>P3 PubgId Name : </small></label>
                    </div>

                    @if($errors->has('threename'))
                    <div class="error text-danger m-2">{{ $errors->first('threename') }}</div>
                    @endif

                </div>
                <div class="col-md-3">

                    <div class="md-form">
                        <input type="number" name="threenumber" id="threenumber" value="{{ old('threenumber') }}"  class="form-control  white-text" required min="1">
                        <label for="threenumber" class=" white-text"><small> P3 PubgId Number</small></label>
                    </div>

                    @if($errors->has('threenumber'))
                    <div class="error text-danger m-2">{{ $errors->first('threenumber') }}</div>
                    @endif

                </div>



                <div class="col-md-3">

                    <div class="md-form">
                        <input type="text" name="fourname" id="fourname" value="{{ old('fourname') }}"  class="form-control  white-text" required>
                        <label for="fourname" class=" white-text"><small>P4 PubgId Name  : </small></label>
                    </div>

                    @if($errors->has('fourname'))
                    <div class="error text-danger m-2">{{ $errors->first('fourname') }}</div>
                    @endif

                </div>
                <div class="col-md-3">

                    <div class="md-form">
                        <input type="number" name="fournumber" id="fournumber" value="{{ old('fournumber') }}"  class="form-control  white-text" required min="1">
                        <label for="fournumber" class=" white-text"><small> P4 PubgId Number</small></label>
                    </div>

                    @if($errors->has('fournumber'))
                    <div class="error text-danger m-2">{{ $errors->first('fournumber') }}</div>
                    @endif

                </div>



            </div>

{{-- USE FOR FUTURE --}}

            {{-- <small>Substitute Player (Optional)</small>

            <div class="row">
                <div class="col-md-3">

                    <div class="md-form">
                        <input type="text" name="fivename" id="fivename" value="{{ old('fivename') }}"  class="form-control  white-text" >
                        <label for="fivename" class=" white-text"><small>P5 PubgId Name : </small></label>
                    </div>

                    @if($errors->has('fivename'))
                    <div class="error text-danger m-2">{{ $errors->first('fivename') }}</div>
                    @endif

                </div>
                <div class="col-md-3">

                    <div class="md-form">
                        <input type="number" name="fivenumber" id="fivenumber" value="{{ old('fivenumber') }}"  class="form-control  white-text"  min="1">
                        <label for="fivenumber" class=" white-text"><small> P5 PubgId Number</small></label>
                    </div>

                    @if($errors->has('fivenumber'))
                    <div class="error text-danger m-2">{{ $errors->first('fivenumber') }}</div>
                    @endif

                </div>



                <div class="col-md-3">

                    <div class="md-form">
                        <input type="text" name="sixname" id="sixname" value="{{ old('sixname') }}"  class="form-control  white-text">
                        <label for="sixname" class=" white-text"><small>P6 PubgId Name  : </small></label>
                    </div>

                    @if($errors->has('sixname'))
                    <div class="error text-danger m-2">{{ $errors->first('sixname') }}</div>
                    @endif

                </div>

                <div class="col-md-3">

                    <div class="md-form">
                        <input type="number" name="sixnumber" id="sixnumber" value="{{ old('sixnumber') }}"  class="form-control  white-text"  min="1">
                        <label for="sixnumber" class=" white-text"><small> P6 PubgId Number</small></label>
                    </div>

                    @if($errors->has('sixnumber'))
                    <div class="error text-danger m-2">{{ $errors->first('sixnumber') }}</div>
                    @endif

                </div>



            </div> --}}

{{-- USE FOR FUTURE --}}

            <hr class="amber lighten-2">

            <small for="" class="white-text text-muted">Team Info</small>


            <div class="row">
                <div class="col-md-6">

                    <div class="md-form">
                        <input type="text" name="team_name" id="team_name" value="{{ old('team_name') }}"  class="form-control  white-text" required>
                        <label for="team_name" class=" white-text"><small>Team Name : </small></label>
                    </div>

                    @if($errors->has('team_name'))
                    <div class="error text-danger m-2">{{ $errors->first('team_name') }}</div>
                    @endif

                </div>

                <div class="col-md-6">
                    <small for="" class="white-text text-muted">Team logo</small>
                    @include('layouts.common.pagepart.picupload')

                </div>







            </div>

            <input type="hidden"  name="tournament_id"  value="{{ old('tournament_id') ?? $tournametid}}" required  class="form-control">



                <!-- Sign up button -->
                <button class="btn btn-outline-amber btn-rounded btn-block my-4 waves-effect z-depth-0"
                    type="submit">Sign up</button>



                <hr>

                <!-- Terms of service -->
                <p>By clicking
                    <em>Sign up</em> you agree to our
                    <a href="" target="_blank">terms of service</a>





            </form>
            <!-- Form -->

        </div>

    </div>



    </div>



