@extends('layouts.app')

@section('content')
<div class="container" style="background-color: rgba(0,0,0,0.6); height:100vh">
        <div style="margin:10% auto 0 auto;">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row justify-content-center">


                            <div class="col-md-6">
                                <label for="username" class="text-white font-weight-bold">Хэрэглэгчийн нэр</label>
                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">


                            <div class="col-md-6">
                                 <label for="email" class="text-white font-weight-bold">Цахим хаяг</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row justify-content-center">


                            <div class="col-md-6">
                                <label for="password" class="text-white font-weight-bold">Нууц үг</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">


                            <div class="col-md-6">
                                <label for="password-confirm" class="text-white font-weight-bold">Нууц үг давтах</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mb-0">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary w-100 font-weight-bold">
                                    Бүртгүүлэх
                                </button>
                            </div>
                        </div>
                    </form>


    </div>
</div>
@endsection
@section('body')
<body style="background-image: url(https://wallpaperaccess.com/full/44729.jpg); height:100vh">
@endsection
