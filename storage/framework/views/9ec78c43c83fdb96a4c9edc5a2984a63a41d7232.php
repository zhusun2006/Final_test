<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $__env->yieldContent('title', '办公OA系统'); ?> - Laravel 测试</title>
    <link rel="stylesheet" href="<?php echo e(mix('css/app.css'), false); ?>">

  </head>
  <body>
    <?php echo $__env->make('layouts._header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="container">
      <div class="offset-md-1 col-md-10">
	    <?php echo $__env->make('shared._messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->make('layouts._footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </div>
	</div>
  <script src="<?php echo e(mix('js/app.js'), false); ?>"></script>
  
  </body>
</html>
