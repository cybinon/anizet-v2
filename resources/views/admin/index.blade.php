@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($animes as $anime)
                @if ($anime->seasons != "[]")
                    @foreach ($anime->seasons as $item)
                    <div class="col-md-3">
                        <div class="card w-100">
                        <img style="text-indent:-9999px; height:300px; background-image: url('https://images.unsplash.com/photo-1579546929518-9e396f3cc809?ixlib=rb-1.2.1&w=1000&q=80')" class="card-img-top" src="https://anizet.net/{{$item->image_width}}" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title">{{$anime->caption_en}}</h5>
                            <p style="height:120px; overflow:hidden" class="card-text">{{$item->description}}</p>
                                <div class="row">
                                    <a href="/admin/edit/season/{{$item->id}}" class="col mr-1 text-white btn btn-primary"><i class="fas fa-edit"></i></a>
                                    <a href="/admin/add/{{$item->id}}" class="col mr-1 text-white btn btn-success"><i class="fas fa-plus"></i></a>
                                    <a href="#" class="col mr-1 text-white btn btn-danger"><i class="fas fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                @endif
            @endforeach
        </div>
    </div>
@endsection
