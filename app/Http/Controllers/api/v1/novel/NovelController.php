<?php

namespace App\Http\Controllers\api\v1\novel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Novel;

class NovelController extends Controller
{
    public function index()
    {
        $animes = Novel::orderBy('updated_at', 'DESC')->get();

        return $animes;
    }
    public function show(\App\Novel $id)
    {
        return $id;
    }
}
