@extends('layouts.app')

@section('content')

<div class="container">

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content uk-background-image@m uk-background-cover uk-background-muted" style="background-image:url('https://static-cdn.jtvnw.net/jtv_user_pictures/a83a6386-15fc-479e-83b2-4cf90dbba7b4-profile_banner-480.jpeg');">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Асуудал илгээх</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form action="/report" enctype="multipart/form-data" method="post" class="">
        @csrf
    <div class="container">
            <div class="form-group row">
                <label for="content_id" class="col-md-4 col-form-label font-weight-bold">Видео Дугаар</label>
                    <input id="content_id" type="text" class="form-control @error('content_id') is-invalid @enderror" name="content_id" value="{{ old('content_id') ?? $vid->id }}" required autocomplete="content_id" autofocus>
                    @error('content_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

             <div class="form-group row">
                <label for="explain" class="col-md-4 col-form-label font-weight-bold">Тайлбар</label>
                    <input id="explain" type="text" class="form-control @error('explain') is-invalid @enderror" name="explain" value="Гарахгүй байна!" required autocomplete="explain" autofocus>
                    @error('explain')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="form-group row">
                <label for="mail" class="col-md-4 col-form-label font-weight-bold">Email хаяг</label>
                    <input id="mail" type="email" class="form-control @error('mail') is-invalid @enderror" name="mail" required autocomplete="mail" autofocus>
                    @error('mail')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="row pt-4">
                <button type="submit" class="btn btn-primary">Мэдээлэл илгээх</button>
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
{{-- Modal End --}}


<div class="row">
    <div class="alert alert-success" id="thanks">Таны мэдэгдлийг хүлээж авлаа</div>
</div>
<div class="row text-capitalize justify-content-right mt-3">
    <a href="/p/{{$anime->id}}">
        <span class="uk-label">{{$anime->caption}}</span>
        <span class="uk-label">Бүлэг: {{$anime->season}}</span>
    </a>
</div>

</div>
<hr>
<div class="row justify-content-center">
    <div class="col-md-6 mb-3">

<!--Iframe-->
<div class="w-100 bg-dark p-3" id="btns">
     @if (filter_var($linkv, FILTER_VALIDATE_URL) )
<button type="button" id="changer" class="btn btn-warning w-100"><i class="fa fa-sync"></i> Тоглуулагч солих</button>

@endif
</div>
    <iframe id="embed" frameborder="0" allowfullscreen src="{{$link}}" class="w-100 h-75 mx-auto" width="1280"></iframe>
<!--LocalVideo-->
        <video  data-volume=".5" data-skin="dark" class="afterglow w-100" id="myvideo" width="1280" height="720" label="SD">
            <source src="{{$linkv}}" type="video/mp4" >
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
                <div class="overflow-auto episode-box p-3" style="height:520px">
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
                <div class="overflow-auto episode-box p-3" style="height:420px">
                    @foreach ($episodes as $episode)
                        <a href="{{url('v/'.$episode->id)}}"><p class="@if($vid->episode == $episode->episode) bg-light text-dark @elseif($vid->id != $episode->id) bg-dark text-light @endif  text-center ep-item"><span class="info-caption">Анги:</span> {{$episode->episode}}</p></a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
 @if (filter_var($linkv, FILTER_VALIDATE_URL))
     <script>
    $(document).ready(function(){
        $('#myvideo').show();
        $('#embed').hide();
    })
     </script>
     @else
<script>
    $(document).ready(function(){
        $('#myvideo').hide();
        $('#embed').show();
    })
     </script>
 @endif



<script>
    $(document).ready(function(){


        $('#thanks').hide();

        $( "#changer" ).click(function() {
            if($("#myvideo").is(":hidden")){
                $( "#embed" ).hide();
                $( "#myvideo" ).show();



            }else{
                $( "#embed" ).show();
                $( "#myvideo" ).hide();
                afterglow.getPlayer('myvideo').pause();
            }
        });




        $('#success').on(function(e) {
            $('thanks').show();
        });


        var url=window.location.href;
        var arr=url.split('#')[1];

        if(arr == "success"){
        $('#thanks').show();
        $('#thanks').delay(4000).fadeOut( 300 );;
        };



    });


    /*button.addEventListener("click", function(e) {
        console.log(video.duration);

        video.currentTime = {{$vid->skip_intro}};
        video.play();
    });*/

    </script>


@endsection
