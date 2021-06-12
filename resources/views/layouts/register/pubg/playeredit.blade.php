@extends('layouts.register.main')

@section('css')

@endsection

@section('content')

@include('layouts.common.message.message')

<div class="row">

    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 mt-1">

    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 mt-1">
        @include('layouts.common.pubg.playeredit')
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 mt-1">

    </div>


</div>

@endsection


@section('script')

<script type="text/javascript">

$(document).ready(function() {



});


</script>


@endsection
