@extends('layouts.app')

@section('content')
<div class="container">
    <div class="uk-heading-medium  text-center">
        <h1 class="uk-h2 uk-heading-divider">Манай бүх сан</h1>
    </div>
<div class="row">
        @foreach ($anime as $item)
            <div class="col-md-3 mt-3">
                    <div class="uk-card uk-card-hover uk-transition-toggle" tabindex="0">
                        <a href="/p/{{$item->id}}" class="uk-text-center">
                            <img style="width:100%" src="{{$item->image}}" alt="" class="rounded">
                            <div class="uk-position-bottom uk-overlay uk-overlay-primary">
                                <p style="height:60px" class="uk-h5 uk-margin-remove uk-text-capitalize">{{$item->caption}} </p>
                                <h4 class="uk-text-capitalize "><span class="badge badge-secondary">Бүлэг: {{$item->season}}</span></h4>
                            </div>
                            <div class="uk-transition-fade uk-position-cover uk-position-small uk-overlay uk-overlay-default uk-flex uk-flex-center uk-flex-middle">
                                <p class="uk-h4 text-dark uk-margin-remove"><i class="fa fa-play fa-2x" aria-hidden="true"></i></p>
                            </div>
                        </a>
                    </div>
            </div>
        @endforeach
</div>

</div>
@endsection

