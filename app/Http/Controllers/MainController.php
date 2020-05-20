<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Mail\SendMail;
use Illuminate\Support\Facades\Auth;


use \App\Animes;
use \App\Season;

class MainController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');

    }

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
    public function test($id){
        $animes = Animes::findOrFail($id);
        $animes = $animes->season->all();
        $animes = json_encode($animes);

        return $animes;
    }

    public function main()
    {
        return view('main');
    }


}
