<?php

namespace App\Services\Bases;

use App\Models\Concretes\App;
use App\Services\Contracts\IAppService;

abstract class BaseAppService extends SearcherService implements IAppService
{
    protected App $app;

    public function __construct(App $app)
    {
        $this->app = $app;
        return parent::__construct($app);
    }

    public function verifyExistByCode(string $code): ?string
    {
        $app = $this->getBy('code', $code);

        return empty($app) ? null : $app->id;
    }
}
