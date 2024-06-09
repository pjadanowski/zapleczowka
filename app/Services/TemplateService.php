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

    public function templateMapping(string $name)
    {
        return match ($name) {
            'bloggar' => 'bloggar',
            default   => 'bloggar',
        };
    }

    public function updateLogoPath(string $logoPath)
    {
        $path = config_path('templates.php');
        $array = include $path;

        Arr::set($array, 'logo_path', $logoPath);

        File::put($path, "<?php\n\nreturn " . var_export($array, true) . ';');

        Artisan::call('config:clear');
    }
}
