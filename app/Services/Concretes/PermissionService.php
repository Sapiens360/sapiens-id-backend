<?php

namespace App\Services\Concretes;

use App\Models\Concretes\Permission;
use App\Services\Bases\Service;

class PermissionService extends Service
{
    public function __construct(Permission $model)
    {
        return parent::__construct($model);
    }
}
