<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Order summary</strong></h3>
            </div>
            <div class="panel-body">

                <div class="table-responsive">
                    <table class="table table-condensed">
                        <thead>
                        <tr>
                            <td style="text-align: left"><strong>#</strong></td>
                            <td style="text-align: left"><strong>Details</strong></td>
                            <td style="text-align: left"><strong>Charges</strong></td>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                        <tr>
                            <td style="text-align: left">Premises Type</td>
                            <td style="text-align: left">{{$order->pest_control_order->premises_type}}</td>
                            <td> - </td>

                        </tr>

                        @if($order->pest_control_order->premises_type == "Residential")
                            <tr>
                                <td style="text-align: left">Home Type</td>
                                <td style="text-align: left">{{$order->pest_control_order->home_type}}</td>
                                <td> - </td>
                            </tr>
                            <tr>
                                <td style="text-align: left">Home Size</td>
                                <td style="text-align: left">{{$order->pest_control_order->home_size}}</td>
                                <td> - </td>
                            </tr>
                        @endif

                        @if($order->pest_control_order->premises_type == "Commercial")
                            <tr>
                                <td style="text-align: left">Office Size</td>
                                <td style="text-align: left">{{$order->pest_control_order->office_size}}</td>
                                <td> - </td>
                            </tr>
                            <tr>
                                <td style="text-align: left">Number of Cabin</td>
                                <td style="text-align: left">{{$order->pest_control_order->number_of_cabin}}</td>
                                <td> - </td>
                            </tr>
                            <tr>
                                <td style="text-align: left">Number of Desk</td>
                                <td style="text-align: left">{{$order->pest_control_order->number_of_desk}}</td>
                                <td> - </td>
                            </tr>
                        @endif

                        <tr>
                            <td style="text-align: left">Time</td>
                            <td style="text-align: left">{{$order->pest_control_order->time->format('H:i:s a')}}</td>
                            <td> - </td>
                        </tr>

                        <tr>
                            <td style="text-align: left">Date</td>
                            <td style="text-align: left">{{$order->pest_control_order->date->format('d-M-y')}}</td>
                            <td> - </td>
                        </tr>

                        <tr>
                            <td style="text-align: left">Treatment Required For (According to office/apartment size)</td>
                            <td style="text-align: left">
                                {{--{{str_replace(['[',']','"'],' ',$order->pest_control_order->treatment_for)}}--}}
                                @foreach(json_decode($order->pest_control_order->treatment_for) as $item)
                                    @php
                                        $data = \App\PestControlTreatmentType::find($item);
                                    @endphp

                                    {{$data->name}} <br><br>


                                @endforeach
                            </td>
                            <td>
                                @foreach(json_decode($order->pest_control_order->treatment_for) as $item)
                                    @php
                                        $data = \App\PestControlTreatmentType::find($item);
                                    @endphp

                                    {{getPestControlTreatmentCharge($order,$item)}}

                                     <br><br>


                                @endforeach
                            </td>


                        </tr>

                        <tr>
                            <td></td>
                            <td><b> Total </b></td>
                            <td><b> NPR : {{totalServiceCharge($order->id)}} </b></td>
                        </tr>



                        </tbody>
                    </table>
                </div>











            </div>
        </div>
    </div>
</div>