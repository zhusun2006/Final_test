<?php $__env->startSection('content'); ?>
  <div class="jumbotron">
    <h1>基于PHP的办公自动化系统</h1>
    <p class="lead">
      这是基于<a href="https://laravel-china.org">Laravel框架</a>搭建的PHP办公自动化系统。
    </p>
    <p>
      欢迎使用本办公自动化系统
    </p>
    <!-- <p>
      <a class="btn btn-lg btn-success" href="<?php echo e(route('signup'), false); ?>" role="button">游客注册</a>
    </p> -->
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>