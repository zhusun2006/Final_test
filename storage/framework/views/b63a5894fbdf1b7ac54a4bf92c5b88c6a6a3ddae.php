<?php $__env->startSection('content'); ?>

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>Topic / Show #<?php echo e($topic->id, false); ?></h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="<?php echo e(route('topics.index'), false); ?>"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="<?php echo e(route('topics.edit', $topic->id), false); ?>">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Title</label>
<p>
	<?php echo e($topic->title, false); ?>

</p> <label>Body</label>
<p>
	<?php echo e($topic->body, false); ?>

</p> <label>User_id</label>
<p>
	<?php echo e($topic->user_id, false); ?>

</p> <label>Category_id</label>
<p>
	<?php echo e($topic->category_id, false); ?>

</p> <label>View_count</label>
<p>
	<?php echo e($topic->view_count, false); ?>

</p> <label>Order</label>
<p>
	<?php echo e($topic->order, false); ?>

</p> <label>Excerpt</label>
<p>
	<?php echo e($topic->excerpt, false); ?>

</p> <label>Slug</label>
<p>
	<?php echo e($topic->slug, false); ?>

</p>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>