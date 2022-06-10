<?php

namespace App\Listeners;

use App\Events\UpdateTaskPerformersEvent;
use App\Notifications\TaskAssigned;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class UpdateTaskPerformersListener
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
     * @param  UpdateTaskPerformersEvent  $event
     * @return void
     */
    public function handle(UpdateTaskPerformersEvent $event)
    {
        Notification::send($event->task->getNewPerformers(), new TaskAssigned($event->task));
    }
}
