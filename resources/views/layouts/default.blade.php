<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', '办公OA系统') - Laravel 测试</title>
    <link rel="stylesheet" href="./css/app.css">
	<link rel="stylesheet" href="../css/app.css">
	<link rel="stylesheet" href="../../css/app.css">
	<link rel="stylesheet" href="../../../css/app.css">
  </head>
  <body>
    @include('layouts._header')

    <div class="container">
      <div class="offset-md-1 col-md-10">
	    @include('shared._messages')
        @yield('content')
        @include('layouts._footer')
      </div>
	</div>
  <script src="./js/app.js"></script>
  <script src="../js/app.js"></script>
  <script src="../../js/app.js"></script>	
  <script src="../../../js/app.js"></script>	
  </body>
</html>
