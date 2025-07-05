<?php

namespace App\Providers;

use App\Contracts\ReservationInterface;
use App\Contracts\ServiceInterface;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\ServiceProvider;
use App\Http\Patterns\Repositories\ReservationRepository;
use App\Http\Patterns\Repositories\ServiceRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ServiceInterface::class,ServiceRepository::class);
        $this->app->bind(ReservationInterface::class,ReservationRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
