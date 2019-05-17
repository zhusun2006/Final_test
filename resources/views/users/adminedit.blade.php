@extends('layouts.default')
@section('title','特权更新资料')

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="card ">
    <div class="card-header">
      <h5>特权更新资料</h5>
      <a class="btn btn-link float-left mt-1" href="{{ route('users.index', Auth::user()) }}"><-返回</a>
    </div>

      <div class="card-body">

        @include('shared._errors')

        <form method="POST" action="{{ route('users.update', $user->id )}}" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="is_check" value="admin"/>
            <div class="form-group mb-4">
              <label for="" class="avatar-label">用户头像</label>
              <input type="file" name="avatar" class="form-control-file">
              @if($user->avatar)
                <br>
                <img class="thumbnail img-responsive" src="{{ $user->avatar }}" width="200" />
              @endif
            </div>

            <div class="form-group">
              <label for="name">原用户名：</label>
              <input type="text" name="name" class="form-control" value="{{ $user->name }}" disabled>
              <label for="name">新用户名：</label>
              <input type="text" name="name" class="form-control" value="" >
            </div>

            <div class="form-group">
              <label for="email">邮箱：</label>          
              <input type="text" name="email" class="form-control" value="{{ $user->email }}" disabled>
              <label for="email">新邮箱：</label>
              <input type="text" name="email" class="form-control" value="" >
            </div>

            <div class="form-group">
              <label for="department">原所属部门：</label>
              <input type="text" name="department" class="form-control" value="{{ $user->department }}" disabled>
              <label for="department">新所属部门：</label>
              <input type="text" name="department" class="form-control" value="" >
            </div>

            <div class="form-group">
              <label for="position">原职位：</label>
              <input type="text" name="position" class="form-control" value="{{ $user->position }}" disabled>
              <label for="position">新职位：</label>
              <input type="text" name="position" class="form-control" value="" >
            </div>

            <div class="form-group">
              <label for="tel">原电话：</label>
              <input type="text" name="tel" class="form-control" value="{{ $user->tel }}" disabled>
              <label for="tel">新电话：</label>
              <input type="text" name="tel" class="form-control" value="" >
            </div>

            <div class="form-group">
              <label for="password">新密码：</label>
              <input type="password" name="password" class="form-control" value="">
            </div>

            <div class="form-group">
              <label for="password_confirmation">确认密码：</label>
              <input type="password" name="password_confirmation" class="form-control" value="">
            </div>
            <button type="submit" class="btn btn-primary">特权更新</button>
        </form>
    </div>
  </div>
</div>
@stop