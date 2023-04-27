@extends('frontend.layouts.master')

@section('title','Included In Service :: '.$admin_include->name)

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
                <div class="row" style="margin-bottom: 40px">
                    <aside class="page-sidebar right col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget-holder">
                            <div class="widget widget_text">
                                <div class="widget-title" style="margin-top: 30px">
                                    <h5>
                                         What included in service :   {{$admin_include->name}}

                                    </h5>
                                    <hr>
                                </div>
                                <div class="textwidget term">
                                    @if($data->whats_included != null)
                                        {!! $data->whats_included !!}
                                    @else
                                        {!! $admin_include->whats_included !!}

                                    @endif
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