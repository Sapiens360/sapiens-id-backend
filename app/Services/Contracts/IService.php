<?php

namespace App\Services\Contracts;

interface IService
{
    public function getAll(string $direction, array $filters, string $orderBy, int $page, int $size);

    public function getBy(string $column, string|int $value, bool $fail, bool $onlyActive, array $filters);

    public function create(array $data, ?string $uniqueColumn, ?bool $generateCode);

    public function update(string|int $id, array $data, ?string $uniqueColumn);

    public function delete(string|int $id, bool $force = false);
}
