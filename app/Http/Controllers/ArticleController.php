<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    

    public function show(string $slug)
    {
        preg_match('/([^-]*)$/', $slug, $id); // after last -

        return view('articles.show', [
            'article' => Article::findOrFail($id[0]),
        ]);
    }
}
