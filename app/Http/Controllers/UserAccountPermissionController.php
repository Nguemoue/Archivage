<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function __;
use function redirect;

class UserAccountPermissionController extends Controller
{
    public function index()
    {

    }

    public function update(Request $request,$userId){
		 Validator::make(compact("userId"),[
			 "userId"=>"required|int|exists:users,id",
		 ])->validate();
		 $user = User::find($userId);
		 $user->syncPermissions($request->input("permissions"));

		 return redirect()->back()->with("success",__("response.update.success"));
	 }
}
