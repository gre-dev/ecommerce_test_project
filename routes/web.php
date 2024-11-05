<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "index"]);

/*==========================================
=               products Route         =
==========================================*/
Route::group(["prefix" => "products"], function () {
    Route::get("/{product}", [ProductController::class, "show"])->name("products.show");
    Route::post("/{product}/reviews", [ProductController::class, "storeReview"])->name("products.reviews.store");
    Route::post("/{product}/status", [ProductController::class, "updateStatus"])->name("products.updateStatus");
});
