@extends('frontend.layouts.master')

@section('title','How It Work')

@section('content')

    <main class="common-page page--aboutus page--category page--works">

        <section class="about">
            <div class="section-rule">
                <div class="title--wrapper section--title__margin">
                    <h2 class="title--section">This is how it works</h2>
                    <p class="title--description">We have partnered with Dubai's best companies to get you the service you deserve .</p>
                </div>
                <div class="row ">
                    <article class="col-md-6">
                        @foreach($works as $key=>$work)
                        <div class="card--sm card__hr">
                            <h3 class="count">0{{++$key}}</h3>
                            <div class="card__body">
                                <h2 class="card--title">{{$work->title}}</h2>
                                <div class="card--description">
                                    {!! $work->description !!}
                                </div>
                            </div>


                        </div>
                        @endforeach
                    </article>
                    <article class="col-md-6">
                        <div class="img__wrapper">
                            <img src="./gallery/2427279-removebg-preview.png" alt="">
                            <h2 class="title--section ">24/7 Customer Service</h2>
                        </div>


                    </article>
                </div>
            </div>
        </section>
    </main>

@endsection