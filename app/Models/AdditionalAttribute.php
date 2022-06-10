<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalAttribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'work_object_id',
        'title_ru',
        'title_eng',
        'value'];
}
