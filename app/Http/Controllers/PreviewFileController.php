<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\TempDocument;
use App\Models\TempDossier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PreviewFileController extends Controller
{
    function __invoke(Request $request,$id)
    {


        $tempDoc = TempDocument::query()->findOrFail($id);
        $pathToFile = $tempDoc->url;
        $pathToFile = storage_path(tmpDisk().DIRECTORY_SEPARATOR.$pathToFile);


        // dd($content);
        // dd("d");
        // return response()->content($pathToFile,"filename",['Content-Type'=>'application/octect-stream']);
        // return view("pdf.content", ['content' => $content,'path'=>$pathToFile],[],[
        //     'Content-Type'=>"application/octect-pdf"
        // ]);
		 return response()->file($pathToFile,["Content-Disposition"=>"inline"]);

    }

    function previewFile($documentId){
		 $tempDoc = Document::query()->findOrFail($documentId);
		 $pathToFile = ($tempDoc->url);
		 return response()->file($pathToFile,["Content-Disposition"=>"inline"]);
	 }
}
