@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8">
<!--Iframe-->
    <iframe  src="{{$link}}" class="w-100" width="1280" height="720"></iframe>
<!--LocalVideo-->
        <video autoplay="autoplay" data-volume=".5" data-skin="dark" class="afterglow w-100" id="myvideo" width="1280" height="720" label="SD">
            <source src="{{$link}}" type="video/mp4" >
             @if ($vid->path_id != null)
                <track class="bg-dark text-dark" kind="captions" label="English" srclang="en" src="{{$sub}}" default>
             @endif
            <a href="{{$link}}" download>Download</a>
        </video>

<!-- Skip intro -->
        <div class="w-100 bg-dark p-3" id="btns">
            <button class="btn btn-warning uk-animation uk-animation-slide-top-small w-100" id="skip-intro">Эхлэл алгасах</button>

        </div>
    </div>
    <div class="col-md-3">
        <div class="accordion" id="accordionExample1">



            <div id="collapseOne" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordionExample1">
                <div class="overflow-auto episode-box p-3" style="height:720px">
                    @foreach ($animes as $anime)
                <a href="{{url('p/'.$anime->id)}}"><p class="text-center ep-item"><span class="info-caption">{{$anime->caption}}:</span> {{$anime->season}}</p></a>
                    @endforeach
                </div>
                <button class="btn btn-warning w-100" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Бусад Ангиуд ({{count($episodes)}})
            </button>
            </div>
        </div>
        <div class="accordion" id="accordionExample2">

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample2">
                <button class="btn btn-warning w-100" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Бусад Анимэ жагсаалт ({{count($animes)}})
            </button>
                <div class="overflow-auto episode-box p-3" style="height:720px">
                    @foreach ($episodes as $episode)
                        <a href="{{url('v/'.$episode->id)}}"><p class="@if($vid->episode == $episode->episode) bg-light text-dark @elseif($vid->id != $episode->id) bg-dark text-light @endif  text-center ep-item"><span class="info-caption">Анги:</span> {{$episode->episode}}</p></a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


<script>

    $(document).ready(function(){
        $('#myvideo').hide();
        $('#skip-intro').hide();
    });

    /*button.addEventListener("click", function(e) {
        console.log(video.duration);

        video.currentTime = {{$vid->skip_intro}};
        video.play();
    });*/

    </script>



<script src="//cdn.jsdelivr.net/npm/afterglowplayer@1.x"></script>

@endsection
