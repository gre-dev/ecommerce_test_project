<?php

namespace App\Providers;

use App\Interfaces\ProductServiceInterface;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\ReviewRepositoryInterface;
use App\Repositories\ReviewRepository;
use Illuminate\Support\Facades\Schema;
use App\Services\ProductService;
use Illuminate\Support\Facades\View;
use App\Models\Product;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(ReviewRepositoryInterface::class, ReviewRepository::class);
        $this->app->bind(ProductServiceInterface::class, ProductService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        // إضافة view composer للـ header
        View::composer('partials.header', function ($view) {
            $view->with('products', Product::all());
        });
    }
}
