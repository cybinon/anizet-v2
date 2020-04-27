@extends('layouts.app')

@section('content')
<div class="container">
<div id="my-id" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title">Танилцуулга бичлэг</h2>
        <iframe width="100%" height="320" src="https://www.youtube.com/embed/{{$post->trailer}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>

<div class="uk-h1 text-center uk-text-capitalize">{{$post->caption}}</div>
<hr>

<div class="row">
    <div class="col-md-6 col-xs-6 col-lg-3">
        <img class="w-100" src="{{url($post->image)}}" alt="">
        <hr>
    </div>{{--Anime pic col ended  --}}
    <div class="col-md-6 col-xs-6 col-lg-3">
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
            <p class="text-center">
                <button class="btn btn-primary w-100" uk-toggle="target: #my-id" type="button" ><i class="fas fa-play-circle fa-2x"></i></button>
            </p>
            <hr>
        </div>{{-- Anime info col ended --}}
        <div class="col-lg-6">
            <button class="btn btn-warning w-100" type="button">
            Анимэ үзэх / Товч мэдээлэл
            </button>

            <div class="overflow-auto episode-box p-3">
            @foreach ($episodes as $episode)
                <a href="{{url('v/'.$episode->id)}}">
                    <p class="bg-light text-dark text-center ep-item">
                        <span class="info-caption">Анги:</span> {{$episode->episode}}
                    </p>
                </a>
            @endforeach
            </div>
        </div>{{-- Anime episodes col ended --}}
    </div>{{-- Row Ending --}}
</div>{{-- container ending --}}

@endsection

@section('end-script')
 <script>
        $(document).ready(function(){

            $("#slide1").owlCarousel({
                dots: true,
                autoplay:true,
                autoplayTimeout:5000,
                autoplayHoverPause:true,
                loop:false,
                margin:10,
                autoWidth:false,
                autoHeight:false,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:2,
                        nav:false
                    },
                    700:{
                        items:4,
                        nav:false,
                    },
                    1000:{
                        items:7,
                        nav:false,
                    }
                }
            });

            $("#slide2").owlCarousel({
                dots: true,
                autoplay:true,
                autoplayTimeout:5000,
                autoplayHoverPause:true,

                loop:true,
                margin:10,
                autoWidth:false,
                autoHeight:false,
                responsiveClass:false,
                responsive:{
                    0:{
                        items:2,
                        nav:false,
                    },
                    700:{
                        items:4,
                        nav:false,
                    },
                    1000:{
                        items:7,
                        nav:false,
                    }
                }
            });


            });

            </script>
@endsection
