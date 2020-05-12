<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');

    }

    public function index(\App\User $user)
    {
        return view('spa', compact('user'));
    }
    public function CheckProfile()
    {
        //$user = auth()->user()->id;
        return redirect('/profile/'.$user);
    }

}
