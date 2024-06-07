<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryArticleController extends Controller
{
    public function show(string $categorySlug)
    {
        // id after last -
        $id = Str::afterLast($categorySlug, '-');
        $category = Category::with('articles')->find($id);

        return view('categoryArticles.show', compact('category'));
    }
}
