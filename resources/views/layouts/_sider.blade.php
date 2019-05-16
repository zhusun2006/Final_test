<div class="mainsider">
    <div class="siderbar">
      <div class="col-lg-10 col-md-3">
          <div style="font-size: 24px;color:white;">快捷功能</div>
            <ul class="navbar-nav">        
              <li class="nav-item "><a style='color:white;width:100%;'href="{{ route('users.edit', Auth::user()) }}">编辑资料</a></li>
              <li class="nav-item dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" style='color:white;width:100%;'>事物申请<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="{{ route('apply', Auth::user()) }}">新的申请</a></li>
                      <li><a href="{{ route('thread', Auth::user()) }}">我的申请</a></li>
                  </ul>
              </li>
              <li class="nav-item "><a style='color:white;width:100%;'href="{{ route('topics.index') }}">查看公告</a></li>
              @if(Auth::user()->is_admin == 1)
                <li class="nav-item "><a style='color:white;width:100%;'href="{{ route('inform', Auth::user()) }}">个人私信</a></li>
              @else
              @endif
            </ul>
      </div>
  </div>
</div>