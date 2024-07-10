<?php

use App\Services\Api\ArticleService;
use App\Services\Api\LinkService;
use App\Services\TemplateService;
use Illuminate\Support\Facades\Route;

if (app()->isLocal()) {
    Route::get('/test', function () {
        $output = [];

        // exec('cd .. && sh gitPull.sh', $output);
        return $output;
        // (new TemplateService)->updateLogoPath('logo/path2.png');
        (new ArticleService)->fetchArticle(38458);

        // return (new LinkService())->sync();
        return 'ok';
    });
}
