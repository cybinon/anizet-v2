@extends('layouts.app')

@section('content')


<!-- Modal -->
<div class="modal fade bd-example-modal-sm" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabel">Уучлаарай, Тухайн үйлдэл идэвхигүй байна. Та хөгжүүлэгчтэй холбогдоно уу.</h5>
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
<div class="container">
    <div class="row">
        @foreach ($user->posts as $post)
        <div class="col-3 mt-3">
            <div class="card">
                <div class="card-header">
                    <h2>{{$post->caption}}</h2>
                     @guest
                          @if (Route::has('register'))
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li> --}}
                            @endif
                            @else @if (Auth::user()->status == 1)

                            <a href="/p/{{$post->id}}/edit" class="badge badge-primary"><i class="fa fa-pencil"></i></a>
                            <a href="/p/{{$post->id}}" class="badge badge-primary"><i class="fa fa-eye"></i></a>
                            <a id="myLink" value="{{$post->id}}" class="badge badge-danger" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash"></i></a>
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
</div>

@endsection
