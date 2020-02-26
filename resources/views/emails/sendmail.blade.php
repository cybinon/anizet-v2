<!DOCTYPE html>
<html>
<head>
    <title>Anizet Видео алдаа</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <h3>Видео дугаар:{{ url('/v/'.$details['content_id']) }}<a href="{{ url('/v/'.$details['content_id']) }}"> ---- Анги шалгах</a></h3>
    <p><span class="font-weight-bold">Тайлбар:</span> {{ $details['explain'] }}</p>
    <p><span class="font-weight-bold">Мэдээлэл хүргэсэн:</span> {{ $details['email'] }}</p>
</body>
</html>
