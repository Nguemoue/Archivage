<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SousClassementCollection;
use App\Http\Resources\SousClassementResource;
use App\Models\SousClassement;
use Illuminate\Http\Request;

class ApiSousClassementController extends Controller
{
	public function index(int $classement, Request $request)
	{
		return new SousClassementCollection(SousClassement::query()->whereClassementId($classement)->get());
	}
}
