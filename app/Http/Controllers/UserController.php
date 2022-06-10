<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\WorkObject;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;
use Telegram\Bot\Api;
use Telegram\Bot\Traits\Telegram;


class UserController extends Controller
{

    use Telegram;

    public function __construct()
    {
        $this->middleware('guest')
            ->except([
                'logout',
                'changeRole',
                'tasks',
                'edit',
                'update']);
    }

        function create()
    {
        return view('auth.register');

    }
    function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'password'=>'required',
        ]);

        $user = User::query()->create([
            'name'=>$request->input('name'),
            'password'=>Hash::make($request->input('password')),
            'email'=>$request->email,
            'fio'=>$request->fio,
            'telegram_user_id'=>$request->telegramId,
        ]);

        $user->assignRole('Viewer');

        Auth::login($user);

        session()->flash('success','Регистрация успешна!');
        return redirect()->route('main');

    }

    function login(){
        return view('auth.login');
    }

    function logout(){
        Auth::logout();
        return redirect()->route('object.show');
    }

    function auth(Request $request){

        Auth::attempt(['name'=>$request->name,'password'=>$request->password],true);

        return redirect()->route('main');
    }

    function tasks(){
        $tasks = User::query()->find(Auth::id())->tasks;
        $workObjects = WorkObject::query()->select(['title','id'])
            ->whereIn('id',$tasks->pluck('work_object_id')
            ->toArray())
            ->get()
            ->pluck('title','id')
            ->toArray();

        return view('user.userTasks',['tasks'=>$tasks,'workObjects'=>$workObjects]);
    }

    function update(Request $request){

       User::query()->where('id',Auth::id())
           ->update([
               'fio'=>$request->fio,
               'email'=>$request->email,
               'telegram_user_id'=>$request->telegram_user_id,
           ]);

        return redirect()->back();
    }

    function edit(){
        return view('user.userProfile',['user'=>Auth::user()]);
    }

    function changeRole($roleId){
        $user = Auth::user();
        $user->syncRoles([$roleId]);
        return redirect()->back();

    }
}
