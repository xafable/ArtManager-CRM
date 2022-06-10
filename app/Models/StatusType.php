<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusType extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];

    function statuses(){
        return $this->hasMany(Status::class,'type_id');
    }

    function workObjectTypes(){
       // return $this->hasMany(TypeSetting::class,'status_type_id');
        return $this->belongsToMany(WorkObjectType::class, 'type_settings', 'status_type_id', 'work_object_type_id');

    }
}
