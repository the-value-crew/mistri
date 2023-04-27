@foreach($service->text_fields as$key=> $text_field)
<div class="form-group">
    <label  for="textfield-{{$key}}">{{$text_field->label_for_form}}</label>
    <input type="text" name="text_{{$text_field->id}}" id="textfield-{{$key}}" class="form-control"  required>
</div>
@endforeach