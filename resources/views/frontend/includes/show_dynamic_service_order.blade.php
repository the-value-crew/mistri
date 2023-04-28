<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h6 class="panel-title"><strong>Order summary</strong></h6>
            </div>
            <div class="panel-body">

                <div class="table-responsive">
                    <table class="table table-condensed">
                        <thead>
                        <tr>
                            <td style="text-align: left"><strong>#</strong></td>
                            <td class="text-center"><strong>Price</strong></td>
                            <td class="text-center"><strong>Quantity</strong></td>
                            <td class="text-right"><strong>Totals</strong></td>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                        @php
                            $total_radio = 0;
                            $total_select = 0;
                            $total_check =0;
                        @endphp

                        <!-- Radio -c ---->
                        @if(count($order->service->radio_with_charge_fields)>0)
                            @foreach($order->service->radio_with_charge_fields as $radio_with_charge_field)
                                @php
                                    $data_radio = \App\RadioWithChargeValue::where('order_id',$order->id)->where('field_id',$radio_with_charge_field->id)->first();
                                    $data_value= \App\VendorRadioFieldCharge::where('service_provider_id',$order->provider_id)->where('field_id',$radio_with_charge_field->id)->where('option_id',$data_radio->radio_options->id)->first();
                                @endphp
                                <tr>
                                    <td style="text-align: left">{{$radio_with_charge_field->label_for_invoice}} - {{$data_radio->radio_options->option}}</td>
                                    <td class="text-center">NPR {{$data_value->charge}}</td>
                                    <td class="text-center">{{$data_radio->qty}}</td>
                                    <td class="text-right">NPR {{$data_value->charge*$data_radio->qty}}</td>
                                </tr>
                                @php
                                    $total_radio = $total_radio + ($data_value->charge*$data_radio->qty);
                                @endphp
                            @endforeach
                        @endif
                        <!-- /Radio -c ---->

                        <!-- Select -c ---->
                        @if(count($order->service->select_with_charge_fields)>0)
                            @foreach($order->service->select_with_charge_fields as $select_with_charge_field)
                                @php
                                    $data_select = \App\SelectWithChargeValue::where('order_id',$order->id)->where('field_id',$select_with_charge_field->id)->first();
                                    $data_value_select= \App\VendorSelectFieldCharge::where('service_provider_id',$order->provider_id)->where('field_id',$select_with_charge_field->id)->where('option_id',$data_select->select_options->id)->first();
                                @endphp
                                <tr>
                                    <td style="text-align: left">{{$select_with_charge_field->label_for_invoice}} - {{$data_select->select_options->option}}</td>
                                    <td class="text-center">NPR {{$data_value_select->charge}}</td>
                                    <td class="text-center">{{$data_select->qty}}</td>
                                    <td class="text-right">NPR {{$data_value_select->charge*$data_select->qty}}</td>
                                </tr>
                                @php
                                    $total_select = $total_select + ($data_value_select->charge*$data_select->qty);
                                @endphp
                            @endforeach
                        @endif
                        <!-- Select -c ---->

                        <!---- check -c ----->
                        @if(count($order->service->check_with_charge_fields)>0)
                            @foreach($order->service->check_with_charge_fields as $check_with_charge_field)
                                @php
                                    $data_check = \App\CheckWithChargeValue::where('order_id',$order->id)->where('field_id',$check_with_charge_field->id)->first();
                                    $data_value_select= \App\VendorSelectFieldCharge::where('service_provider_id',$order->provider_id)->where('field_id',$select_with_charge_field->id)->where('option_id',$data_select->select_options->id)->first();

                                @endphp
                                <tr>
                                    <td style="text-align: left">{{$select_with_charge_field->label_for_invoice}} - {{$data_select->select_options->option}}</td>
                                    <td class="text-center">NPR {{$data_value_select->charge}}</td>
                                    <td class="text-center">{{$data_select->qty}}</td>
                                    <td class="text-right">NPR {{$data_value_select->charge*$data_select->qty}}</td>
                                </tr>
                                @php
                                    $total_select = $total_select + ($data_value_select->charge*$data_select->qty);
                                @endphp

                            @endforeach
                        @endif
                        <!---- check -c ----->


                        <tr>
                            <td class="no-line"></td>
                            <td class="no-line"></td>
                            <td class="no-line text-center"><strong>Total</strong></td>
                            <td class="no-line text-right"><strong>NPR {{$total_check+$total_select+$total_radio}}</strong></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <u><h6><strong>Order Other Detail</strong></h6></u>
                <br><br>
                <!-- Radio ------------------->

                @if(count($order->service->radio_fields)>0)
                    @foreach($order->service->radio_fields as $radio_field)
                        <div class="row">
                            @php
                                $radio_op = \App\RadioValue::where('order_id',$order->id)->where('field_id',$radio_field->id)->first();
                            @endphp
                            <div class="col-md-8">{{$radio_field->label_for_invoice}}</div>
                            <div class="col-md-4">{{$radio_op->radio_option->option}}</div>
                        </div>
                        <hr>
                    @endforeach
                @endif


            <!-- Radio ------------------->

                <!--- Select ---------------->


                @if(count($order->service->select_fields)>0)
                    @foreach($order->service->select_fields as $select_field)
                        <div class="row">
                            @php
                                $select_op = \App\SelectValue::where('order_id',$order->id)->where('field_id',$select_field->id)->first();
                            @endphp
                            <div class="col-md-8">{{$select_field->label_for_invoice}}</div>
                            <div class="col-md-4">{{$select_op->select_option->option}}</div>
                        </div>
                        <hr>
                    @endforeach
                @endif

            <!-----/select -------------->

                <!---- check --------------->
                @if(count($order->service->check_fields)>0)
                    @foreach($order->service->check_fields as $check_field)
                        <div class="row">
                            @php
                                $check_op = \App\CheckValue::where('order_id',$order->id)->where('field_id',$check_field->id)->first();
                            @endphp
                            <div class="col-md-8">{{$check_field->label_for_invoice}}</div>
                            <div class="col-md-4">{{$check_op->check_option->option}}</div>
                        </div>
                        <hr>
                    @endforeach
                @endif

            <!---- check --------------->

                <!---- Date ---------------->
                @if(count($order->service->date_fields)>0)
                    @foreach($order->service->date_fields as $date_field)
                        <div class="row">
                            @php
                                $date_value = \App\DateValue::where('order_id',$order->id)->where('field_id',$date_field->id)->first();
                            @endphp
                            <div class="col-md-8">{{$date_field->label_for_invoice}}</div>
                            <div class="col-md-4">{{$date_value->value}}</div>
                        </div>
                        <hr>
                    @endforeach
                @endif
            <!----/ Date --------------->

                <!---- Time ---------------->
                @if(count($order->service->time_fields)>0)
                    @foreach($order->service->time_fields as $time_field)
                        <div class="row">
                            @php
                                $time_value = \App\TimeValue::where('order_id',$order->id)->where('field_id',$time_field->id)->first();
                            @endphp
                            <div class="col-md-8">{{$time_field->label_for_invoice}}</div>
                            <div class="col-md-4">{{$time_value->time_option->time}}</div>
                        </div>
                        <hr>
                    @endforeach
                @endif
            <!---- /Time ---------------->

                <!---- Text ----------------->
                @if(count($order->service->text_fields)>0)
                    @foreach($order->service->text_fields as $text_field)
                        <div class="row">
                            @php
                                $text_value = \App\TextValue::where('order_id',$order->id)->where('field_id',$text_field->id)->first();
                            @endphp
                            <div class="col-md-8">{{$text_field->label_for_invoice}}</div>
                            <div class="col-md-4">{{$text_value->value}}</div>
                        </div>
                        <hr>
                    @endforeach
                @endif

            <!----/ Text----------------->


                <!----- Textarea ------------>

                @if(count($order->service->textarea_fields)>0)
                    @foreach($order->service->textarea_fields as $textarea_field)
                        <div class="row">
                            @php
                                $textarea_value = \App\TextareaValue::where('order_id',$order->id)->where('field_id',$textarea_field->id)->first();
                            @endphp
                            @if($textarea_value)
                                <div class="col-md-12"><b>{{$textarea_field->label_for_invoice}}</b></div>
                                <div class="col-md-12">
                                    <blockquote>
                                        <p style="font-size: 14px">
                                            {{$textarea_value->value}}
                                        </p>

                                    </blockquote>
                                </div>
                            @endif
                        </div>
                        <hr>
                @endforeach
            @endif

            <!----- /Textarea ------------>






            </div>
        </div>
    </div>
</div>