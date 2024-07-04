<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:categories,name'],
            'id'   => ['required'],
        ]);

        $category = Category::create([
            'name'       => $request->name,
            'seo_app_id' => $request->id,
        ]);

        return response()->json(['category' => $category], 201);
    }


    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        $deleted = Category::where([
            'seo_app_id' => $id,
        ])->delete();

        return response()->json(['deleted' => $deleted !== null]);
    }
}
