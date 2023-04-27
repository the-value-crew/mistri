@extends('service_provider.layouts.master')
@section('title','Service')

@push('css')
<link rel="stylesheet" href="{{asset('dashboard/css/select2/select2.min.css')}}">
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

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form method="post" action="{{route('my-service.update',$service->id)}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="card-header" data-background-color="">

                            <div class="card-title">
                                <h4><b>{{"Edit Service - ".$service->name}}</b></h4>
                                <a href="{{route('my-service.index')}}" class="btn btn-sm pull-right" style="margin-top: -30px"><i class="fa fa-cogs" aria-hidden="true"></i> &nbsp;Manage</a>

                                @if($service->id == 72)
                                <a href="{{route('update.pestControl.charge')}}" class="btn btn-sm pull-right" style="margin-top: -30px"><i class="fa fa-edit" aria-hidden="true"></i> &nbsp;Edit Service Charge</a>
                                @endif

                            </div>
                        </div>
                        <div class="card-content">
                            <input type="hidden" name="service_id" value="{{$service->id}}">

                            <div class="row field-row">
                                <div class="form-group col-md-6">
                                    <label>Minimum Service Charge</label>
                                    <input type="text"  class="form-control" name="vendor_min_service_charge" id="title" value="{{$data->vendor_min_service_charge}}" required>
                                </div>

                            </div>


                            <div class="row">

                                <div class="form-group col-md-12">
                                    <span><b>Define Service Charge</b></span>
                                </div>
                            </div>

                            <!----- Service check option ----------------->
                                @foreach($service->check_with_charge_fields as $check_with_charge_field)
                                <div class="row field-row">
                                    <div class="col-md-12"><span class="field-name">{{$check_with_charge_field['label_for_form']}}</span></div>

                                    @foreach($check_with_charge_field->check_with_charge_options as $check_with_charge_option)
                                    @php
                                    $data =\App\VendorCheckFieldCharge::where('service_provider_id',Auth::user()->id)->where('option_id',$check_with_charge_option->id)->first();
                                    @endphp
                                    <div class="form-group col-md-6">
                                        <label>{{$check_with_charge_option->option}}</label>
                                        <input type="hidden" name="option_id[]" value="{{$check_with_charge_option->id}}">
                                            @if($data)
                                            <input type="text"  class="form-control" name="check_charge[]" id="title" value="{{$data->charge}}" required>
                                            @else
                                            <input type="text"  class="form-control" name="check_charge[]" id="title" value="" required>
                                            @endif

                                    </div>
                                    @endforeach
                                </div>
                                @endforeach

                            <!----- /Service check option ----------------->

                            <!----- Service radio option ----------------->
                            @foreach($service->radio_with_charge_fields as $radio_with_charge_field)
                                <div class="row field-row">
                                    <div class="col-md-12"><span class="field-name">{{$radio_with_charge_field['label_for_form']}}</span></div>

                                    @foreach($radio_with_charge_field->radio_with_charge_options as $radio_with_charge_option)
                                        @php
                                            $radio_data =\App\VendorRadioFieldCharge::where('service_provider_id',Auth::user()->id)->where('option_id',$radio_with_charge_option->id)->first();
                                        @endphp

                                        <div class="form-group col-md-6">
                                            <label>{{$radio_with_charge_option->option}}</label>
                                            <input type="hidden" name="radio_option_id[]" value="{{$radio_with_charge_option->id}}">
                                            @if($radio_data)
                                                <input type="text"  class="form-control" name="radio_charge[]" id="title" value="{{$radio_data->charge}}" required>
                                            @else
                                                <input type="text"  class="form-control" name="radio_charge[]" id="title" value="" required>
                                            @endif

                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                            <!----- Service radio option ----------------->


                            <!----- Service select option ----------------->
                            @foreach($service->select_with_charge_fields as $select_with_charge_field)
                                <div class="row field-row">
                                    <div class="col-md-12"><span class="field-name">{{$select_with_charge_field['label_for_form']}}</span></div>

                                    @foreach($select_with_charge_field->select_with_charge_options as $select_with_charge_option)
                                        @php
                                            $select_data =\App\VendorSelectFieldCharge::where('service_provider_id',Auth::user()->id)->where('option_id',$select_with_charge_option->id)->first();
                                        @endphp
                                        <div class="form-group col-md-6">
                                            <label>{{$select_with_charge_option->option}}</label>
                                            <input type="hidden" name="select_option_id[]" value="{{$select_with_charge_option->id}}">
                                            @if($select_data)
                                                <input type="text"  class="form-control" name="select_charge[]" id="title" value="{{$select_data->charge}}" required>
                                            @else
                                                <input type="text"  class="form-control" name="select_charge[]" id="title" value="" required >
                                            @endif

                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                            <!----- Service select option ----------------->

                            <div class="form-group">
                                <label>Terms & Conditions</label>
                                <textarea name="terms_and_conditions" id="summary-ckeditor" cols="30" rows="6" class="form-control my-editor">{{$data->terms_and_conditions != null ? $data->terms_and_conditions :$service->terms_and_conditions}}</textarea>
                                {{--<input type="text"  class="form-control" name="short_description" id="title" value="{{$edit ? $service->short_description :old('short_description')}}">--}}
                                @if ($errors->has('terms_and_conditions'))
                                    <span class="error-message">
                                                    *{{ $errors->first('terms_and_conditions') }}
                                        </span>
                                @endif

                            </div>


                            <div class="form-group">
                                <label>Whats Included</label>
                                <textarea name="whats_included" id="summary-ckeditor-policy" cols="30" rows="6" class="form-control my-editor">{{$data->whats_included != null ? $data->whats_included :$service->whats_included}}</textarea>
                                {{--<input type="text"  class="form-control" name="short_description" id="title" value="{{$edit ? $service->short_description :old('short_description')}}">--}}
                                @if ($errors->has('whats_included'))
                                    <span class="error-message">
                                                    *{{ $errors->first('whats_included') }}
                                        </span>
                                @endif

                            </div>


                            <div class="form-footer text-right">
                                <div class="checkbox pull-left">
                                </div>
                                <button type="submit" class="btn btn-info btn-fill">Update</button>
                            </div>

                        </div>
                    </form>
                </div>



            </div>
        </div>

    </div>@endsection



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

</script>

<script src="{{ asset('dashboard/js/select2/select2.full.min.js') }}"></script>

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('summary-ckeditor');
    CKEDITOR.replace('summary-ckeditor-policy');

    $(document).ready(function() {
        $(".select2").select2();
    });
</script>



@endpush