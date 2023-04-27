@extends('admin.layouts.master')
@push('css')
<link rel="stylesheet" href="{{asset('dashboard/css/select2/select2.min.css')}}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

@endpush

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div style="margin-top: 40px">

                    <a href="{{route('city.index')}}" class="btn pull-right" style="margin-top: -30px"><span class="material-icons">library_books</span>&nbsp;Manage All</a>

                </div>
                <div class="card">
                    <form id="CreateRestaurant" action="{{route('location.store.city')}}" method="post"  enctype="multipart/form-data">
                        @csrf


                        <div class="card-header" data-background-color="">
                            <h4 class="card-title"><b>Create City</b></h4>
                        </div>
                        <div class="clearfix"></div>
                        <div class="card-content">

                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">
                                        City Name
                                        <small>*</small>
                                    </label>
                                    <input class="form-control" name="name" type="text" required="true" />
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-footer text-right">
                                <button type="submit" class="btn btn-info btn-fill">Create</button>
                            </div>
                        </div>
                    </form>
                </div>

                @if(count($cities)>0)
                    <div class="card">
                        <form id="CreateRestaurant" action="{{route('city.store')}}" method="post"  enctype="multipart/form-data">
                            @csrf

                            <div class="card-header" data-background-color="">
                                <h4 class="card-title"><b>Add Area in City</b></h4>
                            </div>
                            <div class="clearfix"></div>
                            <div class="card-content">

                                <div class="col-md-6">
                                    <div class="form-group" style="margin-top:18px;">
                                        <label>Select City</label>
                                        <select class="form-control select2 select2-hidden-accessible" name="parent_id"  data-placeholder="Select City" style="width: 100%;" tabindex="-1" aria-hidden="true">

                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">
                                            Area Name
                                            <small>*</small>
                                        </label>
                                        <input class="form-control" name="state" type="text" required="true" />
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-footer text-right">
                                    <button type="submit" class="btn btn-info btn-fill">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
            </div>

        </div>
    </div>

@endsection

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

<script type="text/javascript">
    function setFormValidation(id) {
        $(id).validate({
            errorPlacement: function(error, element) {
                $(element).closest('div').addClass('has-error');
            }
        });
    }

    $(document).ready(function() {
        setFormValidation('#CreateRestaurant');

    });
</script>


<script src="{{ asset('dashboard/js/select2/select2.full.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $(".select2").select2();
    });
</script>


@endpush