<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">

  <title>@yield('title', '办公OA系统') - Laravel 测试</title>

  <!-- META TAGs -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">

  <!-- CSS -->
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
  @include('layouts._header')
  @if (Auth::check())
    @include('layouts._sider')
  @else
  @endif
  <div class="main">
    <div class="container">
      @include('shared._messages')
      @yield('content')
    </div>
  </div>
  @include('layouts._footer')
  <!-- Scripts -->
</body>
</html>
<script src="{{ mix('js/app.js') }}"></script>