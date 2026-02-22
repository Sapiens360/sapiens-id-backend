<?php

namespace App\Services\Bases;

use App\Models\Concretes\Category;
use App\Services\Contracts\IAppService;
use App\Services\Contracts\ICategoryService;

abstract class BaseCategoryService extends SearcherService implements ICategoryService
{
    protected Category $category;

    protected IAppService $appService;

    public function __construct(Category $category, IAppService $appService)
    {
        $this->category = $category;
        $this->appService = $appService;

        parent::__construct($category);
    }

    public function create(array $data, ?string $uniqueColumn = null, ?bool $generateCode = false): Category
    {
        $appId = $data['app'];

        $app = $this->appService->getBy('id', $appId, false, true, []);

        $code = $this->generateCode($app->name).'.'.$this->generateCode($data['name']);

        $data['code'] = $code;

        return parent::create($data, $uniqueColumn, $generateCode);
    }

    private function generateCode(string $code): string
    {
        $result = trim($code);
        $result = preg_replace('/\s+/', '_', $result);

        return mb_strtoupper($result, 'UTF-8');
    }
}
