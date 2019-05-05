<?php $__env->startSection('title','特权更新资料'); ?>

<?php $__env->startSection('content'); ?>
<div class="offset-md-2 col-md-8">
  <div class="card ">
    <div class="card-header">
      <h5>特权更新资料</h5>
      <a class="btn btn-link float-left mt-1" href="<?php echo e(route('users.index', Auth::user()), false); ?>"><-返回</a>
    </div>

      <div class="card-body">

        <?php echo $__env->make('shared._errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <form method="POST" action="<?php echo e(route('users.update', $user->id ), false); ?>" accept-charset="UTF-8" enctype="multipart/form-data">
            <?php echo e(method_field('PATCH'), false); ?>

            <input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">
            <input type="hidden" name="is_check" value="admin"/>
            <div class="form-group mb-4">
              <label for="" class="avatar-label">用户头像</label>
              <input type="file" name="avatar" class="form-control-file">
              <?php if($user->avatar): ?>
                <br>
                <img class="thumbnail img-responsive" src="<?php echo e($user->avatar, false); ?>" width="200" />
              <?php endif; ?>
            </div>

            <div class="form-group">
              <label for="name">原用户名：</label>
              <input type="text" name="name" class="form-control" value="<?php echo e($user->name, false); ?>" disabled>
              <label for="name">新用户名：</label>
              <input type="text" name="name" class="form-control" value="" >
            </div>

            <div class="form-group">
              <label for="email">原邮箱：</label>          
              <input type="text" name="email" class="form-control" value="<?php echo e($user->email, false); ?>" disabled>
              <label for="email">新邮箱：</label>
              <input type="text" name="email" class="form-control" value="" >
            </div>

            <div class="form-group">
              <label for="department">原职位：</label>
              <input type="text" name="department" class="form-control" value="<?php echo e($user->department, false); ?>" disabled>
              <label for="department">新职位：</label>
              <input type="text" name="department" class="form-control" value="" >
            </div>

            <div class="form-group">
              <label for="position">原所属部门：</label>
              <input type="text" name="position" class="form-control" value="<?php echo e($user->position, false); ?>" disabled>
              <label for="position">新所属部门：</label>
              <input type="text" name="position" class="form-control" value="" >
            </div>

            <div class="form-group">
              <label for="tel">原电话：</label>
              <input type="text" name="tel" class="form-control" value="<?php echo e($user->tel, false); ?>" disabled>
              <label for="tel">新电话：</label>
              <input type="text" name="tel" class="form-control" value="" >
            </div>

            <div class="form-group">
              <label for="password">新密码：</label>
              <input type="password" name="password" class="form-control" value="">
            </div>

            <div class="form-group">
              <label for="password_confirmation">确认密码：</label>
              <input type="password" name="password_confirmation" class="form-control" value="">
            </div>
            <button type="submit" class="btn btn-primary">特权更新</button>
        </form>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>