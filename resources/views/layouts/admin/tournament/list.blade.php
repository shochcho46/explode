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
            <th scope="col"> Reg</th>
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

            @if($value->status == "active")



            <tr>
                 <td class="white-text">{{ $data->firstItem() + $key }}</td>

                 <td class="white-text">{{ $value->tournament_name }}</td>

                 <td class="white-text">{{ $value->game->game_name }}</td>
                 <td class="white-text">{{ $value->status }}</td>
                 <td class="white-text">{{ $value->total }}</td>
                 <td class="white-text">{{ $value->teams->count() }}</td>
                 <td class="white-text">{{ $value->user->name }}</td>

                <td class="white-text"><img src="{{  $value->location }}" alt="{{  $value->tournament_name }}" width="112"></td>

                 <td class="white-text">{{  \Carbon\Carbon::parse($value->enddate)->diffForhumans()  }}</td>


                 <td class="white-text">{{ $value->registration }}</td>
                 <td class="white-text">{{ $value->serial }}</td>


                <td>

                    <a class="amber-text"  data-toggle="tooltip" data-placement="bottom" title="team list" href="{{ route('admin.teamlist',$value->id) }}"><i class="mdi mdi-format-list-bulleted mdi-18px"></i></a>


                    <a class="amber-text p-1 " data-toggle="tooltip" data-placement="bottom" title="Edit"  href="{{ route('tournament.edit',$value->id) }}"><i class="mdi mdi-circle-edit-outline mdi-18px"></i></a>

                    @php
                        $field = "status";
                        $action = "disable";
                    @endphp
                    <a class="amber-text" data-toggle="tooltip" data-placement="bottom" title="Disable" href="{{ route('tournament.action',[$value->id,$field,$action]) }}"><i class="mdi mdi-eye-off mdi-18px"></i></a>


                    @if ($value->pin == "disable")
                        @php
                            $field = "pin";
                            $action = "active";
                        @endphp
                        <a class="amber-text" data-toggle="tooltip" data-placement="bottom" title="Pin" href="{{ route('tournament.action',[$value->id,$field,$action]) }}"><i class="mdi mdi-pin mdi-18px"></i></a>

                    @else
                        @php
                            $field = "pin";
                            $action = "disable";
                        @endphp
                     <a class="amber-text"  data-toggle="tooltip" data-placement="bottom" title="Unpin" href="{{ route('tournament.action',[$value->id,$field,$action]) }}"><i class="mdi mdi-pin-off mdi-18px"></i></a>

                    @endif

                    @if ($value->registration == "disable")
                        @php
                            $field = "registration";
                            $action = "active";
                        @endphp
                        <a class="amber-text"  data-toggle="tooltip" data-placement="bottom" title="active registration" href="{{ route('tournament.action',[$value->id,$field,$action]) }}"><i class="mdi mdi-message-bulleted mdi-18px"></i></a>

                    @else
                        @php
                            $field = "registration";
                            $action = "disable";
                        @endphp
                     <a class="amber-text"  data-toggle="tooltip" data-placement="bottom" title="disable registration" href="{{ route('tournament.action',[$value->id,$field,$action]) }}"><i class="mdi mdi-message-bulleted-off mdi-18px"></i></a>

                    @endif




                    <a class="amber-text m-1" href="{{ route('admin.tournamentsetting',$value->id) }}"  data-toggle="tooltip" data-placement="bottom" title="setting" href="#"><i class="mdi mdi-cog mdi-18px"></i></a>



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
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
@endsection
