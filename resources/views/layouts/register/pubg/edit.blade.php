@extends('layouts.register.main')

@section('css')

@endsection

@section('content')

@include('layouts.common.message.message')

<div class="row">

    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 mt-1">
        @include('layouts.common.pubg.pubgperson')
    </div>

    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 col-xl-8 mt-1">
        @include('layouts.common.pubg.pubgplayer')
    </div>

    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 mt-1">
        @include('layouts.common.pubg.pubgteam')
    </div>

</div>

@endsection


@section('script')

<script type="text/javascript">

$(document).ready(function() {



});


</script>


@endsection
