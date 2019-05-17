<?php $__env->startSection('title', isset($category) ? $category->name : '面板'); ?>

<?php $__env->startSection('content'); ?>

    <nav class="navbar navbar-expand-sm bg-light">
      <ul class="navbar-nav">
        <li class="nav-item <?php echo e(active_class(if_route('topics.index')), false); ?>"><a class="nav-link" href="<?php echo e(route('topics.index'), false); ?>">首页</a></li>
        <li class="nav-item <?php echo e(category_nav_active(1), false); ?>"><a class="nav-link" href="<?php echo e(route('categories.show', 1), false); ?>">任职公示</a></li>
        <li class="nav-item <?php echo e(category_nav_active(2), false); ?>"><a class="nav-link" href="<?php echo e(route('categories.show', 2), false); ?>">节假公告</a></li>
        <li class="nav-item <?php echo e(category_nav_active(3), false); ?>"><a class="nav-link" href="<?php echo e(route('categories.show', 3), false); ?>">事物公告</a></li>
        <li class="nav-item <?php echo e(category_nav_active(4), false); ?>"><a class="nav-link" href="<?php echo e(route('categories.show', 4), false); ?>">公告</a></li>
      </ul>
    </nav>

<br/>
<div class="row mb-5">
  <div class="col-lg-9 col-md-9 topic-list">
    <?php if(isset($category)): ?>
      <div class="alert alert-info" role="alert">
        <?php echo e($category->name, false); ?> ：<?php echo e($category->description, false); ?>

      </div>
    <?php endif; ?>
    <div class="card ">

     <div class="card-header bg-transparent">
        <ul class="nav nav-pills">
          <li class="nav-item">
            <a class="nav-link <?php echo e(active_class( ! if_query('order', 'recent')), false); ?>" href="<?php echo e(Request::url(), false); ?>?order=default">
              最多浏览
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo e(active_class(if_query('order', 'recent')), false); ?>" href="<?php echo e(Request::url(), false); ?>?order=recent">
              最新发布
            </a>
          </li>
        </ul>
      </div>

      <div class="card-body">
        
        <?php echo $__env->make('topics._topic_list', ['topics' => $topics], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        
        <div class="mt-5">
          <?php echo $topics->appends(Request::except('page'))->render(); ?>

        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 sidebar">
    <?php echo $__env->make('topics._sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>