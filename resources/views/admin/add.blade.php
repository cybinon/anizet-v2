@extends('layouts.app')

@section('content')
<div class="container">

    <div class="w-50 mx-auto">
        <a class="btn btn-primary w-100" target="_blank" href="https://pack.anizet.net">Видео оруулах</a>

        <form action="/admin/vstore" method="POST" enctype="multipart/form-data">
            @csrf
            <input name="season_id" type="hidden" value="{{$season->id}}">
            <div class="form-group">
                <label for="file_id">Контент дугаар</label>
                <input type="number" name="file_id" class="form-control" id="file_id" >
                <small id="emailHelp" class="form-text text-muted">Видео оруулах гэсэн товч дээр дарж Контент дугаар авна</small>
            </div>

            <div class="form-group">
                <label for="episode_caption">Анги товчлол</label>
                <input type="text" name="episode_caption" class="form-control" id="episode_caption" >
                <small id="emailHelp" class="form-text text-muted">Үсээ шар болгосон нь</small>
            </div>
            <div class="form-group">
                <label for="episode_number">Анги дугаар</label>
                <input type="number" name="episode_number" class="form-control" id="episode_number" >
                <small id="emailHelp" class="form-text text-muted">1-12, 1, 2, 3 ...</small>
            </div>
            <div class="form-group">
                <label for="next_episode">Дараагийн Анги</label>
                <input type="number" name="next_episode" class="form-control" id="next_episode" >
                <small id="emailHelp" class="form-text text-muted">1-12, 1, 2, 3 ...</small>
            </div>
            <div class="form-group">
                <label for="previous_episode">Өмнөх анги</label>
                <input type="number" name="previous_episode" class="form-control" id="previous_episode" >
                <small id="emailHelp" class="form-text text-muted">1-12, 1, 2, 3 ...</small>
            </div>


            <div class="form-group">
                <label for="starting_opening">Эхлэл дуу эхлэх цаг [Opening]</label>
                <input type="number" name="starting_opening" class="form-control" id="starting_opening" >
                <small id="emailHelp" class="form-text text-muted">Эхлэл эхлэх секунд</small>
            </div>

            <div class="form-group">
                <label for="duration_opening">Эхлэл үргэжлэх хугацаа [Opening second]</label>
                <input type="number" name="duration_opening" class="form-control" id="duration_opening" >
                <small id="emailHelp" class="form-text text-muted">Эхлэл үргэжлэх хугацааг секунд тооцож оруулна</small>
            </div>

            <div class="form-group">
                <label for="starting_ending">Төгсгөлийн дуу эхлэх цаг [Ending]</label>
                <input type="number" name="starting_ending" class="form-control" id="starting_ending" >
                <small id="emailHelp" class="form-text text-muted"></small>
            </div>

            <div class="form-group">
                <label for="duration_ending">Төгсгөлийн дуу үргэжлэх хугацаа [Ending second]</label>
                <input type="number" name="duration_ending" class="form-control" id="duration_ending" >
                <small id="emailHelp" class="form-text text-muted">Дуусах хугацааг 30сек гэж оруулж болно</small>
            </div>

            <div class="form-group">
                <label for="starting_addition">Нэмэлт хэсэг эхлэл</label>
                <input type="number" name="starting_addition" class="form-control" id="starting_addition" >
                <small id="emailHelp" class="form-text text-muted">Нэмэлт хэсэг байхгүй бол алгасна</small>
            </div>

            <div class="form-group">
                <label for="duration_addition">Нэмэлт хэсэг хугацаа</label>
                <input type="number" name="duration_addition" class="form-control" id="duration_addition" >
                <small id="emailHelp" class="form-text text-muted">Нэмэлт хэсэг байхгүй бол алгасна</small>
            </div>


             <button type="submit" class="w-100 btn btn-primary">Үзвэр нэмэх</button>

        </form>
    </div>

</div>

@endsection
