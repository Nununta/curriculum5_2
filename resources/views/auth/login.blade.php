@extends('layouts.login_header')

@section('content')
    <div class="container">
        <div class="login-body">
            <h1><img style="width:70px; padding-right:20px;" src="img/calender.png" alt="カレンダー">タスク管理アプリにログイン</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('languages.E-Mail Address') }}</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('languages.Password') }}</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0 login-btn-area">
                    <button type="submit" class="login-btn">
                        {{ __('languages.Login') }}
                    </button>
                </div>

                <div class="form-group row login-btn-area">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('languages.Remember Me') }}
                        </label>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection