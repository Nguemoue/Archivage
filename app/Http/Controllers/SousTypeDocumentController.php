<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSousTypeDocumentRequest;
use App\Http\Requests\UpdateSousTypeDocumentRequest;
use App\Models\SousTypeDocument;
use App\Models\TypeDocument;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class SousTypeDocumentController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return View
	 */
	public function index()
	{
		$sousTypes = SousTypeDocument::all();
		$types = TypeDocument::all();
		return view("soustypes.index",[
			'sousTypes' => $sousTypes,
			'types' => $types
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param StoreSousTypeDocumentRequest $request
	 * @return RedirectResponse
	 */
	public function store(StoreSousTypeDocumentRequest $request)
	{
		$data = $request->validated();
		SousTypeDocument::query()->create($data);
		return redirect()->route("soustype.index")->with("success", "sous type creer avec success");
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param SousTypeDocument $soustype
	 * @return View
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
	 * @param UpdateSousTypeDocumentRequest $request
	 * @param SousTypeDocument $soustype
	 * @return RedirectResponse
	 */
	public function update(UpdateSousTypeDocumentRequest $request, SousTypeDocument $soustype)
	{
		$soustype->nom = $request->nom;
		$soustype->description = $request->descritpion;
		$soustype->type_document_id = $request->type_document_id;
		$soustype->save();
		return redirect()->route("soustype.index")->with("success", "Mis a jour avec success");

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param SousTypeDocument $soustype
	 * @return RedirectResponse
	 */
	public function destroy(SousTypeDocument $soustype)
	{
		$soustype->delete();
		return redirect()->route("soustype.index")->with("success", "supprimer avec success");
	}
}
