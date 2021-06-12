<div class="table-responsive m-3">
    <table class="table text-center table-sm">
        <thead class="elegant-color amber-text">
          <tr>
            <th scope="col">#</th>

            <th scope="col">Pubg ID Name</th>
            <th scope="col"> Pubg ID Number</th>
            <th scope="col"> Player Type</th>
            <th scope="col"> Player Serial</th>
            <th scope="col">Action</th>
          </tr>
        </thead>

        @php
        $i=1
        @endphp


        <tbody class="white-text elegant-color">

             @foreach($data->pubgs as $key =>  $playervalue)
     <tr>
                 <td class="white-text">{{ $i }}</td>



                 <td class="white-text">{{ $playervalue->pubg_id_name }}</td>
                 <td class="white-text">{{ $playervalue->pubg_id_number }}</td>
                 <td class="white-text">{{ $playervalue->playertype }}</td>
                 <td class="white-text">{{ $playervalue->playerserial }}</td>





                <td>

                    <a class="amber-text waves-effect m-1"  href="{{ route('pubg.playeredit',$playervalue->id) }}"><i class="mdi mdi-circle-edit-outline mdi-18px"></i></a>



                </td>
            </tr>
            @php
            $i=$i+1;
           @endphp



            @endforeach
         </tbody>

      </table>

  </div>
