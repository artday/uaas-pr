<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index');

/*
 * Account
 */
Route::group(['prefix'=>'account', 'middleware'=>['auth'], 'as'=>'account.'], function(){
    Route::get('/', 'Account\AccountController@index')->name('index');

    /*
     * Profile
     */
    Route::get('/profile', 'Account\ProfileController@index')->name('profile.index');
    Route::post('/profile', 'Account\ProfileController@store')->name('profile.store');
});
