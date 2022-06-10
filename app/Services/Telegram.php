<?php


namespace App\Services;


use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\TelegramLog;
use App\Models\User;
use Telegram\Bot\Api;

class Telegram
{

    public $client;

    function __construct()
    {
        $this->client = new Api(env('TELEGRAM_BOT_TOKEN',null));
    }

    function processCallback(){

        $updates = $this->client->getWebhookUpdate();
        $callbackData = collect(json_decode($updates['callback_query']['data'], true));
        $callbackData->put('telegram_user_id',json_decode($updates['callback_query']['from']['id']));

        TelegramLog::query()->create([
            'event'=>'incoming',
            'data'=>$callbackData
        ]);


        switch ($callbackData['key']){
            case 'taskStatus':
                $this->processTaskStatusCallback($callbackData);
                break;
        }

        return 200;

    }

    function processTaskStatusCallback($callbackData){
        $task = Task::query()->find($callbackData['data']['taskId']);
        $task->update(['status_id'=>$callbackData['data']['statusId']]);
        $userFullName = User::query()->where('telegram_user_id',$callbackData['telegram_user_id'])->first()->fio;

        $this->sentMessageToUsers($task->performers,
            "{$userFullName}: Статус задачи $task->title изменен на {$task->status->title}");
    }

    function sentMessageToUsers($users,$message){
       foreach ($users as $user){
           $this->client->sendMessage([
               'chat_id' => $user->telegram_user_id,
               'text' => $message
           ]);
       }
    }





}
