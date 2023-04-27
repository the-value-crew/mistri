@foreach($service->time_fields as $time_field)
<div class="form-group">
    <label for="Premises">{{$time_field->label_for_form}}</label>
    <div class="checkbox--wrapper">
        @foreach($time_field->time_options as$key1=> $time_option)
        <div class="custom-control custom-checkbox ">
            <input  class="custom-control-input " type="radio" name="time_{{$time_field->id}}" id="time{{$time_option->id}}" value="{{$time_option->id}}" checked="false">
            <label for="time{{$time_option->id}}"  class="custom-control-label">{{$time_option->time}}</label>
        </div>
        @endforeach
    </div>

</div>
@endforeach