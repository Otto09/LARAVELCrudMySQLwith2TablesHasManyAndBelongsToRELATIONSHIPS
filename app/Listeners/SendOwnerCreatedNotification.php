<?php

namespace App\Listeners;

use App\Events\OwnerCreated;
use App\Mail\OwnerCreated as OwnerCreatedMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendOwnerCreatedNotification
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
     * @param  OwnerCreated  $event
     * @return void
     */
    public function handle(OwnerCreated $event)
    {
        \Mail::to($event->owner->user->email)->send(
        new OwnerCreatedMail($event->owner)
        );
    }
}
