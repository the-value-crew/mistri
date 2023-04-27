@foreach($service->label_for_multiple_fields as $label_for_multiple_field)
<div>
    <h6>{{$label_for_multiple_field->label_for_form}}</h6>
    <div class="row">
        @foreach($label_for_multiple_field->input_fields as $input_field)
        <div class="col-md-4 form-group col-4">
            <label for="buildig">{{$input_field->input_field_label}}</label>
            <input type="text" name="input_field_{{$input_field->id}}" class="form-control" id="buildig">
        </div>
        @endforeach

    </div>
</div>
@endforeach