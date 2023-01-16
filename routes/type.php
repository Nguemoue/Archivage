<?php

use App\Http\Controllers\SousTypeDocumentController;
use App\Http\Controllers\TypeDocumentController;
use Illuminate\Support\Facades\Route;

Route::group([
    // 'as' => "",
    // 'prefix' => 'type',
], function () {
    Route::resource("type",TypeDocumentController::class);
});

Route::group(
    [

    ],
    function () {
        Route::resource("soustype", SousTypeDocumentController::class);

    });
// dededed
// de