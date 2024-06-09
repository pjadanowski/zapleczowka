<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryArticleController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/test.php';

Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/article/{slug}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/category/{categorySlug}', [CategoryArticleController::class, 'show'])->name('category.articles');
