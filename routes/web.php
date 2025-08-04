<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});


Route::resource('/student', StudentController::class);
Route::resource('/book', BooksController::class);
