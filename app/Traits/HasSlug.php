<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasSlug
{
    protected function findSlug(string $column = 'name'): string
    {
        $index = 2;

        $slugConst = Str::slug($this->{$column}, '-', 'pl');
        $slug = $slugConst;

        while (self::where('slug', $slug)->exists()) {
            $slug = $slugConst . '-' . $index++;
        }

        return $slug;
    }
}
