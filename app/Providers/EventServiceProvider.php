<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Account\PasswordUpdate' => [
            'App\Listeners\Account\SendPasswordUpdateEmail',
        ],
        'App\Events\Account\Deactivate' => [
            'App\Listeners\Account\Deactivate',
        ],
        'App\Events\Auth\UserSignedUp' => [
            'App\Listeners\Auth\SendActivationEmail',
            'App\Listeners\Auth\ActivationLink',
        ],
        'App\Events\Auth\UserRequestedActivationEmail' => [
            'App\Listeners\Auth\SendActivationEmail',
            'App\Listeners\Auth\ActivationLink',
        ],
        'App\Events\Auth\ToggleActivationLink' => [
            'App\Listeners\Auth\ActivationLink',
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
