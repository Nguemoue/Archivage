<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScannController extends Controller
{
    function index(){
        return view("scann.index");
    }
}
