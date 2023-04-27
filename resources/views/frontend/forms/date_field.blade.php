@foreach($service->date_fields as $date_field)
<div class="form-group">
    <label  for="datepicker{{$date_field->id}}">{{$date_field->label_for_form}}</label>
    <input type="date" name="date_{{$date_field->id}}" id="datepicker{{$date_field->id}}" class="form-control"  style="position: relative !important;" required>
</div>
@endforeach