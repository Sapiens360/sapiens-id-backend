<?php

namespace App\Services\Contracts;

interface ISearcherService extends IService
{
    public function search(
        string $value = '',
        string $direction = 'asc',
        array $filters = [],
        string $orderBy = 'name',
        int $page = 0,
        int $size = 0
    );
}
