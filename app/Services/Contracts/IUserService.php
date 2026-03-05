<?php

namespace App\Services\Contracts;

interface IUserService extends ISearcherService
{

    function register(array $data);

    function forgotPassword(string $email);
    function resetPassword(string $id, string $password);
}
