@extends('layouts.app')

@section('content')

<div class="container">
    <form action="/n" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="form-group row">
                    <label for="title" class="col-md-4 h4 text-md-right">Гарчиг</label>

                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>


                <div class="form-group row">
                    <label for="content" class="col-md-4 h4 text-md-right">Бичиглэл</label>
                         @trix(\App\Novel::class, 'content',  [ 'hideButtonIcons' => ['attach','code'] ])

                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>
                <div class="form-group row">
                    <label for="content" class="col-md-4 h4 text-md-right">Бичиглэл</label>
                        <select id="status" type="text" class="form-control @error('status') is-invalid @enderror" name="status" required autocomplete="status" autofocus>
                            <option value="0">Нийтэд харагдахгүй</option>
                            <option value="1">Нийтэд харагдах</option>
                        </select>
                        @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>

                <input type="submit">

        </div>



    </form>
</div>



@endsection
