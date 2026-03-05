<?php

namespace App\Services\Contracts;

interface IRoleService extends ISearcherService
{
    function getMyPermission(int $id): array;
}
