<?php

namespace App\Http\Controllers;

use App\Models\TempDocument;
use App\Models\TempDossier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PreviewFileController extends Controller
{
    function __invoke(Request $request,$id)
    {
        $imageMimes = ['img', 'jpg', 'jif', 'png'];
        // je selectionne le documents
        $tempDoc = TempDocument::query()->findOrFail($id);
        $pathToFile = $tempDoc->url;
        $pathToFile = base_path("storage/app/").$pathToFile;


        // dd($content);
        // dd("d");
        // return response()->content($pathToFile,"filename",['Content-Type'=>'application/octect-stream']);
        // return view("pdf.content", ['content' => $content,'path'=>$pathToFile],[],[
        //     'Content-Type'=>"application/octect-pdf"
        // ]);
		 return response()->file($pathToFile,["Content-Disposition"=>"inline"]);

    }

    function previewFile($url){
			$hashed = base64_decode($url);
			$extParts = explode(".",$hashed);
			$ext = \Arr::last($extParts);
			$mime = $ext == "pdf"?"application/pdf":"image/$ext";
			$file = Storage::disk("local")->get($hashed);
			return  response($file)->withHeaders([
				"Content-Type"=>$mime
			]);
	 }
}
