<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('created_at', 'DESC');
    }
}
