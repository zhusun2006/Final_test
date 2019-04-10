<?php $__env->startSection('title', '登录'); ?>

<?php $__env->startSection('content'); ?>
<div class="col-md-offset-2 col-md-8">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h5>登录</h5>
    </div>
    <div class="panel-body">
      <?php echo $__env->make('shared._errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

      <form method="POST" action="<?php echo e(route('login'), false); ?>">
          <?php echo e(csrf_field(), false); ?>


          <div class="form-group">
            <label for="email">邮箱：</label>
            <input type="text" name="email" class="form-control" value="<?php echo e(old('email'), false); ?>">
          </div>

          <div class="form-group">
            <label for="password">密码：</label>
            <input type="password" name="password" class="form-control" value="<?php echo e(old('password'), false); ?>">
          </div>
		  
		  <div class="form-group">
              <label for="captcha">验证码：</label>
              <div class="col-md-5">
                <input id="captcha" class="form-control" name="captcha" required>
                <img class="thumbnail captcha mt-3 mb-2" src="<?php echo e(captcha_src('flat'), false); ?>" onclick="this.src='./captcha/flat?'+Math.random()" title="点击图片重新获取验证码">
                <?php if($errors->has('captcha')): ?>
                  <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('captcha'), false); ?></strong>
                  </span>
                <?php endif; ?>
              </div>
            </div>

          <div class="checkbox">
            <label><input type="checkbox" name="remember"> 记住我</label>
          </div>

          <button type="submit" class="btn btn-primary">登录</button>
      </form>

      <hr>

      <p>还没账号？<a href="<?php echo e(route('signup'), false); ?>">现在注册浏览！</a></p>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>