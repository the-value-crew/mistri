<?php

Route::group(['namespace'=>'Frontend'],function(){

    Route::get('/','WebsiteController@index')->name('home-page');
    Route::get('testimonials','WebsiteController@testimonial')->name('testimonial');
    Route::get('about-us','WebsiteController@about')->name('aboutus');
    Route::get('contact-us','WebsiteController@contact')->name('contactus');
    Route::get('frequently-asked-question','WebsiteController@faq')->name('faq');
    Route::get('how-it-work','WebsiteController@work')->name('work');

    Route::get('our-services','WebsiteController@ourServices')->name('our.services');
    Route::get('terms-and-conditions','WebsiteController@terms')->name('terms');
    Route::get('privacy-policy','WebsiteController@privacy')->name('privacy');

    Route::get('view-all-service-categories','WebsiteController@viewAllServiceCategory')->name('view.all');

    Route::post('service-enquiry','WebsiteController@service_enquiry')->name('service.enquiry');
    Route::post('general-enquiry','WebsiteController@general_enquiry')->name('general.enquiry');

    Route::get('/{slug}/categories','WebsiteController@service_category')->name('sub.categories');
    Route::get('services-by-category/{slug}','WebsiteController@servicesByCategory')->name('servicesByCategory');
    Route::get('/book-service/{slug}/{category_id}','WebsiteController@book_service')->name('book.service');

    Route::get('search','WebsiteController@searchResult')->name('search');
    Route::get('provider-detail/{id}/{slug}','WebsiteController@providerDetail')->name('provider.detail');

    Route::get('service-provider-detail/{id}/{service_id}','WebsiteController@serviceProviderDetail');

    Route::post('refer-to-friend','WebsiteController@referFriend')->name('refer.friend')->middleware('auth');

    Route::get('{provider_name}/{provider_id}/{service_name}/{service_id}/includes','WebsiteController@serviceProviderIncluded')->name('service.provider.included');
    Route::get('{provider_name}/{provider_id}/{service_name}/{service_id}/terms-and-conditions','WebsiteController@serviceProviderTerms')->name('service.provider.terms');


});



Route::group(['namespace'=>'Frontend','middleware'=>['auth']],function(){
    Route::get('/my-profile','WebsiteController@profile')->name('profile');
    Route::post('/edit-profile','WebsiteController@editProfile')->name('edit.profile');
    Route::post('service-request/{service_id}','WebsiteController@service_request')->name('service.request');
    Route::post('change-password','WebsiteController@changePassword')->name('change.password');




});

// Google login
Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

// Facebook login
Route::get('login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);



// Telr integration

Route::group(['namespace'=>'Frontend','middleware'=>['auth']],function(){
    Route::post('telr-payment/{id}',[\App\Http\Controllers\Frontend\PaymentController::class,'place_order'])->name('telr.payment');

    Route::get('/handle-payment/success',[\App\Http\Controllers\Frontend\PaymentController::class,"success"]);
    Route::get('/handle-payment/cancel',[\App\Http\Controllers\Frontend\PaymentController::class,"cancel"]);
    Route::get('/handle-payment/declined',[\App\Http\Controllers\Frontend\PaymentController::class,"declined"]);
});
