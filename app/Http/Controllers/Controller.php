<?php

namespace App\Http\Controllers;

use App\Helpers\Permissions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


     public function __construct(){

         $this->middleware('auth')->except(['login','auth','storeUser']);
         $this->middleware(function ($request, $next) {
             $allowedRoles = [];
             if(!is_null(Auth::user())) {
                 $this->id = Auth::user()->id;
                 $allowedRoles = Permissions::getUserAllowedRoles($this->id);

             }
             \Illuminate\Support\Facades\View::share('roles', $allowedRoles);


             return $next($request);
         });

    }


}
