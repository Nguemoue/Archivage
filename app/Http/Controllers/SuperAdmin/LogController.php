<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Log;

class LogController extends Controller
{
    public function index()
    {
    	$logs = Log::query()->paginate(40);
    	return view("superAdmin.logs.list",[
    		"logs"=>$logs
		]);
    }

    public function destroy($key){
		Log::whereKey($key)->delete();
		return redirect()->back()->with("success","supprime avec success");
	 }
}
