@extends('layouts.admin.main')

@section('content')
 <div class="container">

    @include('layouts.common.message.message')
    <div class="row">


    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 mt-1">
        <a>
            <div class="card elegant-color">
                <h1 class="m-2 p-4 white-text">
                   TOURNAMET STRACTURE SETTINGS
                </h1>

            </div>
        </a>
    </div>

    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 mt-1">
        <a href="{{ route('rule.loadrule',$tournament->id) }}" class="btn btn-amber ">
            <div class="card elegant-color">
                <h3 class="m-2 p-4 white-text">
                   <i class="mdi mdi-pencil-ruler"></i> RULE & REGULATION  SETTINGS
                </h3>

            </div>
        </a>

    </div>


    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 mt-1">

        <a>
            <div class="card elegant-color">
                <h1 class="m-2 p-4 white-text">
                    FIXTURE SEETINGS
                </h1>

            </div>
        </a>
    </div>

    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 mt-1">

        <a>
            <div class="card elegant-color">
                <h1 class="m-2 p-4 white-text">
                     POINT TABLE SETUP
                </h1>

            </div>
        </a>
    </div>

    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 mt-1">

        <a>
            <div class="card elegant-color">
                <h1 class="m-2 p-4 white-text">
                    RESULT SETUP
                </h1>

            </div>
        </a>
    </div>


</div>


 </div>





@endsection

{{-- @section('script') --}}
<script type="text/javascript">

</script>
{{-- @endsection --}}

