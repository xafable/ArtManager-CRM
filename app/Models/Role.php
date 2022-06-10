<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends \Spatie\Permission\Models\Role
{
    use HasFactory;


    public function updatePermissions(array $permisssions){
        foreach ($permisssions as $permission=>$value){

            if($value == 1)
                $this->givePermissionTo($permission);
            else $this->revokePermissionTo($permission);

        }
    }
}
