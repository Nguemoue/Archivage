<?php

namespace App\Http\Controllers;

use App\Models\TypeDocument;
use App\Http\Requests\StoreTypeDocumentRequest;
use App\Http\Requests\UpdateTypeDocumentRequest;

class TypeDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
    //  * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = TypeDocument::query()->withCount("sousTypes")->get();
        return view("types.index", compact("types"));
    }

    /**
     * Show the form for creating a new resource.
     *
    //  * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("types.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTypeDocumentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeDocumentRequest $request)
    {
        // dd($request->validated());
        TypeDocument::query()->create($request->validated());
        return redirect()->route("type.index")->with("success","nouveau type creer avec success");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeDocument  $typeDocument
     * @return \Illuminate\Http\Response
     */
    public function show(TypeDocument $typeDocument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeDocument  $typeDocument
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeDocument $type)
    {
        // dd($type);
        return view("types.edit", compact("type"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypeDocumentRequest  $request
     * @param  \App\Models\TypeDocument  $typeDocument
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeDocumentRequest $request, TypeDocument $type)
    {
        $type->nom = $request->nom;
        $type->description = $request->description;
        $type->save();
        return redirect()->route("type.index")->with("success", "Mis a jour avec success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeDocument  $typeDocument
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeDocument $type)
    {
        $type->delete();
        return redirect()->route("type.index")->with("success", "Suppression avec success");
    }
}
