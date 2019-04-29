<div class="card ">
  <div class="card-body">
    右边导航栏
    <ul class="navbar-nav">
        <li class="nav-item <?php echo e(active_class(if_route('topics.index')), false); ?>"><a class="nav-link" href="<?php echo e(route('topics.index'), false); ?>">首页</a></li>
        <li class="nav-item <?php echo e(category_nav_active(1), false); ?>"><a class="nav-link" href="<?php echo e(route('categories.show', 1), false); ?>">任职公示</a></li>
        <li class="nav-item <?php echo e(category_nav_active(2), false); ?>"><a class="nav-link" href="<?php echo e(route('categories.show', 2), false); ?>">节假公告</a></li>
        <li class="nav-item <?php echo e(category_nav_active(3), false); ?>"><a class="nav-link" href="<?php echo e(route('categories.show', 3), false); ?>">事件进程</a></li>
        <li class="nav-item <?php echo e(category_nav_active(4), false); ?>"><a class="nav-link" href="<?php echo e(route('categories.show', 4), false); ?>">公告</a></li>
      </ul>
  </div>
</div>


<div class="card ">
  <div class="card-body">
    <a href="<?php echo e(route('topics.create', array('is_admin'=> Auth::check() ? Auth::user()->is_admin : 0)), false); ?>" class="btn btn-primary btn-block" aria-label="Left Align">
      <i class="fas fa-pencil-alt mr-2"></i>  发布公告
    </a>
  </div>
</div>
