@extends('frontend.layouts.master')

@section('title','View All Service Category')

@section('content')
    <main class="common-page page--category">

        <section class="service">
            <div class="title--wrapper page__title">
                <h2 class="title--section">Our Service</h2>
                <p class="title--description">What help do you need ?</p>
            </div>
            <div class="section-rule pt-0">



                <!-- cleaning -->
                @foreach($service_categories as $all_category)

                    @if(count($all_category->children)>0 || count($all_category->services)>0 )
                            <div class="service--wrapper">

                                <div class="title--category ">
                                    <div class="body">
                                        <h2 class="title--section">{{$all_category->name}}</h2>
                                        {{--<p class="title--description">Fully Insurance</p>--}}
                                    </div>
                                </div>

                                <div class="row">
                                    @foreach($all_category->children as $child)
                                        <article class="col-12 col-sm-6 col-lg-3">
                                            <a href="{{route('sub.categories',['slug'=>$child->slug])}}"  class="card">
                                                <div class="card--img">
                                                    <img src="{{asset('uploads/servicecategory/'.$child->image)}}" alt=" card-title">
                                                </div>
                                                <div class="card__body">
                                                    <h2 class="card--title">{{$child->name}}</h2>
                                                </div>
                                            </a>
                                        </article>
                                    @endforeach

                                    @foreach($all_category->services as $service1)
                                        <article class="col-12 col-sm-6 col-lg-3">
                                            <a href="{{route('book.service',['slug'=>$service1->slug,'category_id'=>$all_category->id])}}" class="card">
                                                <div class="card--img">
                                                    <img src="{{asset('uploads/service/'.$service1->image)}}" alt=" card-title">
                                                </div>
                                                <div class="card__body">
                                                    <h2 class="card--title">{{$service1->name}}</h2>
                                                </div>
                                            </a>
                                        </article>
                                    @endforeach

                                </div>

                            </div>
                        @endif


                @endforeach


            </div>

        </section>

    </main>

    @endsection