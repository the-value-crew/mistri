@extends('frontend.layouts.master')

@section('title','Privacy Policy')

@section('content')
    <!-- Main Section Start -->

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
                                <div class="textwidget">
                                    {!! $page->description !!}
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