@extends('layouts.app')
{{-- Head, Title, Script--}}
@section('head-script')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
@endsection
{{-- Content --}}

{{-- Nav --}}
@section('nav')

@endsection
@section('content')
<div class="container">

    <h3 align="center">AniZET - Анимэ контент оруулах</h3>

    <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Туршилтын хувилбар</h3>
                </div>
                <div class="panel-body">

                    <form method="post" action="{{ route('upload') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3" align="right"><h4>Видео оруулах</h4></div>
                            <div class="col-md-6">
                                <input type="file" name="file" id="file" />
                            </div>
                            <div class="col-md-3">
                                <input type="submit" name="upload" value="Эхлэх" class="btn btn-success" />
                            </div>
                        </div>
                    </form>

                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow=""
                        aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                        0%
                    </div>
                </div>

                <div id="success">

                </div>

            </div>
        </div>
    </div>

    @endsection

@section('end-script')

<script>
    $(document).ready(function(){

        $('form').ajaxForm({
      beforeSend:function(){
          $('#success').empty();
        },
      uploadProgress:function(event, position, total, percentComplete)
      {
          $('.progress-bar').text(percentComplete + '%');
          $('.progress-bar').css('width', percentComplete + '%');
        },
      success:function(data)
      {
          if(data.errors)
        {
          $('.progress-bar').text('0%');
          $('.progress-bar').css('width', '0%');
          $('#success').html('<span class="text-danger"><b>'+data.errors+'</b></span>');
        }
        if(data.success)
        {
            $('.progress-bar').text('Uploaded');
            $('.progress-bar').css('width', '100%');
            $('#success').html('<span class="text-success"><b>'+data.success+'</b></span><br /><br />');
            $('#success').append(data.direct);
            $('#success').append(data.video);
        }
    }
    });

});
</script>


@endsection
