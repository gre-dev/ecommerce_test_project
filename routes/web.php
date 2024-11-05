<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get("/", [HomeController::class, "index"])->name("products.all");
    Route::group(['prefix'     => 'products','as'=> 'products.',], function () {
        Route::get("/search", [ProductController::class, "search"])->name("search");
    
        Route::get("/{id}", [ProductController::class, "show"])->name("show");
        Route::Post('/status/{id}',[ProductController::class,'updateStatus'])->name('changeStatus');
    });
    Route::Post('/review/store',[ReviewController::class,'store'])->name('review.store');

});


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
