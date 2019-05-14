<?php $__env->startSection('title','申请审批'); ?>

<?php $__env->startSection('content'); ?>

 <div class="container">
    <div class="col-md-10 offset-md-1">
      <div class="card ">
        <div class="card-body">
          <h2 class="">
            <i class="far fa-edit"></i>
            申请审批
          </h2>
          <hr>
            <form action="<?php echo e(route('replies.store'), false); ?>" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">
              <input type="hidden" name="is_check" value="0"/>
              <?php echo $__env->make('shared._errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              <div class="form-group">           
              	<div>接收人：</div>
                <select class="form-control" name="user_name" required>
                  <option value="" hidden disabled selected>下拉显示部门管理员</option>
                  <?php $__currentLoopData = $admin_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($value->name, false); ?>">
                        <?php echo e($value->name, false); ?>

                      </option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              	<br>
                申请标题：<input class="form-control" type="text" name="title" value="" placeholder="请填入申请标题"/>
              </div>

              <div class="form-group">
                <select class="form-control" name="category_id" required>
                  <option value="" name="kind" hidden disabled selected>分类</option>
                  <option value="报销申请">报销申请</option>
  	              <option value="请假申请">请假申请</option>
  	              <option value="物资申请">物资申请</option>
                </select>
              </div>
              
              <div class="form-group">
                <textarea name="content" class="form-control" id="editor" rows="6" placeholder="请填入内容" required></textarea>
              </div>
      			  <div class="form-group">
      			    <label class="sr-only" for="inputfile">添加附件</label>
      			    <input type="file" id="file" name="file" >
      			  </div>

              <div class="well well-sm">
                <button type="submit" class="btn btn-primary"><i class="far fa-save mr-2" aria-hidden="true"></i>提交</button>          
              </div>
            </form>           
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>