<?php

namespace App\Services\Bases;

use App\Models\Concretes\Role;
use App\Services\Contracts\IPermissionService;
use App\Services\Contracts\IRoleService;

class BaseRoleService extends SearcherService implements IRoleService
{

    protected Role $role;
    protected IPermissionService $permissionService;

    public function __construct(Role $role, IPermissionService $permissionService)
    {
        $this->role = $role;
        $this->permissionService = $permissionService;
        parent::__construct($this->role);

    }

    public function getMyPermission(int $id): array
    {
        $role = $this->getBy('id', $id);

        $permissionsIds = $role['permissions'] ?? [];
        $permissions = [];

        foreach ($permissionsIds as $permissionId) {
            $permission = $this->permissionService->getBy('id', $permissionId);
            $permissions[] = $permission->code;
        }

        return $permissions;
    }
}
