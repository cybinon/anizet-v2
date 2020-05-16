<?php

namespace App\Http\Controllers\api\v1\anime;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Animes;
use App\Season;
use App\Video;

class AnimeController extends Controller
{
     public function index()
    {
        $seasons = Season::orderBy('updated_at', 'DESC')->limit(8)->get();

        foreach($seasons as $season){
            $season->anime = Season::findOrFail($season->id)->anime;
        }

        return $seasons;
    }
     public function select($id)
    {
        return Season::findOrFail($id);
    }
    public function video($id)
    {
        return Video::findOrFail($id);
    }
}
