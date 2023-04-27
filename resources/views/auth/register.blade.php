@extends('frontend.layouts.master')

@section('title','Register')
@push('css')
<style>
    .page--login button[type=button] {
        width: 50%;
        text-align: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        margin: 0px 0 1.5em;
    }
</style>

@endpush

@section('content')




    <main class="common-page page--login">

        <section class="service">
            <div class="section-rule">
                <div class="row">
                    <aside class="col-sm-6 pl-0">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <h2 class="title--section">Sign Up</h2>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Enter your name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter Email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" placeholder="Enter Your Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input id="password-confirm" placeholder="Enter Your Password"  type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <div class="form-group">
                                <label for="refer_code">If have refer code</label>
                                <input id="refer_code" type="text" class="form-control @error('name') is-invalid @enderror" name="refer_code" value="{{ old('name') }}"  autocomplete="name" placeholder="Enter code" autofocus>

                            </div>


                            <div class="form-group form-check">
                                <input  type="checkbox" name="agreement" class="form-check-input" id="login--keep">
                                <label class="form-check-label" for="login--keep">I accepts All <a href="{{route('terms')}}">Terms and condition</a></label>
                            </div>
                            {{--<div class="form-group form-check">--}}
                                {{--<input  type="checkbox" class="form-check-input" id="login--keep" checked="">--}}
                                {{--<label class="form-check-label" for="login--keep">I wish to reccive latest News & Inforamtion</label>--}}
                            {{--</div>--}}
                            <button type="button" id="submit_button">Sign In</button>
                            <p class="account">Already have account? <a href="{{route('login')}}">Log In</a></p>


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
    $(document).ready(function() {

        $('input[name="agreement"]').click(function(){
            if ($("input[name='agreement']").is(":checked")) {
                $('#submit_button').attr('type',"submit");

            } else {
                $('#submit_button').attr('type',"button");
            }



        });

        $('#submit_button').click(function(){
            if ($("input[name='agreement']").is(":checked")) {


            } else {
                alert("Please accept our Terms & Conditions.")
            }

        });

    });
</script>

<script>
    var sliderAnimation= $('.comments--collection .title--description');
    setInterval(()=>{
        sliderAnimation.toggleClass('animation');
    }, 3000)
</script>

@endpush