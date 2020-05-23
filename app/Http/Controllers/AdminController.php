<?php

namespace App\Http\Controllers;

use App\User;

use App\Animes;
use App\Season;
use App\Video;
use App\Category;
use App\Rating;

use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use JD\Cloudder\Facades\Cloudder;

class AdminController extends Controller
{
    public function __construct()
    {
      $this->middleware('checkstatus');
    }

    public function aform()
    {
        $category = Category::all();
        $rating = Rating::all();
        return view('admin.create', compact('category','rating'));
    }

    public function vform($season)
    {
        $season = Season::findorfail($season);

        return view('admin.add', compact('season'));
    }

    public function vstore(Request $request){
        $data = $request->validate([
            'season_id'=> 'required',
            'file_id'=> 'required',
            'episode_number'=> 'required',
            'episode_caption'=> '',

            'starting_opening'=> 'required',
            'duration_opening'=> 'required',
            'starting_ending'=> 'required',
            'duration_ending'=> 'required',

            'next_episode'=> '',
            'previous_episode'=> '',

            'starting_addition'=> '',
            'duration_addition'=> '',

            'starting_intro'=> '',
            'duration_intro'=> '',
        ]);

        $video = new Video;

        $video->season_id = $data['season_id'];
        $video->file_id = $data['file_id'];
        $video->episode_number = $data['episode_number'];
        $video->episode_caption = $data['episode_caption'];
        $video->next_episode = $data['next_episode'];
        $video->previous_episode = $data['previous_episode'];

        $video->starting_opening = $data['starting_opening'];
        $video->duration_opening = $data['duration_opening'];
        $video->starting_ending = $data['starting_ending'];
        $video->duration_ending = $data['duration_ending'];

        $video->save();

        return redirect('/#/player/'.$video->id);
    }

    public function astore(Request $request)
    {
        $data = $request->validate([
            'caption_mn'=> 'required',
            'caption_en'=> 'required',
            'caption_kanji'=> 'required',
            'rating'=> 'required',
            'category'=> 'required',

            'number'=> 'required',
            'name'=> 'required',
            'description'=> 'required',
            'status'=> 'required',
            'episodes'=> 'required',
            'trailer'=> 'required',
            'height'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'width'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageNameHeight = time().'height.'.$request->height->extension();
        $request->height->move(public_path('uploads/pictures'), $imageNameHeight);
        $imageRender = Image::make(public_path('uploads/pictures/'.$imageNameHeight))->resize(225,315);
        $imageRender->save();
        $imageNameWidth = time().'width.'.$request->width->extension();
        $request->width->move(public_path('uploads/pictures'), $imageNameWidth);
        $imageRender = Image::make(public_path('uploads/pictures/'.$imageNameWidth))->resize(1280,720);
        $imageRender->save();

        //Cloudder::upload(url('uploads/pictures/'.$imageNameWidth));


        $data['category'] = json_encode($data['category']);

        $anime = new Animes;
        $anime->user_id = Auth::user()->id;
        $anime->caption_en = $data['caption_en'];
        $anime->caption_mn = $data['caption_mn'];
        $anime->caption_kanji = $data['caption_kanji'];
        $anime->rating = $data['rating'];
        $anime->category = $data['category'];
        $anime->save();

        $season = new Season;
        $season->anime_id = $anime->id;
        $season->number = $data['number'];
        $season->name = $data['name'];
        $season->description = $data['description'];
        $season->status = $data['status'];
        $season->episodes = $data['episodes'];
        $season->trailer = $data['trailer'];
        $season->image_height = '/uploads/pictures/'.$imageNameHeight;
        $season->image_width = '/uploads/pictures/'.$imageNameWidth;
        $season->trailer = $data['trailer'];

        $season->save();

        return redirect('/admin/add/'.$season->id);

    }

    public function index()
    {
        $animes = Animes::all();

        foreach($animes as $anime){
            $season = Season::where('anime_id',$anime->id)->limit(1)->get();
            $anime->seasons = $season;
        }


        return view('admin.index', compact('animes'));

    }
}
