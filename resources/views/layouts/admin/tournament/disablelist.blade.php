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
            <th scope="col"> Add By</th>
            <th scope="col"> picture</th>
            <th scope="col"> End Date</th>
            <th scope="col"> Ragistration</th>
            <th scope="col"> Order</th>

            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody class="white-text">
            @foreach($data as $key =>  $value)

            @if($value->status == "disable")



            <tr>
                 <td class="white-text">{{ $data->firstItem() + $key }}</td>

                 <td class="white-text">{{ $value->tournament_name }}</td>

                 <td class="white-text">{{ $value->game->game_name }}</td>
                 <td class="white-text">{{ $value->status }}</td>
                 <td class="white-text">{{ $value->total }}</td>
                 <td class="white-text">{{ $value->user->name }}</td>

                <td class="white-text"><img src="{{  $value->location }}" alt="{{  $value->tournament_name }}" width="112"></td>

                 <td class="white-text">{{  \Carbon\Carbon::parse($value->enddate)->diffForhumans()  }}</td>


                 <td class="white-text">{{ $value->registration }}</td>
                 <td class="white-text">{{ $value->serial }}</td>


                <td>

                    <a class="blue-text m-1"  href="{{ route('tournament.edit',$value->id) }}"><i class="mdi mdi-circle-edit-outline mdi-18px"></i></a>

                    @php
                        $field = "status";
                        $action = "active";
                    @endphp
                    <a class="green-text"  href="{{ route('tournament.action',[$value->id,$field,$action]) }}"><i class="mdi mdi-eye-check mdi-18px"></i></a>



                    {{-- <a class="btn-floating btn-sm btn-danger"  href="{{ route('submenu.destroy',$value->id) }}" onclick="event.preventDefault(); document.getElementById('del{{$value->id}}').submit();">
                        <i class="mdi mdi-trash-can mdi-18px"></i>
                    </a>




                    <form method="POST" id="del{{$value->id}}" action="{{ route('submenu.destroy', $value->id) }}" style="display: none;">
                        @csrf
                        @method('DELETE')


                    </form> --}}

                    {{-- <a class="btn-floating btn-sm btn-dark"  href="{{ route('submenu.disable',$value->id) }}" onclick="event.preventDefault(); document.getElementById('disa{{$value->id}}').submit();">
                        <i class="mdi mdi-eye-off mdi-18px"></i>
                    </a>



                    <form method="POST" id="disa{{$value->id}}" action="{{ route('submenu.disable', $value->id) }}" style="display: none;">
                        @csrf
                        @method('PUT')


                    </form> --}}

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
