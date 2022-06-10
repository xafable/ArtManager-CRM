<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Permission extends \Spatie\Permission\Models\Permission
{
    use HasFactory;

    /**
     * Find or Create a permission by its name and guard name.
     *
     * @param string $name
     * @param string|null $guardName
     * @param string $comment
     *
     * @return \Spatie\Permission\Contracts\Permission
     */
    static function findOrCreate(string $name,$guardName = null,$comment = '') : self{
        $permission = parent::findOrCreate($name);
        $permission->comment = $comment;
        $permission->save();

        return $permission;
    }

    static function create(array $attributes = [],string $comment = ''){
        $permission = parent::create($attributes);
        $permission->comment = $comment;
        $permission->save();

        return $permission;

    }

    /**
     * Find by comment.
     *
     * @param string $comment
     *
     * @return
     */
    static public function findByComment($comment){
        return self::query()->where('comment',$comment)->get();
    }

    static function getFieldsIdFromRolePermissions($roleId){
        $grantedPermissions = Role::query()->where('id',$roleId)->with('permissions', function ($query) {
            $query->where('comment','field');
        })->first()->permissions->map(function ($permission) {
            return  str_replace('view field', '', $permission->name);
        });

        return $grantedPermissions;
    }

    static function getWoTypeIdFromRolePermissions($roleId){
        $grantedPermissions = Role::query()->where('id',$roleId)->with('permissions', function ($query) {
            $query->where('comment','Objects by WoType');
        })->first()->permissions->map(function ($permission) {
            return  str_replace('view Objects by WoType', '', $permission->name);
        });

       // dd($grantedPermissions);

        return $grantedPermissions;
    }

    static function isExist(string $permission){
      return self::query()->where('name',$permission)->count() > 0 ? true : false;
    }

    static function updateTypeFieldsPermission(array $fields,int $roleId){
       $role = Role::findById($roleId);
        foreach ($fields as $field => $value) {
            $permission = self::findOrCreate('view field' . $field,null,'field');
            if ($value == 1)
                $permission->assignRole($role);
            else
                $permission->removeRole($role);
        }
    }

    static function updateWorkObjectTypePermission(int $workObjectTypeId,int $roleId,bool $isGrant){
        $permission = self::findByName('view Objects by WoType'.$workObjectTypeId);
        $role = Role::findById($roleId);


        if($isGrant)
            $permission->assignRole($role);
        else
            $permission->removeRole($role);

        return true;
    }



    }
