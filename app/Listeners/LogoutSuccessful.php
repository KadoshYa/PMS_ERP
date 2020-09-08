<?php

namespace App\Listeners;

use IlluminateAuthEventsLogout;

use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\Session;
use Spatie\Activitylog\Models\Activity;

class LogoutSuccessful
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
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        $event->subject = 'logout';
        $event->description = 'Successful Logout';
        
        activity($event->subject)
                ->by($event->user)
                ->log($event->description);
    }
}
