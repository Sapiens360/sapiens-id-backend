<?php

namespace App\Services\Concretes;

use App\Models\Concretes\User;
use App\Services\Bases\SearcherService;

class UserService extends SearcherService
{
    public function __construct(User $model)
    {
        return parent::__construct($model);
    }
}
