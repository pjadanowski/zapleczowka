<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Api\ArticleService;
use App\Services\Api\CategoryService;

class ArticleController extends Controller
{
    public function __construct(
        protected CategoryService $categoryService
    ) {
    }

    public function fetchArticle(Request $request)
    {
        (new ArticleService)->fetchArticle($request->id);
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'title'       => ['required'],
            'content'     => ['required'],
            'status'      => ['required'],
            'category'    => ['required'],
            'category.id' => ['required'],
        ]);

        $category = $this->categoryService->updateOrCreate($request->category);

        $article = Article::create([
            'seo_app_id'       => $request->id,
            'title'            => $request->title,
            'content'          => $request->content,
            'status'           => $request->status,
            'category_id'      => $category->id,
        ]);

        return response()->json($article, 201);
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        
        $request->validate([
            'title'       => ['required'],
            'content'     => ['required'],
            'status'      => ['required'],
            'category'    => ['required'],
            'category.id' => ['required'],
        ]);

        $category = $this->categoryService->updateOrCreate($request->category);

        $updated = Article::updateOrCreate([
            'seo_app_id'=> $id,
        ], [
            'title'            => $request->title,
            'content'          => $request->content,
            'status'           => $request->status,
            'category_id'      => $category->id,
        ]);

        return response()->json(['updated' => $updated !== null]);
    }

    public function destroy(string $id)
    {
        $deleted = Article::where('seo_app_id', $id)->delete();

        return response()->json(['deleted' => $deleted!== null]);
    }
}
