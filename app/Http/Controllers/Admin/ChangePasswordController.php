<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
	public function index()
	{
		$auth = app('auth')->guard(adminGuard())->user();
		return view("admin.passwordReset.index",['auth'=>$auth]);
	}

	public function store(Request $request){
		$auth = \Auth::guard(adminGuard())->user();
		$request->validate([
			'password'=>"required|confirmed"
		]);
		$auth->forceFill([
			"password_changed_at" => now(),
			"password" => bcrypt($request->input("password"))
		]);
		$auth->save();
		\Auth::guard(adminGuard())->logout();
		return redirect()->route("login");

	}

}
