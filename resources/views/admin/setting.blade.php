@extends('admin.layouts.master')
@section('title','Setting')
@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form method="post" action="{{route('setting.update',$data->id)}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-header" data-background-color="">
                            <h4 class="card-title"><b>Settings</b></h4>
                        </div>
                        <div class="card-content">
                            <div class="form-group label-floating is-empty">
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="{{asset('dashboard/img/'.$data->logo)}}" id="image" class="img-thumbnail img-responsive" alt="">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Add Logo</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="logo" id="image" />
                                                    </span>
                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="form-group  margin-style col-md-6">
                                <label class="" >Name</label>
                                <input type="text"  class="form-control" name="name" value="{{$data->name}}">
                            </div>
                            <div class="form-group  margin-style col-md-6">
                                <label>Email</label>
                                <input type="email"  class="form-control" name="email_1" value="{{$data->email_1}}">
                            </div>

                            <div class="form-group  margin-style col-md-6">
                                <label>Another Email</label>
                                <input type="email"  class="form-control" name="email_2" value="{{$data->email_2}}">
                            </div>

                            <div class="form-group  margin-style col-md-6">
                                <label>Phone</label>
                                <input type="text"  class="form-control" name="phone_1" value="{{$data->phone_1}}">
                            </div>

                            {{--<div class="form-group  margin-style col-md-6">--}}
                                {{--<label>Another Phone</label>--}}
                                {{--<input type="text"  class="form-control" name="phone_2" value="{{$data->phone_2}}">--}}
                            {{--</div>--}}
                            <div class="form-group margin-style col-md-6">
                                <label>Address Line 1</label>
                                <input type="text"  class="form-control" name="address_line_1" value="{{$data->address_line_1}}">
                            </div>

                            <div class="form-group margin-style col-md-6">
                                <label>Address Line 2</label>
                                <input type="text"  class="form-control" name="address_line_2" value="{{$data->address_line_2}}">
                            </div>

                            <div class="form-group margin-style col-md-6">
                                <label>Establish At</label>
                                <input type="text"  class="form-control" name="establish_at" value="{{$data->establish_at}}">
                            </div>

                            <div class="form-group margin-style col-md-6">
                                <label >Facebook Link</label>
                                <input type="text"  class="form-control" name="fb_url" value="{{$data->fb_url}}">
                            </div>

                            <div class="form-group margin-style col-md-6">
                                <label>Twitter Link</label>
                                <input type="text"  class="form-control" name="twitter_url" value="{{$data->twitter_url}}">
                            </div>

                            <div class="form-group  margin-style col-md-6">
                                <label>Instagram Link</label>
                                <input type="text"  class="form-control" name="instagram_url" value="{{$data->instagram_url}}">
                            </div>

                            <div class="form-group margin-style col-md-6">
                                <label>Youtube Link</label>
                                <input type="text"  class="form-control" name="youtube_url" value="{{$data->youtube_url}}">
                            </div>

                                <div class="form-group margin-style col-md-6">
                                    <label>Playstore Url</label>
                                    <input type="text"  class="form-control" name="playstore_url" value="{{$data->playstore_url}}">
                                </div>

                                <div class="form-group margin-style col-md-6">
                                    <label>Appstore Url</label>
                                    <input type="text"  class="form-control" name="appstore_url" value="{{$data->appstore_url}}">
                                </div>

                            <div class="form-group margin-style col-md-12">
                                <label >Map Url</label>
                                <textarea name="map_url" id="" cols="30" rows="4" class="form-control">{{$data->map_url}}</textarea>
                            </div>

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