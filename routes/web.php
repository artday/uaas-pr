<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard', 'DashboardController@index');
});


/*
 * Account
 */
Route::group(['prefix'=>'account', 'middleware'=>['auth'], 'as'=>'account.'], function(){
    Route::get('/', 'Account\AccountController@index')->name('index');

    /*
     * Profile
     */
    Route::get('profile', 'Account\ProfileController@index')->name('profile.index');
    Route::post('profile', 'Account\ProfileController@store')->name('profile.store');

    /*
     * Password
     */
    Route::get('password', 'Account\PasswordController@index')->name('password.index');
    Route::post('password', 'Account\PasswordController@store')->name('password.store');

    /*
     * Deactivate
     */
    Route::get('deactivate', 'Account\DeactivateController@index')->name('deactivate.index');
    Route::post('deactivate', 'Account\DeactivateController@store')->name('deactivate.store');
});

Route::group(['prefix'=>'activation','middleware'=>['guest'], 'as'=>'activation.'], function(){
    Route::get('resend', 'Auth\ActivationResendController@index')->name('resend');
    Route::post('resend', 'Auth\ActivationResendController@store')->name('resend.store');

    Route::get('{confirmation_token}', 'Auth\ActivationController@activate')
        ->middleware('confirmation_token.expired:/')->name('activate');
});
