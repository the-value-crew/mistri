@foreach($service->time2_fields as $time2_field)
    <div class="form-group">
        <label  for="datepicker{{$time2_field->id}}">{{$time2_field->label_for_form}}</label>
        <input type="text" name="date_{{$time2_field->id}}" id="datepicker{{$time2_field->id}}" class="form-control timepicker" required>
    </div>
@endforeach