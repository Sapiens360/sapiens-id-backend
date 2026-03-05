<?php

namespace App\Routing\Registers\Concretes;

use App\Routing\Registers\Contracts\IRoutesRegister;
use Illuminate\Support\Facades\Route;

class CrudRoutesRegister implements IRoutesRegister
{
    public function register(string $route, string $controller): void
    {
        Route::prefix($route)->controller($controller)->group(function () {
            Route::get('', 'index');
            Route::get('by', 'show');
            Route::post('', 'store');
            Route::prefix('{id}')->group(function () {
                Route::put('', 'update');
                Route::delete('', 'destroy');
            });
        });
    }
}
