@extends('layouts.mobile')

@section('content')

<div class="row">
    <div class="col-md-8">
<!--Iframe-->
    <iframe frameborder="0" allowfullscreen src="{{$link}}" class="w-100 h-100" width="1280"></iframe>

    </div>
    <div class="col-md-3">
        <div class="accordion" id="accordionExample1">
            <div id="collapseOne" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordionExample1">
                <button class="btn btn-warning w-100" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Бусад Ангиуд ({{count($episodes)}})
            </button>
                <div class="overflow-auto episode-box p-3" style="height:50%">
                    @foreach ($animes as $anime)
                    <a href="{{url('p/'.$anime->id)}}"><p class="text-center ep-item uk-text-capitalize"><span class="info-caption">{{$anime->caption}}:</span> {{$anime->season}}</p></a>
                    @endforeach
                </div>

            </div>
        </div>
        <div class="accordion" id="accordionExample2">

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample2">
                <button class="btn btn-warning w-100" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Бусад Анимэ жагсаалт ({{count($animes)}})
            </button>
                <div class="overflow-auto episode-box p-3" style="height:720px">
                    @foreach ($episodes as $episode)
                        <a href="{{url('v/'.$episode->id)}}/m"><p class="@if($vid->episode == $episode->episode) bg-light text-dark @elseif($vid->id != $episode->id) bg-dark text-light @endif  text-center ep-item"><span class="info-caption">Анги:</span> {{$episode->episode}}</p></a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
