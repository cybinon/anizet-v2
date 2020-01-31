<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Video;

class MainController extends Controller
{
    public function show(\App\Post $post)
    {
        $videos= new \App\Video;
        $season = $post->all()->where('caption', $post->caption)->sortBy('season');
        $episodes = $videos->all()->where('post_id', $post->id)->sortBy('episode');

        if(count($post->all())>4) $all = $post->all()->random(4);
        else $all = $post->all();
        return view('posts.show', compact('post', 'all', 'season', 'episodes'));
    }
    public function main(\App\Post $post)
    {
        $episodes = new Video;

        $anime = $post->all()->where('method', '1');
        $movie = $post->all()->where('method', '2');
        $ova = $post->all()->where('method', '3');
        $all = $post->all();

        return view('main', compact('anime', 'movie', 'ova', 'all','episodes'));
    }
    public function list(\App\Post $post)
    {
        $anime = $post->all();

        return view('list', compact('anime'));
    }
}
