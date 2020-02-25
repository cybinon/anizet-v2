@extends('layouts.app')

@section('content')
@if(count($anime)!=0)

    <div class="uk-heading-medium  text-center">
        <p class="uk-h2 uk-heading-divider">Гарч байгаа</p>
    </div>

    <div class="owl-carousel owl-theme w-100" id="series">
        @foreach ($anime as $item)

        <?php $ep = $episodes->all()->where('post_id',$item->id)->sortByDesc('episode')->first(); ?> {{--Сүүлд Гарсан анги олох үйлдэл--}}
        @if(isset($ep))
        <div class="uk-card uk-card-hover uk-transition-toggle" tabindex="0">
            <a href="/v/{{$ep['id']}}" class="uk-text-center">
                <img style="width:100%" src="storage/{{$item->image}}" alt="" class="rounded">
                <div class="uk-position-top uk-position-small uk-overlay-blue uk-text-bold text-white uk-width-1-4 rounded-circle">
                    Анги: {{$ep['episode']}}
                </div>

                <div class="uk-position-bottom uk-overlay uk-overlay-primary">
                <p style="height:60px" class="uk-h5 uk-margin-remove uk-text-capitalize">{{$item->caption}}<br>Бүлэг: {{$item->season}}</p>
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
            <p class="uk-h2 uk-heading-divider">Гарч дууссан</p>
        </div>

        <div class="owl-carousel owl-theme w-100" id="music">
            @foreach ($ova as $item)
            <?php $ep = $episodes->all()->where('post_id',$item->id)->sortByDesc('id')->first(); ?> {{--Сүүлд Гарсан анги олох үйлдэл--}}
                @if(isset($ep))
                <div class="uk-card uk-card-hover uk-transition-toggle" tabindex="0">
                    <a href="/v/{{$ep['id']}}" class="uk-text-center">
                        <img style="width:100%" src="storage/{{$item->image}}" alt="" class="rounded">
                        <div class="uk-position-top uk-position-small uk-overlay-blue uk-text-bold text-white uk-width-1-4 rounded-circle">
                            Анги: {{$ep['episode']}}
                        </div>
                        <div class="uk-position-bottom uk-overlay uk-overlay-primary">
                            <p style="height:60px" class="uk-h5 uk-margin-remove uk-text-capitalize">{{$item->caption}}<br>Бүлэг: {{$item->season}}</p>
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



@endsection

