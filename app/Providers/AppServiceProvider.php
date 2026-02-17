<?php

namespace App\Providers;

// Controller
use App\Http\Controllers\Bases\Controller;
use App\Http\Controllers\Bases\SearcherController;
use App\Http\Controllers\Concretes\AppController;
use App\Http\Controllers\Concretes\InstituteController;
use App\Http\Controllers\Contracts\IAppController;
use App\Http\Controllers\Contracts\IController;
use App\Http\Controllers\Contracts\IInstituteController;
use App\Http\Controllers\Contracts\ISearcherController;
// Services
use App\Services\Bases\SearcherService;
use App\Services\Bases\Service;
use App\Services\Concretes\AppService;
use App\Services\Concretes\InstituteService;
use App\Services\Contracts\IAppService;
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
        // Services
        // general
        $this->app->bind(IService::class, Service::class);
        $this->app->bind(ISearcherService::class, SearcherService::class);
        // institute
        $this->app->bind(IInstituteService::class, InstituteService::class);
        // app
        $this->app->bind(IAppService::class, AppService::class);

        // Controllers
        // general
        $this->app->bind(IController::class, Controller::class);
        $this->app->bind(ISearcherController::class, SearcherController::class);
        // institute
        $this->app->bind(IInstituteController::class, InstituteController::class);
        // app
        $this->app->bind(IAppController::class, AppController::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
