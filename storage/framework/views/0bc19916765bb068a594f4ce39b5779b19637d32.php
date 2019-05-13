<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $__env->yieldContent('title', '办公OA系统'); ?> - Laravel 测试</title>
    <link rel="stylesheet" href="<?php echo e(mix('css/app.css'), false); ?>">

  </head>
  <body>
    <?php echo $__env->make('layouts._header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="main">
    <div class="container">
      <div class="offset-md-1 col-md-10">
        <?php if(Auth::check()): ?>
        <div class="mainsider">
          <div class="col-lg-10 col-md-3 sidebar">
              <div style="font-size: 24px;color:white;">快捷功能</div>
                <ul class="navbar-nav">        
                  <li class="nav-item "><a href="<?php echo e(route('users.show', Auth::user()), false); ?>">个人中心</a></li>
                  <li class="nav-item "><a href="<?php echo e(route('users.edit', Auth::user()), false); ?>">编辑资料</a></li>
                  <li class="nav-item "><a href="<?php echo e(route('apply', Auth::user()), false); ?>">申请审核</a></li>
                  <li class="nav-item "><a href="<?php echo e(route('thread', Auth::user()), false); ?>">我的申请</a></li>
                  <?php if(Auth::user()->is_admin == 1): ?>
                    <li class="nav-item "><a href="<?php echo e(route('inform', Auth::user()), false); ?>">特权通告</a></li>
                  <?php else: ?>
                  <?php endif; ?>
                </ul>
          </div>
        </div>
      <?php else: ?>
      <?php endif; ?>
	      <?php echo $__env->make('shared._messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
      </div>
	  </div>
    </div>
    <?php echo $__env->make('layouts._footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <script src="<?php echo e(mix('js/app.js'), false); ?>"></script>
  
  </body>
</html>
