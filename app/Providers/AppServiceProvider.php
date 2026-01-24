<?php

namespace App\Providers;

use App\Services\Bases\BaseInstituteService;
use App\Services\Bases\SearcherService;
use App\Services\Bases\Service;
use App\Services\Concretes\InstituteService;
use App\Services\Contracts\IInstituteService;
use App\Services\Contracts\ISearcherService;
use App\Services\Contracts\IService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(IService::class, Service::class);
        $this->app->singleton(IService::class, ISearcherService::class);
        $this->app->singleton(ISearcherService::class, SearcherService::class);
        $this->app->singleton(ISearcherService::class, IInstituteService::class);
        $this->app->singleton(IInstituteService::class, BaseInstituteService::class);
        $this->app->singleton(BaseInstituteService::class, InstituteService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
