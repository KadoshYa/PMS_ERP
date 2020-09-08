<?php

namespace App\Listeners;

use IlluminateAuthEventsAttempting;

use Illuminate\Auth\Events\Attempting;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\Session;
use Spatie\Activitylog\Models\Activity;

class Attempt
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
     * @param  Attempting  $event
     * @return void
     */
    public function handle(Attempting $event)
    {
        $event->subject = 'attempt';
        $event->description = 'Attempt Login';
        
        activity($event->subject)
                ->log($event->description);
    }
}
