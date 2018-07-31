<?php

namespace App\Listeners\Account;

use App\Events\Account\Deactivate as Event;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Deactivate
{


    /**
     * Handle the event.
     *
     * @param  Deactivate  $event
     * @return void
     */
    public function handle(Event $event)
    {
        // Set activated field to false
        $event->user->update([ 'activated' => false ]);

        // It will bi correct to email user about account suspending
    }
}
