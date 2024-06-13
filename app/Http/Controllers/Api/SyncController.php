<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\Api\LinkService;
use App\Http\Controllers\Controller;
use App\Services\Api\ArticleService;

class SyncController extends Controller
{
    /**
     * it triggers all services to sync data
     * articles, links, categories
     */
    public function update(Request $request)
    {
        // sync articles
        (new ArticleService())->sync();
        (new LinkService())->sync();
    }
}
