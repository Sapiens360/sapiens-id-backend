<?php

namespace App\Services\Concretes;

use App\Models\Concretes\User;
use App\Services\Bases\Service;

class UserService extends Service
{
    public function __construct(User $model)
    {
        return parent::__construct($model);
    }
}
