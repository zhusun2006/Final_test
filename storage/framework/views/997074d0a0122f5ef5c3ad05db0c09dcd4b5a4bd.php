<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <div>
      <a class="navbar-brand" href="<?php echo e(route('home'), false); ?>">办公OA系统</a>
      <a class="navbar-brand" href="<?php echo e(route('topics.index'), false); ?>">查看公告</a>
    </div>
    <ul class="navbar-nav justify-content-end">
      <?php if(Auth::check()): ?>
        <li class="nav-item notification-badge">
          <a class="nav-link mr-3 badge badge-pill badge-<?php echo e(Auth::user()->notification_count > 0 ? 'hint' : 'secondary', false); ?> text-white" href="<?php echo e(route('notice'), false); ?>">
            <?php echo e(Auth::user()->notification_count, false); ?>

          </a>
        </li>
        <li class="nav-item dropdown">
        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('users.index', Auth::user()), false); ?>">用户列表</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo e(Auth::user()->name, false); ?>

          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php echo e(route('users.show', Auth::user()), false); ?>">个人中心</a>
            <a class="dropdown-item" href="<?php echo e(route('users.edit', Auth::user()), false); ?>">编辑资料</a>
      			<a class="dropdown-item" href="<?php echo e(route('apply', Auth::user()), false); ?>">申请审核</a>
      			<a class="dropdown-item" href="<?php echo e(route('thread', Auth::user()), false); ?>">我的申请</a>
            <?php if(Auth::user()->is_admin == 1): ?>
              <a class="dropdown-item" href="<?php echo e(route('inform', Auth::user()), false); ?>">特权通告</a>
            <?php else: ?>
            <?php endif; ?>
            <div class="dropdown-divider"></div>
              <a class="dropdown-item" id="logout" href="#">
                <form action="<?php echo e(route('logout'), false); ?>" method="POST">
                  <?php echo e(csrf_field(), false); ?>

                  <?php echo e(method_field('DELETE'), false); ?>

                  <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
                </form>
              </a>
          </div>
        </li>
      <?php else: ?>
        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('help'), false); ?>">帮助</a></li>
        <li class="nav-item" ><a class="nav-link" href="<?php echo e(route('login'), false); ?>">登录</a></li>
      <?php endif; ?>
    </ul>
  </div>
</nav>