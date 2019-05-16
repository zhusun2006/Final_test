@extends('layouts.default')
@section('title', '测试注册')

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="card ">
    <div class="card-header">
      <h5>添加用户</h5>
    </div>
      <div class="card-body">
        @include('shared._errors')
        <form method="POST" action="{{ route('users.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="name">用户名：</label>
              <input type="text" name="name" class="form-control" value="" >
            </div>

            <div class="form-group">
              <label for="email">邮箱：</label>
              <input type="text" name="email" class="form-control" value="" >
            </div>

            <div class="form-group">
              <label for="department">职称：</label>
              <input type="text" name="department" class="form-control" value="" >
            </div>

            <div class="form-group">
              <label for="position">所属部门：</label>
              <input type="text" name="position" class="form-control" value="" >
            </div>

            <div class="form-group">
              <label for="tel">电话：</label>
              <input type="text" name="tel" class="form-control" value="" >
            </div>

            <div class="form-group">
              <label for="password">密码：</label>
              <input type="password" name="password" class="form-control" value="">
            </div>

            <button type="submit" class="btn btn-primary">添加</button>
        </form>
    </div>
  </div>
</div>

@stop