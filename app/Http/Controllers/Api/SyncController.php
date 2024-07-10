<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Api\ArticleService;
use App\Services\Api\LinkService;
use Illuminate\Http\Request;

class SyncController extends Controller
{
    /**
     * it triggers all services to sync data
     * articles, links, categories
     */
    public function update(Request $request)
    {
        // sync articles
        (new ArticleService)->sync();
        (new LinkService)->sync();
    }
}
