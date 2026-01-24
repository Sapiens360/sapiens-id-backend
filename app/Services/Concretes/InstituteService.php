<?php

namespace App\Services\Concretes;

use App\Models\Concretes\Institute;
use App\Services\Bases\BaseInstituteService;

class InstituteService extends BaseInstituteService
{
    public function __construct(Institute $model)
    {
        return parent::__construct($model);
    }
}
