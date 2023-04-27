@extends('admin.layouts.master')
@section('title','Admin Home')

@section('content')
    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                        <i class="material-icons">perm_identity</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Profile</p>
                    </div>
                    <div class="clearfix"></div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-info">label</i>
                            <a href="{{route('admin.edit.profile')}}">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">settings</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Setting</p>

                        <h3 class="card-title"></h3>
                    </div>
                    <div class="clearfix"></div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-danger">label</i>
                            <a href="{{route('setting.index')}}">Manage Setting</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="rose">
                        <i class="material-icons">library_books</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Pages</p>
                        <h3 class="card-title"></h3>
                    </div>
                    <div class="clearfix"></div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-rose">label</i>
                            <a href="{{route('page.index')}}">Manage Pages</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">bento</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Service Category</p>
                    </div>
                    <div class="clearfix"></div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-dark">label</i>
                            <a href="{{route('service-category.index')}}">Manage Service Category</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row" style="margin-top: 30px">
            <div class="col-lg-2 col-md-6 col-sm-6">
                <b>Currency</b>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <input type="text" id="currency" value="{{$currency}}" onchange="changeCurrency()">
            </div>

            <div class="col-md-1"></div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <b>Points for 1 {{$currency}}</b>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <input type="text" id="pointsPerCurrency" value="{{$points_per_currency}}" onchange="changePointsPerCurrency()">
            </div>

        </div>

        <div class="row" style="margin-top: 30px">
            <div class="col-lg-2 col-md-6 col-sm-6">
                <b>Points for Referrer</b>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <input type="text" id="pointsForReferrer" value="{{$points_for_referrer}}" onchange="pointsForReferrer()">
            </div>

            <div class="col-md-1"></div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <b>Points for Referral Code User</b>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <input type="text" id="pointsForRefercodeUser" value="{{$points_for_refercode_user}}" onchange="pointsForRefercodeUser()">
            </div>

        </div>


    </div>
@endsection

@push('scripts')

<script>
    function changeCurrency(){
        var currency = document.getElementById("currency").value;
        $.ajax({
            type: 'get',
            dataType: 'html',
            url: "{{url('admin/change-currency/')}}/"+currency,
            success: function (response) {
                alert("Currency Changed Successfully");
                console.log(response)

            }
        });


    }

    function changePointsPerCurrency(){

        var pointsPerCurrency = document.getElementById("pointsPerCurrency").value;
        $.ajax({
            type: 'get',
            dataType: 'html',
            url: "{{url('admin/change-points-per-aed/')}}/"+pointsPerCurrency,
            success: function (response) {
                alert("Point value Changed Successfully");
                console.log(response)

            }
        });

    }

    function pointsForReferrer() {

        var pointsForReferrer = document.getElementById("pointsForReferrer").value;
        $.ajax({
            type: 'get',
            dataType: 'html',
            url: "{{url('admin/points-for-referrer/')}}/"+pointsForReferrer,
            success: function (response) {
                alert("Point value Changed Successfully");
                console.log(response)

            }
        });
    }

    function pointsForRefercodeUser() {

        var pointsForRefercodeUser = document.getElementById("pointsForRefercodeUser").value;
        $.ajax({
            type: 'get',
            dataType: 'html',
            url: "{{url('admin/points-for-refercode-user/')}}/"+pointsForRefercodeUser,
            success: function (response) {
                alert("Point value Changed Successfully");
                console.log(response)

            }
        });
    }
</script>
@endpush







