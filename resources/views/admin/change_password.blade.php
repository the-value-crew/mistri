@extends('admin.layouts.master')
@section('title',"Change Password")

@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">

        <div class="row rowstyle">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-head" data-background-color="">

                        <div class="card-title">
                            <h4><b>Change Password</b></h4>

                        </div>
                    </div>
                    <div class="card-content">

                        <form method="post" action="{{route('change.password.submit')}}" class="form-horizontal" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group label-floating margin-style">
                                <label class="control-label" >Old Password</label>
                                <input type="password"  class="form-control" name="old_password" >
                                @if(\Session::has('error_message'))
                                    <span class="error-message">
                                                    * {{\Session::get('error_message')}}
                                        </span>
                                @endif
                            </div>

                            <div class="form-group label-floating margin-style">
                                <label class="control-label" >New Password</label>
                                <input type="password"  class="form-control" name="new_password">
                                @if ($errors->has('new_password'))
                                    <span class="error-message">
                                                    * {{ $errors->first('new_password') }}
                                        </span>
                                @endif
                            </div>

                            <div class="form-group label-floating margin-style">
                                <label class="control-label" >Confirm Password</label>
                                <input type="password"  class="form-control" name="new_password_confirmation">
                                @if ($errors->has('new_password_confirmation'))
                                    <span class="error-message">
                                                    * {{ $errors->first('new_password_confirmation') }}
                                        </span>
                                @endif
                            </div>







                            <div class="form-footer text-right">
                                <div class="checkbox pull-left">
                                </div>
                                <button type="submit" class="btn btn-info btn-fill">{{"Update"}}</button>
                            </div>
                        </form>

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

@endpush