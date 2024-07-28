<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleLink;
use App\Models\Link;
use Illuminate\Http\Request;

class ArticleLinkController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'link'       => ['required'],
            'article_id' => ['required'],
        ]);

        $article = Article::where('seo_app_id', $request->article_id)->first();

        $link = Link::query()->firstOrCreate([
            'seo_app_id' => $request->link['id'],
        ], [
            'anchor' => $request->link['anchor'],
            'url'    => $request->link['url'] ?? $request->link['name'],
            'order'  => $request->link['sort'],
            'status' => $request->link['status'],
        ]);

        if ($article === null || $link === null) {
            return response()->json(['error' => 'Article or Link not found'], 404);
        }

        $al = ArticleLink::create([
            'article_id' => $article->id,
            'link_id'    => $link->id,
        ]);

        return response()->json($al, 201);
    }
}
