<?php

namespace App\Http\Controllers;

use App\Models\Article;

class PageController extends Controller
{
    public function index()
    {
        $latestArticles = Article::with('category')->select(['id', 'title', 'created_at', 'category_id', 'article'])->forCurrentInstance()->latest()->get();
       
        return templateView('index', [
            'latestArticles' => $latestArticles,
        ]);
    }
}
