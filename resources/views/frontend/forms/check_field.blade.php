<!---- check   --->
@foreach($service->check_fields as $check_field)
    <div class="form-group">
        <label for="Premises">{{$check_field->label_for_form}}</label>
        <div class="funkyradio">
            @foreach($check_field->check_options as$key=> $check_option)
                <div class="funkyradio-default">
                    <input type="radio" id="check{{$check_option->id}}"  name="check_{{$check_field->id}}"  value="{{$check_option->id}}"  />
                    <label for="check{{$check_option->id}}">{{$check_option->option}}</label>
                </div>
            @endforeach

        </div>
    </div>
@endforeach
<!---- /check  ---->