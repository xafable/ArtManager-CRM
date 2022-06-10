<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\StatusType;
use Illuminate\Http\Request;

class StatusTypeController extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->middleware(['can:update statusType'])->only('update');
        $this->middleware(['can:create statusType'])->only('insert');
        $this->middleware(['can:delete statusType'])->only('delete');
        $this->middleware(['can:view statusType'])->only('edit');
    }

    function show(){
        $statusTypes = StatusType::query()->get();

        return view('statusTypeShow',['statusTypes'=>$statusTypes]);
    }

    function insert(Request $request){
        $statusType = StatusType::query()->create(['user_id'=>$request->user()->id,'title'=>$request->title]);

        return redirect()->route('status.edit',$statusType->id);
    }

    function edit(Request $request,$id){
        $statusType = StatusType::query()->find($id);

        return view('statusTypeEdit',[
            'statuses'=>$statusType->statuses,
            'workObjectTypesCount'=>$statusType->workObjectTypes()->count(),
            'statusType'=>$statusType]);
    }

    function update(Request $request){
        if($request->has('statuses'))
            foreach($request->statuses as $key => $value){
            Status::query()->UpdateOrcreate(['id'=>$value['id']],
                ['title'=>$value['title'],
                 'type_id'=>$request->statusTypeId,
                 'status_id'=>str_replace('_', ' ', $key)
                ]);
        }

        if($request->has('fieldsForDelete'))
            Status::destroy($request->fieldsForDelete);

        return redirect()->back();
    }


    function delete(Request $request){
        StatusType::query()->find($request->delId)->statuses()->delete();
        StatusType::query()->find($request->delId)->delete();
    }
}
