@extends('sessions.login')
@section('title', '用户登录')
@section('content')
<div class="container" >
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Login') }}</div>
        <div class="card-body">
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="captcha" class="col-md-4 col-form-label text-md-right">验证码</label>

              <div class="col-md-6">
                <input id="captcha" class="form-control{{ $errors->has('captcha') ? ' is-invalid' : '' }}" name="captcha" required>

                <img class="thumbnail captcha mt-3 mb-2" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">

                @if ($errors->has('captcha'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('captcha') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="exampleCheck1" class="col-md-4"></label>
              <div class="col-md-2">
                <input type="checkbox" class="form-check-input" name="remember" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">记住我</label>
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-3">
                <button type="submit" class="btn btn-primary btn-block">
                  {{ __('Login') }}
                </button>            
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@stop