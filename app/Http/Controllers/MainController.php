<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Mail\SendMail;
use \App\Video;

class MainController extends Controller
{
    public function report(){
        $request = request();
        if ($request->isMethod('post')) {

        $details = request()->validate( [
            'content_id' => 'required',
            'explain' => 'required',
            'mail' => 'required'
        ]);

        \Mail::to('nikorunikk@gmail.com')->send(new SendMail($details));
        return redirect('/v/'.$details['content_id'].'#success');
    }else
    return redirect('/');

    }

    public function show(\App\Post $post)
    {
        $videos= new \App\Video;
        $season = $post->all()->where('caption', $post->caption)->sortBy('season');
        $episodes = $videos->all()->where('post_id', $post->id)->sortBy('episode');

        if(count($post->all())>12) $all = $post->all()->random(12);
        else $all = $post->all();
        return view('posts.show', compact('post', 'all', 'season', 'episodes'));
    }
    public function main(\App\Post $post)
    {
        $novel = new \App\Novel;
        $episodes = new Video;

        $anime = $post->all()->where('status', '1')->sortByDesc("id");
        $ova = $post->where('status', '2')->orderBy("method")->orderBy("season")->skip(0)->take(8)->get();


        return view('main', compact('anime','ova','episodes'));
    }
    public function list(\App\Post $post)
    {
        $anime = $post->all()->sortBy('caption');

        return view('list', compact('anime'));
    }
}
