<?php

use App\Http\Controllers\Contracts\IInstituteController;
use Illuminate\Support\Facades\Route;

Route::prefix('')->group(function () {
    Route::get('', function () {
        return response()->json([
            'name' => 'SapiensID',
            'type' => 'API',
            'version' => '0.0.1+20260103',
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
            Route::put('id/{id}', [IInstituteController::class, 'update']);
            Route::put('apps/add/{id}', [IInstituteController::class, 'addApps']);
            Route::put('apps/remove/{id}', [IInstituteController::class, 'removeApps']);
            Route::delete('id/{id}', [IInstituteController::class, 'destroy']);
        });
    });
});
