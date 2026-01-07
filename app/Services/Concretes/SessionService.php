<?php

namespace App\Services\Concretes;

use App\Models\Concretes\Session;
use App\Services\Bases\Service;

class SessionService extends Service
{
    public function __construct(Session $model)
    {
        return parent::__construct($model);
    }
}
