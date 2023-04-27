@extends('admin.layouts.master')
@section('title','Service Field')

@push('css')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('dashboard/css/lightbox.min.css')}}">
@endpush

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form method="post" action="{{route('page.store')}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header" data-background-color="">

                            <div class="card-title">
                                <h4><b>Services & Services Field</b></h4>
                                <a href="{{route('service-field.create')}}" class="btn btn-sm pull-right" style="margin-top: -30px"><span class="material-icons">add</span> &nbsp;Add</a>

                            </div>
                        </div>
                        <div class="card-content">

                            <div class="material-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th style="width: 20%">Action</th>


                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Action</th>


                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($services as $service)


                                            @php
                                                $category = \App\ServiceCategory::where('id',$service)->first();
                                            @endphp

                                            @if($category->parent_id != null)
                                                @php
                                                    $parent3 = \App\ServiceCategory::where('id',$category->parent_id)->first();
                                                @endphp
                                            @endif

                                            @if($parent3 != null)
                                                @php
                                                $parent2 = \App\ServiceCategory::where('id',$parent3->parent_id)->first();
                                                @endphp
                                            @endif




                                        <tr>
                                            <td> @if($parent2 != null){{$parent2->name}} <b> ||</b> @endif{{$parent3->name}} <b> ||</b> {{$category->name}}</td>

                                            <td>
                                                <div class="col-md-4">
                                                    <a href="{{route('service-field.edit',$service)}}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>
                                                </div>
                                                <div class="col-md-1"></div>
                                                <div class="col-md-3">

                                                    <button class="btn btn-danger btn-sm remove" value="{{$service}}"> <i class="fa fa-trash-o"></i> </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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






</script>




<script type="text/javascript">
    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });


        var table = $('#datatables').DataTable();

        // Edit record
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');

            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function(e) {

            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();

            var id = $(this).val();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');

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
                    url:'{!!URL::to('admin/service-field/')!!}' + '/' + id,
                    type : "POST",
                    data : {'_method' : 'DELETE', '_token' : csrf_token},

                    success:function(){



                        console.log('success');
                        location.reload();


                    },
                    error:function(){
                        swal({
                            title: 'Oops...',
                            text: data.message,
                            type: 'error',
                            timer: '1500'
                        })
                    }
                });

            });



        });

        //Like record
        table.on('click', '.like', function() {
            alert('You clicked on Like button');
        });

        $('.card .material-datatables label').addClass('form-group');
    });
</script>



@endpush