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
                        </tr>
                        </thead>
                        <tbody>
                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                        <tr>
                            <td style="text-align: left">Premises Type</td>
                            <td style="text-align: left">{{$order->sanitization_order->premises_type}}</td>

                        </tr>

                        @if($order->sanitization_order->premises_type == "Residential")
                            <tr>
                                <td style="text-align: left">Home Type</td>
                                <td style="text-align: left">{{$order->sanitization_order->home_type}}</td>
                            </tr>
                            <tr>
                                <td style="text-align: left">Home Size</td>
                                <td style="text-align: left">{{$order->sanitization_order->home_size}}</td>
                            </tr>
                        @endif

                        @if($order->sanitization_order->premises_type == "Commercial")
                            <tr>
                                <td style="text-align: left">Office Size</td>
                                <td style="text-align: left">{{$order->sanitization_order->office_size}}</td>
                            </tr>
                            <tr>
                                <td style="text-align: left">Number of Cabin</td>
                                <td style="text-align: left">{{$order->sanitization_order->number_of_cabin}}</td>
                            </tr>
                            <tr>
                                <td style="text-align: left">Number of Desk</td>
                                <td style="text-align: left">{{$order->sanitization_order->number_of_desk}}</td>
                            </tr>
                        @endif



                        <tr>
                            <td style="text-align: left">Time</td>
                            <td style="text-align: left">{{$order->sanitization_order->time->format('H:i:s a')}}</td>
                        </tr>

                        <tr>
                            <td style="text-align: left">Date</td>
                            <td style="text-align: left">{{$order->sanitization_order->date->format('d-M-y')}}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>











            </div>
        </div>
    </div>
</div>