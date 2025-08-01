<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});


Route::resource('/student', StudentController::class);
Route::resource('/book', BookController::class);
