@extends('admin.layouts.master')
@section('title','Vendor Services')

@push('css')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="{{asset('dashboard/css/lightbox.min.css')}}">
@endpush

@section('content')
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12 col-lg-12">
                <div class="alert alert-success" id="msg" style="display: none"></div>
                <div class="alert alert-danger" id="msg1" style="display: none"></div>

            </div>

            <div class="col-md-12 col-lg-12">
                <div class="alert alert-success" id="msg" style="display: none"></div>
                <div class="alert alert-danger" id="msg1" style="display: none"></div>

            </div>


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="">

                        <div class="card-title">
                            <h4><b>All Service of :: {{$vendor->name}}</b></h4>

                        </div>
                    </div>
                    <div class="card-content">

                        <ul class="nav nav-pills nav-pills-warning">
                            <li class="active">
                                <a href="#pill1" data-toggle="tab">All Services</a>
                            </li>
                            <li>
                                <a href="#pill2" data-toggle="tab">Pending Services</a>
                            </li>
                            <li>
                                <a href="#pill3" data-toggle="tab">Approved Services</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="pill1">
                                <div class="material-datatables">
                                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Service Provider Name</th>
                                            <th>Service Name</th>
                                            <th>Status</th>
                                            <th>Action</th>


                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Service Provider Name</th>
                                            <th>Service Name</th>
                                            <th>Status</th>

                                            <th>Action</th>



                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($vendor->services as $service)
                                            @php
                                                $data = \App\Service::find($service->pivot->service_id);
                                                $user_service = \Illuminate\Support\Facades\DB::table('user_service')->where('service_id',$service->pivot->service_id)->where('user_id',$service->pivot->user_id)->first();

                                            @endphp
                                            <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td>{{$vendor->name}}</td>
                                                <td>{{$data->name}} </td>

                                                <td>Approved</td>
                                                <td>
                                                    <div class="col-md-4">
                                                        <a href="{{route('service.request.detail',$user_service->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> </a>
                                                    </div>
                                                </td>


                                            </tr>
                                        @endforeach

                                        @foreach($vendor->nonApprovedServices as $nonApprovedService)
                                            @php
                                                $data_n= \App\Service::find($nonApprovedService->pivot->service_id);
                                                $user_service_n = \Illuminate\Support\Facades\DB::table('user_service')->where('service_id',$nonApprovedService->pivot->service_id)->where('user_id',$nonApprovedService->pivot->user_id)->first();

                                            @endphp
                                            <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td>{{$vendor->name}}</td>
                                                <td>{{$data_n->name}} </td>

                                                <td>Pending</td>
                                                <td>
                                                    <div class="col-md-4">
                                                        <a href="{{route('service.request.detail',$user_service_n->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> </a>
                                                    </div>
                                                </td>


                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="tab-pane" id="pill2">
                                <div class="material-datatables">
                                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Service Provider Name</th>
                                            <th>Service Name</th>
                                            <th>Status</th>
                                            <th>Action</th>


                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Service Provider Name</th>
                                            <th>Service Name</th>
                                            <th>Status</th>

                                            <th>Action</th>



                                        </tr>
                                        </tfoot>
                                        <tbody>


                                        @foreach($vendor->nonApprovedServices as $nonApprovedService)
                                            @php
                                                $data_n= \App\Service::find($nonApprovedService->pivot->service_id);
                                                $user_service_n = \Illuminate\Support\Facades\DB::table('user_service')->where('service_id',$nonApprovedService->pivot->service_id)->where('user_id',$nonApprovedService->pivot->user_id)->first();

                                            @endphp
                                            <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td>{{$vendor->name}}</td>
                                                <td>{{$data_n->name}} </td>

                                                <td>Pending</td>
                                                <td>
                                                    <div class="col-md-4">
                                                        <a href="{{route('service.request.detail',$user_service_n->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> </a>
                                                    </div>
                                                </td>


                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="pill3">
                                <div class="material-datatables">
                                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Service Provider Name</th>
                                            <th>Service Name</th>
                                            <th>Status</th>
                                            <th>Action</th>


                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Service Provider Name</th>
                                            <th>Service Name</th>
                                            <th>Status</th>

                                            <th>Action</th>



                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($vendor->services as $service)
                                            @php
                                                $data = \App\Service::find($service->pivot->service_id);
                                                $user_service = \Illuminate\Support\Facades\DB::table('user_service')->where('service_id',$service->pivot->service_id)->where('user_id',$service->pivot->user_id)->first();

                                            @endphp
                                            <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td>{{$vendor->name}}</td>
                                                <td>{{$data->name}} </td>

                                                <td>Approved</td>
                                                <td>
                                                    <div class="col-md-4">
                                                        <a href="{{route('service.request.detail',$user_service->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> </a>
                                                    </div>
                                                </td>


                                            </tr>
                                        @endforeach

                                       

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>

    var csrf_token = $('meta[name="csrf-token"]').attr('content');

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



    function changeServiceStatus(status)
    {
        $.ajax({
            url:'{!!URL::to('admin/service/changeServiceStatus')!!}' + '/' + status,
            type : "POST",
            data : {'_method' : 'PUT', '_token' : csrf_token},

            success:function(response){

                console.log(response);
                $('#msg').css('display', 'block');
                $("#msg").html(response.message);
                $("#msg").fadeOut(8000);
                location.reload();
            },
            error:function(){

            }
        });


    }








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
                    url:'{!!URL::to('admin/service/')!!}' + '/' + id,
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

    function deleteData(id) {
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
                url:'{!!URL::to('admin/service-category/')!!}' + '/' + id,
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

    }

</script>



@endpush