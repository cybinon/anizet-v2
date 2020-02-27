@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/v" enctype="multipart/form-data" method="post">
        @csrf
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="form-group row">
                <label for="episode" class="col-md-4 col-form-label text-md-right">{{ __('Анги') }}</label>
                    <input id="episode" type="text" class="form-control @error('episode') is-invalid @enderror" name="episode" value="{{ old('episode') }}" required autocomplete="episode" autofocus>
                    @error('episode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

            </div>
            <div class="form-group row">
                <label for="post_id" class="col-md-4 col-form-label text-md-right">{{ __('Анимэ') }}</label>
                    <select id="post_id" class="form-control @error('post_id') is-invalid @enderror" name="post_id" value="{{ old('post_id') }}" required autocomplete="post_id" autofocus>
                        @foreach($animes as $anime)
                    <option value="{{$anime->id}}">{{$anime->caption}}: {{$anime->season}}</option>
                        @endforeach
                    </select>

                    @error('post_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

            </div>
            <div class="form-group row">
                <label for="path_id" class="col-md-4 col-form-label text-md-right">{{ __('Анимэ оруулах /MP4 линк/') }}</label>

                    <input id="path_id" type="text" class="form-control @error('path_id') is-invalid @enderror" name="path_id" value="{{ old('path_id') }}" autocomplete="path_id" autofocus>

                    @error('path_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

            </div>

            <div class="form-group row" uk-tooltip="title: Shared link оруулаарай; pos: left;">
                <label for="video" class="col-md-4 col-form-label text-md-right">{{ __('Анимэ оруулах /Embed линк/') }}</label>
                    <input id="video" type="text" class="form-control @error('video') is-invalid @enderror" name="video" value="{{ old('video') }}" required autocomplete="video" autofocus>

                    @error('video')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

            </div>

            <div class="form-group row">
                <label for="skip_intro" class="col-md-4 col-form-label text-md-right">{{ __('Эхлэлийн хэсгийг алгасах цаг') }}</label>

                    <input id="skip_intro" type="number" class="form-control @error('skip_intro') is-invalid @enderror" name="skip_intro" value="{{ old('skip_intro') }}0" autocomplete="skip_intro" autofocus>

                    @error('skip_intro')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

            </div>

            <div class="row">

            </div>
            <div class="row pt-4">
                <button type="submit" class="btn btn-primary">Анги нэмэх</button>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection
