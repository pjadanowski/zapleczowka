<?php

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use HasFactory;
    use HasSlug;

    protected $guarded = [];

    protected static function booted()
    {
        static::creating(function (Article $article) {
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
        $result = $this->content;
        $links = $this->links;

        foreach ($links as $link) {
            if (! $this->hasLinkInserted($link->anchor)) {
                $url = ! empty($link->url) ? $link->url : $link->name;
                $insert = "<a href=\"{$url}\">$link->anchor</a>";
                $re = '/(\r?\n)+/m';
                $subst = "$1 $insert $1";
                $result = preg_replace($re, $subst, $result, 1, $numberOfReplacements); // todo: replace with <a href="link->anchor">link->name</a>";

                // if not found and not replaced
                if ($numberOfReplacements === 0) {
                    $result = $this->insertAfterSpace($result, $insert);
                }
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

    public function insertAfterSpace(string $originalString, string $insertion, int $charactersToInsertAfter = 1000)
    {
        // make it more random
        $charactersToInsertAfter += (($this->id * 22) % 200);

        // Check if the string is longer than the specified number of characters
        if (strlen($originalString) > $charactersToInsertAfter) {
            // Find the first '. ' after the specified number of characters
            $position = strpos($originalString, '. ', $charactersToInsertAfter);

            // link    color: #4981ef;
            // If a space is found, insert the content after the space
            if ($position !== false) {
                $modifiedString = substr_replace($originalString, '. ' . $insertion, $position, 0);

                return $modifiedString;
            }
        }

        // If no '. ' is found or the string is shorter than the specified number of characters, return the original string
        return $originalString;
    }

    public function thumbnailImg(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attr) => ! empty($this->thumbnail_image) ? $this->thumbnail_image : 'https://fakeimg.pl/640x360',
        );
    }

    public function show()
    {
        return route('articles.show', $this->slug);
    }

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
