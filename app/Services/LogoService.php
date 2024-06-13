<?php

namespace App\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;

class LogoService
{
    public function storeLogo($logo): string
    {
        $image = ImageManager::imagick()->read($logo);

        if ($image->height() > 200) {
            $image = $image->scale(height: 200);
        }

        File::ensureDirectoryExists(public_path('images'));

        $path = public_path('images/logo.webp');
        $image->toWebp(quality: 90)->save($path);

        return $path;
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
