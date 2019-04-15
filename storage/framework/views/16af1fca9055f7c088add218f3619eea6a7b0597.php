<?php $__env->startSection('title', '注册'); ?>
<?php $__env->startSection('content'); ?>
<div class="col-md-offset-2 col-md-8">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h5>注册</h5>
    </div>
    <div class="panel-body">
	
      <form method="POST" action="<?php echo e(route('users.store'), false); ?>">
		<?php echo e(csrf_field(), false); ?>

		<?php echo $__env->make('shared._errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <div class="form-group">
            <label for="name">名称：</label>
            <input type="text" name="name" class="form-control" value="<?php echo e(old('name'), false); ?>">
          </div>

          <div class="form-group">
            <label for="email">邮箱：</label>
            <input type="text" name="email" class="form-control" value="<?php echo e(old('email'), false); ?>">
          </div>

          <div class="form-group">
            <label for="password">密码：</label>
            <input type="password" name="password" class="form-control" value="<?php echo e(old('password'), false); ?>">
          </div>

          <div class="form-group">
            <label for="password_confirmation">确认密码：</label>
            <input type="password" name="password_confirmation" class="form-control" value="<?php echo e(old('password_confirmation'), false); ?>">
          </div>

          <button type="submit" class="btn btn-primary">注册</button>
      </form>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>