@extends('frontend.layouts.master')

@section('title','My Profile')
@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<style>
    .error-message-pass{
        color: #cc0000;

        font-size: 14px;
    }

    input[type="file"] {
        display: none;
    }
    .custom-file-upload {
        border: 1px solid #ccc;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
    }
</style>
@endpush

@section('content')
    <main class="common-page page--login account-page">

        <section class="service">
            <div class="section-rule">
                <div class="row">

                    <aside class="col-12 col-lg-3 all pl-0">

                        <div class="sticky submenu">
                            <ul  role="tablist" class="nav  list-group ">
                                <li>
                                    <a class="nav-link active"  data-toggle="pill" href="#personal-tab" role="tab"> <span class="material-icons material-icons-rounded">
									account_circle
								</span>My Profile</a>
                                </li>
                                <li>
                                    <a class="nav-link" data-toggle="pill" href="#booking-tab" role="tab"><span class="material-icons material-icons-outlined">
									event
								</span>My Booking</a>
                                </li>

                                {{--<li>--}}
                                    {{--<a class="nav-link" data-toggle="pill" href="#card-tab" role="tab">--}}
									{{--<span class="material-icons material-icons-outlined">--}}
										{{--payment--}}
									{{--</span>Card Management--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                <li>
                                    <a class="nav-link" data-toggle="pill" href="#wallet-tab" role="tab">
									<span class="material-icons material-icons-outlined">
										account_balance_wallet
									</span>My Wallet
                                    </a>
                                </li>

                                <li>
                                    <a class="nav-link" data-toggle="pill" href="#invite-tab" role="tab">
									<span class="material-icons material-icons-outlined">
										redeem
									</span>Invite a friend
                                    </a>
                                </li>

                                <li>
                                    <a class="nav-link" data-toggle="pill" href="#changepass-tab" role="tab"><span class="material-icons material-icons-outlined">
									vpn_key
								</span>Change Password</a>
                                </li>
                                <li><a href="#!" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  class="nav-link log-out">
                                        <span class="material-icons">
								            exit_to_app
							            </span>Log out</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>



                    </aside>
                    <aside class="col-12 col-lg-9 pr-0 tab-content">

                        @if(\Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{\Session::get('success')}}</p>
                            </div>
                        @endif
                        <div class="tab-pane fade show active home m-0" id="personal-tab" role="tabpanel">
                            <div class="card details login-form">
                                <!-- form -->
                                @php
                                    $user = \Illuminate\Support\Facades\Auth::user();
                                @endphp
                                <form id="regForm" action="{{route('edit.profile')}}" method="post" class="dropzone" enctype="multipart/form-data">
                                    {{--<label for="">Natsuki Horikita</label>--}}
                                    @csrf
                                        @if($user->image != null)
                                        <div class="card__img">
                                            <img id="blah" src="{{asset('uploads/user/'.$user->image)}}" alt="User name">
                                        </div>
                                        @else
                                        <div class="card__img">
                                            <img id="blah" src="{{$user->image_url()}}" alt="User name">
                                        </div>
                                        @endif

                                    <div class="form-row">
                                        <label class="custom-file-upload">
                                            <input type="file" id="imgUser" name="image" />
                                            <i class="fa fa-cloud-upload"></i> Change Profile
                                        </label>
                                        <div class="clearfix"></div>


                                        <div class="form-group col-12 ">
                                            <br>
                                            <label for="name">Full Name</label>
                                            <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}" placeholder="Full Name">
                                        </div>
                                        <!-- phone -->
                                        <div class="form-group number col-12 col-md-6">
                                            <label for="email">Phone Number</label>

                                            <input type="tel" class="form-control" name="phone" value="{{$user->phone}}" placeholder="Phone Number" >
                                        </div>
                                        <div class="form-group col-12 col-md-6">
                                            <label for="email">Email Address</label>

                                            <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="Email Address" id="email" readonly="">
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-12">

                                            <label for="fill--addr">Full address
                                                <small> (Type your address, or drag the red marker to your exact location)</small>
                                            </label>
                                            <input type="text" class="form-control" value="{{$user->userdetail->fulladdress}}"  name="fulladdress" id="fill--addr" placeholder="Enter a location" autocomplete="off">
                                        </div>
                                        <div class="form-group col-12 col-sm-6">
                                            <label for="street--name">Street name</label>
                                            <input type="text" placeholder="Enter a street name" class="form-control  " name="street" value="{{$user->userdetail->street}}" id="street--name">
                                        </div>
                                        <div class="form-group col-12 col-sm-6">
                                            <label for="buildig">Building</label>
                                            <input type="text" placeholder="Enter a building name or number" class="form-control  "  name="building" value="{{$user->userdetail->building}}" id="buildig">
                                        </div>
                                        <div class="col-md-6 ">
                                            <label for="flat">flat/room number</label>
                                            <input type="text" placeholder="Enter a Flat/room number" class="form-control  " name="flat_number" value="{{$user->userdetail->flat_number}}" id="flat">
                                        </div>
                                        <div class="col-md-6 ">
                                            <label for="Additional Direction">Additional Direction</label>
                                            <input type="text" placeholder="Enter a Flat/room number" class="form-control  " value="{{$user->userdetail->addtional_direction}}" name="addtional_direction" id="Additional Direction">
                                        </div>

                                    </div>
                                    <button  type="submit col-12 ">
                                      Save
                                    </button>
                                </form>


                            </div>
                        </div>

                       @include('frontend.includes.my_order')


                        {{--<div class="tab-pane fade row m-0 card-tab" id="card-tab" role="tabpanel">--}}

                            {{--<div class="checkout--wrapper">--}}
                                {{--<h2 class="title--description">Add a new card</h2>--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-md-5 pl-0">--}}
                                        {{--<div class="card__wrapper">--}}
                                            {{--<h2 class="small__title">Visa</h2>--}}
                                            {{--<p class="para">Debit Card</p>--}}
                                            {{--<p class="card__num">•••• •••• ••••</p>--}}
                                            {{--<div class="d-flex justify-content-between align-items-center">--}}
                                                {{--<p class="para name">My Name</p>--}}
                                                {{--<time>•• ••</time>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<label for="">AED 1 will be reserved then released to confirm your card.</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-7 pr-0">--}}
                                        {{--<form  action="" method="" >--}}

                                            {{--<div class="form-row">--}}
                                                {{--<div class="form-group col-12 ">--}}
                                                    {{--<label for="card__number">Card Number</label>--}}
                                                    {{--<input type="string" class="form-control" id="card_number">--}}
                                                {{--</div>--}}
                                                {{--<div class="form-group number col-12 col-md-6">--}}
                                                    {{--<label for="card__name">Name on card</label>--}}

                                                    {{--<input type="text" class="form-control" id="card__name"  >--}}
                                                {{--</div>--}}

                                                {{--<div class="form-group number col-12 col-md-6">--}}
                                                    {{--<label for="card__date">Valid Thru( MM YY)</label>--}}

                                                    {{--<input type="number" class="form-control" id="card__date" pattern="\d\d/\d\d" >--}}
                                                {{--</div>--}}
                                                {{--<div class="form-group col-12">--}}
                                                    {{--<label for="card__cvv">CVV code (<small>Your CVV code is the three or four digit code found at the back of your card.</small>)</label>--}}

                                                    {{--<input type="number" class="form-control" id="card__cvv" pattern="\d{3,4}" >--}}

                                                {{--</div>--}}

                                            {{--</div>--}}

                                            {{--<button  type="submit col-12 ">--}}
                                                {{--Add a Card--}}
                                            {{--</button>--}}
                                        {{--</form>--}}

                                    {{--</div>--}}

                                {{--</div>--}}

                            {{--</div>--}}
                        {{--</div>--}}

                            <!-- WALLET SECTION----->
                            @include('frontend.includes.wallet')
                            <!-- END WALLET SECTION-->

                            <!-- INVITE A FRIEND ---->
                            @include('frontend.includes.invite')
                            <!-- END INVITE A FRIEND --->




                        <div class="tab-pane fade row m-0 pass-page" id="changepass-tab" role="tabpanel">
                            <div class="login-form ">
                                <form id="regForm" action="{{route('change.password')}}" method="post">
                                    @csrf


                                    {{--@if($errors->any)--}}
                                        {{--@foreach($errors->all() as $error)--}}
                                            {{--<div class="alert alert-danger">--}}
                                                {{--{{$error}}--}}
                                            {{--</div>--}}
                                        {{--@endforeach--}}
                                    {{--@endif--}}



                                    @if(Auth::user()->social_from != "normal" && Auth::user()->password == null)
                                        <h1 class="card__title">Set your Password</h1>
                                    @else
                                        <h1 class="card__title">Change Password</h1>
                                    @endif

                                    @if(Auth::user()->password != null)
                                        <div class="form-group col-12">
                                            <label for="oldp">Old Password</label>
                                            <input type="password" class="form-control" name="old_password" placeholder="Old Password" id="oldp">
                                            @if ($errors->has('old_password'))
                                                <span class="error-message-pass">
                                            *{{ $errors->first('old_password') }}
                                        </span>
                                            @endif
                                            @if(\Session::has('error-message'))
                                                <span class="error-message-pass">
                                            *{{\Session::get('error-message')}}
                                        </span>
                                            @endif
                                        </div>
                                    @endif



                                    <div class="form-group col-12">
                                        @if(Auth::user()->social_from != "normal" && Auth::user()->password == null)
                                            <label for="newp">Enter Password</label>
                                            @else
                                            <label for="newp">New Password</label>
                                        @endif

                                        <input type="password" class="form-control" name="password" placeholder=" Password" id="newp">
                                        @if ($errors->has('password'))
                                            <span class="error-message-pass">
                                            *{{ $errors->first('password') }}
                                        </span>
                                        @endif
                                    </div>


                                    <div class="form-group col-12">
                                        <label for="oldp">Confirm Password</label>
                                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" id="oldp">
                                        @if ($errors->has('password_confirmation'))
                                            <span class="error-message-pass">
                                            *{{ $errors->first('password_confirmation') }}
                                        </span>
                                        @endif
                                    </div>


                                    <button type="submit">Change Password</button>
                                </form>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </section>
    </main>

@endsection

@push('script')
<script>
    $(document).ready(()=>{
        var cardNumbText = $('.card__num span');
    $('.code a').click(function(){
        var $temp = $("<input class='d-none'>");
        $("body").append($temp);
        $temp.val($(this).text()).select();
        document.execCommand("copy");
        $temp.remove();
    });

    // $('#card_number').keyup(function(e){
    // 	console.log(e)
    // 	let cardNumb= $(this).val();
    // 	// console.log(cardNumb);
    // 	var fruits = Array.from(String(cardNumb), Number);
    // 	if(fruits.length===3){
    // 		fruits[4]= " ";
    // 	}
    // 	fruits.forEach(function (item, index) {
    // 		// console.log('index' + index );
    // 		// console.log('item' + item );
    // 		// cardNumbText[index].text(item)
    // 		for(let i = 0 ; i<=18; i++){
    // 			if(fruits[i]){
    // 				cardNumbText[i].textContent = item;
    // 			}
    // 			else{
    // 				cardNumbText[i].textContent = "•";
    // 			}
    // 		}


    // 	} );


    // })
    })
</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
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


    var hash = window.location.hash;
    // if a hash is present (when you come to this page)
    if (hash !='') {
        // show the tab
        console.log(hash);
        $('.nav.list-group  a[href="' + hash + '"]').tab('show');
        let show= $(hash);


        hash='';
//        window.history.replaceState({}, document.title, "serviceonus.com/my-profile/" + "");

    }


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#imgUser").change(function() {
        readURL(this);
    });

</script>
@endpush