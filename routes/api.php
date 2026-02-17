<?php

use App\Http\Controllers\Contracts\IAppController;
use App\Http\Controllers\Contracts\IInstituteController;
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
        Route::prefix('institutes')->group(function () {
            Route::get('', [IInstituteController::class, 'index']);
            Route::get('by', [IInstituteController::class, 'show']);
            Route::get('search', [IInstituteController::class, 'search']);
            Route::post('', [IInstituteController::class, 'store']);
            Route::prefix('id/{id}')->group(function () {
                Route::put('', [IInstituteController::class, 'update']);
                Route::delete('', [IInstituteController::class, 'destroy']);
                Route::prefix('apps')->group(function () {
                    Route::get('verify/access/code/{code}', [IInstituteController::class, 'verifyAppAccess']);
                    Route::put('add', [IInstituteController::class, 'addApps']);
                    Route::put('remove', [IInstituteController::class, 'removeApps']);
                });
            });
        });

        Route::prefix('apps')->group(function () {
            Route::get('', [IAppController::class, 'index']);
            Route::get('by', [IAppController::class, 'show']);
            Route::get('search', [IAppController::class, 'search']);
            Route::post('', [IAppController::class, 'store']);
            Route::prefix('id/{id}')->group(function () {
                Route::put('', [IAppController::class, 'update']);
                Route::delete('', [IAppController::class, 'destroy']);
            });
        });
    });
});
