<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminHomeController extends Controller
{
    public function index()
    {

    }

    public function home(){

    	return view("admin.index");
	 }
}
