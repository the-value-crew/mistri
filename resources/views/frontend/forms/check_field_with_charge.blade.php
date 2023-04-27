<!---- check -op with charge ---->
@foreach($service->check_with_charge_fields as $check_with_charge_field)
    <div class="form-group">
        <label for="Premises">{{$check_with_charge_field->label_for_form}}</label>
        <div class="funkyradio">
            @foreach($check_with_charge_field->check_with_charge_options as$key=> $check_with_charge_option)
                <div class="funkyradio-default">
                    <input type="radio" id="check_c_{{$check_with_charge_option->id}}"  name="check_c_{{$check_with_charge_field->id}}"  value="{{$check_with_charge_option->id}}" />
                    <label for="check_c_{{$check_with_charge_option->id}}">{{$check_with_charge_option->option}}</label>
                </div>
            @endforeach

        </div>
    </div>
@endforeach
<!---- /check -op with charge ---->