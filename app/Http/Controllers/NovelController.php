<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NovelController extends Controller
{
    public function create(){
        return view('novels.create');
    }
    public function store(){
        $request = request();
        if ($request->isMethod('post')) {
        $data = $request->validate([
                'title' => 'required',
                'status' => 'required',
                'novel-trixFields' => 'required',
            ]);

        $data['content'] = $data['novel-trixFields']['content'];
        $data['short_content'] = html_entity_decode(strip_tags($data['content']));

        if (strlen($data['short_content']) > 295)
        {
            // If so, cut the string at the character limit
            $new_text = substr($data['short_content'], 0, 295);
            // Trim off white space
            $new_text = trim($new_text);
            // Add at end of text ...
            $data['short_content'] = $new_text . "...";
        }

        auth()->user()->novels()->create([
                'title' => $data['title'],
                'content' => $data['content'],
                'short_content' => $data['short_content'],
                'status_novel' => $data['status']
        ]);
        return redirect('/profile');
        }
        return redirect('/n/create');
    }
    public function show(\App\Novel $novel)
    {
        return view('novels.show', compact('novel'));
    }
    public function delete(\App\Novel $novel)
    {
        $user = \Auth::user();
        if($user->id == $novel->user_id || $user->status > 0) $novel->delete();
        return redirect("/");
    }
}
