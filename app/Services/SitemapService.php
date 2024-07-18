<?php

namespace App\Services;

use App\Models\Article;
use Spatie\Sitemap\Sitemap;

class SitemapService
{
    public function createSitemap()
    {
        Sitemap::create()
            ->add(Article::all())
            ->writeToFile(public_path('sitemap.xml'));
    }
}
