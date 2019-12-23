<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function videos()
    {
        return $this->hasMany(Video::class)->orderBy('created_at', 'DESC');
    }
}
