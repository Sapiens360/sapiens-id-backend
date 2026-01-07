<?php

namespace App\Services\Concretes;

use App\Models\Concretes\Category;
use App\Services\Bases\Service;

class CategoryService extends Service
{
    public function __construct(Category $model)
    {
        return parent::__construct($model);
    }
}
