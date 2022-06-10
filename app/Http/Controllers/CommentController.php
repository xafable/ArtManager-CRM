<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use App\Models\WorkObject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    function ShowByObject($id){
        $workObject = WorkObject::query()->find($id);
        $comments = $workObject->comments;
        $users = array();

        foreach ($comments as $comment){
            $users[$comment->user_id] =  User::query()->find($comment->user_id)->fio;
        }

        return view('workObjectComments',['comments'=>$comments,'workObject' => $workObject,'users'=>$users]);
    }

    function AddToObject(Request $request,$id){
        $workObject = WorkObject::query()->find($id);
        $comment = $workObject->comments()->create(['comment' => $request->input('comment'),'user_id'=> Auth::id()]);
        $workObject->SaveHistory($comment);

        return redirect()->back();
    }
}
