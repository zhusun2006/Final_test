<?php if(count($topics)): ?>
  <ul class="list-unstyled">
    <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li class="media">
        <div class="media-left">
          <a href="<?php echo e(route('users.show', [$topic->user_id]), false); ?>">
          </a>
        </div>

        <div class="media-body">

          <div class="media-heading mt-0 mb-1">
            <a href="<?php echo e(route('topics.show', [$topic->id]), false); ?>" title="<?php echo e($topic->title, false); ?>">
              <?php echo e($topic->title, false); ?>

            </a>
            <a class="float-right" href="<?php echo e(route('topics.show', [$topic->id]), false); ?>">
              <span class="badge badge-secondary badge-pill"> <?php echo e($topic->reply_count, false); ?> </span>
            </a>
          </div>

          <small class="media-body meta text-secondary">

            <a class="text-secondary" href="<?php echo e(route('categories.show', $topic->category_id), false); ?>" title="<?php echo e($topic->category->name, false); ?>">
              <i class="far fa-folder"></i>
              <?php echo e($topic->category->name, false); ?>

            </a>

            <span> • </span>
            <a class="text-secondary" href="<?php echo e(route('users.show', [$topic->user_id]), false); ?>" title="<?php echo e($topic->user->name, false); ?>">
              <i class="far fa-user"></i>
              <?php echo e($topic->user->name, false); ?>

            </a>
     
            <span> • </span>
            <i class="far fa-clock"></i>
            <span class="timeago" title="最后活跃于：<?php echo e($topic->updated_at, false); ?>"><?php echo e($topic->updated_at->diffForHumans(), false); ?></span>
          </small>

        </div>
      </li>

      <?php if( ! $loop->last): ?>
        <hr>
      <?php endif; ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>

<?php else: ?>
  <div class="empty-block">暂无数据 ~_~ </div>
<?php endif; ?>