<?php

namespace App\Http\Controllers\api\v1\anime;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Animes;

class AnimeController extends Controller
{
     public function index()
    {
        return Animes::find(1002)->season;
    }
}
