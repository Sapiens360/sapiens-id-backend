<?php

namespace App\Services\Concretes;

use App\Models\Concretes\App;
use App\Services\Bases\Service;

class AppService extends Service
{
    public function __construct(App $model)
    {
        return parent::__construct($model);
    }
}
