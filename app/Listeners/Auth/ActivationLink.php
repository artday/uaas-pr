<?php

namespace App\Listeners\Auth;

use App\Events\Auth\UserSignedUp;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ActivationLink implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param  UserSignedUp  $event
     * @return void
     */
    public function handle($event)
    {
        $event->user->hasActivated() ?
            request()->session()->forget('request_activation_link'):
            request()->session()->put('request_activation_link', 'true');
    }
}
