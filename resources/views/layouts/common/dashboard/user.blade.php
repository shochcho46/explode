<div class="card elegant-color-dark">

    <h5 class="card-header elegant-color white-text text-center py-4">
        <strong>USER DETAIL </strong>
        </h5>
    <div class="card-body ">


        <hr>

        <h5 class="white-text"> Active User : <span class="white-text">{{ $user->where('status','active')->where('type','normal')->count() }}</span></h5>

        @if ((Auth::user()->type == "admin")||(Auth::user()->type == "subadmin")||(Auth::user()->type == "superadmin"))
        <h5 class="white-text"> Subadmin  : <span class="white-text">{{ $user->where('status','active')->where('type','subadmin')->count() }} </span></h5>

        @endif

        @if ((Auth::user()->type == "admin")||(Auth::user()->type == "superadmin"))
        <h5 class="white-text"> Admin  : <span class="white-text">{{ $user->where('status','active')->where('type','admin')->count() }} </span></h5>

        @endif
        @if ((Auth::user()->type == "superadmin"))
        <h5 class="white-text"> Super Admin  : <span class="white-text">{{ $user->where('status','active')->where('type','superadmin')->count() }} </span></h5>

        @endif

        <hr>
        <h6 class="white-text text-center"> Total: {{ $user->where('type','normal')->count() }}</h6>


    </div>

</div>


