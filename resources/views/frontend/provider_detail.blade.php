@extends('frontend.layouts.master')

@section('title','Provider Detail')


@section('content')

    <main class="common-page page--login account-page">

        <section class="service">
            <div class="section-rule">
                <div class="row">
                    <aside class="col-12 col-lg-12 pr-0 tab-content">
                        <div class="tab-pane fade show active home m-0" id="personal-tab" role="tabpanel">
                            <div class="card details login-form">
                                <!-- form -->
                                <form id="regForm" action="./file" class="dropzone">
                                    <div class="card__img">
                                        <img src="{{$provider->image_url()}}" alt=" full name">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-12 col-md-6 ">
                                            <label for="name" style="padding-right: 15px ; font-weight: 600">Provider Name</label>
                                            {{$provider->name}}
                                        </div>
                                        <!-- phone -->
                                        <div class="form-group number col-12 col-md-6">
                                            <label for="email" style="padding-right: 15px ; font-weight: 600">Phone Number</label>
                                            {{$provider->details->contact_number}}
                                        </div>
                                        <div class="form-group col-12 col-md-6">
                                            <label for="email" style="padding-right: 15px ; font-weight: 600">Email Address</label>
                                            {{$provider->email}}
                                        </div>
                                        <div class="form-group col-12 col-md-6">
                                            <label for="email" style="padding-right: 15px ; font-weight: 600">Website </label>
                                            {{$provider->details->website}}
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="form-row">
                                        <div class=" col-md-12 form-group">
                                            <label>Services Provided by Provider</label>
                                            <br>
                                            @foreach($provider->services as $service)
                                                <a href="{{route('book.service',['slug'=>$service->slug,'category_id'=>$service->service_category_id])}}"><span class="badge badge-service">{{$service->name}}</span></a>
                                            @endforeach
                                        </div>


                                    </div>

                                </form>


                            </div>
                        </div>




                    </aside>
                </div>
            </div>
        </section>
    </main>


@endsection
@push('scripts')
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
@endpush