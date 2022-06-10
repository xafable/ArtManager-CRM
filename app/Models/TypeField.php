<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class TypeField extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('searchable', function (\Illuminate\Database\Eloquent\Builder $builder) {
            $builder->where('searchable', '=', 1);
        });
    }

    function format(){
        return $this->belongsTo(FieldFormat::class,'format','format');

    }

    function workObjectTypes(){
        return $this->belongsToMany(WorkObjectType::class)->withPivot('fields_quantity');
    }

    public function scopeByWorkObjectTypeId($query,$typeId){
        $query->select('type_fields.*')->join('type_field_work_object_type','type_field_work_object_type.type_field_id','=','type_fields.id')->
        where('type_field_work_object_type.work_object_type_id',$typeId);

        return $query;
    }
}
