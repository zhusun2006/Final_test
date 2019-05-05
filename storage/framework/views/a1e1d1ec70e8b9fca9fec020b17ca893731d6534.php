<li class="media <?php if( ! $loop->last): ?> border-bottom <?php endif; ?>">
  <div class="media-left">
    
  </div>

  <div class="media-body">
    <div class="media-heading mt-0 mb-1 text-secondary">
      <?php if( $notification->kind == '部门个人事务通告'): ?>
        管理员<span style="font-weight: bold;"><?php echo e($notification->sender, false); ?></span></a>
        给你发送了一份私人通告：
          <a href="<?php echo e(route('adminnotice', $notification->id), false); ?>"><?php echo e($notification->title, false); ?></a>
          的申请，请注意及时查看！
          <span class="meta float-right" title="<?php echo e($notification->created_at, false); ?>">
            <i class="far fa-clock"></i>
            <?php echo e($notification->created_at->diffForHumans(), false); ?>

          </span>
      </div>
      <div class="reply-content">
        类型：<?php echo $notification->kind; ?>

      </div>
      <?php else: ?>
        <?php if( $notification->admin_reply == null): ?>
          用户<span style="font-weight: bold;"><?php echo e($notification->sender, false); ?></span></a>
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
      <?php endif; ?>
  </div>
</li>