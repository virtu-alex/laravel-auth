<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'image', 'slug', 'content', 'category_id'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
