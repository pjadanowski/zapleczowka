<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('logo', [\App\Http\Controllers\Api\LogoController::class, 'update']);

// Route::apiResource('/articles', [])