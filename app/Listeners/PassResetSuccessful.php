<?php

namespace App\Listeners;

use IlluminateAuthEventsPasswordReset;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\Session;
use Spatie\Activitylog\Models\Activity;

class PassResetSuccessful
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
     * @param  PasswordReset  $event
     * @return void
     */
    public function handle(PasswordReset $event)
    {
        $event->subject = 'Password Reset';
        $event->description = 'Reset Password';
        
        activity($event->subject)
                ->by($event->user)
                ->log($event->description);
    }
}
