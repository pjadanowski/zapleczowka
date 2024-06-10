<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Api\ArticleService;
use Illuminate\Http\Request;

class SyncController extends Controller
{
    /**
     * it triggers all services to sync data
     * articles, links, categories
     */
    public function update(Request $request)
    {
        // base check if request came from seo app
        if (! $request->hasHeader('x-seo-app')) {
            abort(403);
        }

        // sync articles
        (new ArticleService())->sync();
    }
}
