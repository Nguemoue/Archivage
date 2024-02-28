<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;

class PdfFiscalController extends Controller
{
    public function index(){

    	return view("pdfFiscal.index")->with("button",true);
	 }

	 public function store(){

		 $options = [
//			"enable-forms"=>true,
			 "enable-javascript" =>true,
			 "javascript-delay"=>400,
			 "enable-local-file-access"=>true,
			 "footer-center"=>"DIRECTION GÉNÉRALE DES IMPÔTS/DIRECTORATE GENERAL OF TAXATION",
			 "footer-right"=>"[frompage]/[topage]"
		 ];
		 $file = SnappyPdf::loadView("pdfFiscal.index", []);
		 $file->setOptions($options)->setTemporaryFolder(base_path('resources/tempDir/pdf'));
		 $content = $file->output();
		 return response($content)->withHeaders([
			 "Content-Type" => "application/pdf",
			 "Content-Disposition" => "inline"
		 ]);
	 }
}
