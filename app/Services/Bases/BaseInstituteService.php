<?php

namespace App\Services\Bases;

use App\Models\Concretes\Institute;
use App\Services\Contracts\IInstituteService;

class BaseInstituteService extends SearcherService implements IInstituteService
{
    public function __construct(Institute $institute)
    {
        return parent::__construct($institute);
    }
}
