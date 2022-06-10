<?php

namespace App\Listeners;

use App\Events\UpdateTaskEvent;
use App\Notifications\TaskAssigned;
use App\Notifications\TaskUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class UpdateTaskListener
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     * @param  UpdateTaskEvent  $event
     * @return void
     */
    public function handle(UpdateTaskEvent $event)
    {
        if(count($event->task->getNewPerformers()) > 0)
            Notification::send($event->task->getNewPerformers(), new TaskAssigned($event->task));

        if(count($event->task->getChanges()) > 0)
            Notification::send($event->task->getOriginalPerformers(), new TaskUpdated($event->task));

    }
}
