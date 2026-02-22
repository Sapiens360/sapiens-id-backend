<?php

namespace App\Routing\Routes\Bases;

use App\Http\Controllers\Contracts\IController;
use App\Routing\Registers\Concretes\CrudRoutesRegister;
use App\Routing\Routes\Contracts\IRoutes;

abstract class Routes implements IRoutes
{
    protected string $route;
    protected IController $controller;

    public function __construct(string $route, IController $controller)
    {
        $this->route = $route;
        $this->controller = $controller;
    }

    public function register(): void
    {
        app(CrudRoutesRegister::class)->register($this->route, $this->controller::class);
    }
}
