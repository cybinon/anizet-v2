<?php

namespace App\Http\Controllers\api\v1\anime;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Animes;
use App\Season;
use App\Video;
use App\Category;

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
        $season = Season::findOrFail($id);
        $anime = Animes::findorfail($season->anime_id);

        $season->anime = $anime;
        $video = Video::where('season_id', $id)->orderBy('episode_number')->get();
        $season->videos = $video;

        $array = $season->anime->category;
        $array = preg_replace('~[\\\\/:*?"<>|[]|]~', ' ', $array);
        $array = str_split($array,5);

        foreach($array as $sr){
            $category = Category::findorFail($sr);
            $categories[] = $category;
        }
        $season->anime->category = $categories;


        return $season;
    }
    public function video($id)
    {
        $video = Video::findOrFail($id);
        $json = file_get_contents('http://pack.anizet.net/get/'.$video->file_id);
        $obj = json_decode($json);
        $video->files = $obj;

        return $video;
    }
    public function search($key)
    {
        $anime = new Animes;
        $caption_en = $anime->where('caption_en', 'LIKE', "%$key%")->get();
        $caption_mn = $anime->where('caption_mn', 'LIKE', "%$key%")->get();
        $caption_kanji = $anime->where('caption_kanji', 'LIKE', "%$key%")->get();

        return array($caption_en, $caption_kanji, $caption_mn);
    }
}
