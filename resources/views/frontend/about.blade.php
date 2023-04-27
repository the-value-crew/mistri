@extends('frontend.layouts.master')

@section('title','About Us')

@section('content')

    <main class="common-page page--aboutus">
        <div class="screen mb-0">
            <div class="section-rule">

                <div class="row">
                    <div class="col-sm-7 p-0">
                        <div class="wrapper">
                            <div class="title--wrapper ">
                                <h2 class="title--section">{{$about->title}}</h2>
                            </div>
                            <div class="paragraph" style="text-align: justify">
                                {!! $about->description !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 p-0">
                        <img src="{{asset('uploads/page/'.$about->image)}}" alt="about-us-img">
                    </div>
                </div>
            </div>

        </div>
        <div class="mission">
            <div class="section-rule">
                <div class="title--wrapper ">
                    <h2 class="title--section">Our Mission</h2>
                </div>
                <div class="row comments--collection">

                    @foreach($missions as $mission)
                    <div class="col-sm-6">
                        <div class="title--description ">
                            {!! $mission->text !!}
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>

@endsection