<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class VideoController extends Controller
{

    public function show(\App\video $vid)
    {

        $animes = new \App\Post;
        $animes = $animes->all();
        $episodes = $vid->all()->where('post_id', $vid->post_id)->sortBy('episode');
        $link = str_replace("/view","/preview",$vid->file_id);
        $link = str_replace("/video/","/videoembed/",$link);
        $sub = null;

        return view('videos.show', compact('vid', 'link','episodes','sub','animes'));
    }
    public function showm(\App\video $vid)
    {

        $animes = new \App\Post;
        $animes = $animes->all();
        $episodes = $vid->all()->where('post_id', $vid->post_id)->sortBy('episode');
        $link = str_replace("/view","/preview",$vid->file_id);
        $link = str_replace("/video/","/videoembed/",$link);
        $sub = null;

        return view('videos.mobile', compact('vid', 'link','episodes','sub','animes'));
    }

    public function list(){

    }

}
