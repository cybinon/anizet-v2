<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded = [];
    public function videos()
    {
        return $this->hasMany(Video::class)->orderBy('created_at', 'DESC');
    }
}
