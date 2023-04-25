<?php

namespace App\Http\Controllers\Traitement;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Dossier;
use App\Models\DossierDocument;
use App\Models\TempDocument;
use App\Models\TempDossier;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Nette\Utils\Json;
use Symfony\Component\HttpFoundation\Response;
use function PHPUnit\Framework\throwException;

class TraitementDossier extends Controller
{
    function show($id)
    {
        $dossier = TempDossier::query()->findOrFail($id);
        return view("traitement.dossiers.show", compact('dossier'));
    }


    /**
     * fonction qui effectue le traitement final du dossier
     * @param $id
     * @param \Illuminate\Http\Request $request
     * @throws \Throwable
     */
    public function finish($id, Request $request){

    		$method = "move";
    		$method = $request->input("copy") == '1' ?"copy":$method;
         $dossier = TempDossier::query()->findOrFail($id);
         abort_if($dossier == null,new Response("model non trouve",404));
         $tempDocuments = $dossier->tempDocuments;

		 $sessionsDoc = session("dossier-{$id}");
        $doc = new Dossier();
        $doc->nom = $dossier->nom;
        $doc->numero = Str::uuid();
        $doc->save();

        foreach ($sessionsDoc as $key => $item) {
            $tempDocumentKey = explode("-",$key)[1];
            $tmpDoc = TempDocument::find($tempDocumentKey);
            //je cree un dossiers
            $storage = Storage::disk("local")->createDir($doc->nom);
            $document = new Document();
            $document->nom = $item["titre"];
            $document->created_at = $item["created_at"];
            $document->updated_at = $item["updated_at"];
            $document->data = Json::decode($item["data"],true);
            $document->numero = Str::uuid();
            $ext = explode(".",$tmpDoc->url)[1];
//            dd($ext);
            $newUrl = $doc->nom."/". $document->numero.'.'.$ext;
            if(Storage::exists($tmpDoc->url)){
                Storage::$method($tmpDoc->url,$newUrl);
            }
            $newUrl = str_replace(DIRECTORY_SEPARATOR,"/",$newUrl);
            $document->url = $newUrl;
            $document->sous_type_document_id = $item["soustype"];
            $document->save();
            //je cree le
            $dossierDocument = new DossierDocument();
            $dossierDocument->document_id = $document->id;
            $dossierDocument->dossier_id = $doc->id;
            $dossierDocument->save();
        }

        $dossier->tempDocuments()->delete();
        $dossier->delete();
        session()->forget("dossier-{$id}");
        //je lui redirige le dossier creer vers un cardre de classement

        return redirect()->route("classement.dossier.post",[$doc->id]);
    }
}
