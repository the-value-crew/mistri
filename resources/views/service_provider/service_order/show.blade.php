@extends('service_provider.layouts.master')
@section('title','Service Order')

@push('css')
<link rel="stylesheet" href="{{asset('dashboard/css/select2/select2.min.css')}}">

<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

<style>
    .invoice-title h2, .invoice-title h3 {
        display: inline-block;
    }

    .table > tbody > tr > .no-line {
        border-top: none;
    }

    .table > thead > tr > .no-line {
        border-bottom: none;
    }

    .table > tbody > tr > .thick-line {
        border-top: 2px solid;
    }


</style>

@endpush
@section('content')


    <div class="card">
        <div style="padding: 20px">
            <div class="row">
                <div class="col-xs-12">
                    <div class="invoice-title">
                        <h3><span style="font-weight: 400">Order For Service :</span>{{$order->service->name}}</h3><h3 class="pull-right">Order #SOU{{$order->id}}</h3>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('update.status',$order->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label><strong>Order Status</strong></label>
                                <select class="form-control select2 select2-hidden-accessible" name="status"  data-placeholder="Change Order Status" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <option value="pending" @if($order->status == "pending") selected @endif>Pending</option>
                                    <option value="confirmed" @if($order->status == "confirmed") selected @endif>Confirmed</option>
                                    <option value="completed" @if($order->status == "completed") selected @endif>Completed</option>
                                    <option value="decline" @if($order->status == "declined") selected @endif>Decline</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-sm btn-info">Update</button>
                        </form>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-6">
                            <address>
                                <strong>Billed To:</strong><br>
                                {{$order->user->name}}<br>
                                {{$order->user->email}}<br>
                                {{$order->user->phone}}<br>

                            </address>
                        </div>
                        <div class="col-xs-6 text-right">
                            <address>
                                <strong>Customer Address:</strong><br>
                                {{$order->user->userdetail->flat_number}} {{$order->user->userdetail->building}}<br>
                                {{$order->user->userdetail->street}} ,<br>
                                {{$order->user->userdetail->fulladdress}}<br>
                                {{$order->user->userdetail->addtional_direction}}<br>

                            </address>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <address>
                                <strong>Payment Method:</strong><br>
                                {{$order->payment_info}}
                            </address>
                            <br>
                            <address>
                                <strong>Service Servered In:</strong><br>
                                {{$order->service_done_in}} Premises
                            </address>
                        </div>
                        <div class="col-xs-6 text-right">
                            <address>
                                <strong>Order Date:</strong><br>
                                {{$order->created_at->format('M-d-Y')}}<br><br>
                            </address>
                        </div>
                    </div>
                </div>
            </div>

           @if($order->service->id == 72)
               @include('service_provider.service_order.show_pest_control_order')
               @else
               @include('service_provider.service_order.show_dynamic_service_order')
           @endif


        </div>
    </div>


@endsection

@push('scripts')


<script src="{{ asset('dashboard/js/select2/select2.full.min.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>

    @if(Session::has('message'))


       toastr.success("{{Session::get('message')}}",'',{
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    });


    @endif

    $(document).ready(function() {
        $(".select2").select2();
    });
</script>


@endpush
