<?php

namespace App\Services;

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
        (new TemplateService)->updateTemplateConfig('logo_path', $logoPath);
    }
}
