<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "index"])->name(
    "products.index"
);;
Route::get("/products/{id}", [ProductController::class, "show"])->name(
    "products.show"
);
// Route to handle review submission
Route::post('products/{id}/reviews', [ProductController::class, 'storeReview'])->name('products.storeReview');
// Route to update product status
Route::post('/products/{id}/update-status', [ProductController::class, 'updateStatus'])->name('products.updateStatus');
