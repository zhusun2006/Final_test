<?php $__env->startSection('title','核查申请'); ?>

<?php $__env->startSection('content'); ?>

 <div class="container">
    <div class="col-md-10 offset-md-1">
      <div class="card ">
        <div class="card-body">
          <h2 class="">
            <i class="far fa-edit"></i>
            核查申请
          </h2>
          <hr>
            <a class="btn btn-link" href="<?php echo e(route('notice'), false); ?>"><-返回</a>
            <form action="<?php echo e(route('replies.store'), false); ?>" method="POST" accept-charset="UTF-8">
              <input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">
              <input type="hidden" name="is_check" value="1"/>
              <?php echo $__env->make('shared._errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              <div class="form-group">
                <label for="name">申请者：</label>
                <input class="form-control" type="hidden" name="user_name" value="<?php echo e($reply[0]->sender_id, false); ?>" />
                <input class="form-control" type="text" name="user_name" value="<?php echo e($reply[0]->sender_id, false); ?> " disabled/>
                <br>
                <label for="name">标题：</label>
                <input class="form-control" type="hidden" name="title" value="<?php echo e($reply[0]->title, false); ?>" />
                <input class="form-control" type="text" name="title" value="<?php echo e($reply[0]->title, false); ?> " disabled/>
                <br>
                <label for="name">申请种类：</label>
                <input class="form-control" type="hidden" name="category_id" value="<?php echo e($reply[0]->kind, false); ?>" />
                <input class="form-control" type="text" name="category_id" value="<?php echo e($reply[0]->kind, false); ?> " disabled/>
              </div>

              <div class="form-group">
                <label for="name">申请内容：</label>
                <textarea name="content" class="form-control" id="editor" rows="6" required  style="display: none;"><?php echo e($reply[0]->content, false); ?></textarea>
                <textarea name="content" class="form-control" id="editor" rows="6" required disabled><?php echo e($reply[0]->content, false); ?></textarea>
              </div>

              <div class="form-group">
                <?php if( $reply[0]->filename == null): ?>
                  <label for="name">附件：没有可下载的附件</label>
                <?php else: ?>
                  <label for="name">附件下载：<?php echo e($reply[0]->filename, false); ?></label>
                  <a href="<?php echo e(route('download', $reply[0]->route), false); ?>">下载</a>
                <?php endif; ?>
              </div>

              <div class="well well-sm">
                <div class="form-group">
                  <label for="name">我的意见：</label>
                  <textarea name="adminreply" class="form-control" id="editor" rows="6" placeholder="请输入您的意见" required></textarea>
                </div>
                <button type="submit" name="comfirm" value="已通过" class="btn btn-primary"><i class="far fa-save mr-2" aria-hidden="true"></i>回复</button>

                <button type="submit" name="comfirm" value="被驳回" class="btn btn-primary"><i class="far fa-save mr-2" aria-hidden="true"></i>驳回</button>            
              </div>
            </form>           
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>