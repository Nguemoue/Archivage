<?php

namespace App\Http\Controllers;

use App\Models\Classement;

class NavigateController extends Controller
{
    public function __invoke()
    {
    	$user = webAuth()->user();
    	$classements = Classement::query()->whereUserId($user->id)->get();
        return view("navigate.index",[
        	"classements" => $classements
		  ]);
    }
}
