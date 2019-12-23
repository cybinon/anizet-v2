<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function show(\App\Post $post)
    {
        $videos= new \App\Video;
        $season = $post->all()->where('caption', $post->caption)->sortBy('season');
        $episodes = $videos->all()->where('post_id', $post->id)->sortBy('episode');
        $all = $post->all()->random(4);
        return view('posts.show', compact('post', 'all', 'season', 'episodes'));
    }
    public function main(\App\Post $post)
    {
        $anime = $post->all()->where('method', '1');
        $movie = $post->all()->where('method', '2');
        $song = $post->all()->where('method', '3');
        $manga = $post->all()->where('method', '4');
        return view('main', compact('anime', 'movie', 'song', 'manga'));
    }
}
