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

    public function esform($season)
    {
        $season = Season::findorfail($season);

        $category = Category::all();
        $rating = Rating::all();

        $array = $season->anime->category;

        $array = preg_replace('~[\\\\/:*?"<>|""[]|]~', '', $array);

        $array = explode(',',$array);

        foreach($array as $sr){
            $scategory = Category::findorFail($sr);
            $scategories[] = $scategory;
        }
        $season->anime->category = $scategories;

        return view('admin.edit', compact('season','category','rating'));
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

        //Opening Render
        $render = explode(':', $data['starting_opening']);
        if(isset($render[1])) $render = $render[0]*60+$render[1];
         else $render= $render[0]*60;
        $data['starting_opening'] = $render;

        $render = explode(':', $data['duration_opening']);
        if(isset($render[1])) $render = $render[0]*60+$render[1];
         else $render= $render[0]*60;
        $data['duration_opening'] = $render - $data['starting_opening'];


        //Ending Render
        $render = explode(':', $data['starting_ending']);
        if(isset($render[1])) $render = $render[0]*60+$render[1];
         else $render= $render[0]*60;
        $data['starting_ending'] = $render;

        $render = explode(':', $data['duration_ending']);
        if(isset($render[1])) $render = $render[0]*60+$render[1];
         else $render= $render[0]*60;
        $data['duration_ending'] = $render - $data['starting_ending'];

        //Ending Render
        if(isset($data['starting_addition']) && $data['starting_addition'] != null){
            $render = explode(':', $data['starting_addition']);
            if(isset($render[1])) $render = $render[0]*60+$render[1];
            else $render= $render[0]*60;
            $data['starting_addition'] = $render;
        }
        if(isset($data['duration_addition']) && $data['duration_addition'] != null){
            $render = explode(':', $data['duration_addition']);
            if(isset($render[1])) $render = $render[0]*60+$render[1];
            else $render= $render[0]*60;
            $data['duration_addition'] = $render - $data['starting_addition'];
        }

        // Saving into DB
        $video = new Video;

        $video->season_id = $data['season_id'];
        $video->file_id = $data['file_id'];
        $video->episode_number = $data['episode_number'];
        $video->episode_caption = $data['episode_caption'];
        $video->next_episode = $data['next_episode'];
        $video->previous_episode = $data['previous_episode'];

        if(isset($data['starting_duration']) && $data['starting_duration'] != null){
            $video->starting_duration = $data['starting_duration'];
        }

        if(isset($data['duration_addition']) && $data['duration_addition'] != null){
            $video->duration_addition = $data['duration_addition'];
        }
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

        //Trailer embed
        preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $data['trailer'], $matches);

        $data['trailer'] = "https://www.youtube.com/embed/".$matches[1];

        $imageNameHeight = time().'height.'.$request->height->extension();
        $request->height->move(public_path('uploads/pictures'), $imageNameHeight);
        $imageRender = Image::make(public_path('uploads/pictures/'.$imageNameHeight))->resize(400,520);
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
        $season->image_height = url('/uploads/pictures/'.$imageNameHeight);
        $season->image_width = url('/uploads/pictures/'.$imageNameWidth);
        $season->trailer = $data['trailer'];

        $season->save();

        return redirect('/admin/add/'.$season->id);

    }

     public function aupdate(Request $request)
    {
        $data = $request->validate([
            'anime_id'=> 'required',
            'season_id'=> 'required',

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
            'height'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'width'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //Trailer embed
        preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $data['trailer'], $matches);

        $data['trailer'] = "https://www.youtube.com/embed/".$matches[1];

        if(isset($data['height'])){
            $imageNameHeight = time().'height.'.$request->height->extension();
            $request->height->move(public_path('uploads/pictures'), $imageNameHeight);
            $imageRender = Image::make(public_path('uploads/pictures/'.$imageNameHeight))->resize(400,511);
            $imageRender->save();
        }
        if(isset($data['width'])){
            $imageNameWidth = time().'width.'.$request->width->extension();
            $request->width->move(public_path('uploads/pictures'), $imageNameWidth);
            $imageRender = Image::make(public_path('uploads/pictures/'.$imageNameWidth))->resize(1280,720);
            $imageRender->save();
        }

        //Cloudder::upload(url('uploads/pictures/'.$imageNameWidth));


        $data['category'] = json_encode($data['category']);

        $anime = Animes::find($data['anime_id']);
        $anime->user_id = Auth::user()->id;
        $anime->caption_en = $data['caption_en'];
        $anime->caption_mn = $data['caption_mn'];
        $anime->caption_kanji = $data['caption_kanji'];
        $anime->rating = $data['rating'];
        $anime->category = $data['category'];
        $anime->save();

        $season = Season::find($data['season_id']);
        $season->anime_id = $anime->id;
        $season->number = $data['number'];
        $season->name = $data['name'];
        $season->description = $data['description'];
        $season->status = $data['status'];
        $season->episodes = $data['episodes'];
        $season->trailer = $data['trailer'];
        if(isset($data['height'])) $season->image_height = '/uploads/pictures/'.$imageNameHeight;
        if(isset($data['width'])) $season->image_width = '/uploads/pictures/'.$imageNameWidth;
        $season->trailer = $data['trailer'];

        $season->save();

        return redirect('/admin');

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
