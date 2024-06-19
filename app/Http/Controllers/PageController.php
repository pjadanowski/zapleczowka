<?php

namespace App\Http\Controllers;

use App\Models\Article;

class PageController extends Controller
{
    public function index()
    {
        $latestArticles = Article::with(['category'])->latest()->limit(30)->get();

        //    dd($latestArticles);
        return templateView('index', [
            'latestArticles' => $latestArticles,
        ]);
    }

    public function contact()
    {
        return templateView('contact', []);
    }
}
