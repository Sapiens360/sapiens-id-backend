<?php

namespace App\Services\Contracts;

interface ISessionService extends ISearcherService
{
    function login(array $data);

    function logout(string $refreshToken);

    function refresh(string $refreshToken);

    function sessionBlock(string $id);

    function sessionUnblock(string $id);
}
