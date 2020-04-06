@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h1 text-center mb-3 w-100">{{$novel->title}}</h1>
    <div class="bg-light p-2 rounded text-dark novel-content">
        <?=$novel->content?>
        <div class="row">
            <div class="col-md-6">
                <button class="w-100 btn btn-success" disabled="disabled"><i class="fa fa-heart"></i> Таалагдлаа</button>
            </div>
            <div class="col-md-6">
                <button class="w-100 btn btn-warning" disabled="disabled"><i class="fa fa-archive"></i> Хадгалах</button>
            </div>
        </div>
    </div>
    <h5 class="text-right mt-3"><i>Anizet - Infinity Imagination</i></h5>
</div>

@endsection
