@extends('frontend.layouts.master')

@section('title','Set Password')

@section('content')
    <main class="common-page page--login">

        <section class="service">
            <div class="section-rule">

                @if($errors->any)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{$error}}
                        </div>
                    @endforeach
                @endif
                <div class="row">
                    @php
                        $user = \App\User::where('email_token',$token)->first();
                    @endphp
                    <aside class="col-sm-6 pl-0">
                        <form action="{{route('set.provider.password')}}" method="post">
                            @csrf
                            <h2 class="title--section">Set your password</h2>
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group">
                                <label for="password">Your Email</label>
                                <input class="form-control" name="email" type="text"  value="{{$user->email}}" id="password" placeholder="Enter Your Password" readonly >
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" type="password"  value="" id="password" name="password" placeholder="Enter Your Password">
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input class="form-control" type="password" id="confirm_password" name="password_confirmation" placeholder="Enter Your Password">
                            </div>

                            <button type="submit">Set Password</button>


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

