<?php $__env->startSection('title', '登录'); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header"><?php echo e(__('Login'), false); ?></div>

        <div class="card-body">
          <form method="POST" action="<?php echo e(route('login'), false); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address'), false); ?></label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : '', false); ?>" name="email" value="<?php echo e(old('email'), false); ?>" required>

                <?php if($errors->has('email')): ?>
                <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($errors->first('email'), false); ?></strong>
                </span>
                <?php endif; ?>
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password'), false); ?></label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : '', false); ?>" name="password" required>

                <?php if($errors->has('password')): ?>
                  <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('password'), false); ?></strong>
                  </span>
                <?php endif; ?>
              </div>
            </div>

            <div class="form-group row">
              <label for="captcha" class="col-md-4 col-form-label text-md-right">验证码</label>

              <div class="col-md-6">
                <input id="captcha" class="form-control<?php echo e($errors->has('captcha') ? ' is-invalid' : '', false); ?>" name="captcha" required>

                <img class="thumbnail captcha mt-3 mb-2" src="<?php echo e(captcha_src('flat'), false); ?>" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">

                <?php if($errors->has('captcha')): ?>
                  <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('captcha'), false); ?></strong>
                  </span>
                <?php endif; ?>
              </div>
            </div>

            <div class="form-group row">
              <label for="exampleCheck1" class="col-md-4"></label>
            <div class="col-md-6">
              <input type="checkbox" class="form-check-input" name="remember" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">记住我</label>
            </div>
          </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-3">
                <button type="submit" class="btn btn-primary btn-block">
                  <?php echo e(__('Login'), false); ?>

                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>