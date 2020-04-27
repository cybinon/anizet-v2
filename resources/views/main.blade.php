@extends('layouts.app')

@section('content')

<div class="container-fluid"></div>
@if(count($anime)!=0)

    <div class="uk-heading-small text-center">
        <h1 class="uk-h1 uk-heading-divider">Гарч байгаа</h1>
    </div>

    <div class="owl-carousel owl-theme w-100" id="slide1">
        @foreach ($anime as $item)

        <?php $ep = $episodes->all()->where('post_id',$item->id)->sortByDesc('episode')->first(); ?> {{--Сүүлд Гарсан анги олох үйлдэл--}}
        @if(isset($ep))
        <div class="uk-card uk-card-hover uk-transition-toggle" tabindex="0">
            <a href="/v/{{$ep['id']}}" class="uk-text-center">
                <img style="width:100%" src="{{$item->image}}" alt="{{$item->caption}}" class="rounded">
                <div class="uk-position-top uk-position-small uk-overlay-blue uk-text-bold text-white uk-width-1-4 rounded-circle">
                    Анги: {{$ep['episode']}}
                </div>

                <div class="uk-position-bottom uk-overlay uk-padding-remove uk-overlay-primary">
                    <p class="uk-h6 uk-margin-remove uk-text-capitalize font-weight-bold">{{$item->caption}} | <span>{{$item->season}}</span></p>
                </div>

                <div class="uk-transition-fade uk-position-cover uk-position-small uk-overlay uk-overlay-default uk-flex uk-flex-center uk-flex-middle">
                    <p class="uk-h4 text-dark uk-margin-remove"><i class="fa fa-play fa-2x" aria-hidden="true"></i></p>
                </div>
            </a>
        </div>
        @endif
        @endforeach

    </div>

@endif
@if(count($ova)!=0)

        <div class="uk-heading-medium  text-center">
            <h1 class="uk-h1 uk-heading-divider">Гарч дууссан</h1>
        </div>

        <div class="owl-carousel owl-theme w-100" id="slide2">
            @foreach ($ova as $item)
                <div class="uk-card uk-card-hover uk-transition-toggle" tabindex="0">
                    <a href="/p/{{$item->id}}" class="uk-text-center">
                        <img style="width:100%" src="{{$item->image}}" alt="{{$item->caption}}" class="rounded">
                        <div class="uk-position-top uk-position-small uk-overlay-blue uk-text-bold text-white uk-width-1-4 rounded-circle">
                            Бүх анги
                        </div>
                        <div class="uk-position-bottom uk-overlay uk-padding-remove uk-overlay-primary">
                            <p class="uk-h6 uk-margin-remove  uk-text-capitalize">{{$item->caption}} <span class="badge badge-primary">Бүлэг: {{$item->season}}</span></p>
                        </div>
                        <div class="uk-transition-fade uk-position-cover uk-position-small uk-overlay uk-overlay-default uk-flex uk-flex-center uk-flex-middle">
                            <p class="uk-h4 text-dark uk-margin-remove"><i class="fa fa-play fa-2x" aria-hidden="true"></i></p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
@endif


</div>
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
