@extends('frontend.layouts.master')

@section('title','Login')

@section('content')

    <style>
        a.facebook, a.google {
            background-color: transparent;
            border: 1px solid #A7A7A7;
            color: #A7A7A7;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            align-items: left;
        }



        a.facebook:hover ,a.google:hover {
            color: #A7A7A7;
            background-color: transparent;
            border-color: #1b4484;
        }

    </style>


    <main class="common-page page--login">

        <section class="service">
            <div class="section-rule">
                <div class="row">
                    <aside class="col-sm-6 pl-0">

                        <h2 class="title--section">Log In As</h2>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#user" role="tab">User</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#vendor" role="tab">Vendor</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="social tab-pane fade show active" id="user" role="tabpanel" >
                                    <form action="{{ route('login') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">User Email</label>
                                            <input class="form-control @if(Session::has('error-email')) is-invalid @endif" name="email" type="email" id="email" value="{{old('email')}}" placeholder="Enter Your Email" required>

                                            @if(Session::has('error-email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{Session::get('error-email')}}</strong>
                                                </span>
                                            @endif

                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <a href="{{url('password/reset')}}" class="fg--password">Forget Password?</a>
                                            <input class="form-control @if(Session::has('error')) is-invalid @endif" type="password" id="password" name="password" placeholder="Enter Your Password" required>

                                            @if(Session::has('error'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{Session::get('error')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        {{--<div class="form-group form-check">--}}
                                        {{--<input  type="checkbox" class="form-check-input" name="remember"mnm id="login--keep">--}}
                                        {{--<label class="form-check-label" for="login--keep">Keep me Logged In</label>--}}
                                        {{--</div>--}}
                                        <button type="submit">Log In</button>

                                        <p class="or"> <span>or</span></p>
                                        <a  href="{{ route('login.facebook') }}" type="submit" class="btn facebook ">login with <img src="{{asset('frontend/gallery/ff.png')}}" alt=""></a>
                                        <a href="{{ route('login.google') }}" type="submit" class="btn google">login with <img src="{{asset('frontend/gallery/gg.png')}}" alt=""></a>

                                        <p class="account">Dont have an account? <a href="{{route('register')}}">Sign up</a></p>
                                    </form>
                                </div>


                                <div class="tab-pane fade" id="vendor" role="tabpanel" >
                                    <form action="{{ route('vendor.login') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">Vendor Email</label>
                                            <input class="form-control @if(Session::has('vendor-error-email')) is-invalid @endif" name="vendor_email" type="email" id="email" value="{{old('vendor_email')}}" placeholder="Enter Your Email" required>

                                            @if(Session::has('vendor-error-email'))
                                                <span class="invalid-feedback" role="alert">
                                                     <strong>{{Session::get('vendor-error-email')}}</strong>
                                                 </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <a href="{{url('password/reset')}}" class="fg--password">Forget Password?</a>
                                            <input class="form-control @if(Session::has('vendor-error')) is-invalid @endif" type="password" id="password" name="vendor_password" placeholder="Enter Your Password" required>

                                            @if(Session::has('vendor-error'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{Session::get('vendor-error')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        {{--<div class="form-group form-check">--}}
                                        {{--<input  type="checkbox" class="form-check-input" name="remember"mnm id="login--keep">--}}
                                        {{--<label class="form-check-label" for="login--keep">Keep me Logged In</label>--}}
                                        {{--</div>--}}
                                        <button type="submit">Log In</button>

                                        <p class="account">Dont have an account? <a href="{{route('service.provider.register')}}">Sign up</a></p>
                                    </form>
                                </div>

                            </div>

                    </aside>
                    <aside class="col-sm-6 pr-0">
                        <div class="comments--collection">
                            <p class="title--description">A Better Way To Keep Moving</p>
                            <p class="title--description animation">Fully Insurance</p>
                            <p class="title--description">Fast. Certified & Felxible Solution</p>
                        </div>
                    </aside>
                </div>
            </div>
        </section>
    </main>

@endsection

@push('script')

<script>
    var sliderAnimation= $('.comments--collection .title--description');
    setInterval(()=>{
        sliderAnimation.toggleClass('animation');
    }, 3000)


    var hash = window.location.hash;
    // if a hash is present (when you come to this page)
    if (hash !='') {
        // show the tab
        console.log(hash);
        $('.nav.nav-tabs  a[href="' + hash + '"]').tab('show');
        let show= $(hash);


        hash='';
//        window.history.replaceState({}, document.title, "serviceonus.com/my-profile/" + "");

    }
</script>

@endpush