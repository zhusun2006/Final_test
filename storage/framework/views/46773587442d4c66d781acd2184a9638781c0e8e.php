<?php $__env->startSection('content'); ?>

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          Topic /
          <?php if($topic->id): ?>
            Edit #<?php echo e($topic->id, false); ?>

          <?php else: ?>
            Create
          <?php endif; ?>
        </h1>
      </div>

      <div class="card-body">
        <?php if($topic->id): ?>
          <form action="<?php echo e(route('topics.update', $topic->id), false); ?>" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        <?php else: ?>
          <form action="<?php echo e(route('topics.store'), false); ?>" method="POST" accept-charset="UTF-8">
        <?php endif; ?>

          <?php echo $__env->make('common.error', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

          <input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">

          
                <div class="form-group">
                	<label for="title-field">Title</label>
                	<input class="form-control" type="text" name="title" id="title-field" value="<?php echo e(old('title', $topic->title ), false); ?>" />
                </div> 
                <div class="form-group">
                	<label for="body-field">Body</label>
                	<textarea name="body" id="body-field" class="form-control" rows="3"><?php echo e(old('body', $topic->body ), false); ?></textarea>
                </div> 
                <div class="form-group">
                    <label for="user_id-field">User_id</label>
                    <input class="form-control" type="text" name="user_id" id="user_id-field" value="<?php echo e(old('user_id', $topic->user_id ), false); ?>" />
                </div> 
                <div class="form-group">
                    <label for="category_id-field">Category_id</label>
                    <input class="form-control" type="text" name="category_id" id="category_id-field" value="<?php echo e(old('category_id', $topic->category_id ), false); ?>" />
                </div> 
                <div class="form-group">
                    <label for="view_count-field">View_count</label>
                    <input class="form-control" type="text" name="view_count" id="view_count-field" value="<?php echo e(old('view_count', $topic->view_count ), false); ?>" />
                </div> 
                <div class="form-group">
                    <label for="order-field">Order</label>
                    <input class="form-control" type="text" name="order" id="order-field" value="<?php echo e(old('order', $topic->order ), false); ?>" />
                </div> 
                <div class="form-group">
                	<label for="excerpt-field">Excerpt</label>
                	<textarea name="excerpt" id="excerpt-field" class="form-control" rows="3"><?php echo e(old('excerpt', $topic->excerpt ), false); ?></textarea>
                </div> 
                <div class="form-group">
                	<label for="slug-field">Slug</label>
                	<input class="form-control" type="text" name="slug" id="slug-field" value="<?php echo e(old('slug', $topic->slug ), false); ?>" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="<?php echo e(route('topics.index'), false); ?>"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>