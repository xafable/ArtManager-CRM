<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class WorkObjectType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();
        static::created(function ($model) {
            Permission::create(['name' => 'view Objects by WoType'.$model->id],'Objects by WoType');
        });
    }


    /**
     * @return belongsToMany
     */
    public function typeFields(){
        return $this->belongsToMany(TypeField::class)->withoutGlobalScopes()->withPivot('fields_quantity');
    }
    public function typeSetting(){
        return $this->hasOne(TypeSetting::class);
    }
    public function workObjects(){
        return $this->hasMany(WorkObject::class,'type_id');
    }

}
