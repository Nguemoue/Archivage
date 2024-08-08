<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SousTypeDocument;
use App\Models\SousTypesField;
use Illuminate\Support\Arr;
use Nette\Utils\Json;

class SousTypeApiController extends Controller
{
    public function index($id)
    {
        #je recupere son soustype
        $sousType = SousTypeDocument::find($id);
        $documents = $sousType->documents;
        $final = collect();
        $except = collect(["dossierId"]);
        ($documents->pluck("fields")->map(function ($elt)
        {
          return array_column($elt->toArray(),'label');
        })->each(function ($req) use(&$final,$except){
            foreach ($req as $re){
                if(!$final->contains($re) and $except->doesntContain($re)){
                    $final->add($re);
                }
            }
        }));
        return response()->json($final);
    }
}
