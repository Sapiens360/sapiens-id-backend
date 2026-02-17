<?php

namespace App\Services\Contracts;

interface IAppService extends ISearcherService
{
    public function verifyExistByCode(string $code): ?string;
}
