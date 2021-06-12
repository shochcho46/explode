<div class="md-form">



    <input placeholder="Selected date" type="text" id="date-picker-example"  name="enddate" value="{{ old('enddate') ?? $data->enddate }}" class="form-control white-text  datepicker" required>

    <label for="date-picker-example" class="white-text">End Date</label>
</div>


@if($errors->has('enddate'))
<div class="error text-danger m-2">{{ $errors->first('enddate') }}</div>
@endif



<script type="text/javascript">





</script>
