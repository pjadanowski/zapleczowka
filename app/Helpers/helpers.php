<?php

use App\Services\TemplateService;

function getTemplateName(): string
{
    return (new TemplateService)->getTemplateName();
}

function templateViewPath(string $view): string
{
    return 'templates.'. getTemplateName(). '.'. $view;
}

function templateView(string $view, array $data = [])
{
    return view(templateViewPath($view), $data);
}

