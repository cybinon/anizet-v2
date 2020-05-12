@extends('layouts.app')

@section('nav')

@endsection

@section('content')
    <app-container></app-container>
@endsection

@section('end-script')
 <script>
    $(document).ready(function(){
    var xhr = new XMLHttpRequest();
     xhr.open("GET", "/introvid.mp4");
     xhr.responseType = "arraybuffer";

     xhr.onload = function(e){
         var blob = new Blob([xhr.response], {type: "video/mp4"});
         var url = URL.createObjectURL(blob);
         console.log(url);

         var video = document.getElementById("video");
         video.src = url;
     }
     xhr.send();
    });
</script>
@endsection
