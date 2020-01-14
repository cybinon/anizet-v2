@extends('layouts.app')

@section('content')



<div class="container">
<form action="/p/{{$post->id}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="form-group row">
                <label for="caption" class="col-md-4 col-form-label text-md-right">{{ __('caption') }}</label>

                    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') ?? $post->caption }}" required autocomplete="caption" autofocus>

                    @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

            </div>

            <div class="form-group row">
                <label for="episodes" class="col-md-4 col-form-label text-md-right">{{ __('episodes') }}</label>

                    <input id="episodes" type="text" class="form-control @error('episodes') is-invalid @enderror" name="episodes" value="{{ old('episodes') ?? $post->episodes }}" required autocomplete="episodes" autofocus>

                    @error('episodes')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

            </div>

            <div class="form-group row">
                <label for="season" class="col-md-4 col-form-label text-md-right">{{ __('season') }}</label>

                    <input id="season" type="text" class="form-control @error('season') is-invalid @enderror" name="season" value="{{ old('season') ?? $post->season }}" required autocomplete="season" autofocus>

                    @error('season')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

            </div>
            <div class="form-group row">
                <label for="pg" class="col-md-4 col-form-label text-md-right">{{ __('pg') }}</label>

                    <input id="pg" type="text" class="form-control @error('pg') is-invalid @enderror" name="pg" value="{{ old('pg') ?? $post->pg }}" required autocomplete="pg" autofocus>

                    @error('pg')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

            </div>

            <div class="form-group row">
                <label for="trailer" class="col-md-4 col-form-label text-md-right">{{ __('trailer') }}</label>

                    <input uk-tooltip="title: Youtube-ээс линк оруулна уу!; pos: top-left" id="trailer" type="text" class="form-control @error('trailer') is-invalid @enderror" name="trailer" value="{{ old('trailer') ?? $post->trailer }}" required autocomplete="trailer" autofocus>
                    @error('trailer')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

            </div>

            <div class="form-group row">
                <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('status') }}</label>

                    <select id="status" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ old('status') ?? $post->status }}" required autocomplete="status" autofocus>
                    <option value="{{ old('status') ?? $post->status }}">
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
                    </option>
                    <option value="1">Гарч байгаа</option>
                    <option value="2">Дууссан</option>
                    <option value="3">Хаягдсан</option>
                    </select>
                    @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

            </div>

            <div class="form-group row">
                <label for="method" class="col-md-4 col-form-label text-md-right">{{ __('method') }}</label>

                    <select id="method" class="form-control @error('method') is-invalid @enderror" name="method" value="{{ old('method') ?? $post->method }}" required autocomplete="method" autofocus>
                    <option value="{{ old('method') ?? $post->method }}">
                    @switch($post->method)
                    @case(1)
                        <span class="btn btn-warning">Цуврал Анимэ</span>
                        @break
                    @case(2)
                        <span class="btn btn-success">Кино</span>
                        @break
                    @case(3)
                       <span class="btn btn-danger">Дуу, Контент</span>
                        @break

                    @default
                        <span class="btn btn-warning">Манга</span>
                @endswitch
                    </option>
                    <option value="1">Цуврал анимэ</option>
                    <option value="2">Кино</option>
                    <option value="3">Дуу хөгжим</option>
                    <option value="4">Манга</option>
                    </select>
                    @error('method')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

            </div>

            <div class="form-group row">
                <label for="info" class="col-md-4 col-form-label text-md-right">{{ __('info') }}</label>

                    <textarea row="50" id="info" type="text" class="form-control @error('info') is-invalid @enderror" name="info" value="{{ old('info') ?? $post->info }}" required autocomplete="info"  autofocus>Тун удахгүй...</textarea>
                    @error('info')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

            </div>


            <div class="row">
                <label for="image" class="col-md-4 col-form-label">Зураг оруулах</label>
                <input type="file" class="form-control-file" id="image" name="image" value="{{ old('image') ?? $post->image }}">

                @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            </div>
            <div class="row pt-4">
                <button type="submit" class="btn btn-primary">Нэмэх</button>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection
