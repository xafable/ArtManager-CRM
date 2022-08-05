<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateWorkObjectRequest;
use App\Models\Attribute;
use App\Models\Enumeration;
use App\Models\EnumerationData;
use App\Models\TypeField;
use App\Models\TypeSetting;
use App\Models\WorkObject;
use App\Models\WorkObjectType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class WorkObjectController extends Controller
{

    private $enumerationsData;

    public function __construct(Request $request){
        parent::__construct();

        if ($request->routeIs('object.edit')) {
            $woTypeId = $request->route()->parameters()['id'];
            $this->middleware(['permission:view workObject|view Objects by WoType'.$woTypeId])->only('edit');
        }

        $this->middleware(['can:update workObject'])->only('update');
        $this->middleware(['can:create workObject'])->only('insert');
        $this->middleware(['can:delete workObject'])->only('delete');

        $this->enumerationsData = EnumerationData::query()->get()->groupBy('enumeration_id');

    }

    function  show(){
        $objectTypes = WorkObjectType::query()->get();
        $workObjects = WorkObject::FilterByWoTypePermission()->orderByDesc('created_at')->paginate(10);
        $typeFields = TypeField::query()->select('title_eng','title_ru','enumeration_id','format')->distinct()->get();

        return view('workObjectShow',['types'=>$objectTypes,'workObjects'=>$workObjects ,
            'typeFields'=>$typeFields,'enumerationsData'=>$this->enumerationsData]);
    }

    function showByType($typeId){
        $objectTypes = WorkObjectType::query()->get();
        $workObjects = WorkObject::FilterByWoTypePermission()->where('type_id','=',$typeId)->orderByDesc('created_at')->paginate(10);
        $typeFields = TypeField::query()->byWorkObjectTypeId($typeId)->get();

        return view('workObjectShow',['types'=>$objectTypes,
            'workObjects'=>$workObjects,
            'typeFields'=>$typeFields,
            'workObjectTypeId'=>$typeId,
            'enumerationsData'=>$this->enumerationsData]);
    }

    function showByFilter(Request $request){
        if($request->workObjectTypeId == 0){
            $workObjectsIds = Attribute::SqlFilter($request->attributeFilters)->distinct()->pluck('attributes.work_object_id');
            $typeFields = TypeField::query()->select('title_eng','title_ru','enumeration_id','format_id')->distinct()->get();
        }
        else{
            $workObjectsIds = Attribute::byTypeId($request->workObjectTypeId)->SqlFilter($request->attributeFilters)->distinct()->pluck('attributes.work_object_id');
            $typeFields = TypeField::query()->byWorkObjectTypeId($request->workObjectTypeId)->get();
        }

        $objectTypes = WorkObjectType::query()->get();
        $workObjects = WorkObject::FilterByWoTypePermission()->whereIn('id', $workObjectsIds);

        if(isset($request->filters['title'])){
           $workObjects->filterByTitle($request->filters['title']);
        }
        elseif (isset($request->filters['description'])){
           $workObjects->filterByDescription($request->filters['description']);
        }

        $workObjects = $workObjects->orderByDesc('created_at')->paginate(21);

        return view('workObjectShow',['types'=>$objectTypes,
            'workObjects'=>$workObjects,
            'typeFields'=>$typeFields,
            'workObjectTypeId'=>$request->workObjectTypeId,
            'enumerationsData'=>$this->enumerationsData]);

    }

    function insert(Request $request){
        $workObject = WorkObject::query()->create(
            ['type_id'=>$request->type_id,
            'title'=>$request->title,
            'description'=>'',
            'status_id'=> 1,
            'status_type_id'=>TypeSetting::query()->where('work_object_type_id','=',$request->type_id)->first()->status_type_id,
            'user_id'=>Auth::id()]);

        //$workObject->SaveHistory();
        $type = WorkObjectType::query()->find($request->type_id);


        $type->typeFields->each(function ($field) use ($workObject,$type) {
            if($field->pivot->fields_quantity > 1){
                for($i = 0; $i < $field->pivot->fields_quantity;$i++){
                    Attribute::query()->create([
                        'work_object_id'=>$workObject->id,
                        'title_ru'=>$field->title_ru,
                        'title_eng'=>$field->title_eng,
                        'value'=>'',
                        'format'=>$field->format,
                        'work_object_type_id'=>$type->id,
                        'enumeration_id'=>$field->enumeration_id,
                        'type_field_id'=>$field->id]);
                }

            }
            else{
                Attribute::query()->create([
                    'work_object_id'=>$workObject->id,
                    'title_ru'=>$field->title_ru,
                    'title_eng'=>$field->title_eng,
                    'value'=>'',
                    'format'=>$field->format,
                    'work_object_type_id'=>$type->id,
                    'enumeration_id'=>$field->enumeration_id,
                    'type_field_id'=>$field->id]);
            }

        });

        return redirect()->route('object.edit',$workObject->id);

    }

    function edit($id){
        $workObject = WorkObject::query()->find($id);

       return view('workObjectEdit',[
           'workObject'=>$workObject,
           'attributes'=>$workObject->attributes,
           'statuses'=>$workObject->statuses,
           'enumerationsData'=>$this->enumerationsData]);
    }



    function update(UpdateWorkObjectRequest $request){
        $workObject = WorkObject::query()->find($request->workObject_id);
        $workObject->update([
            'description'=>$request->description,
            ]);
        $workObject->SaveHistory();

        if($request->has('value')) {

            foreach ($request->value as $key => $value) {
                $attribute = Attribute::query()->find($key);
                $attribute->update(['value' => $request->value[$key]]);
                $workObject->SaveHistory($attribute);
            }
        }

        return 200;
    }

    function updateStatus(Request $request){
        WorkObject::query()->where('id',$request->workObjectId)->update([
            'status_id'=>$request->statusId,
        ]);

        session()->flash('success','Статус обновлен');


        return redirect()->back();

    }

    function delete(Request $request){
        $workObject = WorkObject::query()->find($request->workObject_id);
        $workObject->tasks()->delete();
        $workObject->attributes()->delete();
        $workObject->comments()->delete();
        $workObject->media()->delete();
        $workObject->delete();

        return redirect()->route('object.show');
    }

}
