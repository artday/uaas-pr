<?php

namespace App\Providers;

use App\Models\ConfirmationToken;
use Illuminate\Support\Facades\DB;
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

        /* Validate is true table column. Example: 'email'=>'is_true:user,activated' */
        Validator::extend('is_true', function ($attribute, $value, $parameters, $validator){
            $user = DB::table($parameters[0])->where($attribute, $value)->where($parameters[1], true)->first();
            return($user && $user->$attribute === $value);
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
