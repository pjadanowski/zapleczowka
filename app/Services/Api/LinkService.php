<?php

namespace App\Services\Api;

use App\Models\Article;
use App\Models\Link;
use App\Models\LinkGroup;
use Illuminate\Support\Facades\DB;

class LinkService extends ParentApiService
{
    public function getAll()
    {
        return $this->http->get('article-link')->json();
    }

    public function sync()
    {
        $links = collect($this->getAll());

        try {
            $links = collect($this->getAll());
            $articleIds = $links->pluck('article_id')->unique();
            $linkIds = $links->pluck('link_id')->unique();
            $localArticles = Article::whereIn('seo_app_id', $articleIds)->get();
            $localLinks = Link::whereIn('seo_app_id', $linkIds)->get();

            foreach ($links as $link) {
                $article = $localArticles->where('seo_app_id', $link['article_id'])->first();

                if ($article === null) {
                    continue;
                }

                $locLink = $localLinks->where('seo_app_id', $link['link_id'])->first();

                if ($locLink === null) {
                    $locLink = Link::create([
                        'name'          => $link['link']['name'],
                        'anchor'        => $link['link']['anchor'],
                        'url'           => $link['link']['url'] ?? $link['link']['name'] ?? '',
                        'seo_app_id'    => $link['link']['id'],
                        'link_group_id' => $link['link']['link_group_id'],
                        'order'         => $link['link']['sort'],
                        'status'        => $link['link']['status'],
                        'updated_at'    => $link['link']['updated_at'],
                        'created_at'    => $link['link']['created_at'],
                    ]);
                }

                DB::table('article_link')->updateOrInsert([
                    'article_id' => $article->id,
                    'link_id'    => $locLink->id,
                    'updated_at' => now(),
                    'created_at' => now(),
                ], [
                    'status' => $link['status'],
                ]);
            }

            return 'ok';
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getLinkGroups()
    {
        $groups = $this->http->get('link-groups')->json();
        foreach ($groups as $group) {
            LinkGroup::insert([
                'name'       => $group['name'],
                'seo_app_id' => $group['id'],
                'status'     => $group['status'],
                'updated_at' => $group['updated_at'],
                'created_at' => $group['created_at'],
            ]);
        }
    }
}
/**
 {
    "id": 807,
    "article_id": 16110,
    "link_id": 157,
    "status": 1,
    "created_at": "2024-01-05T01:01:07.000000Z",
    "updated_at": "2024-05-30T05:16:20.000000Z",
    "link": {
      "id": 157,
      "sort": 1,
      "name": "https://alconbiuro.pl/",
      "anchor": "https://alconbiuro.pl/",
      "max_number": 101,
      "link_group_id": 5,
      "increase_type_id": 11,
      "status": 1,
      "created_at": "2023-12-30T22:52:26.000000Z",
      "updated_at": "2024-05-10T16:25:03.000000Z"
    }
  },
 */
