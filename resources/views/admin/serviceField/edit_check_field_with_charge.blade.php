@extends('admin.layouts.master')
@section('title','Edit Check Option Field')
@push('css')

<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@endpush
@section('content')

    <style>
        .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
            padding: 8px;
            line-height: 1.42857143;
            vertical-align: top;
            border-top: none;
        }
    </style>

    <div class="container-fluid">

        <div class="row rowstyle">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-head" data-background-color="">

                        <div class="card-title">
                            <h4><b>Edit Check Option Field </b></h4>
                            <a href="{{route('edit.form',['id'=>$field->service_id,'slug'=>\Illuminate\Support\Str::slug($field->service->name)])}}" class="btn btn-sm pull-right" style="margin-top: -30px"><span class="material-icons">keyboard_return</span> &nbsp;Back</a>

                        </div>
                    </div>
                    <div class="card-content">

                        <form method="post" action="{{route('update.checkFieldWithCharge',$field->id)}}" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label>Label for form</label>
                                <input type="text"  class="form-control" name="label_for_form" id="title" value="{{$field->label_for_form}}">
                                @if ($errors->has('label_for_form'))
                                    <span class="error-message">
                                                    *{{ $errors->first('label_for_form') }}
                                        </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Label for invoice</label>
                                <input type="text"  class="form-control" name="label_for_invoice" id="title" value="{{$field->label_for_invoice}}">
                                @if ($errors->has('label_for_invoice'))
                                    <span class="error-message">
                                                    *{{ $errors->first('label_for_invoice') }}
                                        </span>
                                @endif
                            </div>

                            <br><br>


                            <table class="table option-table" style="margin-top: 5px">
                                <thead>
                                <td><u><b>Options</b></u></td>
                                <td><u><b>Service charge</b></u></td>
                                <td><u><b>Action </b></u></td>
                                </thead>

                                @foreach($field->check_with_charge_options as $option)

                                    <tr>
                                        <td>{{$option->option}}</td>
                                        <td>{{$option->charge}}</td>
                                        <td>
                                            <a class="btn btn-danger asdh-btn-small  remove" onclick="myFunction({{$option->id}})"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>

                                @endforeach
                            </table>




                            <button type="button" class="btn btn-sm btn-primary" style="margin-left: 20px" id="add_another_option"><span class="material-icons">add</span> Add Options<div class="ripple-container"></div></button>

                            <input type="hidden" name="service_time_field_id" value="{{$field->id}}">
                            <table id="OptionTable" class="table" style="border: none !important;">
                                <tbody>


                                </tbody>
                            </table>







                            <div class="form-footer text-right">
                                <div class="checkbox pull-left">
                                </div>
                                <button type="submit" class="btn btn-info btn-fill">{{"Update"}}</button>
                            </div>
                        </form>

                        <br>



                    </div>

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

<!-- Time input field --->
<script type="text/javascript">
    $(document).ready(function() {

        $("#TimeTable").on("click", "#DeleteButton4", function() {
            $(this).closest("tr").remove();
        });

        var count4 =1;

        dynamic_field4(count4);

        function dynamic_field4(number) {
            html ="<tr>";

            html+= "<td><input type='text'  class='form-control' placeholder='Enter Time ' name='timefield[]' required></td>";


            if(number>1)
            {
                html+='<td id="DeleteButton4"><i class="fa fa-trash" aria-hidden="true"></i></td>';
//                $('tbody').append(html);
                $('#TimeTable').find('tbody').append(html);
            }


        }

        $('#add_another_time').click(function () {

            count4++;
            dynamic_field4(count4)
        });

    });




    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    function myFunction(id) {

        $.ajax({
            url:'{!!URL::to('admin/check-option-with-charge/')!!}' + '/' + id,
            type : "POST",
            data : {'_method' : 'DELETE', '_token' : csrf_token},

            success:function(){

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

    }

</script>


<!-- / Time input field-->

<!-- Check option input field --->
<script type="text/javascript">
    $(document).ready(function() {

        $("#OptionTable").on("click", "#DeleteButton2", function() {
            $(this).closest("tr").remove();
        });

        var count2 =1;

        dynamic_field2(count2);

        function dynamic_field2(number) {
            html ="<tr>";

            html+= "<td><input type='text'  class='form-control' placeholder='Enter Service Option' name='option[]' required></td>";
            html+= "<td><input type='text'  class='form-control' placeholder='Enter Charge ' name='charge[]' required></td>";


            if(number>1)
            {
                html+='<td id="DeleteButton2"><i class="fa fa-trash" aria-hidden="true"></i></td>';
//                $('tbody').append(html);
                $('#OptionTable').find('tbody').append(html);
            }


        }

        $('#add_another_option').click(function () {

            count2++;
            dynamic_field2(count2)
        });

    });
</script>
<!-- /Check option input field --->

@endpush