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

  <div class="container">
    <?php if(session('message')): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <?php echo e(@session('message'), false); ?>

    </div>
    <?php endif; ?>

    <?php echo $__env->yieldContent('header'); ?>
    <?php echo $__env->yieldContent('content'); ?>
  </div>

  <!-- Scripts -->

  <script src="<?php echo e(mix('js/app.js'), false); ?>"></script>
</body>

</html>
