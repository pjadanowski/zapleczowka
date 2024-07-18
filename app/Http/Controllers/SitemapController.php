<?php

namespace App\Http\Controllers;

use App\Services\SitemapService;


class SitemapController extends Controller
{

    public function __construct(
        protected readonly SitemapService $sitemapService,
    )
    {
        //
    }

    public function show()
    {
        $this->sitemapService->createSitemap();

        return response(file_get_contents(public_path('sitemap.xml')), 200, [
            'Content-Type' => 'application/xml',
        ]);
    }
}
