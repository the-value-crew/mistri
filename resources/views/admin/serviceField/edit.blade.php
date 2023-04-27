@extends('admin.layouts.master')
@section('title', $edit ? 'Edit Service Field' :'Create Service Field')

@push('css')
<link rel="stylesheet" href="{{asset('dashboard/css/select2/select2.min.css')}}">

<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form method="post" action="{{route('service-field.update',$service_category->id)}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-header" data-background-color="">

                            <div class="card-title">
                                <h4><b>Edit Service Field of  {{$service_category->name}}</b></h4>
                                <a href="{{route('service-field.index')}}" class="btn btn-sm pull-right" style="margin-top: -30px"><i class="fa fa-cogs" aria-hidden="true"></i> &nbsp;Manage</a>
                            </div>
                        </div>
                        <div class="card-content">


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Select Input Type</label>
                                    <select class="form-control select2 select2-hidden-accessible" id="input_type" onchange="showOption(this.value)" name="input_type"  data-placeholder="Select Category"  data-style="select-with-transition" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        <option value=" ">Select Category for service</option>
                                        @foreach ($input_types as $input_type)
                                            <option value="{{$input_type->id}}">{{$input_type->name}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('input_type'))
                                        <span class="error-message">
                                            *{{ $errors->first('input_type') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Required</label>
                                    <select class="form-control select2 select2-hidden-accessible" name="required"  data-placeholder="Select Category" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                    @if ($errors->has('required'))
                                        <span class="error-message">
                                                    *{{ $errors->first('required') }}
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Label</label>
                                    <input type="text"  class="form-control" name="label" id="title" value="{{old('label')}}">
                                    @if ($errors->has('label'))
                                        <span class="error-message">
                                                    *{{ $errors->first('label') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-3" style="display: none" id="options">
                                <div class="form-group">
                                    <label>Options</label>
                                    <input type="text"  class="form-control" name="options" id="title" value="{{old('name')}}" placeholder="option1 , otion2 , option3">
                                    @if ($errors->has('options'))
                                        <span class="error-message">
                                                    *{{ $errors->first('options') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <br><br><br><br><br><br><br>
                            <hr>
                            <h5 style="font-size: small; font-weight: 900">Input fields for {{$service_category->name}} Service</h5>
                            <br>

                            <div class="alert alert-success" id="msg" style="display: none"> </div>


                            <table class="table table-light table-border">
                                    <thead style="border-bottom: dashed">
                                        <tr>
                                            <td><b>Field</b></td>
                                            <td><b>Action</b></td>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($fields as $field)
                                    <tr>
                                        <td>
                                            <span style="background: #00bcd4; color: #ffffff; padding: 4px ; border-radius: 2px; margin-right: 5px ">{{$field->label}}</span>
                                        </td>
                                        <td>


                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModel-{{$field->id}}">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <div class="modal fade" id="editModel-{{$field->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header model-header-category">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Field</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label" >Label</label>
                                                                <input type="text"  id="label{{$field->id}}"  class="form-control" name="label" value="{{$field->label}}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Input Type</label>
                                                                @php
                                                                    $input_type = \App\InputTpye::where('id',$field->input_type_id)->first();
                                                                @endphp
                                                                <input type="text"   class="form-control"  value="{{$input_type->name}}" readonly>


                                                            @if ($errors->has('input_type'))
                                                                    <span class="error-message">
                                                                        *{{ $errors->first('input_type') }}
                                                                    </span>

                                                                @endif
                                                            </div>

                                                            @if($field->input_type_id == 11)
                                                                <div class="form-group">
                                                                    <label>Options</label>
                                                                    <input type="text"  class="form-control" name="options" id="options{{$field->id}}" value="{{$field->options}}" placeholder="option1 , otion2 , option3">
                                                                    @if ($errors->has('options'))
                                                                        <span class="error-message">
                                                                         *{{ $errors->first('options') }}
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class="modal-footer">
                                                            <a href="#" class="btn btn-primary" data-dismiss="modal" onclick="updatefunction({{$field->id}})">Update</a>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="button" class="btn btn-danger btn-sm remove"  onclick="deleteData({{$field->id}})"> <i class="fa fa-trash-o"></i> </button>

                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>


                            <hr>

                            <div class="clearfix"></div>

                            <div class="form-footer text-right">
                                <div class="checkbox pull-left">
                                </div>
                                <button type="submit" class="btn btn-info btn-fill">{{"Update"}}</button>
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
    var csrf_token = $('meta[name="csrf-token"]').attr('content');

    function deleteData(id) {

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
                url: '{!!URL::to('admin/delete-input-field/')!!}' + '/' + id,
                type: "POST",
                data: {'_method': 'DELETE', '_token': csrf_token},

                success: function () {
                    location.reload();
                },
                error: function () {
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

        function updatefunction(id) {


            var label = $('#label' + id).val();
            var options = $('#options' + id).val();

            $.ajax({
                url: '{!!URL::to('admin/update-input-field/')!!}' + '/' + id,
                type: "POST",
                data: {'_method': 'PUT', '_token': csrf_token, 'label': label, 'options': options},

                success: function (data) {
                    console.log(data.success);
                    $("#msg").show();
                    $("#msg").html(data.success);
                    $("#msg").fadeOut(10000);
                    location.reload();
                },
                error: function () {
                    swal({
                        title: 'Oops...',
                        text: data.message,
                        type: 'error',
                        timer: '1500'
                    })
                }
            });
        }


        function showOption(id) {

            if (id == 11) {
                $('#options').css('display', 'block');
            } else {
                $('#options').css('display', 'none');
            }
        }

        @if(Session::has('message'))


            toastr.success("{{Session::get('message')}}", '', {
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


        function convertToSlug(title) {
            return title
                .toLowerCase()
                .replace(/ /g, '-')
                .replace(/&/g, 'and')
                .replace(/[^\w-]+/g, '');

        }

        $('#title').on('keyup', function () {
            var title = $(this).val();
            var slug = convertToSlug(title);
            $('#slug').val(slug);
        });









</script>

<script src="{{ asset('dashboard/js/select2/select2.full.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $(".select2").select2();
    });
</script>
@endpush