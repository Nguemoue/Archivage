<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function home()
    {
    	return view("superAdmin.permission.home");
    }

    public function adminIndex(){
    	$permissions = Permission::query()->withCount("users")->get();
		 return view("superAdmin.permission.adminIndex",[
		 	'permissions'=>$permissions
		 ]);

	 }
	 public function webIndex(){
		 return view("superAdmin.permission.webIndex");
	 }
}
