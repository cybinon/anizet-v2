<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animes extends Model
{
    public function season()
    {
        return $this->hasMany('\App\Season','anime_id');
    }

}
