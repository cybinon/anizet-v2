@extends('layouts.app')

@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content text-dark">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">Хөгжүүлэлтийн шатанд явагдаж байна</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="alert alert-warning">Хэрэглэгчийн хэсэг хөгжүүлэлтийн шатанд явагдаж байгаа тул зарим хэсэг ажиллахгүй байгаа! Танд баярлалаа!</p>
      <p class="alert alert-success">Хэрэв та манай багт хандив өгөх гэж байгаа бол <span class="text-primary">гүйлгээний утга дээр өөрийн хэрэглэгчийн дугаар болох <span class="font-weight-bold text-dark">{{Auth::user()->id}}</span> дугаарыг оруулаарай!</span>
            <br><span class="font-weight-bold text-dark"> Хаан банк: 5005748909 - Тэмүүжин</span>

        </p>
        <span class="font-italic"><u>AniZet - Хязгаар үгүй төсөөлөл</u></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Ойлголоо</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ads" tabindex="-1" role="dialog" aria-labelledby="adsLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content text-dark">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="adsLabel">Хөгжүүлэлтийн шатанд явагдаж байна</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="alert alert-warning">Манай багт дэмжилэг үзүүлэх гэсэн таньд баярлалаа. Гэвч бид энэ хэсэгт засвар хийж байгаа учир ажиллахгүй.</p>


        </p>
        <span class="font-italic"><u>AniZet - Хязгаар үгүй төсөөлөл</u></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Ойлголоо</button>
      </div>
    </div>
  </div>
</div>

@if(Auth::user()->status < 1)
<!-- Modal -->
<div class="modal fade bd-example-modal-sm" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="deleteLabel">Уучлаарай, Тухайн үйлдэл идэвхигүй байна. Та хөгжүүлэгчтэй холбогдоно уу.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-footer">
        <a href="/p//delete" type="button" class="btn btn-danger disabled">Устгах</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Болих</button>
      </div>
    </div>
  </div>
</div>
@endif
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-3">
            <div>
                <img class="border rounded-circle" src="https://pbs.twimg.com/profile_images/731462042662494208/lhxjirl-_400x400.jpg" alt="user-gintoki"><br>
                <h2 class="text-center">{{$user->username}}</h2>
                <p class="text-center h5 bg-primary border rounded"><span class="font-weight-bold">ID:</span> #{{$user->id}}</p>
                <hr>
            </div>
        </div>
        <div class="col uk-overlay uk-overlay-default text-dark border rounded">
            <div class="row">

                <hr>
                <div class="col text-center">
                    @if ($user->id == Auth::user()->id)
                    <p><span class="font-weight-bold">PHT Phoneum:</span> --</p>
                    <hr>
                    @endif
                    <p><span class="font-weight-bold">Үзүүлэлт:</span> --</p>
                    <hr>
                    <p><span class="font-weight-bold">Зэрэглэл:</span> --</p>
                    <hr>
                    <p><span class="font-weight-bold">Авсан тоглоом:</span> --</p>

                </div>
            </div>
            @if ($user->id == Auth::user()->id)
<hr>
            <div class="row justify-content-end">
                    <div class="col">
                        <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-success w-100"><i class="fa fa-heart"></i> Хандив өгөх</button>
                    </div>
                    <div class="col">
                        <a href="/ads" class="btn btn-warning w-100"><i class="fa fa-heart"></i> ADS Хандив</a>
                    </div>

                </div>
            @endif

        </div>
    </div>
<hr>



@if ($user->status == 1)
<h2 class="text-center">Зохиол оруулах</h2>
<form action="#">
    <input type="text" class="w-100 border rounded bg-light mb-3" name="" placeholder="Гарчиг">
    <textarea name="" class="w-100 border rounded bg-light" rows="20" placeholder="Хязгааргүй төсөөл..."></textarea>

    <button class="btn btn-primary"><i class="fa fa-arrow-right"></i> Нийтлэх</button>
</form>
<h2 class="text-center">Орчуулсан анимэ</h2>
<div class="row">
    @foreach ($user->posts as $post)
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header">
                    <h2>{{$post->caption}}</h2>
                    @guest
                    @if (Route::has('register'))
                                @endif
                                @else

                                @if (Auth::user()->status == 1)

                                <a href="/p/{{$post->id}}/edit" class="badge badge-primary"><i class="fa fa-pencil"></i></a>
                                <a href="/p/{{$post->id}}" class="badge badge-primary"><i class="fa fa-eye"></i></a>
                                <a id="myLink" value="{{$post->id}}" class="badge badge-danger" data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i></a>
                            @endif

                            @endguest

                        </div>
                        <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <img src="/storage/{{$post->image}}" class="w-100">
                </div>
            </div>
        </div>
        @endforeach

    </div>
    @endif
</div>
<script>
    $(document).ready(function(){
       // $('#exampleModal').modal('show');
    });
</script>

@endsection
