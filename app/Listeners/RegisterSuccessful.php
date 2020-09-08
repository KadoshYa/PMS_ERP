<?php

namespace App\Listeners;

use IlluminateAuthEventsRegistered;

use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\Session;
use Spatie\Activitylog\Models\Activity;

class RegisterSuccessful
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $event->subject = 'Register';
        $event->description = 'Registered Successfully';
        
        activity($event->subject)
                ->by($event->user)
                ->log($event->description);        
    }
}
