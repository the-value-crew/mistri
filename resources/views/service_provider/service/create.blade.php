@extends('service_provider.layouts.master')
@section('title', 'Add Service')

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

                @if(Session::has('error_message'))

                    <div class="alert alert-danger">
                        <p>{{Session::get('error_message')}}</p>
                    </div>
                @endif
                <div class="card">
                    <form method="post" action="{{route('my-service.store')}} " class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header" data-background-color="">

                            <div class="card-title">
                                <h4><b>Send request to Admin to add service </b></h4>
                            </div>
                        </div>
                        <div class="card-content">


                            <div class="form-group" style="margin-top:18px;">
                                <label>Select Service</label>
                                <select class="form-control select2 select2-hidden-accessible" name="service_id"  data-placeholder="Select Service" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        @foreach($services as $service)
                                        <option value="{{$service->id}}">{{$service->name}}</option>
                                        @endforeach

                                </select>
                            </div>

                           


                            <div class="form-group">
                                <label>Any Message</label>
                                <textarea name="message"  id="description-ckeditor" cols="30" rows="6" class="form-control my-editor"></textarea>
                                {{--<input type="text"  class="form-control" name="short_description" id="title" value="{{$edit ? $service->short_description :old('short_description')}}">--}}
                                @if ($errors->has('short_description'))
                                    <span class="error-message">
                                                    *{{ $errors->first('short_description') }}
                                        </span>
                                @endif


                            </div>

                            <div class="form-group">
                                <label>Attach additional document (if required)</label>
                            </div>

                            <input type="file" name="document">

                            <br><br>
                            <span style="color:crimson">*You will be able to provide this service only after admin approval. You will be informed after admin approval.</span>


                            <div class="form-footer text-right">
                                <div class="checkbox pull-left">
                                </div>
                                <button type="submit" class="btn btn-info btn-fill">Send Request</button>
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





    })

</script>

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description-ckeditor');
</script>


@endpush