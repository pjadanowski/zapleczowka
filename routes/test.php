<?php

use App\Models\Article;
use App\Models\Link;
use App\Services\Api\ArticleService;
use App\Services\TemplateService;
use Illuminate\Support\Facades\Route;




if (app()->isLocal()) {
    Route::get('/test', function () {
        // (new TemplateService)->updateLogoPath('logo/path2.png');
        (new ArticleService)->sync();
return 'ok';
    });
}
