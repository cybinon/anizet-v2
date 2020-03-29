@extends('layouts.app')

@section('content')

<div class="container-fluid"></div>
@if(count($anime)!=0)

    <div class="uk-heading-small text-center">
        <h1 class="uk-h1 uk-heading-divider">Гарч байгаа</h1>
    </div>

    <div class="owl-carousel owl-theme w-100" id="series">
        @foreach ($anime as $item)

        <?php $ep = $episodes->all()->where('post_id',$item->id)->sortByDesc('episode')->first(); ?> {{--Сүүлд Гарсан анги олох үйлдэл--}}
        @if(isset($ep))
        <div class="uk-card uk-card-hover uk-transition-toggle" tabindex="0">
            <a href="/v/{{$ep['id']}}" class="uk-text-center">
                <img style="width:100%" src="{{$item->image}}" alt="{{$item->caption}}" class="rounded">
                <div class="uk-position-top uk-position-small uk-overlay-blue uk-text-bold text-white uk-width-1-4 rounded-circle">
                    Анги: {{$ep['episode']}}
                </div>

                <div class="uk-position-bottom uk-overlay uk-overlay-primary">
                    <p style="height:60px" class="uk-h5 uk-margin-remove uk-text-capitalize">{{$item->caption}}</p>
                    <p class="h5"><span class="badge badge-primary">Бүлэг: {{$item->season}}</span></p>
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
            <h1 class="uk-h1 uk-heading-divider">Онцлох</h1>
        </div>

        <div class="owl-carousel owl-theme w-100" id="music">
            @foreach ($ova as $item)
            <?php $ep = $episodes->all()->where('post_id',$item->id)->sortByDesc('episode')->first(); ?> {{--Сүүлд Гарсан анги олох үйлдэл--}}
                @if(isset($ep))
                <div class="uk-card uk-card-hover uk-transition-toggle" tabindex="0">
                    <a href="/v/{{$ep['id']}}" class="uk-text-center">
                        <img style="width:100%" src="{{$item->image}}" alt="{{$item->caption}}" class="rounded">
                        <div class="uk-position-top uk-position-small uk-overlay-blue uk-text-bold text-white uk-width-1-4 rounded-circle">
                            Анги: {{$ep['episode']}}
                        </div>
                        <div class="uk-position-bottom uk-overlay uk-overlay-primary">
                            <p style="height:60px" class="uk-h5 uk-margin-remove uk-text-capitalize">{{$item->caption}}</p>
                            <p class="h5"><span class="badge badge-primary">Бүлэг: {{$item->season}}</span></p>

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


</div>
@endsection

