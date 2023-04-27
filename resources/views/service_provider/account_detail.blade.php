@extends('service_provider.layouts.master')
@push('css')
<link rel="stylesheet" href="{{asset('dashboard/css/select2/select2.min.css')}}">
@endpush

@section('title','Account Detail')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{route('update.account.detail')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="card-header" data-background-color="">
                        <h4 class="card-title"><b>My Account Detail</b></h4>

                    </div>
                    <div class="card-content">

                        <div class="row">

                            <div class="form-group label-floating is-empty" style="margin-left: 20px">
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        @if($user->image != null)
                                            <img src="{{asset('uploads/logo/'.$user->image)}}" id="image" class="img-thumbnail img-responsive" alt="">
                                        @else
                                            <img src="{{asset('uploads/logo/logo.png')}}" id="image" class="img-thumbnail img-responsive" alt="">
                                        @endif
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Update Logo</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="image" id="image" />
                                                    </span>
                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6 form-group ">
                                <label class="" >Company Name</label>
                                <input type="text"  class="form-control" name="name" value="{{$user->name}}">
                            </div>
                            <div class=" col-md-6 form-group">
                                <label>Email</label>
                                <input type="email"  class="form-control" name="email_1" value="{{$user->email}}" readonly>
                            </div>

                            <div class="col-md-6 form-group ">
                                <label class="" >Conatct Person </label>
                                <input type="text"  class="form-control" name="contact_person" value="{{$user->details->contact_person}}" >
                            </div>
                            <div class=" col-md-6 form-group">
                                <label>Phone Number</label>
                                <input type="text"  class="form-control" name="contact_number" value="{{$user->details->contact_number}}" >
                            </div>

                            <div class="col-md-6 form-group ">
                                <label class="" >Website</label>
                                <input type="text"  class="form-control" name="website" value="{{$user->details->website}}" >
                            </div>
                            <div class=" col-md-6 form-group">
                                <label>Number of Employ</label>
                                <input type="text"  class="form-control" name="number_of_employ" value="{{$user->details->number_of_employ}}" >
                            </div>

                            <div class=" col-md-12 form-group">
                                <label>Provide Service </label>
                                <br>
                                @foreach($user->services as $service)
                                    <span class="label label-info">{{$service->name}}</span>
                                @endforeach
                            </div>

                            {{--<div class=" col-md-12 form-group">--}}
                                {{--<label>Provide Service in Cities </label>--}}
                                {{--<br>--}}
                                {{--@foreach($user->cities as $city)--}}
                                    {{--<span class="label label-success">{{$city->name}}</span>--}}
                                {{--@endforeach--}}
                            {{--</div>--}}

                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label>Provide Service in Area</label>
                                    <select class="form-control select2 select2-hidden-accessible" name="cities[]" multiple=""  data-placeholder=" Select State In City" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}" disabled>{{$city->name}}</option>
                                            @foreach($city->areas as $area)
                                                <option value="{{$area->id}}" @if(in_array($area->id,$a)) selected @endif >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$area->state}}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>


                            </div>



                            {{--@if($user->details->message != null)--}}
                                {{--<div class="form-group margin-style col-md-12">--}}
                                    {{--<label >Message</label>--}}
                                    {{--<textarea  cols="30" rows="4" class="form-control">{{$user->details->message}}</textarea>--}}
                                {{--</div>--}}

                            {{--@endif--}}


                        </div>






                        {{--<div class="form-footer text-right">--}}
                        {{--<div class="checkbox pull-left">--}}

                        {{--</div>--}}
                        {{--<button type="submit" class="btn btn-info btn-fill">Update</button>--}}
                        {{--</div>--}}

                    </div>

                    <div class="form-footer text-right">
                        <div class="checkbox">
                        </div>
                        <button type="submit" class="btn btn-info btn-fill" style="margin-right: 20px">{{"Update"}}</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
<script src="{{ asset('dashboard/js/select2/select2.full.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $(".select2").select2();
    });
</script>
@endpush