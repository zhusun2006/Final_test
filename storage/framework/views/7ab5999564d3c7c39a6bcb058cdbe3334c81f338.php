<?php $__env->startSection('title','提交审计'); ?>

<?php $__env->startSection('content'); ?>
<div class="offset-md-2 col-md-8">
  <div class="card ">
    <div class="card-header">
      <h5>提交审计</h5>
    </div>
      <div class="card-body">
		<?php echo $__env->make('shared._errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>	
        <div class="panel-heading">申请表</div>
			<form class="form-horizontal" method="POST" action="<?php echo e(route('application' ,Auth::user()), false); ?>" enctype="multipart/form-data">
				<?php echo e(csrf_field(), false); ?> 
				<input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">
			    <input type="hidden" name="user_id" value="<?php echo e($user->id, false); ?>">
			    <input type="text" name="user_id" value="">
			    <div class="form-group">
			      <textarea class="form-control" rows="3" placeholder="请输入想提交的内容！" name="content"></textarea>
			    </div>			      			
				<label for="file">选择附加文件</label>
				<input id="file" type="file" class="form-control" name="source">				
				<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-share mr-1"></i> 提交</button>
			</form>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>