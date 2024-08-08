<?php

namespace App\Http\Controllers\Scan;

use App\Actions\Scan\ScanFolderStoreAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Scan\ScanFolderStoreRequest;
use App\Models\Dossier;
use App\Models\TempDossier;
use App\Services\Scan\ScanService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class ScanDossierController extends Controller
{
	public function __construct(public ScanService $scanService, public ScanFolderStoreAction $folderStoreAction)
	{
	}

	public function index()
	{
		return view("scann.dossiers.index");
	}

	public function store(ScanFolderStoreRequest $request): JsonResponse
	{

		$this->folderStoreAction->handle(request: $request);

		return response()->json([
			'status' => 'ok'
		]);

	}

	public function create():View
	{
		$dossiers = TempDossier::all(['id','nom']);
		return view("scann.dossiers.create",[
			'dossiers'=>$dossiers
		]);
	}
}
