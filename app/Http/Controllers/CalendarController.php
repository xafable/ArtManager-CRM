<?php

namespace App\Http\Controllers;

use Acaronlex\LaravelCalendar\Calendar;
use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    function show(){

        return view('calendarShow');

    }

    function get(Request $request){

            $data = Auth::user()->tasks()->whereDate('start_date', '>=', $request->start)
                ->get(['tasks.id', 'tasks.title', 'tasks.start_date as start', 'tasks.finish_date as end','tasks.status_id'])->map(function ($task) {
                    switch ($task->status_id) {
                        case 1:
                            $color = 'DodgerBlue';
                            break;
                        case 2:
                            $color = 'orange';
                            break;
                        case 3:
                            $color = 'green';
                            break;
                        case 4:
                            $color = 'grey';
                            break;
                        case 5:
                            $color = 'black';
                            break;
                        default:
                            $color = 'black';
                    }
                    return [
                        'id'=>$task->id,
                        'title'=>$task->title,
                        'start'=>$task->start,
                        'end'=>$task->end,
                        'color'=>$color,
                        'url'=>route('task.edit',$task->id),
                    ];
                });

            return response()->json($data);
    }
}

