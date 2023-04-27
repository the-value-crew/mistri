@foreach($service->select_with_charge_fields as $select_with_charge_field)
<div class="form-group">
    <label for="Premises">{{$select_with_charge_field->label_for_form}}</label>
    <select class="custom-select" id="Premises" name="select_c_{{$select_with_charge_field->id}}">
        @foreach($select_with_charge_field->select_with_charge_options as$key2=> $select_with_charge_option)
            <option value="{{$select_with_charge_option->id}}">
                {{$select_with_charge_option->option}}
            </option>
        @endforeach
    </select>
</div>
@endforeach