<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Structure;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;

class AdminAccountController extends Controller
{
    public function index(Request $request)
    {
    	$accountList = Admin::query()->get();
    	$structures = Structure::query()->get();
    	$permissions = Permission::query()->where("guard_name",adminGuard())->get();

    	return view("superAdmin.adminAccount.index",[
    		"accountList"=>$accountList,
			"structures" => $structures,
			"permissions"=>$permissions
		]);
    }

    public function store(Request $request){
    	$request->validate([
    		"email"=>['required','email',Rule::unique("admins","email")],
			"nom"=>"required|string",
			"structure_id"=>['required','int',Rule::exists("structures","id")]
		]);
    	//
		 Admin::query()->create([
		 	"name"=>$request->input("nom"),
			 "email"=>$request->input("email"),
			 "structure_id"=>$request->input("structure_id"),
			 "password"=>bcrypt("password"),
			 "role"=>null
		 ]);

		 return redirect()->back()->with("success",__("response.create.success"));
	 }
	 public function delete(Request $request,int $adminId){
			\Validator::make(['adminId'=>$adminId],[
				"adminId"=>["int",Rule::exists("admins","id")]
			])->validate();
			Admin::query()->where("id",$adminId)->delete();
			return redirect()->back()->with("success",__("response.delete.success"));

	 }
	 public function update(Request $request,int $adminId){
		 $request->validate([
			 "email"=>['required','email'],
			 "nom"=>"required|string",
			 "structure_id"=>['required','int',Rule::exists("structures","id")]
		 ]);
		 Admin::query()->where("id","=",$adminId)->update([
			 "name"=>$request->input("nom"),
			 "email"=>$request->input("email"),
			 "structure_id"=>$request->input("structure_id"),
			 "password"=>"password",
			 "role"=>$request->input("role")
		 ]);
		 return redirect()->back()->with("success",__("response.update.success"));


	 }
}
