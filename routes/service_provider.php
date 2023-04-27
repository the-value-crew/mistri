<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 6/26/2020
 * Time: 1:54 AM
 */



Route::group(['namespace'=>'ServiceProvider','prefix'=>'service-provider','middleware'=>['auth:web','vendor']],function(){
    Route::get('dashboard','ServiceProviderController@index')->name('service.provider.dashboard');
    Route::get('account-detail','ServiceProviderController@accountDetail')->name('account.detail');
    Route::post('account-detail','ServiceProviderController@updateAccountDetail')->name('update.account.detail');
    Route::resource('service-order','ServiceOrderController');
    Route::post('update-order-status/{id}','ServiceOrderController@updateOrderStatus')->name('update.status');
    Route::resource('my-service','ServiceController');
    Route::resource('available-on','AvailabilityController');


    Route::get('subscribtion/my-plans','SubscribtionController@myPlans')->name('my.plans');
    Route::resource('subscribtion','SubscribtionController');

    Route::get('services-status','ServiceController@serviceStatus')->name('service.status');
    Route::get('service-request-delete/{id}','ServiceController@del')->name('del');


    /** Pest Control Service */
    Route::get('update-pest-control-charge','ServiceController@getPestControlCharge')->name('update.pestControl.charge');
    Route::post('update-apartment-pest-control/{treatment_type_id}','ServiceController@updateApartmentPestControl')->name('vendor.updateApartment.pestControl');
    Route::post('update-villa-pest-control/{treatment_type_id}','ServiceController@updateVillaPestControl')->name('vendor.updateVilla.pestControl');
    Route::post('update-office-pest-control/{treatment_type_id}','ServiceController@updateOfficePestControl')->name('vendor.updateOffice.pestControl');


    Route::get('change-password','ServiceProviderController@changePassword')->name('vendor.change.password');
    Route::post('change-password','ServiceProviderController@changePasswordSubmit')->name('vendor.change.password');


});


Route::prefix('service-provider')->group(function(){

    Route::get('/register','Auth\ServiceProviderRegisterController@showRegistrationForm')->name('service.provider.register');
    Route::post('/register','Auth\ServiceProviderRegisterController@register')->name('service.provider.register.submit');
    Route::post('/login','Auth\LoginController@vendorLogin')->name('vendor.login');
});

Route::get('mark-read/{id}/{order_id}','Admin\NotificationController@markRead')->name('mark.read');
Route::get('set-provider-password/{token}','Auth\ProviderResetPasswordController@showProviderPasswordSetForm')->name('provider.password.set');
Route::post('set-provider-password','Auth\LoginController@reset')->name('set.provider.password');