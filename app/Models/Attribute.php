<?php

namespace App\Models;

use App\Traits\HasHistory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Attribute extends Model
{
    use HasFactory,HasHistory,SoftDeletes;

    protected $guarded = [];

    public function getChanges(){
        return [$this->title_eng=>$this->title_eng];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getOriginalModel(){
        return collect([$this->title_eng=>$this->originalModel->value]);
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function getUpdatedModel(){
        return collect([$this->title_eng=>$this->updatedModel->value]);
    }

     function getValue()
    {
        switch ($this->format) {
            case 'integer':
                return $this->value == null ? null : (int) $this->value;
            case 'float':
                return (float) $this->value;
            case 'string':
                return (string) $this->value;
            case 'boolean':
                return (bool) $this->value;
            case 'date':
                return $this->asDateTime($this->value);
            default:
                return $this->value;
        }
    }


    public function scopeSqlFilter($builder,$filter){

        foreach ($filter as $key=>$value){
            if(!empty($value)){
        $builder->join('attributes AS f'.$key, function ($join) use ($key,$value) {

            $join->on('f'.$key.'.work_object_id', '=', 'attributes.work_object_id')
                ->where('f'.$key.'.title_eng', '=', $key)->where('f'.$key.'.value', 'like','%'.$value.'%' );
        });
            }
        }

        return $builder;
    }


    public function scopeByTypeId($query,$typeId){
        $query->where('attributes.work_object_type_id','=',$typeId);

        return $query;
    }

    public function getHtmlDate()
    {
        if(is_null($this->value))
            return null;
        else
            $date = Carbon::parse($this->value);

        return $date->format('Y-m-d');
    }

    public static function getEnumerationsData($work_object_type_id){
        // dump($this->type->id);
        $enumIds = DB::table('attributes')
            ->select('enumeration_id')
            ->distinct()
            ->where('work_object_type_id',$work_object_type_id)
            ->whereNotNull('enumeration_id')
            ->get()
            ->pluck('enumeration_id');


        $enumData = EnumerationData::query()->whereIn('enumeration_id',$enumIds)->get()->groupBy('enumeration_id');


        //dd($enumData);
        //echo gettype($enumIds[0]);
        // foreach ($enumIds as $key=>$value)
        //  dump ($value);


        return $enumData;
    }
}
