<?php

namespace App\Listeners;

use App\Events\PublishEvent;
use App\Mail\PostPublishedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class PublishListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(PublishEvent $event): void
    {

        Mail::to($event->post->user->email)->send(new PostPublishedMail($event->post));
    }
}
