<?php

use App\Services\TemplateService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;



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

function isRoute(string $routeName): bool 
{
    return Route::currentRouteName() === $routeName;
}

function polishMonths(): array
{
    return [
        1 => 'Stycznia',
        2 => 'Lutego',
        3 => 'Marca',
        4 => 'Kwietnia',
        5 => 'Maja',
        6 => 'Czerwca',
        7 => 'Lipca',
        8 => 'Sierpnia',
        9 => 'Września',
        10 => 'Października',
        11 => 'Listopada',
        12 => 'Grudnia',
    ];
}

function polishDays(): array
{
    return [
        1 => 'Poniedziałek',
        2 => 'Wtorek',
        3 => 'Środa',
        4 => 'Czwartek',
        5 => 'Piątek',
        6 => 'Sobota',
        0 => 'Niedziela',
    ];
}

function polishDateFormat(Carbon $date, bool $dayName = false): string
{
    $str = '';
    $date->dayOfWeek(); // 0 Sunday -> 1 Monday -> 2 Tuesday -> 3 Wednesday -> 4 Thursday -> 5 Friday -> 6 Saturday
    if ($dayName) {
        $str .= polishDays()[$date->dayOfWeek()] . ', ';
    }

    $str.= $date->format('d').' '. polishMonths()[$date->month].' '.$date->format('Y');
    return strtolower($str);
}