<?php

namespace App\Routing\Routes\Concretes;

use App\Http\Controllers\Contracts\IPermissionController;
use App\Routing\Routes\Bases\SearcherRoutes;
use App\Routing\Routes\Contracts\IRoutes;

class PermissionRoutes extends SearcherRoutes implements IRoutes
{
    protected string $routePrefix = 'permissions';
    protected IPermissionController $permissionController;
    public function __construct(IPermissionController $permissionController)
    {
        $this->permissionController = $permissionController;
        parent::__construct($this->routePrefix, $permissionController);
    }
}
