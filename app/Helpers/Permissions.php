<?php


namespace App\Helpers;

use App\Models\UserAllowedRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Permissions{

    static function isPermissionExist($permission_name){
        return Count(Permission::findByName($permission_name)->get()) > 0;
    }


   static function getFieldsIdFromRolePermissions($roleId){
       $grantedPermissions = Role::findById($roleId)->permissions->map(function ($permission) {
           return  str_replace('can view field', '', $permission->name);
       });
       return $grantedPermissions;
    }



    static function getUserAllowedRoles($userId){
        $roleIds = UserAllowedRole::query()->select('role_id')->where('user_id',$userId)->get();
        return Role::query()->whereIn('id',$roleIds)->get();

    }
}
