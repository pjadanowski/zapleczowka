<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function show(string $slug)
    {
        //preg_match('/([^-]*)$/', $slug, $id); // after last -
        return templateView('articles.show', [
            'article'        => Article::where('slug', $slug)->firstOrFail(),
            'randomArticles' => Article::inRandomOrder()->limit(2)->get(),
        ]);
    }
}
