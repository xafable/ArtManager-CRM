<?php

namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WorkObject extends Model
{
    use HasFactory,HasHistory,SoftDeletes;

    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function getEnumerationsData(){
        $enumIds = DB::table('type_field_work_object_type')
            ->join('type_fields', 'type_fields.id', '=', 'type_field_work_object_type.type_field_id')
            ->select('type_fields.enumeration_id')
            ->distinct()
            ->where('type_field_work_object_type.work_object_type_id',$this->type->id)
            ->whereNotNull('type_fields.enumeration_id')
            ->get()
            ->pluck('enumeration_id');
        $enumData = EnumerationData::query()->whereIn('enumeration_id',$enumIds)->get()->groupBy('enumeration_id');

        return $enumData;
    }

    public function scopeFilterByTitle($builder,$title){
        return $builder->where('title','like','%'.$title.'%');
    }

    public function scopeFilterByDescription($builder,$description){
        return $builder->where('description','like','%'.$description.'%');
    }

    public function scopeFilterByStatus($builder,$title){
        return $builder->where('title',$title);
    }

    public function scopeFilterByWoTypePermission($builder){
        if (Auth::user()->hasRole('Admin')){
            //dd(1);
            return $builder;
        }

        $permsissions = Permission::getWoTypeIdFromRolePermissions(Auth::user()->roles->pluck('id')[0]);
        return $builder->whereIn('type_id',$permsissions);

    }

    /**
     * @return hasMany
     */
    public function attributes(){
        return $this->hasMany(Attribute::class);
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function additionalAttributes(){
        return $this->hasMany(AdditionalAttribute::class);
    }

    public function statuses(){
        return $this->hasMany(Status::class,'type_id','status_type_id');
    }

    public function type(){
        return $this->belongsTo(WorkObjectType::class);
    }

    public function typeParams(){
        return $this->hasMany(TypeSetting::class,'work_object_type_id','type_id');
    }

    public function media(){
        return $this->hasMany(File::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }




}
