<?php $__env->startSection('content'); ?>
  <div class="jumbotron">
    <h1>Hello Laravel</h1>
    <p class="lead">
      你现在所看到的是 <a href="https://laravel-china.org/courses/laravel-essential-training">Laravel框架搭建</a> 的示例项目主页。
    </p>
    <p>
      这是办公OA系统的主页面。
    </p>
    <p>
      <a class="btn btn-lg btn-success" href="<?php echo e(route('signup')); ?>" role="button">现在注册</a>
    </p>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>