@extends('admin.layouts.master')

@push('css')
<link rel="stylesheet" href="{{asset('dashboard/css/lightbox.min.css')}}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<style>
    .frontend-alert-message {
        position : fixed;width : auto;top : 10px;right : 20px;z-index : 9999;color : white;padding : 15px 20px;
        background : rgba(0, 255, 0, 0.9);
    }
</style>

@endpush



@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div style="margin-top: 40px">
                    <a href="{{route('city.index')}}" class="btn pull-right"><span class="material-icons">library_books</span>&nbsp;Manage All</a>

                    <a href="{{route('city.create')}}" class="btn pull-right"><span class="material-icons">library_add</span>&nbsp;Add New</a>

                </div>

                <div class="card">

                    <div class="card-header" data-background-color="">
                        <h4 class="card-title"><b>State in city {{$name}}</b></h4>
                    </div>
                    <div class="clearfix"></div>
                    <div class="card-content">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->

                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Area Name</th>

                                    <th>Actions</th>
                                </tr>
                                </thead>

                                <tfoot>
                                <tr>
                                    <th>S.No</th>
                                    <th>Area Name</th>

                                    <th>Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>

                                @foreach($areas as $area)

                                    <tr>
                                        <td>{{$loop->index+1}}</td>

                                        <td>{{$area->state}}</td>


                                        <td class="td-actions">




                                            {{--<button type="button" rel="tooltip" class="btn btn-success btn-simple" data-original-title="" title="">--}}
                                            {{--<a href=""><i class="material-icons">edit</i></a>--}}
                                            {{--<div class="ripple-container"></div>--}}
                                            {{--</button>--}}

                                            <button type="button" rel="tooltip" class="btn btn-danger btn-simple remove" value="{{$area->id}}" data-original-title="" title="">
                                                <i class="material-icons">close</i>
                                            </button>

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

    var csrf_token = $('meta[name="csrf-token"]').attr('content');

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



    /**
     * Change status
     */

    function changeStatus(status)
    {
        $.ajax({
            url:'{!!URL::to('super-admin/change-restaurant-status/')!!}' + '/' + status,
            type : "get",
            data : {'_method' : 'get'},

            success:function(response){

                console.log(response);
                $('#msg').css('display', 'block');
                $("#msg").html(response.message);
                $("#msg").fadeOut(8000);

            },
            error:function(){

            }
        });


    }

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
//            $tr = $(this).closest('tr');
//            table.row($tr).remove().draw();
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
                    url:'{!!URL::to('admin/city/')!!}' + '/' + id,
                    type : "POST",
                    data : {'_method' : 'DELETE', '_token' : csrf_token},

                    success:function(){

                        $tr = $(this).closest('tr');
                        table.row($tr).remove().draw();

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