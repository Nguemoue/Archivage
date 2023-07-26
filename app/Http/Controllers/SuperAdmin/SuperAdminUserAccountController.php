<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Structure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;

class SuperAdminUserAccountController extends Controller
{
	public function index(Request $request)
	{

		$accountList = User::query()->with(["structure","permissions"])->get();
		$structures = Structure::query()->get();
		$permissions = Permission::query()->where("guard_name",webGuard())->get();

		return view("superAdmin.userAccount.index",[
			"accountList"=>$accountList,
			"structures" => $structures,
			"permissions"=>$permissions
		]);
	}

	public function store(Request $request){
		$request->validate([
			"email"=>['required','email',Rule::unique("users","email")],
			"nom"=>"required|string",
			"structure_id"=>['required','int',Rule::exists("structures","id")]
		]);
		//
		User::create([
			"name"=>$request->input("nom"),
			"email"=>$request->input("email"),
			"structure_id"=>$request->input("structure_id"),
			"password"=>bcrypt("password"),
		]);

		return redirect()->back()->with("success",__("response.create.success"));
	}
	public function delete(Request $request,int $userId){
		\Validator::make(['userId'=>$userId],[
			"userId"=>["int",Rule::exists("users","id")]
		])->validate();
		User::where("id",'=',$userId)->delete();
		return redirect()->back()->with("success",__("response.delete.success"));

	}
	public function update(Request $request,int $userId){
		$request->validate([
			"email"=>['required','email'],
			"nom"=>"required|string",
			"structure_id"=>['required','int',Rule::exists("structures","id")]
		]);
		User::whereKey($userId)->update([
			"name"=>$request->input("nom"),
			"email"=>$request->input("email"),
			"structure_id"=>$request->input("structure_id"),
			"password"=>"password",
		]);
		return redirect()->back()->with("success",__("response.update.success"));


	}
}
