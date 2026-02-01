<?php

namespace App\Http\Controllers\Bases;

use App\Http\Controllers\Contracts\IAppController;
use App\Services\Contracts\IAppService;

abstract class BaseAppController extends SearcherController implements IAppController
{
    protected IAppService $appService;

    protected array $createRules = [
        'name' => 'required|string|min:3|max:255',
        'version' => 'required|string|max:255',
    ];

    protected array $updateRules = [
        'name' => 'string|min:3|max:255',
        'version' => 'string|max:255',
    ];

    public function __construct(IAppService $service)
    {
        $this->appService = $service;

        return parent::__construct($service, $this->createRules, $this->updateRules);
    }
}
