@extends('admin.layouts.master')
@section('title','Sub Category of '.$cat->name)

@push('css')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="{{asset('dashboard/css/lightbox.min.css')}}">
@endpush

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="alert alert-success" id="msg" style="display: none"></div>
                <div class="alert alert-danger" id="msg1" style="display: none"></div>

            </div>


            <div class="col-md-12">
                <div class="card">
                    <form method="post" action="{{route('page.store')}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header" data-background-color="">

                            <div class="card-title">
                                <h4><b>All Sub Category of {{$cat->name}}</b></h4>
                                @if($cat->parent_id == null)
                                    <a href="{{route('service-category.index')}}" class="btn btn-sm pull-right" style="margin-top: -30px"><i class="fa fa-cogs" aria-hidden="true"></i> &nbsp;Manage</a>
                                    <a href="{{route('create.subcategory',$cat->id)}}" class="btn btn-sm pull-right" style="margin-top: -30px"><span class="material-icons">add</span> &nbsp;Add Sub Category of {{$cat->name}}</a>
                                @else
                                    <a href="{{route('service-category.show',$cat->parent_id)}}" class="btn btn-sm pull-right" style="margin-top: -30px"><i class="fa fa-cogs" aria-hidden="true"></i> &nbsp;Manage</a>
                                    <a href="{{route('create.subcategory',$cat->id)}}" class="btn btn-sm pull-right" style="margin-top: -30px"><span class="material-icons">add</span> &nbsp;Add Sub Category of {{$cat->name}}</a>
                                @endif
                            </div>
                        </div>
                        <div class="card-content">

                            <div class="material-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Feature</th>
                                        <th>Action</th>


                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Feature</th>
                                        <th>Action</th>


                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{$loop->index +1}}</td>
                                            <td>{{$category->name}}
                                                <br>
                                                @if(count($category->children) >0)
                                                    <a href="{{route('service-category.show',$category->id)}}" style="font-size: 12px" title="See All Sub Category of {{$category->name}}"> Sub Category({{count($category->children)}}) : <i class="fa fa-eye"></i></a>

                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{asset('uploads/servicecategory/'.$category->image)}}" data-lightbox="example{{$category->id}}"><img class="img-style" src="{{asset('uploads/servicecategory/'.$category->image)}}"  /></a>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <div class="togglebutton">
                                                        <label class="lead" style="color:black;font-weight:bold;font-size:11pt;">
                                                            <input type="checkbox" name="feature" @if($category->feature == "on") checked @endif  onchange="changeStatus({{$category->id}})">
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>

                                                <a href="{{route('create.subcategory',$category->id)}}" class="btn btn-success asdh-btn-small " title="Add Sub Category to {{$category->name}}"> <i class="fa fa-plus"></i> </a>



                                                <a href="{{route('service-category.edit',$category->id)}}" class="btn btn-primary asdh-btn-small " title="Edit Category  {{$category->name}}"> <i class="fa fa-edit"></i> </a>




                                                <button class="btn btn-danger asdh-btn-small  remove" value="{{$category->id}}"> <i class="fa fa-trash-o"></i> </button>

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



    function changeStatus(status)
    {
        $.ajax({
            url:'{!!URL::to('admin/service-category/changestatus')!!}' + '/' + status,
            type : "POST",
            data : {'_method' : 'PUT', '_token' : csrf_token},

            success:function(response){

                console.log(response);
                $('#msg').css('display', 'block');
                $("#msg").html(response.message);
                $("#msg").fadeOut(8000);
                location.reload();
            },
            error:function(){

            }
        });


    }

    function changePriority(value,id) {


        $.ajax({
            url:'{!!URL::to('admin/service-category/changepriority')!!}' + '/' + value + '/' + id,
            type : "POST",
            data : {'_token' : csrf_token},

            success:function(response){

                console.log(response);
                if(response.message)
                {
                    $('#msg').css('display', 'block');
                    $("#msg").html(response.message);
                    $("#msg").fadeOut(8000);
                    location.reload();

                }else{

                    $('#msg1').css('display', 'block');
                    $("#msg1").html(response.message1);
                    $("#msg1").fadeOut(8000);
                    location.reload();

                }

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
                    url:'{!!URL::to('admin/service-category/')!!}' + '/' + id,
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

    function deleteData(id) {
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
                url:'{!!URL::to('admin/service-category/')!!}' + '/' + id,
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

    }

</script>



@endpush