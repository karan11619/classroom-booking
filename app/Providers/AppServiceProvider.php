<?php

namespace App\Providers;

use App\Repositories\BookingRepositoryInterface;
use App\Repositories\ClassroomRepositoryInterface;
use App\Services\BookingService;
use App\Services\ClassroomService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ClassroomRepositoryInterface::class, ClassroomService::class);
        $this->app->bind(BookingRepositoryInterface::class, BookingService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
