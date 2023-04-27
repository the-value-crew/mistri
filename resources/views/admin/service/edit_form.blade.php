@extends('admin.layouts.master')
@section('title','Edit Service Form ')

@push('css')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('dashboard/css/lightbox.min.css')}}">
@endpush

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form method="post" action="{{route('page.store')}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header" data-background-color="">

                            <div class="card-title">
                                <h4><b>Form Field of Service : {{$service->name}}</b></h4>
                                <a href="{{route('service.index')}}" class="btn btn-sm pull-right" style="margin-top: -30px"><i class="fa fa-cogs" aria-hidden="true"></i> &nbsp;Manage</a>

                            </div>
                        </div>
                        <div class="card-content">

                            <div class="material-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Field Type</th>
                                        <th>Label</th>
                                        <th style="width: 20%">Action</th>


                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Field Type</th>
                                        <th>Label</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @php $key1 =0;  $key2=0 ; $a=0 ; $b=0 ; $c=0 ;$e=0;$f=0;$g=0;$h=0 ;$i=0;$j=0; @endphp
                                        @foreach($service->text_fields as $text_field)
                                            <tr>
                                                <td>{{++$key1}}</td>
                                                <td>Text Field</td>
                                                <td>{{$text_field->label_for_form}}</td>

                                                <td>
                                                    <div class="col-md-4">
                                                        <a href="{{route('edit.textfield',$text_field->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>
                                                    </div>
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-3">

                                                        <button type="button" class="btn btn-danger btn-sm " onclick="removeText({{$text_field->id}})" value="{{$text_field->id}}"> <i class="fa fa-trash-o"></i> </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @php $a = $key1; @endphp
                                        @endforeach

                                    @foreach($service->textarea_fields as $text_area_field)
                                        <tr>
                                            <td>{{++$a}}</td>
                                            <td>Textarea Field</td>
                                            <td>{{$text_area_field->label_for_form}}</td>

                                            <td>
                                                <div class="col-md-4">
                                                    <a href="{{route('edit.textareafield',$text_area_field->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>
                                                </div>
                                                <div class="col-md-1"></div>
                                                <div class="col-md-3">

                                                    <button type="button" class="btn btn-danger btn-sm" onclick="removeTextarea({{$text_area_field->id}})" value="{{$text_area_field->id}}"> <i class="fa fa-trash-o"></i> </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @php $b = $a; @endphp
                                    @endforeach

                                    @foreach($service->date_fields as $date_field)
                                        <tr>
                                            <td>{{++$b}}</td>
                                            <td>Date Field</td>
                                            <td>{{$date_field->label_for_form}}</td>

                                            <td>
                                                <div class="col-md-4">
                                                    <a href="{{route('edit.datefield',$date_field->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>
                                                </div>
                                                <div class="col-md-1"></div>
                                                <div class="col-md-3">

                                                    <button type="button" class="btn btn-danger btn-sm" onclick="removeDate({{$date_field->id}})" value="{{$date_field->id}}"> <i class="fa fa-trash-o"></i> </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @php $c = $b; @endphp
                                    @endforeach

                                    @foreach($service->time_fields as $time_field)
                                        <tr>
                                            <td>{{++$c}}</td>
                                            <td>Time Field</td>
                                            <td>{{$time_field->label_for_form}}</td>

                                            <td>
                                                <div class="col-md-4">
                                                    <a href="{{route('edit.timefield',$time_field->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>
                                                </div>
                                                <div class="col-md-1"></div>
                                                <div class="col-md-3">

                                                    <button type="button" class="btn btn-danger btn-sm " onclick="removeTime({{$time_field->id}})" value="{{$time_field->id}}"> <i class="fa fa-trash-o"></i> </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @php $e = $c; @endphp
                                    @endforeach

                                    @foreach($service->check_with_charge_fields as $check_with_charge_field)
                                        <tr>
                                            <td>{{++$e}}</td>
                                            <td>Chekbox Field ( with charge )</td>
                                            <td>{{$check_with_charge_field->label_for_form}}</td>

                                            <td>
                                                <div class="col-md-4">
                                                    <a href="{{route('edit.checkFieldWithCharge',$check_with_charge_field->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>
                                                </div>
                                                <div class="col-md-1"></div>
                                                <div class="col-md-3">

                                                    <button type="button" class="btn btn-danger btn-sm " onclick="removeCheck({{$check_with_charge_field->id}})" value="{{$check_with_charge_field->id}}"> <i class="fa fa-trash-o"></i> </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @php $f = $e; @endphp
                                    @endforeach

                                    @foreach($service->check_fields as $check_field)
                                        <tr>
                                            <td>{{++$f}}</td>
                                            <td>Chekbox Field </td>
                                            <td>{{$check_field->label_for_form}}</td>

                                            <td>
                                                <div class="col-md-4">
                                                    <a href="{{route('edit.checkField',$check_field->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>
                                                </div>
                                                <div class="col-md-1"></div>
                                                <div class="col-md-3">

                                                    <button type="button" class="btn btn-danger btn-sm " onclick="removeCheckField({{$check_field->id}})" value="{{$check_field->id}}"> <i class="fa fa-trash-o"></i> </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @php $g = $f; @endphp
                                    @endforeach

                                    @foreach($service->radio_with_charge_fields as $radio_with_charge_field)
                                        <tr>
                                            <td>{{++$e}}</td>
                                            <td>Radio Field ( with charge )</td>
                                            <td>{{$radio_with_charge_field->label_for_form}}</td>

                                            <td>
                                                <div class="col-md-4">
                                                    <a href="{{route('edit.radioFieldWithCharge',$radio_with_charge_field->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>
                                                </div>
                                                <div class="col-md-1"></div>
                                                <div class="col-md-3">

                                                    <button type="button" class="btn btn-danger btn-sm " onclick="removeRadioWithCharge({{$radio_with_charge_field->id}})" value="{{$radio_with_charge_field->id}}"> <i class="fa fa-trash-o"></i> </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @php $h = $g; @endphp
                                    @endforeach

                                    @foreach($service->radio_fields as $radio_field)
                                        <tr>
                                            <td>{{++$h}}</td>
                                            <td>Radio Field </td>
                                            <td>{{$radio_field->label_for_form}}</td>

                                            <td>
                                                <div class="col-md-4">
                                                    <a href="{{route('edit.radioField',$radio_field->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>
                                                </div>
                                                <div class="col-md-1"></div>
                                                <div class="col-md-3">

                                                    <button type="button" class="btn btn-danger btn-sm " onclick="removeRadioField({{$radio_field->id}})" value="{{$radio_field->id}}"> <i class="fa fa-trash-o"></i> </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @php $i = $h; @endphp
                                    @endforeach


                                    @foreach($service->select_with_charge_fields as $select_with_charge_field)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td>Select Field ( with charge )</td>
                                            <td>{{$select_with_charge_field->label_for_form}}</td>

                                            <td>
                                                <div class="col-md-4">
                                                    <a href="{{route('edit.selectFieldWithCharge',$select_with_charge_field->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>
                                                </div>
                                                <div class="col-md-1"></div>
                                                <div class="col-md-3">

                                                    <button type="button" class="btn btn-danger btn-sm " onclick="removeSelectWithCharge({{$select_with_charge_field->id}})" value="{{$select_with_charge_field->id}}"> <i class="fa fa-trash-o"></i> </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @php $j = $i; @endphp
                                    @endforeach

                                    @foreach($service->select_fields as $select_field)
                                        <tr>
                                            <td>{{++$j}}</td>
                                            <td>Select Field </td>
                                            <td>{{$select_field->label_for_form}}</td>

                                            <td>
                                                <div class="col-md-4">
                                                    <a href="{{route('edit.selectField',$select_field->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>
                                                </div>
                                                <div class="col-md-1"></div>
                                                <div class="col-md-3">

                                                    <button type="button" class="btn btn-danger btn-sm " onclick="removeSelectField({{$select_field->id}})" value="{{$select_field->id}}"> <i class="fa fa-trash-o"></i> </button>
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
        table.on('click', '.remove-text', function(e) {

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
                    url:'{!!URL::to('admin/delete-service-text-field/')!!}' + '/' + id,
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



<script type="text/javascript">

    var csrf_token = $('meta[name="csrf-token"]').attr('content');

    function removeText(id) {
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
                url:'{!!URL::to('admin/delete-service-text-field/')!!}' + '/' + id,
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

    function removeTextarea(id) {
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
                url:'{!!URL::to('admin/delete-service-textarea-field/')!!}' + '/' + id,
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

    function removeDate(id) {
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
                url:'{!!URL::to('admin/delete-service-date-field/')!!}' + '/' + id,
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

    function removeTime(id) {
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
                url:'{!!URL::to('admin/delete-service-time-field/')!!}' + '/' + id,
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

    function removeCheck(id) {
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
                url:'{!!URL::to('admin/check-field-with-charge/')!!}' + '/' + id,
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

    function removeCheckField(id) {

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
                url:'{!!URL::to('admin/check-field/')!!}' + '/' + id,
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

    function removeRadioWithCharge(id) {

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
                url:'{!!URL::to('admin/radio-field-with-charge/')!!}' + '/' + id,
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

    function removeRadioField(id) {

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
                url:'{!!URL::to('admin/radio-field/')!!}' + '/' + id,
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

    function removeSelectWithCharge(id) {
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
                url:'{!!URL::to('admin/select-field-with-charge/')!!}' + '/' + id,
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

    function removeSelectField(id) {
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
                url:'{!!URL::to('admin/select-field/')!!}' + '/' + id,
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