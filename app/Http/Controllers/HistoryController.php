<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WorkObject;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function ShowByObject($id){

        $workObject = WorkObject::query()->find($id);
        $histories = $workObject->history;
        $users = array();
        foreach ($histories as $history){
            $users[$history->user_id] =  User::query()->find($history->user_id)->fio;
        }

        return view('workObjectHistory',['workObject'=>$workObject,'histories'=>$histories,'users'=>$users]);

    }
}
