@extends('admin.layouts.master')
@section('title','Service Enquiry')

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

                    <div class="card-header" data-background-color="">

                        <div class="card-title">
                            <h4><b>Service Enquiry</b></h4>

                        </div>
                    </div>
                    <div class="card-content">

                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th style="width: 20%">Action</th>


                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th style="width: 20%">Action</th>

                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($enquiries as $enquiry)
                                    <tr>
                                        <td>{{$loop->index +1}}</td>
                                        <td>{{$enquiry->name}}</td>
                                        <td>
                                            {{$enquiry->email}}
                                        </td>
                                        <td>
                                            {{$enquiry->subject}}
                                        </td>
                                        <td>
                                            <div class="col-md-4">
                                                <a href="{{route('service-enquiry.show',$enquiry->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> </a>
                                            </div>
                                            <div class="col-md-1"></div>
                                            <div class="col-md-3">

                                                <button class="btn btn-danger btn-sm remove" value="{{$enquiry->id}}"> <i class="fa fa-trash-o"></i> </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>



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
                    url:'{!!URL::to('admin/service-enquiry/')!!}' + '/' + id,
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