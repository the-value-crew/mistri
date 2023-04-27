@extends('frontend.layouts.master')
@section('title','Our Services')
@section('content')
    <main class="common-page page--category">
        <div class="title--wrapper page__title">
            <div class="section-rule">
                <h2 class="title--section">Our Service</h2>
                <p class="title--description">What help do you need ?</p>
            </div>
        </div>


        <!--- Other subcategory --->
        @foreach($all_categories as $all_category)

                @if(count($all_category->children)>0 || count($all_category->services)>0 )
                    <section class="service popular--service single--carousel bg-grey">
                        <div class="section-rule ">

                            <div class="title--wrapper section--title__margin">
                                <h2 class="title--section">{{$all_category->name}}</h2>
                            </div>

                            <div class="carousel">
                                @foreach($all_category->children as $child)
                                    <div class="item">
                                        <a href="{{route('sub.categories',['slug'=>$child->slug])}}" class="card card__hr card--horizontal">
                                            <div class="card--img">
                                                <img src="{{asset('uploads/servicecategory/'.$child->image)}}" alt="">
                                            </div>
                                            <div class="card--body">
                                                <div class="pp-image">
                                                    <img src="{{asset('uploads/servicecategory/'.$child->image)}}" alt="">
                                                </div>
                                                <div>
                                                    <p class="para">{{$child->name}} </p>
                                                    {{--<cite class="card--title text-muted">by Jhon</cite>--}}
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach

                                @foreach($all_category->services as $service1)
                                    <div class="item">
                                        <a href="{{route('book.service',['slug'=>$service1->slug,'category_id'=>$all_category->id])}}" class="card card__hr card--horizontal">
                                            <div class="card--img">
                                                <img src="{{asset('uploads/service/'.$service1->image)}}" alt="">
                                            </div>
                                            <div class="card--body">
                                                <div class="pp-image">
                                                    <img src="{{asset('uploads/service/'.$service1->image)}}" alt="">
                                                </div>
                                                <div>
                                                    <p class="para">{{$service1->name}} </p>
                                                    {{--<cite class="card--title text-muted">by Jhon</cite>--}}
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </section>
                @endif

        @endforeach
        <!--- Other subcategory --->


    </main>
@endsection

@push('script')

<script>
    $(document).ready(function(){
        $('.single--carousel .carousel').slick({
            infinite: false,
            autoplay:false,
            lazyLoad: 'ondemand',
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows:true,
            draggable:true,
            swipeToSlide: true,
            prevArrow:"<button class=' slick-prev'><i class='material-icons'>keyboard_arrow_left</i></button>",
            nextArrow:"<button class=' slick-next '><i class='material-icons'>keyboard_arrow_right</i></button>",
            responsive: [
                {
                    breakpoint: 840,
                    settings: {
                        arrows:false,
                        slidesToShow:1.6,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow:1.1,
                    }
                }

            ]
        });
    })
</script>

@endpush