<?php

namespace App\Http\Controllers\Bases;

use App\Http\Controllers\Contracts\IAppController;
use App\Services\Contracts\IAppService;

abstract class BaseAppController extends SearcherController implements IAppController
{
    protected IAppService $appService;

    protected array $createRules = [
        'description' => 'required|string|min:3|max:255',
        'name' => 'required|string|min:3|max:255',
        'version' => 'required|string|max:255',
        'is_default' => 'required|boolean',
    ];

    protected array $updateRules = [
        'description' => 'string|min:3|max:255',
        'name' => 'string|min:3|max:255',
        'version' => 'string|max:255',
        'is_default' => 'boolean',
    ];

    public function __construct(IAppService $service)
    {
        $this->appService = $service;

        return parent::__construct($service, $this->createRules, $this->updateRules);
    }
}
