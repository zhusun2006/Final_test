<?php $__env->startSection('title','核查审计'); ?>

<?php $__env->startSection('content'); ?>

 <div class="container">
    <div class="col-md-10 offset-md-1">
      <div class="card ">

        <div class="card-body">
          <h2 class="">
            <i class="far fa-edit"></i>
            核查审计
          </h2>
          <hr>
            <form action="<?php echo e(route('replies.store'), false); ?>" method="POST" accept-charset="UTF-8">
              <input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">
              <?php echo $__env->make('shared._errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              <div class="form-group">
                <input class="form-control" type="text" name="user_id" value="" placeholder="请输入提交者"/>
                <br>
                <input class="form-control" type="text" name="title" value="" placeholder="请填入标题"/>

                <br>
                <input class="form-control" type="text" name="title" value="" placeholder="请填入标题"/>

              </div>


              <div class="form-group">
                <textarea name="content" class="form-control" id="editor" rows="6" placeholder="请填入内容" required></textarea>
              </div>
             <!--  <label for="file">选择附加文件</label>
                <input id="file" type="file" class="form-control" name="source">
             <br> -->
              <div class="well well-sm">
                <button type="submit" class="btn btn-primary"><i class="far fa-save mr-2" aria-hidden="true"></i> 提交</button>          
              </div>
            </form>           
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>