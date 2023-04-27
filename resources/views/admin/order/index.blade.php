@extends('admin.layouts.master')
@section('title','Service Order')

@section('content')

    <style>



        .nav-pills>li>a {
            line-height: 24px;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 500;
            min-width: 100px;
            text-align: center;
            color: #555555;
            transition: all .3s;
            background-color: #eee;
        }

    </style>

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header" data-background-color="">

                            <div class="card-title">
                                <h4><b>All Service Order</b></h4>

                            </div>
                        </div>
                        <div class="card-content">
                            <div class="material-datatables">
                                <ul class="nav nav-pills nav-pills-warning">
                                    <li  class="@if(request()->is('admin/order')) active @endif ">
                                        <a href="{{route('order.index')}}">All Orders</a>
                                    </li>
                                    <li class="@if(request()->is('admin/order/pending-order')) active @endif ">
                                        <a href="{{route('order.pending')}}">Pending Orders</a>
                                    </li>
                                    <li class="@if(request()->is('admin/order/confirmed-order')) active @endif ">
                                        <a href="{{route('order.confirmed')}}">Confirmed Order</a>
                                    </li>
                                    <li class="@if(request()->is('admin/order/completed-order')) active @endif ">
                                        <a href="{{route('order.completed')}}">Competed Order</a>
                                    </li>

                                    <li class="@if(request()->is('admin/order/declined-order')) active @endif ">
                                        <a href="{{route('order.declined')}}">Declined Order</a>
                                    </li>

                                    <li class="@if(request()->is('admin/order/suggest-vendor-to-customer')) active @endif ">
                                        <a href="{{route('order.suggest.vendor')}}">Suggest Vendor</a>
                                    </li>

                                </ul>
                                <br>
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>S.No</th>
                                        @if(!request()->is('admin/order/suggest-vendor-to-customer'))
                                            <th>Vendor</th>
                                        @endif
                                        <th>Service</th>
                                        <th>Customer</th>
                                        {{--<th>Customer Email</th>--}}
                                        <th>Customer Phone</th>
                                        <th>Status</th>
                                        <th style="width: 20%">Action</th>


                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>S.No</th>
                                        @if(!request()->is('admin/order/suggest-vendor-to-customer'))
                                            <th>Vendor</th>
                                        @endif
                                        <th>Service</th>
                                        <th>Customer</th>
                                        {{--<th>Customer Email</th>--}}
                                        <th>Customer Phone</th>
                                        <th>Status</th>
                                        <th style="width: 20%">Action</th>


                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{$loop->index +1}}</td>
                                            @if(!request()->is('admin/order/suggest-vendor-to-customer'))
                                            <td>{{$order->vendor->name}}</td>
                                            @endif
                                            <td>{{$order->service->name}}</td>
                                            <td>{{$order->user->name}}</td>
                                            {{--<td>{{$order->user->email}}</td>--}}
                                            <td>
                                                {{$order->user->phone}}
                                            </td>
                                            <td>
                                                <span class="tag label label-info">{{$order->status}}</span>
                                            </td>
                                            <td>
                                                    @if(!request()->is('admin/order/suggest-vendor-to-customer'))
                                                    <div class="col-md-4">
                                                        <a href="{{route('order.edit',$order->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> </a>
                                                    </div>
                                                    @else
                                                    <div class="col-md-4">
                                                        <a href="{{route('suggest.vendor',$order->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> </a>
                                                    </div>

                                                    @endif
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-3">

                                                    </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });


        var table = $('#datatables').DataTable();

        // Edit record
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');

            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function(e) {

            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();

            var id = $(this).val();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');

            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {

                $.ajax({
                    url:'{!!URL::to('service-provider/service-order/')!!}' + '/' + id,
                    type : "POST",
                    data : {'_method' : 'DELETE', '_token' : csrf_token},

                    success:function(){



                        console.log('success');
                        location.reload();


                    },
                    error:function(){
                        swal({
                            title: 'Oops...',
                            text: data.message,
                            type: 'error',
                            timer: '1500'
                        })
                    }
                });

            });



        });

        //Like record
        table.on('click', '.like', function() {
            alert('You clicked on Like button');
        });

        $('.card .material-datatables label').addClass('form-group');
    });
</script>

@endpush