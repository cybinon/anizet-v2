<?php

namespace App\Http\Controllers\api\v1\anime;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Animes;
use App\Season;
use App\Video;
use App\Banner;
use App\Category;

class AnimeController extends Controller
{
    public function index()
    {
        $animes = Animes::orderBy('updated_at', 'DESC')->get();

        foreach($animes as $anime){
            $anime->season = $anime->seasons->first();
        }

        return $animes;
    }
    public function statusnew()
    {
        $seasons = Season::where('status', 1)->orderBy('updated_at', 'DESC')->limit(10)->get();

        foreach($seasons as $season){
            $season->anime = Season::findOrFail($season->id)->anime;
        }

        return $seasons;
    }
    public function statusfinisht()
    {
        $seasons = Season::where('status', 2)->orderBy('updated_at', 'DESC')->limit(10)->get();

        foreach($seasons as $season){
            $season->anime = Season::findOrFail($season->id)->anime;
        }

        return $seasons;
    }
    public function statusplan()
    {
        $seasons = Season::where('status', 3)->orderBy('updated_at', 'DESC')->limit(10)->get();

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

        $array = preg_replace('~[\\\\/:*?"<>|""[]|]~', '', $array);

        $array = explode(',',$array);

        foreach($array as $sr){
            $category = Category::findorFail($sr);
            $categories[] = $category;
        }
        $season->anime->category = $categories;


        return $season;
    }
    public function banner()
     {
        $banner = Banner::find(1);

        return $banner->anime;
    }
    public function video($id)
    {
        $video = Video::findOrFail($id);
        $json = file_get_contents('http://pack.anizet.net/get/'.$video->file_id);
        $obj = json_decode($json);
        $video->files = $obj;

        return $video;
    }
    public function search()
    {
        $anime = new Animes;
        $animes = $anime->all();
        foreach($animes as $anime){
            $anime->caption = $anime->caption_en.', '.$anime->caption_mn.', '.$anime->caption_kanji;
            $anime->season = $anime->seasons->first();
        }
        $count = $anime->count();

        return array('count' => $count, 'entries'=> $animes);
    }
}
