<?php

namespace App\Http\Controllers;

use App\Models\Article;

class PageController extends Controller
{
    public function index()
    {
        $latestArticles = Article::with('category')->select(['id', 'title', 'created_at', 'category_id', 'article'])->forCurrentInstance()->latest()->get();
       
        $categories = \App\Models\Category::withCount('articles')->forCurrentInstance()->whereHas('articles')->latest()->take(10)->get();

        return templateView('index', [
            'latestArticles' => $latestArticles,
            'categories'     => $categories,
        ]);
    }
}
