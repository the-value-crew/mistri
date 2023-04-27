@extends('admin.layouts.master')
@section('title','Service Providers')

@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

@endpush

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12 col-lg-12">
                <p class="alert alert-success" id="msg" style="display: none"></p>
            </div>

            <div class="col-md-12">
                <div class="alert alert-success frontend-message-container" style="position: fixed; top: 5px; right: 5px; z-index: 9999; width: 500px; opacity: 0.9; display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">

                    </button>
                    <p class="frontend-message"></p>
                </div>

                <div class="card">

                        <div class="card-header" data-background-color="">

                            <div class="card-title">
                                <h4><b>All Service Provider</b></h4>
                            </div>
                        </div>
                        <div class="card-content">

                            <div class="material-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>View Services</th>
                                        <th>Priority</th>
                                        <th>Status</th>
                                        <th style="width: 20%">Action</th>


                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>View Services</th>
                                        <th>Priority</th>
                                        <th>Status</th>
                                        <th>Action</th>


                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($providers as $provider)
                                        <tr>
                                            <td>{{$loop->index +1}}</td>
                                            <td>{{$provider->name}}</td>
                                            <td>{{$provider->email}}</td>
                                            <td>
                                                <a href="{{route('allServicesOfVendor',['vendor_name'=>$provider->name,'id'=>$provider->id])}}"><span class="material-icons">list_alt</span><sub>({{count($provider->services)}})</sub></a>
                                            </td>
                                            <td><input type="text" data-url="{{route('provider.set-priority',$provider->id)}}"  value="{{$provider->priority}}" style="width:50px;" class="category-priority"></td>
                                            <td>


                                                    <div class="form-group">
                                                        <div class="togglebutton">
                                                            <label class="lead" style="color:black;font-weight:bold;font-size:11pt;">
                                                                 <input type="checkbox" name="active" @if($provider->status == 1) checked @endif  onchange="changeStatus('{{$provider->id}}','{{$provider->status}}')">
                                                            </label>
                                                        </div>
                                                    </div>


                                            </td>
                                            <td>
                                                <div class="col-md-4">
                                                    <a href="{{route('service-provider.show',$provider->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> </a>
                                                </div>
                                                <div class="col-md-1"></div>
                                                <div class="col-md-3">

                                                    <button class="btn btn-danger btn-sm remove" value="{{$provider->id}}"> <i class="fa fa-trash-o"></i> </button>
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



@endsection

@push('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>

    @if(\Session::has('message'))


        toastr.success("{{\Session::get('message')}}",'',{
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

    function changeStatus(id,status)
    {
        var csrf_token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url:'{!!URL::to('admin/service-provider/')!!}' + '/' + id,
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
                    url:'{!!URL::to('admin/service-provider/')!!}' + '/' + id,
                    type : "POST",
                    data : {'_method' : 'DELETE', '_token' : csrf_token},

                    success:function(){



                        console.log('success');
                        location.reload();


                    },

                });

            });



        });



        $('.card .material-datatables label').addClass('form-group');
    });
</script>

<script>
    $(document).ready(function () {

        var $category = $('.category-priority');
        var initialPriorityValue;
        $category.on('focus', function () {
            initialPriorityValue = $(this).val();
        });
        $category.on('blur', function () {
            if (initialPriorityValue !== $(this).val()) {
                $.ajax({
                    url: $(this).data('url'),
                    data: {
                        priority: $(this).val()
                    },
                    success: function (response) {
                        console.log(response);
                        showSuccessMessage(response.message);
                    },
                    error: function (response) {
                        console.log('Error: ', response);
                    }
                })
            }
        });
    });

    function showSuccessMessage(e)
        {   var n=$(".frontend-message-container");
            n.fadeIn(),
                $(".frontend-message").html(e);
            setTimeout(function(){n.fadeOut()},5e3)}
            $(document).ready(function(){});
</script>



@endpush