@extends('service_provider.layouts.master')
@section('title','Subscribed Plan')

@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form method="post" action="{{route('subscription-plan.store')}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header" data-background-color="">

                            <div class="card-title">
                                <h4><b>Subscribed Plans</b></h4>

                            </div>
                        </div>
                        <div class="card-content">

                            <div class="material-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>S.No</th>

                                        <th>Plan</th>
                                        <th>Plan Start On</th>
                                        <th>Plan Expire On</th>
                                        <th>Status</th>
                                        <th style="width: 20%">Action</th>


                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>S.No</th>

                                        <th>Plan</th>
                                        <th>Plan Start On</th>
                                        <th>Plan Expire On</th>
                                        <th>Status</th>
                                        <th style="width: 20%">Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($plans as $plan)
                                        <tr>
                                            <td>{{$loop->index +1}}</td>

                                            <td>{{$plan->plan->name}}</td>
                                            <td>{{$plan->active_from_date}}</td>
                                            <td>{{$plan->expiry_date}}</td>
                                            <td><span class="tag label label-info">@if($plan->status == "on") Active @else Inactive @endif</span></td>
                                            <td>
                                                <div class="col-md-4">
                                                    <a href="#"  data-toggle="modal"  data-target=".bd-example-modal-lg-{{$plan->id}}" class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> </a>
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

        <!------------ Model to view plan  -------------------->
        @foreach($plans as $plan)
            <div class="modal fade bd-example-modal-lg-{{$plan->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <form action="" class="cf">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><b>{{$plan->plan->name}}</b></h5>
                                <hr>
                            </div>
                            <div class="modal-body">

                                <div class="form-group col-md-12" style="margin-top: -10px;margin-bottom: 50px">
                                    {!! $plan->plan->description !!}
                                </div>

                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
    @endforeach
    <!------------ /Model to view plan  ------------------->

    </div>

@endsection

@push('scripts')
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






</script>




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
                    url:'{!!URL::to('admin/subscribed-user/')!!}' + '/' + id,
                    type : "get",
                    data : {'_token' : csrf_token},

                    success:function(){
                        table.row($tr).remove().draw();
                        console.log('success');
//                        location.reload();


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