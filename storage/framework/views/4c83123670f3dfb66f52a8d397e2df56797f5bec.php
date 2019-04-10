<?php if(count($errors) > 0): ?>
  <div class="alert alert-danger">
    <div class="mt-2"><b>有错误发生：</b></div>
    <ul class="mt-2 mb-2">
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li><i class="glyphicon glyphicon-remove"></i> <?php echo e($error, false); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  </div>
<?php endif; ?>
