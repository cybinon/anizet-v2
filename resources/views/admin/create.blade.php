@extends('layouts.app')

@section('content')
<div class="container">

    <div class="w-50 mx-auto">

        <form action="/admin/store" method="POST" enctype="multipart/form-data">
            @error('image_height')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            @error('image_width')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
             @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            @csrf
            <div class="form-group">
                <label for="caption_mn">Анимэ нэр [Монгол хэл дээр]</label>
                <input type="text" name="caption_mn" class="form-control" id="caption_mn" >
                <small id="emailHelp" class="form-text text-muted">Гинтама, Дөрвөн сар дахь чиний худал</small>
            </div>

            <div class="form-group">
                <label for="caption_en">Анимэ нэр [Англи хэл дээр]</label>
                <input type="text" name="caption_en" class="form-control" id="caption_en" >
                <small id="emailHelp" class="form-text text-muted">Gintama, Your lie in April</small>
            </div>

            <div class="form-group">
                <label for="caption_kanji">Анимэ нэр [Япон галиг болон ханз]</label>
                <input type="text" name="caption_kanji" class="form-control" id="caption_kanji" >
                <small id="emailHelp" class="form-text text-muted">銀魂, Gintama / 四月は君の嘘, Shigatsu wa Kimi no Uso</small>
            </div>

            <div class="form-group">
                <label for="rating">Насны хязгаар</label>
                <select class="form-control" name="rating" id="rating">
                    @foreach ($rating as $item)
                    <option value="{{$item->id}}">{{$item->symbol}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="category">Төрөл сонгох</label>
                @foreach ($category as $item)
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="category[]" value="{{$item->id}}" id="customCheck{{$item->id}}">
                    <label class="custom-control-label" for="customCheck{{$item->id}}">{{$item->caption_mn}}, {{$item->caption_en}},</label>
                </div>
                @endforeach
            </div>
<hr>
<h1>Бүлэг нэмэх</h1>
            <div class="form-group">
                <label for="number">Бүлэг дугаар</label>
                <input type="number" name="number" class="form-control" id="number" >
                <small id="emailHelp" class="form-text text-muted">1, 2, 3, 0</small>
            </div>

            <div class="form-group">
                <label for="name">Бүлэг нэр</label>
                <input type="text" name="name" class="form-control" id="name" >
                <small id="emailHelp" class="form-text text-muted">Silver Soul Arc, Love Posion гэх мэт...</small>
            </div>

            <div class="form-group">
                <label for="description">Бүлэг товч агуулга</label>
                <input type="text" name="description" class="form-control" id="description" >
                <small id="emailHelp" class="form-text text-muted">2 жилийн дараах Ёрозүяа эргэн уулзжээ</small>
            </div>

            <div class="form-group">
                <label for="status">Төлөв</label>
                <select class="form-control" name="status" id="status">
                    <option value="1">Гарч байгаа</option>
                    <option value="2">Гарч дууссан</option>
                    <option value="3">Төлөвлөгдсөн</option>
                </select>
            </div>

            <div class="form-group">
                <label for="episodes">Нийт анги</label>
                <input type="number" name="episodes" class="form-control" id="episodes" >
                <small id="emailHelp" class="form-text text-muted">12, 13, 51</small>
            </div>

            <div class="form-group">
                <label for="trailer">Танилцуулга Видео</label>
                <input type="text" name="trailer" class="form-control" id="trailer" >
                <small id="emailHelp" class="form-text text-muted">https://www.youtube.com/watch?v=nSNQ_Qh9Pss</small>
            </div>

            <div class="form-group">
                <label for="height">Урт зураг [225x315]</label>
                <div class="custom-file">
                <input type="file" name="height" class="form-control" id="height">

                </div>
            </div>

            <div class="form-group">
                <label for="width">Өргөн зураг [720p resolution 1280x720]</label>
                <input type="file" name="width" class="form-control" id="width" >
            </div>


            <button type="submit" class="w-100 btn btn-primary">Дараагийн хэсэгт шилжих</button>
        </form>
    </div>

</div>

@endsection
