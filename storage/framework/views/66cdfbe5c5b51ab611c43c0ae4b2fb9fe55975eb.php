<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $__env->yieldContent('title', 'Sample App'); ?> - Laravel 入门教程</title>
    <link rel="stylesheet" href="./css/app.css">
  </head>
  <body>
    <?php echo $__env->make('layouts._header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="container">
		<div class="offset-md-1 col-md-10">
			<?php echo $__env->yieldContent('content'); ?>
			<?php echo $__env->make('layouts._footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>    
	</div>
  </body>
</html>