<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

     protected $table = 'links';

    // public function linkGroup()
    // {
    //     return $this->belongsTo(LinkGroup::class);
    // }


    public function articleLinks()
    {
        return $this->hasMany(ArticleLink::class); // belongToMany ?
    }
}
