@extends('admin.layouts.master')
@section('title', $edit ? 'Edit Service Category' :'Create Service Category')

@push('css')
<link rel="stylesheet" href="{{asset('dashboard/css/select2/select2.min.css')}}">

<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form method="post" action="{{route('service-category.store')}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header" data-background-color="">

                            <div class="card-title">
                                <h4><b>Create Service Category</b></h4>
                                <a href="{{route('service-category.index')}}" class="btn btn-sm pull-right" style="margin-top: -30px"><i class="fa fa-cogs" aria-hidden="true"></i> &nbsp;Manage</a>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="form-group label-floating is-empty">
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">

                                            <img src="{{asset('dashboard/img/placeholder.jpg')}}" id="image" class="img-thumbnail img-responsive" alt="">

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
                                <br>

                                @if ($errors->has('image'))
                                    <span class="error-message">
                                                    *{{ $errors->first('image') }}
                                        </span>
                                @endif
                            </div>

                            {{--<div class="form-group" style="margin-top:18px;">--}}
                                {{--<label>Select Category</label>--}}
                                {{--<select class="form-control select2 select2-hidden-accessible" name="category_id"  data-placeholder="Select Category" style="width: 100%;" tabindex="-1" aria-hidden="true">--}}
                                    {{--<option value=" ">Select Category  <b>(If not parent category)</b></option>--}}
                                    {{--@foreach ($categories as $category)--}}
                                        {{--<option value="{{$category->id}}">{{$category->name}}</option>--}}
                                        {{--@php $sub_categories = \App\ServiceCategory::where('parent_id',$category->id)->get(); @endphp--}}
                                        {{--@foreach($sub_categories as $sub_category)--}}
                                            {{--<option value="{{$sub_category->id}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -- &nbsp{{$sub_category->name}}</option>--}}
                                            {{--@php $sub_subs = \App\ServiceCategory::where('parent_id',$sub_category->id)->get(); @endphp--}}
                                            {{--@foreach($sub_subs as $sub_sub)--}}
                                                {{--<option value="{{$sub_sub->id}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -- &nbsp{{$sub_sub->name}}</option>--}}
                                                {{--@php $sub_level4s = \App\ServiceCategory::where('parent_id',$sub_sub->id)->get(); @endphp--}}
                                                {{--@foreach($sub_level4s as $sub_level4)--}}
                                                    {{--<option value="{{$sub_level4->id}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -- &nbsp{{$sub_level4->name}}</option>--}}
                                                {{--@endforeach--}}
                                            {{--@endforeach--}}
                                        {{--@endforeach--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--</div>--}}

                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text"  class="form-control" name="name" id="title" value="{{old('name')}}">
                                @if ($errors->has('name'))
                                    <span class="error-message">
                                                    *{{ $errors->first('name') }}
                                        </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text"  class="form-control" name="slug" id="slug" value="{{old('slug')}}">
                                @if ($errors->has('slug'))
                                    <span class="error-message">
                                                    *{{ $errors->first('slug') }}
                                        </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Priority</label>
                                <input type="text"  class="form-control" name="priority"  value="{{old('priority')}}">
                                @if ($errors->has('priority'))
                                    <span class="error-message">
                                                    *{{ $errors->first('priority') }}
                                        </span>
                                @endif
                            </div>


                            <div class="form-group">
                                <div class="togglebutton">
                                    <label class="lead" style="color:black;font-weight:bold;font-size:11pt;">
                                        <input type="checkbox" name="feature" checked>Feature
                                    </label>
                                </div>
                            </div>


                            <div class="form-footer text-right">
                                <div class="checkbox pull-left">
                                </div>
                                <button type="submit" class="btn btn-info btn-fill">{{"Create"}}</button>
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
@endpush