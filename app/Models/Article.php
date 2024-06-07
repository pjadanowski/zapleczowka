<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $table = 'resource_hub_articles';

     public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // public function resourceHub(): BelongsTo
    // {
    //     return $this->belongsTo(ResourceHub::class);
    // }

    public function links(): HasMany
    {
        return $this->hasMany(ArticleLink::class, 'article_id');
    }
}
