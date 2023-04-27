@extends('admin.layouts.master')
@section('title','Service Category')

@push('css')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="{{asset('dashboard/css/lightbox.min.css')}}">
<style>
    .menu .accordion-heading {  position: relative; }
    .menu .accordion-heading .edit {
        position: absolute;
        top: 8px;
        right: 30px;
    }
    .menu .area { border-left: 4px solid #00bcd4 }
    .menu .equipamento { border-left: 4px solid #65c465; }
    .menu .ponto { border-left: 4px solid #f38787; }
    .menu .collapse.in { overflow: visible; }

    .accordion-group {
        margin-bottom: 2px;
        border: none;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
    }
</style>

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
                                <h4><b>All Service Category</b></h4>
                                <a href="{{route('service-category.create')}}" class="btn btn-sm pull-right" style="margin-top: -30px"><span class="material-icons">add</span> &nbsp;Add</a>

                            </div>
                        </div>
                        <div class="card-content">

                            <div class="material-datatables">

                                @foreach($categories as $category)

                                    <div class="menu service-category" style="margin-bottom: 20px">
                                        <div class="accordion">
                                            <!-- Áreas -->
                                            <div class="accordion-group">
                                                <!-- Área -->
                                                <div class="accordion-heading area">
                                                    <a class="accordion-toggle" data-toggle="collapse" href="#area-{{$category->id}}">{{$category->name}}</a>

                                                    <div class="edit">
                                                        <a  href="{{route('service-category.edit',$category->id)}}" style="font-style: italic"><i class="fa fa-edit"></i></a>
                                                        <a  onclick="deleteData({{$category->id}})" style="color: red"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </div><!-- /Área -->

                                                <div class="accordion-body collapse" id="area-{{$category->id}}">
                                                    <div class="accordion-inner">
                                                        <div class="accordion" id="equipamento1">
                                                            <!-- Equipamentos -->

                                                            <div class="accordion-group">
                                                                @php
                                                                    $firstLevels = \App\ServiceCategory::where('parent_id',$category->id)->get();
                                                                @endphp

                                                                @foreach($firstLevels as $firstLevel)
                                                                    <div class="accordion-heading equipamento">
                                                                        <a class="accordion-toggle" data-parent="#equipamento1-1" data-toggle="collapse" href="#ponto1-1{{$firstLevel->id}}">{{$firstLevel->name}}</a>

                                                                        <div class="dropdown edit">
                                                                            <a   href="{{route('service-category.edit',$firstLevel->id)}}" style="font-style: italic"><i class="fa fa-edit"></i></a>
                                                                            <a  onclick="deleteData({{$firstLevel->id}})" style="color: red"><i class="fa fa-trash"></i> </a>
                                                                        </div>
                                                                    </div><!-- Pontos -->
                                                                    <br>

                                                                    <div class="accordion-body collapse" id="ponto1-1{{$firstLevel->id}}">
                                                                        <div class="accordion-inner">
                                                                            <div class="accordion" id="servico1">
                                                                                @php
                                                                                    $secondLevels = \App\ServiceCategory::where('parent_id',$firstLevel->id)->get();
                                                                                @endphp
                                                                                @foreach($secondLevels as $secondLevel)
                                                                                    <div class="accordion-group">
                                                                                        <div class="accordion-heading ponto">
                                                                                            <a class="accordion-toggle" data-parent="#servico1-1-1" data-toggle="collapse" href="#servico1-{{$secondLevel->id}}">{{$secondLevel->name}}</a>
                                                                                            <div class="dropdown edit">
                                                                                                <a  href="{{route('service-category.edit',$secondLevel->id)}}" style="font-style: italic"><i class="fa fa-edit"></i></a>
                                                                                                <a  onclick="deleteData({{$secondLevel->id}})" style="color: red"><i class="fa fa-trash"></i></a>
                                                                                            </div>
                                                                                        </div><!-- Serviços -->

                                                                                        <div class="accordion-body collapse" id="servico1-{{$secondLevel->id}}">
                                                                                            @php
                                                                                                $thirdLevels = \App\ServiceCategory::where('parent_id',$secondLevel->id)->get();
                                                                                            @endphp
                                                                                            <div class="accordion-inner">
                                                                                                <ul class="nav nav-list">
                                                                                                    @foreach($thirdLevels as $thirdLevel)
                                                                                                        <li>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-10">
                                                                                                                    <a href=
                                                                                                                       "#"><i class=
                                                                                                                              "icon-chevron-right">
                                                                                                                        </i> {{$thirdLevel->name}} </a>
                                                                                                                </div>
                                                                                                                <div class="col-md-2">
                                                                                                                    <div class="dropdown edit">
                                                                                                                        <a  href="{{route('service-category.edit',$thirdLevel->id)}}" style="font-style: italic"><i class="fa fa-edit"></i></a>
                                                                                                                        <a  onclick="deleteData({{$thirdLevel->id}})" style="color: red"><i class="fa fa-trash"></i></a>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>


                                                                                                        </li>
                                                                                                    @endforeach
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div><!-- /Serviços -->
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                    </div><!-- /Pontos -->
                                                                @endforeach
                                                            </div><!-- /Equipamentos -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- /accordion -->
                                    </div>

                                    {{--<hr class="service-category-hr">--}}
                                    <br>

                                @endforeach

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
                    url:'{!!URL::to('admin/page/')!!}' + '/' + id,
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