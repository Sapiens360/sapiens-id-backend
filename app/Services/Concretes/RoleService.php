<?php

namespace App\Services\Concretes;

use App\Models\Concretes\Role;
use App\Services\Bases\Service;

class RoleService extends Service
{
    public function __construct(Role $model)
    {
        return parent::__construct($model);
    }
}
