<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class home extends Model
{
    public function homes()
    {
        return $this->hasMany(Home::class)->orderBy('created_at', 'DESC');
    }
}
