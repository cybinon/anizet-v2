<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    public function anime()
    {
        return $this->hasOne('\App\Animes','id', 'anime_id');
    }
}
