


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12  ">
        <h5 class="card mt-1 p-2 elegant-color text-center amber-text">
            Security

        </h5>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <form method="POST" id="secuirity" action="{{ route('profiles.password',$user->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card mb-3 elegant-color-dark">
                    <h5 class="card-header elegant-color white-text text-center py-4">
                        <strong>Change Password</strong>
                        </h5>
                    <div class="card-body px-lg-5 pt-0">


                            <div class="md-form">

                            <input type="text" id="name" name ="name" value="{{ old('name') ?? $user->name}}" class="form-control white-text" required>
                             <label for="name" class="white-text">Name</label>

                            </div>

                            @if($errors->has('name'))
                                <div class="error text-danger m-2">{{ $errors->first('name') }}</div>
                            @endif


                            <div class="md-form">

                                <input type="number" id="mobile" name ="mobile" value="{{ old('mobile') ?? $user->mobile}}" class="form-control white-text" required min="1">
                                 <label for="mobile" class="white-text">Mobile</label>

                                </div>

                                @if($errors->has('mobile'))
                                    <div class="error text-danger m-2">{{ $errors->first('mobile') }}</div>
                                @endif


                            <div class="md-form">


                                <input type="email" id="email" name ="email" value="{{ old('email') ?? $user->email}}" class="form-control white-text" required>

                                <label for="email" class="white-text">Email</label>
                                </div>

                                @if($errors->has('email'))
                                    <div class="error text-danger m-2">{{ $errors->first('email') }}</div>
                                @endif


                        <div class="md-form">
                            <input type="password" id="oldpassword" name="oldpassword" class="form-control white-text"  minlength="8" required>
                            <label for="oldpassword" class="white-text">Old Password</label>
                        </div>
                            @if($errors->has('oldpassword'))
                                <div class="error text-danger m-2">{{ $errors->first('oldpassword') }}</div>
                            @endif

                    <div class="md-form">
                        <input type="password" id="password" name="password" class="form-control white-text"  minlength="8" required>
                        <label for="password" class="white-text">New Password</label>
                    </div>
                        @if($errors->has('password'))
                            <div class="error text-danger m-2">{{ $errors->first('password') }}</div>
                        @endif

                        <div class="md-form">
                        <input type="password" id="password_confirmation" name ="password_confirmation" class="form-control" required>
                        <label for="password_confirmation" class="white-text">Retype New Password</label>
                    </div>
                        <div class="text-center">
                        <button class="btn btn-outline-amber btn-md btn-rounded waves-effect z-depth-0 my-4"  type="submit">UPDATE</button>
                        </div>
                </div>
            </div>
            </form>
        </div>




    </div>



</div>


<script type="text/javascript">



</script>
