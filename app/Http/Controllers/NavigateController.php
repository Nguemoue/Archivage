<?php

namespace App\Http\Controllers;

use App\Models\Classement;

class NavigateController extends Controller
{
    public function __invoke()
    {
    	$user = webAuth()->user();
    	$structureId = $user->structure_id;
    	$classements = Classement::query()->whereStructureId($structureId)->get();
        return view("navigate.index",[
        	"classements" => $classements
		  ]);
    }
}
