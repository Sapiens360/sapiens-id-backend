<?php

namespace App\Routing\Routes\Concretes;

use App\Http\Controllers\Contracts\IAppController;
use App\Routing\Routes\Bases\SearcherRoutes;
use App\Routing\Routes\Contracts\IRoutes;

class AppRoutes extends SearcherRoutes implements IRoutes {
    protected string $routePrefix = 'apps';
    protected IAppController $appController;

    public function __construct(IAppController $appController) {
        $this->appController = $appController;
        parent::__construct($this->routePrefix, $appController);
    }
}
