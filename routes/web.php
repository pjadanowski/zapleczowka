<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryArticleController;
use App\Services\TemplateService;
use Illuminate\Support\Facades\Route;

require __DIR__.'/test.php';

Route::get('/', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/{slug}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/{categorySlug}/articles', [CategoryArticleController::class, 'show'])->name('category.articles');
