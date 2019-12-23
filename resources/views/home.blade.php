@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$user->name}}</div>

                <a href="#">Анимэ нэмэх</a>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{$user->username}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
