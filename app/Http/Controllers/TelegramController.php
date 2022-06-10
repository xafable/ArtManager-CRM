<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TelegramLog;
use App\Services\Telegram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class TelegramController extends Controller
{
    public function __construct()
    {

    }

    function handle(Request $request){
        $telegram = App::make(Telegram::class);
        $telegram->processCallback();
    }
}
