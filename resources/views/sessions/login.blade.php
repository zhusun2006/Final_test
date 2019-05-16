<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', '用户登录')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  </head>
  <body>
    @include('layouts._header')
    @if (Auth::check())
      @include('layouts._sider')
    @else
    @endif
    @include('shared._messages')
    <div class="main">
      <div class="jumbotron" style="height: 810px;">
        <h1>基于PHP的办公自动化系统</h1>
        <div class="login" style="width:45%;float: right;">
            @yield('content')
        </div>
        <p class="lead">
          这是基于<a href="https://laravel-china.org">Laravel框架</a>搭建的PHP办公自动化系统。
        </p>
        <p>
          欢迎使用本办公自动化系统
        </p>
      </div>
    </div>
    @include('layouts._footer')
</html>
<script src="{{ mix('js/app.js') }}"></script>