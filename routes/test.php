<?php

use App\Services\TemplateService;
use Illuminate\Support\Facades\Route;


if (app()->isLocal()) {
    Route::get('/test', function () {
        (new TemplateService)->updateLogoPath('logo/path2.png');
    });
}
