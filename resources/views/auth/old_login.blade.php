<!-- Login Page---->
@extends('frontend.layouts.master')

@section('title','Login')

@section('content')


    <main class="common-page page--login">

        <section class="service">
            <div class="section-rule">
                <div class="row">
                    <aside class="col-sm-6 pl-0">
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <h2 class="title--section">Log In</h2>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control @if(Session::has('error-email')) is-invalid @endif" name="email" type="email" id="email" value="{{old('email')}}" placeholder="brad@gmail.com">

                                @if(Session::has('error-email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{Session::get('error-email')}}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <a href="{{url('password/reset')}}" class="fg--password">Forget Password?</a>
                                <input class="form-control @if(Session::has('error')) is-invalid @endif" type="password" id="password" name="password" placeholder="Enter Your Password">

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
                            <p class="account">Dont have an account? <a href="{{route('register')}}">Sign up</a></p>
                        </form>
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
</script>

@endpush