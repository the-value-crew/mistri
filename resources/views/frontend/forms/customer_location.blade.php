<div class="card--wrapper ">
    <h2 class="card__title">Home</h2>
    <div class="form-row">
        <div class="form-group col-12 col-sm-6">
            <label for="street--name">Name</label>
            <input type="text" placeholder="Enter  name" name="name" @auth value="{{Auth::user()->name}}" @endauth class="form-control" id="street--name" required="">
        </div>
        <div class="form-group col-sm-6">
            <label for="contactN">Contact No</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <select class="custom-select" id="employeN" name="country_code">
                        <option value="+977">
                            NEP
                        </option>
                    </select>
                </div>
                <input type="tel" name="phone" @auth value="{{Auth::user()->phone}}" @endauth  class="form-control" id="contactN" placeholder="" required="">

            </div>
        </div>
        <div class="form-group col-12">
            <label for="buildig">Email</label>
            <input type="email" name="email"   @auth value="{{Auth::user()->email}}" @endauth placeholder="Enter email" class="form-control  " id="buildig">
        </div>

        <div class="form-group col-12">

            <label for="fill--addr">Full address
                <small> (Type your address, or drag the red marker to your exact location)</small>
            </label>
            <input type="text" name="fulladdress" @auth value="{{Auth::user()->userdetail->fulladdress}}" @endauth  class="form-control" id="fill--addr" placeholder="Enter a location" autocomplete="off" required="">
        </div>
        <div class="form-group col-12 col-sm-6">
            <label for="street--name">Street name</label>
            <input type="text" name="street" @auth value="{{Auth::user()->userdetail->street}}" @endauth placeholder="Enter a street name" class="form-control  " id="street--name" required="">
        </div>
        <div class="form-group col-12 col-sm-6">
            <label for="buildig">Building</label>
            <input type="text" name="building" @auth value="{{Auth::user()->userdetail->building}}" @endauth placeholder="Enter a building name or number" class="form-control  " id="buildig" required="">
        </div>
        <div class="col-md-6 ">
            <label for="flat">flat/room number</label>
            <input type="text" name="flat_number" @auth value="{{Auth::user()->userdetail->flat_number}}" @endauth  placeholder="Enter a Flat/room number" class="form-control  " id="flat" required="">
        </div>
        <div class="col-md-6 ">
            <label for="Additional Direction">Additional Direction</label>
            <input type="text" name="addtional_direction"  @auth value="{{Auth::user()->userdetail->addtional_direction}}" @endauth  placeholder="Enter a Flat/room number" class="form-control  " id="Additional Direction" required="">
        </div>

    </div>
</div>

<div class="button--wrapper">
    <button class="button__prev">Prev</button>

    <button class="button__next">Next</button>
</div>