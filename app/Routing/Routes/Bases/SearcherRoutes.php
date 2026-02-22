<?php

namespace App\Routing\Routes\Bases;

use App\Http\Controllers\Contracts\ISearcherController;
use App\Routing\Registers\Concretes\SearcherRoutesRegister;
use App\Routing\Routes\Contracts\IRoutes;

abstract class SearcherRoutes extends Routes implements IRoutes
{
    protected ISearcherController $searcherController;

    public function __construct(string $route, ISearcherController $searcherController)
    {
        $this->searcherController = $searcherController;
        parent::__construct($route, $this->searcherController);
    }

    public function register(): void
    {
        parent::register();
        app(SearcherRoutesRegister::class)->register($this->route, $this->searcherController::class);
    }
}
