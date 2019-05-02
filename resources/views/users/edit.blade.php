@extends('layouts.default')
@section('title','更新个人资料')

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="card ">
    <div class="card-header">
      <h5>更新个人资料</h5>
    </div>
      <div class="card-body">

        @include('shared._errors')

        <form method="POST" action="{{ route('users.update', $user->id )}}">
            <input type="hidden" name="is_check" value="1"/>
            {{ method_field('PATCH') }}
            {{ csrf_field() }}

            <div class="form-group">
              <label for="name">用户名：</label>
              <input type="text" name="name" class="form-control" value="{{ $user->name }}">
            </div>

            <div class="form-group">
              <label for="email">邮箱：</label>
              <input type="text" name="email" class="form-control" value="{{ $user->email }}" disabled>
            </div>

            <div class="form-group">
              <label for="department">职称：</label>
              <input type="text" name="department" class="form-control" value="{{ $user->department }}" disabled>
            </div>

            <div class="form-group">
              <label for="position">所属部门：</label>
              <input type="text" name="position" class="form-control" value="{{ $user->position }}" disabled>
            </div>

            <div class="form-group">
              <label for="tel">电话：</label>
              <input type="text" name="tel" class="form-control" value="{{ $user->tel }}" >
            </div>

            <div class="form-group">
              <label for="password">密码(非必填)：</label>
              <input type="password" name="password" class="form-control" value="">
            </div>

            <div class="form-group">
              <label for="password_confirmation">确认密码(非必填)：</label>
              <input type="password" name="password_confirmation" class="form-control" value="">
            </div>

            <button type="submit" class="btn btn-primary">更新</button>
        </form>
    </div>
  </div>
</div>
@stop