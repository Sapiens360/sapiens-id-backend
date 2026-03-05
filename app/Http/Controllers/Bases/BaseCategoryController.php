<?php

namespace App\Http\Controllers\Bases;

use App\Http\Controllers\Contracts\ICategoryController;
use App\Services\Contracts\ICategoryService;

class BaseCategoryController extends SearcherController implements ICategoryController
{
    protected array $createRules = [
        'name' => 'required|string|max:255',
        'app_id' => 'required|uuid|exists:apps,id',
    ];

    protected array $updateRules = [
        'name' => 'string|max:255',
        'app_id' => 'uuid|exists:apps,id',
    ];

    public function __construct(ICategoryService $service)
    {
        parent::__construct($service, $this->createRules, $this->updateRules);
    }
}
