@extends('frontend.layouts.master')

@section('title','Terms & Conditions')

@section('content')
    <style>
        .term .et_pb_text_inner h2{
            font-size: 14px !important;
            color: #c10000 !important;
        }
    </style>



    <div class="main-section">
        <!-- Faqs Page Start -->
        <div class="page-section nopadding cs-nomargin">
            <div class="container">
                <div class="row">
                    <aside class="page-sidebar right col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget-holder">
                            <div class="widget widget_text">
                                <div class="widget-title" style="margin-top: 30px">
                                    <h5>{{$page->title}}</h5>
                                    <hr>
                                </div>
                                <div class="textwidget term">
                                    {!! $page->description !!}
                                </div>
                            </div>

                            <div class="widget widget_text">
                                <div class="widget-title">
                                    <h5>SERVICEONUS In Your Pocket!</h5>
                                </div>
                                <div class="textwidget">
										<span>Available on Google play for android &amp; on the App store for iOS.
											Download the
											app and drive hunger far, far away</span>
                                    <figure>
                                        <a href="#">
                                            <img src="assets/extra-images/app-img2-1.png" alt="">
                                        </a>
                                    </figure>
                                    <figure>
                                        <a href="#">
                                            <img src="assets/extra-images/app-img1-1.png" alt="">
                                        </a>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </aside>


                </div>
            </div>
        </div>
        <!-- Faqs Page End -->
    </div>
    <!-- Main Section End -->

@endsection