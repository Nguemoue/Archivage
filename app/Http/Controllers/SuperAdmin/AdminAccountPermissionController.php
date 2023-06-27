<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminAccountPermissionController extends Controller
{
    public function index()
    {

    }

    public function update(Request $request,$adminId){
		 Validator::make(compact("adminId"),[
			 "adminId"=>"required|int|exists:admins,id",
		 ])->validate();
		 $admin = Admin::find($adminId);
		 $admin->syncPermissions($request->input("permissions"));

		 return redirect()->back()->with("success",__("response.update.success"));
	 }
}
