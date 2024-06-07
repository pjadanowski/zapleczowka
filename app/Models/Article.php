<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;

    protected $table = 'resource_hub_articles';

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
