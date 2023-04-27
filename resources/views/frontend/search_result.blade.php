@extends('frontend.layouts.master')

@section('title','Search Result')

@section('content')

    <main class="common-page page--category">

        <section class="service">
            <div class="section-rule">
                <div class="title--wrapper ">
                    <h2 class="title--section">Search Results</h2>
                    {{--<p class="title--description">What help do you need ?</p>--}}
                </div>

                @if(count($results['services'])>0||count($results['service_categories'])>0|| count($results['service_providers'])>0)
                       @if(count($results['services'])>0||count($results['service_categories'])>0)
                        <div class="title--category ">
                            <div class="body">
                                <h2 class="title--section">Services</h2>
                                {{--<p class="title--description">Fully Insurance</p>--}}
                            </div>
                        </div>
                       @endif

                        <div class="row">
                            @foreach($results['services'] as $key=>$service)
                            <article class="col-12 col-sm-6 col-lg-3">
                                <a href="{{route('book.service',['slug'=>$service->slug,'category_id'=>$service->service_category->id])}}"class="card">
                                    <div class="card--img">
                                        <img src="{{asset('uploads/service/'.$service->image)}}" alt=" card-title">
                                    </div>
                                    <div class="card__body">
                                        <h2 class="card--title">{{$service->name}}</h2>
                                    </div>
                                </a>
                            </article>
                            @endforeach

                                @foreach($results['service_categories'] as $key=>$service_category)
                                    @if(count($service_category->children)>0 || count($service_category->services)>0 )
                                        <article class="col-12 col-sm-6 col-lg-3">
                                            <a href="{{route('sub.categories',['slug'=>$service_category->slug])}}"  class="card">
                                                <div class="card--img">
                                                    <img src="{{asset('uploads/servicecategory/'.$service_category->image)}}" alt=" card-title">
                                                </div>
                                                <div class="card__body">
                                                    <h2 class="card--title">{{$service_category->name}}</h2>
                                                </div>
                                            </a>
                                        </article>


                                        {{--@else--}}

                                        {{--<article class="col-12 col-sm-6 col-lg-3">--}}
                                        {{--<a href="{{route('servicesByCategory',['slug'=>$service_category->slug])}}"  class="card">--}}
                                        {{--<div class="card--img">--}}
                                        {{--<img src="{{asset('uploads/servicecategory/'.$service_category->image)}}" alt=" card-title">--}}
                                        {{--</div>--}}
                                        {{--<div class="card__body">--}}
                                        {{--<h2 class="card--title">{{$service_category->name}}</h2>--}}
                                        {{--</div>--}}
                                        {{--</a>--}}
                                        {{--</article>--}}

                                    @endif
                                @endforeach
                        </div>

                        <!-- handyman -->
                        @if(count($results['service_providers'])>0)
                        <div class="title--category ">
                            <div class="body">
                                <h2 class="title--section">Service Providers</h2>
                                {{--<p class="title--description">Fully Experience</p>--}}
                            </div>
                        </div>
                        @endif

                        @foreach($results['service_providers'] as $key=>$provider)
                            <div class="row">
                                <article class="col-12 col-sm-6 col-lg-3">
                                    <a href="{{route('provider.detail',['id'=>$provider->id,'slug'=>\Illuminate\Support\Str::slug($provider->name)])}}"class="card">
                                        <div class="card--img">
                                            <img src="{{$provider->image_url()}}" alt=" card-title">
                                        </div>
                                        <div class="card__body">
                                            <h2 class="card--title">{{$provider->name}}</h2>
                                        </div>
                                    </a>
                                </article>
                            </div>
                        @endforeach

                    @else
                    <div class="container">
                        <section class="twenty-five">
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="ideas" style="margin-top: 40px">
                                        <h4 class="ideas-header" style="text-align: center">No Result Found!</h4>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                @endif
            </div>

        </section>




    </main>
@endsection