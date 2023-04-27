<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 6/14/2020
 * Time: 1:14 PM
 */

//Route::get('admin/home',function (){
//   return view('admin.index');
//});

Route::group(['namespace'=>'Auth','prefix'=>'admin'],function(){
    Route::get('/login','AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login','AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout','AdminLoginController@logout')->name('admin.logout');
});


Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'auth:admin'],function(){
    Route::get('dashboard','AdminController@index')->name('admin.dashboard');
    Route::get('edit-profile','AdminController@editProfile')->name('admin.edit.profile');
    Route::post('edit-profile','AdminController@editProfileSubmit')->name('edit.profile.submit');
    Route::get('change-password','AdminController@changePassword')->name('admin.change.password');
    Route::post('change-password','AdminController@changePasswordSubmit')->name('change.password.submit');

    Route::get('change-currency/{currency}','AdminController@changeCurrency')->name('change.currency');
    Route::get('change-points-per-aed/{pointsPerCurrency}','AdminController@pointsPerCurrency');
    Route::get('points-for-referrer/{points}','AdminController@pointsForReferrer');
    Route::get('points-for-refercode-user/{points}','AdminController@pointsForRefercodeUser');

    Route::get('setting','WebsiteController@setting')->name('admin.setting');
    Route::post('setting','WebsiteController@settingSubmit')->name('admin.setting.submit');

    Route::resource('setting','WebsiteController');
    Route::get('service-request','ServiceController@serviceRequest')->name('admin.service-request');
    Route::get('service-request/{vendor_id}/{vendor_name}','ServiceController@vendorServices')->name('vendor.service');


    Route::get('service-request-detail/{id}','ServiceController@serviceRequestDetail')->name('service.request.detail');
    Route::post('update-service-request','ServiceController@updateServiceRequest')->name('update.service.request');

    Route::resource('page','PageController');
    Route::resource('faq','FaqController');
    Route::resource('slider','SliderController');
    Route::resource('logo','LogoController');
    Route::resource('how-it-work','HowItWorkController');
    Route::resource('general-enquiry','GeneralEnquiryController');
    Route::resource('service-enquiry','ServiceEnquiryController');
    Route::resource('our-mission','OurMissionController');

    Route::resource('customer','CustomerController');

    Route::resource('city','CityController');

    /** Routes for orders */
    Route::get('order/pending-order','OrderController@pending')->name('order.pending');
    Route::get('order/confirmed-order','OrderController@confirmedOrder')->name('order.confirmed');
    Route::get('order/declined-order','OrderController@declinedOrder')->name('order.declined');
    Route::get('order/completed-order','OrderController@completedOrder')->name('order.completed');
    Route::get('order/suggest-vendor-to-customer','OrderController@suggestVendor')->name('order.suggest.vendor');
    Route::get('order/{id}/suggest-vendor','OrderController@suggestVendorToClient')->name('suggest.vendor');
    Route::post('order/{id}/suggest-vendor','OrderController@suggestVendorSubmit')->name('suggest.vendor');
    Route::resource('order','OrderController');

    /** Routes for subscribtion plan */
    Route::get('subscription-plan/subscribed-users','SubscribtionController@subscribedUsers')->name('subscribed.user');
    Route::get('subscribed-user/{id}','SubscribtionController@deleteSubscribedUser');
    Route::get('subscription-plan/{id}/show-detail','SubscribtionController@subscribedUserDetail')->name('subscribed.user.detail');
    Route::post('subscription-plan/{id}/update-detail','SubscribtionController@updateSubscribedUser')->name('update.subscribed.user');

    Route::resource('subscription-plan','SubscribtionController');

    Route::get('city/{city_name}/{city_id}','CityController@all_areas')->name('all.areas');
    Route::post('city/add-city','CityController@add_city')->name('location.store.city');



    Route::resource('service-category','ServiceCategoryController');
    Route::get('service-by-category/{id}/{slug}','ServiceController@serviceByCategory')->name('service.by.category');
    Route::put('service-category/changestatus/{id}','ServiceCategoryController@changestatus');
    Route::post('service-category/changepriority/{value}/{id}','ServiceCategoryController@changepriority');

    Route::resource('service','ServiceController');
    Route::post('service/change-priority/{value}/{id}/{category_id}','ServiceController@changepriority');

    Route::put('service/changeServiceStatus/{id}','ServiceController@changestatus');

    Route::get('create-form-for-service/{id}/{slug}/','ServiceController@createServiceForm')->name('create.form');
    Route::get('edit-form-for-service/{id}/{slug}/','ServiceController@editServiceForm')->name('edit.form');
    Route::post('store-service-field','ServiceController@storeServiceField')->name('store.service.field');


    Route::get('edit-service-text-field/{id}','ServiceFieldController@editTextField')->name('edit.textfield');
    Route::put('edit-service-text-field/{id}','ServiceFieldController@updateTextField')->name('update.textfield');
    Route::delete('delete-service-text-field/{id}','ServiceFieldController@deleteTextField')->name('delete.textfield');


    Route::get('edit-service-textarea-field/{id}','ServiceFieldController@editTextareaField')->name('edit.textareafield');
    Route::put('edit-service-textarea-field/{id}','ServiceFieldController@updateTextareaField')->name('update.textareafield');
    Route::delete('delete-service-textarea-field/{id}','ServiceFieldController@deleteTextareaField')->name('delete.textareafield');

    Route::get('edit-service-date-field/{id}','ServiceFieldController@editDateField')->name('edit.datefield');
    Route::put('edit-service-date-field/{id}','ServiceFieldController@updateDateField')->name('update.datefield');
    Route::delete('delete-service-date-field/{id}','ServiceFieldController@deleteDateField')->name('delete.datefield');

    Route::get('edit-service-time-field/{id}','ServiceFieldController@editTimeField')->name('edit.timefield');
    Route::put('edit-service-time-field/{id}','ServiceFieldController@updateTimeField')->name('update.timefield');
    Route::delete('time-option/{id}','ServiceFieldController@timeOptionDestroy');
    Route::delete('delete-service-time-field/{id}','ServiceFieldController@deleteTimeField')->name('delete.timefield');


    Route::get('edit-check-field-with-charge/{id}','ServiceFieldController@editCheckFieldWithCharge')->name('edit.checkFieldWithCharge');
    Route::put('edit-service-checkoption-field/{id}','ServiceFieldController@updateCheckFieldWithCharge')->name('update.checkFieldWithCharge');
    Route::delete('check-option-with-charge/{id}','ServiceFieldController@checkOptionWithChargeDestroy');
    Route::delete('check-field-with-charge/{id}','ServiceFieldController@checkFieldWithChargeDestroy')->name('delete.checkFieldWithCharge');

    Route::get('edit-check-field/{id}','ServiceFieldController@editCheckField')->name('edit.checkField');
    Route::put('edit-check-field/{id}','ServiceFieldController@updateCheckField')->name('update.checkField');
    Route::delete('check-option/{id}','ServiceFieldController@checkOptionDestroy');
    Route::delete('check-field/{id}','ServiceFieldController@checkFieldDestroy')->name('delete.checkField');


    Route::get('edit-radio-field-with-charge/{id}','ServiceFieldController@editRadioFieldWithCharge')->name('edit.radioFieldWithCharge');
    Route::delete('radio-option-with-charge/{id}','ServiceFieldController@radioOptionWithChargeDestroy');
    Route::put('edit-radio-field-with-charge/{id}','ServiceFieldController@updateRadioFieldWithCharge')->name('update.checkFieldWithCharge');
    Route::delete('radio-field-with-charge/{id}','ServiceFieldController@radioFieldWithChargeDestroy')->name('delete.radioFieldWithCharge');


    Route::get('edit-radio-field/{id}','ServiceFieldController@editRadioField')->name('edit.radioField');
    Route::delete('radio-option/{id}','ServiceFieldController@radioOptionDestroy');
    Route::put('edit-radio-field/{id}','ServiceFieldController@updateRadioField')->name('update.radioField');
    Route::delete('radio-field/{id}','ServiceFieldController@radioFieldDestroy')->name('delete.radioField');



    Route::get('edit-select-field-with-charge/{id}','ServiceFieldController@editSelectFieldWithCharge')->name('edit.selectFieldWithCharge');
    Route::delete('select-option-with-charge/{id}','ServiceFieldController@selectOptionWithChargeDestroy');
    Route::put('edit-select-field-with-charge/{id}','ServiceFieldController@updateSelectFieldWithCharge')->name('update.selectFieldWithCharge');
    Route::delete('select-field-with-charge/{id}','ServiceFieldController@selectFieldWithChargeDestroy')->name('delete.selectFieldWithCharge');


    Route::get('edit-select-field/{id}','ServiceFieldController@editSelectField')->name('edit.selectField');
    Route::delete('select-option/{id}','ServiceFieldController@selectOptionDestroy');
    Route::put('edit-select-field/{id}','ServiceFieldController@updateSelectField')->name('update.selectField');
    Route::delete('select-field/{id}','ServiceFieldController@selectFieldDestroy')->name('delete.selectField');


    /** Pest control Service */
    Route::post('update-residential-pest-control/{id}','ServiceController@updateResidentialPestControl')->name('update.residential.pestControl');
    Route::post('update-office-pest-control/{id}','ServiceController@updateOfficePestControl')->name('update.office.pestControl');
    /********  ???????????????  Delete later if not used  ******************/
    Route::get('service-sub-category','ServiceCategoryController@createSubCategory')->name('createSubCategory');
    Route::post('service-sub-category','ServiceCategoryController@storeSubCategory')->name('storeSubCategory');
    /********  ???????????????   ******************/


    Route::get('create/sub-category/{id}','ServiceCategoryController@create_subcategory')->name('create.subcategory');





    Route::resource('testimonial','TestimonialController');
    Route::resource('service-field','ServiceFieldController');
    Route::put('update-input-field/{id}','ServiceFieldController@updateField');
    Route::delete('delete-input-field/{id}','ServiceFieldController@deleteField');

    Route::resource('service-provider','ServiceProviderController');
    Route::get('service-provider-priority/{provider_id}','ServiceProviderController@setPriority')->name('provider.set-priority');
    Route::get('{vendor_name}/{id}/all-services','ServiceProviderController@allServices')->name('allServicesOfVendor');

    Route::post('assign-profit-percentage/{service_provider_id}','ServiceProviderController@assign_percentage')->name('assign.percentage');

    Route::get('change-service-status/{id}','ServiceProviderController@changeStatus');

    Route::get('delete-serviceprovider-service/{id}','ServiceProviderController@deleteServiceProviderService');
});
