<li class="media <?php if( ! $loop->last): ?> border-bottom <?php endif; ?>">
  <div class="media-left">
  </div>

  <div class="media-body">
    <div class="media-heading mt-0 mb-1 text-secondary">
      <br/>
      <?php if( $reply->status == "待审核"): ?>
      申请标题：<?php echo e($reply->title, false); ?>

      <span class="meta float-right" title="<?php echo e($reply->created_at, false); ?>">
        <i class="far fa-clock"></i>
      申请时间：<?php echo e($reply->created_at->diffForHumans(), false); ?>

      </span>
    </div>
    <form action="<?php echo e(route('replies.destroy', $reply->id ), false); ?>" method="post" class="float-right" onsubmit="return confirm('您确定要执行撤销操作吗？');">
      <?php echo e(csrf_field(), false); ?>

      <?php echo e(method_field('DELETE'), false); ?>

      <button type="submit" class="btn btn-sm btn-danger delete-btn" >撤销</button>
    </form>
    <div class="reply-content">
      类型：<?php echo $reply->kind; ?>

      <br/>
      状态：<?php echo $reply->status; ?>

    </div>
    <?php else: ?>
      <?php if( $reply->status == "被驳回" ): ?>
      申请标题：<a href="<?php echo e(route('resultofedit', $reply->id), false); ?>"><?php echo e($reply->title, false); ?></a>
      <?php else: ?>
      申请标题：<a href="<?php echo e(route('resultofreply', $reply->id), false); ?>"><?php echo e($reply->title, false); ?></a>
      <?php endif; ?>
      <span class="meta float-right" title="<?php echo e($reply->updated_at, false); ?>">
        <i class="far fa-clock"></i>
      申请时间：<?php echo e($reply->updated_at->diffForHumans(), false); ?>

      </span>
      <div class="reply-content">
      类型：<?php echo $reply->kind; ?>   
      <br/>
      状态：<?php echo $reply->status; ?>

      </div>
    <?php endif; ?>
  </div>
</li>



