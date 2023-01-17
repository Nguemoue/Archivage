<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\SousTypeDocument;
use Illuminate\Http\Request;

class SousTypeFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
    //  * @return \Illuminate\Http\Response
     */
    public function index(SousTypeDocument $soustype)
    {
        // 
        $fields = $soustype->fields;
        return view("fields.index", compact("fields","soustype"));
    }

    /**
     * Show the form for creating a new resource.
     *
    //  * @return \Illuminate\Http\Response
     */
    public function create(SousTypeDocument $soustype)
    {
        return view("fields.create", compact("soustype"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$soustype)
    {
        $request->validate([
            'nom'=>'required',
        ]);

        $data = $request->only('nom', 'type', 'placeholder', 'min', 'class', 'max', 'value','label');
        $data += ["required"=>$request->boolean("required"),"sous_type_document_id"=>$soustype];
        Field::query()->create($data);
        return redirect()->route("soustype.fields.index", ['soustype' => $soustype])->with("success", "champ ajouter avec success");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
    //  * @return \Illuminate\Http\Response
     */
    public function edit(SousTypeDocument $soustype,Field $field)
    {
        return view("fields.edit", compact("soustype", "field"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SousTypeDocument $soustype,Field $field)
    {
        $request->validate([
            'nom'=>'required'
        ]);
        $data = $request->only('nom', 'type', 'placeholder', 'min', 'class', 'max', 'value', 'label');
        $data += ["required" => $request->boolean("required")];
        $field->update($data);
        return redirect()->route("soustype.fields.index", ['soustype' => $soustype->id])->with("success", "Mis a jour avec success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SousTypeDocument $soustype,Field $field)
    {
        $field->delete();
        return redirect()->route("soustype.fields.index", ['soustype' => $soustype->id])->with("success","Element suprimer avec success");
    }
}
