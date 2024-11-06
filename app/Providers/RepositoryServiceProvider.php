<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ReviewRepositoryInterface;
use App\Repositories\ReviewRepository;
use App\Interfaces\ProductStatusServiceInterface;
use App\Services\ProductStatusService;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ReviewRepositoryInterface::class, ReviewRepository::class);
        $this->app->bind(ProductStatusServiceInterface::class, ProductStatusService::class);
    }
} 
