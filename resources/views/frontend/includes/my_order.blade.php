<div class="tab-pane fade row m-0 booking-tab" id="booking-tab" role="tabpanel">

    @if(count($user->customer_orders)>0)
    <div class="checkout--wrapper">
        <h2 class="title--description">My Orders</h2>
        <table class="table  table-responsive  table-borderless">
            <thead>
            <tr>
                <th scope="col">S.No</th>
                <th scope="col">Order ID</th>
                <th scope="col">Service</th>
                <th scope="col">Date</th>

                <th scope="col">Status</th>
                <th scope="col">View Detail</th>

            </tr>
            </thead>
            <tbody>
            @foreach($user->customer_orders as $key=>$value)

                    <tr>
                        <td>{{++$key}}</td>
                        <td>#SOU{{$value->id}}</td>
                        <td>{{$value->service->name}}</td>
                        <td>{{$value->created_at->format('d-M-y')}}</td>

                        <td>{{$value->status}}</td>
                        @if($value->provider_id != 1)
                            <td style="text-align: center;color: #23bddf;"><a href="#!" data-toggle="modal" data-target=".order-detail-{{$value->id}}"><i class="fa fa-eye"></i></a>
                        @else
                            <td style="text-align: center;color: #23bddf;"><a href="#!" data-toggle="modal" data-target=".order-detail-{{$value->id}}">Wait for Vendor Suggestion</a>

                        @endif
                        </td>
                    </tr>

            @endforeach




            </tbody>
        </table>


    </div>
    @endif

    @if(count($user->customer_orders)<=0)
    <div class="checkout--wrapper empty">
							<span class="material-icons">
								event_busy
							</span>
        <h2 class="title--description">Looks like you haven't made any bookings yet
            Once you make a booking, all the details will appear here.</h2>
    </div>
    @endif
</div>

@foreach($user->customer_orders as $key=>$order)
    @if($order->provider_id != 1)
    <div class="modal fade order-detail-{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalCenterTitle" style="padding: 10px">Order Detail</h6>

            </div>
            <div class="modal-body">


                    <div style="padding: 20px">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="invoice-title">
                                    <h6><span style="font-weight: 600">Order For Service &nbsp;&nbsp;&nbsp;</span>{{$order->service->name}}</h6>
                                </div>


                                <div class="row">
                                    <div class="col-xs-6">
                                        <address>
                                            <strong>Payment Method:</strong>&nbsp;&nbsp;&nbsp;
                                            {{$order->payment_info}}
                                        </address>

                                        <address>
                                            <strong>Service  Provder:</strong>&nbsp;&nbsp;&nbsp;
                                            {{$order->vendor->name}}
                                        </address>
                                    </div>

                                </div>
                            </div>
                        </div>

                        @if($order->service->id == 72)
                            @include('admin.order.show_pest_control_order')

                        @elseif($order->service->id == 86)

                            @include('frontend.includes.show_paint_order')

                        @elseif($order->service->id == 84)

                            @include('frontend.includes.show_deepclean_order')

                        @elseif($order->service->id == 85)

                            @include('frontend.includes.sanitization_order')
                        @else

                            @include('frontend.includes.show_dynamic_service_order')
                        @endif

                    </div>

            </div>

        </div>
    </div>
</div>
    @endif
@endforeach