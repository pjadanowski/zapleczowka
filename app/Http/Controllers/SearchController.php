<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show(Request $request)
    {
        $articles = Article::query()
            ->search($request->str('search')->value())
            ->paginate(20);

            return templateView('articles.search', [
                'articles' => $articles,
                'search' => $request->str('search')->value(),
            ]);
    }
}
