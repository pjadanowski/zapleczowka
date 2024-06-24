<?php

namespace App\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class TemplateService
{
    public function getTemplateName()
    {
        $name = config('templates.name');

        return $this->templateMapping($name);
    }

    public function updateTemplateConfig(string $key, mixed $value)
    {
        $path = config_path('templates.php');
        $array = include $path;

        Arr::set($array, $key, $value);

        File::put($path, "<?php\n\nreturn " . var_export($array, true) . ';');

        Artisan::call('config:clear');
    }

    public function templateMapping(string $name)
    {
        return match ($name) {
            'bloggar' => 'bloggar',
            default   => 'bloggar',
        };
    }
}
