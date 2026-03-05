<?php

use App\Routing\Routes\Concretes\AppRoutes;
use App\Routing\Routes\Concretes\CategoryRoutes;
use App\Routing\Routes\Concretes\InstituteRoutes;
use App\Routing\Routes\Concretes\PermissionRoutes;
use App\Routing\Routes\Concretes\RoleRoutes;
use Illuminate\Support\Facades\Route;

Route::prefix('')->group(function () {
    Route::get('', function () {
        return response()->json([
            'name' => 'SapiensID',
            'type' => 'API',
            'version' => env('API_VERSION', '0.0.0+00000000'),
            'author' => 'Denis Jorge Gandarillas Delgado',
            'company' => 'sinedsoft',
        ], 200);
    });

    Route::prefix('sapiens-id')->group(function () {
        app(InstituteRoutes::class)->register();
        app(AppRoutes::class)->register();
        app(CategoryRoutes::class)->register();
        app(PermissionRoutes::class)->register();
        app(RoleRoutes::class)->register();
    });
});
