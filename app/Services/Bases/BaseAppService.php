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

    public function create(array $data, ?string $uniqueColumn = null, ?bool $generateCode = false): App
    {
        $data['code'] = $this->generateCode($data['name']);

        return parent::create($data, $uniqueColumn, $generateCode);
    }

    private function generateCode(string $code): string
    {
        $result = trim($code);
        $result = preg_replace('/\s+/', '_', $result);

        return mb_strtoupper($result, 'UTF-8');
    }
}
