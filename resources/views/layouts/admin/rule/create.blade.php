@extends('layouts.admin.main')

@section('css')
<link href="{{ asset('ckeditor/samples/css/samples.css') }}" rel="stylesheet">
    <link href="{{ asset('ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css') }}" rel="stylesheet">



@endsection

@section('content')
 <div class="container">

    <div class="row">



    <div class="col-xs-0 col-sm-2 col-md-2 col-lg-2 col-xl-2 ">

    </div>

    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 col-xl-8 ">



        <form method="POST" id="newsid" action="{{ route('rule.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card elegant-color-dark">

                <h5 class="card-header elegant-color  amber-text text-center py-4 mb-3">
                    <strong>RULE</strong>
                </h5>

                <div class="card-body px-lg-5 pt-0">


                    <div class="form-group white-text">
                        <label for="description" >Description  :</label>
                        <textarea  type="text" class="form-control" id="editor" name="description" placeholder="News Description"  required minlength="3">{{ old('description')}}</textarea>
                      </div>
                      @if($errors->has('description'))
                      <div class="error text-danger m-2">{{ $errors->first('description') }}</div>
                      @endif

                      <input type="hidden"  name="tournament_id"  value="{{ $tournament }}" required  class="form-control">

              <div class="form-group text-center">
                <button type="submit" class="btn btn-amber btn-rounded">Submit</button>
            </div>

        </div>

    </div>
        </form>

    </div>


    <div class="col-xs-0 col-sm-2 col-md-2 col-lg-2 col-xl-2 ">


    </div>




</div>


 </div>





@endsection










