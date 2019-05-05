<?php $__env->startSection('title', $user->name); ?>

<?php $__env->startSection('content'); ?>
 <div class="row">

  <div class="col-lg-3 col-md-3 hidden-sm hidden-xs user-info">
    <div class="card ">
      <img class="card-img-top" src="<?php echo e($user->avatar, false); ?>" alt="<?php echo e($user->name, false); ?>">
      <div class="card-body">
            <h5><strong>用户名：</strong></h5>
            <p><?php echo e($user->name, false); ?></p>
            <h5><strong>邮箱：</strong></h5>
            <p><?php echo e($user->email, false); ?></p>
            <h5><strong>部门：</strong></h5>
            <p><?php echo e($user->department, false); ?></p>
            <h5><strong>职位：</strong></h5>
            <p><?php echo e($user->position, false); ?></p>
            <hr>
            <h5><strong>注册于：</strong></h5>
            <p><?php echo e($user->created_at->diffForHumans(), false); ?></p>
      </div>
    </div>
  </div>

  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
    <div class="card ">
      <div class="card-body">
          <h1 class="mb-0" style="font-size:22px;">个人备忘录</h1>
          <br/>
      	<div class="mb-1" id="remember-one" style="display: block;">
      		<?php if($user->remember_thing == null): ?>
      		<div class="form-group">
              <textarea name="remember_thing" class="form-control" id="editor" rows="5" disabled>暂无数据~_~</textarea>
          </div>  
      		<?php else: ?>
          <div class="form-group">
              <textarea name="remember_thing" class="form-control" id="editor" rows="5" disabled><?php echo e($user->remember_thing, false); ?></textarea>
          </div> 
      		<?php endif; ?>
      	</div>
      	<form method="POST" id="remember-two" action="<?php echo e(route('users.update', $user->id ), false); ?>" style="display: none;">
      		<?php echo e(method_field('PATCH'), false); ?>

      		<input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">
	        <input type="hidden" name="is_check" value="3"/>
	        <div class="form-group">
              <textarea name="remember_thing" class="form-control" id="editor" rows="5" placeholder="请填入内容"><?php echo e($user->remember_thing, false); ?></textarea>
          </div>	    
        	<button type="submit" class="btn btn-primary">更新</button>
        </form>
        	<button id="btn-remember" class="btn btn-primary" onclick="setremember()">设置</button>
      </div>
    </div>
    <hr>

    
    <div class="card ">
      <div class="card-body">
      	<h1 class="mb-0" style="font-size:22px;">日程安排</h1>
      	<br/>
      	<div class="mb-1" id="arrange-one" style="display: block;">
      		<?php if($user->arrangement == null): ?>
          <div class="form-group">
              <textarea name="content_arr" class="form-control" id="editor" rows="15" disabled>暂无数据 ~_~</textarea>
          </div>
      		<?php else: ?>
          <div class="form-group">
              <textarea name="content_arr" class="form-control" id="editor" rows="15" disabled><?php echo e($user->arrangement, false); ?></textarea>
          </div>
      		<?php endif; ?>
      	</div>
      	<form method="POST" id="arrange-two" action="<?php echo e(route('users.update', $user->id ), false); ?>" style="display: none;">
      		<?php echo e(method_field('PATCH'), false); ?>

      		<input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">
	        <input type="hidden" name="is_check" value="2"/>
	        <div class="form-group">
              <textarea name="content_arr" class="form-control" id="editor" rows="15" placeholder="请填入内容"><?php echo e($user->arrangement, false); ?></textarea>
          </div>	    
        	<button type="submit" class="btn btn-primary">更新</button>
        </form>
        	<button id="btn-arrange" class="btn btn-primary" onclick="setarrange()">设置</button>
      </div>
    </div>

  </div>

</div>
<script type="text/javascript">
	function setarrange(){
			var arr_one = document.getElementById("arrange-one");
			var arr_two = document.getElementById("arrange-two");
			var btn = document.getElementById("btn-arrange");
			arr_one.style.display = "none";
			arr_two.style.display = "block";
			btn.style.display = "none";
	}

	function setremember(){
			var rem_one = document.getElementById("remember-one");
			var rem_two = document.getElementById("remember-two");
			var btn = document.getElementById("btn-remember");
			rem_one.style.display = "none";
			rem_two.style.display = "block";
			btn.style.display = "none";
	}
	
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>