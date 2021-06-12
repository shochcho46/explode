


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <h5 class="card elegant-color-dark text-center amber-text p-2">
          Personal Info
        </h5>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
            <form method="POST" id="personalform" action="{{ route('profiles.store',$user->id) }}"
                enctype="multipart/form-data">
                @csrf


                <div class="card mb-3 elegant-color-dark">
                    <h5 class="card-header elegant-color white-text text-center py-4">
                        <strong>Update Personal Info </strong>
                        </h5>
                    <div class="card-body px-lg-5 pt-0 ">


                            <div class="md-form">

                                @if(empty($user->profile->birthday) || is_null($user->profile->birthday))

                                <input placeholder="Selected date" type="text" id="date-picker-example"  name="birthday" class="form-control white-text  datepicker" required>


                                @else
                                <input placeholder="Selected date" type="text" id="date-picker-example" value="{{ old('birthday') ?? $user->profile->birthday }}"  name="birthday" class="form-control white-text datepicker" required>

                                @endif

                                <label for="date-picker-example" class="white-text">Birthday</label>
                            </div>


                            @if($errors->has('birthday'))
                            <div class="error text-danger m-2">{{ $errors->first('birthday') }}</div>
                            @endif


                            @if(empty($user->profile->gender) || is_null($user->profile->gender))


                             <div class="btn-group" data-toggle="buttons">

                                <label class="btn  btn-elegant btn-rounded waves-effect form-check-label btn-sm">
                                 <input class="form-check-input" type="radio" name="gender" value="Male" id="option1" autocomplete="off" required>
                                  Male
                                </label>


                                <label class="btn btn-elegant btn-rounded waves-effect form-check-label btn-sm">
                                  <input class="form-check-input" type="radio" name="gender" value="Female" id="option2" autocomplete="off" >
                                 Female
                                </label>



                                <label class="btn btn-elegant btn-rounded waves-effect form-check-label btn-sm">
                                    <input class="form-check-input" type="radio" name="gender" value="Other" id="option3" autocomplete="off" >
                                 Other
                                </label>
                              </div>


                            @else

                            <div class="btn-group" data-toggle="buttons">

                                <label class="btn  btn-elegant btn-rounded waves-effect form-check-label btn-sm">
                                    @if($user->profile->gender == "Male")
                                  <input class="form-check-input" type="radio" name="gender" value="Male" id="option1" autocomplete="off"  required  checked>
                                    @else
                                    <input class="form-check-input" type="radio" name="gender" value="Male" id="option1" autocomplete="off"  required>

                                  @endif
                                  Male
                                </label>


                                <label class="btn btn-elegant btn-rounded waves-effect form-check-label btn-sm">
                                    @if($user->profile->gender == "Female")
                                  <input class="form-check-input" type="radio" name="gender" value="Female" id="option2" autocomplete="off"  checked>
                                  @else
                                  <input class="form-check-input" type="radio" name="gender" value="Female" id="option2" autocomplete="off"  >
                                  @endif
                                  Female
                                </label>



                                <label class="btn btn-elegant btn-rounded waves-effect form-check-label btn-sm">

                                    @if($user->profile->gender == "Other")
                                  <input class="form-check-input" type="radio" name="gender" value="Other" id="option3" autocomplete="off" checked>
                                  @else
                                  <input class="form-check-input" type="radio" name="gender" value="Other" id="option3" autocomplete="off" >
                                  @endif
                                  Other
                                </label>
                              </div>



                            @endif



                              <div class="md-form mb-2 purple-textarea active-purple-textarea">

                                @if(empty($user->profile->birthday) || is_null($user->profile->birthday))

                                <textarea id="form18" class="md-textarea white-text form-control" name="address" placeholder="Home#  Road#  Area#  City#  " rows="1" required minlength="8"></textarea>


                                @else

                                <textarea id="form18" class="md-textarea white-text form-control" name="address" placeholder="Home#  Road#  Area#  City#  " rows="1" required minlength="8">{{ old('address') ?? $user->profile->address }}</textarea>

                                @endif



                                <label for="form18" class="white-text">Your Full Address</label>
                              </div>


                              @if($errors->has('address'))
                              <div class="error text-danger m-2">{{ $errors->first('address') }}</div>
                            @endif



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
