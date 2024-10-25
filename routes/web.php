<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('layout.dashboard');
    });

    Route::resource('events',EventController::class);
    Route::resource('categories',CategoryController::class);

});
