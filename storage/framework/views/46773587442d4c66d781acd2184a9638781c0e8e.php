<?php $__env->startSection('content'); ?>

 <div class="container">
    <div class="col-md-10 offset-md-1">
      <div class="card ">

        <div class="card-body">
          <h2 class="">
            <i class="far fa-edit"></i>
            <?php if($topic->id): ?>
            编辑文章
            <?php else: ?>
            发布公告
            <?php endif; ?>
          </h2>

          <hr>

          <?php if($topic->id): ?>
            <form action="<?php echo e(route('topics.update', $topic->id), false); ?>" method="POST" accept-charset="UTF-8">
              <input type="hidden" name="_method" value="PUT">
          <?php else: ?>
            <form action="<?php echo e(route('topics.store'), false); ?>" method="POST" accept-charset="UTF-8">
          <?php endif; ?>

              <input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">

              <?php echo $__env->make('shared._errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

              <div class="form-group">
                <input class="form-control" type="text" name="title" value="<?php echo e(old('title', $topic->title ), false); ?>" placeholder="请填写标题" required />
              </div>

              <div class="form-group">
                <select class="form-control" name="category_id" required>
                  <option value="" hidden disabled selected>分类</option>
                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($value->id, false); ?>" <?php echo e($topic->category_id == $value->id ? 'selected' : '', false); ?>>
                        <?php echo e($value->name, false); ?>

                      </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>

              <div class="form-group">
                <textarea name="body" class="form-control" id="editor" rows="6" placeholder="请填入至少三个字符的内容。" required><?php echo e(old('body', $topic->body ), false); ?></textarea>
              </div>

              <div class="well well-sm">
                <button type="submit" class="btn btn-primary"><i class="far fa-save mr-2" aria-hidden="true"></i> 发布</button>          
              </div>
            </form>           
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>