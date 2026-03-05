<?php

namespace App\Routing\Routes\Concretes;

use App\Http\Controllers\Contracts\IInstituteController;
use App\Routing\Routes\Bases\SearcherRoutes;
use App\Routing\Routes\Contracts\IRoutes;

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
    }
}
