<?php

namespace App\Services\Api;

use App\Models\Article;
use App\Models\Category;

class ArticleService extends ParentApiService
{
    public function getAll()
    {
        return $this->http->get('articles')->json();
    }

    public function sync()
    {
        try {
            // always sync categories first
            (new CategoryService)->sync();

            $categories = Category::all();

            foreach ($this->getAll() as $article) {
                $found = Article::where('seo_app_id', $article['id'])->first();

                if ($found === null) {
                    // create
                    Article::create([
                        'title'                   => $article['title'],
                        'thumbnail_image'         => '',
                        'content'                 => $article['article'],
                        'seo_app_id'              => $article['id'],
                        'status'                  => $article['status'],
                        'category_id'             => $categories->where('seo_app_id', $article['category_id'])->first()?->id ?? null,
                        'updated_at'              => $article['updated_at'],
                        'created_at'              => $article['created_at'],
                    ]);
                } else {
                    // found -> update
                    $found->forceFill([
                        'title'                => $article['title'],
                        'thumbnail_image'      => '',
                        'body'                 => $article['article'],
                        'seo_app_id'           => $article['id'],
                        'status'               => $article['status'],
                        'category_id'          => $categories->where('seo_app_id', $article['category_id'])->first()?->id ?? null,
                        'updated_at'           => $article['updated_at'],
                        'created_at'           => $article['created_at'],
                    ]);

                    if ($found->isDirty()) {
                        $found->save();
                    }
                }
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
