<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnumerationData extends Model
{
    use HasFactory;

    protected $fillable = ['value','enumeration_id'];
}
