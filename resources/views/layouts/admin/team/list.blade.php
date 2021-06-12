@extends('layouts.admin.main')

@section('css')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">

@endsection

@section('content')


<div class="container-fluid elegant-color">

    <br>
    @include('layouts.common.message.message')

 <h4 class=" elegant-colortext-center text-center amber-text mt-2">{{ $tournament->tournament_name }}</h4>
 <button onclick="printDiv('printableArea')" type="button" class="btn btn-outline-amber btn-sm btn-rounded waves-effect"><i class="mdi mdi-printer mdi-18px"></i></button>

 <div class="table-responsive m-3">
    <table class="table text-center" id="printableArea">
        <thead class="elegant-color amber-text">
          <tr>
            <th scope="col">#</th>

            <th scope="col">Team Name</th>
            <th scope="col"> Logo</th>
            <th scope="col"> Mobile</th>
            <th scope="col" colspan="2"> Player</th>


            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody class="white-text">
            @foreach($data as $key =>  $value)





            <tr>
                 <td class="white-text">{{ $data->firstItem() + $key }}</td>

                 <td class="white-text">{{ $value->team_name }}</td>
                 <td class="white-text">
                     <img src="{{ $value->location }} " width="112" alt="{{  $value->team_name }}">
                    </td>
                 <td class="white-text">{{ $value->user->mobile }}</td>

                 <td class="white-text text-left" colspan="2">

                     @foreach ($value->pubgs  as $nkey=> $player )

                        <div class="mb-1"> {{ $nkey+1 }}# <small>{{ $player->pubg_id_name}} ({{ $player->playertype }}) </small></div>

                     @endforeach

                </td>


                <td colspan="2">

                    <a class="amber-text"  data-toggle="tooltip" data-placement="bottom" title="edit team" href="{{ route('admin.editall',$value->id) }}">
                        <i class="mdi mdi-circle-edit-outline mdi-18px"></i>
                    </a>

                    @if((Auth::user()->type == "admin") || (Auth::user()->type == "superadmin"))

                    <a class="amber-text"  href="{{ route('admin.teamdestroy',$value->id) }}" onclick="event.preventDefault(); document.getElementById('del{{$value->id}}').submit();">
                        <i class="mdi mdi-trash-can mdi-18px"></i>
                    </a>




                    <form method="POST" id="del{{$value->id}}" action="{{ route('admin.teamdestroy', $value->id) }}" style="display: none;">
                        @csrf
                        @method('DELETE')


                    </form>

                    @endif

                </td>
            </tr>




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

{{-- @section('script') --}}

<script type="text/javascript">

function printDiv(divName) {
    var divToPrint=document.getElementById("printableArea");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
</script>
{{-- @endsection --}}
