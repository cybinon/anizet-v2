@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile" enctype="multipart/form-data" method="post">
        @csrf
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="form-group row">
                <label for="Nickname" class="col-md-4 col-form-label text-md-right">{{ __('Анги') }}</label>
                    <input id="Nickname" type="text" class="form-control @error('Nickname') is-invalid @enderror" name="Nickname" value="{{ old('Nickname') }}" required autocomplete="Nickname" autofocus>
                    @error('Nickname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

            </div>
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Анимэ') }}</label>
                    <select id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @foreach($animes as $anime)
                    <option value="{{$anime->id}}">{{$anime->caption}}: {{$anime->season}}</option>
                        @endforeach
                    </select>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

            </div>

            <div class="form-group row" uk-tooltip="title: Shared link оруулаарай; pos: left;">
                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Анимэ оруулах /Embed линк/') }}</label>
                    <input id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender" autofocus>

                    @error('gender')
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
