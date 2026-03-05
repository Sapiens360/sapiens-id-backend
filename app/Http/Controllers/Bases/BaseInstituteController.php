<?php

namespace App\Http\Controllers\Bases;

use App\Http\Controllers\Contracts\IInstituteController;
use App\Services\Contracts\IInstituteService;

abstract class BaseInstituteController extends SearcherController implements IInstituteController
{
    protected array $createRules = [
        'name' => 'required|string|min:3|max:255',
        'email' => 'required|email|max:191',
        'phone' => 'nullable|string|phone:BO|max:20',
    ];

    protected array $updateRules = [
        'name' => 'string|min:3|max:255',
        'email' => 'email|max:191',
        'phone' => 'string|phone:BO|max:20',
    ];

    public function __construct(IInstituteService $service)
    {
        return parent::__construct($service, $this->createRules, $this->updateRules);
    }
}
