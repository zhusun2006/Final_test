<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', '办公OA系统') - Laravel 测试</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

  </head>
  <body>
    @include('layouts._header')

    <div class="container">
      <div class="offset-md-1 col-md-10">
	      @include('shared._messages')
        @yield('content')
      </div>
	  </div>
  @include('layouts._footer')
  <script src="{{ mix('js/app.js') }}"></script>
  
  </body>
</html>
