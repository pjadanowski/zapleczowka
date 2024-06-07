<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function index()
    {
        $latestArticles = Article::forCurrentInstance()->latest()->take(10)->get();
        $categories = Category::withCount('articles')->forCurrentInstance()->whereHas('articles')->latest()->take(10)->get();

        return view('articles.index', [
            'latestArticles' => $latestArticles,
            'categories' => $categories,
        ]);
    }

    public function show(Article $article)
    {
    }
}
