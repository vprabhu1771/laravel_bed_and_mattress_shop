<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\MattressController;

// Route for the mattress list page
Route::get('/', [MattressController::class, 'index'])->name('mattresses.index');