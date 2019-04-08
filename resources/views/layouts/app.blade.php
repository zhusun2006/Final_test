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

  <div class="container">
    @if(session('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      {{@session('message')}}
    </div>
    @endif

    @yield('header')
    @yield('content')
  </div>

  <!-- Scripts -->

  <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
