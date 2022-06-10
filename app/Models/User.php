<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
class User extends Authenticatable
{
    use HasFactory,Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'avatar',
        'fio',
        'email',
        'google_id',
        'telegram_user_id',
        'password',
    ];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

/*    public static function boot()
    {
        parent::boot();
        static::created(function ($model) {
            $model->assignRole('Viewer');
        });
    }*/


    public function tasks()
    {
        return $this->belongsToMany(Task::class,'task_user', 'user_id', 'task_id');
    }

    public static function getWithoutPerformers(array $performersIds) : Collection {

        return User::query()->whereNotIn('id',$performersIds)->get();
    }

    public static function getTasksCount() : int{
        return User::query()->find(Auth::id())->tasks()->select('tasks.id')->get()->count();
    }

    public function allowedRoles(){
        return $this->belongsToMany(Role::class,'user_allowed_roles','user_id','role_id');
    }


}
