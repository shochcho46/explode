<div class="md-form ">
    <div class="input-group ">



            <input type="file" class="custom-file-input" id="location" name="location"
                accept='image/*' onchange="loadFile(event)">

            <label class="custom-file-label" for="location">Choose file</label>


    </div>
</div>



<div class="md-form text-center p-2">
    @if (empty ( $data->location) )

    <img id="output" class="img-fluid  uploadImageBoxSize p-2" src=""
            alt="No Image">

    @else
    <img id="output" class="img-fluid  uploadImageBoxSize p-2" src="{{$data->location }}"
            alt="No Image">
    @endif






    <p class="mt-2 white-text">
        <small>Max H : 1080 px</small>&nbsp;
        <small>Max W : 1920 px</small>;&nbsp;
        <small>Max Size : 2 Mb</small>&nbsp;
    </p>
</div>

@if($errors->has('location'))
<div class="error text-danger m-2">{{ $errors->first('location') }}</div>
@endif




<script type="text/javascript">


var loadFile = function(event) {
   var output = document.getElementById('output');
   output.src = URL.createObjectURL(event.target.files[0]);
   output.onload = function() {
     URL.revokeObjectURL(output.src) // free memory
   }
 };




</script>



