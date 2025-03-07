<?php

use App\Http\Middleware\SeoAppMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::post('sync', [\App\Http\Controllers\Api\SyncController::class, 'update']);

Route::group([
    // 'middleware' => 'auth:sanctum' // TODO: make it later
    'middleware' => SeoAppMiddleware::class,
    'prefix'     => '/v1',
], function () {
    Route::post('/app/update', [\App\Http\Controllers\Api\UpdateAppController::class, 'pull']);
    Route::post('env/update', [\App\Http\Controllers\Api\EnvController::class, 'update']);
    Route::post('env/setBearerToken', [\App\Http\Controllers\Api\EnvController::class, 'setBearerToken']);
    Route::post('logo', [\App\Http\Controllers\Api\LogoController::class, 'update']);

    Route::post('articles', [\App\Http\Controllers\Api\ArticleController::class, 'store']);
    Route::post('fetch-article', [\App\Http\Controllers\Api\ArticleController::class, 'fetchArticle']);
    Route::put('articles/{id}', [\App\Http\Controllers\Api\ArticleController::class, 'update']);
    Route::delete('articles/{id}', [\App\Http\Controllers\Api\ArticleController::class, 'destroy']);

    Route::post('categories', [\App\Http\Controllers\Api\CategoryController::class, 'store']);
    Route::put('categories/{id}', [\App\Http\Controllers\Api\CategoryController::class, 'update']);
    Route::delete('categories/{id}', [\App\Http\Controllers\Api\CategoryController::class, 'destroy']);

    Route::post('article-link', [\App\Http\Controllers\Api\ArticleLinkController::class, 'store']);
    Route::post('delete-article-link', [\App\Http\Controllers\Api\ArticleLinkController::class, 'destroy']);

});
