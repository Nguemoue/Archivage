<?php

use App\Http\Controllers\NavigateController;

\Illuminate\Support\Facades\Route::get("/navigate/index",NavigateController::class)->name("navigation.index");