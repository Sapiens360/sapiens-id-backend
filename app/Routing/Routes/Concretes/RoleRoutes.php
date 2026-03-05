<?php

namespace App\Routing\Routes\Concretes;

use App\Http\Controllers\Contracts\IRoleController;
use App\Routing\Routes\Bases\SearcherRoutes;
use App\Routing\Routes\Contracts\IRoutes;
use Illuminate\Support\Facades\Route;

class RoleRoutes extends SearcherRoutes implements IRoutes
{
    protected string $routePrefix = 'roles';
    protected IRoleController $roleController;

    public function __construct(IRoleController $roleController)
    {
        $this->roleController = $roleController;
        parent::__construct($this->routePrefix, $roleController);
    }

    public function register(): void
    {
        parent::register();
        Route::prefix($this->routePrefix . '/{id}/permissions')->controller($this->roleController::class)->group(function () {
            Route::get('', 'getMyPermission');
        });
    }
}
