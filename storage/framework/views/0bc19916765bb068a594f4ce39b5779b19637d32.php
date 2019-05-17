<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $__env->yieldContent('title', '办公自动化系统'); ?> - Laravel</title>
    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo e(mix('js/app.js'), false); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(mix('css/app.css'), false); ?>">
  </head>
  <body>
    <?php echo $__env->make('layouts._header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php if(Auth::check()): ?>
      <?php echo $__env->make('layouts._sider', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php else: ?>
    <?php endif; ?>
    <div class="main">
      <div class="container">
        <div class="offset-md-1 col-md-10">
  	      <?php echo $__env->make('shared._messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php echo $__env->yieldContent('content'); ?>
        </div>
  	  </div>
    </div>
    <?php echo $__env->make('layouts._footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </body>
</html>



