<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'Illuminate\Auth\Events\Login' => ['App\Listeners\LoginSuccessful'],
        'Illuminate\Auth\Events\Failed' => ['App\Listeners\Fail'],
        'Illuminate\Auth\Events\Attempting' => ['App\Listeners\Attempt'],
        'Illuminate\Auth\Events\Logout' => ['App\Listeners\LogoutSuccessful'],
        'Illuminate\Auth\Events\PasswordReset' => ['App\Listeners\PassResetSuccessful'],
        'Illuminate\Auth\Events\Registered' => ['App\Listeners\RegisterSuccessful'],





    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
