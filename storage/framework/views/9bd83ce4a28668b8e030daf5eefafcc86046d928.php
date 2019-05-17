<?php $__env->startSection('content'); ?>

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1><span class="glyphicon glyphicon-file"></span>浏览公告</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="<?php echo e(route('topics.index'), false); ?>"><-返回</a>
            </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit', $user)): ?>
            <div class="col-md-6">
              <a class="btn btn-sm btn-primary float-right mt-1" href="<?php echo e(route('topics.edit', $topic->id), false); ?>">
                编辑
              </a>
            </div>
            <?php endif; ?>
          </div>
        </div>
        <br>

        <div style="font-size: 32px; text-align: center;">
        	<?php echo e($topic->title, false); ?>

        </div> 
        <hr>
        <div style="min-height: 525px;font-size: 19px;">
        	<?php echo e($topic->body, false); ?>

        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>