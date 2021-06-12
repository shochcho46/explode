@extends('layouts.register.main')

@section('css')

@endsection

@section('content')
<div class="row">


    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ">
        @include('layouts.common.dashboard.game')
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ">
        @include('layouts.common.dashboard.tournament')
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ">
        @include('layouts.common.dashboard.user')
    </div>
</div>
@endsection


@section('script')

<script type="text/javascript">

$(document).ready(function() {



});


</script>


@endsection
