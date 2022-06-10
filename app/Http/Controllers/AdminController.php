<?php

namespace App\Http\Controllers;

use App\Helpers\Permissions;
use App\Models\Enumeration;
use App\Models\EnumerationData;
use App\Models\FieldFormat;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Status;
use App\Models\StatusType;
use App\Models\TypeField;
use App\Models\User;
use App\Models\WorkObjectType;
use Illuminate\Http\Request;


class AdminController extends Controller
{


    public function __construct(){
        parent::__construct();
        $this->middleware(['role:Admin']);
    }

  function searchSettings(){
      $workObjectTypes = WorkObjectType::with('typeFields')->get();

      return view('admin.searchSetting',['workObjectTypes'=>$workObjectTypes]);
  }

    function updateSearchSettings(Request $request){
        //dd($request->typeFields);
        TypeField::query()->withoutGlobalScopes()->whereIn('id',$request->typeFields)->update(['searchable'=>1]);
        TypeField::query()->withoutGlobalScopes()->whereNotIn('id',$request->typeFields)->update(['searchable'=>0]);

        return redirect()->back();
    }


    function enumsSettings(){
      return view('admin.enumsSettings',['enums'=>Enumeration::all()]);
    }

    function enumInsert(Request $request){
        $enum = Enumeration::query()->create(['title'=>$request->title]);

        return redirect()->route('admin.enumEdit',$enum->id);
    }

    function enumEdit($enumId){
      $enumData = EnumerationData::query()->where('enumeration_id',$enumId)->get();

      return view('admin.enumEdit',['enumData'=>$enumData,'enumId'=>$enumId]);
    }

    function enumUpdate(Request $request){

        if($request->has('enum'))
        foreach($request->enum as $key => $value){
            EnumerationData::query()->UpdateOrcreate(['id'=>$value['id']],
                ['value'=>$value['value'],
                 'enumeration_id'=>$request->enumId
                ]);

        }

        if($request->has('fieldsForDelete'))
            EnumerationData::destroy($request->fieldsForDelete);

        return redirect()->back();
    }

    function showUsers(){
      $users = User::query()->get()->pluck('fio','id')->toArray();
      return view('admin.usersSettings',['users' => $users]);
    }


    function editUser($userId){
        $user = User::query()->find($userId);
        $roles = Role::all();
        $allowedRoles = $user->allowedRoles->map(function ($role) {
            return $role->id;
        });
        return view('admin.userEdit',[
            'user' => $user,
            'roles'=>$roles,
            'allowedRoles'=>$allowedRoles]);
    }

    function updateUser(Request $request){
        $user = User::query()->find($request->userId);
        $user->allowedRoles()->sync($request->allowedRoles);

        return redirect()->back();
    }

    function showRoles(){
        return view('admin.rolesSettings',[
            'roles' => Role::all()
        ]);
    }

    function  insertRole(Request $request){
        Role::create(['name' => $request->roleTitle]);

        return redirect()->back();
    }

    function editRoleWorkObjectTypeOptions($roleId,$typeId){
        $workObjectType = WorkObjectType::query()->find($typeId);

        return view('admin.roleWorkObjectTypeOptions',
            ['typeFields'=>$workObjectType->typeFields,
                'workObjectType'=>$workObjectType,
                'roleId'=>$roleId,
                'isGrantedObjectsWoType'=>Role::findById($roleId)->hasPermissionTo('view Objects by WoType'.$typeId),
                'grantedFields'=>Permission::getFieldsIdFromRolePermissions($roleId)]);

    }

    function showRoleWorkObjectTypes($roleId){
      $workObjectTypes = WorkObjectType::query()->get();

      return view('admin.roleWorkObjectTypeShow',['workObjectTypes'=>$workObjectTypes,'roleId'=>$roleId]);
    }

    function updateRoleWorkObjectTypeOptions(Request $request){
        if(!is_null($request->fieldsIds)) {
            Permission::updateTypeFieldsPermission($request->fieldsIds,$request->roleId);
        }

        $isGrant = $request->showTypeObjects == 1 ? true : false;
        Permission::updateWorkObjectTypePermission($request->workObjectTypeId,$request->roleId,$isGrant);

        return redirect()->back();
    }

    function editRoleGeneralOptions($roleId){

        return view('admin.roleGeneralOptions',
            ['workObjectPerm'=>Permission::findByComment('workObject')->pluck('id','name'),
            'workObjectTypePerm'=>Permission::findByComment('workObjectType')->pluck('id','name'),
            'statusTypePerm'=>Permission::findByComment('statusType')->pluck('id','name'),
            'additionalAttributePerm'=>Permission::findByComment('additionalAttribute')->pluck('id','name'),
            'grantedPermissions'=>Role::findById($roleId)->permissions->pluck('id'),
            'roleId'=>$roleId]);
    }

    function updateRoleGeneralOptions(Request $request){
        $role = Role::findById($request->roleId);
        $role->updatePermissions($request->workObject);
        $role->updatePermissions($request->workObjectType);
        $role->updatePermissions($request->statusType);
        $role->updatePermissions($request->additionalAttribute);

        return redirect()->back();
    }







    }
