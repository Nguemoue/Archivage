<?php

namespace App\Http\Controllers\Scan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScanDossierController extends Controller
{
    function index(){
        return view("scann.dossiers.index");
    }
}
