<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enumeration extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function data(){
        return $this->hasMany(EnumerationData::class);
    }
}
