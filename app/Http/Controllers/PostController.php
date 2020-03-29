<?php

namespace App\Http\Controllers;

use \App\Http\Middleware\CheckStatus;
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



           $Video = new \App\Video;
            $Video->insert([
                'path_id' => $data['path_id'],
                'post_id' => $data['post_id'],
                'episode' => $data['episode'],
                'skip_intro' => $data['skip_intro'],
                'file_id' => $data['video'],
            ]);


            return redirect('/');
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
                'info' => 'required',
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
                'info' => $data['info'],
                'pg' => $data['pg'],
                'trailer' => $data['trailer'],
                'episodes' => $data['episodes'],
                'status' => $data['status'],
                'image' => $imagePath,
            ]);

            //  $pcloud->upload("storage/{$imagePath}", 4850178287);


            return redirect('/profile/1');
        } else return redirect('/');

    }
    public function edit(\App\Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function editvid(\App\Video $video)
    {
        $animes = new \App\Post;
        $animes = $animes->all()->where('id', $video->post_id);
        return view('videos.edit', compact('video','animes'));
    }
    public function update(\App\Post $post)
    {
        $data = request()->validate([
            'caption' => 'required',
            'method' => 'required',
            'season' => 'required',
            'info' => 'required',
            'pg' => 'required',
            'trailer' => 'required',
            'episodes' => 'required',
            'status' => 'required',
            'image' =>  'image',
        ]);

        if(request()->has('image')) {

            $imagePath = request('image')->store('uploads', 'public');

            $image=public_path("storage/$imagePath");
            dd($image);
            $image = Image::make(public_path("storage/$imagePath"))->resize(225, 319);
            $image->save();

            $data['image'] = $imagePath;

        };



        $data['caption'] = strtolower($data['caption']);

        $post->update($data);
//
        return redirect("/p/{$post->id}");
//
    }

    public function updatevid(\App\Video $video)
    {
        $data = request()->validate([
            'path_id' => 'nullable',
            'post_id' => 'required',
            'episode' => 'required',
            'skip_intro' => '',
            'file_id' => ['required'],
        ]);
        $video->update($data);

        return redirect("/v/{$video->id}");
    }
    public function deletevid(\App\Video $video)
    {
        $video->delete();
        return redirect("/");
    }
    public function storeNov()
    {

    }
}
