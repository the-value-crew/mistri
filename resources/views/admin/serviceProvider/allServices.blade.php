@extends('admin.layouts.master')
@section('title',$name.'- All Services')

@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

@endpush

@section('content')
    <div class="container-fluid">

        <div class="row">

            <div class="alert alert-success frontend-message-container" style="position: fixed; top: 5px; right: 5px; z-index: 9999; width: 500px; opacity: 0.9; display: none;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">

                </button>
                <p class="frontend-message"></p>
            </div>

            <div class="col-md-12 col-lg-12">
                <p class="alert alert-success" id="msg" style="display: none"></p>
            </div>

            <div class="col-md-12">
                <div class="alert alert-success frontend-message-container" style="position: fixed; top: 5px; right: 5px; z-index: 9999; width: 500px; opacity: 0.9; display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">

                    </button>
                    <p class="frontend-message"></p>
                </div>
                <form action="{{route('assign.percentage',$service_provider->id)}}" method="post">
                    @csrf
                    <div class="card">

                    <div class="card-header" data-background-color="">

                        <div class="card-title">
                            <h4><b>{{$name}} - All Services</b></h4>
                        </div>
                    </div>
                    <div class="card-content">

                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" id="check-all">
                                            </label>
                                        </div>
                                    </th>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Profit in %</th>
                                    <th>Feature</th>
                                    <th style="width: 20%">Action</th>


                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th></th>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Profit in %</th>
                                    <th>Feature</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($service_provider->services as $key=>$service)
                                       <tr>
                                           <td>
                                               <div class="checkbox">
                                                   <label>
                                                       <input type="checkbox" class="check-it" name="service_ids[]" value="{{ $service->id }}">
                                                   </label>
                                               </div>
                                           </td>

                                          <td>{{++$key}}</td>
                                          <td>{{$service->name}}</td>
                                          <td>{{$service->pivot->profit_in_percentage}}%</td>
                                          <td>
                                              <div class="form-group">
                                                  <div class="togglebutton">
                                                      <label class="lead" style="color:black;font-weight:bold;font-size:11pt;">
                                                          <input type="checkbox" name="active" @if($service->pivot->feature == 1) checked @endif  onchange="changeStatus({{$service->pivot->id}})">
                                                      </label>
                                                  </div>
                                              </div>
                                          </td>
                                          <td>
                                              <button class="btn btn-danger btn-sm remove" onclick="deleteService({{$service->pivot->id}})"> <i class="fa fa-trash-o"></i> </button>
                                          </td>
                                       </tr>
                                   @endforeach
                                    @if(count($service_provider->services)==0)
                                        <tr>
                                            <td colspan="6" class="text-center">No Data Available</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <br><br>

                        @if(count($service_provider->services)>0)
                        <div style="padding-bottom: 100px">
                            <div class="col-md-8">
                                <div class="form-group label-floating">
                                    <label class="control-label">
                                        Profit Prcentage
                                        <small>*</small>
                                    </label>
                                    <input class="form-control" name="profit_in_percentage" type="text" required="true" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-success btn-sm">Assign</button>
                            </div>
                        </div>
                        @endif
                    </div>

                </div>
                </form>
            </div>
        </div>

    </div>

@endsection

@push('scripts')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>

    @if(\Session::has('message'))


        toastr.success("{{\Session::get('message')}}",'',{
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


        $(document).ready(function () {


            var $checkAll = $('#check-all'),
                $checkIt = $('.check-it'),
                $makeFeatured = $('.make-featured');

            $checkAll.change(function () {
                if ($(this).is(':checked')) {
                    $checkIt.prop('checked', true);
                } else {
                    $checkIt.prop('checked', false);
                }
            });

        });


    function changeStatus(status)
    {
        $.ajax({
            url:'{!!URL::to('admin/change-service-status/')!!}' + '/' + status,
            type : "get",
            data : {'_method' : 'get'},

            success:function(response){
                console.log(response);
                showSuccessMessage(response.message);

            },
            error:function(){

            }
        });


    }

    function deleteService(id) {
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function () {

            $.ajax({
                url:'{!!URL::to('admin/delete-serviceprovider-service/')!!}' + '/' + id,
                type : "get",
                success:function(){



                    console.log('success');
                    location.reload();


                },

            });

        });

    }
    function showSuccessMessage(e)
    {   var n=$(".frontend-message-container");
        n.fadeIn(),
            $(".frontend-message").html(e);
        setTimeout(function(){n.fadeOut()},5e3)}
    $(document).ready(function(){});
    </script>

@endpush