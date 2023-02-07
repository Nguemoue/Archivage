<?php

namespace App\Http\Controllers\Traitement;

use App\Http\Controllers\Controller;
use App\Models\TempDocument;
use App\Models\TempDossier;
use Dotenv\Util\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class TraitementController extends Controller
{
    function index(){
        // dd(session('status'));
        // dd(app("controllers","TraitementController"));
        $date_format = "%Y-%m-%d";
        // je selectionne tous mes documents
        $temp_documents = TempDocument::query()->whereDoesntHave("tempDossiers")->paginate(10);
        $temp_dossiers = TempDossier::all();
        $req = TempDossier::query()
            ->whereHas("tempDocuments")
            ->selectRaw("DATE_FORMAT(created_at,'$date_format') as date")
//            ->groupByRaw("DATE_FORMAT(created_at,'$date_format')")
            ->get();
        // dd($temp_dossiers);
//        $temp_dossiers = [];
//        foreach($req as $item){
//            $date = $item->date->format('Y-m-d');
//            // dump($date);
//            $temp_dossiers[$item->date->isoFormat('ll')] = TempDossier::query()->whereHas("tempDocuments")
//                            ->whereRaw("DATE_FORMAT(created_at,'$date_format')  = '{$date}' ")->get();
//        }
        // dd($temp_dossiers);
        // Str::utf8()
        // session()->flash("success", "welcome");
//		 dd($temp_dossiers);
        return view("traitement.index",compact('temp_documents','temp_dossiers'));

    }
}
