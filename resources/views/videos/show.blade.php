@extends('layouts.app')

@section('content')
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">Асуудал илгээх</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form action="/report" enctype="multipart/form-data" method="post" class="text-dark">
        @csrf
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="form-group row">
                <label for="content_id" class="col-md-4 col-form-label text-md-right">Видео Дугаар</label>
                    <input id="content_id" type="text" class="form-control @error('content_id') is-invalid @enderror" name="content_id" value="{{ old('content_id') ?? $vid->id }}" required autocomplete="content_id" autofocus>
                    @error('content_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

            </div>
             <div class="form-group row">
                <label for="explain" class="col-md-4 col-form-label text-md-right">Тайлбар</label>
                    <input id="explain" type="text" class="form-control @error('explain') is-invalid @enderror" name="explain" value="Гарахгүй байна!" required autocomplete="explain" autofocus>
                    @error('explain')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

            </div>




            <div class="row pt-4">
                <button type="submit" class="btn btn-primary">Мэдээлэл илгээх</button>
            </div>
        </div>
    </div>
    </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Гарах</button>
      </div>
    </div>
  </div>
</div>

<div class="row">
    <div class="alert alert-warning">Тоглуулагч туршилтын хувилбар </div>
</div>
<div class="row">
    <div class="alert alert-success" id="thanks">Таны мэдэгдлийг хүлээж авлаа</div>
</div>
<div class="text-center text-capitalize">
    <a href="/p/{{$anime->id}}">
        <span class="h1 text-white">{{$anime->caption}}</span><br>
        <span class="h3">Бүлэг: {{$anime->season}}</span>
    </a>
</div>

<hr>

<div class="row">
    <div class="col-md-7">

<!--Iframe-->
    <iframe frameborder="0" allowfullscreen src="{{$link}}" class="w-100 h-75" width="1280"></iframe>
<!--LocalVideo-->
        <video  data-volume=".5" data-skin="dark" class="afterglow w-100" id="myvideo" width="1280" height="720" label="SD">
            <source src="{{$link}}" type="video/mp4" >
             @if ($vid->path_id != null)
                <track class="bg-dark text-dark" kind="captions" label="English" srclang="en" src="{{$sub}}" default>
             @endif
            <a href="{{$link}}" download>Download</a>
        </video>

<!-- Skip intro -->
    <div class="w-100 bg-dark p-3" id="btns">
            <button type="button" class="btn btn-primary font-weight-bold w-100" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-bell"></i> Анимэ гарахгүй байна!</button>
        </div>

    </div>
    <div class="col-md-3 mt-5">
        <div class="accordion" id="accordionExample1">
            <div id="collapseOne" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordionExample1">
                <button class="btn btn-warning w-100" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Бусад Ангиуд ({{count($episodes)}})
            </button>
                <div class="overflow-auto episode-box p-3" style="height:720px">
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
        $('#thanks').hide();

        var id = window.location.pathname;
        id = id.replace("/v/", "");
        if(isNaN(id)){
        $('#thanks').show();
        $('#thanks').delay(5000).fadeOut( 300 );;
        };



    });


    /*button.addEventListener("click", function(e) {
        console.log(video.duration);

        video.currentTime = {{$vid->skip_intro}};
        video.play();
    });*/

    </script>


@endsection
