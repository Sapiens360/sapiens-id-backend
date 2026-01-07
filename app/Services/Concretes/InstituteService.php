<?php

namespace App\Services\Concretes;

use App\Models\Concretes\Institute;
use App\Services\Bases\Service;

class InstituteService extends Service
{
    public function __construct(Institute $model)
    {
        return parent::__construct($model);
    }
}
