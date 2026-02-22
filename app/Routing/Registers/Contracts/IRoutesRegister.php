<?php

namespace App\Routing\Registers\Contracts;

interface IRoutesRegister
{
    public function register(string $route, string $controller): void;
}
