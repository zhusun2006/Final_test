<?php $__env->startSection('title','更新个人资料'); ?>

<?php $__env->startSection('content'); ?>
<div class="offset-md-2 col-md-8">
  <div class="card ">
    <div class="card-header">
      <h5>更新个人资料</h5>
    </div>
      <div class="card-body">

        <?php echo $__env->make('shared._errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <form method="POST" action="<?php echo e(route('users.update', $user->id ), false); ?>">
            <?php echo e(method_field('PATCH'), false); ?>

            <?php echo e(csrf_field(), false); ?>


            <div class="form-group">
              <label for="name">名称：</label>
              <input type="text" name="name" class="form-control" value="<?php echo e($user->name, false); ?>">
            </div>

            <div class="form-group">
              <label for="email">邮箱：</label>
              <input type="text" name="email" class="form-control" value="<?php echo e($user->email, false); ?>" disabled>
            </div>

            <div class="form-group">
              <label for="email">职称：</label>
              <input type="text" name="email" class="form-control" value="<?php echo e($user->department, false); ?>" disabled>
            </div>

            <div class="form-group">
              <label for="email">所属部门：</label>
              <input type="text" name="email" class="form-control" value="<?php echo e($user->position, false); ?>" disabled>
            </div>

            <div class="form-group">
              <label for="email">电话：</label>
              <input type="text" name="email" class="form-control" value="<?php echo e($user->tel, false); ?>" disabled>
            </div>

            <div class="form-group">
              <label for="password">密码：</label>
              <input type="password" name="password" class="form-control" value="">
            </div>

            <div class="form-group">
              <label for="password_confirmation">确认密码：</label>
              <input type="password" name="password_confirmation" class="form-control" value="">
            </div>

            <button type="submit" class="btn btn-primary">更新</button>
        </form>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>