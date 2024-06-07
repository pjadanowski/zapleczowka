<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class, 'index']);
Route::get('/{article:slug}', [ArticleController::class, 'show']);
Route::get('/{categorySlug}/articles', [CategoryArticleController::class, 'show'])->name('category.articles');
