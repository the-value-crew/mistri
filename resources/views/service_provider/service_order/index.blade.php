@extends('service_provider.layouts.master')
@section('title','Service Order')

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form method="post" action="{{route('page.store')}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header" data-background-color="">

                            <div class="card-title">
                                <h4><b>All Service Order</b></h4>

                            </div>
                        </div>
                        <div class="card-content">

                            <div class="material-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name Of customer</th>
                                        <th>Customer Email</th>
                                        <th>Customer Phone Number</th>
                                        <th>Status</th>
                                        <th style="width: 20%">Action</th>


                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name Of customer</th>
                                        <th>Customer Email</th>
                                        <th>Customer Phone Number</th>
                                        <th>Status</th>
                                        <th style="width: 20%">Action</th>


                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{$loop->index +1}}</td>
                                            <td>{{$order->user->name}}</td>
                                            <td>{{$order->user->email}}</td>
                                            <td>
                                                {{$order->user->phone}}
                                            </td>
                                            <td>
                                                <span class="tag label label-info">{{$order->status}}</span>
                                            </td>
                                            <td>
                                                <div class="col-md-4">
                                                    <a href="{{route('service-order.show',$order->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> </a>
                                                </div>
                                                <div class="col-md-1"></div>
                                                <div class="col-md-3">

                                                    {{--<button class="btn btn-danger btn-sm remove" value="{{$order->id}}"> <i class="fa fa-trash-o"></i> </button>--}}
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