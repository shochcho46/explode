<form class="text-center" style="color: #757575;" method="POST" id="signup" action="{{ route('pubgperson.update',$data->user->id) }}"
                    enctype="multipart/form-data">
                    @csrf


<div class="card elegant-color-dark white-text">
    <div class="card card-body elegant-color-dark white-text">


<small for="" class="white-text text-muted">Personal Info</small>




                        <div class="md-form">
                            <input type="text" name="name" id="materialRegisterFormFirstName" value="{{ old('name') ?? $data->user->name }}"  class="form-control  white-text" required>
                            <label for="materialRegisterFormFirstName" class=" white-text"><small>Name</small></label>
                        </div>

                        @if($errors->has('name'))
                        <div class="error text-danger m-2">{{ $errors->first('name') }}</div>
                        @endif




                        <!-- E-mail -->
                        <div class="md-form ">
                            <input type="email" name="email" id="materialRegisterFormEmail" value="{{ old('email') ?? $data->user->email }}" class="form-control  white-text" required>
                            <label for="materialRegisterFormEmail" class=" white-text"><small>E-mail</small></label>
                        </div>

                        @if($errors->has('email'))
                        <div class="error text-danger m-2">{{ $errors->first('email') }}</div>
                        @endif

                        <!-- Phone number -->
                        <div class="md-form">
                            <input type="number" name="mobile" id="materialRegisterFormPhone" class="form-control  white-text" value="{{ old('mobile') ?? $data->user->mobile }}"  required min="1"
                                aria-describedby="materialRegisterFormPhoneHelpBlock">
                            <label for="materialRegisterFormPhone" class=" white-text"><small>Phone number</small></label>


                        </div>
                        @if($errors->has('mobile'))
                        <div class="error text-danger m-2">{{ $errors->first('mobile') }}</div>
                        @endif


            <button class="btn btn-outline-amber btn-rounded btn-sm my-4 waves-effect z-depth-0"
                    type="submit">UPDATE</button>


        </div>

    </div>
</form>
