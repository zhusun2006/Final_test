<a href=""<?php echo e(route('users.show',$user->id), false); ?>>
	<center><img src="<?php echo e($user->gravatar('140'), false); ?>" alt="<?php echo e($user->name, false); ?>" class="gravatar" /></center>
 </a>
 <h1><?php echo e($user->name, false); ?></h1>