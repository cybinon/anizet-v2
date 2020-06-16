<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animes extends Model
{
    public function seasons()
    {
        return $this->hasMany('\App\Season','anime_id');
    }

}
