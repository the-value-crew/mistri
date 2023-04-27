@extends('frontend.layouts.master')

@section('title','Testimonials')

@section('content')

    <main class="common-page page--aboutus page--faq">
        <section class="testimonials">
            <div class="section-rule">
                <div class="title--wrapper section--title__margin">
                    <h2 class="title--section">Response</h2>
                    <p class="title--description">What People have to Say</p>
                </div>
                @foreach($testimonials as $testimonial)
                <article class="card--horizontal ">
                    <div class="card-top d-flex">
                        <div class="card-img">
                            <img src="{{asset('uploads/testimonial/'.$testimonial->image)}}" alt="Person name">
                        </div>
                        <div class="time">
                            <h2 class="personname">{{$testimonial->name}}</h2>
                            <time>{{$testimonial->created_at->format('M-d-Y')}}</time>
                            <div class="star">
                                <span class="material-icons">star</span><span class="material-icons">star</span><span class="material-icons">star</span><span class="material-icons">star</span><span class="material-icons">star</span>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <h3 class="card--title">{{$testimonial->title}}</h3>
                        <div class="card--description">
                            {!! $testimonial->description !!}
                        </div>
                    </div>
                </article>
                @endforeach
            </div>

        </section>

@endsection