<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class StructureController extends Controller
{
    public function index()
    {
    	$structures = Structure::query()->get();
    	return view("superAdmin.structures.index",[
    		"structures"=>$structures
		]);
    }

    public function update(Request $request,$structureId){
		 $request->validate([
			 "description"=>['required','string'],
			 "nom"=>"required|string",
			 "structure_id"=>['required','int',Rule::exists("structures","id")]
		 ]);
		 Structure::query()->where("id","=",$structureId)->update([
			 "nom"=>$request->input("nom"),
			 "description"=>$request->input("description")
		 ]);
		 return redirect()->back()->with("success",__("response.update.success"));
	 }

	 public  function  delete($structureId){
		 \Validator::make(['structureId'=>$structureId],[
			 "structuredId"=>["int",Rule::exists("structures","id")]
		 ])->validate();
		 Structure::query()->delete();
		 return redirect()->back()->with("success",__("response.delete.success"));
	 }

	 public function store(Request $request){
		 Validator::make($request->only("description","email"),[
			 "nom"=>"required|string|unique:structures,nom",
			 "description"=>['required','string']
		 ])->validate();
		 //
		 Structure::query()->create([
			 "nom"=>$request->input("nom"),
			 "description"=>$request->input("description"),
		 ]);

		 return redirect()->back()->with("success",__("response.create.success"));
	 }
}
