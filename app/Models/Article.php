<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;

    protected $table = 'resource_hub_articles';

    public function slug(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attr) => \Illuminate\Support\Str::slug($this->title) . '-' . $this->id,
        );
    }

    public function excerpt(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attr) => \Illuminate\Support\Str::limit(strip_tags($this->article), 80),
        );
    }

    public function thumbnailImg(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attr) => $this->thumbnailImage ?? 'https://fakeimg.pl/640x360',
        );
    }

    public function show()
    {
        return route('articles.show', $this->slug);
    }

    public function scopeForCurrentInstance(Builder $builder)
    {
        $builder->where('resource_hub_id', env('INSTANCE_ID', null));
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function links(): HasMany
    {
        return $this->hasMany(ArticleLink::class, 'article_id');
    }
}
