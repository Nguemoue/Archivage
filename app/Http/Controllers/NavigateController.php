<?php

namespace App\Http\Controllers;

class NavigateController extends Controller
{
    public function __invoke()
    {
        return view("navigate.index");
    }
}