<?php

namespace App\Services\Bases;

use App\Models\Concretes\Permission;
use App\Services\Contracts\ICategoryService;
use App\Services\Contracts\IPermissionService;

class BasePermissionService extends SearcherService implements IPermissionService
{
    protected Permission $permission;
    protected ICategoryService $categoryService;

    public function __construct(Permission $permission, ICategoryService $categoryService)
    {
        $this->permission = $permission;
        $this->categoryService = $categoryService;
        parent::__construct($permission);
    }

    public function create(array $data, ?string $uniqueColumn = null, ?bool $generateCode = false): Permission
    {
        $categoryId = $data['category'];

        $category = $this->categoryService->getBy('id', $categoryId, false, true, []);

        $code = $category->code . '.' . $this->generateCode($data['name']);

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
