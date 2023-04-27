@extends('admin.layouts.master')
@section('title',"Edit Slider")

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
                            <h4><b>Edit Slider</b></h4>

                        </div>
                    </div>
                    <div class="card-content">

                        <form method="post" action="{{ route('slider.update',$slider->id)}}" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group label-floating is-empty">
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="{{asset('uploads/slider/'.$slider->image)}}" id="image" class="img-thumbnail img-responsive" alt="">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Change Image</span>
                                                        <span class="fileinput-exists">Change </span>
                                                        <input type="file" name="image" id="image" />
                                                    </span>
                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Slider Title</label>
                                <input type="text"  class="form-control" name="title" id="title" value="{{$slider->title}}">
                                @if ($errors->has('title'))
                                    <span class="error-message">
                                                    *{{ $errors->first('title') }}
                                        </span>
                                @endif
                            </div>

                            <br><br><br>

                            <hr>
                            <b>Edit Slider Text</b>
                            <hr>

                            <div class="form-group">
                                <label>Slider Text-1</label>
                                <input type="text"  class="form-control" name="text1" id="title" value="{{$slider_text[0]->text}}">
                                @if ($errors->has('title'))
                                    <span class="error-message">
                                                    *{{ $errors->first('title') }}
                                        </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Slider Text-2</label>
                                <input type="text"  class="form-control" name="text2" id="title" value="{{$slider_text[1]->text}}">
                                @if ($errors->has('title'))
                                    <span class="error-message">
                                                    *{{ $errors->first('title') }}
                                        </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Slider Text-3</label>
                                <input type="text"  class="form-control" name="text3" id="title" value="{{$slider_text[2]->text}}">
                                @if ($errors->has('title'))
                                    <span class="error-message">
                                                    *{{ $errors->first('title') }}
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







    var editor_config = {
        path_absolute : "/",
        selector: "textarea.my-editor",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern imagetools"
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | emoticons | forecolor backcolor ',
        image_advtab: true,
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",

        relative_urls: false,

        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
            });
        }
    };

    tinymce.init(editor_config);
</script>

@endpush