<?php

namespace App\Services\Concretes;

use App\Models\Concretes\Role;
use App\Services\Bases\SearcherService;

class RoleService extends SearcherService
{
    public function __construct(Role $model)
    {
        return parent::__construct($model);
    }
}
