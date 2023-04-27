@extends('service_provider.layouts.master')
@section('title','Available On')

@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('dashboard/css/select2/select2.min.css')}}">

@endpush

@section('content')
    <div class="container-fluid">

        <div class="row">



            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="">

                        <div class="card-title">
                            <h4><b>Available On </b></h4>
                            {{--<a href="{{route('service.create')}}" class="btn btn-sm pull-right" style="margin-top: -30px"><span class="material-icons">add</span> &nbsp;Add</a>--}}

                        </div>
                    </div>
                    <div class="card-content">
                        <form action="{{route('available-on.update',$id)}}" method="post">
                            @csrf
                            @method('put')

                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>

                                        <th>Day</th>
                                        <th>Status</th>
                                        <th>Opening Time</th>
                                        <th>Closing Time</th>
                                        <th>Actiexion</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>

                                        <th>Day</th>
                                        <th>Status</th>
                                        <th>Opening Time</th>
                                        <th>Closing Time</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <tr>

                                        <td>Monday</td>
                                        <td>
                                            @if($availability)
                                                <select class=" select2 select2-hidden-accessible" name="monday_status"  style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                    <option value="1" @if($availability->monday_status == 1) selected @endif>Open</option>
                                                    <option value="0" @if($availability->monday_status == 0) selected @endif>Close</option>

                                                </select>

                                            @else
                                                <select class=" select2 select2-hidden-accessible" name="monday_status"  style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <option value="1">Open</option>
                                                <option value="0">Close</option>

                                                </select>
                                            @endif
                                        </td>
                                        <td>@if($availability) <input type="time" name="monday_opening_time" class="form-control" value="{{$availability->monday_opening_time}}"> @else
                                                <input type="time" class="form-control" name="monday_opening_time"> @endif
                                        </td>
                                        <td>@if($availability) <input type="time" name="monday_closing_time" class="form-control" value="{{$availability->monday_closing_time}}"> @else <input type="time" class="form-control" name="monday_closing_time"> @endif</td>
                                        <td><button class="btn btn-sm btn-info">Update</button></td>
                                    </tr>


                                    <tr>
                                        <td>Tuesday</td>
                                        <td>
                                            @if($availability)
                                                <select class=" select2 select2-hidden-accessible" name="tuesday_status"  style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                    <option value="1" @if($availability->tuesday_status == 1) selected @endif>Open</option>
                                                    <option value="0" @if($availability->tuesday_status == 0) selected @endif>Close</option>

                                                </select>

                                            @else
                                                <select class=" select2 select2-hidden-accessible" name="tuesday_status"  style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                    <option value="1">Open</option>
                                                    <option value="0">Close</option>

                                                </select>
                                            @endif
                                        </td>
                                        <td>@if($availability) <input type="time" name="tuesday_opening_time" value="{{$availability->tuesday_opening_time}}" class="form-control">  @else
                                                <input type="time" name="tuesday_opening_time" class="form-control"> @endif</td>

                                        <td>@if($availability) <input type="time" name="tuesday_closing_time" class="form-control" value="{{$availability->tuesday_closing_time}}"> @else
                                                <input type="time" name="tuesday_closing_time" class="form-control"> @endif</td>
                                        <td><button class="btn btn-sm btn-info">Update</button></td>
                                    </tr>
                                    <tr>
                                        <td>Wednesday</td>
                                        <td>
                                            @if($availability)
                                                <select class=" select2 select2-hidden-accessible" name="wednesday_status"  style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                    <option value="1"  @if($availability->wednesday_status == 1) selected @endif>Open</option>
                                                    <option value="0"  @if($availability->wednesday_status == 0) selected @endif>Close</option>

                                                </select>
                                            @else
                                                <select class=" select2 select2-hidden-accessible" name="wednesday_status"  style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                    <option value="1">Open</option>
                                                    <option value="0">Close</option>

                                                </select>
                                            @endif
                                        </td>
                                        <td>@if($availability) <input type="time" class="form-control" value="{{$availability->wednesday_opening_time}}" name="wednesday_opening_time">  @else  <input type="time" class="form-control"  name="wednesday_opening_time"> @endif</td>
                                        <td>@if($availability) <input type="time" class="form-control" name="wednesday_closing_time" value="{{$availability->wednesday_closing_time}}"> @else <input type="time" class="form-control" name="wednesday_closing_time">  @endif</td>
                                        <td><button class="btn btn-sm btn-info">Update</button></td>
                                    </tr>
                                    <tr>
                                        <td>Thursday</td>
                                        <td>
                                            @if($availability)
                                                <select class=" select2 select2-hidden-accessible" name="thursday_status"  style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                    <option value="1" @if($availability->thursday_status == 1) selected @endif>Open</option>
                                                    <option value="0" @if($availability->thursday_status == 0) selected @endif>Close</option>

                                                </select>
                                            @else
                                                <select class=" select2 select2-hidden-accessible" name="thursday_status"  style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                    <option value="1">Open</option>
                                                    <option value="0">Close</option>

                                                </select>
                                            @endif
                                        </td>
                                        <td>@if($availability) <input type="time" class="form-control" name="thursday_opening_time" value="{{$availability->thursday_opening_time}}">  @else <input type="time" class="form-control" name="thursday_opening_time">   @endif</td>
                                        <td>@if($availability) <input type="time" class="form-control" name="thursday_closing_time" value="{{$availability->thursday_closing_time}}"> @else  <input type="time" class="form-control" name="thursday_closing_time"> @endif</td>
                                        <td><button class="btn btn-sm btn-info">Update</button></td>
                                    </tr>
                                    <tr>
                                        <td>Friday</td>
                                        <td>
                                            @if($availability)
                                                <select class=" select2 select2-hidden-accessible" name="friday_status"  style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                    <option value="1" @if($availability->friday_status == 1) selected @endif>Open</option>
                                                    <option value="0" @if($availability->friday_status == 0) selected @endif>Close</option>

                                                </select>
                                            @else
                                                <select class=" select2 select2-hidden-accessible" name="friday_status"  style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                    <option value="1">Open</option>
                                                    <option value="0">Close</option>

                                                </select>
                                            @endif
                                        </td>
                                        <td>@if($availability) <input type="time" class="form-control" name="friday_opening_time" value="{{$availability->friday_opening_time}}">  @else <input type="time" class="form-control" name="friday_opening_time">  @endif</td>
                                        <td>@if($availability) <input type="time" class="form-control" name="friday_closing_time" value="{{$availability->friday_closing_time}}">  @else <input type="time" class="form-control" name="friday_closing_time">  @endif</td>
                                        <td><button class="btn btn-sm btn-info">Update</button></td>
                                    </tr>
                                    <tr>
                                        <td>Saturday</td>
                                        <td>
                                            @if($availability)
                                                <select class=" select2 select2-hidden-accessible" name="saturday_status"  style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                    <option value="1" @if($availability->saturday_status == 1) selected @endif>Open</option>
                                                    <option value="0" @if($availability->saturday_status == 0) selected @endif >Close</option>

                                                </select>
                                            @else
                                                <select class=" select2 select2-hidden-accessible" name="saturday_status"  style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                    <option value="1">Open</option>
                                                    <option value="0">Close</option>

                                                </select>
                                            @endif
                                        </td>
                                        <td>@if($availability) <input type="time" class="form-control" name="saturday_opening_time" value="{{$availability->saturday_opening_time}}">   @else <input type="time" class="form-control" name="saturday_opening_time">  @endif</td>
                                        <td>@if($availability)<input type="time" class="form-control" name="saturday_closing_time" value="{{$availability->saturday_closing_time}}"> @else <input type="time" class="form-control" name="saturday_closing_time">  @endif</td>
                                        <td><button class="btn btn-sm btn-info">Update</button></td>
                                    </tr>
                                    <tr>
                                        <td>Sunday</td>
                                        <td>
                                            @if($availability)
                                                <select class=" select2 select2-hidden-accessible" name="sunday_status"  style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                    <option value="1" @if($availability->sunday_status == 1) selected @endif >Open</option>
                                                    <option value="0" @if($availability->sunday_status == 0) selected @endif >Close</option>

                                                </select>
                                            @else
                                                <select class=" select2 select2-hidden-accessible" name="sunday_status"  style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                    <option value="1">Open</option>
                                                    <option value="0">Close</option>

                                                </select>
                                            @endif
                                        </td>
                                        <td>@if($availability) <input type="time" class="form-control" name="sunday_opening_time" value="{{$availability->sunday_opening_time}}"> @else <input type="time" class="form-control" name="sunday_opening_time">  @endif</td>
                                        <td>@if($availability) <input type="time" class="form-control" name="sunday_closing_time" value="{{$availability->sunday_closing_time}}">  @else  <input type="time" class="form-control" name="sunday_closing_time"> @endif</td>
                                        <td><button class="btn btn-sm btn-info">Update</button></td>
                                    </tr>


                                </tbody>
                            </table>
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

<script>
    $(document).ready(function() {
        $(".select2").select2();
    });
</script>



@endpush