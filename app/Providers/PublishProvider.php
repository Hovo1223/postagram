<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\PublishEvent;
use App\Listeners\PublishListener;

class PublishProvider extends ServiceProvider
{
    /**
     * Register services.
     */

    protected $listen = [
    \App\Events\PublishEvent::class => [
        \App\Listeners\PublishListener::class,
    ],
];


    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        
    }
}
