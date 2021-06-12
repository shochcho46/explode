@extends('layouts.admin.main')

@section('content')


<div class="container-fluid elegant-color">
   @php
   $i=1
   @endphp
    <br>
    @include('layouts.common.message.message')
    <h4 class=" elegant-color text-center amber-text mt-2">Disable Game List</h4>



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
        <tbody>
            @foreach($data as  $value)

            @if($value->status == "disable")



            <tr>
                <td class="white-text">{{ $i }}</td>


               <td class="white-text">{{ $value->game_name }}</td>
               <td class="white-text">{{ $value->status }}</td>

               <td class="white-text">{{ $value->serial}}</td>

               <td class="white-text"><img src="{{  $value->location }}" alt="{{  $value->game_name }}" width="112"></td>

                <td>

                    <a class="btn-floating btn-sm btn-primary"  href="{{ route('game.edit',$value->id) }}"><i class="mdi mdi-circle-edit-outline mdi-18px"></i></a>




                    <a class="btn-floating btn-sm btn-success"  href="{{ route('game.active',$value->id) }}" onclick="event.preventDefault(); document.getElementById('act{{$value->id}}').submit();">
                        <i class="mdi mdi-eye mdi-18px"></i>
                    </a>





                    <form method="POST" id="act{{$value->id}}" action="{{ route('game.active', $value->id) }}" style="display: none;">
                        @csrf
                        @method('patch')


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
    $("#message").delay(3000).hide(500);
    });
 $(document).ready(function() {
    $("#updatemessage").delay(3000).hide(500);
    });
</script>
@endsection
