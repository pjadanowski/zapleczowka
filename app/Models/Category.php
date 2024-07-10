<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function slug(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attr) => Str::slug($this->name) . '-' . $this->id,
        );
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
