<li class="media <?php if( ! $loop->last): ?> border-bottom <?php endif; ?>">
  <div class="media-left">
    
  </div>

  <div class="media-body">
    <div class="media-heading mt-0 mb-1 text-secondary">
      <?php if( $reply->admin_reply == null): ?>
      您提交了一份名为：<?php echo e($reply->title, false); ?>的申请，目前正在等待管理员审核，请耐心等待！
      <span class="meta float-right" title="<?php echo e($reply->created_at, false); ?>">
        <i class="far fa-clock"></i>
        <?php echo e($reply->created_at->diffForHumans(), false); ?>

      </span>
    </div>
    <form action="<?php echo e(route('replies.destroy', $reply->id ), false); ?>" method="post" class="float-right">
      <?php echo e(csrf_field(), false); ?>

      <?php echo e(method_field('DELETE'), false); ?>

      <button type="submit" class="btn btn-sm btn-danger delete-btn" onsubmit="return confirm('您确定要执行撤销操作吗？');">>撤销</button>
    </form>
    <div class="reply-content">
      类型：<?php echo $reply->kind; ?>

      
    </div>
    <?php else: ?>
      <br/>
      标题为“<?php echo e($reply->title, false); ?>”的申请已经被管理员审批了，请注意查看消息通知！</a>
      <span class="meta float-right" title="<?php echo e($reply->updated_at, false); ?>">
        <i class="far fa-clock"></i>
        <?php echo e($reply->updated_at->diffForHumans(), false); ?>

      </span>
      <div class="reply-content">
      类型：<?php echo $reply->kind; ?>   
      </div>
    <?php endif; ?>
  </div>
</li>