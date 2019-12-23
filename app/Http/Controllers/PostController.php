<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use pCloud\File;
use PhpParser\Node\Expr\FuncCall;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function video()
    {
        $animes = new \App\Post;
        $animes = $animes->all();
        return view('videos.create', compact('animes'));
    }

    public function storevid()
    {
        $request = request();
        if ($request->isMethod('post')) {

            $data = request()->validate([
                'path_id' => 'nullable',
                'post_id' => 'required',
                'episode' => 'required',
                'skip_intro' => 'required',
                'video' => ['required'],
            ]);


            //$pcloud = new File;
            //$file = $pcloud->upload(request('video'), 4429462304, $_FILES["video"]["name"]);

           $Video = new \App\Video;
            $Video->insert([
                'post_id' => $data['post_id'],
                'episode' => $data['episode'],
                'skip_intro' => $data['skip_intro'],
                'file_id' => $data['video'],
            ]);



            echo "success";
            //return redirect('/');
        } else return redirect('/');
        dd(request()->all());
    }
    public function show(\App\Post $post)
    {
        return view('posts.show', compact('post'));
    }
    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $request = request();
        if ($request->isMethod('post')) {

            $data = request()->validate([
                'caption' => 'required',
                'method' => 'required',
                'season' => 'required',
                'pg' => 'required',
                'trailer' => 'required',
                'status' => 'required',
                'episodes' => 'required',
                'image' => ['required', 'image'], //soliotoi
            ]);


            $imagePath = request('image')->store('uploads', 'public');


            $image = Image::make(public_path("storage/{$imagePath}"))->resize(225, 319);
            $image->save();

            //$pcloud = new File;
            $data['caption'] = strtolower($data['caption']);


            auth()->user()->posts()->create([
                'caption' => $data['caption'],
                'method' => $data['method'],
                'season' => $data['season'],
                'pg' => $data['pg'],
                'trailer' => $data['trailer'],
                'episodes' => $data['episodes'],
                'status' => $data['status'],
                'image' => $imagePath,
            ]);

            //  $pcloud->upload("storage/{$imagePath}", 4850178287);


            return redirect('/profile/1');
        } else return redirect('/');
        dd(request()->all());
    }
}
