@extends('admin.layouts.master')

@section('title','Pest Control Service')

@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

@endpush

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="">

                        <div class="card-title">
                            <h4><b>Residential Pest Control : Apartment </b></h4>
                            {{--<a href="{{route('service.create')}}" class="btn btn-sm pull-right" style="margin-top: -30px"><span class="material-icons">add</span> &nbsp;Add</a>--}}

                        </div>
                    </div>
                    <div class="card-content">

                            <div class="material-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>

                                        <th><b>Treatment/Homesize</b></th>
                                        <th><b>Studio</b></th>
                                        <th><b>1BHK</b></th>
                                        <th><b>2BHK</b></th>
                                        <th><b>3BHK</b></th>
                                        <th><b>4BHK</b></th>
                                        <th><b>5BHK</b></th>
                                        <th><b>Action</b></th>


                                    </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($apartment_pest_controls as $apartment_pest_control)
                                            @if(in_array($apartment_pest_control->id ,[5,6,8,10]) )
                                                <tr>
                                                    <td>{{$apartment_pest_control->treatment->name}}</td>
                                                    <td colspan="7" class="text-center"> <b>Quotation</b></td>
                                                </tr>
                                                @else

                                                    <tr class="rPestControl">
                                                        <td>{{$apartment_pest_control->treatment->name}}</td>
                                                        <td>{{$apartment_pest_control->studio}}</td>
                                                        <td>{{$apartment_pest_control->bhk1}}</td>
                                                        <td>{{$apartment_pest_control->bhk2}}</td>
                                                        <td>{{$apartment_pest_control->bhk3}}</td>
                                                        <td>{{$apartment_pest_control->bhk4}}</td>
                                                        <td>{{$apartment_pest_control->bhk5}}</td>
                                                        <td>

                                                            <a href="#" data-toggle="modal" data-target="#updateResidentialPestControl-{{$apartment_pest_control->id}}" class="btn btn-sm btn-info">Update</a>
                                                        </td>

                                                    </tr>


                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        @foreach($apartment_pest_controls as $apartment_pest_control)
                            <div class="modal fade" id="updateResidentialPestControl-{{$apartment_pest_control->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{route('update.residential.pestControl',$apartment_pest_control->id)}}" method="post" >
                                        @csrf

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><b>Update Price for treatment : {{$apartment_pest_control->treatment->name}}</b></h5>
                                                <hr>
                                            </div>
                                            <div class="modal-body">

                                                <div class="col-md-4">
                                                    <div class="form-group  label-floating">
                                                        <label>
                                                            Studio
                                                        </label>
                                                        <input class="form-control" name="studio" value="{{$apartment_pest_control->studio}}" type="text"  />
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group  label-floating">
                                                        <label>
                                                            1Bhk
                                                        </label>
                                                        <input class="form-control" name="bhk1"  value="{{$apartment_pest_control->bhk1}}" type="text"  />
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group  label-floating">
                                                        <label>
                                                            2Bhk
                                                        </label>
                                                        <input class="form-control" name="bhk2"  value="{{$apartment_pest_control->bhk2}}" type="text"  />
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group  label-floating">
                                                        <label>
                                                            3Bhk
                                                        </label>
                                                        <input class="form-control" name="bhk3"  value="{{$apartment_pest_control->bhk3}}" type="text"  />
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group  label-floating">
                                                        <label>
                                                            4Bhk
                                                        </label>
                                                        <input class="form-control" name="bhk4"  value="{{$apartment_pest_control->bhk4}}" type="text"  />
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group  label-floating">
                                                        <label>
                                                            5Bhk
                                                        </label>
                                                        <input class="form-control" name="bhk5"  value="{{$apartment_pest_control->bhk5}}" type="text"  />
                                                    </div>
                                                </div>




                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="">

                        <div class="card-title">
                            <h4><b>Residential Pest Control : Villa </b></h4>
                            {{--<a href="{{route('service.create')}}" class="btn btn-sm pull-right" style="margin-top: -30px"><span class="material-icons">add</span> &nbsp;Add</a>--}}

                        </div>
                    </div>
                    <div class="card-content">

                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>

                                    <th><b>Treatment/Homesize</b></th>
                                    <th><b>Studio</b></th>
                                    <th><b>1BHK</b></th>
                                    <th><b>2BHK</b></th>
                                    <th><b>3BHK</b></th>
                                    <th><b>4BHK</b></th>
                                    <th><b>5BHK</b></th>
                                    <th><b>Action</b></th>


                                </tr>
                                </thead>

                                <tbody>
                                @foreach($villa_pest_controls as $villa_pest_control)
                                    @if(in_array($villa_pest_control->id ,[15,16,18,20]) )
                                        <tr>
                                            <td>{{$villa_pest_control->treatment->name}}</td>
                                            <td colspan="7" class="text-center"> <b>Quotation</b></td>
                                        </tr>
                                    @else

                                        <tr class="rPestControl">
                                            <td>{{$villa_pest_control->treatment->name}}</td>
                                            <td>{{$villa_pest_control->studio}}</td>
                                            <td>{{$villa_pest_control->bhk1}}</td>
                                            <td>{{$villa_pest_control->bhk2}}</td>
                                            <td>{{$villa_pest_control->bhk3}}</td>
                                            <td>{{$villa_pest_control->bhk4}}</td>
                                            <td>{{$villa_pest_control->bhk5}}</td>
                                            <td>

                                                <a href="#" data-toggle="modal" data-target="#updateVillaResidentialPestControl-{{$villa_pest_control->id}}" class="btn btn-sm btn-info">Update</a>
                                            </td>

                                        </tr>


                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        @foreach($villa_pest_controls as $villa_pest_control)
                            <div class="modal fade" id="updateVillaResidentialPestControl-{{$villa_pest_control->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{route('update.residential.pestControl',$villa_pest_control->id)}}" method="post" >
                                        @csrf

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><b>Update Price for treatment : {{$villa_pest_control->treatment->name}}</b></h5>
                                                <hr>
                                            </div>
                                            <div class="modal-body">

                                                <div class="col-md-4">
                                                    <div class="form-group  label-floating">
                                                        <label>
                                                            Studio
                                                        </label>
                                                        <input class="form-control" name="studio" value="{{$villa_pest_control->studio}}" type="text"  />
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group  label-floating">
                                                        <label>
                                                            1Bhk
                                                        </label>
                                                        <input class="form-control" name="bhk1"  value="{{$villa_pest_control->bhk1}}" type="text"  />
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group  label-floating">
                                                        <label>
                                                            2Bhk
                                                        </label>
                                                        <input class="form-control" name="bhk2"  value="{{$villa_pest_control->bhk2}}" type="text"  />
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group  label-floating">
                                                        <label>
                                                            3Bhk
                                                        </label>
                                                        <input class="form-control" name="bhk3"  value="{{$villa_pest_control->bhk3}}" type="text"  />
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group  label-floating">
                                                        <label>
                                                            4Bhk
                                                        </label>
                                                        <input class="form-control" name="bhk4"  value="{{$villa_pest_control->bhk4}}" type="text"  />
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group  label-floating">
                                                        <label>
                                                            5Bhk
                                                        </label>
                                                        <input class="form-control" name="bhk5"  value="{{$villa_pest_control->bhk5}}" type="text"  />
                                                    </div>
                                                </div>




                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="">

                        <div class="card-title">
                            <h4><b>Office Pest Control </b></h4>
                            {{--<a href="{{route('service.create')}}" class="btn btn-sm pull-right" style="margin-top: -30px"><span class="material-icons">add</span> &nbsp;Add</a>--}}

                        </div>
                    </div>
                    <div class="card-content">

                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>

                                    <th><b>Treatment/Homesize</b></th>
                                    <th><b>100-500</b></th>
                                    <th><b>501-1000</b></th>
                                    <th><b>1001-1500</b></th>
                                    <th><b>1501-2000</b></th>
                                    <th><b>Action</b></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($office_pest_controls as $office_pest_control)
                                    @if(in_array($office_pest_control->id ,[5,6,8,10]) )
                                        <tr>
                                            <td>{{$office_pest_control->treatment->name}}</td>
                                            <td colspan="7" class="text-center"> <b>Quotation</b></td>
                                        </tr>
                                    @else

                                        <tr class="rPestControl">
                                            <td>{{$office_pest_control->treatment->name}}</td>
                                            <td>{{$office_pest_control->home_size1}}</td>
                                            <td>{{$office_pest_control->home_size2}}</td>
                                            <td>{{$office_pest_control->home_size3}}</td>
                                            <td>{{$office_pest_control->home_size4}}</td>

                                            <td>

                                                <a href="#" data-toggle="modal" data-target="#updateOfficePestControl-{{$office_pest_control->id}}" class="btn btn-sm btn-info">Update</a>
                                            </td>

                                        </tr>


                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        @foreach($office_pest_controls as $office_pest_control)
                            <div class="modal fade" id="updateOfficePestControl-{{$office_pest_control->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{route('update.office.pestControl',$office_pest_control->id)}}" method="post" >
                                        @csrf

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><b>Update Price for treatment : {{$office_pest_control->treatment->name}}</b></h5>
                                                <hr>
                                            </div>
                                            <div class="modal-body">

                                                <div class="col-md-6">
                                                    <div class="form-group  label-floating">
                                                        <label>
                                                            100 - 500
                                                        </label>
                                                        <input class="form-control" name="home_size1" value="{{$office_pest_control->home_size1}}" type="text"  />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group  label-floating">
                                                        <label>
                                                            501 - 1000
                                                        </label>
                                                        <input class="form-control" name="home_size2"  value="{{$office_pest_control->home_size2}}" type="text"  />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group  label-floating">
                                                        <label>
                                                            1001 - 1500
                                                        </label>
                                                        <input class="form-control" name="home_size3"  value="{{$office_pest_control->home_size3}}" type="text"  />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group  label-floating">
                                                        <label>
                                                            1501 - 2000
                                                        </label>
                                                        <input class="form-control" name="home_size4"  value="{{$office_pest_control->home_size4}}" type="text"  />
                                                    </div>
                                                </div>






                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection

@push('scripts')

@endpush