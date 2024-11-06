<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

// Product Routes
Route::group(['prefix' => 'products'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::post('/', [ProductController::class, 'store'])->name('products.store');
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::patch('/{id}/status', [ProductController::class, 'updateStatus'])->name('products.status.update');
});

Route::get('/products/{id}/status/edit', [ProductController::class, 'editStatus'])
    ->name('products.status.edit');
Route::get('createProducts', [ProductController::class, 'create'])->name('products.create');  // نقل مسار create قبل مسار {id}
Route::post('/products/search', [ProductController::class, 'search'])->name('products.search');

// Review Routes
Route::post('reviews/{productId}', [ReviewController::class, 'store'])->name('reviews.store');
