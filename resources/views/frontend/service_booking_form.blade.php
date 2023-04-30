@extends('frontend.layouts.master')

@section('title','Book '.$service->name.' Service')

@push('css')
<link rel="stylesheet" href="{{asset('frontend/css/wickedpicker.min.css')}}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

<style>
    .box
    {
        width:100%;
        max-width:600px;
        background-color:#f9f9f9;
        border:1px solid #ccc;
        border-radius:5px;
        padding:16px;
        margin:0 auto;
    }
    input.parsley-success,
    select.parsley-success,
    textarea.parsley-success {
        color: #468847;
        background-color: #DFF0D8;
        border: 1px solid #D6E9C6;
    }

    input.parsley-error,
    select.parsley-error,
    textarea.parsley-error {
        color: #B94A48;
        background-color: #F2DEDE;
        border: 1px solid #EED3D7;
    }

    .parsley-errors-list {
        margin: 2px 0 3px;
        padding: 0;
        list-style-type: none;
        font-size: 0.9em;
        line-height: 0.9em;
        opacity: 0;

        transition: all .3s ease-in;
        -o-transition: all .3s ease-in;
        -moz-transition: all .3s ease-in;
        -webkit-transition: all .3s ease-in;
    }

    .parsley-errors-list.filled {
        opacity: 1;
    }

    .parsley-type, .parsley-required, .parsley-equalto, .parsley-pattern, .parsley-length{
        color:#ff0000;
    }

</style>
@endpush


@section('content')



    <main class="common-page page--form">
        <section class="page__title">
            <div class="section-rule">
                <div class="title--category">
                    <img src="{{asset('uploads/service/'.$service->image)}}" alt=" card-title">
                    <div class="body">
                        <h2 class="title--section">{{$service->name}}</h2>
                        <p class="title--description">{!! $service->short_description !!}</p>
                    </div>
                </div>
            </div>
        </section>

        @if(isFormExist($service->id))
                    @if(count($service->users)>0 && isProviderAvailable($service->id) )
                        <div class="progressive--wrapper">
                            <div class="section-rule p-0">
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="label">
                                    <span class="active">Your Need</span>
                                    <span>Your Location</span>
                                    <span>Your Provider</span>
                                    <span>Checkout</span>
                                </div>
                            </div>
                        </div>

                        <div class="section-rule pt-0">
                            <form action="{{route('payment',$service->id)}}" id="validate_form" method="post">
                                @csrf
                                <div class="row">
                                    <aside class="col-lg-8 pl-0">

                                        <div class="form ">
                                            <div class="step step--1 active" id="validate_form_part_one">

                                                <div class="form-group">
                                                    <label for="Premises"><b>I want to be served in</b></label>
                                                    <div class="checkbox--wrapper">
                                                        <div class="custom-control custom-checkbox ">
                                                            <input  class="custom-control-input" type="radio" name="service_done_in" value="Customer" id="premises11"  checked="false">
                                                            <label for="premises11"  class="custom-control-label">My Premises</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox ">
                                                            <input  class="custom-control-input" type="radio" name="service_done_in" value="Vendor" id="premises22" checked="false">
                                                            <label for="premises22"  class="custom-control-label">Provider Premises</label>
                                                        </div>
                                                    </div>

                                                </div>




                                            @if($service->id == 72)
                                                <!----- if service is pest control (static form )---->
                                                @include('frontend.forms.pest_control')
                                                <!--- end pest control service ----------------------->
                                            @endif

                                            @if($service->id == 84)
                                                <!----- if service is pest control (static form )---->
                                                @include('frontend.forms.deep_cleaning')
                                                <!--- end pest control service ----------------------->
                                            @endif

                                            @if($service->id == 85)
                                                <!----- if service is pest control (static form )---->
                                                @include('frontend.forms.sanitization')
                                                <!--- end pest control service ----------------------->
                                            @endif

                                            @if($service->id == 86)
                                                <!----- if service is pest control (static form )---->
                                                @include('frontend.forms.painting')
                                                <!--- end pest control service ----------------------->
                                            @endif

                                            <!--  Multiple field under same label-->
                                            @include('frontend.forms.label_for_multiple_input_field')
                                            <!---/ Multiple field under same label-->

                                            <!---- radio -op with charge ---->
                                            @include('frontend.forms.radio_field_with_charge')
                                            <!---- /radio -op with charge --->

                                                <!------ radio  ------>
                                            @include('frontend.forms.radio_field')
                                            <!---- radio --------->

                                                <!-- Check with charge -->
                                            @include('frontend.forms.check_field_with_charge')
                                            <!-- Check with charge -->


                                                <!--- select - op with charge ----->
                                            @include('frontend.forms.select_field_with_charge')
                                            <!---/select - op with charge ----->

                                                <!--- select fields --------------->
                                            @include('frontend.forms.select_field')
                                            <!---/select field ---------------->

                                                <!--- Text fields-->
                                            @include('frontend.forms.text_field')
                                            <!-- /Text Field --->

                                                <!-- Date field ---->
                                                @include('frontend.forms.date_field')
                                                <!-- / Date field ---->

                                                <!-- Time2 field ---->
                                            @include('frontend.forms.time2_field')
                                                <!-- Time2 field ---->


                                                <!-- time fields --->
                                            @include('frontend.forms.time_field')
                                            <!-- Time fileds --->

                                                <!-- textarea fields --->
                                            @include('frontend.forms.textarea_fields')
                                            <!-- textarea field --->



                                                <div class="button--wrapper">
                                                    <button class="button__next">NEXT</button>
                                                </div>
                                            </div>

                                            <div class="step step--2">
                                                @include('frontend.forms.customer_location')
                                            </div>

                                            <div class="step step--3">
                                                @include('frontend.forms.service_provider')
                                            </div>
                                        </div>
                                    </aside>
                                    <aside class="col-lg-4 pr-0">
                                        <div class="aside__sticky">


                                            <div class="checkout--wrapper">
                                                <h2 class="title--description">Service Name : {{$service->name}}</h2>
                                                <button type="submit" id="orderSubmitButton" class="checkout" disabled="">
                                                    @if($service->quotable_service == 1)
                                                        Get Quotes 
                                                    @else 
                                                        <span id="checkout-text">Proceed <!--to payment --></span>  
                                                    @endif
                                                </button>
                                                <br>
                                                <small class="para text-danger" id="fill--form--text">*Fill the form before submitting </small>
                                            </div>


                                        </div>
                                    </aside>
                                </div>
                            </form>
                        </div>
                        @else
                        <h3 class="text-center" style="margin: 100px"> Currently No service provider available for this service</h3>
                    @endif

        @else

                     <h3 class="text-center" style="margin: 100px">Sorry , Currently this service is unavailable .</h3>
        @endif


        {{--<form action="{{route('telr.payment')}}" method="post">--}}
            {{--@csrf--}}
            {{--<button style="margin-right: 0px">Test Tlr  Order</button>--}}
        {{--</form>--}}


    </main>


    <!-- Modal -->
    @foreach($service->users as$key=> $provider)
        @if(isPriceForServiceDefined($provider->id , $service->id))
            <div class="modal fade " id="provider-{{$provider->id}}" data-backdrop="static" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content checkout--wrapper">
                        <div class="modal-header">
                            <h2 class="title--description">Company Name : {{$provider->name}} </h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="material-icons">close</span>
                            </button>
                        </div>
                        <ul>
                            <li><span>Conatact Person :{{$provider->details->contact_person}}</span></li>
                            <li><span>Number : {{$provider->details->contact_number}}</span></li>
                            <li><span>Website : {{$provider->details->website}}</span> Local Moving</li>

                        </ul>

                        <div class="modal-footer">

                            <span  style="margin-right: 9em !important;"><a href="{{route('service.provider.included',['provider_name'=>\Illuminate\Support\Str::slug($provider->name),'provider_id'=>$provider->id,'service_name'=>$service->name,'service_id'=>$service->id])}}">What Included</a></span>
                            <span style="padding-right: 0px !important;"><a href="{{route('service.provider.terms',['provider_name'=>\Illuminate\Support\Str::slug($provider->name),'provider_id'=>$provider->id,'service_name'=>$service->name,'service_id'=>$service->id])}}">Terms & Conditions</a></span>

                        </div>
                    </div>


                </div>
            </div>
        @endif
    @endforeach



@endsection

@push('script')

<script type="text/javascript" src="{{asset('frontend/js/formjs.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/wickedpicker.min.js')}}"></script>
<script src="https://parsleyjs.org/dist/parsley.js"></script>

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





    $('.suggestVendor').click(function(){

       document.getElementById('checkout-text').innerHTML ="Proceed For Checkout"

    });


    $('.normalCheckout').click(function(){

        document.getElementById('checkout-text').innerHTML ="Proceed For Telr Payment"

    });

    $(document).ready(function() {
        $('.timepicker').wickedpicker();




    });


    $(document).ready(function() {



        var select=$('.form-group select');
        let offset = $('.progressive--wrapper').offset();
        const slideHide = ()=>{
            $('.step').hide('300');
            $('html, body').scrollTop(offset.top)

        }
        const slideShow = elem=>{
            elem.show('300');
            elem.addClass('active');

            $('html, body').animate({
                scrollTop: offset.top,
            }, 300);
        }

        var valueAdd= (100/($('.progressive--wrapper .label span').length-1));

        $('.progress-bar').css('width',valueAdd+'%');

        var tempValue= valueAdd;

        const progressInc= ()=>{
            tempValue+=valueAdd;
            $('.progress-bar').css('width',tempValue+'%');
        }

        const progressDec= ()=>{
            tempValue-=valueAdd;
            $('.progress-bar').css('width',tempValue+'%');

        }

//        $('#validate_form').parsley();
//        $('#validate_form_part_one').parsley();

        // step 01


        $('.step.step--1 .button__next').click((e)=>{
            e.preventDefault();

            var dateForPest = $('.dateForPestControl').val();


            if(dateForPest != '')
            {
                slideHide();
                slideShow($('.step.step--2'));
            }else {
                slideHide();
                slideShow($('.step.step--1'));

                if($('#validate_form').parsley().validate()) {

                    $('.checkout--wrapper button.checkout').removeAttr('disabled');
                    $('#fill--form--text').hide();
                }else {

                    $('.checkout--wrapper button.checkout').attr('disabled','');
                    $('#fill--form--text').show();
                }
                return;
            }




//        slideShow($('.step.step--2'));

        progressInc();
        $(e.target).parents('.step').removeClass('active');

        $('.progressive--wrapper .label span:nth-child(2)').addClass('active');

        if($('#validate_form').parsley().validate()) {

            $('.checkout--wrapper button.checkout').removeAttr('disabled');
            $('#fill--form--text').hide();
        }else {

            $('.checkout--wrapper button.checkout').attr('disabled','');
            $('#fill--form--text').show();
        }
    });

        // step 02
        $('.step.step--2 .button__next').click((e)=>{
            e.preventDefault();
        slideHide();
        slideShow($('.step.step--3'));
        progressInc();
        $(e.target).parents('.step').removeClass('active');
        $('.progressive--wrapper .label span:nth-child(3)').addClass('active');
        $('.checkout--wrapper button.checkout').removeAttr('disabled');

        // $('button.select--button').show();

    });

        $('.step.step--2 .button__prev').click((e)=>{
            e.preventDefault();
        slideHide();
        progressDec();
        slideShow($('.step.step--1'));
        $(e.target).parents('.step').removeClass('active')
        $(e.target).parents('.step').prev().addClass('active');
        $('.progressive--wrapper .label span:nth-child(2)').removeClass('active');
    })

        // step 03
        $('.step.step--3 .button__next').click((e)=>{
            e.preventDefault();
        slideHide();
        slideShow($('.step.step--4'));
        progressInc();
        $(e.target).parents('.step').removeClass('active');
        $('.progressive--wrapper .label span:nth-child(4)').addClass('active');

    });

        $('.step.step--3 .button__prev').click((e)=>{
            e.preventDefault();
        slideHide();
        progressDec();
        slideShow($('.step.step--2'));
        $(e.target).parents('.step').removeClass('active')
        $(e.target).parents('.step').prev().addClass('active');
        $('.progressive--wrapper .label span:nth-child(3)').removeClass('active');
        $('.checkout--wrapper button.checkout').attr('disabled','')

    });
        $('.checkout--wrapper button.checkout').click(()=>{
            $('.progress-bar').css('width','100%');
        $('.progressive--wrapper .label span:last-child').addClass('active');
    })

        // $('input[type=date]').hover(function(e){
        // 	$(this).focus();
        // 	$(this).click();
        // 	$(this).parent().data("DateTimePicker").show();
        // })

        // $('input[type=date]').datetimepicker({
        // 	allowInputToggle: true
        // });







    });








</script>
@endpush