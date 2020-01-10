<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class VideoController extends Controller
{

    public function show(\App\video $vid)
    {
        
        $animes = $vid->all();
        $episodes = $vid->all()->where('post_id', $vid->post_id)->sortBy('episode');
        $link = str_replace("/view","/preview",$vid->file_id);
        $sub = null;
        
        return view('videos.show', compact('vid', 'link','episodes','sub','animes'));
    }

    public function list(){

    }
  
}
