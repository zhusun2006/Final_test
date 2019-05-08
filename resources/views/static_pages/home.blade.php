@extends('layouts.default')

@section('content')
<div class="maincard">
  <div class="col-lg-3 col-md-3 sidebar">

    <div class="card-body">
      导航栏
      <ul class="navbar-nav">
          <li class="nav-item "><a class="nav-link" href="">首页</a></li>
          <li class="nav-item "><a class="nav-link" href="">任职公示</a></li>
          <li class="nav-item "><a class="nav-link" href="">节假公告</a></li>
          <li class="nav-item "><a class="nav-link" href="">事件进程</a></li>
          <li class="nav-item "><a class="nav-link" href="">公告</a></li>
        </ul>
    </div>
  </div>
</div>
  <div class="jumbotron">
    <h1>基于PHP的办公自动化系统</h1>
    <p class="lead">
      这是基于 <a href="https://laravel-china.org/courses/laravel-essential-training">Laravel框架</a> 搭建的PHP办公自动化系统。
    </p>
    <p>
      欢迎使用本OA办公系统
    </p>
    <p>
      <a class="btn btn-lg btn-success" href="{{ route('signup') }}" role="button">游客注册</a>
    </p>
  </div>
@stop