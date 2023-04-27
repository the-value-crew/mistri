@extends('admin.layouts.master')
@section('title','Edit Textarea Field')
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

        <div class="row rowstyle">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-head" data-background-color="">

                        <div class="card-title">
                            <h4><b>Edit Textarea Field </b></h4>
                            <a href="{{route('edit.form',['id'=>$textareafield->service_id,'slug'=>\Illuminate\Support\Str::slug($textareafield->service->name)])}}" class="btn btn-sm pull-right" style="margin-top: -30px"><span class="material-icons">keyboard_return</span> &nbsp;Back</a>

                        </div>
                    </div>
                    <div class="card-content">

                        <form method="post" action="{{route('update.textareafield',$textareafield->id)}}" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label>Label for form</label>
                                <input type="text"  class="form-control" name="label_for_form" id="title" value="{{$textareafield->label_for_form}}">
                                @if ($errors->has('label_for_form'))
                                    <span class="error-message">
                                                    *{{ $errors->first('label_for_form') }}
                                        </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Label for invoice</label>
                                <input type="text"  class="form-control" name="label_for_invoice" id="title" value="{{$textareafield->label_for_invoice}}">
                                @if ($errors->has('label_for_invoice'))
                                    <span class="error-message">
                                                    *{{ $errors->first('label_for_invoice') }}
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

</script>

@endpush