@extends('layouts.app')

@section('content')

<div id="my-id" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title">Танилцуулга бичлэг</h2>
        <iframe width="100%" height="320" src="https://www.youtube.com/embed/{{$post->trailer}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>

<div class="uk-h1 text-center uk-text-capitalize">{{$post->caption}}</div>
<hr>

<div class="row">
    <div class="col-md-3">
        <img class="w-100" src="/storage/{{$post->image}}" alt="">
        <hr>
    </div>
    <div class="col-md-3">
        <div class="accordion" id="accordionExample">

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <p><span class="info-caption">Бүлэг:</span> {{$post->season}}</p>
            <p><span class="info-caption">Нийт анги:</span> {{$post->episodes}}</p>
            <p><span class="info-caption">Насны ангилал:</span> {{$post->pg}}</p>
            <p><span class="info-caption">Төлөв:</span>
                @switch($post->status)
                    @case(1)
                        <span class="btn btn-warning">Гарч байгаа</span>
                        @break
                    @case(2)
                        <span class="btn btn-success">Дууссан</span>
                        @break
                    @case(3)
                       <span class="btn btn-danger">Хаягдсан</span>
                        @break

                    @default
                        <span class="btn btn-warning">Гарч байгаа</span>
                @endswitch
            </p>

            <p><span class="info-caption">Товч агуулга:</span> {{$post->info}}</p>
            <p class="text-center"><button class="btn btn-primary w-100" uk-toggle="target: #my-id" type="button" ><i class="fas fa-play-circle fa-2x"></i></button></p>
            <hr>
    </div>
  </div>
  <div class="accordion" id="accordionExample1">

        <button class="btn btn-warning w-100" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Анимэ үзэх / Товч мэдээлэл
        </button>

    <div id="collapseOne" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordionExample1">
    <div class="overflow-auto episode-box p-3">
            @foreach ($episodes as $episode)
                <a href="{{url('v/'.$episode->id)}}"><p class="bg-light text-dark text-center ep-item"><span class="info-caption">Анги:</span> {{$episode->episode}}</p></a>
            @endforeach
    </div>

    </div>
    <hr>
  </div>


        </div>

        <div class="col-md-6">
            <div class="overflow-auto episode-box p-3">
                @if(count($season)> 1)
                <h2 class="text-center">Бусад бүлэг</h2>
                <hr>
                <div class="owl-carousel owl-theme w-100" id="season">
                    @foreach ($season as $item)
                    @if($item->id != $post->id)
                    <div class="uk-card uk-card-hover uk-transition-toggle" tabindex="0">
                            <a href="{{url('p/'.$item->id)}}" class="uk-text-center">
                                <img style="width:100%" src="{{url('storage/'.$item->image)}}" alt="">
                                <div class="uk-position-bottom uk-overlay uk-overlay-primary">
                                    <p style="height:60px" class="uk-h5 uk-margin-remove">{{$item->caption}}</p>
                                </div>
                                <div class="uk-transition-fade uk-position-cover uk-position-small uk-overlay uk-overlay-default uk-flex uk-flex-center uk-flex-middle">
                                        <p class="uk-h4 text-dark uk-margin-remove"><i class="fa fa-play fa-2x" aria-hidden="true"></i></p>
                                    </div>
                            </a>
                        </div>
                        @endif
                        @endforeach
                </div>
                <hr>
                @endif
                <h2 class="text-center">Бусад Анимэ</h2>
                <hr>
               <div class="owl-carousel owl-theme w-100" id="series">
        @foreach ($all as $item)
        <div class="uk-card uk-card-hover uk-transition-toggle" tabindex="0">
                <a href="{{url('p/'.$item->id)}}" class="uk-text-center">
                    <img style="width:100%" src="{{url('storage/'.$item->image)}}" alt="">
                    <div class="uk-position-bottom uk-overlay uk-overlay-primary">
                        <p style="height:60px" class="uk-h5 uk-margin-remove">{{$item->caption}}</p>
                    </div>
                    <div class="uk-transition-fade uk-position-cover uk-position-small uk-overlay uk-overlay-default uk-flex uk-flex-center uk-flex-middle">
                            <p class="uk-h4 text-dark uk-margin-remove"><i class="fa fa-play fa-2x" aria-hidden="true"></i></p>
                        </div>
                </a>
            </div>
            @endforeach
        </div>
            </div>
        </div>
    </div>

</div>
@endsection
