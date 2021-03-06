<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div>
    <a class="navbar-brand" style="color: #fff;">欢迎使用基于PHP的办公自动化系统</a>
  </div>
  <div class="container">
    <div>
    </div>
    <ul class="navbar-nav justify-content-end">
      <?php if(Auth::check()): ?>
        <li class="nav-item notification-badge">
          <a class="nav-link mr-3 badge badge-pill badge-<?php echo e(Auth::user()->notification_count > 0 ? 'hint' : 'secondary', false); ?> text-white" href="<?php echo e(route('notice'), false); ?>">
            <?php echo e(Auth::user()->notification_count, false); ?>

          </a>
        </li>
        <li class="nav-item dropdown">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo e(Auth::user()->name, false); ?>

          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php echo e(route('users.show', Auth::user()), false); ?>">个人中心</a>
            <a class="dropdown-item" href="<?php echo e(route('users.edit', Auth::user()), false); ?>">编辑资料</a>
      			<a class="dropdown-item" href="<?php echo e(route('apply', Auth::user()), false); ?>">事务申请</a>
      			<a class="dropdown-item" href="<?php echo e(route('thread', Auth::user()), false); ?>">我的申请</a>
            <a class="dropdown-item" href="<?php echo e(route('users.index', Auth::user()), false); ?>">用户查阅</a>
            <?php if(Auth::user()->is_admin == 1): ?>
              <a class="dropdown-item" href="<?php echo e(route('inform', Auth::user()), false); ?>">个人私信</a>
            <?php else: ?>
            <?php endif; ?>
          </div>
        </li>
        <li class="nav-item">
                <form action="<?php echo e(route('logout'), false); ?>" method="POST">
                  <?php echo e(csrf_field(), false); ?>

                  <?php echo e(method_field('DELETE'), false); ?>

                  <button class="btn nav-link" type="submit" name="button">退出</button>
                </form>
        </li>
      <?php else: ?>
        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('help'), false); ?>">帮助</a></li>
        <li class="nav-item" ><a class="nav-link" href="<?php echo e(route('login'), false); ?>">登录</a></li>
      <?php endif; ?>
    </ul>
  </div>
</nav>