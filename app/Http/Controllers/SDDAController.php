<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SDDAController extends Controller
{
    function index(){
        return view("sdda.index");
    }
}
