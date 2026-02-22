<?php

namespace App\Services\Concretes;

use App\Models\Concretes\Permission;
use App\Services\Bases\SearcherService;

class PermissionService extends SearcherService
{
    public function __construct(Permission $model)
    {
        return parent::__construct($model);
    }
}
