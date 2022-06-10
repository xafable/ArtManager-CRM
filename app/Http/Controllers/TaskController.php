<?php

namespace App\Http\Controllers;

use App\Events\UpdateTaskEvent;
use App\Helpers\Permissions;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use App\Models\WorkObject;
use App\Models\WorkObjectType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class TaskController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware(function ($request, $next) {
            if($request->has('filters')){
                $filters = $request->filters;
                foreach ($filters as $key=>$value){
                    if(is_null($value))
                        unset($filters[$key]);
                }
                $request->filters = $filters;

            }
            return $next($request);
        });

    }

    function edit($id)
    {
        $task = Task::query()->with(['workObject','status'])->find($id);

        if(request()->routeIs('object.taskEdit') ){
         $viewName = 'workObjectTaskEdit';
        }
        else $viewName = 'taskEdit';

        return view($viewName,[
            'task'=>$task,
            'comments'=>$task->comments,
            'workObject'=>$task->workObject,
            'self_status'=>$task->status,
            'users'=>User::getWithoutPerformers($task->performers->pluck('id')->toArray()),
            'performers'=>$task->performers,
            'statuses'=>TaskStatus::query()->where('id','<>',$task->status->id)->get()]);
    }

    function update(Request $request, $taskId)
    {
        $startDate = Carbon::parse($request->start_date);
        $finishDate = Carbon::parse($request->finish_date);

        $task = Task::query()->find($taskId);
        $task->update([
            'description'=>$request->task_description,
            'status_id'=>$request->status_id,
            'start_date'=>$request->filled('start_date') ? $startDate->format('Y-m-d 00:00:00') : null,
            'finish_date'=>$request->filled('finish_date') ? $finishDate->format('Y-m-d 00:00:00') : null,
        ]);

        $task->performers()->sync($request->performers);
        event(new UpdateTaskEvent($task));

        session()->flash('success' ,'Сохранено');

        return redirect()->route('task.edit',$taskId);
    }
    function store(StoreTaskRequest $request)
    {
        $prevRoute = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();

        $task = Task::query()->create(
            ['title'=>$request->title,
              'work_object_id'=>$request->has('work_object_id') ? $request->work_object_id : null]);

        if($prevRoute == 'object.tasks'){
            $object = WorkObject::query()->find($request->input('work_object_id'));
            $object->SaveHistory($task);
        }
        session()->flash('success' ,'Задача создана');

        return redirect()->route('task.edit',$task->id);

    }

    function showAll(Request $request){
        $tasks = Task::query()->filters($request->filters)->paginate(10);
        $workObjects = WorkObjectType::all();
        $taskStatuses = TaskStatus::all();

        return view('taskShowAll',
            ['tasks'=>$tasks,
             'taskStatuses'=>$taskStatuses ,
             'workObjects'=>$workObjects]);

    }

    function showByObject($task_id)
    {

        $workObject = WorkObject::query()->find($task_id);
        $taskStatuses = TaskStatus::all();

        return view('workObjectTasks',[
            'tasks'=>$workObject->tasks,
            'taskStatuses'=>$taskStatuses,
            'workObject'=>$workObject]);
    }

}
