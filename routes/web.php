<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\MattressController;

// Route for the mattress list page
Route::get('/', [MattressController::class, 'index'])->name('mattresses.index');

// mattress detail page
Route::get('/mattress/{id}', [MattressController::class, 'show'])->name('product.show');

Route::prefix('ajax')->group(function () {
    
    // AJAX endpoint to get product variants
    Route::get('/mattresses/get-product-variants', [MattressController::class, 'get_product_variants'])->name('mattresses.fetch.variant');
    // Route::post('/fetch-variant', [ProductController::class, 'fetchVariant'])->name('fetch.variant');

});