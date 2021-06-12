@extends('layouts.admin.main')

@section('css')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">

@endsection

@section('content')


<div class="container-fluid elegant-color">

    <br>
    @include('layouts.common.message.message')

 <h4 class=" elegant-colortext-center text-center amber-text mt-2">Tournament List</h4>

 <div class="table-responsive m-3">
    <table class="table text-center">
        <thead class="elegant-color amber-text">
          <tr>
            <th scope="col">#</th>

            <th scope="col">Tournament</th>
            <th scope="col"> Game</th>
            <th scope="col"> Status</th>
            <th scope="col"> Total</th>
            <th scope="col"> Register</th>

            <th scope="col"> picture</th>
            <th scope="col"> End Date</th>
            <th scope="col"> Ragistration</th>


            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody class="white-text">
            @foreach($data as $key =>  $value)

            @if($value->tournament->status == "active")



            <tr>
                 <td class="white-text">{{ $data->firstItem() + $key }}</td>

                 <td class="white-text">{{ $value->tournament->tournament_name }}</td>

                 <td class="white-text">{{ $value->tournament->game->game_name }}</td>
                 <td class="white-text">{{ $value->tournament->status }}</td>
                 <td class="white-text">{{ $value->tournament->total }}</td>

                 <td class="white-text">{{ $value->tournament->teams->count() }}</td>




                <td class="white-text"><img src="{{  $value->tournament->location }}" alt="{{  $value->tournament->tournament_name }}" width="112"></td>

                 <td class="white-text">{{  \Carbon\Carbon::parse($value->tournament->enddate)->diffForhumans()  }}</td>


                 <td class="white-text">{{ $value->tournament->registration }}</td>



                <td>

                    <a class="btn btn-outline-amber btn-sm btn-rounded waves-effect m-1"  href="{{ route('register.editall',$value->id) }}">edit <i class="mdi mdi-format-list-bulleted "></i></a>



                </td>
            </tr>



             @endif
            @endforeach
         </tbody>
      </table>

  </div>

  <div class="float-right ">
      <div class="">
        {{ $data->links() }}
      </div>

  </div>

<div>


@endsection

@section('script')
<script type="text/javascript">

</script>
@endsection
