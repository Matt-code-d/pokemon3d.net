<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [SendEmailVerificationNotification::class],
        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
            \SocialiteProviders\Twitch\TwitchExtendSocialite::class.'@handle',
        ],
        'Illuminate\Auth\Events\Login' => [
            \App\Listeners\Auth\UpdateUserTimezone::class,
            \App\Listeners\Auth\UpdateUserGameJoltData::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}

