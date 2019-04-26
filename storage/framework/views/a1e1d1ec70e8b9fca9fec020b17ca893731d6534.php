<li class="media <?php if( ! $loop->last): ?> border-bottom <?php endif; ?>">
  <div class="media-left">
    
  </div>

  <div class="media-body">
    <div class="media-heading mt-0 mb-1 text-secondary">
      用户<a href="<?php echo e(route('users.show', $notification->sender), false); ?>"><?php echo e($notification->sender, false); ?></a>
      提交了一份
      <a href="<?php echo e(route('check', $notification->id), false); ?>"><?php echo e($notification->kind, false); ?></a>

      
      <span class="meta float-right" title="<?php echo e($notification->created_at, false); ?>">
        <i class="far fa-clock"></i>
        <?php echo e($notification->created_at->diffForHumans(), false); ?>

      </span>
    </div>
    <div class="reply-content">
      <?php echo $notification->content; ?>

    </div>
  </div>
</li>