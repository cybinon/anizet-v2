<?php

namespace App\Http\Controllers;

use App\User;

use App\Animes;
use App\Season;
use App\Video;
use App\Category;
use App\Rating;

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

        $imageNameHeight = time().'.'.$request->height->extension();
        $request->height->move(public_path('uploads/pictures'), $imageNameHeight);

        $imageNameWidth = time().'.'.$request->width->extension();
        $request->width->move(public_path('uploads/pictures'), $imageNameWidth);

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
