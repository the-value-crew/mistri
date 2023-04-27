@extends('admin.layouts.master')
@section('title', $edit ? 'Edit Page' :'Create Page')

@push('css')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

@endpush

@section('content')
    <div class="container-fluid">

        <div class="row rowstyle">
            <div class="col-md-12">
                <div class="card">

                        <div class="card-head" data-background-color="">

                            <div class="card-title">
                                <h4><b>{{$edit ? "Edit Page" : "Create Page"}}</b></h4>
                                <a href="{{route('page.index')}}" class="btn btn-sm pull-right" style="margin-top: -30px"><i class="fa fa-cogs" aria-hidden="true"></i> &nbsp;Manage</a>
                                @if($edit)
                                <a href="{{route('page.create')}}" class="btn btn-sm pull-right" style="margin-top: -30px"><span class="material-icons">add</span> &nbsp;Add</a>
                                @endif
                            </div>
                        </div>
                        <div class="card-content">

                            <form method="post" action="{{$edit ? route('page.update',$page->id)  : route('page.store')}}" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                @if($edit) @method('put') @endif
                            <div class="form-group label-floating is-empty">
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        @if($edit)
                                            <img src="{{asset('uploads/page/'.$page->image)}}" id="image" class="img-thumbnail img-responsive" alt="">
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
                            <div class="form-group">
                                <label>Page Title</label>
                                <input type="text"  class="form-control" name="title" id="title" value="{{$edit ? $page->title : old('title')}}">
                                @if ($errors->has('title'))
                                <span class="error-message">
                                                    *{{ $errors->first('title') }}
                                        </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text"  class="form-control" name="slug" id="slug" value="{{$edit ? $page->slug : old('slug')}}">
                                @if ($errors->has('slug'))
                                    <span class="error-message">
                                                    *{{ $errors->first('slug') }}
                                        </span>
                                @endif
                            </div>

                            <div class="form-group  margin-style">
                                <label>Description</label>
                                <textarea name="description"  id="summary-ckeditor" class="my-editor">{{$edit ? $page->description : old('description')}}</textarea>
                                @if ($errors->has('description'))
                                    <span class="error-message">
                                                    *{{ $errors->first('description') }}
                                        </span>
                                @endif
                            </div>

                            <div class="form-footer text-right">
                                <div class="checkbox pull-left">
                                </div>
                                <button type="submit" class="btn btn-info btn-fill">{{$edit ? "Update" : "Create"}}</button>
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

@endpush