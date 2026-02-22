<?php

namespace App\Routing\Registers\Concretes;

use App\Routing\Registers\Contracts\IRoutesRegister;
use Illuminate\Support\Facades\Route;

class SearcherRoutesRegister implements IRoutesRegister
{

    public function register(string $route, string $controller): void
    {
        Route::prefix($route)->controller($controller)->group(function () {
            Route::get('search', 'search');
        });
    }
}
