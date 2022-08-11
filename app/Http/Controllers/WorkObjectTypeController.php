<?php

namespace App\Http\Controllers;

use App\Models\Enumeration;
use App\Models\FieldFormat;
use App\Models\StatusType;
use App\Models\TypeField;
use App\Models\TypeSetting;
use App\Models\WorkObjectType;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WorkObjectTypeController extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->middleware(['can:update workObjectType'])->only('update');
        $this->middleware(['can:create workObjectType'])->only('insert');
        $this->middleware(['can:delete workObjectType'])->only('delete');
        $this->middleware(['can:view workObjectType'])->only('edit');
    }

    function show(){
        $workObjectTypes = WorkObjectType::query()->get();

        return view('workObjectTypeShow',['workObjectTypes'=>$workObjectTypes]);
    }

    function insert(Request $request){
        $workObjectType = WorkObjectType::query()->create([
            'user_id'=>$request->user()->id,
            'title'=>$request->title]);

        TypeSetting::query()->create([
            'work_object_type_id'=>$workObjectType->id,
            'status_type_id'=>1 ]);

        return redirect()->route('object.model.edit',$workObjectType->id);
    }

    function edit(Request $request,$id){
        $workObjectType = WorkObjectType::query()->find($id);

         return view('workObjectTypeEdit',
                ['typeFields'=>$workObjectType->typeFields,
                 'enumerations'=>Enumeration::query()->with('data')->get(),
                 'workObjectType'=>$workObjectType,
                 'fieldFormats'=>FieldFormat::query()->get(),
                 'typeSettings'=>$workObjectType->typeSetting,
                 'workObjectsCount'=>$workObjectType->workObjects()->count(),
                 'statusTypes'=>StatusType::query()->get()]);
    }

    function update(Request $request){
        TypeSetting::query()->where('work_object_type_id',$request->workObjectTypeId)
            ->update(['status_type_id'=>$request->statusType]);
        $typeFieldsIds = array();
        $workObjectType = WorkObjectType::query()->find($request->workObjectTypeId);


        if($request->has('fieldParams')) {
            foreach ($request->fieldParams as $key => $value) {

                $typeField = TypeField::query()->withoutGlobalScopes()->UpdateOrcreate(['id' => $value['id']],
                    ['title_ru' => $value['title'],
                        'title_eng' => Str::slug($value['title']),
                        'format' => $value['field_format'],
                        'enumeration_id' => $value['field_format'] == 7 ? $value['enumeration_id'] : NULL,
                        'required' => array_key_exists('required', $value) ? '1' : '0'
                    ]);
                array_push($typeFieldsIds, $typeField->id);
            }
            $workObjectType->typeFields()->syncWithoutDetaching($typeFieldsIds);
        }

        if($request->has('fieldsForDelete'))
            $workObjectType->typeFields()->detach($request->fieldsForDelete);


            return redirect()->back();
    }

    function delete(Request $request){
        WorkObjectType::query()->find($request->delId)->typeFields()->delete();
        WorkObjectType::query()->find($request->delId)->delete();
        return redirect()->route('object.model.show');
    }
}
