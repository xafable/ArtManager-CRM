<?php

use App\Models\Enumeration;
use App\Models\Status;
use App\Models\StatusType;
use App\Models\TelegramLog;
use App\Models\TypeField;
use App\Models\TypeSetting;
use App\Models\WorkObjectType;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::prefix('telegram')->name('telegram.')->group(function (){
    Route::post('/process','App\Http\Controllers\TelegramController@handle')->name('handle');
});

Route::prefix('calendar')->name('calendar.')->group(function (){
    Route::get('/show','App\Http\Controllers\CalendarController@show')->name('show');
    Route::get('/get','App\Http\Controllers\CalendarController@get')->name('get');

});

Route::prefix('object')->name('object.')->group(function (){
    Route::post('insert','App\Http\Controllers\WorkObjectController@insert')->name('insert');
    Route::get('show','App\Http\Controllers\WorkObjectController@show')->name('show');
    Route::get('show/type/{id}','App\Http\Controllers\WorkObjectController@showByType')->name('showByType');
    Route::get('show/filter/','App\Http\Controllers\WorkObjectController@showByFilter')->name('showByFilter');
    Route::get('{workObjectId}/additionalAttributes','App\Http\Controllers\AdditionalAttributeController@edit')->name('additionalAttributes');
    Route::post('/additionalAttributes','App\Http\Controllers\AdditionalAttributeController@update')->name('additionalAttributes.update');

    Route::get('task/{id}/edit/','App\Http\Controllers\TaskController@edit')->name('taskEdit');

    Route::get('edit/{id}','App\Http\Controllers\WorkObjectController@edit')->name('edit');
    Route::post('update','App\Http\Controllers\WorkObjectController@update')->name('update');
    Route::post('update_status','App\Http\Controllers\WorkObjectController@updateStatus')->name('updateStatus');
    Route::post('delete','App\Http\Controllers\WorkObjectController@delete')->name('delete');

    Route::get('/comments/{id}','App\Http\Controllers\CommentController@ShowByObject')->name('comments');
    Route::post('/comments/add/{id}','App\Http\Controllers\CommentController@AddToObject')->name('comment.add');

    Route::get('/files/{id}','App\Http\Controllers\FileController@showByObject')->name('files');
    Route::post('/files/upload','App\Http\Controllers\FileController@upload')->name('files.upload');

    Route::get('{id}/tasks','App\Http\Controllers\TaskController@ShowByObject')->name('tasks');
    Route::get('/history/{id}','App\Http\Controllers\HistoryController@ShowByObject')->name('history');

});

Route::prefix('task')->name('task.')->group(function (){
    Route::get('/{id}/edit','App\Http\Controllers\TaskController@edit')->name('edit');
    Route::get('/tasks','App\Http\Controllers\TaskController@showAll')->name('showAll');
    Route::get('/tasks/wo_type{type_id}','App\Http\Controllers\TaskController@showByWOType')->name('showByWOType');

    Route::post('/{id}/update','App\Http\Controllers\TaskController@update')->name('update');
    Route::post('/store','App\Http\Controllers\TaskController@store')->name('store');
    Route::post('/workers','App\Http\Controllers\TaskController@workers')->name('workers');
});


Route::prefix('status_types')->name('status.')->group(function (){
    Route::post('insert','App\Http\Controllers\StatusTypeController@insert')->name('insert');
    Route::get('show','App\Http\Controllers\StatusTypeController@show')->name('show');
    Route::get('edit/{id}','App\Http\Controllers\StatusTypeController@edit')->name('edit');
    Route::post('update','App\Http\Controllers\StatusTypeController@update')->name('update');

});

Route::prefix('object/model')->name('object.model.')->group(function (){
Route::post('insert','App\Http\Controllers\WorkObjectTypeController@insert')->name('insert');
Route::get('show','App\Http\Controllers\WorkObjectTypeController@show')->name('show');
Route::get('edit/{id}','App\Http\Controllers\WorkObjectTypeController@edit')->name('edit');
Route::post('update','App\Http\Controllers\WorkObjectTypeController@update')->name('update');
Route::post('delete','App\Http\Controllers\WorkObjectTypeController@delete')->name('delete');


});

Route::prefix('auth')->name('auth.')->group(function (){
    Route::get('/register','App\Http\Controllers\UserController@create')->name('create');
    Route::post('/store','App\Http\Controllers\UserController@store')->name('store');
    Route::get('/login','App\Http\Controllers\UserController@login')->name('login');
    Route::post('/login','App\Http\Controllers\UserController@auth')->name('auth');
    Route::get('/logout','App\Http\Controllers\UserController@logout')->name('logout');
    Route::get('/change_role_{role_id}','App\Http\Controllers\UserController@changeRole')->name('changeRole');

});

Route::name('google.')->group(function (){
    Route::get('auth/google', 'App\Http\Controllers\GoogleController@redirectToGoogle')->name('auth');
    Route::get('auth/google/callback', 'App\Http\Controllers\GoogleController@handleGoogleCallback');

});

Route::prefix('admin')->name('admin.')->group(function (){
    Route::get('/settings/search','App\Http\Controllers\AdminController@searchSettings')->name('searchSettings');
    Route::get('/settings/enums','App\Http\Controllers\AdminController@enumsSettings')->name('enumsSettings');
    Route::get('/settings/enum/{id}','App\Http\Controllers\AdminController@enumEdit')->name('enumEdit');
    Route::get('/settings/users','App\Http\Controllers\AdminController@showUsers')->name('users');
    Route::get('/settings/user/{id}','App\Http\Controllers\AdminController@editUser')->name('editUser');
    Route::get('/settings/roles','App\Http\Controllers\AdminController@showRoles')->name('roles');
    Route::get('/settings/roles','App\Http\Controllers\AdminController@showRoles')->name('roles');
    Route::get('/settings/role/{id}/wo_types','App\Http\Controllers\AdminController@showRoleWorkObjectTypes')->name('roleWOTypeShow');
    Route::get('/settings/role/{id}/wo_type_{type_id}','App\Http\Controllers\AdminController@editRoleWorkObjectTypeOptions')->name('roleWOTypeOptions');
    Route::get('/settings/role/{id}/general','App\Http\Controllers\AdminController@editRoleGeneralOptions')->name('generalOptions');

    Route::post('/settings/search','App\Http\Controllers\AdminController@updateSearchSettings')->name('updateSearchSettings');
    Route::post('/settings/enum','App\Http\Controllers\AdminController@enumUpdate')->name('updateEnum');
    Route::post('/settings/enum/insert','App\Http\Controllers\AdminController@enumInsert')->name('enumInsert');
    Route::post('/settings/role/insert','App\Http\Controllers\AdminController@insertRole')->name('insertRole');
    Route::post('/settings/user','App\Http\Controllers\AdminController@updateUser')->name('userUpdate');
    Route::post('/settings/role/wo_type','App\Http\Controllers\AdminController@updateRoleWorkObjectTypeOptions')->name('updateRoleWOTypeOptions');
    Route::post('/settings/role/general','App\Http\Controllers\AdminController@updateRoleGeneralOptions')->name('updateRoleGeneralOptions');


});

Route::prefix('user')->name('user.')->group(function (){
    Route::get('/tasks','App\Http\Controllers\UserController@tasks')->name('tasks');
    Route::get('/profile','App\Http\Controllers\UserController@edit')->name('profile');

    Route::post('/profile','App\Http\Controllers\UserController@update')->name('update');


});

Route::get('/', function () {
    return redirect()->route('object.show');
})->name('main');

Route::get('/install',function (){

    Artisan::call('migrate');

    Role::create(['name' => 'Admin']);
    Role::create(['name' => 'Viewer']);

    $user = \App\Models\User::query()->create([
        'name' => 'admin',
        'email' => 'admin@a.com',
        'password' => Hash::make('admin'),
        'created_at'=>Carbon::now(),
        'fio'=>'Admin'
    ]);

    $user->assignRole('Admin');

    $workObjectType = WorkObjectType::query()->create([
        'user_id'=>$user->id,
        'title'=>'Default']);

    TypeSetting::query()->create([
        'work_object_type_id'=>$workObjectType->id,
        'status_type_id'=>1 ]);

    $data = [
        [
            'title_ru' => 'Координаты',
            'title_eng' => Str::slug('Координаты'),
            'format' => 'coordinates',
            'enumeration_id' => NULL,
            'required' =>  0
        ],
        [
            'title_ru' => 'Город',
            'title_eng' => Str::slug('Город'),
            'format' => 'enum',
            'enumeration_id' => 1,
            'required' =>  0
        ],
        [
            'title_ru' => 'Дата регистрации',
            'title_eng' => Str::slug('Дата регистрации'),
            'format' => 'date',
            'enumeration_id' => NULL,
            'required' =>  0
        ],
        [
            'title_ru' => 'Пожарка',
            'title_eng' => Str::slug('Дата регистрации'),
            'format' => 'boolean',
            'enumeration_id' => NULL,
            'required' =>  0
        ],
    ];

    $typeFieldsIds = array();
    foreach ($data as $row){
        $tp = TypeField::query()->create($row);
        array_push($typeFieldsIds, $tp->id);

    }

    $workObjectType->typeFields()->syncWithoutDetaching($typeFieldsIds);
    $workObjectType->typeSetting->status_type_id = 1;
    $workObjectType->save();

    $statusType = StatusType::query()->create(['user_id'=>$user->id,'title'=>'Default']);

    $data = [
        [
            'title' => 'Новый',
            'type_id' => $statusType->id,
            'status_id' => 0,
        ],
        [
            'title' => 'В работе',
            'type_id' => $statusType->id,
            'status_id' => 1,
        ],
        [
            'title' => 'Ожидание',
            'type_id' => $statusType->id,
            'status_id' => 2,
        ],
        [
            'title' => 'Выполнен',
            'type_id' => $statusType->id,
            'status_id' => 3,
        ],

    ];

    Status::query()->insert($data);

    $enum = Enumeration::query()->create(['title'=>'Города','created_at'=>Carbon::now()]);
    $enum->data()->create(['value'=>'Киев','created_at'=>Carbon::now()]);
    $enum->data()->create(['value'=>'Харьков','created_at'=>Carbon::now()]);
    $enum->data()->create(['value'=>'Одесса','created_at'=>Carbon::now()]);


    dump('OK');
});

