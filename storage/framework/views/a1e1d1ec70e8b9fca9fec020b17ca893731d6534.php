<li class="media <?php if( ! $loop->last): ?> border-bottom <?php endif; ?>">
  <div class="media-left">
    
  </div>

  <div class="media-body">
    <div class="media-heading mt-0 mb-1 text-secondary">
      <?php if( $notification->admin_reply == null): ?>
      用户<a href="<?php echo e(route('users.show', $notification->sender), false); ?>"><?php echo e($notification->sender, false); ?></a>
      提交了一份名为：
      <a href="<?php echo e(route('check', $notification->id), false); ?>"><?php echo e($notification->title, false); ?></a>
      的申请，请注意查看审核！
      <span class="meta float-right" title="<?php echo e($notification->created_at, false); ?>">
        <i class="far fa-clock"></i>
        <?php echo e($notification->created_at->diffForHumans(), false); ?>

      </span>
    </div>
    <div class="reply-content">
      类型：<?php echo $notification->kind; ?>

    </div>
    <?php else: ?>
      <br/>
      标题为“<?php echo e($notification->title, false); ?>”的申请已经被管理员审批了！<a href="<?php echo e(route('result', $notification->id), false); ?>">点此查看详情</a>
      <span class="meta float-right" title="<?php echo e($notification->created_at, false); ?>">
        <i class="far fa-clock"></i>
        <?php echo e($notification->created_at->diffForHumans(), false); ?>

      </span>
    <?php endif; ?>
  </div>
</li>