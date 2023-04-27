@extends('admin.layouts.master')
@section('title',"Subscribtion Plan")

@push('css')

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
                    <form method="post" action="{{$edit ? route('subscription-plan.update',$plan->id)  : route('subscription-plan.store')}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @if($edit) @method('put') @endif
                        <div class="card-header" data-background-color="">

                            <div class="card-title">
                                <h4><b>{{$edit ? ("Edit Subscribtion Plan - ".$plan->name):("Create Subscribtion Plan")}}</b></h4>
                                <a href="{{route('subscription-plan.index')}}" class="btn btn-sm pull-right" style="margin-top: -30px"><i class="fa fa-cogs" aria-hidden="true"></i> &nbsp;Manage</a>
                                @if($edit)
                                    <a href="{{route('subscription-plan.create')}}" class="btn btn-sm pull-right" style="margin-top: -30px"><span class="material-icons">add</span> &nbsp;Add</a>
                                @endif
                            </div>
                        </div>
                        <div class="card-content">




                            <div class="form-group col-md-4">
                                <label>Name</label>
                                <input type="text"  class="form-control" name="name" id="title" value="{{$edit ? $plan->name :old('name')}}">
                                @if ($errors->has('name'))
                                    <span class="error-message">
                                                    *{{ $errors->first('name') }}
                                        </span>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label>Slug</label>
                                <input type="text"  class="form-control" name="slug" id="slug" value="{{$edit ? $plan->slug :old('slug')}}">
                                @if ($errors->has('slug'))
                                    <span class="error-message">
                                                    *{{ $errors->first('slug') }}
                                        </span>
                                @endif
                            </div>


                            <div class="form-group col-md-4">
                                <label>Price (AED)</label>
                                <input type="text"  class="form-control" name="price"  value="{{$edit ? $plan->price :old('price')}}">
                                @if ($errors->has('price'))
                                    <span class="error-message">
                                                    *{{ $errors->first('price') }}
                                        </span>
                                @endif
                            </div>



                            <div class="form-group col-md-12">
                                <label>Subscribtion Plan  Description</label>
                                <textarea name="description" id="summary-ckeditor" cols="30" rows="6" class="form-control my-editor">{{$edit ? $plan->description :old('description')}}</textarea>
                                @if ($errors->has('description'))
                                    <span class="error-message">
                                                    *{{ $errors->first('description') }}
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