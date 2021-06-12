@extends('layouts.admin.main')

@section('content')
 <div class="container">

    <div class="row mb-3">


    <div class="col-xs-0 col-sm-0 col-md-3 col-lg-3 col-xl-3">
    </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

            @include('layouts.common.message.message')

            <div class="card elegant-color-dark white-text ">

                <h5 class="card-header elegant-color white-text text-center py-4">
                    <strong>Create New User</strong>
                </h5>

                <!--Card content-->
                <div class="card-body px-lg-5 pt-0">

                    <!-- Form -->

                        <form class="text-center" style="color: #757575;" method="POST" id="signup" action="{{ route('admin.addusertype') }}"
                            enctype="multipart/form-data">
                            @csrf
                            {{-- @method('POST') --}}


                        <!-- First name -->
                        <div class="md-form">
                            <input type="text" name="name" id="materialRegisterFormFirstName" value="{{ old('name') }}"  class="form-control white-text">
                            <label for="materialRegisterFormFirstName" class="white-text">Name</label>
                        </div>

                        @if($errors->has('name'))
                        <div class="error text-danger m-2">{{ $errors->first('name') }}</div>
                        @endif



                        <!-- E-mail -->
                        <div class="md-form mt-0">
                            <input type="email" name="email" id="materialRegisterFormEmail" value="{{ old('email') }}" class="form-control white-text">
                            <label for="materialRegisterFormEmail" class="white-text">E-mail</label>
                        </div>

                        @if($errors->has('email'))
                        <div class="error text-danger m-2">{{ $errors->first('email') }}</div>
                        @endif


                        <div class="md-form">
                            <input type="number" name="mobile" id="materialRegisterFormPhone" class="form-control white-text" value="{{ old('mobile') }}"  required min="1"
                                aria-describedby="materialRegisterFormPhoneHelpBlock">
                            <label for="materialRegisterFormPhone" class="white-text">Phone number</label>


                        </div>
                        @if($errors->has('mobile'))
                        <div class="error text-danger m-2">{{ $errors->first('mobile') }}</div>
                        @endif




                        <!-- Password -->
                        <div class="md-form">
                            <input type="password" name="password" id="materialRegisterFormPassword" class="form-control white-text"
                                aria-describedby="materialRegisterFormPasswordHelpBlock">
                            <label for="materialRegisterFormPassword" class="white-text">Password</label>
                            <small id="materialRegisterFormPasswordHelpBlock" class="form-text text-muted  white-text mb-4">
                                At least 8 characters
                            </small>
                        </div>

                        @if($errors->has('password'))
                        <div class="error text-danger m-2">{{ $errors->first('password') }}</div>
                        @endif

                        <div class="md-form">
                            <input type="password" id="password_confirmation" name ="password_confirmation" class="form-control white-text" required>
                            <label for="password_confirmation" class="white-text">Retype Password</label>
                        </div>




                        <div class="md-form ">
                            <select name ="type" class="mdb-select colorful-select dropdown-dark" searchable="Search here.." required>
                                <option value="" disabled selected>User Type</option>



                                        <option value="normal">normal</option>
                                        <option value="subadmin">subadmin</option>
                                        @if(Auth::user()->type == "superadmin")
                                        <option value="admin">admin</option>
                                        @endif





                            </select>
                            <label class="mdb-main-label">select user type</label>

                            @if($errors->has('type'))
                            <div class="error text-danger m-2">{{ $errors->first('type') }}</div>
                             @endif
                            </div>



                        <!-- Sign up button -->
                        <button class="btn btn-outline-amber btn-rounded btn-block my-4 waves-effect z-depth-0"
                            type="submit">Add User</button>


                    </form>
                    <!-- Form -->

                </div>

            </div>

        </div>


    <div class="col-xs-0 col-sm-0 col-md-3 col-lg-3 col-xl-3">
    </div>


</div>


 </div>





@endsection

@section('script')
<script type="text/javascript">

</script>
@endsection

