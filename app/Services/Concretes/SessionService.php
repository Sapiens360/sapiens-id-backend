<?php

namespace App\Services\Concretes;

use App\Models\Concretes\Session;
use App\Services\Bases\SearcherService;

class SessionService extends SearcherService
{
    public function __construct(Session $model)
    {
        return parent::__construct($model);
    }
}
