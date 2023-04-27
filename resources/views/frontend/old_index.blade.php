<!----  dynamic form  ------>

<form action="{{route('service.request',$service->id)}}" id="validate_form" method="post">
    @csrf
    <div class="row">

        <!--- Left aside ---->
        <aside class="col-lg-8 pl-0">
            <div class="form cf">
                <div class="step step--1 active" id="validate_form_part_one">

                    <!---- radio -op with charge ---->
                    @foreach($service->radio_with_charge_fields as $radio_with_charge_field)
                        <div class="form-group">
                            <label for="Premises">{{$radio_with_charge_field->label_for_form}}</label>
                            <div class="funkyradio">
                                @foreach($radio_with_charge_field->radio_with_charge_options as$key=> $radio_with_charge_option)
                                    <div class="funkyradio-default">
                                        <input type="radio" id="radio_{{$radio_with_charge_option->id}}"  name="radio_c_{{$radio_with_charge_field->id}}"  value="{{$radio_with_charge_option->id}}" />
                                        <label for="radio_{{$radio_with_charge_option->id}}">{{$radio_with_charge_option->option}}</label>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endforeach
                <!---- /radio -op with charge ---->

                    <!---- radio   --->
                    @foreach($service->radio_fields as $radio_field)
                        <div class="form-group">
                            <label for="Premises">{{$radio_field->label_for_form}}</label>
                            <div class="funkyradio">
                                @foreach($radio_field->radio_options as$key=> $radio_option)
                                    <div class="funkyradio-default">
                                        <input type="radio" id="radio{{$radio_option->id}}"  name="radio_{{$radio_field->id}}"  value="{{$radio_option->id}}"  />
                                        <label for="radio{{$radio_option->id}}">{{$radio_option->option}}</label>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endforeach
                <!---- /radio  ---->

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

                    <!--- select - op with charge ----->
                    @foreach($service->select_with_charge_fields as $select_with_charge_field)
                        <div class="form-group">
                            <label for="Premises">{{$select_with_charge_field->label_for_form}}</label>
                            <select class="custom-select" id="Premises" name="select_c_{{$select_with_charge_field->id}}">

                                @foreach($select_with_charge_field->select_with_charge_options as$key2=> $select_with_charge_option)
                                    <option value="{{$select_with_charge_option->id}}">
                                        {{$select_with_charge_option->option}}
                                        @php
                                            $a =$select_with_charge_option->charge
                                        @endphp
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endforeach
                <!--- select - op with charge ----->

                    <!--- select  ----->
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
                <!--- select----->


                    <!----- Text field ---->
                    @foreach($service->text_fields as $text_field)
                        <div class="form-group">

                            <label for="street--name">{{$text_field->label_for_form}}</label>
                            <input type="text" name="text_{{$text_field->id}}" id="datepicker1" class="form-control"  />
                        </div >
                    @endforeach

                <!----/ text field ---->

                    <!---- date --------->
                    @foreach($service->date_fields as $date_field)
                        <div class="form-group">
                            <label for="datepicker{{$date_field->id}}">{{$date_field->label_for_form}}</label>
                            <input type="date" name="date_{{$date_field->id}}" id="datepicker{{$date_field->id}}" class="form-control" onchange="dateField('{{$date_field->order_detail_label}}',this.value)"/>
                        </div >
                    @endforeach
                <!-----/ date------->

                    <!--- Time ------->
                    @foreach($service->time_fields as $time_field)
                        <div class="form-group">
                            <label for="Premises">{{$time_field->label_for_form}}</label>
                            <div class="funkyradio">
                                @foreach($time_field->time_options as$key1=> $time_option)
                                    <div class="funkyradio-default">
                                        <input type="radio" name="time_{{$time_field->id}}" id="time{{$time_option->id}}" value="{{$time_option->id}}" onchange="timeField('{{$time_option->time}}')"/>
                                        <label for="time{{$time_option->id}}">{{$time_option->time}}</label>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endforeach
                <!----/ Time ----->



                    <!----- Textarea field ---->
                    @foreach($service->textarea_fields as $textarea_field)
                        <div class="form-group">
                            <label for="street--name">{{$textarea_field->label_for_form}}</label>
                            <textarea name="textarea_{{$textarea_field->id}}" id="" cols="30" rows="50" class="form-control" style="height: 100px"></textarea>

                        </div >
                @endforeach


                <!----/ textarea field ---->



                    <div class="button--wrapper">
                        <button class="button__next">NEXT</button>
                    </div>
                </div>
                <div class="step step--2">
                    <div class="card--wrapper ">
                        <h2 class="card__title">Home</h2>
                        <div class="form-row">
                            <div class="form-group col-12 col-sm-6">
                                <label for="street--name">Name</label>
                                <input type="text" placeholder="Enter  name" name="name" class="form-control" @auth value="{{Auth::user()->name}}" @endauth id="street--name" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="contactN">Contact No</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <select class="custom-select" id="employeN" name="country_code">
                                            <option selected="" value="">USA</option>
                                            <option value="+971">
                                                DUB
                                            </option>
                                            <option value="+1">
                                                USA
                                            </option>
                                        </select>
                                    </div>
                                    <input type="tel" name="phone" @auth value="{{Auth::user()->phone}}" @endauth class="form-control" id="contactN"  required>

                                </div>
                                @if ($errors->has('contact_number'))
                                    <span class="error-message">
                                    *{{ $errors->first('contact_number') }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-12">
                                <label for="buildig">Email</label>
                                <input type="email" name="email" placeholder="Enter email" @auth value="{{Auth::user()->email}}" @endauth class="form-control  " id="buildig" readonly>
                            </div>

                            <div class="form-group col-12">

                                <label  for="fill--addr">Full address
                                    <small> (Type your address, or drag the red marker to your exact location)</small>
                                </label>
                                <input type="text" name="fulladdress" @auth value="{{Auth::user()->userdetail->fulladdress}}" @endauth  class="form-control" id="fill--addr"  autocomplete="off"  data-parsley-trigger="keyup" required="">
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="street--name">Street name</label>
                                <input type="text" name="street" @auth value="{{Auth::user()->userdetail->street}}" @endauth placeholder="Enter a street name" class="form-control  " id="street--name" required>
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="buildig">Building</label>
                                <input type="text" name="building" @auth value="{{Auth::user()->userdetail->building}}" @endauth placeholder="Enter a building name or number" class="form-control  " id="buildig" required>
                            </div>
                            <div class="col-md-6 ">
                                <label for="flat">flat/room number</label>
                                <input type="text" name="flat_number" @auth value="{{Auth::user()->userdetail->flat_number}}" @endauth placeholder="Enter a Flat/room number" class="form-control  " id="flat" required>
                            </div>
                            <div class="col-md-6 ">
                                <label for="Additional Direction">Additional Direction</label>
                                <input type="text" name="addtional_direction" @auth value="{{Auth::user()->userdetail->addtional_direction}}" @endauth placeholder="Enter a Flat/room number" class="form-control  " id="Additional Direction" required>
                            </div>

                        </div>
                    </div>


                    <div class="button--wrapper">
                        <button class="button__prev">Prev</button>

                        <button class="button__next">Next</button>
                    </div>
                </div>
                <div class="step step--3">
                    <div class="card--wrapper ">

                        @if(count($service->users)>0)
                            <h2 class="card__title">Choose Your Service Provider</h2>

                            <div class="form-group">
                                <section class="plan cf">
                                    @foreach($service->users as$key=> $provider)
                                        <input type="radio"  name="provider_id" id="free{{$key}}" value="{{$provider->id}}"><label class="free-label lable-class four col" for="free{{$key}}">{{$provider->name}}</label>
                                    @endforeach
                                    {{--<input type="radio" name="radio1" id="basic" value="basic" checked><label class="basic-label  lable-class four col" for="basic">{{$provider2->name}}</label>--}}
                                </section>
                            </div>
                            <div class="clearfix"></div>
                            <h2 class="card__title">Choose premises for service to be done</h2>

                            <div class="form-group">
                                <div class="funkyradio">

                                    <div class="funkyradio-default">
                                        <input type="radio"  name="service_done_in" id="customer" value="customer"/>
                                        <label for="customer">Customer Premise</label>
                                    </div>

                                    <div class="funkyradio-default">
                                        <input type="radio"  name="service_done_in" id="vendor" value="vendor"/>
                                        <label for="vendor">Vendor Premise</label>
                                    </div>


                                </div>
                            </div>
                        @else
                            <h2>Currently No service provider available for this service</h2>
                        @endif


                    </div>
                    <div class="button--wrapper">
                        <button class="button__prev">Prev</button>
                    </div>
                </div>
            </div>

        </aside>
        <!--- Left aside ---->

        <!--- Right aside ---->
        <aside class="col-lg-4 pr-0">
            <div class="checkout--wrapper">
                <h2 class="title--description">{{$service->name}}</h2>
                <ul>
                    <li id="checkField" style="display: none"><span id="checkLabel"></span> <br>Charge : AED <span id="checkValue"> </span></li>
                    <hr id="hrCheck" style="display: none;">
                    <li id="radioField" style="display: none"><span id="radioLabel"></span> <br>Charge : AED <span id="radioValue"> </span></li>
                    <hr id="abc" style="display: none;">
                    <li id="selectWithNoPrice" style="display: none"><span id="check2Label"></span> : <span id="check2option"></span> </li>
                    <hr id="hrSelect" style="display: none;">
                    <li id="dateField" style="display: none"><span id="dateLabel"></span> : <span id="dateValue"></span> </li>
                    <hr id="hrDate" style="display: none;">
                    <li id="timeField" style="display: none"><span id="dateLabel">Time </span> : <span id="timeValue"></span> </li>

                </ul>

                @if(count($service->users)>0)
                    <button class="checkout" type="submit">Checkout</button>
                @else
                    <button class="checkout" type="button">Checkout</button>
                @endif
            </div>
        </aside>
        <!---/ Right aside --->
    </div>
</form>


