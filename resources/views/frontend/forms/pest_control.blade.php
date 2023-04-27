<div class="form-group">
    <label for="Premises"><b>Premises Type</b></label>
    <div class="checkbox--wrapper">
        <div class="custom-control custom-checkbox ">
            <input  class="custom-control-input premises-type" type="radio" name="premises_type"  onclick="openCity(event, 'Residential')"  value="Residential" id="residential123" checked="false">
            <label for="residential123"  class="custom-control-label premises-type">Residential</label>
        </div>
        <div class="custom-control custom-checkbox ">
            <input  class="custom-control-input" type="radio" name="premises_type" onclick="openCity(event, 'Commercial')"  value="Commercial" id="commercial123">
            <label for="commercial123"  class="custom-control-label">Commercial</label>
        </div>
    </div>

</div>



<div id="Residential" class="tabcontent">

    <div class="form-group">
        <label for="Premises">Home Type</label>
        <div class="checkbox--wrapper">
            <div class="custom-control custom-checkbox ">
                <input  class="custom-control-input" type="radio" name="home_type"   value="Apartment" id="apartment"  checked="true">
                <label for="apartment"  class="custom-control-label">Apartment</label>
            </div>
            <div class="custom-control custom-checkbox ">
                <input  class="custom-control-input" type="radio" name="home_type"  value="Villa" id="villa" checked="false">
                <label for="villa"  class="custom-control-label">Villa</label>
            </div>
        </div>
    </div>


    <div class="form-group">
        <label for="Premises">Home Size</label>
        <div class="checkbox--wrapper">

            <div class="custom-control custom-checkbox ">
                <input  class="custom-control-input" type="radio" name="home_size"   value="studio" id="studio"  checked="true">
                <label for="studio"  class="custom-control-label">Studio</label>
            </div>

            <div class="custom-control custom-checkbox ">
                <input  class="custom-control-input" type="radio" name="home_size"   value="bhk1" id="bhk1"  checked="true">
                <label for="bhk1"  class="custom-control-label">1 BHK</label>
            </div>

            <div class="custom-control custom-checkbox ">
                <input  class="custom-control-input" type="radio" name="home_size"   value="bhk2" id="bhk12"  checked="true">
                <label for="bhk12"  class="custom-control-label">2 BHK</label>
            </div>

            <div class="custom-control custom-checkbox ">
                <input  class="custom-control-input" type="radio" name="home_size"   value="bhk3" id="bhk13"  checked="true">
                <label for="bhk13"  class="custom-control-label">3 BHK</label>
            </div>

            <div class="custom-control custom-checkbox ">
                <input  class="custom-control-input" type="radio" name="home_size"   value="bhk4" id="bhk14"  checked="true">
                <label for="bhk14"  class="custom-control-label">4 BHK</label>
            </div>

            <div class="custom-control custom-checkbox ">
                <input  class="custom-control-input" type="radio" name="home_size"   value="bhk5" id="bhk15"  checked="true">
                <label for="bhk15"  class="custom-control-label">5 BHK</label>
            </div>

            {{--<div class="custom-control custom-checkbox ">--}}
                {{--<input  class="custom-control-input" type="radio" name="home_size"   value="Other" id="other"  checked="true">--}}
                {{--<label for="other"  class="custom-control-label">Other</label>--}}
            {{--</div>--}}


        </div>
    </div>




</div>

<div id="Commercial" class="tabcontent" style="display: none">
        <h6>Office Specification</h6>
        <div class="row">
            <div class="col-md-4 form-group col-4">
                <label for="buildig">Office Size (Sq Ft)</label>
                <input type="number" min="1" name="office_size" class="form-control" id="buildig" oninput="validity.valid||(value='');" max="2000">
            </div>
            <div class="col-md-4 form-group col-4">
                <label for="buildig">Number Of Cabin</label>
                <input type="text" name="number_of_cabin" class="form-control" id="buildig" >
            </div>
            <div class="col-md-4 form-group col-4">
                <label for="buildig">Number Of Desk</label>
                <input type="text" name="number_of_desk" class="form-control" id="buildig" >
            </div>

        </div>
</div>



    <div class="form-group">
        <label for="Premises">Treatment required for ?</label>
        <div class="checkbox--wrapper">
            <div class="custom-control custom-checkbox ">
                <input  class="custom-control-input" type="checkbox" name="treatment_for[]" id="treatment_for1" value="1"  checked="false">
                <label for="treatment_for1"  class="custom-control-label">Bed Bugs</label>
            </div>

            <div class="custom-control custom-checkbox ">
                <input  class="custom-control-input" type="checkbox" name="treatment_for[]" id="treatment_for2" value="4">
                <label for="treatment_for2"  class="custom-control-label">Cockroaches</label>
            </div>

            <div class="custom-control custom-checkbox ">
                <input  class="custom-control-input" type="checkbox" name="treatment_for[]" id="treatment_for3" value="7">
                <label for="treatment_for3"  class="custom-control-label">Ants</label>
            </div>


            <div class="custom-control custom-checkbox ">
                <input  class="custom-control-input" type="checkbox" name="treatment_for[]" id="treatment_for4" value="10">
                <label for="treatment_for4"  class="custom-control-label">Mosquitoes</label>
            </div>


            <div class="custom-control custom-checkbox ">
                <input  class="custom-control-input" type="checkbox" name="treatment_for[]" id="treatment_for5" value="2">
                <label for="treatment_for5"  class="custom-control-label">Flies</label>
            </div>

            <div class="custom-control custom-checkbox ">
                <input  class="custom-control-input" type="checkbox" name="treatment_for[]" id="treatment_for6" value="5">
                <label for="treatment_for6"  class="custom-control-label">Snake Control</label>
            </div>

            <div class="custom-control custom-checkbox ">
                <input  class="custom-control-input" type="checkbox" name="treatment_for[]" id="treatment_for7" value="8" >
                <label for="treatment_for7"  class="custom-control-label">Rodents</label>
            </div>
            {{--<div class="custom-control custom-checkbox ">--}}
                {{--<input  class="custom-control-input" type="checkbox" name="treatment_for[]" id="treatment_for8" value="11">--}}
                {{--<label for="treatment_for8"  class="custom-control-label">Ticks</label>--}}
            {{--</div>--}}
            <div class="custom-control custom-checkbox ">
                <input  class="custom-control-input" type="checkbox" name="treatment_for[]" id="treatment_for9" value="3">
                <label for="treatment_for9"  class="custom-control-label">Bees</label>
            </div>
            <div class="custom-control custom-checkbox ">
                <input  class="custom-control-input" type="checkbox" name="treatment_for[]" id="treatment_for10" value="6">
                <label for="treatment_for10"  class="custom-control-label">Termites</label>
            </div>
            {{--<div class="custom-control custom-checkbox ">--}}
                {{--<input  class="custom-control-input" type="checkbox" name="treatment_for[]" id="treatment_for11" value="Rats" >--}}
                {{--<label for="treatment_for11"  class="custom-control-label">Rats</label>--}}
            {{--</div>--}}
            <div class="custom-control custom-checkbox ">
                <input  class="custom-control-input" type="checkbox" name="treatment_for[]" id="treatment_for12" value="12">
                <label for="treatment_for12"  class="custom-control-label">Birds Control</label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label  for="time">Choose your convenient time</label>
        <input type="text" name="time" id="time" class="form-control timepicker" required>
    </div>

    <div class="form-group">
        <label  for="datePicker">Select date</label>
        <input type="date" name="date" id="datePicker" class="form-control dateForPestControl"  style="position: relative !important;" required>
    </div>




<script>


    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>