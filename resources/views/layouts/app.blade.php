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
        <div class="mainsider">
          <div class="siderbar">
          <div class="col-lg-10 col-md-3">
              <div style="font-size: 24px;color:white;">快捷功能</div>
                <ul class="navbar-nav">        
                  <li class="nav-item "><a style='color:white;width:100%;' href="{{ route('users.show', Auth::user()) }}">个人中心</a></li>
                  <li class="nav-item "><a style='color:white;width:100%;'href="{{ route('users.edit', Auth::user()) }}">编辑资料</a></li>
                  <li class="nav-item "><a style='color:white;width:100%;'href="{{ route('apply', Auth::user()) }}">申请审核</a></li>
                  <li class="nav-item "><a style='color:white;width:100%;'href="{{ route('thread', Auth::user()) }}">我的申请</a></li>
                  @if(Auth::user()->is_admin == 1)
                    <li class="nav-item "><a style='color:white;width:100%;'href="{{ route('inform', Auth::user()) }}">特权通告</a></li>
                  @else
                  @endif
                </ul>
          </div>
        </div>
        </div>
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