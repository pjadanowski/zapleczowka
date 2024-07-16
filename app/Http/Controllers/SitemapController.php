<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Spatie\Sitemap\Sitemap;

class SitemapController extends Controller
{
    public function show()
    {
        Sitemap::create()
            ->add(Article::all())
            ->writeToFile(public_path('sitemap.xml'));

        return response(file_get_contents(public_path('sitemap.xml')), 200, [
            'Content-Type' => 'application/xml',
        ]);
    }
}
