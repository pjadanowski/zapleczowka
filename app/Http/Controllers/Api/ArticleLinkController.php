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
        info('asd', $request->all());
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

        if ($article === null) {
            return response()->json(['error' => 'Article not found'], 404);
        }

        if ($link === null) {
            return response()->json(['error' => 'Link not found'], 404);
        }

        info('creating article link');
        $al = ArticleLink::create([
            'article_id' => $article->id,
            'link_id'    => $link->id,
        ]);

        return response()->json($al, 201);
    }

    public function destroy(Request $request)
    {
        info('delete article link', $request->all());

        $request->validate([
            'link_id'       => ['required'],
            'article_id'    => ['required'],
        ]);

        $article = Article::where('seo_app_id', $request->article_id)->first();
        $link = Link::where('seo_app_id', $request->link_id)->first();

        if ($article === null) {
            return response()->json(['error' => 'Article not found'], 404);
        }

        if ($link === null) {
            return response()->json(['error' => 'Link not found'], 404);
        }

        $deleted = ArticleLink::where([
            'article_id' => $article->id,
            'link_id'    => $link->id,
        ])->delete();

        info('delete article link', ['deleted' => $deleted, ['article_id' => $article->id, 'link_id' => $link->id]]);

        return response()->json(['deleted' => $deleted !== null]);
    }
}
