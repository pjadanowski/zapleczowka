<?php

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use HasFactory;
    use HasSlug;

    // protected $table = 'resource_hub_articles';
    protected $guarded = [];

    protected static function booted()
    {
        static::creating(function (Article $article) {
            $article->slug = $article->findSlug('title');
        });

        static::saving(function (Article $article) {
            $article->slug = $article->findSlug('title');
        });

    }

    // public function slug(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value, $attr) => \Illuminate\Support\Str::slug($this->title) . '-' . $this->id,
    //     );
    // }

    public function excerpt(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attr) => \Illuminate\Support\Str::limit(strip_tags($this->content), 80),
        );
    }

    public function contentWithLink(): Attribute
    {
        $re = '/(\r?\n)+/m';

        $result = $this->content;
        $links = $this->links;

        foreach ($links as $link) {
            if (! $this->hasLinkInserted($link->anchor)) {
                $subst = "$1 $link $1";
                $result = preg_replace($re, $subst, $result, 1); // todo: replace with <a href="link->anchor">link->name</a>";
                // what if not found and not replaced ?
            }
        }

        return Attribute::make(
            get: fn ($value, $attr) => $result,
        );
    }

    /**
     * check if article has link inserted in the content
     */
    public function hasLinkInserted(string $link, ?string $content = null): bool
    {
        return str_contains($content ?? $this->content, $link);
    }

    public function thumbnailImg(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attr) => !empty($this->thumbnail_image) ?: 'https://fakeimg.pl/640x360',
        );
    }

    public function show()
    {
        return route('articles.show', $this->slug);
    }

    // public function scopeForCurrentInstance(Builder $builder)
    // {
    //     $builder->where('resource_hub_id', env('INSTANCE_ID', null));
    // }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function links(): BelongsToMany
    {
        return $this->belongsToMany(Link::class)->using(ArticleLink::class);
        // prod: 'resource_hub_articles_links'
    }
}
