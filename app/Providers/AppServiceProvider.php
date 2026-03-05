<?php

namespace App\Providers;

use App\Http\Controllers\Bases\Controller;
use App\Http\Controllers\Bases\SearcherController;
use App\Http\Controllers\Concretes\AppController;
use App\Http\Controllers\Concretes\CategoryController;
use App\Http\Controllers\Concretes\InstituteController;
use App\Http\Controllers\Concretes\PermissionController;
use App\Http\Controllers\Concretes\RoleController;
use App\Http\Controllers\Contracts\IAppController;
use App\Http\Controllers\Contracts\ICategoryController;
use App\Http\Controllers\Contracts\IController;
use App\Http\Controllers\Contracts\IInstituteController;
use App\Http\Controllers\Contracts\IPermissionController;
use App\Http\Controllers\Contracts\IRoleController;
use App\Http\Controllers\Contracts\ISearcherController;
use App\Services\Bases\SearcherService;
use App\Services\Bases\Service;
use App\Services\Concretes\AppService;
use App\Services\Concretes\CategoryService;
use App\Services\Concretes\InstituteService;
use App\Services\Concretes\PermissionService;
use App\Services\Concretes\RoleService;
use App\Services\Concretes\VerificationService;
use App\Services\Contracts\IAppService;
use App\Services\Contracts\ICategoryService;
use App\Services\Contracts\IInstituteService;
use App\Services\Contracts\IPermissionService;
use App\Services\Contracts\IRoleService;
use App\Services\Contracts\ISearcherService;
use App\Services\Contracts\IService;
use App\Services\Contracts\IVerificationService;
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
        // category
        $this->app->bind(ICategoryService::class, CategoryService::class);
        // permission
        $this->app->bind(IPermissionService::class, PermissionService::class);
        // role
        $this->app->bind(IRoleService::class, RoleService::class);
        // verification code
        $this->app->bind(IVerificationService::class, VerificationService::class);

        // Controllers
        // general
        $this->app->bind(IController::class, Controller::class);
        $this->app->bind(ISearcherController::class, SearcherController::class);
        // institute
        $this->app->bind(IInstituteController::class, InstituteController::class);
        // app
        $this->app->bind(IAppController::class, AppController::class);
        // category
        $this->app->bind(ICategoryController::class, CategoryController::class);
        // permission
        $this->app->bind(IPermissionController::class, PermissionController::class);
        // role
        $this->app->bind(IRoleController::class, RoleController::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
