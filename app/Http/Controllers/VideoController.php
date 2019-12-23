<?php

namespace App\Http\Controllers;

use pCloud\File;
use pCloud\Folder;

use Illuminate\Http\Request;

class VideoController extends Controller
{

    public function show(\App\video $vid)
    {
        $animes = new \App\Post;
        $animes = $animes->all();
        $episodes=$vid->all()->where('post_id', $vid->post_id)->sortBy('episode');
        $link = new File;
        $link = $link->getLink($vid->file_id);
        //link = "https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4";
        $sub = null;
        if($vid->path_id != 1 && $vid->path_id != null && $vid->path_id != null) $sub = $vid->getLink($vid->path_id);
        return view('videos.show', compact('vid', 'link','episodes','sub','animes'));
    }

    public function list()
    {
       try {
	$pCloudFolder = new Folder;
	$pCloudFile = new File;

	function appendFolder($folderid, $pCloudFolder, $pCloudFile) {
		echo "<ul style=\"color:green\">";
		$content = $pCloudFolder->getContent($folderid);

		foreach ($content as $item) {
			echo "<li style='color:blue;'>{$item->name}</li>";
			if(!empty($item->fileid)){
			echo "<li style='color:red'>{$item->fileid}</li>";

			}
			if ($item->isfolder) {
				echo $item->folderid;
				appendFolder($item->folderid, $pCloudFolder, $pCloudFile);
			}
		}
		echo "</ul>";
	}

	appendFolder(0, $pCloudFolder, $pCloudFile);

} catch (Exception $e) {
	echo $e->getMessage();
}
    }
}
