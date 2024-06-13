<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $table = 'links';

    protected $fillable = [
        'name', // deprecated -> dont use it anymore
        'anchor', // <a href={url}>{anchor}</a>
        'url', // a href="{url}"
        'seo_app_id',
        'link_group_id',
        'order',
        'status',
    ];

    public function linkGroup()
    {
        return $this->belongsTo(LinkGroup::class);
    }

    public function articleLinks()
    {
        return $this->hasMany(ArticleLink::class); // belongToMany ?
    }
}
