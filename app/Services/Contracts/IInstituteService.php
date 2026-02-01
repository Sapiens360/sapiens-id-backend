<?php

namespace App\Services\Contracts;

interface IInstituteService extends ISearcherService
{
    public function addApps(string $id, array $apps = []);
    public function removeApps(string $id, array $apps = []);
    public function verifyAppAccess(string $id, string $code);
}
