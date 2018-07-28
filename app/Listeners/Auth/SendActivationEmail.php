<?php

namespace App\Listeners\Auth;

use App\Events\Auth\UserSignedUp;
use App\Mail\Auth\ActivationEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendActivationEmail implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param  UserSignedUp  $event
     * @return void
     */
    public function handle(UserSignedUp $event)
    {
        Mail::to($event->user)->send(new ActivationEmail($event->user->generateConfirmationToken()));
    }
}
