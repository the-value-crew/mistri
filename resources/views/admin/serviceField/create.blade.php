@extends('admin.layouts.master')
@section('title', $edit ? 'Edit Service Field' :'Create Service Field')

@push('css')
<link rel="stylesheet" href="{{asset('dashboard/css/select2/select2.min.css')}}">

<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form method="post" action="{{route('service-field.store')}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header" data-background-color="">

                            <div class="card-title">
                                <h4><b>Create Service Field</b></h4>
                                <a href="{{route('service-field.index')}}" class="btn btn-sm pull-right" style="margin-top: -30px"><i class="fa fa-cogs" aria-hidden="true"></i> &nbsp;Manage</a>
                            </div>
                        </div>
                        <div class="card-content">


                            <div class="form-group" style="margin-top:18px;">
                            <label>Select Category for service</label>
                            <select class="form-control select2 select2-hidden-accessible" name="service_category_id"  data-placeholder="Select Category" style="width: 100%;" tabindex="-1" aria-hidden="true">
                            <option value=" ">Select Category for service</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
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


                            <br><br><br>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Select Input Type</label>
                                    <select class="form-control select2 select2-hidden-accessible" id="input_type" onchange="showOption(this.value)" name="input_type"  data-placeholder="Select Category"  data-style="select-with-transition" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        <option value=" ">Select Category for service</option>
                                        @foreach ($input_types as $input_type)
                                            <option value="{{$input_type->id}}">{{$input_type->name}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('input_type'))
                                        <span class="error-message">
                                            *{{ $errors->first('input_type') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Required</label>
                                    <select class="form-control select2 select2-hidden-accessible" name="required"  data-placeholder="Select Category" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                    @if ($errors->has('required'))
                                        <span class="error-message">
                                                    *{{ $errors->first('required') }}
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Label</label>
                                    <input type="text"  class="form-control" name="label" id="title" value="{{old('label')}}">
                                    @if ($errors->has('label'))
                                        <span class="error-message">
                                                    *{{ $errors->first('label') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-3" style="display: none" id="options">
                                <div class="form-group">
                                    <label>Options</label>
                                    <input type="text"  class="form-control" name="options" id="title" value="{{old('name')}}" placeholder="option1 , otion2 , option3">
                                    @if ($errors->has('options'))
                                        <span class="error-message">
                                                    *{{ $errors->first('options') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="clearfix"></div>

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
@endpush