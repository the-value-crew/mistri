@extends('frontend.layouts.master')

@section('title','Contact Us')

@section('content')
    <main class="common-page page--aboutus page-contact-us page--login">
        <div class="screen">
            <div class="section-rule">

                @php
                    $data = \App\Website::find(1);
                @endphp

                <div class="row">
                    <div class="col-sm-6 pl-0">
                        <div class="wrapper testimonials">
                            <div class="title--wrapper ">
                                <h2 class="title--section">Message Us</h2>
                            </div>
                            <form action="{{route('general.enquiry')}}" method="post" class="p-0" id="general-enquiry">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="form-group col-12 ">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="My Name">
                                    </div>
                                    <div class="form-group col-12 ">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="My Email">
                                    </div>
                                    <div class="form-group col-12 ">
                                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                    </div>

                                    <div class="form-group col-12 ">

                                        <textarea name="message" id="textarea"  class="form-control" placeholder="Additional Message"></textarea>
                                    </div>
                                </div>

                                @if (session('success'))
                                    <p style="color: #149dcc;line-height: 1.2;font-size:16px;margin-left: 10px;margin-top: 2px">{{ session('success') }}</p>
                                @endif
                                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Submit</button>
                            </form>

                        </div>
                    </div>
                    <div class="col-sm-6 pr-0">
                        <div class="wrapper info">
                            <div class="title--wrapper ">
                                <h2 class="title--section">Contact Us</h2>
                            </div>

                            <div class="brand logo">
                                <img src="{{asset('dashboard/img/'.$data->logo)}}" alt="" loading="lazy" class="img-fluid">
                            </div>
                            <ul class="links-list">
                                <li>
                                    <a href="mailto:"><i class="material-icons">mail</i>{{$data->email_1}}</a>
                                </li>
                                <li>
                                    <a href="mailto:"><i class="material-icons">mail</i>{{$data->email_2}}</a>
                                </li>
                                @if($data->phone_1 != null)
                                <li>
                                    <a href="telto:"><i class="material-icons">phone</i>{{$data->phone_1}}</a>
                                </li>
                                @endif
                                @if($data->phone_2 != null)
                                <li>
                                    <a href="telto:"><i class="material-icons">phone</i>{{$data->phone_2}}</a>
                                </li>
                                    @endif
                            </ul>
                            <ul class="social">
                                @if($data->fb_url != null)
                                <li><a target="_blank" href="{{$data->fb_url}}" class="fa fa-facebook" aria-hidden="true"></a></li>
                                @endif

                                @if($data->twitter_url != null)
                                <li><a target="_blank" href="{{$data->twitter_url}}" class="fa fa-twitter" aria-hidden="true"></a></li>
                                @endif

                                @if($data->youtube_url != null)
                                <li><a target="_blank" href="{{$data->youtube_url}}" class="fa fa-youtube-square" aria-hidden="true"></a></li>
                                @endif

                                @if($data->instagram_url != null)
                                <li><a target="_blank" href="{{$data->instagram_url}}" class="fa fa-instagram" aria-hidden="true"></a></li>
                                @endif


                            </ul>


                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>
@endsection