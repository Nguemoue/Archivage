<?php

namespace App\Http\Controllers;

use App\Models\SousTypeDocument;
use App\Http\Requests\StoreSousTypeDocumentRequest;
use App\Http\Requests\UpdateSousTypeDocumentRequest;
use App\Models\TypeDocument;

class SousTypeDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sousTypes = SousTypeDocument::all();
        // dd($sousTypes);
        return view("soustypes.index", compact("sousTypes")); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = TypeDocument::all();
        return view("soustypes.create", compact("types"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSousTypeDocumentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSousTypeDocumentRequest $request)
    {
        $data = $request->validated();
        SousTypeDocument::query()->create($data);
        return redirect()->route("soustype.index")->with("success", "sous type creer avec success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SousTypeDocument  $sousTypeDocument
     * @return \Illuminate\Http\Response
     */
    public function show(SousTypeDocument $sousTypeDocument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SousTypeDocument  $sousTypeDocument
     * @return \Illuminate\Http\Response
     */
    public function edit(SousTypeDocument $soustype)
    {
        $types = TypeDocument::query()->get();
        $sousType = $soustype;
        return view("soustypes.edit", compact("sousType", "types"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSousTypeDocumentRequest  $request
     * @param  \App\Models\SousTypeDocument  $sousTypeDocument
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSousTypeDocumentRequest $request, SousTypeDocument $soustype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SousTypeDocument  $sousTypeDocument
     * @return \Illuminate\Http\Response
     */
    public function destroy(SousTypeDocument $soustype)
    {
        //
    }
}
