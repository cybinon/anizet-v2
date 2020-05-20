@extends('layouts.app')

@section('content')
    <div class="container">
        <ul>

            @foreach($animes as $anime)
            @if ($anime->seasons != "[]")

            {{-- <li>
                ID: {{$anime->id}}
            </li>
            <li>
                Англи нэр:
            </li>
            <li>
                Монгол нэр: {{$anime->caption_mn}}
            </li>
            <li>
                Япон нэр: {{$anime->caption_kanji}}
            </li>
            <li>
                Насны хязгаар: {{$anime->rating}}
            </li> --}}
            <li>
                <ul>
                    @foreach ($anime->seasons as $item)

                    {{-- <li>
                        Улирал: {{$item->number}}
                    </li>
                    <li>
                        Улиралын нэр: {{$item->name}}
                    </li>
                    <li>
                        Зураг: <img src="{{$item->image_width}}" alt="{{$item->id}}">
                    </li> --}}
                    <div class="media">

                        <img src="{{$item->image_width}}" alt="{{$item->id}}" class="align-self-center mr-3">
                        <div class="media-body">
                            <h5 class="mt-0">{{$anime->caption_en}}</h5>
                            <p>{{$anime->rating}}</p>
                            <p class="mb-0"></p>
                        </div>
                    </div>

                    @endforeach
                </ul>
            </li>

            <hr>
            @endif
            @endforeach
        </ul>
    </div>
@endsection
