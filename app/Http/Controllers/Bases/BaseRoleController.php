<?php

namespace App\Http\Controllers\Bases;

use App\Http\Controllers\Contracts\IRoleController;
use App\Models\Responses\Concretes\SuccessResponse;
use App\Services\Contracts\IRoleService;

class BaseRoleController extends SearcherController implements IRoleController
{
    protected IRoleService $roleService;
    protected array $createRules = [
        'name' => 'required|string|max:255',
        'permissions' => 'required|array',
        'permissions.*' => 'uuid'
    ];
    protected array $updateRules = [
        'name' => 'string|max:255',
        'permissions' => 'array',
        'permissions.*' => 'uuid'
    ];

    public function __construct(IRoleService $roleService)
    {
        $this->roleService = $roleService;
        parent::__construct($roleService, $this->createRules, $this->updateRules);
    }

    function getMyPermission(int $id)
    {
        $permissions = $this->roleService->getMyPermission($id);
        $response = new SuccessResponse(200, 'Permissions successfully obtained', $permissions);
        return $response->toResponse();
    }
}
