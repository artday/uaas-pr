<?php

namespace App\Providers;

use App\Models\ConfirmationToken;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Migration Default String Length to 191:: MySQL older than the 5.7.7
        Schema::defaultStringLength(191);

        /* Check if password is current password */
        Validator::extend('is_current_password', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value, auth()->user()->password);
        });

        Route::model('confirmation_token', ConfirmationToken::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
