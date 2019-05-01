<?php $__env->startSection('title','显示用户'); ?>

<?php $__env->startSection('content'); ?>
<div class="offset-md-2 col-md-8">
  <h2 class="mb-4 text-center">当前用户</h2>
  <div class="list-group list-group-flush">
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="list-group-item">
        <img class="mr-3" src="<?php echo e($user->gravatar(), false); ?>" alt="<?php echo e($user->name, false); ?>" width=32>
        <a href="<?php echo e(route('users.show', $user), false); ?>">
          <?php echo e($user->name, false); ?>

        </a>
		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('destroy', $user)): ?>
			<form action="<?php echo e(route('users.destroy', $user->id), false); ?>" method="post" class="float-right">
				<?php echo e(csrf_field(), false); ?>

				<?php echo e(method_field('DELETE'), false); ?>

				<button type="submit" class="btn btn-sm btn-danger delete-btn">删除</button>
			</form>
		<?php endif; ?>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  
  <div class="mt-3">
	<?php echo $users->render(); ?>

  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>