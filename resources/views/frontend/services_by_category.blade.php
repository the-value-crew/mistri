@extends('frontend.layouts.master')
@section('title',$category->name.'Service')
@section('content')
    <main class="common-page page--category">

        <section class="service">
            <div class="section-rule">
                <div class="title--wrapper ">
                    <h2 class="title--section">Our Service</h2>
                    <p class="title--description">What help do you need ?</p>
                </div>

                <!-- moving -->
                <div class="title--category ">
                    <div class="body">
                        <h2 class="title--section">{{$category->name}}</h2>
                        <p class="title--description">{{$category->sub_text}}</p>
                    </div>

                </div>




                <div class="row">
                    @foreach($category->services as $service)
                    <article class="col-12 col-sm-6 col-lg-3">
                        <a href="{{route('book.service',['slug'=>$service->slug,'category_id'=>$category->id])}}" class="card">
                            <div class="card--img">
                                <img src="{{asset('uploads/service/'.$service->image)}}" alt=" card-title">
                            </div>
                            <div class="card__body">
                                <h2 class="card--title">{{$service->name}}</h2>
                            </div>
                        </a>
                    </article>
                   @endforeach
                </div>
            </div>

        </section>

        <section class="about">
            <div class="section-rule">
                <div class="title--wrapper section--title__margin">
                    <h2 class="title--section">How it works</h2>
                    <p class="title--description">We have partnered with Dubai's best companies to get you the service you deserve .</p>
                </div>
                <div class="row">
                    <article class="col-6 col-lg-4">
                        <div  class="card--sm">
                            <div class="card--img">
                                <img src="{{asset('gallery/day53-farm-removebg-preview.png')}}" alt=" card-title">
                                {{--<span class="count">01.</span>--}}
                            </div>

                            <h2 class="card--title">Tell us What you Need</h2>
                            <div class="card--description"><p>Let us know what service you are looking for. We offer more than 100 different services, and we are here to help.</p>
                            </div>

                        </div>
                    </article>
                    <article class="col-6 col-lg-4">
                        <div  class="card--sm">
                            <div class="card--img">
                                <img src="{{asset('gallery/2747193.png')}}" alt=" card-title">
                                {{--<span class="count">02.</span>--}}
                            </div>
                            <h2 class="card--title">We will find the right professional</h2>
                            <div class="card--description"><p>Book your service directly with us online, or request quotes from our Wide Range of Licensed service partners.</p>
                            </div>

                        </div>
                    </article>
                    <article class="col-12 col-lg-4">
                        <div  class="card--sm">
                            <div class="card--img">
                                <img src="{{asset('gallery/2427279-removebg-preview.png')}}" alt=" card-title">
                                {{--<span class="count">03.</span>--}}
                            </div>
                            <h2 class="card--title">Sit back and relax</h2>
                            <div class="card--description"><p> Let our professionals do the work while you focus on doing what you love. Our contact center is open 7 days a week to help you along the way.</p>
                            </div>

                        </div>
                    </article>
                </div>
            </div>
        </section>



    </main>
@endsection