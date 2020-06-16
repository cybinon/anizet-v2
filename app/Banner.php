<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    public function anime()
    {
        return $this->hasOne('\App\Animes','id', 'anime_id');
    }
}
