@extends('admin.layouts.master')
@section('title', "General Enquiry")


@section('content')
    <div class="container-fluid">

        <div class="row rowstyle">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-head" data-background-color="">

                        <div class="card-title">
                            <h4><b>General Enquiry by {{$enquiry->name}}</b></h4>
                            <a href="{{route('general-enquiry.index')}}" class="btn btn-sm pull-right" style="margin-top: -30px"><i class="fa fa-cogs" aria-hidden="true"></i> &nbsp;Manage</a>

                        </div>
                    </div>
                    <div class="card-content">


                            <div class="form-group col-md-6">
                                <label>Name</label>
                                <input type="text"  class="form-control" name="title" id="title" value="{{$enquiry->name}}" readonly>

                            </div>
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="text"  class="form-control" name="slug" id="slug" value="{{$enquiry->email}}" readonly>

                            </div>

                        <div class="form-group col-md-12">
                            <label>Subject</label>
                            <input type="text"  class="form-control" name="slug" id="slug" value="{{$enquiry->subject}}" readonly>

                        </div>


                            <div class="form-group  margin-style">
                                <label>Message</label>
                                <blockquote style="font-size: 1em;font-weight: 400">
                                    {{$enquiry->message}}
                                </blockquote>
                            </div>





                    </div>

                </div>

            </div>
        </div>

    </div>

@endsection

