<?php

namespace App\Http\Controllers\Bases;

use App\Http\Controllers\Contracts\IPermissionController;
use App\Services\Contracts\IPermissionService;

class BasePermissionController extends SearcherController implements IPermissionController
{
    protected array $createRules = [
        'name' => 'required|string|max:255',
        'category_id' => 'required|uuid|exists:categories,id'
    ];

    protected array $updateRules = [
        'name' => 'string|max:255',
        'category_id' => 'uuid|exists:categories,id'
    ];

    public function __construct(IPermissionService $service)
    {
        parent::__construct($service, $this->createRules, $this->updateRules);
    }
}
