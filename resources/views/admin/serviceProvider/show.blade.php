@extends('admin.layouts.master')

@section('title', $user->name)

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">

                        <div class="card-header" data-background-color="">
                            <h4 class="card-title"><b>Service Provider Detail : {{$user->name}}</b></h4>
                            <a href="{{route('service-provider.index')}}" class="btn btn-sm pull-right" style="margin-top: -30px"><i class="fa fa-cogs" aria-hidden="true"></i> &nbsp;Manage</a>

                        </div>
                        <div class="card-content">

                            <div class="row">


                                    <div class="col-md-6 form-group ">
                                        <label class="" >Name</label>
                                        <input type="text"  class="form-control" name="name" value="{{$user->name}}" readonly>
                                    </div>
                                    <div class=" col-md-6 form-group">
                                        <label>Email</label>
                                        <input type="email"  class="form-control" name="email_1" value="{{$user->email}}" readonly>
                                    </div>

                                <div class="col-md-6 form-group ">
                                    <label class="" >Conatct Person </label>
                                    <input type="text"  class="form-control" name="name" value="{{$user->details->contact_person}}" readonly>
                                </div>
                                <div class=" col-md-6 form-group">
                                    <label>Phone Number</label>
                                    <input type="email"  class="form-control" name="email_1" value="{{$user->details->contact_number}}" readonly>
                                </div>

                                <div class="col-md-6 form-group ">
                                    <label class="" >Website</label>
                                    <input type="text"  class="form-control" name="name" value="{{$user->details->website}}" readonly>
                                </div>
                                <div class=" col-md-6 form-group">
                                    <label>Number of Employ</label>
                                    <input type="email"  class="form-control" name="email_1" value="{{$user->details->number_of_employ}}" readonly>
                                </div>

                                <div class=" col-md-12 form-group">
                                    <iframe id="myFrame" style="display:none" width="100%" height="500"></iframe>
                                    <input type="button" value="View License" class="btn btn-primary" onclick = "openPdf()"/>
                                </div>
                                <div class=" col-md-12 form-group">
                                    <label>Provide Service </label>
                                    <br>
                                    @if(count($user->services)>0)
                                            @foreach($user->services as $service)
                                                <span class="label label-info">{{$service->name}}</span>
                                            @endforeach
                                        @else
                                            <span style="padding-left: 20px;font-weight: 600;font-size: 12px">Update service status for vendor inside section Services/Service Request.</span>

                                    @endif



                                </div>

                                <div class=" col-md-12 form-group">
                                    <label>Provide Service in Cities </label>
                                    <br>
                                    @foreach($user->cities as $city)
                                    <span class="label label-success">{{$city->name}}</span>
                                    @endforeach
                                </div>





                            @if($user->details->message != null)
                                <div class="form-group margin-style col-md-12">
                                    <label >Message</label>
                                    <textarea  cols="30" rows="4" class="form-control">{{$user->details->message}}</textarea>
                                </div>

                                @endif





                            </div>



                        </div>

                </div>
            </div>
        </div>

    </div>

@endsection

@push('scripts')
<script>
    function openPdf() {
        var omyFrame = document.getElementById("myFrame");
        omyFrame.style.display="block";
        omyFrame.src = "{{asset('uploads/license/'.$user->license)}}";
    }
</script>

@endpush

