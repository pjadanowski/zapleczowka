<?php

use App\Models\Link;
use App\Models\Article;
use App\Services\Api\LinkService;
use App\Services\TemplateService;
use App\Services\Api\ArticleService;
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
