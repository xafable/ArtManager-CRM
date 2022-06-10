<?php

namespace App\Models;

use App\Traits\HasHistory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory,SoftDeletes;
    use HasHistory;

    protected $attributes = [
        'description' => ' ',
        'priority'=>1,
        'status_id'=>1];
    protected $guarded = [];
    private $originalPerformers;

    protected static function booted()
    {
        static::retrieved(function ($task) {
            $task->originalPerformers = $task->performers;
        });
    }

    public function scopeFilterByWorkObjectType($builder,$workObjectTypeId){
        return $builder
            ->select('tasks.title','tasks.description','tasks.id','tasks.work_object_id','tasks.status_id')
            ->join('work_objects', 'work_objects.id', '=', 'tasks.work_object_id')
            ->where('work_objects.type_id',$workObjectTypeId);
    }

    public function scopeFilters($builder,$filters){
       //$builder->select('tasks.title','tasks.description','tasks.id','tasks.work_object_id','tasks.status_id');
        $builder->select('tasks.*');
        if(isset($filters['workObjectType'])){
                $builder
                ->join('work_objects', 'work_objects.id', '=', 'tasks.work_object_id')
                ->where('work_objects.type_id',$filters['workObjectType']);
        }
        if(isset($filters['statusId'])){
                $builder
                ->where('tasks.status_id',$filters['statusId']);
        }

        return $builder;


    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function workObject()
    {
        return $this->belongsTo(WorkObject::class,'work_object_id','id');
    }
    public function status()
    {
        return $this->belongsTo(TaskStatus::class);
    }

    public function performers()
    {
        return $this->belongsToMany(User::class,'task_user', 'task_id', 'user_id');
    }

    public function getHtmlStartDate()
    {
        if(is_null($this->start_date))
            return null;
        else
            $date = Carbon::parse($this->start_date);

        return $date->format('Y-m-d');
    }

    public function getHtmlFinishDate()
    {
        if(is_null($this->finish_date))
            return null;
        else
            $date = Carbon::parse($this->finish_date);

        return $date->format('Y-m-d');
    }

    public function getOriginalPerformers()
    {
        return $this->originalPerformers;
    }

    public function getNewPerformers()
    {
        $this->load('performers');
        return $this->performers->diff($this->originalPerformers);
    }
}
