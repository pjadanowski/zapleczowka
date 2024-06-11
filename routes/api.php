<?php

use App\Http\Middleware\SeoAppMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('logo', [\App\Http\Controllers\Api\LogoController::class, 'update']);

// Route::post('sync', [\App\Http\Controllers\Api\SyncController::class, 'update']);


Route::group([
    // 'middleware' => 'auth:sanctum' // TODO: make it later
    'middleware' => SeoAppMiddleware::class,
    'prefix' => '/v1',
], function () {
    Route::post('articles', [\App\Http\Controllers\Api\ArticleController::class, 'store']);
    Route::patch('articles/{id}', [\App\Http\Controllers\Api\ArticleController::class, 'update']);
});