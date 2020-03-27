<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;


use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseController extends Controller
{
    public function index(){

        $serviceAccount = ServiceAccount::fromJsonFile( __DIR__.'/Firebase.json');
        $firebase = (new Factory)->withServiceAccount($serviceAccount)->create();

        $database = $firebase->getDatabase();


        $ref = $database->getReference('novels');

        $key = $ref->push()->getKey();

        $ref->getChild($key)->set([
            'Subjectname' => 'Laravel Class',
            'SubjectText' => 'bla bla bla'
        ]);

        return $ref;

    }
    function wupload()
    {
       $max = [
           'upload' => ini_get('upload_max_filesize'),
           'post' => ini_get('post_max_size'),
           'input' => ini_get('max_input_vars'),
           'exetime' => ini_get('max_execution_time'),
           'inputtime' => ini_get('max_input_time')
       ];
     return view('file_upload', compact('max'));
    }

    function upload(Request $request)
    {
    ini_set('max_execution_time', '0');

     $rules = array(
      'file'  => 'required|mimes:mp4,mov,ogg,mkv|max:2400000'
     );

     $error = Validator::make($request->all(), $rules);

     if($error->fails())
     {
      return response()->json(['errors' => $error->errors()->all()]);
     }

     $image = $request->file('file');

     $new_name = rand() . '.' . $image->getClientOriginalExtension();
     $image->move(storage_path('app/public/video'), $new_name);

    $vid_link =  url("storage/video/".$new_name);
     $output = array(
         'success' => "Видео амжилттай хуулагдлаа, Видео линк: ".$vid_link,
         'direct' => "Анги оруулах хэсэгт очих: <a href='".url("v/create?mp4=$vid_link")."'>$new_name</a>",
         'video'  => '<video controls src="'.$vid_link.'" class="img-thumbnail"></video>'
        );

        return response()->json($output);
    }
}
