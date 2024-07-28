<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryArticleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/test.php';
require __DIR__ . '/auth.php';

Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/sitemap', [SitemapController::class, 'createAndShow'])->name('sitemap.create');
Route::get('/sitemap.xml', [SitemapController::class, 'show'])->name('sitemap');
Route::get('/kontakt', [PageController::class, 'contact'])->name('contact');
Route::get('/category/{categorySlug}', [CategoryArticleController::class, 'show'])->name('category.articles');
Route::get('/szukaj', [SearchController::class, 'show'])->name('search');
Route::get('/{slug}', [ArticleController::class, 'show'])->name('articles.show');
