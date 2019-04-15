<div class="card ">
  <div class="card-body">
    右边导航栏
    <ul class="navbar-nav">
        <li class="nav-item {{ active_class(if_route('topics.index')) }}"><a class="nav-link" href="{{ route('topics.index') }}">首页</a></li>
        <li class="nav-item {{ category_nav_active(1) }}"><a class="nav-link" href="{{ route('categories.show', 1) }}">任职公示</a></li>
        <li class="nav-item {{ category_nav_active(2) }}"><a class="nav-link" href="{{ route('categories.show', 2) }}">节假公告</a></li>
        <li class="nav-item {{ category_nav_active(3) }}"><a class="nav-link" href="{{ route('categories.show', 3) }}">事件进程</a></li>
        <li class="nav-item {{ category_nav_active(4) }}"><a class="nav-link" href="{{ route('categories.show', 4) }}">公告</a></li>
      </ul>
  </div>
</div>


<div class="card ">
  <div class="card-body">
    <a href="{{ route('topics.create', array('is_admin'=>Auth::user()->is_admin)) }}" class="btn btn-success btn-block" aria-label="Left Align">
      <i class="fas fa-pencil-alt mr-2"></i>  发布公告
    </a>
  </div>
</div>
