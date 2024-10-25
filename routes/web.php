<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AttendeeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('layout.dashboard');
    });

    Route::resource('events', EventController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('attendees', AttendeeController::class);
});
