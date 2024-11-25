<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\HomeController;

// Define the route for the index method
Route::get('/', [HomeController::class, 'index'])->name('home');
