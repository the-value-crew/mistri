@extends('admin.layouts.master')
@section('title', $edit ? 'Edit Service' :'Create Service')

@push('css')
<link rel="stylesheet" href="{{asset('dashboard/css/select2/select2.min.css')}}">

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
                    <form method="post" action="{{$edit ? route('service.update',$service->id)  : route('service.store')}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @if($edit) @method('put') @endif
                        <div class="card-header" data-background-color="">

                            <div class="card-title">
                                <h4><b>{{$edit ? ("Edit Service - ".$service->name):("Create Service")}}</b></h4>
                                <a href="{{route('service.index')}}" class="btn btn-sm pull-right" style="margin-top: -30px"><i class="fa fa-cogs" aria-hidden="true"></i> &nbsp;Manage</a>
                                @if($edit)
                                    <a href="{{route('service.create')}}" class="btn btn-sm pull-right" style="margin-top: -30px"><span class="material-icons">add</span> &nbsp;Add</a>
                                @endif
                            </div>
                        </div>
                        <div class="card-content">

                            <div class="form-group label-floating is-empty col-md-12">
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">

                                        @if($edit)
                                            <img src="{{asset('uploads/service/'.$service->image)}}" id="image" class="img-thumbnail img-responsive" alt="">
                                        @else
                                            <img src="{{asset('dashboard/img/placeholder.jpg')}}" id="image" class="img-thumbnail img-responsive" alt="">
                                        @endif
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Add Image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="image" id="image" />
                                                    </span>
                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group col-md-6" style="margin-top:18px;">
                                <label>Select Category for service</label>
                                <select class="form-control select2 select2-hidden-accessible" name="service_category_id"  data-placeholder="Select Category" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <option value=" ">Select Category for service</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" {{$edit ? ($service->service_category_id == $category->id ? "selected" : " ") : ""}} >{{$category->name}}</option>
                                        @php $sub_categories = \App\ServiceCategory::where('parent_id',$category->id)->get(); @endphp
                                        @foreach($sub_categories as $sub_category)
                                            <option value="{{$sub_category->id}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -- &nbsp{{$sub_category->name}}</option>
                                            @php $sub_subs = \App\ServiceCategory::where('parent_id',$sub_category->id)->get(); @endphp
                                            @foreach($sub_subs as $sub_sub)
                                                <option value="{{$sub_sub->id}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -- &nbsp{{$sub_sub->name}}</option>
                                                @php $sub_level4s = \App\ServiceCategory::where('parent_id',$sub_sub->id)->get(); @endphp
                                                @foreach($sub_level4s as $sub_level4)
                                                    <option value="{{$sub_level4->id}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -- &nbsp{{$sub_level4->name}}</option>
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6" style="margin-top:18px;">
                                <label>Enable "Get Quotes" option for client</label>
                                <select class="form-control select2 select2-hidden-accessible" name="quotable_service"  data-placeholder="Enable quotable option" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <option value="0" {{$edit ? ($service->quotable_service == 0 ? "selected" : " ") : ""}}>No</option>
                                    <option value="1" {{$edit ? ($service->quotable_service == 1 ? "selected" : " ") : ""}}>Yes</option>
                                </select>
                            </div>


                            <div class="clearfix"></div>



                                <div class="form-group col-md-6">
                                    <label>Service Name</label>
                                    <input type="text"  class="form-control" name="name" id="title" value="{{$edit ? $service->name :old('name')}}">
                                    @if ($errors->has('name'))
                                        <span class="error-message">
                                                    *{{ $errors->first('name') }}
                                        </span>
                                    @endif
                                </div>

                            <div class="form-group col-md-6">
                                <label>Service Minimum Charge ( Price In NPR )</label>
                                <input type="text"  class="form-control" name="min_service_charge" id="title" value="{{$edit ? $service->min_service_charge :old('min_service_charge')}}">
                                @if ($errors->has('min_service_charge'))
                                    <span class="error-message">
                                                    *{{ $errors->first('min_service_charge') }}
                                        </span>
                                @endif
                            </div>



                            <div class="form-group col-md-12">
                                <label>Service Description</label>
                                <textarea name="short_description" id="summary-ckeditor" cols="30" rows="6" class="form-control my-editor">{{$edit ? $service->short_description :old('short_description')}}</textarea>
                                @if ($errors->has('short_description'))
                                    <span class="error-message">
                                                    *{{ $errors->first('short_description') }}
                                        </span>
                                @endif

                            </div>

                            <div class="form-group col-md-12">
                                <label>Terms &  Conditions</label>
                                <textarea name="terms_and_conditions" id="summary-ckeditor2" cols="30" rows="6" class="form-control my-editor">{{$edit ? $service->terms_and_conditions :old('terms_and_conditions')}}</textarea>
                                {{--<input type="text"  class="form-control" name="short_description" id="title" value="{{$edit ? $service->short_description :old('short_description')}}">--}}
                                @if ($errors->has('terms_and_conditions'))
                                    <span class="error-message">
                                                    *{{ $errors->first('terms_and_conditions') }}
                                        </span>
                                @endif

                            </div>


                            <div class="form-group col-md-12">
                                <label>Whats Included</label>
                                <textarea name="whats_included" id="summary-ckeditor1" cols="30" rows="6" class="form-control my-editor">{{$edit ? $service->whats_included :old('whats_included')}}</textarea>
                                {{--<input type="text"  class="form-control" name="short_description" id="title" value="{{$edit ? $service->short_description :old('short_description')}}">--}}
                                @if ($errors->has('whats_included'))
                                    <span class="error-message">
                                                    *{{ $errors->first('whats_included') }}
                                        </span>
                                @endif

                            </div>




                            <div class="clearfix"></div>

                            <div class="form-footer text-right">
                                <div class="checkbox pull-left">
                                </div>
                                <button type="submit" class="btn btn-info btn-fill">{{$edit ? "Upate" : "Create"}}</button>
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

    function showOption(id) {

        if(id == 11 )
        {
            $('#options').css('display','block');
        }else{
            $('#options').css('display','none');
        }
    }
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


    function convertToSlug(title)
    {
        return title
            .toLowerCase()
            .replace(/ /g,'-')
            .replace(/&/g,'and')
            .replace(/[^\w-]+/g,'');

    }

    $('#title').on('keyup',function(){
        var title=$(this).val();
        var slug=convertToSlug(title);
        $('#slug').val(slug);
    });








</script>

<script src="{{ asset('dashboard/js/select2/select2.full.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $(".select2").select2();
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {

        $("#MyTable").on("click", "#DeleteButton", function() {
            $(this).closest("tr").remove();
        });

        var count =1;

        dynamic_field(count);

        function dynamic_field(number) {
            html ="<tr>";

            html+= "<td><input type='text'  class='form-control' placeholder='Enter Label' name='label_text[]' required></td>";


            if(number>1)
            {
                html+='<td id="DeleteButton"><i class="fa fa-trash" aria-hidden="true"></i></td>';
//                $('tbody').append(html);
                $('#MyTable').find('tbody').append(html);
            }


        }

        $('#add_another').click(function () {
            count++;
            dynamic_field(count)
        });


    })






    </script>


@endpush