<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Services\Api\ArticleService;
use App\Services\Api\CategoryService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct(
        protected readonly CategoryService $categoryService,
        protected readonly ArticleService $articleService,
    ) {
    }

    public function fetchArticle(Request $request)
    {
        info('fetchArticle', ['id' => $request->id]);
        $json = $this->articleService->fetchArticle($request->id);
        $this->articleService->createOrUpdateArticle($json);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'title'       => ['required'],
        //     'content'     => ['required'],
        //     'status'      => ['required'],
        //     'category'    => ['required'],
        //     'category.id' => ['required'],
        // ]);

        // $category = $this->categoryService->updateOrCreate($request->category);

        // $article = Article::create([
        //     'seo_app_id'       => $request->id,
        //     'title'            => $request->title,
        //     'content'          => $request->content,
        //     'status'           => $request->status,
        //     'category_id'      => $category->id,
        // ]);

        // return response()->json($article, 201);
    }

    public function update(Request $request, string $id)
    {
        $json = $this->articleService->fetchArticle($id);
        $updated = $this->articleService->createOrUpdateArticle($json);

        return response()->json(['updated' => $updated !== null]);
    }

    public function destroy(string $id)
    {
        $deleted = Article::where('seo_app_id', $id)->delete();

        return response()->json(['deleted' => $deleted !== null]);
    }
}
