@extends('layouts.app')

@section('content')

    <div class="uk-heading-medium  text-center">
        <p class="uk-h2 uk-heading-divider">Сүүлд гарсан цуврал</p>
    </div>
    <div class="owl-carousel owl-theme w-100" id="series">
        @foreach ($anime as $item)
        <div class="uk-card uk-card-hover uk-transition-toggle" tabindex="0">
                <a href="/p/{{$item->id}}" class="uk-text-center">
                    <img style="width:100%" src="storage/{{$item->image}}" alt="">
                    <div class="uk-position-bottom uk-overlay uk-overlay-primary">
                        <p style="height:60px" class="uk-h5 uk-margin-remove uk-text-capitalize">{{$item->caption}}</p>
                    </div>
                    <div class="uk-transition-fade uk-position-cover uk-position-small uk-overlay uk-overlay-default uk-flex uk-flex-center uk-flex-middle">
                            <p class="uk-h4 text-dark uk-margin-remove"><i class="fa fa-play fa-2x" aria-hidden="true"></i></p>
                        </div>
                </a>
            </div>
            @endforeach
        </div>

        <div class="uk-heading-medium  text-center">
            <p class="uk-h2 uk-heading-divider">Нэг Ангит болон Кино</p>
        </div>
        <div class="owl-carousel owl-theme" id="movie">

            @foreach ($movie as $item)
        <div class="uk-card uk-card-hover uk-transition-toggle" tabindex="0">
                <a href="#" class="uk-text-center">
                    <img style="width:100%" src="storage/{{$item->image}}" alt="">
                    <div class="uk-position-bottom uk-overlay uk-overlay-primary">
                        <p style="height:60px" class="uk-h5 uk-margin-remove uk-text-capitalize">{{$item->caption}}</p>
                    </div>
                    <div class="uk-transition-fade uk-position-cover uk-position-small uk-overlay uk-overlay-default uk-flex uk-flex-center uk-flex-middle">
                            <p class="uk-h4 text-dark uk-margin-remove"><i class="fa fa-play fa-2x" aria-hidden="true"></i></p>
                        </div>
                </a>
            </div>
            @endforeach

        </div>

        <div class="uk-heading-medium  text-center">
            <p class="uk-h2 uk-heading-divider">Дуу хөгжим</p>
        </div>

        <div class="owl-carousel owl-theme w-100" id="music">
            @foreach ($song as $item)
            <div class="uk-card uk-card-hover uk-transition-toggle" tabindex="0">
                    <a href="#" class="uk-text-center">
                        <img style="width:100%" src="storage/{{$item->image}}" alt="">
                        <div class="uk-position-bottom uk-overlay uk-overlay-primary">
                            <p style="height:60px" class="uk-h5 uk-margin-remove uk-text-capitalize">{{$item->caption}}</p>
                        </div>
                        <div class="uk-transition-fade uk-position-cover uk-position-small uk-overlay uk-overlay-default uk-flex uk-flex-center uk-flex-middle">
                                <p class="uk-h4 text-dark uk-margin-remove"><i class="fa fa-play fa-2x" aria-hidden="true"></i></p>
                            </div>
                    </a>
                </div>
                @endforeach
            </div>

            <div class="uk-heading-medium  text-center">
                <p class="uk-h2 uk-heading-divider">Манай бүх сан</p>
            </div>

            <div class="owl-carousel owl-theme w-100" id="manga">
                @foreach ($manga as $item)
                <div class="uk-card uk-card-hover uk-transition-toggle" tabindex="0">
                        <a href="#" class="uk-text-center">
                            <img style="width:100%" src="storage/{{$item->image}}" alt="">
                            <div class="uk-position-bottom uk-overlay uk-overlay-primary">
                                <p style="height:60px" class="uk-h5 uk-margin-remove uk-text-capitalize">{{$item->caption}}</p>
                            </div>
                            <div class="uk-transition-fade uk-position-cover uk-position-small uk-overlay uk-overlay-default uk-flex uk-flex-center uk-flex-middle">
                                    <p class="uk-h4 text-dark uk-margin-remove"><i class="fa fa-play fa-2x" aria-hidden="true"></i></p>
                                </div>
                        </a>
                    </div>
                    @endforeach
                </div>
@endsection

