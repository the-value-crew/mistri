@extends('admin.layouts.master')
@section('title',"Subscribtion Plan")

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

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form method="post" action="{{route('update.subscribed.user',$data->id)}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header" data-background-color="">

                            <div class="card-title">
                                <h4><b>{{("Update Subscriberd Vendor Plan - ".$data->user->name)}}</b></h4>
                                <a href="{{route('subscribed.user')}}" class="btn btn-sm pull-right" style="margin-top: -30px"><i class="fa fa-cogs" aria-hidden="true"></i> &nbsp;Manage</a>

                            </div>
                        </div>
                        <div class="card-content">




                            <div class="form-group col-md-6">
                                <label>Vendor Name</label>
                                <input type="text"  class="form-control" name="name" id="title" value="{{$data->user->name}}" readonly>
                                @if ($errors->has('name'))
                                    <span class="error-message">
                                                    *{{ $errors->first('name') }}
                                        </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label>Name</label>
                                <input type="text"  class="form-control" name="name" id="title" value="{{$data->plan->name}}" readonly>
                                @if ($errors->has('name'))
                                    <span class="error-message">
                                                    *{{ $errors->first('name') }}
                                        </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label>Plan Active from</label>
                                <input type="date"  class="form-control" name="active_from_date" id="title" value="{{$data->active_from_date}}" required>
                                @if ($errors->has('active_from_date'))
                                    <span class="error-message">
                                                    *{{ $errors->first('active_from_date') }}
                                        </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label>Expiry Date</label>
                                <input type="date"  class="form-control" name="expiry_date" id="title" value="{{$data->expiry_date}}" required>
                                @if ($errors->has('expiry_date'))
                                    <span class="error-message">
                                                    *{{ $errors->first('expiry_date') }}
                                        </span>
                                @endif
                            </div>

                            <div class="form-group  col-md-12">
                                <div class="togglebutton">
                                    <label class="lead" style="color:black;font-weight:bold;font-size:11pt;">
                                        Inactive <input type="checkbox" name="status" @if($data->status == "on") checked  @endif>Active
                                    </label>
                                </div>
                            </div>






                            <div class="clearfix"></div>

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



@endpush