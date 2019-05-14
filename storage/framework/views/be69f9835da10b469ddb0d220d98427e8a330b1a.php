<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">

  <title><?php echo $__env->yieldContent('title', '办公OA系统'); ?> - Laravel 测试</title>

  <!-- META TAGs -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">

  <!-- CSS -->
  <link rel="stylesheet" href="<?php echo e(mix('css/app.css'), false); ?>">
</head>

<body>
  <?php echo $__env->make('layouts._header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php if(Auth::check()): ?>
        <div class="mainsider">
          <div class="siderbar">
          <div class="col-lg-10 col-md-3">
              <div style="font-size: 24px;color:white;">快捷功能</div>
                <ul class="navbar-nav">        
                  <li class="nav-item "><a style='color:white;width:100%;' href="<?php echo e(route('users.show', Auth::user()), false); ?>">个人中心</a></li>
                  <li class="nav-item "><a style='color:white;width:100%;'href="<?php echo e(route('users.edit', Auth::user()), false); ?>">编辑资料</a></li>
                  <li class="nav-item "><a style='color:white;width:100%;'href="<?php echo e(route('apply', Auth::user()), false); ?>">申请审核</a></li>
                  <li class="nav-item "><a style='color:white;width:100%;'href="<?php echo e(route('thread', Auth::user()), false); ?>">我的申请</a></li>
                  <?php if(Auth::user()->is_admin == 1): ?>
                    <li class="nav-item "><a style='color:white;width:100%;'href="<?php echo e(route('inform', Auth::user()), false); ?>">特权通告</a></li>
                  <?php else: ?>
                  <?php endif; ?>
                </ul>
          </div>
        </div>
        </div>
      <?php else: ?>
      <?php endif; ?>
  <div class="main">
    <div class="container">
      <?php echo $__env->make('shared._messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php echo $__env->yieldContent('content'); ?>
    </div>
  </div>

  <?php echo $__env->make('layouts._footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <!-- Scripts -->


</body>

</html>
<script src="<?php echo e(mix('js/app.js'), false); ?>"></script>