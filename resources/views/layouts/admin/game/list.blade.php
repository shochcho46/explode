@extends('layouts.admin.main')

@section('content')


<div class="container-fluid elegant-color ">
   @php
   $i=1
   @endphp
    <br>
    @include('layouts.common.message.message')
 <h4 class=" elegant-color text-center amber-text mt-2">Game List</h4>



 <div class="table-responsive m-3">
    <table class="table text-center">
        <thead class="elegant-color amber-text">
          <tr>
            <th scope="col">#</th>

            <th scope="col"> Name</th>
            <th scope="col"> Status</th>
            <th scope="col">Display Order</th>
            <th scope="col">picture</th>

            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody class="white-text">
            @foreach($data as  $value)

            @if($value->status == "active")



            <tr>
                 <td class="white-text">{{ $i }}</td>


                <td class="white-text">{{ $value->game_name }}</td>
                <td class="white-text">{{ $value->status }}</td>

                <td class="white-text">{{ $value->serial}}</td>

                <td class="white-text"><img src="{{  $value->location }}" alt="{{  $value->game_name }}" width="112"></td>

                <td>

                    <a class="btn-floating btn-sm btn-primary"  href="{{ route('game.edit',$value->id) }}"><i class="mdi mdi-circle-edit-outline mdi-18px"></i></a>

                    <a class="btn-floating btn-sm btn-danger"  href="{{ route('game.destroy',$value->id) }}" onclick="event.preventDefault(); document.getElementById('del{{$value->id}}').submit();">
                        <i class="mdi mdi-trash-can mdi-18px"></i>
                    </a>





                    <form method="POST" id="del{{$value->id}}" action="{{ route('game.destroy', $value->id) }}" style="display: none;">
                        @csrf
                        @method('DELETE')


                    </form>

                    <a class="btn-floating btn-sm btn-dark"  href="{{ route('game.disable',$value->id) }}" onclick="event.preventDefault(); document.getElementById('disa{{$value->id}}').submit();">
                        <i class="mdi mdi-eye-off mdi-18px"></i>
                    </a>


                    <form method="POST" id="disa{{$value->id}}" action="{{ route('game.disable', $value->id) }}" style="display: none;">
                        @csrf
                        @method('PUT')


                    </form>

                </td>
            </tr>


            @php
             $i=$i+1;
            @endphp
             @endif
            @endforeach
         </tbody>
      </table>

  </div>

<div>


@endsection

@section('script')
<script type="text/javascript">
 $(document).ready(function() {

    });

</script>
@endsection
