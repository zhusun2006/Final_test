<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div>
    <a class="navbar-brand" style="color: #fff;">欢迎使用基于PHP的办公自动化系统</a>
  </div>
  <div class="container">
    <div>
    </div>
    <ul class="navbar-nav justify-content-end">
      @if (Auth::check())
        <li class="nav-item notification-badge">
          <a class="nav-link mr-3 badge badge-pill badge-{{ Auth::user()->notification_count > 0 ? 'hint' : 'secondary' }} text-white" href="{{ route('notice') }}">
            {{ Auth::user()->notification_count }}
          </a>
        </li>
        <li class="nav-item dropdown">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('users.show', Auth::user()) }}">个人中心</a>
            <a class="dropdown-item" href="{{ route('users.edit', Auth::user()) }}">编辑资料</a>
      			<a class="dropdown-item" href="{{ route('apply', Auth::user()) }}">事务申请</a>
      			<a class="dropdown-item" href="{{ route('thread', Auth::user()) }}">我的申请</a>
            <a class="dropdown-item" href="{{ route('users.index', Auth::user()) }}">用户列表</a>
            @if(Auth::user()->is_admin == 1)
              <a class="dropdown-item" href="{{ route('inform', Auth::user()) }}">特权通告</a>
            @else
            @endif
          </div>
        </li>
        <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button class="btn nav-link" type="submit" name="button">退出</button>
                </form>
        </li>
      @else
        <li class="nav-item"><a class="nav-link" href="{{ route('help') }}">帮助</a></li>
        <li class="nav-item" ><a class="nav-link" href="{{ route('login') }}">登录</a></li>
      @endif
    </ul>
  </div>
</nav>