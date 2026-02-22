<?php

namespace App\Routing\Routes\Concretes;

use App\Http\Controllers\Contracts\IInstituteController;
use App\Routing\Routes\Bases\SearcherRoutes;
use App\Routing\Routes\Contracts\IRoutes;
use Illuminate\Support\Facades\Route;

class InstituteRoutes extends SearcherRoutes implements IRoutes
{
    protected string $routePrefix = 'institutes';
    protected IInstituteController $instituteController;

    public function __construct(IInstituteController $instituteController)
    {
        $this->instituteController = $instituteController;
        parent::__construct($this->routePrefix, $instituteController);
    }

    public function register(): void
    {
        parent::register();
        Route::prefix($this->routePrefix . '/{id}/apps')->controller($this->instituteController::class)->group(function () {
            Route::get('verify/access/code/{code}', 'verifyAppAccess');
            Route::put('add', 'addApps');
            Route::put('remove', 'removeApps');
        });
    }
}
