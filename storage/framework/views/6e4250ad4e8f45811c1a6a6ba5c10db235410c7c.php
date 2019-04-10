<a href=""<?php echo e(route('users.show',$user->id)); ?>>
	<center><img src="<?php echo e($user->gravatar('140')); ?>" alt="<?php echo e($user->name); ?>" class="gravatar" /></center>
 </a>
 <h1><?php echo e($user->name); ?></h1>