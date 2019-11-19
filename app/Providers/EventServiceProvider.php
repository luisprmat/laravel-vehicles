<?php

namespace App\Providers;

use App\Listeners\LogLastLogin;
use Illuminate\Auth\Events\{Login, Logout, Registered};
use App\Listeners\{UpdateLastLoggedAt, LogSuccessfulLogout};
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
        Login::class => [
            LogLastLogin::class,
            UpdateLastLoggedAt::class,
        ],
        Logout::class => [
            LogSuccessfulLogout::class,
        ]
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
