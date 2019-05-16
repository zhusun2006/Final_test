<?php $__env->startSection('title','事务申请'); ?>

<?php $__env->startSection('content'); ?>

 <div class="container">
    <div class="col-md-10 offset-md-1">
      <div class="card ">
        <div class="card-body">
          <h2 class="">
            <i class="far fa-edit"></i>
            事务申请
          </h2>
          <hr>
            <form action="<?php echo e(route('replies.store'), false); ?>" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">
              <input type="hidden" name="is_check" value="0"/>
              <?php echo $__env->make('shared._errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              <div class="form-group">           
                <label class="input-group-addon" style="font-size: 17px;">接收者：</label>
                <select class="form-control" name="user_name" required style="display: inline;width:87.5%;">
                  <option value="" hidden disabled selected>下拉显示部门管理员</option>
                  <?php $__currentLoopData = $admin_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($value->name, false); ?>">
                        <?php echo e($value->name, false); ?>

                      </option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>

              <div class="form-group" > 
                <label class="input-group-addon" style="font-size: 17px;">申请标题：</label>
                <input class="form-control" type="text" name="title" value="" style="display: inline;width:85%;" placeholder="请填入申请标题"/>
              </div>

              <div class="form-group">
                <label class="input-group-addon" style="font-size: 17px;">申请类型：</label>
                <select class="form-control" name="category_id" required style="display: inline;width:85%;">
                  <option value="" name="kind" hidden disabled selected>分类</option>
                  <option value="报销申请">报销申请</option>
  	              <option value="请假申请">请假申请</option>
  	              <option value="物资申请">物资申请</option>
                </select>
              </div>
              
              <div class="form-group">
                <label class="input-group-addon" style="font-size: 17px;">申请内容：</label>
                <textarea name="content" class="form-control" id="editor" rows="15" placeholder="请填入内容" required style="width:98.5%;"></textarea>
              </div>

      			  <div class="form-group">
      			    <label class="sr-only" for="inputfile">添加附件</label>
      			    <input type="file" id="file" name="file" >
      			  </div>

              <div class="well well-sm">
                <button type="submit" name="comfirm" value="待审核" class="btn btn-primary"><i class="far fa-save mr-2" aria-hidden="true"></i>提交</button>          
              </div>
              
            </form>           
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>