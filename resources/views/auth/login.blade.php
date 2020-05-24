@extends('layouts.app')

@section('content')
<div class="container" style="background-color: rgba(0,0,0,0.6); height:100vh">
        <div style="margin:20% auto 0 auto;">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row justify-content-center">
                            <div class="col-md-5">
                                <label for="email" class="text-white font-weight-bold">Цахим хаяг</label>
                                <input placeholder="user@email.com" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-5">
                                <label for="password" class="form-label text-center text-white font-weight-bold">Нууц үг</label>
                                <input placeholder="******" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label font-weight-bold text-white" for="remember" style="font-size:18px">
                                        Нэвтрэл хадгалах
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success font-weight-bold" style="font-size: 18px">
                                    {{ __('Нэвтрэх') }}
                                </button>
                                <a class="btn btn-link text-white font-weight-bold" href="{{ route('register') }}">
                                        Бүртгүүлэх
                                    </a>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-white font-weight-bold" href="{{ route('password.request') }}">
                                        Нууц үг мартсан уу?
                                    </a>
                                @endif
                            </div>

                        </div>
                    </form>
        </div>
</div>
@endsection
@section('body')
<body style="background-image: url(https://wallpaperaccess.com/full/44729.jpg); height:100vh">
@endsection
