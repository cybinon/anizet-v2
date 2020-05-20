@extends('layouts.app')

@section('content')
<div class="container">

    <div class="w-50 mx-auto">
        <a class="btn btn-primary w-100" target="_blank" href="http://localhost:8000">Видео оруулах</a>

        <form action="/admin/store" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="caption_mn">Контент дугаар</label>
                <input type="number" name="caption_mn" class="form-control" id="caption_mn" >
                <small id="emailHelp" class="form-text text-muted">Видео оруулах гэсэн товч дээр дарж Контент дугаар авна</small>
            </div>

            <div class="form-group">
                <label for="caption_mn">Эхлэл дуу эхлэх цаг [Opening]</label>
                <input type="number" name="caption_mn" class="form-control" id="caption_mn" >
                <small id="emailHelp" class="form-text text-muted">Эхлэл эхлэх секунд</small>
            </div>

            <div class="form-group">
                <label for="caption_en">Эхлэл үргэжлэх хугацаа [Opening second]</label>
                <input type="number" name="caption_en" class="form-control" id="caption_en" >
                <small id="emailHelp" class="form-text text-muted">Эхлэл үргэжлэх хугацааг секунд тооцож оруулна</small>
            </div>

            <div class="form-group">
                <label for="caption_kanji">Төгсгөлийн дуу эхлэх цаг [Ending]</label>
                <input type="number" name="caption_kanji" class="form-control" id="caption_kanji" >
                <small id="emailHelp" class="form-text text-muted"></small>
            </div>

            <div class="form-group">
                <label for="caption_kanji">Төгсгөлийн дуу үргэжлэх хугацаа [Ending second]</label>
                <input type="number" name="caption_kanji" class="form-control" id="caption_kanji" >
                <small id="emailHelp" class="form-text text-muted">Дуусах хугацааг 30сек гэж оруулж болно</small>
            </div>

            <div class="form-group">
                <label for="caption_kanji">Нэмэлт хэсэг эхлэл</label>
                <input type="number" name="caption_kanji" class="form-control" id="caption_kanji" >
                <small id="emailHelp" class="form-text text-muted">Нэмэлт хэсэг байхгүй бол алгасна</small>
            </div>

            <div class="form-group">
                <label for="caption_kanji">Нэмэлт хэсэг хугацаа</label>
                <input type="number" name="caption_kanji" class="form-control" id="caption_kanji" >
                <small id="emailHelp" class="form-text text-muted">Нэмэлт хэсэг байхгүй бол алгасна</small>
            </div>


             <button type="submit" class="w-100 btn btn-primary">Үзвэр нэмэх</button>

        </form>
    </div>

</div>

@endsection
