<div class="mainsider">
    <div class="siderbar">
      <div class="col-lg-10 col-md-3">
          <div style="font-size: 24px;color:white;">快捷功能</div>
            <ul class="navbar-nav">        
              <li class="nav-item "><a style='color:white;width:100%;'href=""></a></li>
              <li class="nav-item dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" style='color:white;width:100%;'>个人中心<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('users.show', Auth::user()) }}">个人信息</a></li>
                      <li><a class="dropdown-item" href="{{ route('users.edit', Auth::user()) }}">信息修改</a></li>
                  </ul>
              </li>
              <li class="nav-item dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" style='color:white;width:100%;'>事物申请<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('apply', Auth::user()) }}">新的申请</a></li>
                      <li><a class="dropdown-item" href="{{ route('thread', Auth::user()) }}">我的申请</a></li>
                  </ul>
              </li>
              <li class="nav-item dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" style='color:white;width:100%;'>公告事物<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('topics.index') }}">查看公告</a></li>
                      @if(Auth::user()->is_admin == 1)
                      <li><a class="dropdown-item" href="{{ route('topics.create', array('is_admin'=> Auth::check() ? Auth::user()->is_admin : 0)) }}">发布公告</a></li>
                      @else
                      @endif
                  </ul>
              </li>
              @if(Auth::user()->is_admin == 1)
                <li class="nav-item dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" style='color:white;width:100%;'>权限操作<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('inform', Auth::user()) }}">个人私信</a></li>
                      <li><a class="dropdown-item" href="{{ route('users.index', Auth::user()) }}">用户查阅</a></li>
                      <li><a class="dropdown-item" href="{{ route('adduser') }}" >添加用户</a></li>
                  </ul>
              </li>
              @else
              @endif
            </ul>
      </div>
  </div>
</div>