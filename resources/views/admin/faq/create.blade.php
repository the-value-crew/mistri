@extends('admin.layouts.master')
@section('title', $edit ? 'Edit FAQ' :'Create FAQ')

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
                            <h4><b>{{$edit ? "Edit FAQ" : "Create FAQ"}}</b></h4>
                            <a href="{{route('faq.index')}}" class="btn btn-sm pull-right" style="margin-top: -30px"><i class="fa fa-cogs" aria-hidden="true"></i> &nbsp;Manage</a>
                            @if($edit)
                                <a href="{{route('faq.create')}}" class="btn btn-sm pull-right" style="margin-top: -30px"><span class="material-icons">add</span> &nbsp;Add</a>
                            @endif
                        </div>
                    </div>
                    <div class="card-content">

                        <form method="post" action="{{$edit ? route('faq.update',$faq->id)  : route('faq.store')}}" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            @if($edit) @method('put') @endif

                            <div class="form-group">
                                <label>Question</label>
                                <input type="text"  class="form-control" name="question" id="title" value="{{$edit ? $faq->question : old('question')}}">
                                @if ($errors->has('question'))
                                    <span class="error-message">
                                                    *{{ $errors->first('question') }}
                                        </span>
                                @endif
                            </div>


                            <div class="form-group  margin-style">
                                <label>Answer</label>
                                <textarea name="answer" id="summary-ckeditor" class="my-editor">{{$edit ? $faq->answer : old('answer')}}</textarea>
                                @if ($errors->has('answer'))
                                    <span class="error-message">
                                                    *{{ $errors->first('answer') }}
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