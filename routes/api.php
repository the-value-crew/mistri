<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/





Route::namespace('Api')->group(function () {
    Route::post('/reg', 'RegisterController@register');
    Route::post('/login', 'LoginController@login');
    Route::post('social-signup', 'RegisterController@social_signup');

    Route::get('get_categories','CategoryController@allCategories');
    Route::get('get_sub_categories/{id}','CategoryController@subCategory')->name('sub.category');

    Route::get('services','ServiceController@services');
    Route::get('treatment-types','ServiceController@getPestControlTypes');
    Route::get('trending-service','ServiceController@trendingService');
    Route::get('search', 'ServiceController@search');

    Route::get('get-fields','ServiceFieldController@fields');
    Route::get('privacy-policy','ApiController@privacyPolicy');
    Route::get('terms-and-conditions','ApiController@termsAndConditions');

    Route::post('feedback','ApiController@feedback');


//    Route::get('service-by-category/{id}','ServiceFieldController@serviceByCategory');
    Route::get('service-by-category','ServiceFieldController@serviceByCategory');


    Route::get('get-service-provider','ServiceController@getServiceProvider');
    Route::get('provider-other-detail','ServiceController@getProviderDetail')->name('provider.orher.detail');

});


Route::group(['namespace'=>'Api','middleware'=>'auth:api'],function(){
    Route::get('get_user_profile','ApiController@getUserProfile');
    Route::post('update-profile','ApiController@updateProfile');
    Route::get('customer-order-details','OrderController@getOrders');
    Route::post('place-order','OrderController@placeOrder');

    Route::post('logout','ApiController@logout');

//    Route::post('place-pestcontrol-order','OrderController@pestControlOrder');
//    Route::post('place-paint-order','OrderController@paintOrder');
//    Route::post('place-deepcleaning-order','OrderController@deepCleanOrder');
//    Route::post('place-sanitization-order','OrderController@sanitizationOrder');

});

