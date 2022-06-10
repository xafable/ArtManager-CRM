<?php

namespace App\Notifications;

use App\Models\Task;
use App\Models\TaskStatus;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Channels\MailChannel;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class TaskAssigned extends Notification implements ShouldQueue
{
    use Queueable;
    private $task;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($task)
    {
        $this->task = $task;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    public function toTelegram($notifiable)
    {
        $url = route('task.edit', ['id' => $this->task->id]);
        $message = "Вам назначена задача ".$this->task->title.
            "\nСтатус: ".TaskStatus::query()->find($this->task->status_id)->value('title').
            "\nДата начала: ".Carbon::parse($this->task->start_date)->toDateString().
            "\nДата завершения: ".Carbon::parse($this->task->finish_date)->toDateString().
            "\nОписание: ".$this->task->description;

        $url = 'google.com';
        return TelegramMessage::create()
            ->to($notifiable->telegram_user_id)
            ->content($message)
            ->button('Посмотреть задачу', $url)
            ->buttonWithCallback('В работу', json_encode([
                'key'=>'taskStatus',
                'data'=>['taskId'=>$this->task->id,'statusId'=>2]]))
            ->buttonWithCallback('Выполнена', json_encode([
                'key'=>'taskStatus',
                'data'=>['taskId'=>$this->task->id,'statusId'=>3]]));
    }

    /**
     * Получить содержимое почтового уведомления.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->view(
            'emails.taskAssignedMail', ['task' => $this->task]
        );
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
