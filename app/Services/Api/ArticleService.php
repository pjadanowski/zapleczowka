<?php

namespace App\Services\Api;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

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
            return $e->getMessage();
        }
    }

    public function fetchArticle(int $id)
    {
        try {
            return $this->http->get('articles/' . $id)->json();
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            Log::debug('fetchArticle error ', [
                'message' => $e->getMessage(),
            ]);
            throw $e;
        }
    }

    protected function downloadThumbnail(?string $thumbPath)
    {
        if (empty($thumbPath)) {
            return '';
        }
        try {
            $baseUrl = parse_url($this->baseUrl());
            $contents = file_get_contents(($baseUrl['scheme'] ?? '') . '://' . $baseUrl['host'] . (isset($baseUrl['port']) ? (':' . $baseUrl['port']) : '') . $thumbPath);
            $filename = basename($thumbPath);

            File::ensureDirectoryExists(public_path('thumbnails'));

            $path = public_path("thumbnails/$filename");
            file_put_contents($path, $contents);

            return $filename;
        } catch (\Exception $e) {
            return '';
        }
    }

    public function createOrUpdateArticle(array $json): Article
    {
        $filename = $this->downloadThumbnail($json['thumbnail']);

        $jsonCategoryId = Arr::get($json, 'category.id');
        if ($jsonCategoryId !== null) {
            $category = Category::firstOrCreate(['seo_app_id' => $jsonCategoryId], [
                'name'       => $json['category']['name'],
                'updated_at' => $json['category']['updated_at'],
                'created_at' => $json['category']['created_at'],
            ]);
        }

        return Article::updateOrCreate(
            [
                'seo_app_id'              => $json['id'],
            ],
            [
                'title'                   => $json['title'],
                'thumbnail_image'         => $filename ? "/thumbnails/$filename" : null,
                'content'                 => $json['article'],
                'category_id'             => $category->id ?? null,
                'status'                  => $json['status'],
            ]);
    }

    /**
     * {
  "id": 38458,
  "guid": null,
  "title": "nowy artykuł",
  "prompt": null,
  "article": "<p>nowy artykuł</p>",
  "status": 0,
  "created_at": "2024-07-03T20:58:01.000000Z",
  "thumbnail": "/storage/thumbnails/01J1X67N5X0WJW60TZBP1CC2NZ.jpg",
  "category": {
    "id": 1755,
    "name": "nowa kat",
    "resource_hub_id": 6,
    "term_id": null,
    "created_at": "2024-07-03T20:20:26.000000Z",
    "updated_at": "2024-07-03T20:20:26.000000Z"
  }
}
     */
}
