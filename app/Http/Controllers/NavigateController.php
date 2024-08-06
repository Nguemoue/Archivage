<?php

namespace App\Http\Controllers;

use App\Models\Classement;
use Illuminate\Http\Request;

class NavigateController extends Controller
{
    public function __invoke(Request $request)
    {
    	$user = $request->user('web');
    	$structureId = $user->structure_id;
    	$classements = Classement::query()->whereStructureId($structureId)->get();
        return view("navigate.index",[
        	"classements" => $classements
		  ]);
    }
}
