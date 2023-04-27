@foreach($service->select_fields as $select_field)
<div class="form-group">
    <label for="Premises">{{$select_field->label_for_form}}</label>
    <select class="custom-select" id="Premises" name="select_{{$select_field->id}}">
        @foreach($select_field->select_options as$key2=> $select_option)
        <option value="{{$select_option->id}}">
            {{$select_option->option}}
        </option>
       @endforeach
    </select>
</div>
@endforeach