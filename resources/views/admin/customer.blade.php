@extends('admin.layouts.master')
@section('title','Customers')

@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12 col-lg-12">
                <p class="alert alert-success" id="msg" style="display: none"></p>
            </div>

            <div class="col-md-12">
                <div class="card">

                    <div class="card-header" data-background-color="">

                        <div class="card-title">
                            <h4><b>All Customers</b></h4>
                        </div>
                    </div>
                    <div class="card-content">

                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th style="width: 5%">S.No</th>
                                    <th style="width: 15%">Name</th>
                                    <th style="width: 15%">Email</th>
                                    <th style="width: 15%">Phone</th>
                                    <th style="width: 40%">Address</th>
                                    <th style="width: 10%">Action</th>


                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Action</th>


                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($customers as $customer)
                                    <tr>
                                        <td>{{$loop->index +1}}</td>
                                        <td>{{$customer->name}}</td>
                                        <td>{{$customer->email}}</td>
                                        <td>{{$customer->phone}}</td>
                                        <td>
                                            @if($customer->userdetail)
                                                @if($customer->userdetail->flat_number != null)
                                                Flat No {{$customer->userdetail->flat_number}}, {{$customer->userdetail->fulladdress}}
                                                @endif
                                                @if($customer->userdetail->additional_direction != null)
                                                <br>
                                                Additional Direction: {{$customer->userdetail->additional_direction}}
                                                @endif
                                            @endif

                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-sm remove" value="{{$customer->id}}"> <i class="fa fa-trash-o"></i> </button>
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
                    url:'{!!URL::to('admin/customer/')!!}' + '/' + id,
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