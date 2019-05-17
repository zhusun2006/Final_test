<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', '办公自动化系统') - Laravel</title>
    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>
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
        <div class="offset-md-1 col-md-10">
  	      @include('shared._messages')
          @yield('content')
        </div>
  	  </div>
    </div>
    @include('layouts._footer')
  </body>
</html>



