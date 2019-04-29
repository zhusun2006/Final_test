@extends('layouts.default')
@section('title','审核结果')

@section('content')

 <div class="container">
    <div class="col-md-10 offset-md-1">
      <div class="card ">
        <div class="card-body">
          <h2 class="">
            <i class="far fa-edit"></i>
            审核结果
          </h2>
          <hr>
            <a class="btn btn-link" href="{{ route('notice') }}"><-返回</a>
            <form action="{{ route('replies.store') }}" method="POST" accept-charset="UTF-8">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              @include('shared._errors')
              <div class="form-group">
                <label for="name">申请者：</label>
                <input class="form-control" type="text" name="user_id" value="{{ $reply[0]->sender_id }} " disabled/>
                <br>
                <label for="name">标题：</label>
                <input class="form-control" type="text" name="title" value="{{ $reply[0]->title }} " disabled/>
                <br>
                <label for="name">申请种类：</label>
                <input class="form-control" type="text" name="category_id" value="{{ $reply[0]->kind }} " disabled/>
              </div>

              <div class="form-group">
                <label for="name">申请内容：</label>
                <textarea name="content" class="form-control" id="editor" rows="6" required disabled>{{ $reply[0]->content }}</textarea>
              </div>

              <div class="form-group">
                <label for="name">附件下载：{{ $reply[0]->filename }}</label>
                <a href="{{ route('download', $reply[0]->route) }}">下载</a>
              </div>

              <div class="well well-sm">
                <div class="form-group">
                  <label for="name">部门管理的意见：</label>
                  <textarea name="adminreply" class="form-control" id="editor" rows="6"  disabled>{{ $reply[0]->admin_reply }}</textarea>
                </div>        
              </div>
            </form>           
        </div>
      </div>
    </div>
  </div>
@endsection