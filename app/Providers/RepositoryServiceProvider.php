<?php

namespace App\Providers;

use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\ReviewRepository;
use App\Repository\EloquentRepositoryInterface;
use App\Repository\ReviewRepositoryInterface;
use App\Services\ReviewService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(ReviewRepositoryInterface::class, ReviewRepository::class);
        $this->app->bind(ReviewService::class, function ($app) {
            return new ReviewService($app->make(ReviewRepositoryInterface::class));
        });
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
