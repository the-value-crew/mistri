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
                <input  class="custom-control-input" type="radio" name="home_size"   value="Studio" id="studio"  checked="true">
                <label for="studio"  class="custom-control-label">Studio</label>
            </div>

            <div class="custom-control custom-checkbox ">
                <input  class="custom-control-input" type="radio" name="home_size"   value="1 BHK" id="bhk1"  checked="true">
                <label for="bhk1"  class="custom-control-label">1 BHK</label>
            </div>

            <div class="custom-control custom-checkbox ">
                <input  class="custom-control-input" type="radio" name="home_size"   value="2 BHK" id="bhk12"  checked="true">
                <label for="bhk12"  class="custom-control-label">2 BHK</label>
            </div>

            <div class="custom-control custom-checkbox ">
                <input  class="custom-control-input" type="radio" name="home_size"   value="3 BHK" id="bhk13"  checked="true">
                <label for="bhk13"  class="custom-control-label">3 BHK</label>
            </div>

            <div class="custom-control custom-checkbox ">
                <input  class="custom-control-input" type="radio" name="home_size"   value="4 BHK" id="bhk14"  checked="true">
                <label for="bhk14"  class="custom-control-label">4 BHK</label>
            </div>

            <div class="custom-control custom-checkbox ">
                <input  class="custom-control-input" type="radio" name="home_size"   value="5 BHK" id="bhk15"  checked="true">
                <label for="bhk15"  class="custom-control-label">5 BHK</label>
            </div>

            <div class="custom-control custom-checkbox ">
                <input  class="custom-control-input" type="radio" name="home_size"   value="Other" id="other"  checked="true">
                <label for="other"  class="custom-control-label">Other</label>
            </div>


        </div>
    </div>




</div>

<div id="Commercial" class="tabcontent" style="display: none">
    <h6>Office Specification</h6>
    <div class="row">
        <div class="col-md-4 form-group col-4">
            <label for="buildig">Office Size (Sq Ft)</label>
            <input type="text" name="office_size" class="form-control" id="buildig">
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
    <label  for="time">Choose your convenient time</label>
    <input type="time" name="time" id="time" class="form-control" >
</div>

<div class="form-group">
    <label  for="datePicker">Select date</label>
    <input type="date" name="date" id="datePicker" class="form-control"  style="position: relative !important;">
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