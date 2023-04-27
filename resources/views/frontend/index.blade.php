@extends('frontend.layouts.master')
@section('title','Mistri')
@push('css')
<link rel="stylesheet" href="{{asset('frontend/node_modules/country/build/css/intlTelInput.css')}}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<style>
    footer{
        background-color: #fff !important;
    }



</style>
@endpush
@section('title','SERVICEONUS')



@section('content')
    <main class="home-page">
        <section class="screen">
            <div class="section-rule">
                <div class="row ">
                    <div class="col-md-6">

                        <article class="wrapper">
                            <h2 class="title--section">one stop solution for  All
                                <!-- <br/> -->

                                <!-- <div class="slider">
                                  <div class="slider-text1">Plumbing</div>
                                  <div class="slider-text2">House Shift</div>
                                  <div class="slider-text3">cleaning</div>
                                </div> -->
                            </h2>

                            <div class=" search">
                                <form action="{{route('search')}}" method="get" class="form-inline">

                                    <div class="form-group">
                                        <input type="search" name="query" class="form-control" placeholder="Find services" />
                                        <button type="submit">Search</button>
                                    </div>

                                </form>
                                <ul class="tag-wrapper">
                                    <li ><p class="para">Popular</p></li>
                                    @php
                                        $trendings = \App\Service::latest()->where('trending',"on")->limit('6')->get();
                                    @endphp

                                    @foreach($trendings as $trending)
                                    <li><a href="{{route('book.service',['slug'=>$trending->slug,'category_id'=>$trending->service_category_id])}}" class="tag">{{$trending->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                        </article>
                    </div>
                    <div class="col-md-6">
                        <div class="item">
                            <img src="./gallery/3298067-png.png" alt="" />
                        </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <section class="proff ">
            <div class="section-rule">
                <div class="row">
                    @foreach($logos as $logo)
                        <article class="item ">
                            <div class="card--img">
                                <img src="{{asset('uploads/logo/'.$logo->logo)}}" alt="">
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        @if(count($service_providers))
        <section class="popular--service single--carousel">
            <div class="section-rule">
                <div class="title--wrapper section--title__margin">

                    <h2 class="title--section">Featured Service Providers </h2>


                </div>
                <div class="carousel">
                    @foreach($service_providers as $service_provider)
                        @if(in_array($service_provider->id,$ids) && count($service_provider->services)>0)
                        @php
                            $data = getVendorServiceToDisplayAtHome($service_provider->id);
                        @endphp


                        <div class="item">
                            <a href="{{route('book.service',['slug'=>$data->slug,'category_id'=>$data->service_category->id])}}" class="card card__hr card--horizontal">
                                <div class="card--img">
                                    <img src="{{asset('uploads/service/'.$data->image)}}" alt="">
                                </div>
                                <div class="card--body">
                                    <div class="pp-image">
                                        <img src="{{asset('uploads/logo/'.$service_provider->image)}}" alt="">
                                    </div>
                                    <div>
                                        <p class="para">{{$data->name}}</p>
                                        <cite class="card--title text-muted">by {{$service_provider->name}}</cite>
                                    </div>
                                </div>
                            </a>

                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
        @endif
        <section class="popular--service popular--service--next">
            <div class="section-rule">
                <div class="title--wrapper section--title__margin">

                    <h2 class="title--section">Popular Professional Services</h2>
                </div>
                <div class="carousel">
                    @foreach($service_categories as $service_category)
                        @if(count($service_category->children)>0 || count($service_category->services)>0 )
                            <div class="item">
                                <a href="{{route('sub.categories',['slug'=>$service_category->slug])}}" class="card card__hr card--horizontal">
                                    <div class="card--img">
                                        <img src="{{asset('uploads/servicecategory/'.$service_category->image)}}" alt="">
                                    </div>
                                    <div class="card--body">
                                        <h2 class="card--title">{{$service_category->name}}</h2>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </section>





        <section class="download ">
            <div class="section-rule">
                <div class="row no-gutters">
                    <aside class="col-sm-4 col-lg-6">
                        <div class="image">
                            <img src="{{asset('frontend/gallery/mob.png')}}" alt="" >
                        </div>
                    </aside>
                    <aside class="col-sm-8 col-lg-6">
                        <article class="wrapper">
                            <div class="title--wrapper text-left">
                                <h2 class="title--section">Refer and get free services</h2>
                                <p class="title--description">Refer a friend and get {{point_for_refer()}} points for each referral. They will get an instant {{point_for_refer_code_user()}} points too</p>
                            </div>
                            <form action="{{route('refer.friend')}}" method="post" class="form-inline">
                                @csrf
                                <div class="form-group">
                                    <i class="fa fa-envelope icon"></i>
                                    <input  name="email" type="email" class="input-field form-control" >
                                    <button type="submit">Send</button>
                                </div>
                            </form>
                        </article>
                    </aside>
                </div>



            </div>
        </section>

    </main>
@endsection








@push('script')
<script src="{{asset('frontend/node_modules/country/build/js/intlTelInput.js')}}"></script>
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

</script>

<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        var input = document.querySelector("#phone");
    window.intlTelInput(input, {
        autoHideDialCode: false,
        autoPlaceholder: "off",
        hiddenInput: "full_number",
        placeholderNumberType: "MOBILE",
        preferredCountries: ['np', 'in'],
        separateDialCode: true,
        utilsScript: "./node_modules/country/build/js/utils.js",
    });
    });

    // here go all the jquery
    $(document).ready(function(){
        $('.iti__arrow').html(`<svg width="9" height="5" viewBox="0 0 9 5" fill="none" xmlns="http://www.w3.org/2000/svg">
   <path fill-rule="evenodd" clip-rule="evenodd" d="M4.49719 5C4.72226 5 4.93607 4.91111 5.09362 4.75556L8.83542 0.961111C9.05486 0.744444 9.05486 0.388889 8.83542 0.166667C8.61597 -0.05 8.26149 -0.05 8.04204 0.166667L4.49719 3.76111L0.957956 0.166667C0.738512 -0.0555556 0.384026 -0.0555556 0.164583 0.166667C-0.0548609 0.388889 -0.0548609 0.738889 0.164583 0.961111L3.90638 4.75556C4.0583 4.91111 4.27212 5 4.49719 5Z" fill="#4C4D4F"/>
   </svg>
   `);
    })
</script>
<script>
    $(document).ready(function(){
        $('.screen .carousel').slick({
            infinite: true,
            autoplay:true,
            lazyLoad: 'ondemand',
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows:false,
            draggable:false,
            autoplaySpeed:3000,
            pauseOnFocus:false,
            pauseOnDotsHover:false,
        });


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
        $('.popular--service--next .carousel').slick({
            infinite: true,
            autoplay:true,
            lazyLoad: 'ondemand',
            slidesToShow: 5,
            slidesToScroll: 1,
            swipeToSlide: true,
            arrows:true,
            draggable:true,
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










