@extends('frontend.layouts.master')

@section('title','Registration')

@section('content')

    <style>
        .error-message{
            color: #dc3545;
            font-size: 80%;
            font-weight: bold;
        }
    </style>
    <main class="common-page page--provider page--aboutus page--form">



        <div class="screen mb-0">

            @if(\Session::has('success'))

                <div class="alert alert-success">
                {{\Session::get('success')}}
                </div>
            @endif

                {{--@if(\Session::has('error'))--}}

                    {{--<div class="alert alert-danger">--}}
                        {{--{{\Session::get('error')}}--}}
                    {{--</div>--}}
                {{--@endif--}}

            <div class="section-rule">



                <div class="row">
                    <div class="col-sm-7 p-0">
                        <div class="wrapper">
                            <div class="title--wrapper ">
                                <h2 class="title--section">Become a ServiceMarket partner</h2>
                            </div>
                            <div class="paragraph">
                                <div class="row comments--collection">
                                    <p class="title--description ">Redefining the Middle East’s service provider industry</p>

                                    <p class="title--description ">Provide online marketplace of service </p>
                                    <p class="title--description ">Using technology to improve lives</p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 p-0">
                        <img src="{{asset('gallery/kendall-henderson-Pj6TgpS_Vt4-unsplash.jpg')}}" alt="about-us-img">
                    </div>
                </div>
            </div>

        </div>

        <section class="form">
            <div class="section-rule">
                <div class="title--wrapper">
                    <p class="title--section">Fill out the form below and one of our sales representatives will contact you within 2 working days</p>
                </div>


                <form action="{{route('service.provider.register.submit')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <p class="card__title">Describe your company & provide contact details</p>

                    <div class="form-group col-sm-6">
                        <label>Upload Logo of Your Company</label>
                        <input type="file" class="form-control" name="image" required>

                        @if ($errors->has('image'))
                            <span class="error-message">
                                    *{{ $errors->first('image') }}
                                </span>
                        @endif

                    </div>


                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="companyName">Company Name</label>
                            <input type="text" class="form-control" id="companyName" name="name" placeholder="">
                            @if ($errors->has('name'))
                                <span class="error-message">
                                    *{{ $errors->first('name') }}
                                </span>
                            @endif

                        </div>
                        <div class="form-group col-sm-6">
                            <div class="form-group">
                                <label for="employeN">Numbers of Employees</label>
                                <select class="custom-select" id="employeN" name="number_of_employ">
                                    <option selected="" disabled="">Select</option>
                                    <option value="1-10">
                                        1-10
                                    </option>
                                    <option value="11-50">
                                        11-50
                                    </option>
                                    <option value="51-100">
                                        51-100
                                    </option>

                                </select>

                                @if ($errors->has('number_of_employ'))
                                    <span class="error-message">
                                    *{{ $errors->first('number_of_employ') }}
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="contactP">Contact Person</label>
                            <input type="text" class="form-control" name="contact_person" id="contactP">

                            @if ($errors->has('contact_person'))
                                <span class="error-message">
                                    *{{ $errors->first('contact_person') }}
                                </span>
                            @endif

                        </div>
                        <div class="form-group col-sm-6">
                            <label for="contactE">Contact Email</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="">
                            @if ($errors->has('email'))
                                <span class="error-message">
                                    *{{ $errors->first('email') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="contactN">Contact No</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <select class="custom-select" id="employeN">
                                        {{--<option selected="" value="">USA</option>--}}
                                        <option value="+971">
                                            +971
                                        </option>

                                    </select>
                                </div>
                                <input type="tel" name="contact_number" class="form-control" id="contactN" placeholder="">

                            </div>
                            @if ($errors->has('contact_number'))
                                <span class="error-message">
                                    *{{ $errors->first('contact_number') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="contactWeb">Company Website</label>
                            <input type="text" class="form-control" id="contactWeb" name="website" placeholder="">
                            @if ($errors->has('website'))
                                <span class="error-message">
                                    *{{ $errors->first('website') }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <p class="card__title">Which cities are you active in? (Click all that apply)</p>

                    <div class="form-row flex-wrap">
                       @foreach(cities() as$key=> $city)
                        <div class="form-group form-check col-md-3">
                            <div class="wrapper">
                                <input type="checkbox" class="form-check-input" id="dubai{{$key}}" name="cities[]" value="{{$city->id}}">
                                <label class="form-check-label" for="dubai{{$key}}">{{$city->name}}</label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @if ($errors->has('cities'))

                        <span class="error-message">
                                    *{{ $errors->first('cities') }}
                        </span>
                        <br><br>
                    @endif

                    <p class="card__title">What services do you offer? (Click all that apply)</p>

                    <div class="form-row flex-wrap">
                        @foreach($service_categories as $key=> $service)
                            @if(count($service->services)>0)

                                <div class="form-group form-check col-md-3">
                                    <div class="wrapper">
                                        <input type="checkbox" class="form-check-input" id="Local{{$key}}" name="services[]" value="{{$service->id}}">
                                        <label class="form-check-label" for="Local{{$key}}">{{$service->name}}</label>
                                    </div>

                                </div>

                            @endif

                        @endforeach

                    </div>
                    @if ($errors->has('services'))

                        <span class="error-message">
                                    *{{ $errors->first('services') }}
                                    </span>
                        <br><br>
                    @endif

                    <div class="form-group col-sm-6">
                        <label>License Cetificate ( *pdf file )</label>
                        <input type="file" class="form-control" name="license" >

                        @if ($errors->has('license'))
                            <span class="error-message">
                                    *{{ $errors->first('license') }}
                                </span>
                        @endif

                    </div>



                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="Message">Is there any other information you would like to share?</label>
                            <textarea name="message" id="Message"  rows="10" class="form-control" placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="form-row mb-0">
                        <div class="form-group col-sm-12">
                            <button class="" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </main>


@endsection