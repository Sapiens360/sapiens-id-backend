<?php

namespace App\Routing\Routes\Concretes;

use App\Http\Controllers\Contracts\ICategoryController;
use App\Routing\Routes\Bases\SearcherRoutes;
use App\Routing\Routes\Contracts\IRoutes;

class CategoryRoutes extends SearcherRoutes implements IRoutes
{
    protected string $routePrefix = 'categories';
    protected ICategoryController $categoryController;

    public function __construct(ICategoryController $categoryController)
    {
        $this->categoryController = $categoryController;
        parent::__construct($this->routePrefix, $categoryController);
    }
}
