<?php

namespace App\Providers;

use App\Services\CoinGeckoCurrenciesService;
use App\Services\CurrenciesService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CurrenciesService::class, CoinGeckoCurrenciesService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
