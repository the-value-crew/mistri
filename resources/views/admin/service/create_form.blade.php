@extends('admin.layouts.master')

@section('title','Create Service Form')

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

        .cf .funkyradio input[type="radio"]:empty ~ label, .page--login .cf .funkyradio input[type="radio"]:empty ~ label, .page--form .cf .funkyradio input[type="checkbox"]:empty ~ label, .page--login .cf .funkyradio input[type="checkbox"]:empty ~ label {
            position: relative;
            line-height: 2.5em;
            text-indent: 3.25em;
            margin-top: 2em;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }


        .cf .funkyradio input[type="radio"]:checked ~ label, .page--login .cf .funkyradio input[type="radio"]:checked ~ label, .page--form .cf .funkyradio input[type="checkbox"]:checked ~ label, .page--login .cf .funkyradio input[type="checkbox"]:checked ~ label {
            color: #777;
        }

        .cf .funkyradio label, .page--login .cf .funkyradio label {
            width: 100%;
            border-radius: 3px;
            border: 1px solid #D1D3D4;
            font-weight: normal;
        }

      .cf .funkyradio div, .page--login .cf .funkyradio div {
            clear: both;
            overflow: hidden;
        }

        .cf .funkyradio input[type="radio"]:empty ~ label:before, .page--login .cf .funkyradio input[type="radio"]:empty ~ label:before, .page--form .cf .funkyradio input[type="checkbox"]:empty ~ label:before, .page--login .cf .funkyradio input[type="checkbox"]:empty ~ label:before {
            position: absolute;
            display: block;
            top: 0;
            bottom: 0;
            left: 0;
            content: '';
            width: 2.5em;
            background: #D1D3D4;
            border-radius: 3px 0 0 3px;
        }

        input[type="radio"]:checked ~ label:before,.cf .funkyradio input[type="radio"]:checked ~ label:before,.cf .funkyradio input[type="checkbox"]:checked ~ label:before,.cf .funkyradio input[type="checkbox"]:checked ~ label:before {
            content: '\2714';
            text-indent: .9em;
            color: #333;
            background-color: #ccc;
        }

        .cf .funkyradio-default input[type="radio"]:checked ~ label:before, .cf .funkyradio-default input[type="radio"]:checked ~ label:before, .cf .funkyradio-default input[type="checkbox"]:checked ~ label:before, .cf .funkyradio-default input[type="checkbox"]:checked ~ label:before {
            color: #fff !important;
            background-color: #23bddf;
        }

       .cf .funkyradio input[type="radio"]:empty, .page--login .cf .funkyradio input[type="radio"]:empty, .page--form .cf .funkyradio input[type="checkbox"]:empty, .page--login .cf .funkyradio input[type="checkbox"]:empty {
            display: none;
        }


        .custom-select {
            display: inline-block;
            width: 100%;
            height: calc(1.5em + .75rem + 2px);
            padding: .375rem 1.75rem .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            vertical-align: middle;
            background: #fff url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e) no-repeat right .75rem center/8px 10px;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            -webkit-appearance: none;
            -moz-appearance: none;
            /* appearance: none; */
        }

        select {
            word-wrap: normal;
        }

        .custom-select, .custom-select, .cf .form-control, .cf .form-control  ,input[type="text"]{
            height: 50px;
            font-size: 15px;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .cf .form-control {
            display: block;
            width: 100%;
            height: 45px;
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }




    </style>

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">

                <!------------ Model to view form  -------------------->

                <div class="modal fade bd-example-modal-lg-{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form action="" class="cf">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><b>{{$service->name}} - View Form</b></h5>
                                <hr>
                            </div>
                            <div class="modal-body">
                                <!---- radio -op with charge ---->
                                @foreach($service->radio_with_charge_fields as $radio_with_charge_field)
                                    <div class="form-group">
                                        <label for="Premises" style="color: #000">{{$radio_with_charge_field->label_for_form}}</label>
                                        <div class="funkyradio">
                                            @foreach($radio_with_charge_field->radio_with_charge_options as$key=> $radio_with_charge_option)
                                                <div class="funkyradio-default">
                                                    <input type="radio" id="radio_{{$radio_with_charge_option->id}}"  name="radio_c_{{$radio_with_charge_field->id}}"  value="{{$radio_with_charge_option->id}}" />
                                                    <label for="radio_{{$radio_with_charge_option->id}}">{{$radio_with_charge_option->option}}</label>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                @endforeach
                                <!---- /radio -op with charge ---->

                                <!---- radio   --->
                                @foreach($service->radio_fields as $radio_field)
                                    <div class="form-group">
                                        <label for="Premises">{{$radio_field->label_for_form}}</label>
                                        <div class="funkyradio">
                                            @foreach($radio_field->radio_options as$key=> $radio_option)
                                                <div class="funkyradio-default">
                                                    <input type="radio" id="radio{{$radio_option->id}}"  name="radio_{{$radio_field->id}}"  value="{{$radio_option->id}}"  />
                                                    <label for="radio{{$radio_option->id}}">{{$radio_option->option}}</label>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                @endforeach
                                <!---- /radio  ---->

                                <!---- check -op with charge ---->
                                @foreach($service->check_with_charge_fields as $check_with_charge_field)
                                    <div class="form-group">
                                        <label for="Premises">{{$check_with_charge_field->label_for_form}}</label>
                                        <div class="funkyradio">
                                            @foreach($check_with_charge_field->check_with_charge_options as$key=> $check_with_charge_option)
                                                <div class="funkyradio-default">
                                                    <input type="radio" id="check_c_{{$check_with_charge_option->id}}"  name="check_c_{{$check_with_charge_field->id}}"  value="{{$check_with_charge_option->id}}" />
                                                    <label for="check_c_{{$check_with_charge_option->id}}">{{$check_with_charge_option->option}}</label>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                @endforeach
                                <!---- /check -op with charge ---->

                                <!---- check   --->
                                @foreach($service->check_fields as $check_field)
                                    <div class="form-group">
                                        <label for="Premises">{{$check_field->label_for_form}}</label>
                                        <div class="funkyradio">
                                            @foreach($check_field->check_options as$key=> $check_option)
                                                <div class="funkyradio-default">
                                                    <input type="radio" id="check{{$check_option->id}}"  name="check_{{$check_field->id}}"  value="{{$check_option->id}}"  />
                                                    <label for="check{{$check_option->id}}">{{$check_option->option}}</label>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                @endforeach
                                <!---- /check  ---->

                                <!--- select - op with charge ----->
                                @foreach($service->select_with_charge_fields as $select_with_charge_field)
                                    <div class="form-group">
                                        <label for="Premises">{{$select_with_charge_field->label_for_form}}</label>
                                        <select class="custom-select" id="Premises" name="select_c_{{$select_with_charge_field->id}}">

                                            @foreach($select_with_charge_field->select_with_charge_options as$key2=> $select_with_charge_option)
                                                <option value="{{$select_with_charge_option->id}}">
                                                    {{$select_with_charge_option->option}}
                                                    @php
                                                        $a =$select_with_charge_option->charge
                                                    @endphp
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endforeach
                                <!--- select - op with charge ----->

                                <!--- select  ----->
                                @foreach($service->select_fields as $select_field)
                                    <div class="form-group">
                                        <label for="Premises">{{$select_field->label_for_form}}</label>
                                        <select class="custom-select" id="Premises" name="select_{{$select_field->id}}">

                                            @foreach($select_field->select_options as$key2=> $select_option)
                                                <option value="{{$select_option->id}}">
                                                    {{$select_option->option}}

                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endforeach
                                <!--- select----->


                                <!----- Text field ---->
                                @foreach($service->text_fields as $text_field)
                                    <div class="form-group">

                                        <label for="street--name">{{$text_field->label_for_form}}</label>
                                        <input type="text" name="text_{{$text_field->id}}" id="datepicker1" class="form-control input-type"  />
                                    </div >
                                @endforeach

                                <!----/ text field ---->

                                <!---- date --------->
                                @foreach($service->date_fields as $date_field)
                                    <div class="form-group">
                                        <label for="datepicker{{$date_field->id}}">{{$date_field->label_for_form}}</label>
                                        <input type="date" name="date_{{$date_field->id}}" id="datepicker{{$date_field->id}}" class="form-control" onchange="dateField('{{$date_field->order_detail_label}}',this.value)"/>
                                    </div >
                                @endforeach
                                <!-----/ date------->

                                <!--- Time2 field --->
                                @foreach($service->time2_fields as $time2_field)
                                    <div class="form-group">
                                        <label for="timepicker{{$time2_field->id}}">{{$time2_field->label_for_form}}</label>
                                        <input type="time" name="date_{{$time2_field->id}}" id="timepicker{{$time2_field->id}}" class="form-control" onchange="dateField('{{$time2_field->order_detail_label}}',this.value)"/>
                                    </div >
                                @endforeach
                                <!-- time2 field --->

                                <!--- Time ------->
                                @foreach($service->time_fields as $time_field)
                                    <div class="form-group">
                                        <label for="Premises">{{$time_field->label_for_form}}</label>
                                        <div class="funkyradio">
                                            @foreach($time_field->time_options as$key1=> $time_option)
                                                <div class="funkyradio-default">
                                                    <input type="radio" name="time_{{$time_field->id}}" id="time{{$time_option->id}}" value="{{$time_option->id}}" onchange="timeField('{{$time_option->time}}')"/>
                                                    <label for="time{{$time_option->id}}">{{$time_option->time}}</label>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                @endforeach
                                <!----/ Time ----->



                                <!----- Textarea field ---->
                                @foreach($service->textarea_fields as $textarea_field)
                                    <div class="form-group">
                                        <label for="street--name">{{$textarea_field->label_for_form}}</label>
                                        <textarea name="textarea_{{$textarea_field->id}}" id="" cols="30" rows="50" class="form-control" style="height: 110px;font-size: 14px"></textarea>

                                    </div >
                                @endforeach

                                <!----/ textarea field ---->






                            </div>
                            <div class="clearfix"></div>
                        </div>
                        </form>
                    </div>
                </div>

                <!------------ /Model to view form  ------------------->

                <div class="card">
                    <form method="post" action="{{route('store.service.field')}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header" data-background-color="">
                            <div class="card-title">
                                <h4><b>Create form for service  -  {{$service->name}}</b></h4>
                                <a href="{{route('service.index')}}" class="btn btn-sm pull-right" style="margin-top: -30px"><i class="fa fa-cogs" aria-hidden="true"></i> &nbsp;Manage</a>
                                <a href="#" class="btn btn-sm pull-right" style="margin-top: -30px" data-toggle="modal"  data-target=".bd-example-modal-lg-{{$service->id}}"><i class="fa fa-eye" aria-hidden="true"></i> &nbsp;View Form</a>
                            </div>
                        </div>
                        <div class="card-content">
                            @php
                                $c = count($service->text_fields)+ count($service->label_for_multiple_fields) + count($service->textarea_fields) + count($service->date_fields) + count($service->time_fields) + count($service->check_with_charge_fields) + count($service->check_fields) + count($service->radio_with_charge_fields) + count($service->radio_fields)+ count($service->select_with_charge_fields) +count($service->select_fields) ;
                            @endphp

                            @if($c==0)
                                <br>
                                <span class="tag label label-info" style="padding: 12px">No field created for this service .</span>
                            @endif



                            <!----  Text box    -------->
                            @if(count($service->text_fields)>0)
                            <div class="field-box">
                                <div class="text-field">
                                    <span class="btn btn-sm">Fields &nbsp;&nbsp; for &nbsp;&nbsp; Short &nbsp;&nbsp; Input </span> <!-- Text field -->
                                    <br>

                                        @foreach($service->text_fields as $text_field)
                                        <div class="row">
                                            <div class="col-md-6">
                                                <span class="field-section">{{$loop->index +1}}. Label for form</span>  <span class='form-label'>{{$text_field->label_for_form}}</span>
                                            </div>
                                            <div class="col-md-6">
                                                <span class="field-section">Label for invoice</span>  <span class='form-label'> {{$text_field->label_for_invoice}}</span>
                                            </div>
                                        </div>
                                        @endforeach

                                </div>
                            </div>
                            @endif
                            <!---- /Text Box     -------->

                            <!-- Label for multiple input -->
                            @if(count($service->label_for_multiple_fields)>0)
                                <div class="field-box">
                                    <div class="text-field">
                                        <span class="btn btn-sm">Fields &nbsp;&nbsp; for &nbsp;&nbsp; Multiple Input under same label</span>
                                        <br>

                                        @foreach($service->label_for_multiple_fields as $label_for_multiple_field)
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <span class="field-section">{{$loop->index + 1}}. Label for form</span>  <span class='form-label'>{{$label_for_multiple_field->label_for_form}}</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="field-section">Label for invoice</span>  <span class='form-label'> {{$label_for_multiple_field->label_for_invoice}}</span>
                                                </div>

                                                <table class="table" style="margin-left: 40px">
                                                    <tbody>
                                                    <tr>
                                                        <td><u>Fields</u></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            @foreach($label_for_multiple_field->input_fields as $k=>$input_field)
                                                               <b>{{++$k}}. </b>{{$input_field->input_field_label}} &nbsp;&nbsp;&nbsp;
                                                                <br>
                                                            @endforeach
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        @endforeach




                                    </div>
                                </div>
                            @endif
                            <!-- Label for multiple input -->



                            <!--- Textarea field -------->
                            @if(count($service->textarea_fields)>0)
                            <div class="field-box">
                                <div class="text-field">
                                    <span class="btn btn-sm">Fields &nbsp;&nbsp; for &nbsp;&nbsp; Comment/Suggestion</span>
                                    <br>

                                        @foreach($service->textarea_fields as $textarea_field)
                                        <div class="row">
                                            <div class="col-md-6">
                                                <span class="field-section">{{$loop->index +1}}. Label for form</span>  <span class='form-label'>{{$textarea_field->label_for_form}}</span>
                                            </div>
                                            <div class="col-md-6">
                                                <span class="field-section">Label for invoice</span>  <span class='form-label'> {{$textarea_field->label_for_invoice}}</span>
                                            </div>
                                        </div>
                                        @endforeach

                                </div>
                            </div>
                             @endif
                            <!--- /Textarea field -------->

                            <!--- Date field-------------->
                            @if(count($service->date_fields)>0)
                                <div class="field-box">
                                    <div class="text-field">
                                        <span class="btn btn-sm">Fields &nbsp;&nbsp; for &nbsp;&nbsp; date</span>
                                        <br>

                                            @foreach($service->date_fields as $date_field)
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <span class="field-section">{{$loop->index + 1}}. Label for form</span>  <span class='form-label'>{{$date_field->label_for_form}}</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="field-section">Label for invoice</span>  <span class='form-label'> {{$date_field->label_for_invoice}}</span>
                                                </div>
                                            </div>
                                            @endforeach


                                    </div>
                                </div>
                            @endif
                            <!--- /Date field-------------->

                            <!-- Time2 field -------------->
                            @if(count($service->time2_fields)>0)
                                <div class="field-box">
                                    <div class="text-field">
                                        <span class="btn btn-sm">Fields &nbsp;&nbsp; for &nbsp;&nbsp; Time ( Without option &nbsp;&nbsp; i.e &nbsp;&nbsp; simply pick the time)</span>
                                        <br>

                                        @foreach($service->time2_fields as $time2_field)
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <span class="field-section">{{$loop->index + 1}}. Label for form</span>  <span class='form-label'>{{$time2_field->label_for_form}}</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="field-section">Label for invoice</span>  <span class='form-label'> {{$time2_field->label_for_invoice}}</span>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                </div>
                            @endif
                            <!-- Time2 field -------------->

                            <!--- Time field ------------->
                            @if(count($service->time_fields)>0)
                                <div class="field-box">
                                    <div class="text-field">
                                        <span class="btn btn-sm">Fields &nbsp;&nbsp; for &nbsp;&nbsp; time</span>
                                        <br>

                                            @foreach($service->time_fields as $time_field)
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <span class="field-section">{{$loop->index + 1}}. Label for form</span>  <span class='form-label'>{{$time_field->label_for_form}}</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="field-section">Label for invoice</span>  <span class='form-label'> {{$time_field->label_for_invoice}}</span>
                                                </div>

                                                <table class="table" style="margin-left: 40px">
                                                    <tbody>
                                                    <tr>
                                                        <td><u>Options</u></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            @foreach($time_field->time_options as $time)
                                                                {{$time->time}} &nbsp;&nbsp;&nbsp;
                                                            @endforeach
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            @endforeach




                                    </div>
                                </div>
                            @endif
                            <!-----/ Time field ---------->

                            <!--- Check field with charge ------------->
                            @if(count($service->check_with_charge_fields)>0)
                                <div class="field-box">
                                    <div class="text-field">
                                        <span class="btn btn-sm">Fields &nbsp;&nbsp; for &nbsp;&nbsp; Multiple &nbsp;&nbsp; service &nbsp;&nbsp; check &nbsp;&nbsp; option (With Charge)</span>
                                        <br>

                                            @foreach($service->check_with_charge_fields as $check_with_charge_field)
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <span class="field-section">{{$loop->index + 1}}. Label for form</span>  <span class='form-label'>{{$check_with_charge_field->label_for_form}}</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="field-section">Label for invoice</span>  <span class='form-label'> {{$check_with_charge_field->label_for_invoice}}</span>
                                                </div>

                                                <div class="col-md-6">
                                                <table class="table" style="margin-left: 40px">
                                                    <tbody>
                                                    <tr>
                                                        <td><u>Options</u></td>
                                                        <td><u>Charge</u></td>
                                                    </tr>
                                                    @foreach($check_with_charge_field->check_with_charge_options as $option_with_charge)

                                                        <tr>
                                                            <td>{{$option_with_charge->option}}</td>
                                                            <td>{{$option_with_charge->charge}} NPR</td>
                                                        </tr>

                                                    </tbody>
                                                    @endforeach
                                                </table>
                                                </div>
                                            </div>
                                            @endforeach




                                    </div>
                                </div>
                            @endif
                            <!--- /Check field with charge ------------->

                            <!--- Check field without charge ----------->
                            @if(count($service->check_fields)>0)
                                <div class="field-box">
                                    <div class="text-field">
                                        <span class="btn btn-sm">Field &nbsp;&nbsp; for &nbsp;&nbsp; multiple &nbsp;&nbsp; service &nbsp;&nbsp; check &nbsp;&nbsp;  option (Without Charge)</span>
                                        <br>

                                            @foreach($service->check_fields as $check_field)
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <span class="field-section">{{$loop->index + 1}}. Label for form</span>  <span class='form-label'>{{$check_field->label_for_form}}</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="field-section">Label for invoice</span>  <span class='form-label'> {{$check_field->label_for_invoice}}</span>
                                                </div>

                                                <div class="col-md-6">
                                                    <table class="table" style="margin-left: 40px">
                                                        <tbody>
                                                        <tr>
                                                            <td><u>Options</u></td>
                                                        </tr>
                                                        @foreach($check_field->check_options as $check_option)

                                                            <tr>
                                                                <td>{{$check_option->option}}</td>
                                                            </tr>

                                                        </tbody>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                            @endforeach




                                    </div>
                                </div>
                            @endif
                            <!--- /Check field without charge ---------->


                            <!--- Radio field with charge ------------->
                            @if(count($service->radio_with_charge_fields)>0)
                                <div class="field-box">
                                    <div class="text-field">
                                        <span class="btn btn-sm">Field &nbsp;&nbsp; for &nbsp;&nbsp;  service &nbsp;&nbsp; check &nbsp;&nbsp; option  (With Charge)</span>
                                        <br>

                                            @foreach($service->radio_with_charge_fields as $radio_with_charge_field)
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <span class="field-section">{{$loop->index + 1}}. Label for form</span>  <span class='form-label'>{{$radio_with_charge_field->label_for_form}}</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="field-section">Label for invoice</span>  <span class='form-label'> {{$radio_with_charge_field->label_for_invoice}}</span>
                                                </div>

                                                <div class="col-md-6">
                                                    <table class="table" style="margin-left: 40px">
                                                        <tbody>
                                                        <tr>
                                                            <td><u>Options</u></td>
                                                            {{--<td><u>Charge</u></td>--}}
                                                        </tr>
                                                        @foreach($radio_with_charge_field->radio_with_charge_options as $radio_with_charge_option)

                                                            <tr>
                                                                <td>{{$radio_with_charge_option->option}}</td>
                                                                {{--<td>{{$radio_with_charge_option->charge}} AED</td>--}}
                                                            </tr>

                                                        </tbody>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                            @endforeach




                                    </div>
                                </div>
                            @endif
                            <!--- /Radio field with charge ------------->

                            <!--- Radio field without charge ----------->
                            @if(count($service->radio_fields)>0)
                                <div class="field-box">
                                    <div class="text-field">
                                        <span class="btn btn-sm">Fields &nbsp;&nbsp; for &nbsp;&nbsp; service &nbsp;&nbsp; check &nbsp;&nbsp;  option (Without Charge)</span>
                                        <br>

                                            @foreach($service->radio_fields as $radio_field)
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <span class="field-section">{{$loop->index + 1}}. Label for form</span>  <span class='form-label'>{{$radio_field->label_for_form}}</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="field-section">Label for invoice</span>  <span class='form-label'> {{$radio_field->label_for_invoice}}</span>
                                                </div>

                                                <div class="col-md-6">
                                                    <table class="table" style="margin-left: 40px">
                                                        <tbody>
                                                        <tr>
                                                            <td><u>Options</u></td>
                                                        </tr>
                                                        @foreach($radio_field->radio_options as $radio_option)

                                                            <tr>
                                                                <td>{{$radio_option->option}}</td>
                                                            </tr>

                                                        </tbody>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                            @endforeach




                                    </div>
                                </div>
                            @endif
                            <!--- /Radio field without charge ---------->


                            <!--- Select field with charge ------------->
                            @if(count($service->select_with_charge_fields)>0)
                                <div class="field-box">
                                    <div class="text-field">
                                        <span class="btn btn-sm">Fields &nbsp;&nbsp; for &nbsp;&nbsp;  dropdown &nbsp;&nbsp; select &nbsp;&nbsp; option (With Charge)</span>
                                        <br>

                                            @foreach($service->select_with_charge_fields as $select_with_charge_field)
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <span class="field-section">{{$loop->index + 1}}. Label for form</span>  <span class='form-label'>{{$select_with_charge_field->label_for_form}}</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="field-section">Label for invoice</span>  <span class='form-label'> {{$select_with_charge_field->label_for_invoice}}</span>
                                                </div>

                                                <div class="col-md-6">
                                                    <table class="table" style="margin-left: 40px">
                                                        <tbody>
                                                        <tr>
                                                            <td><u>Options</u></td>
                                                            {{--<td><u>Charge</u></td>--}}
                                                        </tr>
                                                        @foreach($select_with_charge_field->select_with_charge_options as $select_with_charge_option)

                                                            <tr>
                                                                <td>{{$select_with_charge_option->option}}</td>
                                                                {{--<td>{{$select_with_charge_option->charge}} AED</td>--}}
                                                            </tr>

                                                        </tbody>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                            @endforeach




                                    </div>
                                </div>
                            @endif
                            <!--- /Select field with charge ------------->


                            <!--- Select field without charge ----------->
                            @if(count($service->select_fields)>0)
                                <div class="field-box">
                                    <div class="text-field">
                                        <span class="btn btn-sm">Fields &nbsp;&nbsp; for &nbsp;  dropdown &nbsp;&nbsp; select &nbsp;&nbsp; option (Without Charge)</span>
                                        <br>

                                            @foreach($service->select_fields as $select_field)
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <span class="field-section">{{$loop->index + 1}}. Label for form</span>  <span class='form-label'>{{$select_field->label_for_form}}</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="field-section">Label for invoice</span>  <span class='form-label'> {{$select_field->label_for_invoice}}</span>
                                                </div>

                                                <div class="col-md-6">
                                                    <table class="table" style="margin-left: 40px">
                                                        <tbody>
                                                        <tr>
                                                            <td><u>Options</u></td>
                                                        </tr>
                                                        @foreach($select_field->select_options as $select_option)

                                                            <tr>
                                                                <td>{{$select_option->option}}</td>
                                                            </tr>

                                                        </tbody>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                            @endforeach




                                    </div>
                                </div>
                             @endif
                            <!--- /Select field without charge ---------->



                            <input type="hidden" name="service_id" value="{{$service->id}}">
                            <br><br>

                            <!--- Add multiple input field inside same label -->
                            <div class="service-time-field">
                                <button type="button"> Add Multiple Input Field Under Same Label</button>
                                <br>
                                <table id="MultipleInputField" class="table" style="border: none !important;">
                                    <tbody>
                                    <td><input type='text'  class='form-control' placeholder='Enter Label For Form' name='multiple_input_label_for_form' ></td>
                                    <td><input type='text'  class='form-control' placeholder='Enter Label For Invoice' name='multiple_input_label_for_invoice' ></td>
                                    <td><button type="button" class="btn btn-sm btn-primary" style="margin-left: 30px" id="add_multiple_input_field"><span class="material-icons">add</span> Add Input Fields<div class="ripple-container"></div></button>
                                    </td>
                                    </tbody>
                                </table>

                            </div>
                            <!---  /Add multiple input field inside same label  -->


                            <br><br><br>
                            <!-- Add text box -->
                            <div class="service-text-field">
                                <button type="button"> + Add Short Input  field</button> <button type="button" class="btn btn-sm btn-primary"  id="add_another"> <span class="material-icons">add</span></button>

                                <table id="MyTable" class="table" style="border: none !important;">
                                    <tbody>
                                    <td><input type='text'  class='form-control' placeholder='Enter Label For Form' name='text_label_for_form[]'></td>
                                    <td><input type='text'  class='form-control' placeholder='Enter Label For Invoice' name='text_label_for_invoice[]'></td>
                                    <td id="textFieldDelete"><i class="fa fa-trash" aria-hidden="true"></i></td>

                                    </tbody>
                                </table>
                            </div>
                            <!-- / Add text box -->

                            <br><br><br>

                            <!-- Add textarea box -->
                            <div class="service-textarea-field">
                                <button type="button"> + Add Comment Section</button> <button type="button" class="btn btn-sm btn-primary"  id="add_another_textarea"> <span class="material-icons">add</span></button>

                                <table id="TextareaTable" class="table" style="border: none !important;">
                                    <tbody>
                                    <td><input type='text'  class='form-control' placeholder='Enter Label For Form' name='textarea_label_for_form[]'></td>
                                    <td><input type='text'  class='form-control' placeholder='Enter Label For Invoice' name='textarea_label_for_invoice[]'></td>
                                    <td id="textareaFieldDelete"><i class="fa fa-trash" aria-hidden="true"></i></td>
                                    </tbody>
                                </table>


                            </div>
                            <!-- Add /textarea box -->

                            <br><br><br>

                            <!-- Add time (with option) field -->
                            <div class="service-time-field">
                                <button type="button"> Add Time ( With Option )</button>
                                <br>
                                <table id="TimeTable" class="table" style="border: none !important;">
                                    <tbody>
                                    <td><input type='text'  class='form-control' placeholder='Enter Label For Form' name='time_label_for_form' ></td>
                                    <td><input type='text'  class='form-control' placeholder='Enter Label For Invoice' name='time_label_for_invoice' ></td>
                                    <td><button type="button" class="btn btn-sm btn-primary" style="margin-left: 30px" id="add_another_time"><span class="material-icons">add</span> Add Time Option<div class="ripple-container"></div></button>
                                    </td>
                                    </tbody>
                                </table>

                            </div>
                            <!-- Add time (with option) field -->
                            <br><br><br>

                            <!-- Add time  field -->
                            <div class="service-date-field">
                                <button type="button">Add Time</button> <button type="button" class="btn btn-sm btn-primary"  id="add_another_time2"> <span class="material-icons">add</span></button>

                                <table id="Time2Table" class="table" style="border: none !important;">
                                    <tbody>
                                    <td><input type='text'  class='form-control' placeholder='Enter Label For Form' name='time2_label_for_form[]'></td>
                                    <td><input type='text'  class='form-control' placeholder='Enter Label For Invoice' name='time2_label_for_invoice[]'></td>
                                    <td id="time2FieldDelete"><i class="fa fa-trash" aria-hidden="true"></i></td>
                                    </tbody>
                                </table>


                            </div>

                            <!-- Add time  field -->

                            <br><br><br>
                            <!-- Add Date field -->
                            <div class="service-date-field">
                                <button type="button">Add Date</button> <button type="button" class="btn btn-sm btn-primary"  id="add_another_date"> <span class="material-icons">add</span></button>

                                <table id="DateTable" class="table" style="border: none !important;">
                                    <tbody>
                                    <td><input type='text'  class='form-control' placeholder='Enter Label For Form' name='date_label_for_form[]'></td>
                                    <td><input type='text'  class='form-control' placeholder='Enter Label For Invoice' name='date_label_for_invoice[]'></td>
                                    <td id="dateFieldDelete"><i class="fa fa-trash" aria-hidden="true"></i></td>
                                    </tbody>
                                </table>


                            </div>
                            <!-- Add Date field -->

                            <br><br><br>
                            <!-- Add check(with price) field -->

                                    <div class="service-options-field">
                                <button type="button"> Add Multi Check Field (With Charge)</button>
                                <br>
                                <table id="CheckOptionWithPriceTable" class="table" style="border: none !important;">

                                    <tbody>
                                        <td><input type='text'  class='form-control' placeholder='Enter Label For Form' name='check_with_price_label_for_form' ></td>
                                        <td><input type='text'  class='form-control' placeholder='Enter Label For Invoice' name='check_with_price_label_for_invoice' ></td>
                                        <td><button type="button" class="btn btn-sm btn-primary" style="margin-left: 20px" id="add_check_option_with_price"><span class="material-icons">add</span> Add Options<div class="ripple-container"></div></button>
                                        </td>

                                    </tbody>
                                </table>

                            </div>

                            <!-- Add check(with price) field -->

                            <br><br><br>

                            <!-- Add check(without price) field -->

                            <div class="service-options-field">
                                <button type="button"> Add Multi Check Field (Without Charge )</button>
                                <br>
                                <table id="CheckTable" class="table" style="border: none !important;">

                                    <tbody>
                                    <td><input type='text'  class='form-control' placeholder='Enter Label For Form' name='check_label_for_form' ></td>
                                    <td><input type='text'  class='form-control' placeholder='Enter Label For Invoice' name='check_label_for_invoice' ></td>
                                    <td><button type="button" class="btn btn-sm btn-primary" style="margin-left: 20px" id="add_check_option"><span class="material-icons">add</span> Add Options<div class="ripple-container"></div></button>
                                    </td>

                                    </tbody>
                                </table>

                            </div>

                            <!-- Add check(without  price) field -->


                            <!--- Add Radio (with price) field --->
                            @if($service->quotable== 0)
                            <br><br><br>
                            <div class="service-options-field">
                                <button type="button"> Add Service Field With Check Options (With Charge)</button>
                                <br>
                                <table id="RadioWithPriceTable" class="table" style="border: none !important;">

                                    <tbody>
                                    <td><input type='text'  class='form-control' placeholder='Enter Label For Form' name='radio_with_price_label_for_form' ></td>
                                    <td><input type='text'  class='form-control' placeholder='Enter Label For Invoice' name='radio_with_price_label_for_invoice' ></td>
                                    <td><button type="button" class="btn btn-sm btn-primary" style="margin-left: 20px" id="add_radio_option_with_price"><span class="material-icons">add</span> Add Options<div class="ripple-container"></div></button>
                                    </td>

                                    </tbody>
                                </table>

                            </div>
                            @endif
                            <!----/ Add Radio (with price) field --->

                            <!--- Add Radio (without price) field --->
                            <br><br><br>
                            <div class="service-options-field">
                                <button type="button"> Add Service Field With Check Options ( Without Charge)</button>
                                <br>
                                <table id="RadioTable" class="table" style="border: none !important;">

                                    <tbody>
                                    <td><input type='text'  class='form-control' placeholder='Enter Label For Form' name='radio_label_for_form' ></td>
                                    <td><input type='text'  class='form-control' placeholder='Enter Label For Invoice' name='radio_label_for_invoice' ></td>
                                    <td><button type="button" class="btn btn-sm btn-primary" style="margin-left: 20px" id="add_radio_option"><span class="material-icons">add</span> Add Options<div class="ripple-container"></div></button>
                                    </td>

                                    </tbody>
                                </table>

                            </div>
                            <!--- /Add Radio (without price) field --->


                            <!-- Add select(with price) field -->
                            @if($service->quotable== 0)
                            <br><br><br>
                            <div class="service-options-field">
                                <button type="button"> Add service field with dropdown select option ( field with price )</button>
                                <br>
                                <table id="SelectOptionWithPriceTable" class="table" style="border: none !important;">

                                    <tbody>
                                    <td><input type='text'  class='form-control' placeholder='Enter Label For Form' name='select_with_price_label_for_form' ></td>
                                    <td><input type='text'  class='form-control' placeholder='Enter Label For Invoice' name='select_with_price_label_for_invoice' ></td>
                                    <td><button type="button" class="btn btn-sm btn-primary" style="margin-left: 20px" id="add_select_option_with_price"><span class="material-icons">add</span> Add Options<div class="ripple-container"></div></button>
                                    </td>

                                    </tbody>
                                </table>

                            </div>
                            @endif
                            <!-- Add select(with price) field -->

                            <br><br><br>
                            <!-- Add select(without price) field -->
                            <div class="service-options-field">
                                <button type="button"> Add Service Field With Dropdown Select Option  ( field without price )</button>
                                <br>
                                <table id="SelectTable" class="table" style="border: none !important;">

                                    <tbody>
                                    <td><input type='text'  class='form-control' placeholder='Enter Label For Form' name='select_label_for_form' ></td>
                                    <td><input type='text'  class='form-control' placeholder='Enter Label For Invoice' name='select_label_for_invoice' ></td>
                                    <td><button type="button" class="btn btn-sm btn-primary" style="margin-left: 20px" id="add_select_option"><span class="material-icons">add</span> Add Options<div class="ripple-container"></div></button>
                                    </td>

                                    </tbody>
                                </table>

                            </div>
                            <!-- Add select(without  price) field -->






                            <div class="form-footer text-right">
                                <div class="checkbox pull-left">
                                </div>
                                <button type="submit" class="btn btn-info btn-fill">{{"Create"}}</button>
                            </div>




                        </div>
                    </form>
                </div>



            </div>
        </div>




    </div>

@endsection

@push('scripts')

<!-- Text input field --->
<script type="text/javascript">
    $(document).ready(function() {

        $("#MyTable").on("click", "#textFieldDelete", function() {
            $(this).closest("tr").remove();
        });
        var count =1;
        dynamic_field(count);
        function dynamic_field(number) {
            html ="<tr>";

            html+= "<td><input type='text'  class='form-control' placeholder='Enter Label For Form' name='text_label_for_form[]' required></td>";
            html+= "<td><input type='text'  class='form-control' placeholder='Enter Label For Invoice ' name='text_label_for_invoice[]' required></td>";
            if(number>1)
            {
                html+='<td id="textFieldDelete"><i class="fa fa-trash" aria-hidden="true"></i></td>';
                $('#MyTable').find('tbody').append(html);
            }


        }
        $('#add_another').click(function () {
            count++;
            dynamic_field(count)
        });


    })
</script>
<!-- /Text input field --->

<!--- Textarea input field --->
<script type="text/javascript">
    $(document).ready(function() {

        $("#TextareaTable").on("click", "#textareaFieldDelete", function() {
            $(this).closest("tr").remove();
        });

        var count1 =1;

        dynamic_field1(count1);

        function dynamic_field1(number) {
            html ="<tr>";

            html+= "<td><input type='text'  class='form-control' placeholder='Enter Label For Textarea' name='textarea_label_for_form[]' required></td>";
            html+= "<td><input type='text'  class='form-control' placeholder='Enter Label For Textarea' name='textarea_label_for_invoice[]' required></td>";


            if(number>1)
            {
                html+='<td id="textareaFieldDelete"><i class="fa fa-trash" aria-hidden="true"></i></td>';
//                $('tbody').append(html);
                $('#TextareaTable').find('tbody').append(html);
            }


        }

        $('#add_another_textarea').click(function () {
            count1++;
            dynamic_field1(count1)
        });

    });
</script>
<!--- /Textarea input field --->


<!--  Multiple input field under same label --->
<script type="text/javascript">
    $(document).ready(function() {

        $("#MultipleInputField").on("click", "#multiFieldDelete", function() {
            $(this).closest("tr").remove();
        });

        var countt =1;

        dynamic_fieldd(countt);

        function dynamic_fieldd(number) {
            html ="<tr>";

            html+= "<td><input type='text'  class='form-control' placeholder='Enter Input Field Name ' name='multiple_field[]' required></td>";


            if(number>1)
            {
                html+='<td id="multiFieldDelete"><i class="fa fa-trash" aria-hidden="true"></i></td>';
//                $('tbody').append(html);
                $('#MultipleInputField').find('tbody').append(html);
            }


        }

        $('#add_multiple_input_field').click(function () {

            countt++;
            dynamic_fieldd(countt)
        });

    });
</script>
<!-- / Multiple input field under same label --->


<!-- Time input field --->
<script type="text/javascript">
    $(document).ready(function() {

        $("#TimeTable").on("click", "#timeFieldDelete", function() {
            $(this).closest("tr").remove();
        });

        var count4 =1;

        dynamic_field4(count4);

        function dynamic_field4(number) {
            html ="<tr>";

            html+= "<td><input type='text'  class='form-control' placeholder='Enter Time ' name='time_option[]' required></td>";


            if(number>1)
            {
                html+='<td id="timeFieldDelete"><i class="fa fa-trash" aria-hidden="true"></i></td>';
//                $('tbody').append(html);
                $('#TimeTable').find('tbody').append(html);
            }


        }

        $('#add_another_time').click(function () {

            count4++;
            dynamic_field4(count4)
        });

    });
</script>
<!-- / Time input field-->

<!--- Date input field --->
<script type="text/javascript">
    $(document).ready(function() {

        $("#DateTable").on("click", "#dateFieldDelete", function() {
            $(this).closest("tr").remove();
        });

        var date_field =1;

        dynamic_date_field(date_field);

        function dynamic_date_field(number) {
            html ="<tr>";

            html+= "<td><input type='text'  class='form-control' placeholder='Enter Label For Form' name='date_label_for_form[]' required></td>";
            html+= "<td><input type='text'  class='form-control' placeholder='Enter Label For Invoice' name='date_label_for_invoice[]' required></td>";


            if(number>1)
            {
                html+='<td id="dateFieldDelete"><i class="fa fa-trash" aria-hidden="true"></i></td>';
//                $('tbody').append(html);
                $('#DateTable').find('tbody').append(html);
            }


        }

        $('#add_another_date').click(function () {
            date_field++;
            dynamic_date_field(date_field)
        });

    });
</script>
<!--- /Date input field --->

<!--- Time2 input field --->
<script type="text/javascript">
    $(document).ready(function() {

        $("#Time2Table").on("click", "#time2FieldDelete", function() {
            $(this).closest("tr").remove();
        });

        var time2_field =1;

        dynamic_time2_field(time2_field);

        function dynamic_time2_field(number) {
            html ="<tr>";

            html+= "<td><input type='text'  class='form-control' placeholder='Enter Label For Form' name='time2_label_for_form[]' required></td>";
            html+= "<td><input type='text'  class='form-control' placeholder='Enter Label For Invoice' name='time2_label_for_invoice[]' required></td>";


            if(number>1)
            {
                html+='<td id="time2FieldDelete"><i class="fa fa-trash" aria-hidden="true"></i></td>';
//                $('tbody').append(html);
                $('#Time2Table').find('tbody').append(html);
            }


        }

        $('#add_another_time2').click(function () {
            time2_field++;
            dynamic_time2_field(time2_field)
        });

    });
</script>
<!--- Time2 input field --->


<!--- check (with charge ) input field --->
<script type="text/javascript">
    $(document).ready(function() {

        $("#CheckOptionWithPriceTable").on("click", "#deleteCheckWithPrice", function() {
            $(this).closest("tr").remove();
        });

        var checkWithPrice =1;

        dynamic_check_with_price(checkWithPrice);

        function dynamic_check_with_price(number) {
            html ="<tr>";

            html+= "<td><input type='text'  class='form-control' placeholder='Enter Check Option' name='check_option[]' required></td>";
            html+= "<td><input type='text'  class='form-control' placeholder='Enter Charge ' name='check_charge[]' required></td>";


            if(number>1)
            {
                html+='<td id="deleteCheckWithPrice"><i class="fa fa-trash" aria-hidden="true"></i></td>';
//                $('tbody').append(html);
                $('#CheckOptionWithPriceTable').find('tbody').append(html);
            }


        }

        $('#add_check_option_with_price').click(function () {

            checkWithPrice++;
            dynamic_check_with_price(checkWithPrice)
        });

    });
</script>
<!--- /check (with charge ) input field -->

<!--- check (without charge ) input field --->
<script type="text/javascript">
    $(document).ready(function() {

        $("#CheckTable").on("click", "#deleteCheckOtion", function() {
            $(this).closest("tr").remove();
        });

        var checkfield =1;

        dynamic_check_field(checkfield);

        function dynamic_check_field(number) {
            html ="<tr>";

            html+= "<td><input type='text'  class='form-control' placeholder='Enter Check Option' name='check2_option[]' required></td>";


            if(number>1)
            {
                html+='<td id="deleteCheckOtion"><i class="fa fa-trash" aria-hidden="true"></i></td>';
//                $('tbody').append(html);
                $('#CheckTable').find('tbody').append(html);
            }


        }

        $('#add_check_option').click(function () {

            checkfield++;
            dynamic_check_field(checkfield)
        });

    });
</script>
<!--- /check (without charge ) input field -->


<!--- Radio (with charge ) input field --->
<script type="text/javascript">
    $(document).ready(function() {

        $("#RadioWithPriceTable").on("click", "#deleteRadioOption", function() {
            $(this).closest("tr").remove();
        });

        var radioWithPricefield =1;

        dynamic_radio3_field(radioWithPricefield);

        function dynamic_radio3_field(number) {
            html ="<tr>";
            html+= "<td><input type='text'  class='form-control' placeholder='Enter Check Option' name='radio_option[]' required></td>";
            html+= "<td><input type='text'  class='form-control' placeholder='Enter Charge ' name='radio_charge[]' required></td>";


            if(number>1)
            {
                html+='<td id="deleteRadioOption"><i class="fa fa-trash" aria-hidden="true"></i></td>';
//                $('tbody').append(html);
                $('#RadioWithPriceTable').find('tbody').append(html);
            }


        }

        $('#add_radio_option_with_price').click(function () {

            radioWithPricefield++;
            dynamic_radio3_field(radioWithPricefield)
        });

    });
</script>
<!--- /Radio (with charge ) input field -->

<!--- radio (without charge ) input field --->
<script type="text/javascript">
    $(document).ready(function() {

        $("#RadioTable").on("click", "#deleteRadioOption", function() {
            $(this).closest("tr").remove();
        });

        var radiofield =1;

        dynamic_radio_field(radiofield);

        function dynamic_radio_field(number) {
            html ="<tr>";

            html+= "<td><input type='text'  class='form-control' placeholder='Enter Radio Option' name='radio2_option[]' required></td>";


            if(number>1)
            {
                html+='<td id="deleteRadioOption"><i class="fa fa-trash" aria-hidden="true"></i></td>';
//                $('tbody').append(html);
                $('#RadioTable').find('tbody').append(html);
            }


        }

        $('#add_radio_option').click(function () {

            radiofield++;
            dynamic_radio_field(radiofield)
        });

    });
</script>
<!--- /radio (without charge ) input field -->

<!--- select (with charge ) input field --->
<script type="text/javascript">
    $(document).ready(function() {

        $("#SelectOptionWithPriceTable").on("click", "#deleteSelectWithPrice", function() {
            $(this).closest("tr").remove();
        });

        var selectWithPrice =1;

        dynamic_select_with_price(selectWithPrice);

        function dynamic_select_with_price(number) {
            html ="<tr>";

            html+= "<td><input type='text'  class='form-control' placeholder='Enter Check Option' name='select_option[]' required></td>";
            html+= "<td><input type='text'  class='form-control' placeholder='Enter Charge ' name='select_charge[]' required></td>";


            if(number>1)
            {
                html+='<td id="deleteSelectWithPrice"><i class="fa fa-trash" aria-hidden="true"></i></td>';
//                $('tbody').append(html);
                $('#SelectOptionWithPriceTable').find('tbody').append(html);
            }


        }

        $('#add_select_option_with_price').click(function () {

            selectWithPrice++;
            dynamic_select_with_price(selectWithPrice)
        });

    });
</script>
<!--- /select (with charge ) input field -->

<!--- select (without charge ) input field --->
<script type="text/javascript">
    $(document).ready(function() {

        $("#SelectTable").on("click", "#deleteSelectOtion", function() {
            $(this).closest("tr").remove();
        });

        var selectfield =1;

        dynamic_select_field(selectfield);

        function dynamic_select_field(number) {
            html ="<tr>";

            html+= "<td><input type='text'  class='form-control' placeholder='Enter Check Option' name='select2_option[]' required></td>";


            if(number>1)
            {
                html+='<td id="deleteSelectOtion"><i class="fa fa-trash" aria-hidden="true"></i></td>';
//                $('tbody').append(html);
                $('#SelectTable').find('tbody').append(html);
            }


        }

        $('#add_select_option').click(function () {

            selectfield++;
            dynamic_select_field(selectfield)
        });

    });
</script>
<!--- /select (without charge ) input field -->

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

@endpush