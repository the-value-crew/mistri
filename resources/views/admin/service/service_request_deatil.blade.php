@extends('admin.layouts.master')

@section('title', 'Request Detail')

@push('css')
<link rel="stylesheet" href="{{asset('dashboard/css/select2/select2.min.css')}}">

<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@endpush

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header" data-background-color="">
                        <h4 class="card-title"><b>Service Request Detail : {{$service_request->service->name}}</b></h4>
                        <a href="{{route('admin.service-request')}}" class="btn btn-sm pull-right" style="margin-top: -30px"><i class="fa fa-cogs" aria-hidden="true"></i> &nbsp;Manage</a>

                    </div>
                    <div class="card-content">

                        <div class="row">


                            <div class="col-md-6 form-group ">
                                <label class="" >Request by Vendor</label>
                                <input type="text"  class="form-control" name="name" value="{{$service_request->vendor->name}}" readonly>
                            </div>
                            <div class=" col-md-6 form-group">
                                <label>Email</label>
                                <input type="email"  class="form-control" name="email_1" value="{{$service_request->vendor->email}}" readonly>
                            </div>

                            {{--<div class="col-md-6 form-group ">--}}
                                {{--<label class="" >Conatct Person </label>--}}
                                {{--<input type="text"  class="form-control" name="name" value=" " readonly>--}}
                            {{--</div>--}}
                            {{--<div class=" col-md-6 form-group">--}}
                                {{--<label>Phone Number</label>--}}
                                {{--<input type="email"  class="form-control" name="email_1" value=" " readonly>--}}
                            {{--</div>--}}


                            @if($service_request->document != null)

                            <div class=" col-md-12 form-group">
                                <iframe id="myFrame" style="display:none" width="100%" height="500"></iframe>
                                <input type="button" value="View Documents" class="btn btn-primary" onclick = "openPdf()"/>
                            </div>
                            @endif


                            <div class="form-group margin-style col-md-12">
                                    <label >Message</label>
                                    <textarea  cols="30" rows="4" class="form-control">{!! strip_tags($service_request->message) !!}</textarea>
                            </div>

                            <div class=" col-md-12 form-group">
                                <div class="form-group" style="margin-top:18px;">
                                    <form action="{{route('update.service.request')}}" method="post">
                                        <input type="hidden" name="user_service_id" value="{{$service_request->id}}">
                                        @csrf
                                        <label>Change Status</label>
                                        <select class="form-control select2 select2-hidden-accessible" name="status"  data-placeholder="Change Status" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            <option value="pending" @if($service_request->state == 'pending') selected @endif>pending</option>
                                            <option value="approved" @if($service_request->state == 'approved') selected @endif>approved</option>
                                            <option value="unapproved" @if($service_request->state == 'unapproved') selected @endif>unapproved</option>

                                        </select>

                                        <div class="form-footer text-right">
                                            <div class="checkbox pull-left">
                                            </div>
                                            <button type="submit" class="btn btn-info btn-fill">{{"Update Request Status"}}</button>
                                        </div>

                                    </form>
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
<script>
    function openPdf() {
        var omyFrame = document.getElementById("myFrame");
        omyFrame.style.display="block";
        omyFrame.src = "{{asset('uploads/document/'.$service_request->document)}}";
    }
</script>

<script src="{{ asset('dashboard/js/select2/select2.full.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $(".select2").select2();
    });
</script>
@endpush

