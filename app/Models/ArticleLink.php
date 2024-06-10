<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ArticleLink extends Pivot
{
    use HasFactory;

    // protected $table = 'resource_hub_articles_links';

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class, 'article_id');
    }

    public function link(): BelongsTo
    {
        return $this->belongsTo(Link::class);
    }
}
