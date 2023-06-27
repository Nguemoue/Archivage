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
    	$permissions = Permission::query()->withCount("users")
			->where("guard_name",adminGuard())
			->get();
		 return view("superAdmin.permission.adminIndex",[
		 	'permissions'=>$permissions
		 ]);

	 }
	 public function webIndex(){
		 $permissions = Permission::query()->withCount("users")
			 ->where("guard_name",webGuard())
			 ->get();
		 return view("superAdmin.permission.webIndex",[
		 	"permissions" => $permissions
		 ]);
	 }
}
