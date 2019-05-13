<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', '办公OA系统') - Laravel 测试</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

  </head>
  <body>
    @include('layouts._header')
    <div class="main">
    <div class="container">
      <div class="offset-md-1 col-md-10">
        @if (Auth::check())
        <div class="mainsider">
          <div class="col-lg-10 col-md-3 sidebar">
              <div style="font-size: 24px;color:white;">快捷功能</div>
                <ul class="navbar-nav">        
                  <li class="nav-item "><a href="{{ route('users.show', Auth::user()) }}">个人中心</a></li>
                  <li class="nav-item "><a href="{{ route('users.edit', Auth::user()) }}">编辑资料</a></li>
                  <li class="nav-item "><a href="{{ route('apply', Auth::user()) }}">申请审核</a></li>
                  <li class="nav-item "><a href="{{ route('thread', Auth::user()) }}">我的申请</a></li>
                  @if(Auth::user()->is_admin == 1)
                    <li class="nav-item "><a href="{{ route('inform', Auth::user()) }}">特权通告</a></li>
                  @else
                  @endif
                </ul>
          </div>
        </div>
      @else
      @endif
	      @include('shared._messages')
        @yield('content')
      </div>
	  </div>
    </div>
    @include('layouts._footer')
  <script src="{{ mix('js/app.js') }}"></script>
  
  </body>
</html>
