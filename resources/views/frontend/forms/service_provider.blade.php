<div class="card--wrapper ">
    <h2 class="card__title">Choose Your Service Provider</h2>


    <div class="form-group">
        <section class="plan ">
            <div class="custom-control custom-checkbox select--button ">
                <input  class="custom-control-input @if($service->quotable_service == 0) suggestVendor @endif" type="radio" name="provider_id" id="select-button" value="suggest_vendor"  checked="false">
                <label for="select-button"  class="custom-control-label">
                    <h2 class="card__title">Let us select Company for you</h2>

                </label>
            </div>
            <p class="text-center text-muted">OR</p>

                    <div class="checkbox--wrapper row">
                        @foreach($service->users as$key=> $provider)
                            @if(isPriceForServiceDefined($provider->id , $service->id))
                                <div class="custom-control custom-checkbox col-xl-4 col-sm-6 ">
                                    <input  class="custom-control-input normalCheckout" type="radio" name="provider_id" id="servicep0-{{$key}}" value="{{$provider->id}}" checked="false">
                                    <label for="servicep0-{{$key}}"  class="custom-control-label">
                                        <h2 class="card__title">{{$provider->name}}</h2>
                                        <p class="price" style="font-size: 14px">Min Service Charge :NPR {{minServiceCharge($service->id,$provider->id)}}</p>
                                        <a href="#!" data-toggle="modal" data-target="#provider-{{$provider->id}}">Details</a>
                                    </label>
                                </div>
                            @endif
                        @endforeach
                    </div>

        </section>
    </div>
</div>
<!--  -->





<div class="button--wrapper">
    <button class="button__prev">Prev</button>
</div>