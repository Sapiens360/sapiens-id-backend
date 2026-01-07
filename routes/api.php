<?php

use Illuminate\Support\Facades\Route;

Route::prefix("")->group(function () {
    Route::get("", function () {
        return response()->json([
            'name' => 'SapiensID',
            'type' => 'API',
            'version' => '0.0.1+20260103',
            'author' => 'Denis Jorge Gandarillas Delgado',
            'company' => 'sinedsoft'
        ], 200);
    });
});
