<?php

namespace App\Listeners\Account;

use Illuminate\Support\Facades\Mail;
use App\Mail\Account\PasswordUpdated;
use App\Events\Account\PasswordUpdate;

class SendPasswordUpdateEmail
{

    /**
     * Handle the event.
     *
     * @param  PasswordUpdate  $event
     * @return void
     */
    public function handle(PasswordUpdate $event)
    {
        Mail::to($event->user)->send(new PasswordUpdated());
    }
}
