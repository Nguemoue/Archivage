<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Structure;

class AdminHomeController extends Controller
{
    public function index()
    {

    }

    public function home(){

    	$structures = Structure::query()->get();
    	$data = [
    		"structures"=>$structures,
			"auth"=>adminAuth()->user()
		];
    	return view("admin.index",$data);
	 }
}
